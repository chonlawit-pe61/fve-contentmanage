<?php

namespace Modules\Users\Controllers;

use App\Controllers\BaseController;
use Modules\Users\Models\AboutModel;
use Modules\Users\Models\DocumentModel;

class Document extends BaseController
{
    public function __construct() {}
    public function index($id = '')
    {
        $AboutModel = new AboutModel();
        $DocumentModel = new DocumentModel();
        $type = @$_GET['type'];
        $data['information'] = $AboutModel->getInformationEducational();
        $data['date_thai'] = $this->Date_thai;
        $data['publicDocument'] = $DocumentModel->getPublicDocument($type);
        $data['documentFile'] = $DocumentModel->getDocumentFile($type);

        return view('Modules\Users\Views\document\sar.php', $data);
    }
}
