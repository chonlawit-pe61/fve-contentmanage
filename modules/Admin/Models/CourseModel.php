<?php

namespace Modules\Admin\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table      = "course";
    protected $primaryKey = "";
    protected $allowedFields = [];

    function getCourseType()
    {
        $builder = $this->db->table("tbl_course_type");
        $result = $builder->select('*')->get()->getResultArray();
        return $result;
    }

    function getCourse($parent_id = 0)
    {
        $builder = $this->db->table($this->table);
        $builder->where("$this->table.parent_id", $parent_id);
        $builder->orderBy("$this->table.id", "desc");
        $organizations = $builder->get()->getResultArray();

        foreach ($organizations as &$org) {
            $org['children'] = $this->getCourse($org['id']);
        }
        return $organizations;
    }

    function saveCourse($input)
    {
        $builder = $this->db->table($this->table);

        if (!empty($input['name'])) {
            $builder->set('name', $input['name']);
        }

        if (!empty($input['parent_id'])) {
            $builder->set('parent_id', $input['parent_id']);
        } else {
            $builder->set('parent_id', 0);
        }

        if (!empty($input['course_type_id'])) {
            $builder->set('course_type_id', $input['course_type_id']);
        } else {
            $builder->set('course_type_id', 0);
        }

        if (!empty($input['id'])) {
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
    function manage_content_course($input)
    {
        $builder = $this->db->table($this->table);
        if (!empty($input['image_path'])) {
            $builder->set('course_img', $input['image_path']);
        }

        if (!empty($input['Vocational'])) {
            $builder->set('Vocational', $input['Vocational']);
        }

        if (!empty($input['HighVocational'])) {
            $builder->set('HighVocational', $input['HighVocational']);
        }

        if (!empty($input['course_id'])) {
            $builder->set('update_at', date('Y-m-d H:i:s'));
            $builder->where('id', $input['course_id']);
            $builder->update();
        }
    }
    function courseById($id = '')
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('parent_id >', 0);
        if (!empty($id)) {
            $builder->where('id', $id);
            $data = $builder->get()->getRowArray();
        } else {
            $data = $builder->get()->getResultArray();
        }

        return $data;
    }
    function deleteCourse($id = '')
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id', $id);
        $course = $builder->get()->getRowArray();
        if ($course['parent_id'] == 0) {
            $builder->where('parent_id', $id);
            $builder->delete();
            $builder->where('id', $id);
            $builder->delete();
        } else {
            $builder->where('id', $id);
            $builder->delete();
        }
    }
    function saveCourseType($input = array())
    {

        $builder = $this->db->table('tbl_course_type');
        $builder->set('name', $input['name']);
        if (!empty($input['id'])) {
            $builder->where('id', $input['id']);
            $builder->update();
        } else {
            $builder->insert();
        }
    }
    function deleteCourseType($input = array())
    {
        $builder = $this->db->table('tbl_course_type');
        $builder->where('id', $input['id']);
        $builder->delete();

        $builder = $this->db->table('course');
        $builder->where('course_type_id', $input['id']);
        $builder->delete();
    }
}
