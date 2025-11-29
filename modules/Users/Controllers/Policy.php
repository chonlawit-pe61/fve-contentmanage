<?php

namespace Modules\Users\Controllers;

use App\Controllers\BaseController;
use Modules\Admin\Models\UserModel;
use Modules\Users\Models\AboutModel;
use Modules\Users\Models\OrganizationModel;

class Policy extends BaseController
{
    protected $userModel;

    public function __construct() {}
    public function policy($id = '')
    {
        $OrganizationModel = new OrganizationModel();
        $AboutModel = new AboutModel();
        $data['content'] = $AboutModel->getWebContent(1);
        return view('Modules\Users\Views\Policy\policy.php', $data);
    }
    public function securityPolicy($id = '')
    {
        $AboutModel = new AboutModel();
        $data['content'] = $AboutModel->getWebContent(2);
        return view('Modules\Users\Views\Policy\securityPolicy.php', $data);
    }
    public function privacyPolicy($id = '')
    {
        $AboutModel = new AboutModel();
        $data['content'] = $AboutModel->getWebContent(3);
        return view('Modules\Users\Views\Policy\privacyPolicy.php', $data);
    }
}
