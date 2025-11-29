<?php

namespace Modules\Users\Controllers;

use App\Controllers\BaseController;
use Modules\Admin\Models\UserModel;
use Modules\Users\Models\AboutModel;
use Modules\Users\Models\OrganizationModel;

class Contact extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function contact($id = '')
    {
        $AboutModel = new AboutModel();
        $data['information'] = $AboutModel->getInformationEducational();
        $data['date_thai'] = $this->Date_thai;
        return view('Modules\Users\Views\contact\contact.php', $data);
    }
}
