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
}
