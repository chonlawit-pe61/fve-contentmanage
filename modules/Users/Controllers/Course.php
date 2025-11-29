<?php

namespace Modules\Users\Controllers;

use App\Controllers\BaseController;
use Modules\Admin\Models\UserModel;
use Modules\Users\Models\AboutModel;
use Modules\Users\Models\CourseModel;
use Modules\Users\Models\OrganizationModel;

class Course extends BaseController
{

    public function __construct() {}
    public function index($id = '')
    {
        $CourseModel = new CourseModel();
        $data['course'] = $CourseModel->getCourse($id);
        $data['TED'] = $CourseModel->getTEDofCourse($id);
        return view('Modules\Users\Views\course\index.php', $data);
    }
}
