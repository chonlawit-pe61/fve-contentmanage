<?php

namespace Modules\Users\Controllers;

use App\Controllers\BaseController;
use Modules\Admin\Models\UserModel;
use Modules\Users\Models\OrganizationModel;

class Organization extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function organization($id = '')
    {
        $OrganizationModel = new OrganizationModel();
        $data['org'] = $OrganizationModel->getOrganizationWithParentAndChildren($id);
        $data['date_thai'] = $this->Date_thai;
        return view('Modules\Users\Views\organization\organization.php', $data);
    }
    public function organization_personal($personal_id = '')
    {
        $OrganizationModel = new OrganizationModel();
        $data['personal'] = $OrganizationModel->getPersonalOrganization($personal_id);
        $data['date_thai'] = $this->Date_thai;

        return view('Modules\Users\Views\organization\organization_personal.php', $data);
    }
}
