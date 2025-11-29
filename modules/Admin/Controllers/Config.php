<?php

namespace Modules\Admin\Controllers;

use App\Controllers\BaseController;
use Modules\Admin\Models\ConfigModel;

class Config extends BaseController
{
    protected $configModel;
    public function __construct()
    {
        $this->configModel = new ConfigModel();
    }

    public function website_content()
    {
        $input = $this->request->getGet();
        $data['data'] = $this->configModel->getContent($input);
        return view("Modules\Admin\Views\Config\manage", $data);
    }

    public function saveContent() {
        $input = $this->request->getPost();
        $result = $this->configModel->saveContent($input);
        return redirect()->to(base_url('admin/dashboard'));
    }
}
