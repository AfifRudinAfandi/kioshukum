<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Inquiry extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_inquiry');
	}

	public function index()
	{
		$this->session_on();
		$data = array(
			'session' 	=> $this->session->userdata('admin'),
			'title' 	=> 'Admin Panel',
			'data_inquiry' 	=> $this->m_inquiry->GetInquiry()->result_array()
		);
		render_backend('admin/inquiry/index', $data);;
	}

	function delete($id = 0)
	{
		$this->session_on();
		$result = $this->m_inquiry->DeleteData('tbl_inquiry', array('inquiry_id' => $id));
		if ($result == 1) {
			redirect('inquiry/index', 'refresh');
			$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di hapus.
														</div>');
		} else {
			echo "ERROR";
		}
	}

	
	function session_on()
	{
		if (!$this->session->userdata('admin')) {
			header('location:' . base_url() . 'login');
			exit(0);
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
