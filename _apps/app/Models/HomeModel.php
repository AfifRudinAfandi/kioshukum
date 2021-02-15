<?php namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{

    function getLanding($condition = '')
    {
        return $this->db->query("SELECT * FROM tbl_landing $condition");
    }

    function getSlide($condition = '')
    {
        return $this->db->query("SELECT * FROM tbl_slide $condition");
    }

    function getWork($condition = '')
    {
        return $this->db->query("SELECT * FROM tbl_work $condition");
    }

    function getLawyer($condition = '')
    {
        return $this->db->query("SELECT * FROM tbl_lawyer 
        INNER JOIN tbl_lawyer_category ON tbl_lawyer_category.id = tbl_lawyer.lawyer_category_id $condition");
    }

    function getTestimonial($condition = '')
    {
        return $this->db->query("SELECT * FROM tbl_testimonial $condition");
    }

    function getPartner($condition = '')
    {
        return $this->db->query("SELECT * FROM tbl_partner $condition");
    }
	
	
	//REGISTER -> CEK EMAIL
	function getEmail($email)
    {
        return $this->db->table('tbl_member')->where('member_email', $email)->countAllResults();
    }
	
	//REGISTER -> INSERT
	function insertMember($data)
    {
        return $this->db->table('tbl_member')->insert($data);
    }
	
	//LOGIN GET USER
	function cekLogin($email)
    {
        return $this->db->table('tbl_member')
                        ->where('member_email', $email)
                        ->get()
                        ->getRow();
    }
	
	//CONTACT -> SEND
	function insertInquiry($data)
    {
        return $this->db->table('tbl_inquiry')->insert($data);
    }
	
	
	//SERVICE CATEGORY
	function getServiceCategory($condition = '')
    {
        return $this->db->query("SELECT * FROM tbl_service_category $condition");
    }
	
	function getService($condition = '')
    {
        return $this->db->query("SELECT * FROM tbl_service $condition");
    }

}
