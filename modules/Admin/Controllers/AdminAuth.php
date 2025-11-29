<?php

namespace Modules\Admin\Controllers;

use App\Controllers\BaseController;
use Modules\Admin\Models\UserModel;

class AdminAuth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        return view('Modules\Admin\Views\Auth\login');
    }

    public function signin()
    {
        $input = $this->request->getPost();
        // print_r($input);
        // die;
        $user = $this->userModel->verifyUser($input['username'], $input['password']);
        if ($user) {

            $per = $this->userModel->getPermissLoginByUser($user['id']);
            $ses_data = [
                'user_id' => $user['id'],
                'username' => $user['username'],
                'isAdminLoggedIn' => TRUE,
                'per' => $per
            ];
            session()->set($ses_data);
            session()->set($per);

            return redirect()->to(base_url('admin/dashboard'));
        }

        session()->setFlashdata('msg', 'ไม่พบชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง');
        return redirect()->to('login');
    }

    public function logout()
    {
        $session = session();
        $session->set(array(
            'user_id' => '',
            'per' => '',
            'username' => '',
            'isAdminLoggedIn' => FALSE,
        ));
        // $session->destroy();
        return redirect()->to(base_url('admin/login'));
    }
}
