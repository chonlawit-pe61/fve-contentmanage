<?php

namespace Modules\Users\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table      = "";
    protected $primaryKey = "";
    protected $allowedFields = [];

    function getCourse($id)
    {
        $builder = $this->db->table('course');
        $builder->select('*');
        $builder->where('id', $id);
        $data = $builder->get()->getRowArray();
        return $data;
    }
    function getTEDofCourse($id)
    {
        $builder = $this->db->table('member_course');
        $builder->select('member.*,member_course.*,tbl_prename.name as prename,tbl_course_level.name as level_name , course.name as course_name');
        $builder->join('member', 'member.id = member_course.member_id', 'INNER');
        $builder->join('tbl_prename', 'tbl_prename.id = member.prename_id', 'left');
        $builder->join('tbl_course_level', 'tbl_course_level.id = member_course.course_level_id', 'left');
        $builder->join('course', 'course.id = member_course.course_id', 'left');
        $builder->where('course_id', $id);
        $builder->orderBy('tbl_course_level.id', 'ASC');
        $data = $builder->get()->getResultArray();
        return $data;
    }
}
