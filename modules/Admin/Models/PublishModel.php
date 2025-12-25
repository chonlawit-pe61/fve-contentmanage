<?php

namespace Modules\Admin\Models;

use CodeIgniter\Model;

class PublishModel extends Model
{
    protected $table      = "publish";
    protected $primaryKey = "";
    protected $allowedFields = [];


    function getPublishEducationalDevelopment($id = '')
    {
        $builder = $this->db->table('publish_educational_development');
        $builder->select('*');
        if (!empty($id)) {
            $builder->where('publish_educational_development_id', $id);
            $result = $builder->get()->getRowArray();
        } else {
            $result = $builder->get()->getResultArray();
        }
        return $result;
    }

    function savePublishEducationalDevelopment($input)
    {
        $builder = $this->db->table('publish_educational_development');
        if (!empty($input['file_name'])) {
            $builder->set('publish_educational_development_file_name', $input['file_name']);
            $builder->set('publish_educational_development_file', $input['file_path']);
        }
        $builder->set('data_year', $input['data_year']);
        if (!empty($input['publish_educational_development_id'])) {
            $builder->where('publish_educational_development_id', $input['publish_educational_development_id']);
            $builder->update();
        } else {
            $builder->insert();
        }
    }
    function deletePublishEducationalDevelopment($id = '')
    {
        $builder = $this->db->table('publish_educational_development');
        $builder->where('publish_educational_development_id', $id);
        $builder->delete();
    }




    function getPublishYear($id = '')
    {
        $builder = $this->db->table('publish_year');
        $builder->select('*');
        if (!empty($id)) {
            $builder->where('publish_year_id', $id);
            $result = $builder->get()->getRowArray();
        } else {
            $result = $builder->get()->getResultArray();
        }
        return $result;
    }

    function savePublishYear($input)
    {

        $builder = $this->db->table('publish_year');
        if (!empty($input['file_name'])) {
            $builder->set('publish_year_file_name', $input['file_name']);
            $builder->set('publish_year_file', $input['file_path']);
        }
        $builder->set('data_year', $input['data_year']);
        if (!empty($input['publish_year_id'])) {
            $builder->where('publish_year_id', $input['publish_year_id']);
            $builder->update();
        } else {
            $builder->insert();
        }
    }
    function deletePublishYear($id = '')
    {
        $builder = $this->db->table('publish_year');
        $builder->where('publish_year_id', $id);
        $builder->delete();
    }


    function getPublishSar($id = '')
    {
        $builder = $this->db->table('publish_sar');
        $builder->select('*');
        if (!empty($id)) {
            $builder->where('publish_sar_id', $id);
            $result = $builder->get()->getRowArray();
        } else {
            $result = $builder->get()->getResultArray();
        }
        return $result;
    }

    function savePublishSar($input)
    {

        $builder = $this->db->table('publish_sar');
        if (!empty($input['file_name'])) {
            $builder->set('publish_sar_file_name', $input['file_name']);
            $builder->set('publish_sar_file', $input['file_path']);
        }
        $builder->set('data_year', $input['data_year']);
        if (!empty($input['publish_sar_id'])) {
            $builder->where('publish_sar_id', $input['publish_sar_id']);
            $builder->update();
        } else {
            $builder->insert();
        }
    }
    function deletePublishSar($id = '')
    {
        $builder = $this->db->table('publish_sar');
        $builder->where('publish_sar_id', $id);
        $builder->delete();
    }

    function getPublishExternalQualityReport($id = '')
    {
        $builder = $this->db->table('publish_external_quality_report');
        $builder->select('*');
        if (!empty($id)) {
            $builder->where('publish_external_quality_report_id', $id);
            $result = $builder->get()->getRowArray();
        } else {
            $result = $builder->get()->getResultArray();
        }
        return $result;
    }

    function savePublishExternalQualityReport($input)
    {

        $builder = $this->db->table('publish_external_quality_report');
        if (!empty($input['file_name'])) {
            $builder->set('publish_external_quality_report_file_name', $input['file_name']);
            $builder->set('publish_external_quality_report_file', $input['file_path']);
        }
        $builder->set('data_year', $input['data_year']);
        if (!empty($input['publish_external_quality_report_id'])) {
            $builder->where('publish_external_quality_report_id', $input['publish_external_quality_report_id']);
            $builder->update();
        } else {
            $builder->insert();
        }
    }
    function deletePublishExternalQualityReport($id = '')
    {
        $builder = $this->db->table('publish_external_quality_report');
        $builder->where('publish_external_quality_report_id', $id);
        $builder->delete();
    }






    function getPublishSummaryReport($id = '')
    {
        $builder = $this->db->table('publish_summary_report');
        $builder->select('*');
        if (!empty($id)) {
            $builder->where('publish_summary_report_id', $id);
            $result = $builder->get()->getRowArray();
        } else {
            $result = $builder->get()->getResultArray();
        }
        return $result;
    }

    function savePublishSummaryReport($input)
    {

        $builder = $this->db->table('publish_summary_report');
        if (!empty($input['file_name'])) {
            $builder->set('publish_summary_report_file_name', $input['file_name']);
            $builder->set('publish_summary_report_file', $input['file_path']);
        }
        $builder->set('data_year', $input['data_year']);
        if (!empty($input['publish_summary_report_id'])) {
            $builder->where('publish_summary_report_id', $input['publish_summary_report_id']);
            $builder->update();
        } else {
            $builder->insert();
        }
    }
    function deletePublishSummaryReport($id = '')
    {
        $builder = $this->db->table('publish_summary_report');
        $builder->where('publish_summary_report_id', $id);
        $builder->delete();
    }


    function getPublishRepository($id = '')
    {
        $builder = $this->db->table('repository');
        $builder->select('*');
        if (!empty($id)) {
            $builder->where('id', $id);
            $result = $builder->get()->getRowArray();
        } else {
            $result = $builder->get()->getResultArray();
        }
        return $result;
    }

    function getPublishRepositoryType($id = '')
    {
        $builder = $this->db->table('tbl_repository_type');
        $builder->select('*');
        if (!empty($id)) {
            $builder->where('id', $id);
            $result = $builder->get()->getRowArray();
        } else {
            $result = $builder->get()->getResultArray();
        }
        return $result;
    }
    function deletePublishRepository($id = '')
    {
        $builder = $this->db->table('repository');
        $builder->where('id', $id);
        $builder->delete();
    }

    function savePublishRepository($input)
    {
        $builder = $this->db->table('repository');

        if (!empty($input['type_id'])) {
            $builder->set('type_id', $input['type_id']);
        }

        if (!empty($input['title'])) {
            $builder->set('title', $input['title']);
        }

        if (!empty($input['file_path'])) {
            $builder->set('file_path', $input['file_path']);
        }

        if (!empty($input['set_file_null'])) {
            $builder->set('file_path', null);
        }

        if (!empty($input['id'])) {
            $builder->set('update_at', date('Y-m-d H:i:s'));
            $builder->where('id', $input['id']);
            $builder->update();
            $id = $input['id'];
        } else {
            $builder->set('create_at', date('Y-m-d H:i:s'));
            $builder->set('update_at', date('Y-m-d H:i:s'));
            $builder->insert();
            $id = $this->db->insertID();
        }
    }
}
