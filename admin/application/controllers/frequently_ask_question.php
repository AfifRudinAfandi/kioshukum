<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Frequently_ask_question extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_faq');
	}

	function index()
	{
		$this->session_on();
		$data = array(
			'title' 	=> 'Admin Panel',
			'session' 	=> $this->session->userdata('admin'),
			'data_faq' 	=> $this->m_faq->GetFaq()->result_array(),
		);
		render_backend('admin/frequently_ask_question/index', $data);
	}

	function new()
	{
		$this->session_on();
		$data = array(
			'session' 		=> $this->session->userdata('admin'),
			'id'	 			=> '',
			'faq_question' 		=> '',
			'faq_answer'		=> '',
			'faq_category_id' 	=> '',
			'editor_status' 	=> 'new',
			'title' 			=> 'Admin Panel',
			'data_faq_category' => $this->m_faq->GetFaqCategory()->result_array()
		);
		render_backend('admin/frequently_ask_question/editor', $data);
	}

	function edit($id = 0)
	{
		$this->session_on();
		$data_faq = $this->m_faq->GetFaq("WHERE tbl_faq.id = '$id'")->result_array();

		$data = array(
			'session' 			=> $this->session->userdata('admin'),
			'id'	 			=> $data_faq[0]['faq_id'],
			'faq_question' 		=> $data_faq[0]['faq_question'],
			'faq_answer'	 	=> $data_faq[0]['faq_answer'],
			'faq_category_id' 	=> $data_faq[0]['faq_category_id'],
			'editor_status'		=> 'edit',
			'title' 			=> 'Admin Panel',
			'data_faq_category' => $this->m_faq->GetFaqCategory()->result_array()
		);
		render_backend('admin/frequently_ask_question/editor', $data);
	}

	function save()
	{
		$this->session_on();
		if ($_POST) {
			$id					= $this->input->post('id');
			$faq_question		= $this->input->post('faq_question');
			$faq_answer			= $this->input->post('faq_answer');
			$faq_category_id	= $this->input->post('faq_category_id');
			$editor_status		= $this->input->post('editor_status');

			if ($editor_status == "new") {
				$data = array(
					'faq_question' 		=> $faq_question,
					'faq_answer' 		=> $faq_answer,
					'faq_category_id' 	=> $faq_category_id
				);
				$result = $this->m_faq->InsertData('tbl_faq', $data);
				if ($result == 1) {
					redirect('frequently_ask_question/index', 'refresh');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
				} else {
					echo "ERROR";
				}
			} else {
				$data = array(
					'faq_question' 		=> $faq_question,
					'faq_answer' 		=> $faq_answer,
					'faq_category_id' 	=> $faq_category_id
				);
				$result = $this->m_faq->UpdateData('tbl_faq', $data, array('id' => $id));
				if ($result == 1) {
					redirect('frequently_ask_question/index', 'refresh');
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
		$result = $this->m_faq->DeleteData('tbl_faq', array('id' => $id));
		if ($result == 1) {
			redirect('frequently_ask_question/index', 'refresh');
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
			'title' 	=> 'Faq Category',
			'session' 	=> $this->session->userdata('admin'),
			'id'	 					=> '',
			'category_faq_name' 		=> '',
			'category_faq_description' 	=> '',
			'category_faq_icon' 		=> '',
			'editor_status'				=> 'new',
			'data_faq_category' 		=> $this->m_faq->GetFaqCategory()->result_array()
		);
		render_backend('admin/frequently_ask_question/category', $data);
	}

	function category_edit($id = 0)
	{
		$this->session_on();
		$data_faq_category = $this->m_faq->GetFaqCategory("WHERE id = '$id'")->result_array();

		$data = array(
			'title' 	=> 'lawyer Category',
			'session' 	=> $this->session->userdata('admin'),

			'id'	 					=> $data_faq_category[0]['id'],
			'category_faq_name' 		=> $data_faq_category[0]['category_faq_name'],
			'category_faq_description' 	=> $data_faq_category[0]['category_faq_description'],
			'category_faq_icon' 		=> $data_faq_category[0]['category_faq_icon'],
			'editor_status' 			=> 'edit',

			'data_faq_category' => $this->m_faq->GetFaqCategory()->result_array()
		);
		render_backend('admin/frequently_ask_question/category', $data);
	}

	function category_save()
	{
		$this->session_on();
		if ($_POST) {
			$id							= $this->input->post('id');
			$category_faq_name			= $this->input->post('category_faq_name');
			$category_faq_description	= $this->input->post('category_faq_description');
			$category_faq_icon			= $this->input->post('category_faq_icon');
			$editor_status				= $this->input->post('editor_status');

			if ($editor_status == "new") {
				$data = array(
					'category_faq_name' 		=> $category_faq_name,
					'category_faq_description' 	=> $category_faq_description,
					'category_faq_icon' 		=> $category_faq_icon,
					'category_faq_slug' 		=> url_title($category_faq_name, '-', TRUE),
				);
				$result = $this->m_faq->InsertData('tbl_faq_category', $data);
				if ($result == 1) {
					redirect('frequently_ask_question/category', 'refresh');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
				} else {
					echo "ERROR";
				}
			} else {
				$data = array(
					'category_faq_name' 		=> $category_faq_name,
					'category_faq_description' 	=> $category_faq_description,
					'category_faq_icon' 		=> $category_faq_icon,
					'category_faq_slug' 		=> url_title($category_faq_name, '-', TRUE),
				);
				$result = $this->m_faq->UpdateData('tbl_faq_category', $data, array('id' => $id));
				if ($result == 1) {
					redirect('frequently_ask_question/category', 'refresh');
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
		$result = $this->m_faq->DeleteData('tbl_faq_category', array('id' => $id));
		if ($result == 1) {
			redirect('frequently_ask_question/category', 'refresh');
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
