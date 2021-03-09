<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Office extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_office');
	}

	function index()
	{
		$this->session_on();
		$data = array(
			'title' 	=> 'Admin Panel',
			'session' 	=> $this->session->userdata('admin'),
			'data_office' => $this->m_office->GetOffice()->result_array()
		);
		render_backend('admin/office/index', $data);
	}

	function new()
	{
		$this->session_on();

		/*end label to array*/
		$data = array(
			'session' 				=> $this->session->userdata('admin'),
			'office_id'	 			=> '',
			'office_title' 			=> '',
			'office_city'			=> '',
			'office_direct_map' 	=> '',
			'office_address' 		=> '',
			'editor_status' 		=> 'new',
			'title' 				=> 'Admin Panel'
		);
		render_backend('admin/office/editor', $data);
	}

	function edit($id = 0)
	{
		$this->session_on();
		$data_office = $this->m_office->GetOffice("WHERE office_id = '$id'")->result_array();

		/*end label to array*/
		$data = array(
			'session' 				=> $this->session->userdata('admin'),
			'office_id'	 			=> $data_office[0]['office_id'],
			'office_title' 			=> $data_office[0]['office_title'],
			'office_city'	 		=> $data_office[0]['office_city'],
			'office_direct_map' 	=> $data_office[0]['office_direct_map'],
			'office_address' 		=> $data_office[0]['office_address'],
			'editor_status' 		=> 'edit',
			'title' 				=> 'Admin Panel'
		);
		render_backend('admin/office/editor', $data);
	}

	function save()
	{
		$this->session_on();
		if ($_POST) {
			$office_id				= $this->input->post('office_id');
			$office_title			= $this->input->post('office_title');
			$office_city			= $this->input->post('office_city');
			$office_direct_map		= $this->input->post('office_direct_map');
			$office_address			= $this->input->post('office_address');
			$editor_status			= $this->input->post('editor_status');

			if ($editor_status == "new") {
				$data = array(
					'office_city' 			=> $office_city,
					'office_direct_map' 	=> $office_direct_map,
					'office_title' 			=> $office_title,
					'office_address' 		=> $office_address
				);
				$result = $this->m_office->InsertData('tbl_office', $data);
				if ($result == 1) {
					redirect('office/index', 'refresh');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
				} else {
					echo "ERROR";
				}
			} else {
				$data = array(
					'office_city' 		=> $office_city,
					'office_direct_map' => $office_direct_map,
					'office_title' 		=> $office_title,
					'office_address' 	=> $office_address
				);
				$result = $this->m_office->UpdateData('tbl_office', $data, array('office_id' => $office_id));
				if ($result == 1) {
					redirect('office/index', 'refresh');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
															  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
															  <strong>Success!</strong> data berhasil di ubah.
															</div>');
				} else {
					echo "ERROR";
				}
			}
		}
	}

	function delete($id = 0)
	{
		$this->session_on();
		$result = $this->m_office->DeleteData('tbl_office', array('office_id' => $id));
		if ($result == 1) {
			redirect('office/index', 'refresh');
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