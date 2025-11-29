<?php

namespace Modules\Admin\Controllers;

use App\Controllers\BaseController;
use Modules\Admin\Models\CourseModel;

class Course extends BaseController
{
    protected $courseModel;
    public function __construct()
    {
        $this->courseModel = new CourseModel();
    }

    public function index()
    {
        $data['course'] = $this->courseModel->getCourse();
        $data['course_type'] = $this->courseModel->getCourseType();
        return view("Modules\Admin\Views\Course\index", $data);
    }

    public function saveCourse()
    {
        $input = $this->request->getPost();
        // print_r($input); die;
        $id = $this->courseModel->saveCourse($input);
        // save logs
        $ip = $this->request->getIPAddress();
        if (!empty($input['id'])) {
            $this->mainModel->saveLogs('edit', 'course', $ip, $id);
        } else {
            $this->mainModel->saveLogs('create', 'course', $ip, $id);
        }
        return redirect()->to(base_url('admin/course'));
    }
    public function course_content($id)
    {
        $data['id'] = $id;
        $data['course'] =  $this->courseModel->courseById($id);

        return view("Modules\Admin\Views\Course\Course_content", $data);
    }
    public function deleteCourse()
    {
        $input = $this->request->getPost();
        $this->courseModel->deleteCourse($input['id']);
        return json_encode($input);
    }

    public function manageCourseType()
    {
        $input = $this->request->getPost();
        $this->courseModel->saveCourseType($input);
        return redirect()->to(base_url('admin/course'));
    }
    public function deleteCourseType()
    {
        $input = $this->request->getPost();
        $this->courseModel->deleteCourseType($input);
        return json_encode($input);
    }
    public function manage_course_content()
    {
        $input = $this->request->getPost();
        if ($input['base64_image']) {
            $saveDir = 'public/uploads/course/';
            if (!is_dir($saveDir)) {
                mkdir($saveDir, 0755, true);
            }
            $random_name = substr(number_format(time() * rand(), 0, '', ''), 0, 10);
            $img = $input['base64_image'];
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $set_name_img = $random_name . '.jpeg';
            $file = "public/uploads/course/" . $set_name_img;
            file_put_contents($file, $data);
            $input['image_path'] = 'public/uploads/course/' . $set_name_img;
        }
        $this->courseModel->manage_content_course($input);
        return redirect()->to(base_url('admin/course/content/' . $input['course_id']));
    }
}
