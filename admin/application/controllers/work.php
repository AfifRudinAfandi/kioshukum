<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class work extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_work');
	}

	function index()
	{
		$this->session_on();
		$data = array(
			'title' 	=> 'Admin Panel',
			'session' 	=> $this->session->userdata('admin'),
			'data_work' => $this->m_work->Getwork()->result_array()
		);
		render_backend('admin/work/index', $data);
	}

	function new()
	{
		$this->session_on();

		/*end label to array*/
		$data = array(
			'session' 			=> $this->session->userdata('admin'),
			'id'	 			=> '',
			'work_category_id' 	=> '',
			'work_icon'			=> '',
			'work_title' 		=> '',
			'work_description' 	=> '',
			'work_link' 	=> '',
			'work_label_button' 	=> '',
			'editor_status' 	=> 'new',
			'title' 			=> 'Admin Panel',
			'data_work_category' => $this->m_work->GetWorkCategory()->result_array()
		);
		render_backend('admin/work/editor', $data);
	}

	function edit($id = 0)
	{
		$this->session_on();
		$data_work = $this->m_work->Getwork("WHERE tbl_work.id = '$id'")->result_array();

		/*end label to array*/
		$data = array(
			'session' 			=> $this->session->userdata('admin'),
			'id'	 			=> $data_work[0]['work_id'],
			'work_category_id' => $data_work[0]['work_category_id'],
			'work_icon'	 		=> $data_work[0]['work_icon'],
			'work_title' 		=> $data_work[0]['work_title'],
			'work_description' 	=> $data_work[0]['work_description'],
			'work_link' 		=> $data_work[0]['work_link'],
			'work_label_button' 		=> $data_work[0]['work_label_button'],

			'editor_status' 	=> 'edit',
			'title' 		=> 'Admin Panel',
			'data_work_category' => $this->m_work->GetWorkCategory()->result_array()
		);
		render_backend('admin/work/editor', $data);
	}

	function save()
	{
		$this->session_on();
		if ($_POST) {
			$id					= $this->input->post('id');
			$work_category_id	= $this->input->post('work_category_id');
			$work_icon		= $this->input->post('work_icon');
			$work_title		= $this->input->post('work_title');
			$work_description	= $this->input->post('work_description');
			$work_link			= $this->input->post('work_link');
			$work_label_button			= $this->input->post('work_label_button');
			$editor_status		= $this->input->post('editor_status');

			if ($editor_status == "new") {
				$data = array(
					'work_category_id' 	=> $work_category_id,
					'work_icon' 		=> $work_icon,
					'work_title' 		=> $work_title,
					'work_description' 	=> $work_description,
					'work_link' 		=> $work_link,
					'work_label_button' 		=> $work_label_button
				);
				$result = $this->m_work->InsertData('tbl_work', $data);
				if ($result == 1) {
					redirect('work/index', 'refresh');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
				} else {
					echo "ERROR";
				}
			} else {
				$data = array(
					'work_category_id' 	=> $work_category_id,
					'work_icon' 		=> $work_icon,
					'work_title' 		=> $work_title,
					'work_description' 	=> $work_description,
					'work_link' 		=> $work_link,
					'work_label_button' 		=> $work_label_button
				);
				$result = $this->m_work->UpdateData('tbl_work', $data, array('id' => $id));
				if ($result == 1) {
					redirect('work/index', 'refresh');
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
		$result = $this->m_work->DeleteData('tbl_work', array('id' => $id));
		if ($result == 1) {
			redirect('work/index', 'refresh');
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
			'title' 	=> 'work Category',
			'session' 	=> $this->session->userdata('admin'),
			'id'	 		=> '',
			'category_work_name' 			=> '',
			'category_work_description' 	=> '',
			'editor_status' => 'new',

			'data_work_category' => $this->m_work->GetworkCategory()->result_array()
		);
		render_backend('admin/work/category', $data);
	}

	function category_edit($id = 0)
	{
		$this->session_on();
		$data_work_category = $this->m_work->GetWorkCategory("WHERE id = '$id'")->result_array();

		$data = array(
			'title' 	=> 'work Category',
			'session' 	=> $this->session->userdata('admin'),

			'id'	 						=> $data_work_category[0]['id'],
			'category_work_name' 			=> $data_work_category[0]['category_work_name'],
			'category_work_description' 	=> $data_work_category[0]['category_work_description'],
			'editor_status' => 'edit',

			'data_work_category' => $this->m_work->GetWorkCategory()->result_array()
		);
		render_backend('admin/work/category', $data);
	}

	function category_save()
	{
		$this->session_on();
		if ($_POST) {
			$id		= $this->input->post('id');
			$category_work_name		= $this->input->post('category_work_name');
			$category_work_description		= $this->input->post('category_work_description');
			$editor_status		= $this->input->post('editor_status');

			if ($editor_status == "new") {
				$data = array(
					'category_work_name' 	=> $category_work_name,
					'category_work_description' 	=> $category_work_description,
					'category_work_slug' 	=> url_title($category_work_name, '-', TRUE),
				);
				$result = $this->m_work->InsertData('tbl_work_category', $data);
				if ($result == 1) {
					redirect('work/category', 'refresh');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
				} else {
					echo "ERROR";
				}
			} else {
				$data = array(
					'category_work_name' 	=> $category_work_name,
					'category_work_description' 	=> $category_work_description,
					'category_work_slug' 	=> url_title($category_work_name, '-', TRUE),
				);
				$result = $this->m_work->UpdateData('tbl_work_category', $data, array('id' => $id));
				if ($result == 1) {
					redirect('work/category', 'refresh');
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
		$result = $this->m_work->DeleteData('tbl_work_category', array('id' => $id));
		if ($result == 1) {
			redirect('work/category', 'refresh');
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
