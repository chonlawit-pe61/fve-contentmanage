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
    function getCourse()
    {
        $builder = $this->db->table('course');
        $builder->select('*');
        $builder->where('parent_id', 0);
        $data = $builder->get()->getResultArray();
        return $data;
    }


    function getInformationHead()
    {
        $builder = $this->db->table('member_organization');
        $builder->select('* ,tbl_prename.name as prename, organization.name as org_name');
        $builder->join('organization', 'organization.id = member_organization.org_id', 'left');
        $builder->join('member', 'member.id = member_organization.member_id', 'INNER');
        $builder->join('tbl_prename', 'tbl_prename.id = member.prename_id', 'left');
        $builder->whereIn('organization.parent_id', [0, 1]);
        $builder->orderBy('parent_id', 'ASC');
        $data = $builder->get()->getResultArray();
        return $data;
    }
    function getInformationPersonel()
    {
        $builder = $this->db->table('information_personel');
        $builder->select('*');
        $builder->orderBy('data_year', 'DESC');
        $data = $builder->get()->getResultArray();
        return $data;
    }
    function getInformationSuccessful()
    {
        $builder = $this->db->table('information_successful');
        $builder->select('*');
        $builder->orderBy('data_year', 'DESC');
        $data = $builder->get()->getResultArray();
        return $data;
    }
    function getInformationRegulations()
    {
        $builder = $this->db->table('information_regulations');
        $builder->select('*');
        $builder->orderBy('data_year', 'DESC');
        $data = $builder->get()->getResultArray();
        return $data;
    }
    function getInformationMoney()
    {
        $builder = $this->db->table('information_money');
        $builder->select('*');
        $builder->orderBy('data_year', 'DESC');
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

    function getLawTypes()
    {
        $builder = $this->db->table('tbl_law_type');
        $builder->select("tbl_law_type.*");
        $builder->join("law", "law.type_id = tbl_law_type.id", "inner");
        $builder->groupBy("tbl_law_type.id");
        $result = $builder->get()->getResultArray();
        return $result;
    }
    function getLawFile()
    {
        $builder = $this->db->table('law');
        $builder->select("*");
        $result = $builder->get()->getResultArray();

        $law_type = $this->getLawTypes();


        $tmp = [];
        if (!empty($result)) {
            foreach ($law_type as $type) {
                foreach ($result as $key => $value) {
                    if ($value['type_id'] == $type['id']) {
                        $tmp[$type['id']][] = $value;
                    }
                }
            }
        }
        return $tmp;
    }
    function getInformationTeam()
    {
        $builder = $this->db->table('information_team');
        $builder->select('*');
        $builder->where('information_team_id', 1);
        $data = $builder->get()->getRowArray();
        return $data;
    }

    function getInformationCourse()
    {
        $builder = $this->db->table('information_course');
        $builder->select('*');
        $builder->orderBy('data_year', 'DESC');
        $data = $builder->get()->getResultArray();
        return $data;
    }
}
