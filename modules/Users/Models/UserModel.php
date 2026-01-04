<?php

namespace Modules\Users\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = "user";
    protected $primaryKey = "";
    protected $allowedFields = [];

    function verifyUser($username, $password)
    {
        $builder = $this->db->table($this->table);
        $builder->select("*")->where("username", $username)->where("password", $password);
        $result = $builder->get()->getRowArray();
        return $result;
    }
    function getRewardList($id = 0, $limit = 0)
    {
        $builder = $this->db->table('reward');
        $builder->select("*");
        if ($id > 0) {
            $builder->where("id", $id);
        }
        if ($limit > 0) {
            $builder->limit($limit);
        }
        $builder->orderBy('create_at', 'desc');
        $result = $builder->get()->getResultArray();
        return $result;
    }
    function getNewsList($id = 0, $limit = 0)
    {
        $builder = $this->db->table('news');
        $builder->select("*");
        if ($id > 0) {
            $builder->where("category_id", $id);
        }
        if ($limit > 0) {
            $builder->limit($limit);
        }
        $builder->orderBy('create_at', 'desc');
        $result = $builder->get()->getResultArray();
        return $result;
    }


    function getSlideList($limit = 0)
    {
        $builder = $this->db->table('slide');
        $builder->select("*");
        if ($limit > 0) {
            $builder->limit($limit);
        }
        $builder->orderBy('id', 'desc');
        $result = $builder->get()->getResultArray();
        return $result;
    }
    function getPublicDocument($id = '')
    {
        $builder = $this->db->table('tbl_public_document');
        $builder->select("*");
        if (!empty($id)) {
            $builder->where('id', $id);
        }
        $result = $builder->get()->getRowArray();
        $builder_file = $this->db->table('public_document_file');
        $builder_file->select('*');
        $builder_file->where('public_document_id', $id);
        $builder_file->orderBy('id', 'DESC');
        $builder_file->limit(1);
        $data_file = $builder_file->get()->getRowArray();
        if (!empty($data_file)) {
            $result['update_date'] = $data_file['create_at'];
        }
        return $result;
    }
    function getStateYearly($id = '')
    {
        $builder = $this->db->table('state_yearly');

        $builder->select("edu_year");
        $builder->where('is_show', 1);
        $builder->groupBy('edu_year');
        $year = $builder->get()->getRowArray();
        $builder->select("
           SUM(voc_1_value) + SUM(voc_2_value) + SUM(voc_3_value) AS voc_count,
           SUM(voc_residue_value) as voc_residue_count,
           SUM(hvoc_1_value) + SUM(hvoc_2_value) as hvoc_count,
           SUM(hvoc_residue_value) as hvoc_residue_count,
           SUM(voc_1_value) + SUM(voc_2_value) + SUM(voc_3_value) + SUM(voc_residue_value) + SUM(hvoc_1_value) + SUM(hvoc_2_value) + SUM(hvoc_residue_value) AS voc_count_all
        ");
        $builder->where('edu_year', !empty($year['edu_year']) ? $year['edu_year'] : date('Y'));
        $data =  $builder->get()->getRowArray();

        return $data;
    }
    function get_edu_year()
    {
        $builder = $this->db->table('state_yearly');
        $builder->select("edu_year");
        $builder->where('is_show', 1);
        $builder->groupBy('edu_year');
        $year = $builder->get()->getRowArray();
        return $year;
    }
}
