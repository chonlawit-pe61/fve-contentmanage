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




    public function publish_year()
    {
        $data['publish_year'] = $this->publishModel->getPublishYear();
        return view("Modules\Admin\Views\Publish\publish_year", $data);
    }

    public function publish_year_form()
    {
        if (!empty($_GET['publish_year_id'])) {
            $publish_year_id = @$_GET['publish_year_id'];
            $data['publish_year'] = $this->publishModel->getPublishYear($publish_year_id);
        } else {
            $data['publish_year'] = [];
        }

        return view("Modules\Admin\Views\Publish\publish_year_form", $data);
    }

    public function ajaxDeletePublishYear()
    {
        $input = $this->request->getPost();
        $publish_year_id = $input['publish_year_id'];
        $this->publishModel->deletePublishYear($publish_year_id);
    }

    public function savePublishYear()
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
        $this->publishModel->savePublishYear($input);
        return redirect()->to(base_url('admin/publish/publish_year'));
    }



    public function publish_sar()
    {
        $data['publish_sar'] = $this->publishModel->getPublishSar();
        return view("Modules\Admin\Views\Publish\publish_sar", $data);
    }

    public function publish_sar_form()
    {
        if (!empty($_GET['publish_sar_id'])) {
            $publish_sar_id = @$_GET['publish_sar_id'];
            $data['publish_sar'] = $this->publishModel->getPublishSar($publish_sar_id);
        } else {
            $data['publish_sar'] = [];
        }

        return view("Modules\Admin\Views\Publish\publish_sar_form", $data);
    }

    public function ajaxDeletePublishSar()
    {
        $input = $this->request->getPost();
        $publish_sar_id = $input['publish_sar_id'];
        $this->publishModel->deletePublishSar($publish_sar_id);
    }

    public function savePublishSar()
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
        $this->publishModel->savePublishSar($input);
        return redirect()->to(base_url('admin/publish/publish_sar'));
    }



    public function publish_external_quality_report()
    {
        $data['publish_external_quality_report'] = $this->publishModel->getPublishExternalQualityReport();
        return view("Modules\Admin\Views\Publish\publish_external_quality_report", $data);
    }

    public function publish_external_quality_report_form()
    {
        if (!empty($_GET['publish_external_quality_report_id'])) {
            $publish_external_quality_report_id = @$_GET['publish_external_quality_report_id'];
            $data['publish_external_quality_report'] = $this->publishModel->getPublishExternalQualityReport($publish_external_quality_report_id);
        } else {
            $data['publish_external_quality_report'] = [];
        }

        return view("Modules\Admin\Views\Publish\publish_external_quality_report_form", $data);
    }

    public function ajaxDeletePublishExternalQualityReport()
    {
        $input = $this->request->getPost();
        $publish_external_quality_report_id = $input['publish_external_quality_report_id'];
        $this->publishModel->deletePublishExternalQualityReport($publish_external_quality_report_id);
    }

    public function savePublishExternalQualityReport()
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
        $this->publishModel->savePublishExternalQualityReport($input);
        return redirect()->to(base_url('admin/publish/publish_external_quality_report'));
    }



    public function publish_summary_report()
    {
        $data['publish_summary_report'] = $this->publishModel->getPublishSummaryReport();
        return view("Modules\Admin\Views\Publish\publish_summary_report", $data);
    }

    public function publish_summary_report_form()
    {
        if (!empty($_GET['publish_summary_report_id'])) {
            $publish_summary_report_id = @$_GET['publish_summary_report_id'];
            $data['publish_summary_report'] = $this->publishModel->getPublishSummaryReport($publish_summary_report_id);
        } else {
            $data['publish_summary_report'] = [];
        }

        return view("Modules\Admin\Views\Publish\publish_summary_report_form", $data);
    }

    public function ajaxDeletePublishSummaryReport()
    {
        $input = $this->request->getPost();
        $publish_summary_report_id = $input['publish_summary_report_id'];
        $this->publishModel->deletePublishSummaryReport($publish_summary_report_id);
    }

    public function savePublishSummaryReport()
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
        $this->publishModel->savePublishSummaryReport($input);
        return redirect()->to(base_url('admin/publish/publish_summary_report'));
    }


    public function publish_repository()
    {
        $data['publish_repository'] = $this->publishModel->getPublishRepository();
        return view("Modules\Admin\Views\Publish\publish_repository", $data);
    }
    public function publish_repository_form()
    {
        if (!empty($_GET['publish_repository_id'])) {
            $publish_repository_id = @$_GET['publish_repository_id'];
            $data['publish_repository'] = $this->publishModel->getPublishRepository($publish_repository_id);
        } else {
            $data['publish_repository'] = [];
        }
        $data['publish_repository_types'] = $this->publishModel->getPublishRepositoryType();

        return view("Modules\Admin\Views\Publish\publish_repository_form", $data);
    }

    public function ajaxDeletePublishRepository()
    {
        $input = $this->request->getPost();
        $publish_repository_id = $input['id'];
        $this->publishModel->deletePublishRepository($publish_repository_id);
    }

    public function savePublishRepository()
    {
        $input = $this->request->getPost();
        $file = $this->request->getFiles();

        $targetDirectoryFile = 'public/uploads/publish_repository';
        if (!is_dir($targetDirectoryFile)) {
            mkdir($targetDirectoryFile, 0777, true);
        }
        if (!empty($file)) {
            $fileUploads = $file['file'];
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
        $this->publishModel->savePublishRepository($input);
        return redirect()->to(base_url('admin/publish/publish_repository'));
    }
}
