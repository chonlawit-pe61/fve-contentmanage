<?php

namespace Modules\Admin\Controllers;

use App\Controllers\BaseController;
use Modules\Admin\Models\LawModel;
use CodeIgniter\Files\File;
use Modules\Admin\Models\LinkModel;

class Link extends BaseController
{
    protected $lawModel;
    public function __construct()
    {
        $this->lawModel = new LawModel();
    }

    public function index()
    {
        $LinkModel = new LinkModel();
        $data['Link'] = $LinkModel->getLink();
        return view("Modules\Admin\Views\Link\index", $data);
    }
    public function manage()
    {
        $LinkModel = new LinkModel();
        $data['icon'] = $LinkModel->getIcon();
        if (!empty($_GET['id'])) {
            $data['Link'] = $LinkModel->getLink($_GET['id'], 1);
        }

        return view("Modules\Admin\Views\Link\manage.php", $data);
    }
    public function saveLink()
    {
        $input = $this->request->getPost();
        $LinkModel = new LinkModel();
        $LinkModel->manageLink($input);
        return redirect()->to(base_url('admin/Link'));
    }
    public function deleteLink()
    {
        $input = $this->request->getPost();
        $LinkModel = new LinkModel();
        $LinkModel->deleteLink($input);
        return json_encode($input);
    }
}
