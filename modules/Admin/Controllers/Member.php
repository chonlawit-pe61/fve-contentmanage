<?php

namespace Modules\Admin\Controllers;

use App\Controllers\BaseController;
use Modules\Admin\Models\MemberModel;
use Modules\Admin\Models\OrganizationModel;

class Member extends BaseController
{
    protected $memberModel;
    protected $organizationModel;
    public function __construct()
    {
        $this->memberModel = new MemberModel();
        $this->organizationModel = new OrganizationModel();
    }

    public function index()
    {
        return view("Modules\Admin\Views\Member\index");
    }

    public function ajax_getMembers()
    {
        $result = $this->memberModel->getMemberTables();
        return $result;
    }

    public function manage($id = '')
    {
        $data['organizations'] = $this->organizationModel->getOrganization();
        $data['org_levels'] = $this->organizationModel->get_organize_level();
        $data['prename'] = $this->memberModel->getPrename();
        $data['graduation'] = $this->memberModel->getGraduation();
        $data['course'] = $this->memberModel->getCourse();
        $data['courseLevel'] = $this->memberModel->getCourseLevel();

        if ($id) {
            $data['member'] = $this->memberModel->getMember($id);
            $data['member_org'] = $this->memberModel->getMemberOrg($id);
            $data['member_course'] = $this->memberModel->getMemberCourse($id);
        }
        return view("Modules\Admin\Views\Member\manage", $data);
    }

    public function saveMember()
    {
        $input = $this->request->getPost();
        if ($input['base64_image']) {
            $saveDir = 'public/uploads/members/';
            if (!is_dir($saveDir)) {
                mkdir($saveDir, 0755, true);
            }
            $random_name = substr(number_format(time() * rand(), 0, '', ''), 0, 10);
            $img = $input['base64_image'];
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $set_name_img = $random_name . '.jpeg';
            $file = "public/uploads/members/" . $set_name_img;
            file_put_contents($file, $data);
            $input['image_path'] = 'public/uploads/members/' . $set_name_img;
        }
        $id = $this->memberModel->saveMember($input);
        // save logs
        $ip = $this->request->getIPAddress();
        if (!empty($input['id'])) {
            $this->mainModel->saveLogs('edit', 'member', $ip, $id);
        } else {
            $this->mainModel->saveLogs('create', 'member', $ip, $id);
        }
        return redirect()->to(base_url('admin/member'));
    }

    function deleteMember()
    {
        $input = $this->request->getPost();
        $result = $this->memberModel->deleteMember($input['id']);
        // save logs
        $ip = $this->request->getIPAddress();
        $this->mainModel->saveLogs('delete', 'member', $ip, $input['id']);
        return $this->response->setJSON($result);
    }
}
