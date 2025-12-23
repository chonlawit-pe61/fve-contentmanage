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
    function getInformationPersonel($id = '')
    {
        $builder = $this->db->table('information_personel');
        $builder->select('*');
        if (!empty($id)) {
            $builder->where('information_personel_id', $id);
            $result = $builder->get()->getRowArray();
        } else {
            $result = $builder->get()->getResultArray();
        }
        return $result;
    }
    function getInformationMoney($id = '')
    {
        $builder = $this->db->table('information_money');
        $builder->select('*');
        if (!empty($id)) {
            $builder->where('information_money_id', $id);
            $result = $builder->get()->getRowArray();
        } else {
            $result = $builder->get()->getResultArray();
        }
        return $result;
    }
    function getInformationAboutSuccessful($id = '')
    {
        $builder = $this->db->table('information_successful');
        $builder->select('*');
        if (!empty($id)) {
            $builder->where('information_successful_id', $id);
            $result = $builder->get()->getRowArray();
        } else {
            $result = $builder->get()->getResultArray();
        }
        return $result;
    }
    function saveInformationAboutSuccessful($input)
    {
        $builder = $this->db->table('information_successful');
        if (!empty($input['file_name'])) {
            $builder->set('information_successful_file_name', $input['file_name']);
            $builder->set('information_successful_file', $input['file_path']);
        }
        $builder->set('data_year', $input['data_year']);
        if (!empty($input['information_successful_id'])) {
            $builder->where('information_successful_id', $input['information_successful_id']);
            $builder->update();
        } else {
            $builder->insert();
        }
    }


    function deleteInformationPersonel($id = '')
    {
        $builder = $this->db->table('information_personel');
        $builder->where('information_personel_id', $id);
        $builder->delete();
    }
    function deleteInformationMoney($id = '')
    {
        $builder = $this->db->table('information_money');
        $builder->where('information_money_id', $id);
        $builder->delete();
    }
    function deleteInformationAboutSuccessful($id = '')
    {
        $builder = $this->db->table('information_successful');
        $builder->where('information_successful_id', $id);
        $builder->delete();
    }

    function saveInformationPersonel($input)
    {

        $builder = $this->db->table('information_personel');
        if (!empty($input['file_name'])) {
            $builder->set('information_personel_file_name', $input['file_name']);
            $builder->set('information_personel_file', $input['file_path']);
        }
        $builder->set('data_year', $input['data_year']);
        if (!empty($input['information_personel_id'])) {
            $builder->where('information_personel_id', $input['information_personel_id']);
            $builder->update();
        } else {
            $builder->insert();
        }
    }

    function saveInformationMoney($input)
    {

        $builder = $this->db->table('information_money');
        if (!empty($input['file_name'])) {
            $builder->set('information_money_file_name', $input['file_name']);
            $builder->set('information_money_file', $input['file_path']);
        }
        $builder->set('data_year', $input['data_year']);
        if (!empty($input['information_money_id'])) {
            $builder->where('information_money_id', $input['information_money_id']);
            $builder->update();
        } else {
            $builder->insert();
        }
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
