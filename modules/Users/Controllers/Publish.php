<?php

namespace Modules\Users\Controllers;

use App\Controllers\BaseController;
use Modules\Users\Models\PublishModel;

class Publish extends BaseController
{
    protected $publishModel;
    public function __construct()
    {
        $this->publishModel = new PublishModel();
    }
    public function publishEducationalDevelopment()
    {
        $data['date_thai'] = $this->Date_thai;
        $data['publishEducationalDevelopment'] = $this->publishModel->getPublishEducationalDevelopment();
        return view('Modules\Users\Views\publish\publish_educational_development.php', $data);
    }
    public function publishYear()
    {
        $data['date_thai'] = $this->Date_thai;
        $data['publishYear'] = $this->publishModel->getPublishYear();
        return view('Modules\Users\Views\publish\publish_year.php', $data);
    }
    public function publishSar()
    {
        $data['date_thai'] = $this->Date_thai;
        $data['publishSar'] = $this->publishModel->getPublishSar();
        return view('Modules\Users\Views\publish\publish_sar.php', $data);
    }
    public function publishExternalQualityReport()
    {
        $data['date_thai'] = $this->Date_thai;
        $data['publishExternalQualityReport'] = $this->publishModel->getPublishExternalQualityReport();
        return view('Modules\Users\Views\publish\publish_external_quality_report.php', $data);
    }
    public function publishSummaryReport()
    {
        $data['date_thai'] = $this->Date_thai;
        $data['publishSummaryReport'] = $this->publishModel->getPublishSummaryReport();
        return view('Modules\Users\Views\publish\publish_summary_report.php', $data);
    }
}
