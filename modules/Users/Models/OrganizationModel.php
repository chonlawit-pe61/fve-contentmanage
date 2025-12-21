<?php

namespace Modules\Users\Models;

use CodeIgniter\Model;

class OrganizationModel extends Model
{
    protected $table      = "";
    protected $primaryKey = "";
    protected $allowedFields = [];

    function getOrganizationWithParentAndChildren($id = 0, $parentNodeId = null)
    {
        $builder = $this->db->table('organization');
        $builder->where('id', $id);
        $org = $builder->get()->getRowArray();

        $jsData = [];

        $orgNodeId = 'org_' . $org['id'];
        $jsData[] = [
            'id' => $orgNodeId,
            'parentId' => $parentNodeId,
            'name' => $org['name'] ?? 'หน่วยงาน',
            'title' => '',
            'img' => base_url('public/img/logofve_t.png'),
        ];

        $parentIdForSubGroups = $orgNodeId;

        // ───── ดึงรองผู้อำนวยการจาก parent ─────
        if (!empty($org['parent_id'])) {
            $memberBuilder = $this->db->table('member');
            $memberBuilder->select('* , member.id as personal_id');
            $parent = $memberBuilder
                ->join('member_organization', 'member_organization.member_id = member.id', 'left')
                ->join('tbl_org_level', 'tbl_org_level.id = member_organization.org_level_id', 'left')
                ->where('member_organization.org_id', $org['parent_id'])
                ->get()->getRowArray();
            if (!empty($parent)) {
                $parentIdForSubGroups = 'member_' . $parent['id'];
                if (file_exists(ROOTPATH . $parent['image_path']) && !empty($parent['image_path'])) {
                    $file_img = base_url($parent['image_path']);
                } else {
                    $file_img = base_url('public/img/blank-member.jpg');
                }
                $jsData[] = [
                    'id' => $parentIdForSubGroups,
                    'parentId' => $orgNodeId,
                    'name' => 'นาย' . ' ' . $parent['first_name'] . ' ' . $parent['last_name'],
                    'title' => $parent['position'],
                    'img' => $file_img,
                    'personal_id' => $parent['personal_id'],
                ];
            }
        }

        // ───── ดึงสมาชิกทั้งหมด ─────
        $members = $this->db->table('member')
            ->select('member.*, member_organization.org_level_id, tbl_org_level.name as level_name')
            ->join('member_organization', 'member_organization.member_id = member.id', 'left')
            ->join('tbl_org_level', 'tbl_org_level.id = member_organization.org_level_id', 'left')
            ->where('member_organization.org_id', $id)
            ->orderBy('member_organization.org_level_id', 'asc')
            ->get()
            ->getResultArray();

        $groupMap = [];
        $lastGroupNodeIdByLevel = [];

        foreach ($members as $m) {
            $level = $m['org_level_id'];
            $groupKey = 'group_level_' . $level . '_org_' . $id;

            // หาว่า parentId ของกลุ่มนี้ควรเป็นอะไร
            $parentId = $parentIdForSubGroups;
            for ($l = $level - 1; $l >= 0; $l--) {
                $prevKey = 'group_level_' . $l . '_org_' . $id;
                if (isset($lastGroupNodeIdByLevel[$l])) {
                    $parentId = $lastGroupNodeIdByLevel[$l];
                    break;
                }
            }

            if (!isset($groupMap[$groupKey])) {
                $groupMap[$groupKey] = [
                    'id' => $groupKey,
                    'parentId' => $parentId,
                    'name' => $m['level_name'],
                    'title' => '',
                    'people' => [],

                ];
                $lastGroupNodeIdByLevel[$level] = $groupKey;
            }
            if (file_exists(ROOTPATH . $m['image_path']) && !empty($m['image_path'])) {
                $file_img = base_url($m['image_path']);
            } else {
                $file_img = base_url('public/img/blank-member.jpg');
            }
            $groupMap[$groupKey]['people'][] = [
                'name' => 'นาย ' . $m['first_name'] . ' ' . $m['last_name'],
                'title' => $m['position'],
                'img' => $file_img,
                'personal_id' => $m['id'],
            ];
        }
        foreach ($groupMap as $g) {
            $jsData[] = $g;
        }

        // ───── ดึงหน่วยงานลูกแบบ recursive ─────
        $subOrgs = $this->getOrganizationList($id);
        foreach ($subOrgs as $sub) {
            $childNodes = $this->getOrganizationWithParentAndChildren($sub['id'], $orgNodeId);
            $jsData = array_merge($jsData, $childNodes);
        }


        return $jsData;
    }

    function getOrganizationList($id = 0)
    {
        $builder = $this->db->table('organization');
        $builder->select('*');
        $builder->where('parent_id', $id);
        $data = $builder->get()->getResultArray();
        return $data;
    }
    function getPersonalOrganization($member_id)
    {
        $builder = $this->db->table('member');
        $builder->select('member.id ,member.* , tbl_prename.name as pre_name ,tbl_graduation.name as graduation_name');
        $builder->join('tbl_prename', 'tbl_prename.id = member.prename_id ', 'left');
        $builder->join('tbl_graduation', 'tbl_graduation.id = member.graduation_id ', 'left');
        $builder->where('member.id', $member_id);
        $data['member'] = $builder->get()->getRowArray();

        $builderMemberOrganization = $this->db->table('member_organization');
        $builderMemberOrganization->select('*');
        $builderMemberOrganization->join('tbl_org_level', 'tbl_org_level.id =member_organization.org_level_id', 'left');
        $builderMemberOrganization->where('member_id', $data['member']['id']);
        $data['org'] = $builderMemberOrganization->get()->getResultArray();
        return $data;
    }
}
