<?php

namespace Modules\Admin\Controllers;

use App\Controllers\BaseController;
use Modules\Admin\Models\SlideModel;

class Slide extends BaseController
{
    protected $SlideModel;

    public function __construct()
    {
        $this->SlideModel = new SlideModel();
    }

    public function index()
    {
        $data['data'] = $this->SlideModel->getSlide();
        return view('Modules\Admin\Views\Slide\index', $data);
    }

    public function manage($id = '')
    {
        $data = [];
        if ($id) {
            $data['slide'] = $this->SlideModel->getSlide($id);
        }
        return view('Modules\Admin\Views\Slide\manage', $data);
    }

    public function saveSlide()
    {
        $input = $this->request->getPost();
        // print_r($input); die;
        if ($input['base64_image']) {
            $saveDir = 'public/uploads/Slide/';
            if (!is_dir($saveDir)) {
                mkdir($saveDir, 0755, true);
            }
            $random_name = substr(number_format(time() * rand(), 0, '', ''), 0, 10);
            $img = $input['base64_image'];
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $set_name_img = $random_name . '.jpeg';
            $file = "public/uploads/Slide/" . $set_name_img;
            file_put_contents($file, $data);
            $input['image_path'] = 'public/uploads/Slide/' . $set_name_img;
        }
        $id = $this->SlideModel->saveSlide($input);
        // save logs
        $ip = $this->request->getIPAddress();
        if (!empty($input['id'])) {
            $this->mainModel->saveLogs('edit', 'slide', $ip, $id);
        } else {
            $this->mainModel->saveLogs('create', 'slide', $ip, $id);
        }
        return redirect()->to(base_url('admin/slide'));
    }

    function deleteSlide()
    {
        $input = $this->request->getPost();
        $result = $this->SlideModel->deleteSlide($input['id']);
        $ip = $this->request->getIPAddress();
        $this->mainModel->saveLogs('delete', 'slide', $ip, $input['id']);
        return $this->response->setJSON($result);
    }
}
