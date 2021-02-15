<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_service extends CI_Model
{

    function GetService($where = '')
    {
        return $this->db->query("SELECT * FROM  tbl_service 
            JOIN tbl_service_category ON tbl_service_category.category_id = tbl_service.service_category_id
            $where;");
    }

    function GetServiceCategory($where = '')
    {
        return $this->db->query("SELECT * FROM  tbl_service_category  $where;");
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
