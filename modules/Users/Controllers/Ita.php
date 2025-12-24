<?php

namespace Modules\Users\Controllers;

use App\Controllers\BaseController;
use Modules\Admin\Models\ItaModel;

class Ita extends BaseController
{
    protected $itaModel;

    public function __construct()
    {
        $this->itaModel = new ItaModel();
    }

    public function index()
    {
        $data['years'] = $this->itaModel->getYears();

        // Determine active year
        $activeYear = $this->request->getGet('year');

        // If no year selected, default to the latest year (first in the list because of DESC sort)
        if (empty($activeYear) && !empty($data['years'])) {
            $activeYear = $data['years'][0]['ita_year'];
        }

        $data['active_year'] = $activeYear;

        // Fetch topics for the active year
        if ($activeYear) {
            $topics = $this->itaModel->getTopics($activeYear);

            // Populate subtopics and links for each topic
            foreach ($topics as &$topic) {
                $subtopics = $this->itaModel->getSubtopics($topic['id']);

                foreach ($subtopics as &$subtopic) {
                    $subtopic['links'] = $this->itaModel->getLinks($subtopic['id']);
                }

                $topic['subtopics'] = $subtopics;
            }

            $data['topics'] = $topics;
        } else {
            $data['topics'] = [];
        }

        return view('Modules\Users\Views\Ita\index', $data);
    }
}
