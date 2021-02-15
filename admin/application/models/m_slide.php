<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_slide extends CI_Model
{

    function GetSlide($where = '')
    {
        return $this->db->query("SELECT * FROM  tbl_slide 
            JOIN tbl_slide_category ON tbl_slide_category.slide_category_id = tbl_slide.slide_id_category
            $where;");
    }

    function GetSlideCategory($where = '')
    {
        return $this->db->query("SELECT * FROM  tbl_slide_category  $where;");
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
