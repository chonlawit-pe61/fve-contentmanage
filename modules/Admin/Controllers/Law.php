<?php

namespace Modules\Admin\Controllers;

use App\Controllers\BaseController;
use Modules\Admin\Models\LawModel;
use CodeIgniter\Files\File;

class Law extends BaseController
{
    protected $lawModel;
    public function __construct()
    {
        $this->lawModel = new LawModel();
    }

    public function index()
    {
        return view("Modules\Admin\Views\Law\index");
    }

    public function ajax_getLaw()
    {
        $result = $this->lawModel->getLawsTables();
        return $result;
    }

    public function manage($id = '')
    {
        if ($id) {
            $data['law'] = $this->lawModel->getLaw($id);
        }
        $data['law_types'] = $this->lawModel->getLawTypes();
        return view("Modules\Admin\Views\Law\manage", $data);
    }

    public function saveLaw()
    {
        $input = $this->request->getPost();
        // save file
        $file = $this->request->getFile('file');

        $saveDir = 'public/uploads/laws/';
        if (!is_dir($saveDir)) {
            mkdir($saveDir, 0755, true);
        }

        if (!empty($file)) {
            if ($file->isValid()) {
                // $randomName = $file->getRandomName();
                $data['fileName'] = $file->getName();
                // $data['randomName'] = $randomName;
                $data['fileType'] = $file->getClientMimeType();
                $data['fileSize'] = $file->getSize();

                $file->move($saveDir, $data['fileName']);
                $input['file_path'] = $saveDir . $data['fileName'];
            }
        }

        $result = $this->lawModel->saveLaw($input);
        session()->setFlashdata('msg', $result);
        // save logs
        $ip = $this->request->getIPAddress();
        $id = $result['id'];
        if (!empty($input['id'])) {
            $this->mainModel->saveLogs('edit', 'law', $ip, $id);
        } else {
            $this->mainModel->saveLogs('create', 'law', $ip, $id);
        }
        return redirect()->to(base_url('admin/law'));
    }

    function deleteLaw()
    {
        $input = $this->request->getPost();
        $result = $this->lawModel->deleteLaw($input['id']);
        // save logs
        $ip = $this->request->getIPAddress();
        $this->mainModel->saveLogs('delete', 'law', $ip,  $input['id']);
        return $this->response->setJSON($result);
    }

    public function deleteFile()
    {
        $input = $this->request->getPost();
        $law = $this->lawModel->getLaw($input['id']);
        if (!empty($law['file_path'])) {
            unlink($law['file_path']);
            $input['set_file_null'] = true;
            $result = $this->lawModel->saveLaw($input);
        }
        return $result;
    }
}
