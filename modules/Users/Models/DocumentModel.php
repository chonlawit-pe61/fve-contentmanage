<?php

namespace Modules\Users\Models;

use CodeIgniter\Model;

class DocumentModel extends Model
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
    function getDocumentFile($id = '')
    {
        $builder = $this->db->table("public_document_file");
        $builder->select('*');
        $builder->where('public_document_id', $id);
        $result = $builder->get()->getResultArray();

        return $result;
    }
}
