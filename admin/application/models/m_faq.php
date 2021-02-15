<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_faq extends CI_Model
{

    function GetFaq($where = '')
    {
        return $this->db->query("SELECT *, tbl_faq.id AS faq_id FROM tbl_faq 
            JOIN tbl_faq_category ON tbl_faq_category.id = tbl_faq.faq_category_id
            $where;");
    }

    function GetFaqCategory($where = '')
    {
        return $this->db->query("SELECT * FROM  tbl_faq_category  $where;");
    }

    function GetSetting($where = '')
    {
        return $this->db->query("SELECT * FROM  tbl_setting WHERE id='1' $where;");
    }

    function InsertData($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    function UpdateData($table, $data, $where)
    {
        return $this->db->update($table, $data, $where);
    }
    function DeleteData($table, $where)
    {
        return $this->db->delete($table, $where);
    }
}
