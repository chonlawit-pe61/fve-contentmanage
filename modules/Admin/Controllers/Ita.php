<?php

namespace Modules\Admin\Controllers;

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
        return view('Modules\Admin\Views\Ita\index', $data);
    }

    // --- Topics ---

    public function topics($year)
    {
        $data['year'] = $year;
        $data['topics'] = $this->itaModel->getTopics($year);
        return view('Modules\Admin\Views\Ita\topics', $data);
    }

    public function manage_topic($id = null)
    {
        $year = $this->request->getGet('year');
        if ($id) {
            $data['topic'] = $this->itaModel->getTopic($id);
            $year = $data['topic']['ita_year'];
        }
        $data['year'] = $year;
        return view('Modules\Admin\Views\Ita\form_topic', $data);
    }

    public function save_topic()
    {
        $input = $this->request->getPost();
        $this->itaModel->saveTopic($input);
        return redirect()->to(base_url('admin/ita/topics/' . $input['ita_year']));
    }

    public function delete_topic($id)
    {
        $this->itaModel->deleteTopic($id);
        return redirect()->back();
    }

    // --- Subtopics ---

    public function subtopics($topic_id)
    {
        $data['topic'] = $this->itaModel->getTopic($topic_id);
        $data['subtopics'] = $this->itaModel->getSubtopics($topic_id);
        return view('Modules\Admin\Views\Ita\subtopics', $data);
    }

    public function manage_subtopic($id = null)
    {
        $topic_id = $this->request->getGet('topic_id');
        if ($id) {
            $data['subtopic'] = $this->itaModel->getSubtopic($id);
            $topic_id = $data['subtopic']['ita_topic_id'];
        }
        $data['topic'] = $this->itaModel->getTopic($topic_id);
        return view('Modules\Admin\Views\Ita\form_subtopic', $data);
    }

    public function save_subtopic()
    {
        $input = $this->request->getPost();
        $this->itaModel->saveSubtopic($input);
        return redirect()->to(base_url('admin/ita/subtopics/' . $input['ita_topic_id']));
    }

    public function delete_subtopic($id)
    {
        $this->itaModel->deleteSubtopic($id);
        return redirect()->back();
    }

    // --- Links ---

    public function links($subtopic_id)
    {
        $data['subtopic'] = $this->itaModel->getSubtopic($subtopic_id);
        $data['links'] = $this->itaModel->getLinks($subtopic_id);
        return view('Modules\Admin\Views\Ita\links', $data);
    }

    public function save_link()
    {
        $input = $this->request->getPost();
        $this->itaModel->saveLink($input);
        return redirect()->to(base_url('admin/ita/links/' . $input['ita_subtopic_id']));
    }

    public function delete_link($id)
    {
        $this->itaModel->deleteLink($id);
        return redirect()->back();
    }
}
