<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Partner extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_partner');
	}

	function index()
	{
		$this->session_on();
		$data = array(
			'title' 	=> 'Admin Panel',
			'session' 	=> $this->session->userdata('admin'),
			'data_category_partner' => $this->m_partner->GetPartnerCategory()->result_array(),
			'data_partner' => $this->m_partner->GetPartner()->result_array(),
			'partner_id'	 		=> '',
			'partner_category_id'	 		=> '',
			'set_as_home'	 		=> '',
			'partner_name'		=> '',
			'partner_link' 		=> '',
			'partner_image' 		=> '',
			'editor_status' 	=> 'new',
		);
		render_backend('admin/partner/index', $data);
	}


	function edit($id = 0)
	{
		$this->session_on();
		$data_partner = $this->m_partner->Getpartner("WHERE partner_id = '$id'")->result_array();

		/*end label to array*/
		$data = array(
			'session' 		=> $this->session->userdata('admin'),
			'data_category_partner' => $this->m_partner->GetPartnerCategory()->result_array(),
			'data_partner' => $this->m_partner->GetPartner()->result_array(),
			'partner_id'	 	=> $data_partner[0]['partner_id'],
			'partner_category_id'	 	=> $data_partner[0]['partner_category_id'],
			'set_as_home'	 	=> $data_partner[0]['set_as_home'],
			'partner_name' 	=> $data_partner[0]['partner_name'],
			'partner_link' 	=> $data_partner[0]['partner_link'],
			'partner_image' 	=> $data_partner[0]['partner_image'],
			'editor_status' 	=> 'edit',
			'title' 		=> 'Admin Panel',
		);
		render_backend('admin/partner/index', $data);
	}

	function save()
	{
		$this->session_on();
		if ($_POST) {
			$partner_id			= $this->input->post('partner_id');
			$partner_category_id			= $this->input->post('partner_category_id');
			$set_as_home			= $this->input->post('set_as_home');
			$partner_name	= $this->input->post('partner_name');
			$partner_link			= $this->input->post('partner_link');
			$partner_image		= $this->input->post('partner_image');
			$editor_status		= $this->input->post('editor_status');

			if ($editor_status == "new") {
				$data = array(
					'partner_category_id' => $partner_category_id,
					'partner_name' => $partner_name,
					'partner_image' 	=> $partner_image,
					'partner_link' 	=> $partner_link,
				);
				$result = $this->m_partner->InsertData('tbl_partner', $data);
				if ($result == 1) {
					redirect('partner/index', 'refresh');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
				} else {
					echo "ERROR";
				}
			} else {
				$data = array(
					'partner_category_id' => $partner_category_id,
					'set_as_home' => $set_as_home,
					'partner_name' => $partner_name,
					'partner_image' 	=> $partner_image,
					'partner_link' 	=> $partner_link,
				);
				$result = $this->m_partner->UpdateData('tbl_partner', $data, array('partner_id' => $partner_id));
				if ($result == 1) {
					redirect('partner/index', 'refresh');
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
		$result = $this->m_partner->DeleteData('tbl_partner', array('partner_id' => $id));
		if ($result == 1) {
			redirect('partner/index', 'refresh');
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
			'title' 	=> 'partner Category',
			'session' 	=> $this->session->userdata('admin'),
			'id'	 		=> '',
			'partner_category_name' 			=> '',
			'partner_category_description' 	=> '',
			'editor_status' => 'new',

			'data_partner_category' => $this->m_partner->GetPartnerCategory()->result_array()
		);
		render_backend('admin/partner/category', $data);
	}

	function category_edit($id = 0)
	{
		$this->session_on();
		$data_partner_category = $this->m_partner->GetPartnerCategory("WHERE id = '$id'")->result_array();

		$data = array(
			'title' 	=> 'partner Category',
			'session' 	=> $this->session->userdata('admin'),

			'id'	 						=> $data_partner_category[0]['id'],
			'partner_category_name' 			=> $data_partner_category[0]['partner_category_name'],
			'partner_category_description' 	=> $data_partner_category[0]['partner_category_description'],
			'editor_status' => 'edit',

			'data_partner_category' => $this->m_partner->GetPartnerCategory()->result_array()
		);
		render_backend('admin/partner/category', $data);
	}

	function category_save()
	{
		$this->session_on();
		if ($_POST) {
			$id		= $this->input->post('id');
			$partner_category_name		= $this->input->post('partner_category_name');
			$partner_category_description		= $this->input->post('partner_category_description');
			$editor_status		= $this->input->post('editor_status');

			if ($editor_status == "new") {
				$data = array(
					'partner_category_name' 	=> $partner_category_name,
					'partner_category_description' 	=> $partner_category_description,
					'partner_category_slug' 	=> url_title($partner_category_name, '-', TRUE),
				);
				$result = $this->m_partner->InsertData('tbl_partner_category', $data);
				if ($result == 1) {
					redirect('partner/category', 'refresh');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
				} else {
					echo "ERROR";
				}
			} else {
				$data = array(
					'partner_category_name' 	=> $partner_category_name,
					'partner_category_description' 	=> $partner_category_description,
					'partner_category_slug' 	=> url_title($partner_category_name, '-', TRUE),
				);
				$result = $this->m_partner->UpdateData('tbl_partner_category', $data, array('id' => $id));
				if ($result == 1) {
					redirect('partner/category', 'refresh');
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
		$result = $this->m_partner->DeleteData('tbl_partner_category', array('id' => $id));
		if ($result == 1) {
			redirect('partner/category', 'refresh');
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
