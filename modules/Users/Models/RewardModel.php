<?php

namespace Modules\Users\Models;

use CodeIgniter\Model;

class RewardModel extends Model
{
    protected $table      = "";
    protected $primaryKey = "";
    protected $allowedFields = [];

    function rewardDetail($id = 0)
    {
        $builder = $this->db->table('reward');
        $builder->where('id', $id);
        $data = $builder->get()->getRowArray();
        return $data;
    }
}
