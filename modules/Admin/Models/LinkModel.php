<?php

namespace Modules\Admin\Models;

use CodeIgniter\Model;
use \Hermawan\DataTables\DataTable;

class LinkModel extends Model
{
    protected $table      = "";
    protected $primaryKey = "";
    protected $allowedFields = [];

    function getIcon()
    {
        $builder = $this->db->table('tbl_icon');
        $builder->select("*");
        $result = $builder->get()->getResultArray();
        return $result;
    }
    function getLink($id = '', $ita = 0)
    {
        $builder = $this->db->table('box_link');
        if ($id > 0) {
            $builder->where('box_id', $id);
            $result = $builder->get()->getRowArray();
        } else {
            $builder->select("*");
            if ($ita > 0) {
                $builder->where('box_name !=', 'ITA');
            }
            $result = $builder->get()->getResultArray();
        }
        return $result;
    }
    function getLinkITA()
    {
        $builder = $this->db->table('box_link');
        $builder->where('box_name =', 'ITA');
        $result = $builder->get()->getRowArray();
        return $result;
    }

    function manageLink($input)
    {
        $builder = $this->db->table('box_link');
        $builder->set('box_name', $input['box_name']);
        $builder->set('box_url', $input['box_url']);
        $builder->set('box_icon', $input['box_icon']);
        if (!empty($input['id'])) {
            $builder->where('box_id', $input['id']);
            $builder->update();
        } else {
            $builder->insert();
        }
    }
    function deleteLink($input)
    {
        $builder = $this->db->table('box_link');
        $builder->where('box_id', $input['id']);
        $builder->delete();
    }
}
