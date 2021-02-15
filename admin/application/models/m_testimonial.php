<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_testimonial extends CI_Model
{

    function GetTestimonial($where = '')
    {
        return $this->db->query("SELECT * FROM  tbl_testimonial 
            INNER JOIN tbl_testimonial_category ON tbl_testimonial_category.id=tbl_testimonial.testimonial_category_id
            $where ORDER BY testimonial_date DESC;");
    }

    function GetTestimonialCategory($where = '')
    {
        return $this->db->query("SELECT * FROM  tbl_testimonial_category  $where");
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
