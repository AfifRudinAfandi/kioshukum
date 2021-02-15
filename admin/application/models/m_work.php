<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_work extends CI_Model
{

    function GetWork($where = '')
    {
        return $this->db->query("SELECT *, tbl_work.id AS work_id FROM  tbl_work
            JOIN tbl_work_category ON tbl_work_category.id = tbl_work.work_category_id
            $where;");
    }

    function GetWorkCategory($where = '')
    {
        return $this->db->query("SELECT * FROM  tbl_work_category  $where;");
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
