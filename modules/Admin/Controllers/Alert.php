<?php

namespace Modules\Admin\Controllers;

use App\Controllers\BaseController;
use Modules\Admin\Models\AlertModel;
use Modules\Admin\Models\CourseModel;

class Alert extends BaseController
{
    protected $courseModel;
    public function __construct() {}

    public function index()
    {

        $AlertModel = new AlertModel();
        $data['alert'] =  $AlertModel->getListAlert();
        return view("Modules\Admin\Views\Alert\index", $data);
    }
    public function manage($id = '')
    {
        $AlertModel = new AlertModel();
        $date_thai = $this->Date_thai;
        if (!empty($id)) {
            $data['alert'] = $AlertModel->getListAlertById($id);
            $data['alert_img'] = $AlertModel->getListAlertImg($id);
        }
        if (!empty($data['alert'])) {
            $data['alert']['show_date'] = $date_thai->dateFormat($data['alert']['show_date'], 'engthai2');
        }



        return view("Modules\Admin\Views\Alert\manage", $data);
    }

    public function saveAlert()
    {
        $input = $this->request->getPost();
        $AlertModel = new AlertModel();
        if (!empty($input['profile_img_data'])) {
            $base64All = explode('img_url', $input['profile_img_data']);
            $base64All = array_filter(array_map('trim', $base64All)); // ล้างช่องว่าง/ว่าง
            $saveDir = 'public/uploads/alert/';
            if (!is_dir($saveDir)) {
                mkdir($saveDir, 0755, true);
            }
            $imagePaths = [];
            foreach ($base64All as $index => $img) {
                // ตรวจสอบชนิดของภาพ
                $extension = 'jpeg';
                if (strpos($img, 'image/png') !== false) {
                    $img = str_replace('data:image/png;base64,', '', $img);
                    $extension = 'png';
                } elseif (strpos($img, 'image/jpeg') !== false || strpos($img, 'image/jpg') !== false) {
                    $img = str_replace('data:image/jpeg;base64,', '', $img);
                    $extension = 'jpeg';
                }

                $img = str_replace(' ', '+', $img);
                $data = base64_decode($img);
                if ($data === false) {
                    continue; // ข้ามถ้า decode ไม่สำเร็จ
                }

                $random_name = substr(number_format(time() * rand(), 0, '', ''), 0, 10);
                $filename = $random_name . '.' . $extension;
                $filePath = $saveDir . $filename;

                file_put_contents($filePath, $data);

                $imagePaths[] = 'public/uploads/alert/' . $filename; // เก็บ path ของแต่ละภาพ
            }
            $input['image_paths'] = $imagePaths;
        }
        // echo '<pre>';
        // print_r($input);
        $input['show_date'] = $this->Date_thai->dateFormat($input['show_date'], 'thailinuxplus');
        // print_r($input);
        // die();
        // $input['show_date'] = $this->db
        $AlertModel->manageAlert($input);
        return redirect()->to(base_url('admin/Alert'));
    }
    public function manageDeleteAlert()
    {
        $AlertModel = new AlertModel();
        $input = $this->request->getPost();
        $data['alert'] = $AlertModel->DeleteAlertById($input['id']);
        return 1;
    }
}
