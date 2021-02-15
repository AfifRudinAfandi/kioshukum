<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Partner extends CI_Model
{

    function GetPartner($where = '')
    {
        return $this->db->query("SELECT * 
            FROM  tbl_partner
            INNER JOIN tbl_partner_category ON tbl_partner_category.id=tbl_partner.partner_category_id
            $where;");
    }
    function GetPartnerCategory($where = '')
    {
        return $this->db->query("SELECT * FROM  tbl_partner_category $where;");
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
