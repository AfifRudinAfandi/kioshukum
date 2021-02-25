<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_booking extends CI_Model
{

    function GetBooking($where = '')
    {
        return $this->db->query("SELECT * FROM  tbl_booking 
            
            $where;");
    }
	
}