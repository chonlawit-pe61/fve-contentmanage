<?php

namespace Modules\Admin\Controllers;

use App\Controllers\BaseController;
use Modules\Admin\Models\CourseModel;
use Modules\Admin\Models\LinkModel;
use Modules\Admin\Models\StudentModel;
use Modules\Admin\Models\UserModel;

class Users extends BaseController
{
    protected $studentModel;
    protected $courseModel;

    public function __construct() {}

    public function index()
    {
        $UserModel = new UserModel();
     
        $data['users'] = $UserModel->getUsers();
        // $data['ss'] = $UserModel->getPermissLoginByUser();

        return view('Modules\Admin\Views\Users\index', $data);
    }
    public function managePermissions()
    {
        $UserModel = new UserModel();
        $data['Module'] = $UserModel->getModule();
        $data['permission_User'] = $UserModel->getPermissByUser(@$_GET['user_id']);
        return view('Modules\Admin\Views\Users\ManagePermissions', $data);
    }
    public function manageUser()
    {
        $UserModel = new UserModel();
        $data['Module'] = $UserModel->getModule();
        $data['user'] = $UserModel->getUsers(@$_GET['user_id']);
        return view('Modules\Admin\Views\Users\manage', $data);
    }
    public function saveUser()
    {
        $input = $this->request->getPost();
        $UserModel = new UserModel();
        $data['user'] = $UserModel->manageUsers($input);
        return redirect()->to(base_url('admin/Users'));
    }
    public function deleteUser()
    {
        $input = $this->request->getPost();
        $UserModel = new UserModel();
        $data['user'] = $UserModel->deleteUsers($input);
        return json_encode($input);
    }


    public function savePermissions()
    {
        $input = $this->request->getPost();

        $UserModel = new UserModel();
        $data['Module'] = $UserModel->managePermission($input);
        return redirect()->to(base_url('admin/Users'));
        // return view('Modules\Admin\Views\Users\ManagePermissions', $data);
    }
}
