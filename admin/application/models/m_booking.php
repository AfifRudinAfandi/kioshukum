<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_booking extends CI_Model
{

    function GetBooking($where = '')
    {
        return $this->db->query("SELECT * FROM  tbl_booking 
            LEFT JOIN tbl_member ON tbl_booking.booking_member_id=tbl_member.member_id 
            LEFT JOIN tbl_service ON tbl_booking.booking_service_id=tbl_service.service_id 
			ORDER BY booking_id DESC
            $where;");
    }
	
}