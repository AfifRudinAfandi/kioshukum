<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Service extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_service');
	}

	function index()
	{
		$this->session_on();
		$data = array(
			'title' 	=> 'Admin Panel',
			'session' 	=> $this->session->userdata('admin'),
			'data_service' => $this->m_service->GetService()->result_array(),

		);
		render_backend('admin/service/index', $data);
	}

	function new()
	{
		$this->session_on();

		/*end label to array*/
		$data = array(
			'session' 			            => $this->session->userdata('admin'),
			'service_id'	 		        => '',
			'service_category_id'           => '',
			'service_name'		            => '',
			'service_description' 		    => '',
			'service_city_id' 		    => '',
			'service_our_cost'              => '',
			'service_cost'              => '',
			// 'service_jabotabek_cost' 		=> '',
			// 'service_surabaya_cost' 		=> '',
			// 'service_other_cost' 	        => '',
			'service_note' 	                => '',
			'editor_status' 				=> 'new',
			'title' 			            => 'Admin Panel',
			'data_service_category'         => $this->m_service->GetServiceCategory()->result_array(),
			'data_service_city' => $this->m_service->GetServiceCity()->result_array()
		);
		render_backend('admin/service/editor', $data);
	}

	function edit($id = 0)
	{

		$this->session_on();
		$data_service = $this->m_service->GetService("WHERE service_id = '$id'")->result_array();

		$data = array(
			'session' 		            => $this->session->userdata('admin'),
			'service_id'	 	        => $data_service[0]['service_id'],
			'service_category_id'	 	=> $data_service[0]['service_category_id'],
			'service_name'	 	        => $data_service[0]['service_name'],
			'service_description' 	    => $data_service[0]['service_description'],
			'service_city_id' 	    => $data_service[0]['service_city_id'],
			'service_our_cost' 	        => $data_service[0]['service_our_cost'],
			'service_cost' 	        => $data_service[0]['service_cost'],
			// 'service_jabotabek_cost' 	=> $data_service[0]['service_jabotabek_cost'],
			// 'service_surabaya_cost' 	=> $data_service[0]['service_surabaya_cost'],
			// 'service_other_cost' 	    => $data_service[0]['service_other_cost'],
			'service_note' 	            => $data_service[0]['service_note'],
			'editor_status' 	        => 'edit',
			'title' 		            => 'Admin Panel',
			'data_service_category'     => $this->m_service->GetServiceCategory()->result_array(),
			'data_service_city' => $this->m_service->GetServiceCity()->result_array()
		);
		render_backend('admin/service/editor', $data);
	}

	function save()
	{
		$this->session_on();
		if ($_POST) {
			$service_id			        = $this->input->post('service_id');
			$service_category_id		= $this->input->post('service_category_id');
			$service_name			    = $this->input->post('service_name');
			$service_description	    = $this->input->post('service_description');
			$service_city_id	    = $this->input->post('service_city_id');
			$service_our_cost		    = $this->input->post('service_our_cost');
			$service_cost		    = $this->input->post('service_cost');
			// $service_jabotabek_cost		= $this->input->post('service_jabotabek_cost');
			// $service_surabaya_cost	    = $this->input->post('service_surabaya_cost');
			// $service_other_cost			= $this->input->post('service_other_cost');
			$service_note		        = $this->input->post('service_note');
			$editor_status		        = $this->input->post('editor_status');

			if ($editor_status == "new") {
				$data = array(
					'service_category_id' 	    => $service_category_id,
					'service_name' 	            => $service_name,
					'service_description' 	    => $service_description,
					'service_city_id' 	    => $service_city_id,
					'service_our_cost'          => $service_our_cost,
					'service_cost'          => $service_cost,
					// 'service_jabotabek_cost'    => $service_jabotabek_cost,
					// 'service_surabaya_cost' 	=> $service_surabaya_cost,
					// 'service_other_cost' 	    => $service_other_cost,
					'service_note' 	            => $service_note,
				);
				$result = $this->m_service->InsertData('tbl_service', $data);
				if ($result == 1) {
					redirect('service/index', 'refresh');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
				} else {
					echo "ERROR";
				}
			} else {
				$data = array(
					'service_category_id' 	    => $service_category_id,
					'service_name' 	            => $service_name,
					'service_description' 	    => $service_description,
					'service_city_id' 	    => $service_city_id,
					'service_our_cost'          => $service_our_cost,
					'service_cost'          => $service_cost,
					// 'service_jabotabek_cost'    => $service_jabotabek_cost,
					// 'service_surabaya_cost' 	=> $service_surabaya_cost,
					// 'service_other_cost' 	    => $service_other_cost,
					'service_note' 	            => $service_note,
				);
				$result = $this->m_service->UpdateData('tbl_service', $data, array('service_id' => $service_id));
				if ($result == 1) {
					redirect('service/index', 'refresh');
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
		$result = $this->m_service->DeleteData('tbl_service', array('service_id' => $id));
		if ($result == 1) {
			redirect('service/index', 'refresh');
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
			'title' 	=> 'Service Category',
			'session' 	=> $this->session->userdata('admin'),

			'category_id'	=> '',
			'category_name' => '',
			'category_description' => '',
			'category_icon' => '',
			'editor_status' => 'new',

			'data_service_category' => $this->m_service->GetServiceCategory()->result_array()
		);
		render_backend('admin/service/category', $data);
	}

	function category_edit($category_id = 0)
	{
		$this->session_on();
		$data_service_category = $this->m_service->GetServiceCategory("WHERE category_id = '$category_id'")->result_array();

		$data = array(
			'title' 	=> 'Service Category',
			'session' 	=> $this->session->userdata('admin'),

			'category_id'	=> $data_service_category[0]['category_id'],
			'category_name' => $data_service_category[0]['category_name'],
			'category_description' => $data_service_category[0]['category_description'],
			'category_icon' => $data_service_category[0]['category_icon'],
			'editor_status' => 'edit',

			'data_service_category' => $this->m_service->GetServiceCategory()->result_array()
		);
		render_backend('admin/service/category', $data);
	}

	function category_save()
	{
		$this->session_on();
		if ($_POST) {
			$category_id		= $this->input->post('category_id');
			$category_name		= $this->input->post('category_name');
			$category_description		= $this->input->post('category_description');
			$category_icon		= $this->input->post('category_icon');
			$editor_status		= $this->input->post('editor_status');

			if ($editor_status == "new") {
				$data = array(
					'category_name' 	=> $category_name,
					'category_description' 	=> $category_description,
					'category_icon' 	=> $category_icon,
					'category_slug' 	=> url_title($category_name, '-', TRUE)
				);
				$result = $this->m_service->InsertData('tbl_service_category', $data);
				if ($result == 1) {
					redirect('service/category', 'refresh');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
				} else {
					echo "ERROR";
				}
			} else {
				$data = array(
					'category_name' 	=> $category_name,
					'category_description' 	=> $category_description,
					'category_icon' 	=> $category_icon,
					'category_slug' 	=> url_title($category_name, '-', TRUE)
				);
				$result = $this->m_service->UpdateData('tbl_service_category', $data, array('category_id' => $category_id));
				if ($result == 1) {
					redirect('service/category', 'refresh');
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

	function category_delete($category_id = 0)
	{
		$this->session_on();
		$result = $this->m_service->DeleteData('tbl_service_category', array('category_id' => $category_id));
		if ($result == 1) {
			redirect('service/category', 'refresh');
			$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di hapus.
														</div>');
		} else {
			echo "ERROR";
		}
	}

	function city()
	{
		$this->session_on();
		$data = array(
			'title' 	=> 'Service City',
			'session' 	=> $this->session->userdata('admin'),

			'city_id'	=> '',
			'city_name' => '',
			'city_our_cost' => '',
			'city_cost' => '',
			'city_note' => '',
			'editor_status' => 'new',

			'data_service_city' => $this->m_service->GetServiceCity()->result_array()
		);
		render_backend('admin/service/city', $data);
	}

	function city_edit($city_id = 0)
	{
		$this->session_on();
		$data_service_city = $this->m_service->GetServiceCity("WHERE city_id = '$city_id'")->result_array();

		$data = array(
			'title' 	=> 'Service City',
			'session' 	=> $this->session->userdata('admin'),

			'city_id'		 => $data_service_city[0]['city_id'],
			'city_name'     => $data_service_city[0]['city_name'],
			'city_our_cost' => $data_service_city[0]['city_our_cost'],
			'city_cost'     => $data_service_city[0]['city_cost'],
			'city_note'     => $data_service_city[0]['city_note'],
			'editor_status' => 'edit',

			'data_service_city' => $this->m_service->GetServiceCity()->result_array()
		);
		render_backend('admin/service/city', $data);
	}

	function city_save()
	{
		$this->session_on();
		if ($_POST) {
			$city_id		= $this->input->post('city_id');
			$city_name		= $this->input->post('city_name');
			$city_our_cost		= $this->input->post('city_our_cost');
			$city_cost		= $this->input->post('city_cost');
			$city_note		= $this->input->post('city_note');
			$editor_status		= $this->input->post('editor_status');

			if ($editor_status == "new") {
				$data = array(
					'city_name' 	=> $city_name,
					'city_our_cost' 	=> $city_our_cost,
					'city_cost' 	=> $city_cost,
					'city_note' 	=> $city_note
				);
				$result = $this->m_service->InsertData('tbl_service_city', $data);
				if ($result == 1) {
					redirect('service/city', 'refresh');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
				} else {
					echo "ERROR";
				}
			} else {
				$data = array(
					'city_name' 	=> $city_name,
					'city_our_cost' 	=> $city_our_cost,
					'city_cost' 	=> $city_cost,
					'city_note' 	=> $city_note
				);
				$result = $this->m_service->UpdateData('tbl_service_city', $data, array('city_id' => $city_id));
				if ($result == 1) {
					redirect('service/city', 'refresh');
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

	function city_delete($city_id = 0)
	{
		$this->session_on();
		$result = $this->m_service->DeleteData('tbl_service_city', array('city_id' => $city_id));
		if ($result == 1) {
			redirect('service/city', 'refresh');
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
