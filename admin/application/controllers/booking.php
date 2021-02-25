<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_booking');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    function index()
    {
        //$this->session_on();
        $data = array(
            'title'     => 'Admin Panel',
            'session'     => $this->session->userdata('admin'),
            'data_booking' => $this->m_booking->GetBooking()->result_array()
        );
		
        render_backend('admin/booking/index', $data);
    }
	
}