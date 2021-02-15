<?php

namespace App\Models;

use CodeIgniter\Model;

class FaqModel extends Model
{

    function getCategoryFaq($condition = '')
    {
        return $this->db->query("SELECT
        id,
        category_faq_icon,
        category_faq_name,
        category_faq_description,
        category_faq_slug
        FROM tbl_faq_category $condition");
    }

    function getFaq($condition = '')
    {
        return $this->db->query("SELECT
        tbl_faq.id,
        tbl_faq.faq_question,
        tbl_faq.faq_answer
        FROM tbl_faq
        LEFT JOIN tbl_faq_category ON tbl_faq_category.id = tbl_faq.faq_category_id $condition
        ");
    }
	
	function getCatFaq($condition = '')
    {
        return $this->db->query("SELECT
        tbl_faq.id,
        tbl_faq.faq_question,
        tbl_faq.faq_answer
        FROM tbl_faq
        LEFT JOIN tbl_faq_category ON tbl_faq_category.id = tbl_faq.faq_category_id $condition
        ");
    }
	
	function cari($data)
    {
		return $this->db->query("SELECT
        tbl_faq.id,
        tbl_faq.faq_question,
        tbl_faq.faq_answer
        FROM tbl_faq
        LEFT JOIN tbl_faq_category ON tbl_faq_category.id = tbl_faq.faq_category_id 
		WHERE faq_question LIKE '%$data%' OR faq_answer LIKE '%$data%'
        ");
		
		/*
        return $this->db->query("SELECT
        id,
        category_faq_icon,
        category_faq_name,
        category_faq_description,
        category_faq_slug
        FROM tbl_faq_category WHERE category_faq_name LIKE '%$data%' OR category_faq_description LIKE '%$data%'");
		*/
    }
}
