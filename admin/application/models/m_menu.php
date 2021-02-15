<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_menu extends CI_Model
{

    function GetMenu($where = '')
    {
        return $this->db->query("SELECT * FROM  tbl_menu  $where;");
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
