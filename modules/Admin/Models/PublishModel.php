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
}
