<?php

namespace Modules\Admin\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    private $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function index()
    {
        $data['members'] = $this->db->table('member')->select('count(id) as value')->get()->getRowArray();
        $data['news'] = $this->db->table('news')->select('count(id) as value')->get()->getRowArray();
        $data['rewards'] = $this->db->table('reward')->select('count(id) as value')->get()->getRowArray();
        $data['course'] = $this->db->table('course')->select('count(id) as value')->where('parent_id != ', 0)->get()->getRowArray();
        $data['views_count'] = $this->db->table('logs')->select('count(id) as value')->where('action', 'view')->get()->getRowArray();

        $data['student_state'] = $this->db->table('state_yearly')->select("
            edu_year,
            (SUM(voc_1_value) + SUM(voc_2_value) + SUM(voc_3_value) + SUM(voc_residue_value)) as voc_value,
            SUM(hvoc_1_value) + SUM(hvoc_2_value) + SUM(hvoc_residue_value) as hvoc_value
        ")->groupBy("edu_year")->orderBy("edu_year", "DESC")->limit(3)->get()->getResultArray();

        $data['top5_news'] = $this->db->table('news')->select('news.*, 
            tbl_news_category.name as category_name, 
            (
                select count(id)
                from logs
                where logs.action = "view" and logs.modules = "news" and logs.content_id = news.id
            ) as views')->join('tbl_news_category', 'news.category_id = tbl_news_category.id', 'left')->limit(5)->get()->getResultArray();
        // echo "<pre>";
        // print_r($data['members']); exit;
        return view("Modules\Admin\Views\Home\index", $data);
    }
}
