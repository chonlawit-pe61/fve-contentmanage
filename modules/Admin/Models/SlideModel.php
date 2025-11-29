<?php

namespace Modules\Admin\Models;

use CodeIgniter\Model;
use \Hermawan\DataTables\DataTable;

class SlideModel extends Model
{
    protected $table      = "slide";
    protected $primaryKey = "";
    protected $allowedFields = [];

    function getSlide($id = '')
    {
        $builder = $this->db->table($this->table);
        $builder->select("$this->table.*");
        if ($id) {
            $builder->where('id', $id);
            $result = $builder->get()->getRowArray();
        } else {
            $result = $builder->get()->getResultArray();
        }
        return $result;
    }

    function saveSlide($input)
    {
        $builder = $this->db->table($this->table);

        if (!empty($input['title'])) {
            $builder->set('title', $input['title']);
        }
        if (!empty($input['description'])) {
            $builder->set('description', $input['description']);
        }
        if (!empty($input['image_path'])) {
            $builder->set('image_path', $input['image_path']);
        }

        if (!empty($input['id'])) {
            $builder->set('update_at', date('Y-m-d H:i:s'));
            $builder->set('update_at', date('Y-m-d H:i:s'));
            $builder->where('id', $input['id']);
            $builder->update();
            return $input['id'];
        } else {
            $builder->set('create_at', date('Y-m-d H:i:s'));
            $builder->set('update_at', date('Y-m-d H:i:s'));
            $builder->insert();
            return $this->db->insertID();
        }
    }

    function deleteSlide($id)
    {
        $builder = $this->db->table($this->table);

        $data = $builder->select('*')->where('id', $id)->get()->getRowArray();
        if (!empty($data['image_path'])) {
            unlink($data['image_path']);
        }

        $builder->where('id', $id)->delete();
        return "ลบข้อมูลสำเร็จ";
    }
}
