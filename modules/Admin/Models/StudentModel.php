<?php

namespace Modules\Admin\Models;

use CodeIgniter\Model;
use \Hermawan\DataTables\DataTable;

class StudentModel extends Model
{
    protected $table      = "";
    protected $primaryKey = "";
    protected $allowedFields = [];

    function get_state_year($year)
    {
        $table = "course";
        $builder = $this->db->table($table);
        $courses = $builder->select("id")->get()->getResultArray();

        $results = [];

        foreach ($courses as $c) {
            $table = "state_yearly";
            $builder = $this->db->table($table);
            $results[$c['id']] =  $builder->select("*")
                ->where('course_id', $c['id'])
                ->where('edu_year', $year)->get()->getRowArray();
        }


        return $results;
    }

    function save_state_yearly($input)
    {
        $table = "state_yearly";
        $builder = $this->db->table($table);

        //deleted 
        $builder->where('edu_year', $input['edu_year'])->delete();

        foreach ($input['course'] as $course_id => $record) {
            if (!empty($record['voc_1_value'])) {
                $builder->set('voc_1_value', str_replace(',', '', $record['voc_1_value']));
            } else {
                $builder->set('voc_1_value', 0);
            }

            if (!empty($record['voc_2_value'])) {
                $builder->set('voc_2_value', str_replace(',', '', $record['voc_2_value']));
            } else {
                $builder->set('voc_2_value', 0);
            }

            if (!empty($record['voc_3_value'])) {
                $builder->set('voc_3_value', str_replace(',', '', $record['voc_3_value']));
            } else {
                $builder->set('voc_3_value', 0);
            }

            if (!empty($record['voc_residue_value'])) {
                $builder->set('voc_residue_value', str_replace(',', '', $record['voc_residue_value']));
            } else {
                $builder->set('voc_residue_value', 0);
            }

            if (!empty($record['hvoc_1_value'])) {
                $builder->set('hvoc_1_value', str_replace(',', '', $record['hvoc_1_value']));
            } else {
                $builder->set('hvoc_1_value', 0);
            }

            if (!empty($record['hvoc_2_value'])) {
                $builder->set('hvoc_2_value', str_replace(',', '', $record['hvoc_2_value']));
            } else {
                $builder->set('hvoc_2_value', 0);
            }

            if (!empty($record['hvoc_residue_value'])) {
                $builder->set('hvoc_residue_value', str_replace(',', '', $record['hvoc_residue_value']));
            } else {
                $builder->set('hvoc_residue_value', 0);
            }

            $builder->set('course_id', $course_id);
            $builder->set('edu_year', $input['edu_year']);
            $builder->insert();
        }
    }
}
