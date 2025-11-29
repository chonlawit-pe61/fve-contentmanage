<?php

namespace Modules\Users\Controllers;

use App\Controllers\BaseController;
use Modules\Users\Models\AboutModel;
use Modules\Users\Models\CommonModel;
use Modules\Users\Models\NewsModel;

class News extends BaseController
{
    public function __construct() {}
    public function index($id = '')
    {
        $AboutModel = new AboutModel();
        $NewsModel = new NewsModel();
        $category = @$_GET['category'];
        $data['information'] = $AboutModel->getInformationEducational();
        $data['category'] = $NewsModel->getNewsCategory();
        $data['news'] = $NewsModel->getListNews($category);
        $data['date_thai'] = $this->Date_thai;
        return view('Modules\Users\Views\new\new_list.php', $data);
    }
    public function new_detail($id = '')
    {
        $AboutModel = new AboutModel();
        $NewsModel = new NewsModel();
        $data['information'] = $AboutModel->getInformationEducational();
        $data['date_thai'] = $this->Date_thai;
        $data['news'] = $NewsModel->getListNewsById($id);


        $CommonModel = new CommonModel();
        $ip = $this->request->getIPAddress();
        $CommonModel->saveLogs('view', 'news', $ip, $id);
        // echo '<pre>';
        // print_r($data);
        // exit;


        return view('Modules\Users\Views\new\new_detail.php', $data);
    }
}
