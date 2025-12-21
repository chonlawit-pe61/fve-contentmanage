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
    public function information_about_personel()
    {
        $data['InformationPersonel'] = $this->informationModel->getInformationPersonel();
        return view("Modules\Admin\Views\Information\information_about_personel", $data);
    }
    public function information_about_personel_form()
    {
        if (!empty($_GET['information_personel_id'])) {
            $information_personel_id = @$_GET['information_personel_id'];
            $data['InformationPersonel'] = $this->informationModel->getInformationPersonel($information_personel_id);
        } else {
            $data['InformationPersonel'] = [];
        }

        return view("Modules\Admin\Views\Information\information_about_personel_form", $data);
    }
    public function ajaxDeleteinformation_about_personel()
    {
        $input = $this->request->getPost();
        $information_personel_id = $input['information_personel_id'];
        $data['InformationPersonel'] = $this->informationModel->deleteInformationPersonel($information_personel_id);
    }

    public function saveInformationPersonel()
    {
        $input = $this->request->getPost();
        $file = $this->request->getFiles();

        $targetDirectoryFile = 'public/uploads/information';
        if (!is_dir($targetDirectoryFile)) {
            mkdir($targetDirectoryFile, 0755, true);
        }
        if (!empty($file)) {
            $fileUploads = $file['file_personel'];
            if ($fileUploads->isValid()) {
                $randomName = $fileUploads->getRandomName();
                $data['fileName'] = $fileUploads->getName();

                $data['randomName'] = $randomName;
                $data['fileType'] = $fileUploads->getClientMimeType();
                $data['fileSize'] = $fileUploads->getSize();
                $fileUploads->move($targetDirectoryFile, $randomName);
                $input['file_path'] = $targetDirectoryFile . '/' . $randomName;
                $input['file_name'] = $data['fileName'];
            }
        }
        $this->informationModel->saveInformationPersonel($input);
        return redirect()->to(base_url('admin/information/information_about_personel'));
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

    public function saveInformationMoney()
    {
        $input = $this->request->getPost();
        $file = $this->request->getFiles();

        $targetDirectoryFile = 'public/uploads/information';
        if (!is_dir($targetDirectoryFile)) {
            mkdir($targetDirectoryFile, 0755, true);
        }
        if (!empty($file)) {
            $fileUploads = $file['file_personel'];
            if ($fileUploads->isValid()) {
                $randomName = $fileUploads->getRandomName();
                $data['fileName'] = $fileUploads->getName();

                $data['randomName'] = $randomName;
                $data['fileType'] = $fileUploads->getClientMimeType();
                $data['fileSize'] = $fileUploads->getSize();
                $fileUploads->move($targetDirectoryFile, $randomName);
                $input['file_path'] = $targetDirectoryFile . '/' . $randomName;
                $input['file_name'] = $data['fileName'];
            }
        }
        $this->informationModel->saveInformationMoney($input);
        return redirect()->to(base_url('admin/information/information_about_money'));
    }

    public function information_about_money()
    {
        $data['InformationMoney'] = $this->informationModel->getInformationMoney();
        return view("Modules\Admin\Views\Information\information_about_money", $data);
    }
    public function information_about_money_form()
    {
        if (!empty($_GET['information_money_id'])) {
            $information_money_id = @$_GET['information_money_id'];
            $data['InformationMoney'] = $this->informationModel->getInformationMoney($information_money_id);
        } else {
            $data['InformationMoney'] = [];
        }

        return view("Modules\Admin\Views\Information\information_about_money_form", $data);
    }
    public function ajaxDeleteinformation_about_money()
    {
        $input = $this->request->getPost();
        $information_money_id = $input['information_money_id'];
        $this->informationModel->deleteInformationMoney($information_money_id);
    }
}
