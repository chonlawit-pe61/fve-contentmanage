<?php

namespace Modules\Admin\Controllers;

use App\Controllers\BaseController;
use Modules\Admin\Models\InformationModel;

class Information extends BaseController
{
    protected $informationModel;
    public function __construct()
    {
        $this->informationModel = new InformationModel();
    }

    public function index()
    {
        $data['data'] = $this->informationModel->getInformation();
        return view("Modules\Admin\Views\Information\index", $data);
    }

    public function saveInformation()
    {
        $input = $this->request->getPost();
        // print_r($input); die;
        if ($input['base64_image']) {
            $saveDir = 'public/uploads/Logo/';
            if (!is_dir($saveDir)) {
                mkdir($saveDir, 0755, true);
            }
            $random_name = substr(number_format(time() * rand(), 0, '', ''), 0, 10);
            $img = $input['base64_image'];
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $set_name_img = $random_name . '.jpeg';
            $file = "public/uploads/Logo/" . $set_name_img;
            file_put_contents($file, $data);
            $input['image_path'] = 'public/uploads/Logo/' . $set_name_img;
        }
        $result = $this->informationModel->saveInformation($input);
        // save logs
        $ip = $this->request->getIPAddress();
        if (!empty($input['id'])) {
            $this->mainModel->saveLogs('edit', 'information', $ip, $result['id']);
        } else {
            $this->mainModel->saveLogs('create', 'information', $ip, $result['id']);
        }
        session()->setFlashdata('msg', $result);
        return redirect()->to(base_url('admin/information'));
    }
}
