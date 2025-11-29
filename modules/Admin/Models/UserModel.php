<?php

namespace Modules\Admin\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = "user";
    protected $primaryKey = "";
    protected $allowedFields = [];

    function verifyUser($username, $password)
    {
        $builder = $this->db->table($this->table);
        $builder->select("*")->where("username", $username)->where("password", $password);
        $result = $builder->get()->getRowArray();
        return $result;
    }
    function getUsers($user_id = '')
    {
        $builder = $this->db->table($this->table);
        $builder->select("*");
        if ($user_id > 0) {
            $builder->where('id', $user_id);
            $data = $builder->get()->getRowArray();
        } else {
            $data = $builder->get()->getResultArray();
        }
        return $data;
    }
    function getModule($user_id = '')
    {
        $builder = $this->db->table('tbl_application_module');
        $builder->select("*");
        $data = $builder->get()->getResultArray();
        return $data;
    }
    function getPermissByUser($user_id = '')
    {
        $builder = $this->db->table('tbl_application_access');
        $builder->select("*");
        $builder->where('user_id', $user_id);
        $tmp = array();

        $data = $builder->get()->getResultArray();
        if (!empty($data)) {
            foreach ($data as $row) {
                $tmp[$row['module_id']] = $row;
            }
        }
        return $tmp;
    }
    function getPermissLoginByUser($user_id)
    {
        $builder = $this->db->table('tbl_application_access');
        $builder->select("tbl_application_access.*,tbl_application_module.module_path");
        $builder->join('tbl_application_module', 'tbl_application_module.module_id = tbl_application_access.module_id ', 'left');
        $builder->where('tbl_application_access.user_id', $user_id);
        $data = $builder->get()->getResultArray();
        $tmp = array();


        if (!empty($data)) {
            foreach ($data as $row) {
                $tmp[$row['module_path']] = $row;
            }
        }

        return $tmp;
    }
    function managePermission($input = array())
    {
        $builder = $this->db->table('tbl_application_access');

        $builder->where('user_id', $input['user_id']);
        $builder->delete();
        if (!empty($input)) {
            foreach ($input['permission'] as $key => $row) {
                $builder->set('user_id', $input['user_id']);
                $builder->set('action_insert', @$row['action_insert'] ? $row['action_insert'] : 0);
                $builder->set('action_update', @$row['action_update'] ? $row['action_update'] : 0);
                $builder->set('action_view', @$row['action_view'] ? $row['action_view'] : 0);
                $builder->set('action_delete', @$row['action_delete'] ? $row['action_delete'] : 0);
                $builder->set('module_id', $key);
                $builder->insert();
            }
        }
    }
    function manageUsers($input = array())
    {
        $builder = $this->db->table('user');
        $builder->set('username', $input['username']);
        $builder->set('password', $input['password']);
        $builder->set('f_name', $input['f_name']);
        $builder->set('l_name', $input['l_name']);
        if (!empty($input['user_id'])) {
            $builder->where('id', $input['user_id']);
            $builder->update();
        } else {
            $builder->insert();
        }
    }
    function deleteUsers($input = array())
    {
        $builder = $this->db->table('user');
        $builder->where('id', $input['user_id']);
        $builder->delete();
    }
}
