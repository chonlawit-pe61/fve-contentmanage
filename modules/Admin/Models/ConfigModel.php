<?php

namespace Modules\Admin\Models;

use CodeIgniter\Model;

class ConfigModel extends Model
{
    protected $table      = "website_content";
    protected $primaryKey = "";
    protected $allowedFields = [];

    function getContent($input)
    {
        $builder = $this->db->table($this->table);
        $result = $builder->select('*')->where('content_name', $input['content_name'])->get()->getRowArray();
        return $result;
    }

    function saveContent($input)
    {
        $builder = $this->db->table($this->table);

        if (!empty($input['content_name'])) {
            $builder->set('content_name', $input['content_name']);
        }

        if (!empty($input['content_description'])) {
            $builder->set('content_description', $input['content_description']);
        }

        if (!empty($input['id'])) {
            $builder->set('update_at', date('Y-m-d H:i:s'));
            $builder->where('id', $input['id']);
            $builder->update();
        }else{
            $builder->set('create_at', date('Y-m-d H:i:s'));
            $builder->set('update_at', date('Y-m-d H:i:s'));
            $builder->insert();
        }

        return "success";
    }
}
