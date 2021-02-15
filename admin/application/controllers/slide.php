<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Slide extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_slide');
	}

	function index()
	{
		$this->session_on();
		$data = array(
			'title' 	=> 'Admin Panel',
			'session' 	=> $this->session->userdata('admin'),
			'data_slide' => $this->m_slide->GetSlide()->result_array()
		);
		render_backend('admin/slide/index', $data);
	}

	function new()
	{
		$this->session_on();

		/*end label to array*/
		$data = array(
			'session' 		=> $this->session->userdata('admin'),
			'slide_id'	 		=> '',
			'slide_id_category' => '',
			'slide_label'		=> '',
			'slide_title' 		=> '',
			'slide_description' => '',
			'slide_link' 		=> '',
			'slide_image' 		=> '',
			'editor_status' 	=> 'new',
			'title' 			=> 'Admin Panel',
			'data_slide_category' => $this->m_slide->GetSlideCategory()->result_array()
		);
		render_backend('admin/slide/editor', $data);
	}

	function edit($id = 0)
	{
		$this->session_on();
		$data_slide = $this->m_slide->Getslide("WHERE slide_id = '$id'")->result_array();

		/*end label to array*/
		$data = array(
			'session' 		=> $this->session->userdata('admin'),
			'slide_id'	 	=> $data_slide[0]['slide_id'],
			'slide_id_category'	 	=> $data_slide[0]['slide_id_category'],
			'slide_label'	 	=> $data_slide[0]['slide_label'],
			'slide_title' 	=> $data_slide[0]['slide_title'],
			'slide_description' 	=> $data_slide[0]['slide_description'],
			'slide_link' 	=> $data_slide[0]['slide_link'],
			'slide_image' 	=> $data_slide[0]['slide_image'],
			'editor_status' 	=> 'edit',
			'title' 		=> 'Admin Panel',
			'data_slide_category' => $this->m_slide->GetSlideCategory()->result_array()
		);
		render_backend('admin/slide/editor', $data);
	}

	function save()
	{
		$this->session_on();
		if ($_POST) {
			$slide_id			= $this->input->post('slide_id');
			$slide_id_category	= $this->input->post('slide_id_category');
			$slide_label		= $this->input->post('slide_label');
			$slide_title		= $this->input->post('slide_title');
			$slide_description	= $this->input->post('slide_description');
			$slide_link			= $this->input->post('slide_link');
			$slide_image		= $this->input->post('slide_image');
			$editor_status		= $this->input->post('editor_status');

			if ($editor_status == "new") {
				$data = array(
					'slide_label' 	=> $slide_label,
					'slide_title' 	=> $slide_title,
					'slide_description' => $slide_description,
					'slide_id_category' => $slide_id_category,
					'slide_image' 	=> $slide_image,
					'slide_link' 	=> $slide_link,
				);
				$result = $this->m_slide->InsertData('tbl_slide', $data);
				if ($result == 1) {
					redirect('slide/index', 'refresh');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
				} else {
					echo "ERROR";
				}
			} else {
				$data = array(
					'slide_label' 	=> $slide_label,
					'slide_title' 	=> $slide_title,
					'slide_description' => $slide_description,
					'slide_id_category' => $slide_id_category,
					'slide_image' 	=> $slide_image,
					'slide_link' 	=> $slide_link,
				);
				$result = $this->m_slide->UpdateData('tbl_slide', $data, array('slide_id' => $slide_id));
				if ($result == 1) {
					redirect('slide/index', 'refresh');
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
		$result = $this->m_slide->DeleteData('tbl_slide', array('slide_id' => $id));
		if ($result == 1) {
			redirect('slide/index', 'refresh');
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
			'title' 	=> 'Slide Category',
			'session' 	=> $this->session->userdata('admin'),

			'slide_category_id'	 		=> '',
			'slide_category_title' 			=> '',
			'slide_category_description' 	=> '',
			'editor_status' => 'new',

			'data_slide_category' => $this->m_slide->GetSlideCategory()->result_array()
		);
		render_backend('admin/slide/category', $data);
	}

	function category_edit($slide_category_id = 0)
	{
		$this->session_on();
		$data_slide_category = $this->m_slide->GetSlideCategory("WHERE slide_category_id = '$slide_category_id'")->result_array();

		$data = array(
			'title' 	=> 'Slide Category',
			'session' 	=> $this->session->userdata('admin'),

			'slide_category_id'	 		=> $data_slide_category[0]['slide_category_id'],
			'slide_category_title' 			=> $data_slide_category[0]['slide_category_title'],
			'slide_category_description' 	=> $data_slide_category[0]['slide_category_description'],
			'editor_status' => 'edit',

			'data_slide_category' => $this->m_slide->GetSlideCategory()->result_array()
		);
		render_backend('admin/slide/category', $data);
	}

	function category_save()
	{
		$this->session_on();
		if ($_POST) {
			$slide_category_id		= $this->input->post('slide_category_id');
			$slide_category_title		= $this->input->post('slide_category_title');
			$slide_category_description		= $this->input->post('slide_category_description');
			$editor_status		= $this->input->post('editor_status');

			if ($editor_status == "new") {
				$data = array(
					'slide_category_title' 	=> $slide_category_title,
					'slide_category_description' 	=> $slide_category_description,
					'slide_category_slug' 	=> url_title($slide_category_title, '-', TRUE),
				);
				$result = $this->m_slide->InsertData('tbl_slide_category', $data);
				if ($result == 1) {
					redirect('slide/category', 'refresh');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
				} else {
					echo "ERROR";
				}
			} else {
				$data = array(
					'slide_category_title' 	=> $slide_category_title,
					'slide_category_description' 	=> $slide_category_description,
					'slide_category_slug' 	=> url_title($slide_category_title, '-', TRUE),
				);
				$result = $this->m_slide->UpdateData('tbl_slide_category', $data, array('slide_category_id' => $slide_category_id));
				if ($result == 1) {
					redirect('slide/category', 'refresh');
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

	function category_delete($slide_category_id = 0)
	{
		$this->session_on();
		$result = $this->m_slide->DeleteData('tbl_slide_category', array('slide_category_id' => $slide_category_id));
		if ($result == 1) {
			redirect('slide/category', 'refresh');
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
