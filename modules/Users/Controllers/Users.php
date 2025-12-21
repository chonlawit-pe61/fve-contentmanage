<?php

namespace Modules\Users\Controllers;

use App\Controllers\BaseController;
use App\Models\MainModel;
use Modules\Admin\Models\LinkModel;
use Modules\Users\Models\AboutModel;
use Modules\Users\Models\CommonModel;
use Modules\Users\Models\UserModel;

class Users extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $data['date_thai'] = $this->Date_thai;
        $UserModel = new UserModel();
        $AboutModel = new AboutModel();
        $LinkModel = new LinkModel();
        $CommonModel = new CommonModel();


        $ip = $this->request->getIPAddress();
        $CommonModel->saveLogs('view', 'user', $ip, 0);
        $data['personel_count'] = $UserModel->getStateYearly();
        $data['Link'] = $LinkModel->getLink('', 1);
        $data['Link_ITA'] = $LinkModel->getLinkITA();
        $data['news'] = $UserModel->getNewsList(1, 4);
        $data['reward'] = $UserModel->getRewardList('', 4);

        $data['congratulate'] = $UserModel->getNewsList(2, 6);
        $data['slideList'] = $UserModel->getSlideList();

        $data['news_original'] = $UserModel->getNewsList(4, 4);

        $data['information'] = $AboutModel->getInformationEducational();
        // $data['file_type_2'] = $UserModel->getPublicDocument(2);
        // $data['file_type_3'] = $UserModel->getPublicDocument(3);
        // $data['file_type_4'] = $UserModel->getPublicDocument(4);
        // $data['file_type_5'] = $UserModel->getPublicDocument(5);

        return view('Modules\Users\Views\index.php', $data);
    }
}
