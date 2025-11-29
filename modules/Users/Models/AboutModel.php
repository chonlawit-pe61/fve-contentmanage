<?php

namespace Modules\Users\Models;

use CodeIgniter\Model;

class AboutModel extends Model
{
    protected $table      = "";
    protected $primaryKey = "";
    protected $allowedFields = [];

    function getInformationEducational()
    {
        $builder = $this->db->table('information');
        $builder->select('*');
        $builder->where('id', 1);
        $data = $builder->get()->getRowArray();
        return $data;
    }
    function getInformationHead()
    {
        $builder = $this->db->table('member_organization');
        $builder->select('* ,tbl_prename.name as prename, organization.name as org_name');
        $builder->join('organization', 'organization.id = member_organization.org_id', 'left');
        $builder->join('member', 'member.id = member_organization.member_id', 'left');
        $builder->join('tbl_prename', 'tbl_prename.id = member.prename_id', 'left');
        $builder->whereIn('organization.parent_id', [0, 1]);
        $data = $builder->get()->getResultArray();
        return $data;
    }

    function getWebContent($id)
    {
        $builder = $this->db->table('website_content');
        $builder->select('*');
        $builder->where('id', $id);
        $data = $builder->get()->getRowArray();
        return $data;
    }
}
