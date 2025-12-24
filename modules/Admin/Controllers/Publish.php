<?php

namespace Modules\Admin\Controllers;

use App\Controllers\BaseController;
use Modules\Admin\Models\PublishModel;

class Publish extends BaseController
{
    protected $publishModel;
    public function __construct()
    {
        $this->publishModel = new PublishModel();
    }

    public function publish_educational_development()
    {
        $data['publish_educational_development'] = $this->publishModel->getPublishEducationalDevelopment();
        return view("Modules\Admin\Views\Publish\publish_educational_development", $data);
    }

    public function publish_educational_development_form()
    {
        if (!empty($_GET['publish_educational_development_id'])) {
            $publish_educational_development_id = @$_GET['publish_educational_development_id'];
            $data['publish_educational_development'] = $this->publishModel->getPublishEducationalDevelopment($publish_educational_development_id);
        } else {
            $data['publish_educational_development'] = [];
        }

        return view("Modules\Admin\Views\Publish\publish_educational_development_form", $data);
    }

    public function ajaxDeletePublishEducationalDevelopment()
    {
        $input = $this->request->getPost();
        $publish_educational_development_id = $input['publish_educational_development_id'];
        $this->publishModel->deletePublishEducationalDevelopment($publish_educational_development_id);
    }

    public function savePublishEducationalDevelopment()
    {
        $input = $this->request->getPost();
        $file = $this->request->getFiles();

        $targetDirectoryFile = 'public/uploads/information';
        if (!is_dir($targetDirectoryFile)) {
            mkdir($targetDirectoryFile, 0755, true);
        }
        if (!empty($file)) {
            $fileUploads = $file['file_personel'];
            if ($fileUploads->isValid()) {
                $randomName = $fileUploads->getRandomName();
                $data['fileName'] = $fileUploads->getName();

                $data['randomName'] = $randomName;
                $data['fileType'] = $fileUploads->getClientMimeType();
                $data['fileSize'] = $fileUploads->getSize();
                $fileUploads->move($targetDirectoryFile, $randomName);
                $input['file_path'] = $targetDirectoryFile . '/' . $randomName;
                $input['file_name'] = $data['fileName'];
            }
        }
        $this->publishModel->savePublishEducationalDevelopment($input);
        return redirect()->to(base_url('admin/publish/publish_educational_development'));
    }
}
