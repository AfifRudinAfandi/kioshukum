<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_lawyer extends CI_Model
{

    function GetLawyer($where = '')
    {
        return $this->db->query("SELECT *, tbl_lawyer.id AS lawyer_id FROM  tbl_lawyer 
            JOIN tbl_lawyer_category ON tbl_lawyer_category.id = tbl_lawyer.lawyer_category_id
            $where;");
    }

    function GetLawyerCategory($where = '')
    {
        return $this->db->query("SELECT * FROM  tbl_lawyer_category  $where;");
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
