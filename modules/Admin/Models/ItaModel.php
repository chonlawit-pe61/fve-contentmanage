<?php

namespace Modules\Admin\Models;

use CodeIgniter\Model;

class ItaModel extends Model
{
    // --- Topics / Years ---

    function getYears()
    {
        $builder = $this->db->table('ita_topics');
        $builder->select('ita_year');
        $builder->distinct();
        $builder->orderBy('ita_year', 'DESC');
        $result = $builder->get()->getResultArray();
        return $result;
    }

    function getTopics($year)
    {
        $builder = $this->db->table('ita_topics');
        $builder->where('ita_year', $year);
        $builder->orderBy('list_order', 'ASC');
        $result = $builder->get()->getResultArray();
        return $result;
    }

    function getTopic($id)
    {
        $builder = $this->db->table('ita_topics');
        $builder->where('id', $id);
        $result = $builder->get()->getRowArray();
        return $result;
    }

    function saveTopic($input)
    {
        $builder = $this->db->table('ita_topics');

        if (!empty($input['ita_year'])) {
            $builder->set('ita_year', $input['ita_year']);
        }
        if (!empty($input['name'])) {
            $builder->set('name', $input['name']);
        }
        if (isset($input['list_order'])) {
            $builder->set('list_order', $input['list_order']);
        }

        if (!empty($input['id'])) {
            $builder->where('id', $input['id']);
            $builder->update();
            $id = $input['id'];
        } else {
            $builder->insert();
            $id = $this->db->insertID();
        }

        return $id;
    }

    function deleteTopic($id)
    {
        // Optional: Delete related subtopics and links? 
        // For now, sticking to basic delete as requested, manual cascade not strictly required by user yet but good practice.
        // But to keep it simple and match standard style, just delete the main item.
        $builder = $this->db->table('ita_topics');
        $builder->where('id', $id);
        $builder->delete();
        return true;
    }

    // --- Subtopics ---

    function getSubtopics($topic_id)
    {
        $builder = $this->db->table('ita_subtopics');
        $builder->where('ita_topic_id', $topic_id);
        $builder->orderBy('list_order', 'ASC');
        $result = $builder->get()->getResultArray();
        return $result;
    }

    function getSubtopic($id)
    {
        $builder = $this->db->table('ita_subtopics');
        $builder->where('id', $id);
        $result = $builder->get()->getRowArray();
        return $result;
    }

    function saveSubtopic($input)
    {
        $builder = $this->db->table('ita_subtopics');

        if (!empty($input['ita_topic_id'])) {
            $builder->set('ita_topic_id', $input['ita_topic_id']);
        }
        if (!empty($input['name'])) {
            $builder->set('name', $input['name']);
        }
        if (isset($input['description'])) {
            $builder->set('description', $input['description']);
        }
        if (isset($input['list_order'])) {
            $builder->set('list_order', $input['list_order']);
        }

        if (!empty($input['id'])) {
            $builder->where('id', $input['id']);
            $builder->update();
            $id = $input['id'];
        } else {
            $builder->insert();
            $id = $this->db->insertID();
        }
        return $id;
    }

    function deleteSubtopic($id)
    {
        $builder = $this->db->table('ita_subtopics');
        $builder->where('id', $id);
        $builder->delete();
        return true;
    }

    // --- Links ---

    function getLinks($subtopic_id)
    {
        $builder = $this->db->table('ita_subtopics_links');
        $builder->where('ita_subtopic_id', $subtopic_id);
        $result = $builder->get()->getResultArray();
        return $result;
    }

    function getLink($id)
    {
        $builder = $this->db->table('ita_subtopics_links');
        $builder->where('id', $id);
        $result = $builder->get()->getRowArray();
        return $result;
    }

    function saveLink($input)
    {
        $builder = $this->db->table('ita_subtopics_links');

        if (!empty($input['ita_subtopic_id'])) {
            $builder->set('ita_subtopic_id', $input['ita_subtopic_id']);
        }
        if (!empty($input['url'])) {
            $builder->set('url', $input['url']);
        }
        if (isset($input['description'])) {
            $builder->set('description', $input['description']);
        }

        if (!empty($input['id'])) {
            $builder->where('id', $input['id']);
            $builder->update();
            $id = $input['id'];
        } else {
            $builder->insert();
            $id = $this->db->insertID();
        }
        return $id;
    }

    function deleteLink($id)
    {
        $builder = $this->db->table('ita_subtopics_links');
        $builder->where('id', $id);
        $builder->delete();
        return true;
    }
}
