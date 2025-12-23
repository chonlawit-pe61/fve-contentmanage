<?php

namespace Modules\Admin\Models;

use CodeIgniter\Model;

class OrganizationModel extends Model
{
    protected $table      = "organization";
    protected $primaryKey = "";
    protected $allowedFields = [];

    function getOrganization($parent_id = 0)
    {
        $builder = $this->db->table($this->table);
        $builder->where("$this->table.parent_id", $parent_id);
        $organizations = $builder->get()->getResultArray();

        foreach ($organizations as &$org) {
            $org['children'] = $this->getOrganization($org['id']);
        }
        return $organizations;
    }

    function saveOrganize($input)
    {
        $builder = $this->db->table($this->table);

        if (!empty($input['name'])) {
            $builder->set('name', $input['name']);
        }

        if (!empty($input['parent_id'])) {
            $builder->set('parent_id', $input['parent_id']);
        } else {
            $builder->set('parent_id', 0);
        }

        if (!empty($input['id'])) {
            $builder->set('update_at', date('Y-m-d H:i:s'));
            $builder->where('id', $input['id']);
            $builder->update();
            return $input['id'];
        } else {
            $builder->set('create_at', date('Y-m-d H:i:s'));
            $builder->set('update_at', date('Y-m-d H:i:s'));
            $builder->insert();
            return $this->db->insertID();
        }
    }

    // ตำแหน่งบริหาร
    function get_organize_level()
    {
        $builder = $this->db->table('tbl_org_level');
        $result = $builder->select("*")->get()->getResultArray();
        return $result;
    }

    function deleteOrganization($input)
    {

        $builder = $this->db->table('organization');
        $builder->select("*");
        $builder->where('parent_id', $input['id']);
        $check_parent = $builder->get()->getResultArray();

        if (!empty($check_parent)) {
            $builder->where("parent_id", $input['id']);
            $builder->delete();
        }
        $builder->where("id", $input['id']);
        $builder->delete();
        return $input['id'];
    }
}
