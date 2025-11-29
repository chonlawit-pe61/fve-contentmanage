<?php

namespace Modules\Admin\Controllers;

use App\Controllers\BaseController;
use Modules\Admin\Models\DocumentModel;

class Document extends BaseController
{
    protected $courseModel;
    public function __construct()
    {
        $this->DocumentModel = new DocumentModel();
    }

    public function index()
    {
        $data['document'] = $this->DocumentModel->getPublicDocument();
        return view("Modules\Admin\Views\Document\index", $data);
    }

    public function documentForm($id = '')
    {
        $data['document'] = $this->DocumentModel->getPublicDocument($id);
        return view("Modules\Admin\Views\Document\document_form", $data);
    }
    public function manageDocument()
    {
        $input = $this->request->getPost();
        $this->DocumentModel->manageDocument($input);
        return redirect()->to(base_url('admin/Document'));
    }
    public function documentListFile($id = '')
    {
        $data['id'] = $id;
        if (!empty($_GET['year'])) {
            $year = $_GET['year'];
        }
        $data['document_file'] = $this->DocumentModel->getDocumentFile($id);
        return view("Modules\Admin\Views\Document\document_file_list", $data);
    }
    public function documentFormFile($id = '', $id_file = '')
    {
        $data['public_document_id'] = $id;
        $data['public_document_file_id'] = $id_file;
        $data['document_file'] = $this->DocumentModel->getDocumentFileById($id_file);

        return view("Modules\Admin\Views\Document\document_form_file", $data);
    }
    public function manageDocumentFile()
    {
        $input = $this->request->getPost();
        $files = $this->request->getFiles();
        $targetDirectoryFile = 'public/uploads/documents';
        if (!is_dir($targetDirectoryFile)) {
            mkdir($targetDirectoryFile, 0755, true);
        }
        $fileUploads = $files['file'];
        if ($fileUploads->isValid()) {
            $randomName = $fileUploads->getRandomName();
            $data['fileName'] = $fileUploads->getName();
            $data['randomName'] = $randomName;
            $data['fileType'] = $fileUploads->getClientMimeType();
            $data['fileSize'] = $fileUploads->getSize();
            $fileUploads->move($targetDirectoryFile, $randomName);
            $input['file'] = $targetDirectoryFile . '/' . $randomName;
        }

        $this->DocumentModel->manageDocumentFile($input);
        return redirect()->to(base_url('admin/Document/listFile/' . $input['public_document_id']));
    }
    public function deleteDocumentFile()
    {
        $input = $this->request->getPost();
        $this->DocumentModel->deleteDocumentFileById($input);
    }

    public function ShowContentDocument()
    {
        $input = $this->request->getPost();
        $this->DocumentModel->showDocumentById($input);
        return json_encode($input);
    }
    public function deleteDocument()
    {
        $input = $this->request->getPost();
        $this->DocumentModel->deleteDocumentById($input);
    }
}
