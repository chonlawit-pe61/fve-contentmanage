<?php

namespace Modules\Admin\Models;

use CodeIgniter\Model;

class InformationModel extends Model
{
    protected $table      = "information";
    protected $primaryKey = "";
    protected $allowedFields = [];

    function getInformation()
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->limit(1);
        $result = $builder->get()->getRowArray();
        return $result;
    }

    function saveInformation($input)
    {
        $builder = $this->db->table($this->table);

        if (!empty($input['name'])) {
            $builder->set('name', $input['name']);
        }

        if (!empty($input['name_eng'])) {
            $builder->set('name_eng', $input['name_eng']);
        }

        if (!empty($input['history'])) {
            $builder->set('history', $input['history']);
        }

        if (!empty($input['philosophy'])) {
            $builder->set('philosophy', $input['philosophy']);
        }

        if (!empty($input['identity'])) {
            $builder->set('identity', $input['identity']);
        }

        if (!empty($input['unique'])) {
            $builder->set('unique', $input['unique']);
        }

        if (!empty($input['phone'])) {
            $builder->set('phone', $input['phone']);
        }

        if (!empty($input['fax'])) {
            $builder->set('fax', $input['fax']);
        }

        if (!empty($input['address'])) {
            $builder->set('address', $input['address']);
        }

        if (!empty($input['email'])) {
            $builder->set('email', $input['email']);
        }

        if (!empty($input['facebook'])) {
            $builder->set('facebook', $input['facebook']);
        }

        if (!empty($input['youtube'])) {
            $builder->set('youtube', $input['youtube']);
        }

        if (!empty($input['goal'])) {
            $builder->set('goal', $input['goal']);
        }

        if (!empty($input['vision'])) {
            $builder->set('vision', $input['vision']);
        }

        if (!empty($input['mission'])) {
            $builder->set('mission', $input['mission']);
        }
        if (!empty($input['image_path'])) {
            $builder->set('image_path', $input['image_path']);
        }

        if (!empty($input['id'])) {
            $builder->where('id', $input['id']);
            $builder->update();

            $msg = [
                'id' => $input['id'],
                'status' => 'success',
                'msg' => 'บันทึกข้อมูลสำเร็จ'
            ];
            return $msg;
        } else {
            $msg = [
                'id' => $this->db->insertID(),
                'status' => 'error',
                'msg' => 'เกิดข้อผิดพลาดกรุณาลองใหม่อีกครั้ง'
            ];
            return $msg;
        }
    }
}
