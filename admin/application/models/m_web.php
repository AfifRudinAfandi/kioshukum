<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_web extends CI_Model
{

    function getLanding($condition = '')
    {
        return $this->db->query("SELECT * FROM tbl_landing $condition");
    }

    function getSlide($condition = '')
    {
        return $this->db->query("SELECT * FROM tbl_slide $condition");
    }

    function getTestimonial($condition = '')
    {
        return $this->db->query("SELECT * FROM tbl_testimonial $condition");
    }

     function getPartner($condition = '')
    {
        return $this->db->query("SELECT * FROM tbl_partner $condition");
    }

}
