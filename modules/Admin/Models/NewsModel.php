<?php

namespace Modules\Admin\Models;

use CodeIgniter\Model;
use \Hermawan\DataTables\DataTable;

class NewsModel extends Model
{
    protected $table      = "news";
    protected $primaryKey = "";
    protected $allowedFields = [];


    function getNewsCategory()
    {
        $builder = $this->db->table('tbl_news_category');
        $result = $builder->select('*')->where('is_active', 1)->get()->getResultArray();
        return $result;
    }

    function getNews($id = '')
    {
        $builder = $this->db->table($this->table);
        $builder->select("$this->table.*");
        if ($id) {
            $builder->where('id', $id);
            $result = $builder->get()->getRowArray();
        } else {
            $result = $builder->get()->getResultArray();
        }
        return $result;
    }

    function getNewsTables()
    {
        $builder = $this->db->table($this->table);
        $builder->select("$this->table.id,
            $this->table.title,
            $this->table.image_path,
            $this->table.create_at,
            $this->table.update_at,
            $this->table.is_showing,
            tbl_news_category.name as category_name");
        $builder->join("tbl_news_category", "$this->table.category_id = tbl_news_category.id", "left");
        return DataTable::of($builder)
            ->edit('image_path', function ($row, $meta) {
                if (!empty($row->image_path)) {
                    if (file_exists('./' . $row->image_path)) {
                        $img_link = base_url() . '/' . $row->image_path;
                    } else {
                        $img_link = base_url('public/img/news.webp');
                    }
                } else {
                    $img_link = base_url('public/img/news.webp');
                }

                $pined = '';
                if ($row->is_showing == 1) {
                    $pined = '<i class="text-danger ti ti-pin" style="font-size: 18px;"></i>';
                }
                $image =  <<<HTML
                <div class="d-flex align-items-center">
                    <div class="me-2 pe-1">
                        <img src="$img_link" class="" width="40" height="40" alt="modernize-img">
                    </div>
                    <div class="d-flex align-items-center" style="word-break: break-all;">
                        <h6 class="fw-semibold mb-1 td-truncate text-truncate"> $row->title </h6>
                    </div>  
                    $pined                          
                </div>
                HTML;
                return $image;
            })
            ->edit('create_at', function ($row, $meta) {
                return date('d/m/Y', strtotime($row->create_at));
            })
            ->add('action', function ($row) {
                $tool = '';
                $editLink = base_url('admin/news/manage/' . $row->id);
                $tool .= <<<HTML
                    <a href="$editLink" class="btn btn-warning btn-sm"><i class="ti ti-pencil"></i></a>
                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteNews('$row->id')"><i class="ti ti-trash"></i></button>
                HTML;
                return $tool;
            })
            ->setSearchableColumns(['title', 'create_at'])
            ->addNumbering()
            ->toJson(true);
    }

    function saveNews($input)
    {
        $builder = $this->db->table($this->table);

        if (!empty($input['title'])) {
            $builder->set('title', $input['title']);
        }
        if (!empty($input['category_id'])) {
            $builder->set('category_id', $input['category_id']);
        }
        if (!empty($input['description'])) {
            $builder->set('description', $input['description']);
        }
        if (!empty($input['image_path'])) {
            $builder->set('image_path', $input['image_path']);
        }
        if (!empty($input['document_path'])) {
            $builder->set('document_path', $input['document_path']);
        }
        if (!empty($input['document_name'])) {
            $builder->set('document_name', $input['document_name']);
        }
        if (!empty($input['set_document_null'])) {
            $builder->set('document_path', null);
        }
        if (!empty($input['is_showing'])) {
            $builder->set('is_showing', 1);
        } else {
            $builder->set('is_showing', 0);
        }
        if (!empty($input['id'])) {
            if (!empty($input['create_at'])) {
                $format_date = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $input['create_at'])));
                // echo $format_date; die;
                $builder->set('create_at', $format_date);
            }
            $builder->set('update_at', date('Y-m-d H:i:s'));
            $builder->where('id', $input['id']);
            $builder->update();
            return $input['id'];
        } else {
            if (!empty($input['create_at'])) {
                $format_date = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $input['create_at'])));
                // echo $format_date; die;
                $builder->set('create_at', $format_date);
            }
            $builder->set('update_at', date('Y-m-d H:i:s'));
            $builder->insert();
            return $this->db->insertID();
        }
    }

    function deleteNews($id)
    {
        $builder = $this->db->table($this->table);

        $data = $builder->select('*')->where('id', $id)->get()->getRowArray();
        if (!empty($data['image_path'])) {
            unlink($data['image_path']);
        }

        $builder->where('id', $id)->delete();
        return "ลบข้อมูลสำเร็จ";
    }
}
