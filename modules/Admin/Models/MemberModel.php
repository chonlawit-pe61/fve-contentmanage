<?php

namespace Modules\Admin\Models;

use \Hermawan\DataTables\DataTable;
use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table      = "member";
    protected $primaryKey = "";
    protected $allowedFields = [];

    function getPrename()
    {
        $builder = $this->db->table('tbl_prename');
        $result = $builder->select('*')->get()->getResultArray();
        return $result;
    }

    function getGraduation()
    {
        $builder = $this->db->table('tbl_graduation');
        $result = $builder->select('*')->get()->getResultArray();
        return $result;
    }

    function getCourse()
    {
        $builder = $this->db->table('course');
        $result = $builder->select('*')->where('parent_id >', 0)->get()->getResultArray();
        return $result;
    }
    function getCourseLevel()
    {
        $builder = $this->db->table('tbl_course_level');
        $result = $builder->select('*')->get()->getResultArray();
        return $result;
    }

    function getMemberCourse($member_id)
    {
        $builder = $this->db->table('member_course');
        $builder->select('*');
        $builder->where('member_id', $member_id);
        $result = $builder->get()->getResultArray();
        return $result;
    }
    // function getCourse()
    // {
    //     $builder = $this->db->table('course');
    //     $result = $builder->select('*')->where('parent_id >', 0)->get()->getResultArray();
    //     return $result;
    // }

    function getMember($id = '')
    {
        $builder = $this->db->table($this->table);
        $builder->select("$this->table.*");
        if ($id) {
            $builder->where('id', $id);
            $result = $builder->get()->getRowArray();
        } else {
            $result = $builder->get()->getResultArray();
        }
        return $result;
    }

    function getMemberTables()
    {
        $builder = $this->db->table($this->table);
        $builder->select("$this->table.id,
            $this->table.image_path,
            tbl_prename.name as prename_th, 
            $this->table.first_name,
            $this->table.last_name,
            $this->table.phone");
        $builder->join("tbl_prename", "$this->table.prename_id = tbl_prename.id", "left");
        return DataTable::of($builder)
            ->edit('image_path', function ($row, $meta) {
                if (!empty($row->image_path)) {
                    if (file_exists('./' . $row->image_path)) {
                        $img_link = base_url() . '/' . $row->image_path;
                    } else {
                        $img_link = base_url('public/img/blank-member.jpg');
                    }
                } else {
                    $img_link = base_url('public/img/blank-member.jpg');
                }
                $image =  <<<HTML
                <div class="d-flex align-items-center">
                    <div class="me-2 pe-1">
                        <img src="$img_link" class="rounded-circle" width="40" height="40" alt="modernize-img">
                    </div>
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="fw-semibold mb-1">$row->prename_th$row->first_name $row->last_name</h6>
                        </div>
                    </div>                            
                </div>
                HTML;
                return $image;
            })
            ->edit('phone', function ($row, $meta) {
                if ($row->phone) {
                    return $row->phone;
                } else {
                    return "-";
                }
            })
            ->add('action', function ($row) {
                $tool = '';
                $editLink = base_url('admin/member/manage/' . $row->id);
                $tool .= <<<HTML
                    <a href="$editLink" class="btn btn-warning btn-sm"><i class="ti ti-pencil"></i></a>
                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteMember('$row->id')"><i class="ti ti-trash"></i></button>
                HTML;
                return $tool;
            })
            ->setSearchableColumns(['first_name', 'last_name', 'phone'])
            // ->addNumbering()
            ->toJson(true);
    }

    function saveMember($input)
    {

        $builder = $this->db->table($this->table);

        if (!empty($input['image_path'])) {
            $builder->set('image_path', $input['image_path']);
        }
        if (!empty($input['prename_id'])) {
            $builder->set('prename_id', $input['prename_id']);
        }
        if (!empty($input['first_name'])) {
            $builder->set('first_name', $input['first_name']);
        }
        if (!empty($input['last_name'])) {
            $builder->set('last_name', $input['last_name']);
        }
        if (!empty($input['email'])) {
            $builder->set('email', $input['email']);
        }
        if (!empty($input['phone'])) {
            $builder->set('phone', $input['phone']);
        }
        if (!empty($input['phone'])) {
            $builder->set('phone', $input['phone']);
        }
        if (!empty($input['position'])) {
            $builder->set('position', $input['position']);
        }
        if (!empty($input['responsibility'])) {
            $builder->set('responsibility', $input['responsibility']);
        }
        if (!empty($input['graduation_id'])) {
            $builder->set('graduation_id', $input['graduation_id']);
        }

        if (!empty($input['id'])) {
            $builder->set('update_at', date('Y-m-d H:i:s'));
            $builder->where('id', $input['id']);
            $builder->update();
            $member_id = $input['id'];
        } else {
            $builder->set('create_at', date('Y-m-d H:i:s'));
            $builder->set('update_at', date('Y-m-d H:i:s'));
            $builder->insert();
            $member_id = $this->db->insertID();
        }

        $member_org = $this->db->table('member_organization');
        $member_org->where('member_id', $member_id)->delete();
        foreach ($input['org_id'] as $key => $value) {
            $member_org->set('member_id', $member_id);
            $member_org->set('org_id', $value);
            $member_org->set('org_level_id', ($input['org_level_id'][$key]) ? $input['org_level_id'][$key] : 0);
            $member_org->insert();
        }

        if (!empty($input['course_id'][0])) {
            $member_org = $this->db->table('member_course');
            $member_org->where('member_id', $member_id)->delete();
            foreach ($input['course_id'] as $key => $value) {
                $member_org->set('member_id', $member_id);
                $member_org->set('course_id', $value);
                $member_org->set('course_level_id', ($input['course_level_id'][$key]) ? $input['course_level_id'][$key] : 0);
                $member_org->insert();
            }
        }


        return $member_id;
    }

    function deleteMember($id)
    {
        $builder = $this->db->table($this->table);

        $data = $builder->select('*')->where('id', $id)->get()->getRowArray();
        if (!empty($data['image_path'])) {
            unlink($data['image_path']);
        }

        $builder->where('id', $id)->delete();
        return "ลบข้อมูลสำเร็จ";
    }

    function getMemberOrg($id)
    {
        $builder = $this->db->table('member_organization');
        $result = $builder->select('*')->where('member_id', $id)->get()->getResultArray();
        return $result;
    }
}
