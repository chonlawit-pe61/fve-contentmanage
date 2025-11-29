<?php

namespace Modules\Admin\Models;

use CodeIgniter\Model;
use \Hermawan\DataTables\DataTable;

class LawModel extends Model
{
    protected $table      = "law";
    protected $primaryKey = "";
    protected $allowedFields = [];

    function getLawTypes()
    {
        $builder = $this->db->table('tbl_law_type');
        $builder->select("*");
        $result = $builder->get()->getResultArray();
        return $result;
    }

    function getLaw($id = '')
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

    function getLawsTables()
    {
        $builder = $this->db->table($this->table);
        $builder->select("$this->table.id,
            $this->table.title,
            $this->table.file_path,
            $this->table.create_at,
            $this->table.update_at,
            tbl_law_type.name as type_name");
        $builder->join("tbl_law_type", "$this->table.type_id = tbl_law_type.id", "left");
        return DataTable::of($builder)
            ->add('file', function ($row) {
                $icon = "";
                if (!empty($row->file_path)) {
                    $links = base_url($row->file_path);
                    $icon .= <<<HTML
                    <a href="$links" target="_blank">
                        <i class="ti ti-file"></i> เปิดไฟล์
                    </a>
                    HTML;
                }
                return $icon;
            })
            ->add('action', function ($row) {
                $tool = '';
                $editLink = base_url('admin/law/manage/' . $row->id);
                $tool .= <<<HTML
                    <a href="$editLink" class="btn btn-warning btn-sm"><i class="ti ti-pencil"></i></a>
                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteLaw('$row->id')"><i class="ti ti-trash"></i></button>
                HTML;
                return $tool;
            })
            ->setSearchableColumns(['title'])
            ->addNumbering()
            ->toJson(true);
    }

    function saveLaw($input)
    {
        $builder = $this->db->table($this->table);

        if (!empty($input['type_id'])) {
            $builder->set('type_id', $input['type_id']);
        }

        if (!empty($input['title'])) {
            $builder->set('title', $input['title']);
        }

        if (!empty($input['file_path'])) {
            $builder->set('file_path', $input['file_path']);
        }

        if (!empty($input['set_file_null'])) {
            $builder->set('file_path', null);
        }

        if (!empty($input['id'])) {
            $builder->set('update_at', date('Y-m-d H:i:s'));
            $builder->where('id', $input['id']);
            $builder->update();
            $id = $input['id'];
        } else {
            $builder->set('create_at', date('Y-m-d H:i:s'));
            $builder->set('update_at', date('Y-m-d H:i:s'));
            $builder->insert();
            $id = $this->db->insertID();
        }

        $msg = [
            'id' => $id,
            'status' => 'success',
            'msg' => 'บันทึกข้อมูลสำเร็จ'
        ];
        return $msg;
    }

    function deleteLaw($id)
    {
        $builder = $this->db->table($this->table);

        $data = $builder->select('*')->where('id', $id)->get()->getRowArray();
        if (!empty($data['file_path'])) {
            unlink($data['file_path']);
        }

        $builder->where('id', $id)->delete();
        return "ลบข้อมูลสำเร็จ";
    }
}
