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
    public function information_about_successful()
    {
        $data['InformationSuccessful'] = $this->informationModel->getInformationAboutSuccessful();
        return view("Modules\Admin\Views\Information\information_about_successful", $data);
    }
    public function information_about_successful_form()
    {
        if (!empty($_GET['information_successful_id'])) {
            $information_successful_id = @$_GET['information_successful_id'];
            $data['InformationSuccessful'] = $this->informationModel->getInformationAboutSuccessful($information_successful_id);
        } else {
            $data['InformationSuccessful'] = [];
        }

        return view("Modules\Admin\Views\Information\information_about_successful_form", $data);
    }
    public function ajaxDeleteInformationAboutSuccessful()
    {
        $input = $this->request->getPost();
        $information_successful_id = $input['information_successful_id'];
        $this->informationModel->deleteInformationAboutSuccessful($information_successful_id);
    }

    public function saveInformationAboutSuccessful()
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
        $this->informationModel->saveInformationAboutSuccessful($input);
        return redirect()->to(base_url('admin/information/information_about_successful'));
    }

    public function information_about_regulations()
    {
        $data['InformationRegulations'] = $this->informationModel->getInformationAboutRegulations();
        return view("Modules\Admin\Views\Information\information_about_regulations", $data);
    }

    public function information_about_regulations_form()
    {
        if (!empty($_GET['information_regulations_id'])) {
            $information_regulations_id = @$_GET['information_regulations_id'];
            $data['InformationRegulations'] = $this->informationModel->getInformationAboutRegulations($information_regulations_id);
        } else {
            $data['InformationRegulations'] = [];
        }

        return view("Modules\Admin\Views\Information\information_about_regulations_form", $data);
    }

    public function ajaxDeleteInformationAboutRegulations()
    {
        $input = $this->request->getPost();
        $information_regulations_id = $input['information_regulations_id'];
        $this->informationModel->deleteInformationAboutRegulations($information_regulations_id);
    }

    public function saveInformationAboutRegulations()
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
        $this->informationModel->saveInformationAboutRegulations($input);
        return redirect()->to(base_url('admin/information/information_about_regulations'));
    }


    public function information_about_team()
    {
        $data['InformationTeam'] = $this->informationModel->getInformationAboutTeam();
        return view("Modules\Admin\Views\Information\information_about_team", $data);
    }

    public function saveInformationAboutTeam()
    {
        $file = $this->request->getFiles();

        $input = [];
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
        $this->informationModel->saveInformationAboutTeam($input);
        return redirect()->to(base_url('admin/information/information_about_team'));
    }


    public function information_about_course()
    {
        $data['InformationCourse'] = $this->informationModel->getInformationAboutCourse();
        return view("Modules\Admin\Views\Information\information_about_course", $data);
    }

    public function information_about_course_form()
    {
        if (!empty($_GET['information_course_id'])) {
            $information_course_id = @$_GET['information_course_id'];
            $data['InformationCourse'] = $this->informationModel->getInformationAboutCourse($information_course_id);
        } else {
            $data['InformationCourse'] = [];
        }

        return view("Modules\Admin\Views\Information\information_about_course_form", $data);
    }

    public function ajaxDeleteInformationAboutCourse()
    {
        $input = $this->request->getPost();
        $information_course_id = $input['information_course_id'];
        $this->informationModel->deleteInformationAboutCourse($information_course_id);
    }

    public function saveInformationAboutCourse()
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
        $this->informationModel->saveInformationAboutCourse($input);
        return redirect()->to(base_url('admin/information/information_about_course'));
    }


    public function information_about_equipment()
    {
        $data['InformationEquipment'] = $this->informationModel->getInformationAboutEquipment();
        return view("Modules\Admin\Views\Information\information_about_equipment", $data);
    }


    public function information_about_equipment_form()
    {
        if (!empty($_GET['information_equipment_id'])) {
            $information_equipment_id = @$_GET['information_equipment_id'];
            $data['InformationEquipment'] = $this->informationModel->getInformationAboutEquipment($information_equipment_id);
        } else {
            $data['InformationEquipment'] = [];
        }

        return view("Modules\Admin\Views\Information\information_about_equipment_form", $data);
    }


    public function ajaxDeleteInformationAboutEquipment()
    {
        $input = $this->request->getPost();
        $information_equipment_id = $input['information_equipment_id'];
        $this->informationModel->deleteInformationAboutEquipment($information_equipment_id);
    }

    public function saveInformationAboutEquipment()
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
        $this->informationModel->saveInformationAboutEquipment($input);
        return redirect()->to(base_url('admin/information/information_about_equipment'));
    }

    public function information_about_map()
    {
        $data['InformationMap'] = $this->informationModel->getInformationAboutMap();
        return view("Modules\Admin\Views\Information\information_about_map", $data);
    }

    public function information_about_map_form()
    {
        if (!empty($_GET['information_map_id'])) {
            $information_map_id = @$_GET['information_map_id'];
            $data['InformationMap'] = $this->informationModel->getInformationAboutMap($information_map_id);
        } else {
            $data['InformationMap'] = [];
        }

        return view("Modules\Admin\Views\Information\information_about_map_form", $data);
    }



    public function ajaxDeleteInformationAboutMap()
    {
        $input = $this->request->getPost();
        $information_map_id = $input['information_map_id'];
        $this->informationModel->deleteInformationAboutMap($information_map_id);
    }

    public function saveInformationAboutMap()
    {
        $file = $this->request->getFiles();

        $input = [];
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
        $this->informationModel->saveInformationAboutMap($input);
        return redirect()->to(base_url('admin/information/information_about_map'));
    }
}
