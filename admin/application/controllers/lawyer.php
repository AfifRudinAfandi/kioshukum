<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lawyer extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_lawyer');
	}

	function index()
	{
		$this->session_on();
		$data = array(
			'title' 	=> 'Admin Panel',
			'session' 	=> $this->session->userdata('admin'),
			'data_lawyer' => $this->m_lawyer->GetLawyer()->result_array()
		);
		render_backend('admin/lawyer/index', $data);
	}

	function new()
	{
		$this->session_on();

		/*end label to array*/
		$data = array(
			'session' 		=> $this->session->userdata('admin'),
			'id'	 			=> '',
			'lawyer_category_id' => '',
			'lawyer_avatar'		=> '',
			'lawyer_name' 		=> '',
			'lawyer_office' 	=> '',
			'lawyer_experien' 	=> '',
			'lawyer_study' 		=> '',
			'lawyer_legality' 	=> '',
			'lawyer_profile' 	=> '',
			'editor_status' 	=> 'new',
			'title' 			=> 'Admin Panel',
			'data_lawyer_category' => $this->m_lawyer->GetLawyerCategory()->result_array()
		);
		render_backend('admin/lawyer/editor', $data);
	}

	function edit($id = 0)
	{
		$this->session_on();
		$data_lawyer = $this->m_lawyer->GetLawyer("WHERE tbl_lawyer.id = '$id'")->result_array();

		/*end label to array*/
		$data = array(
			'session' 			=> $this->session->userdata('admin'),
			'id'	 			=> $data_lawyer[0]['lawyer_id'],
			'lawyer_category_id' => $data_lawyer[0]['lawyer_category_id'],
			'lawyer_avatar'	 	=> $data_lawyer[0]['lawyer_avatar'],
			'lawyer_name' 		=> $data_lawyer[0]['lawyer_name'],
			'lawyer_experien' 	=> $data_lawyer[0]['lawyer_experien'],
			'lawyer_office' 	=> $data_lawyer[0]['lawyer_office'],
			'lawyer_study' 		=> $data_lawyer[0]['lawyer_study'],
			'lawyer_legality' 	=> $data_lawyer[0]['lawyer_legality'],
			'lawyer_profile' 	=> $data_lawyer[0]['lawyer_profile'],
			'editor_status' 	=> 'edit',
			'title' 		=> 'Admin Panel',
			'data_lawyer_category' => $this->m_lawyer->GetLawyerCategory()->result_array()
		);
		render_backend('admin/lawyer/editor', $data);
	}

	function save()
	{
		$this->session_on();
		if ($_POST) {
			$id			= $this->input->post('id');
			$lawyer_category_id	= $this->input->post('lawyer_category_id');
			$lawyer_avatar		= $this->input->post('lawyer_avatar');
			$lawyer_name		= $this->input->post('lawyer_name');
			$lawyer_office	= $this->input->post('lawyer_office');
			$lawyer_experien			= $this->input->post('lawyer_experien');
			$lawyer_study		= $this->input->post('lawyer_study');
			$lawyer_legality		= $this->input->post('lawyer_legality');
			$lawyer_profile		= $this->input->post('lawyer_profile');
			$editor_status		= $this->input->post('editor_status');

			if ($editor_status == "new") {
				$data = array(
					'lawyer_category_id' 	=> $lawyer_category_id,
					'lawyer_avatar' => $lawyer_avatar,
					'lawyer_name' => $lawyer_name,
					'lawyer_office' 	=> $lawyer_office,
					'lawyer_experien' 	=> $lawyer_experien,
					'lawyer_study' 	=> $lawyer_study,
					'lawyer_legality' 	=> $lawyer_legality,
					'lawyer_profile' 	=> $lawyer_profile,
					'lawyer_slug' 	=> url_title($lawyer_name, '-', TRUE),
				);
				$result = $this->m_lawyer->InsertData('tbl_lawyer', $data);
				if ($result == 1) {
					redirect('lawyer/index', 'refresh');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
				} else {
					echo "ERROR";
				}
			} else {
				$data = array(
					'lawyer_category_id' 	=> $lawyer_category_id,
					'lawyer_avatar' => $lawyer_avatar,
					'lawyer_name' => $lawyer_name,
					'lawyer_office' 	=> $lawyer_office,
					'lawyer_experien' 	=> $lawyer_experien,
					'lawyer_study' 	=> $lawyer_study,
					'lawyer_legality' 	=> $lawyer_legality,
					'lawyer_profile' 	=> $lawyer_profile,
					'lawyer_slug' 	=> url_title($lawyer_name, '-', TRUE),
				);
				$result = $this->m_lawyer->UpdateData('tbl_lawyer', $data, array('id' => $id));
				if ($result == 1) {
					redirect('lawyer/index', 'refresh');
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
		$result = $this->m_lawyer->DeleteData('tbl_lawyer', array('id' => $id));
		if ($result == 1) {
			redirect('lawyer/index', 'refresh');
			$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di hapus.
														</div>');
		} else {
			echo "ERROR";
		}
	}

	function category()
	{
		$this->session_on();
		$data = array(
			'title' 	=> 'lawyer Category',
			'session' 	=> $this->session->userdata('admin'),
			'id'	 		=> '',
			'lawyer_category_name' 			=> '',
			'lawyer_category_description' 	=> '',
			'editor_status' => 'new',

			'data_lawyer_category' => $this->m_lawyer->GetLawyerCategory()->result_array()
		);
		render_backend('admin/lawyer/category', $data);
	}

	function category_edit($id = 0)
	{
		$this->session_on();
		$data_lawyer_category = $this->m_lawyer->GetLawyerCategory("WHERE id = '$id'")->result_array();

		$data = array(
			'title' 	=> 'lawyer Category',
			'session' 	=> $this->session->userdata('admin'),

			'id'	 						=> $data_lawyer_category[0]['id'],
			'lawyer_category_name' 			=> $data_lawyer_category[0]['lawyer_category_name'],
			'lawyer_category_description' 	=> $data_lawyer_category[0]['lawyer_category_description'],
			'editor_status' => 'edit',

			'data_lawyer_category' => $this->m_lawyer->GetLawyerCategory()->result_array()
		);
		render_backend('admin/lawyer/category', $data);
	}

	function category_save()
	{
		$this->session_on();
		if ($_POST) {
			$id		= $this->input->post('id');
			$lawyer_category_name		= $this->input->post('lawyer_category_name');
			$lawyer_category_description		= $this->input->post('lawyer_category_description');
			$editor_status		= $this->input->post('editor_status');

			if ($editor_status == "new") {
				$data = array(
					'lawyer_category_name' 	=> $lawyer_category_name,
					'lawyer_category_description' 	=> $lawyer_category_description,
					'lawyer_category_slug' 	=> url_title($lawyer_category_name, '-', TRUE),
				);
				$result = $this->m_lawyer->InsertData('tbl_lawyer_category', $data);
				if ($result == 1) {
					redirect('lawyer/category', 'refresh');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
				} else {
					echo "ERROR";
				}
			} else {
				$data = array(
					'lawyer_category_name' 	=> $lawyer_category_name,
					'lawyer_category_description' 	=> $lawyer_category_description,
					'lawyer_category_slug' 	=> url_title($lawyer_category_name, '-', TRUE),
				);
				$result = $this->m_lawyer->UpdateData('tbl_lawyer_category', $data, array('id' => $id));
				if ($result == 1) {
					redirect('lawyer/category', 'refresh');
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

	function category_delete($id = 0)
	{
		$this->session_on();
		$result = $this->m_lawyer->DeleteData('tbl_lawyer_category', array('id' => $id));
		if ($result == 1) {
			redirect('lawyer/category', 'refresh');
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
