<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_landing extends CI_Model
{

    function GetLanding($where = '')
    {
        return $this->db->query("SELECT * FROM tbl_landing $where;");
    }

    function GetSlideCategory($where = '')
    {
        return $this->db->query("SELECT * FROM tbl_slide_category $where;");
    }

    function GetLawyerCategory($where = '')
    {
        return $this->db->query("SELECT * FROM tbl_lawyer_category $where;");
    }

    function GetServiceCategory($where = '')
    {
        return $this->db->query("SELECT * FROM tbl_service_category $where;");
    }


    function GetWorkCategory($where = '')
    {
        return $this->db->query("SELECT * FROM tbl_work_category $where;");
    }

    function GetPartnerCategory($where = '')
    {
        return $this->db->query("SELECT * FROM tbl_partner_category $where;");
    }

    function GetTestimonialCategory($where = '')
    {
        return $this->db->query("SELECT * FROM tbl_testimonial_category $where;");
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
