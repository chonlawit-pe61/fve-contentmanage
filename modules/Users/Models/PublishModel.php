<?php

namespace Modules\Users\Models;

use CodeIgniter\Model;

class PublishModel extends Model
{
    protected $table      = "";
    protected $primaryKey = "";
    protected $allowedFields = [];


    function getPublishEducationalDevelopment()
    {
        $builder = $this->db->table('publish_educational_development');
        $builder->select('*');
        $builder->orderBy('data_year', 'DESC');
        $data = $builder->get()->getResultArray();
        return $data;
    }

    function getPublishYear()
    {
        $builder = $this->db->table('publish_year');
        $builder->select('*');
        $builder->orderBy('data_year', 'DESC');
        $data = $builder->get()->getResultArray();
        return $data;
    }
    function getPublishSar()
    {
        $builder = $this->db->table('publish_sar');
        $builder->select('*');
        $builder->orderBy('data_year', 'DESC');
        $data = $builder->get()->getResultArray();
        return $data;
    }
    function getPublishExternalQualityReport()
    {
        $builder = $this->db->table('publish_external_quality_report');
        $builder->select('*');
        $builder->orderBy('data_year', 'DESC');
        $data = $builder->get()->getResultArray();
        return $data;
    }
    function getPublishSummaryReport()
    {
        $builder = $this->db->table('publish_summary_report');
        $builder->select('*');
        $builder->orderBy('data_year', 'DESC');
        $data = $builder->get()->getResultArray();
        return $data;
    }

    function getPublishRepositoryType()
    {
        $builder = $this->db->table('tbl_repository_type');
        $builder->select('tbl_repository_type.*');
        $builder->join('repository', 'repository.type_id = tbl_repository_type.id', 'INNER');
        $builder->groupBy('tbl_repository_type.id');
        $data = $builder->get()->getResultArray();
        return $data;
    }

    function getPublishRepository()
    {
        $builder = $this->db->table('repository');
        $builder->select('*');
        $data = $builder->get()->getResultArray();
        $temp = [];
        foreach ($data as $key => $value) {
            $temp[$value['type_id']][] = $value;
        }
        return $temp;
    }
}
