<?php

namespace Modules\Users\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table      = "";
    protected $primaryKey = "";
    protected $allowedFields = [];

    function getNewsCategory()
    {
        $builder = $this->db->table('tbl_news_category');
        $builder->select('*');
        $data = $builder->get()->getResultArray();
        return $data;
    }
    function getListNews($category = '')
    {
        $builder = $this->db->table('news');
        $builder->select('news.* , tbl_news_category.name as category_name');
        $builder->join('tbl_news_category', 'tbl_news_category.id = news.category_id', 'left');
        if (!empty($category)) {
            $builder->where('news.category_id', $category);
        }
        $builder->orderBy('create_at', 'desc');
        $data = $builder->get()->getResultArray();
        return $data;
    }
    function getListNewsById($id = '')
    {
        $builder = $this->db->table('news');
        $builder->select('news.* , tbl_news_category.name as category_name');
        $builder->join('tbl_news_category', 'tbl_news_category.id = news.category_id', 'left');
        if (!empty($id)) {
            $builder->where('news.id', $id);
        }
        $data = $builder->get()->getRowArray();

        return $data;
    }
}
