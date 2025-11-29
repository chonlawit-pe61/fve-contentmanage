<?php

namespace Modules\Admin\Controllers;

use App\Controllers\BaseController;
use Modules\Admin\Models\NewsModel;

class News extends BaseController
{
    protected $newsModel;

    public function __construct()
    {
        $this->newsModel = new NewsModel();
    }

    public function ajax_getNews()
    {
        $result = $this->newsModel->getNewsTables();
        return $result;
    }

    public function index()
    {
        return view('Modules\Admin\Views\News\index');
    }

    public function manage($id = '')
    {
        if ($id) {
            $data['news'] = $this->newsModel->getNews($id);
        }
        $data['category'] = $this->newsModel->getNewsCategory();
        return view('Modules\Admin\Views\News\manage', $data);
    }

    public function saveNews()
    {
        $input = $this->request->getPost();
        // print_r($input); die;
        $file = $this->request->getFile('file');

        $saveDir = 'public/uploads/news/';
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
                $input['document_path'] = $saveDir . $data['fileName'];
                $input['document_name'] = $data['fileName'];
            }
        }

        if ($input['base64_image']) {
            $saveDir = 'public/uploads/news/';
            if (!is_dir($saveDir)) {
                mkdir($saveDir, 0755, true);
            }
            $random_name = substr(number_format(time() * rand(), 0, '', ''), 0, 10);
            $img = $input['base64_image'];
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $set_name_img = $random_name . '.jpeg';
            $file = "public/uploads/news/" . $set_name_img;
            file_put_contents($file, $data);
            $input['image_path'] = 'public/uploads/news/' . $set_name_img;
        }
        $id = $this->newsModel->saveNews($input);
        // save logs
        $ip = $this->request->getIPAddress();
        if (!empty($input['id'])) {
            $this->mainModel->saveLogs('edit', 'news', $ip, $id);
        } else {
            $this->mainModel->saveLogs('create', 'news', $ip, $id);
        }
        return redirect()->to(base_url('admin/news'));
    }

    function deleteNews()
    {
        $input = $this->request->getPost();
        $result = $this->newsModel->deleteNews($input['id']);

        // save logs
        $ip = $this->request->getIPAddress();
        $this->mainModel->saveLogs('delete', 'news', $ip, $input['id']);
        return $this->response->setJSON($result);
    }

    public function deleteFile()
    {
        $input = $this->request->getPost();
        $law = $this->newsModel->getNews($input['id']);
        if (!empty($law['document_path'])) {
            unlink($law['document_path']);
            $input['set_document_null'] = true;
            $result = $this->newsModel->saveNews($input);
        }
        return $result;
    }
}
