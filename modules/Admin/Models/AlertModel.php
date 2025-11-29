<?php

namespace Modules\Admin\Models;

use CodeIgniter\Model;

class AlertModel extends Model
{
    protected $table      = "";
    protected $primaryKey = "";
    protected $allowedFields = [];

    function manageAlert($input)
    {
        $builder = $this->db->table('alert_new');
        if (!empty($input['id'])) {
            $builder->set('alert_name', $input['title']);
            $builder->set('show_date', $input['show_date']);
            $builder->where('alert_id', $input['id']);
            $id = $input['id'];
            $builder->update();
        } else {
            $builder->set('alert_name', $input['title']);
            $builder->set('show_date', $input['show_date']);
            $builder->insert();
            $id = $this->db->insertID();
        }
        $builder_img = $this->db->table('alert_image');
        $builder_img->where('alert_id', $id);
        $builder_img->delete();
        if (!empty($input['alert_img'])) {
            foreach ($input['alert_img'] as $img) {
                $builder_img->set('alert_id', $id);
                $builder_img->set('alert_image_path', $img['alert_image_path']);
                $builder_img->where('alert_image_id', $img['alert_image_id']);
                $builder_img->update();
            }
        }
        if (!empty($input['image_paths'])) {
            foreach ($input['image_paths'] as $row) {
                $builder_img->set('alert_id', $id);
                $builder_img->set('alert_image_path', $row);
                $builder_img->insert();
            }
        }
    }
    function getListAlert()
    {
        $builder = $this->db->table('alert_new');
        $builder->select('*');
        $data = $builder->get()->getResultArray();
        return $data;
    }
    function getListAlertImg($id)
    {
        $builder = $this->db->table('alert_image');
        $builder->select('*');
        $builder->where('alert_id', $id);
        $data = $builder->get()->getResultArray();
        return $data;
    }

    function getListAlertById($id)
    {
        $builder = $this->db->table('alert_new');
        $builder->select('*');
        $builder->where('alert_id', $id);
        $data = $builder->get()->getRowArray();
        return $data;
    }
    function DeleteAlertById($id)
    {
        $builder = $this->db->table('alert_new');
        $builder->select('*');
        $builder->where('alert_id', $id);
        $builder->delete();
    }
}
