<?php

namespace Modules\Admin\Controllers;

use App\Controllers\BaseController;
use Modules\Admin\Models\CourseModel;
use Modules\Admin\Models\StudentModel;

class Student extends BaseController
{
    protected $studentModel;
    protected $courseModel;

    public function __construct()
    {
        $this->studentModel = new StudentModel();
        $this->courseModel = new CourseModel();
    }

    public function state_yearly()
    {
        $search = $this->request->getGet();

        if (!empty($search['edu_year'])) {
            $search_year = $search['edu_year'];
        } else {
            $search_year = date('Y');
        }

        $data['check_show'] = $this->studentModel->check_show($search_year);
        $data['course'] = $this->courseModel->getCourse();
        $data['course_type'] = $this->courseModel->getCourseType();
        $data['data'] = $this->studentModel->get_state_year($search_year);
        // print_r($data['data']);die;
        return view('Modules\Admin\Views\Student\yearly_form', $data);
    }

    public function save_state_yearly()
    {
        $input = $this->request->getPost();
        // echo "<pre>"; 
        // print_r($input); die;
        $result = $this->studentModel->save_state_yearly($input);
        return redirect()->to(base_url('admin/dashboard'));
    }
}
