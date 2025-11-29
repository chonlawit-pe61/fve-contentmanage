<?php

namespace Modules\Admin\Controllers;

use App\Controllers\BaseController;
use Modules\Admin\Models\RewardModel;

class Reward extends BaseController
{
    protected $RewardModel;

    public function __construct()
    {
        $this->RewardModel = new RewardModel();
    }

    public function ajax_getReward()
    {
        $result = $this->RewardModel->getRewardTables();
        return $result;
    }

    public function index()
    {
        return view('Modules\Admin\Views\Reward\index');
    }

    public function ajax_getNews() {
        $result = $this->RewardModel->getRewardTables();
        return $result;
    }

    public function manage($id = '')
    {
        $data=[];
        if ($id) {
            $data['reward'] = $this->RewardModel->getReward($id);
        }
        return view('Modules\Admin\Views\Reward\manage', $data);
    }

    public function saveReward()
    {
        $input = $this->request->getPost();
        // print_r($input); die;
        if ($input['base64_image']) {
            $saveDir = 'public/uploads/Reward/';
            if (!is_dir($saveDir)) {
                mkdir($saveDir, 0755, true);
            }
            $random_name = substr(number_format(time() * rand(), 0, '', ''), 0, 10);
            $img = $input['base64_image'];
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $set_name_img = $random_name . '.jpeg';
            $file = "public/uploads/Reward/" . $set_name_img;
            file_put_contents($file, $data);
            $input['image_path'] = 'public/uploads/Reward/' . $set_name_img;
        }
        
        $id = $this->RewardModel->saveReward($input);
        // save logs
        $ip = $this->request->getIPAddress();
        if (!empty($input['id'])) {
            $this->mainModel->saveLogs('edit', 'reward', $ip, $id);
        } else {
            $this->mainModel->saveLogs('create', 'reward', $ip, $id);
        }
        return redirect()->to(base_url('admin/reward'));
    }

    function deleteReward()
    {
        $input = $this->request->getPost();
        $result = $this->RewardModel->deleteReward($input['id']);
        // save logs
        $ip = $this->request->getIPAddress();
        $this->mainModel->saveLogs('delete', 'reward', $ip, $input['id']);
        return $this->response->setJSON($result);
    }
}
