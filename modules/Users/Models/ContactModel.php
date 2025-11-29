<?php

namespace Modules\Users\Models;

use CodeIgniter\Model;

class ContactModel extends Model
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
}
