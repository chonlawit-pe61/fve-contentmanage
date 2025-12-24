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
}
