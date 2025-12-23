<?php

namespace Modules\Admin\Controllers;

use App\Controllers\BaseController;
use Modules\Admin\Models\OrganizationModel;

class Organization extends BaseController
{
    protected $organizationModel;
    public function __construct()
    {
        $this->organizationModel = new OrganizationModel();
    }

    public function index()
    {
        $data['organizations'] = $this->organizationModel->getOrganization();
        // echo "<pre>";
        // print_r($data['organizations']);exit;
        return view("Modules\Admin\Views\Organization\index", $data);
    }

    public function saveOrganize()
    {
        $input = $this->request->getPost();
        // print_r($input);
        $id = $this->organizationModel->saveOrganize($input);
        // save logs
        $ip = $this->request->getIPAddress();
        if (!empty($input['id'])) {
            $this->mainModel->saveLogs('edit', 'organization', $ip, $id);
        } else {
            $this->mainModel->saveLogs('create', 'organization', $ip, $id);
        }
        return redirect()->to(base_url('admin/organization'));
    }
    public function deleteOrganization()
    {
        $input = $this->request->getPost();
        $id = $this->organizationModel->deleteOrganization($input);
        return json_encode($id);
    }
}
