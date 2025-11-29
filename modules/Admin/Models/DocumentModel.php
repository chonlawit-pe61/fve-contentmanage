<?php

namespace Modules\Admin\Models;

use CodeIgniter\Model;

class DocumentModel extends Model
{
    protected $table      = "course";
    protected $primaryKey = "";
    protected $allowedFields = [];

    function getPublicDocument($id = '')
    {
        $builder = $this->db->table("tbl_public_document");
        $builder->select('*');
        if (!empty($id)) {
            $builder->where('id', $id);
            $result = $builder->get()->getRowArray();
        } else {
            $result = $builder->get()->getResultArray();
        }

        return $result;
    }
    function manageDocument($input = array())
    {
        $builder = $this->db->table("tbl_public_document");
        $builder->set('title', $input['title']);
        if (!empty($input['url'])) {
            $builder->set('url', $input['url']);
        }
        if (!empty($input['id'])) {
            $builder->where('id', $input['id']);
            $builder->update();
        } else {
            $builder->insert();
        }
    }
    function getDocumentFile($id = '', $year = '')
    {
        $builder = $this->db->table("public_document_file");
        $builder->where('public_document_id', $id);
        if (!empty($year)) {
            $builder->where('edu_year', $year);
        }
        $data = $builder->get()->getResultArray();
        return $data;
    }
    function getDocumentFileById($id = '')
    {
        $builder = $this->db->table("public_document_file");
        $builder->where('id', $id);
        $data = $builder->get()->getRowArray();
        return $data;
    }
    function manageDocumentFile($input = array())
    {
        // echo '<pre>';
        // print_r($input);
        // die();

        $builder_check = $this->db->table('public_document_file');
        $builder_check->select('*');
        $builder_check->where('id', $input['public_document_file_id']);
        $builder = $this->db->table("public_document_file");
        $check = $builder_check->get()->getRowArray();
        if (!empty($input['file'])) {
            $builder->set('file_path', $input['file']);
        }
        $builder->set('title', $input['title']);
        $builder->set('edu_year', $input['edu_year']);
        $builder->set('public_document_id', $input['public_document_id']);
        if (!empty($check)) {
            $builder->where('id', $check['id']);
            $builder->set('update_at', date('Y-m-d H:i:s'));
            $builder->update();
        } else {
            $builder->set('create_at', date('Y-m-d H:i:s'));
            $builder->insert();
        }
    }
    function deleteDocumentFileById($id = '')
    {
        $builder = $this->db->table("public_document_file");
        $builder->where('id', $id);
        $builder->delete();
    }
    function deleteDocumentById($id = '')
    {
        $builder = $this->db->table("tbl_public_document");
        $builder->where('id', $id);
        $builder->delete();
    }
    function showDocumentById($input)
    {
        $builder = $this->db->table("tbl_public_document");
        $builder->set('is_show', $input['is_show']);
        $builder->where('id', $input['id']);
        $builder->update();
    }
}
