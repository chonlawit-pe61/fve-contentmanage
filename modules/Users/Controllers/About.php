<?php

namespace Modules\Users\Controllers;

use App\Controllers\BaseController;
use Modules\Admin\Models\CourseModel;
use Modules\Admin\Models\StudentModel;
use Modules\Users\Models\AboutModel;

class About extends BaseController
{
    public function __construct()
    {
        $this->courseModel = new CourseModel();
        $this->studentModel = new StudentModel();
    }
    public function information_educational()
    {
        $data['date_thai'] = $this->Date_thai;
        $AboutModel = new AboutModel();
        $data['information'] = $AboutModel->getInformationEducational();
        return view('Modules\Users\Views\about\information_educational.php', $data);
    }
    public function information_student()
    {
        $data['date_thai'] = $this->Date_thai;

        $search = $this->request->getGet();

        if (!empty($search['edu_year'])) {
            $search_year = $search['edu_year'];
        } else {
            $search_year = date('Y');
        }
        $data['course'] = $this->courseModel->getCourse();
        $data['course_type'] = $this->courseModel->getCourseType();
        $data['data'] = $this->studentModel->get_state_year($search_year);
        return view('Modules\Users\Views\about\information_student.php', $data);
    }
    public function information_giftPolicy()
    {
        $data['date_thai'] = $this->Date_thai;
        $AboutModel = new AboutModel();
        $data['content'] = $AboutModel->getWebContent(4);
        return view('Modules\Users\Views\about\information_giftPolicy.php', $data);
    }
    public function information_law()
    {
        $data['date_thai'] = $this->Date_thai;
        return view('Modules\Users\Views\about\information_law.php', $data);
    }
    public function information_about_manage()
    {
        $AboutModel = new AboutModel();
        $data['date_thai'] = $this->Date_thai;
        $data['personal'] = $AboutModel->getInformationHead();

        return view('Modules\Users\Views\about\information_about_manage.php', $data);
    }
}
