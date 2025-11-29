<?php

namespace App\Models;

use CodeIgniter\Model;

class MainModel extends Model
{
    function saveLogs($action, $modules, $ip, $content_id)
    {
        $builder = $this->db->table('logs');
        $builder->set('action', $action);
        $builder->set('modules', $modules);
        $builder->set('content_id', @$content_id);
        $builder->set('ip', $ip);
        $builder->set('time_stamp', date('Y-m-d H:i:s'));
        if (!empty(session()->get('username'))) {
            $builder->set('username', session()->get('username'));
        }
        $builder->insert();
    }
    function countLogs($action, $modules)
    {
        $builder = $this->db->table('logs');
        $builder->select('count(*) as num');
        $builder->where('action', $action);
        $builder->where('modules', $modules);
        $data = $builder->get()->getRowArray();
        return $data;
    }
}
