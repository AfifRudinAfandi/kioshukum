<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_member');
	}

	public function index()
	{
		$this->session_on();
		$data = array(
			'session' 			=> $this->session->userdata('admin'),
			'member_id' 			=> '',
			'member_first_name' 	=> '',
			'member_last_name' => '',
			'member_email' 		=> '',
			'member_phone' 	=> '',
			'member_password' 		=> '',

			'editor_status' 	=> 'new',
			'title' 			=> 'Admin Panel',

			'data_member' 	=> $this->m_member->GetMember()->result_array()
		);
		render_backend('admin/member/index', $data);
	}

	function edit($id = 0)
	{
		$this->session_on();
		$data_user = $this->m_member->GetMember("WHERE member_id = '$id'")->result_array();
		$data = array(
			'session' 			=> $this->session->userdata('admin'),

			'member_id'				=> $data_user[0]['member_id'],
			'member_first_name' 	=> $data_user[0]['member_first_name'],
			'member_last_name' 		=> $data_user[0]['member_last_name'],
			'member_email'			=> $data_user[0]['member_email'],
			'member_phone' 			=> '',
			'member_password' 		=> $data_user[0]['member_password'],

			'editor_status'		=> 'edit',
			'title' 			=> 'Admin Panel',

			'data_member' 	=> $this->m_member->GetMember()->result_array()
		);
		render_backend('admin/member/index', $data);
	}

	function save()
	{
		$this->session_on();
		if ($_POST) {
			$member_id				= $this->input->post('member_id');
			$member_first_name		= $this->input->post('member_first_name');
			$member_last_name		= $this->input->post('member_last_name');
			$member_email			= $this->input->post('member_email');
			$member_phone			= $this->input->post('member_phone');
			$member_password		= $this->input->post('member_password');
			$editor_status			= $this->input->post('editor_status');

			if ($editor_status == "new") {
				$data = array(
					'member_first_name' 		=> $member_first_name,
					'member_last_name'	=> $member_last_name,
					'member_email' 			=> $member_email,
					'member_phone' 		=> $md5_password,
					'member_password'			=> $member_password,
				);
				$result = $this->m_member->InsertData('tbl_member', $data);
				if ($result == 1) {
					header('location:' . base_url() . 'member/index');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
				} else {
					echo "ERROR";
				}
			} elseif ($editor_status == "edit" && $member_phone == "") {
				$data = array(
					'member_id' 				=> $member_id,
					'member_first_name' 		=> $member_first_name,
					'member_last_name'			=> $member_last_name,
					'member_email' 				=> $member_email,
					'member_phone'				=> $member_phone,
					'member_password'			=> $member_password,
				);
				$result = $this->m_member->UpdateData('tbl_member', $data, array('member_id' => $member_id));
				if ($result == 1) {
					header('location:' . base_url() . 'member/index');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di ubah.
														</div>');
				} else {
					echo "ERROR";
				}
			} else {
				$data = array(
					'member_id' 				=> $member_id,
					'member_first_name' 		=> $member_first_name,
					'member_last_name'			=> $member_last_name,
					'member_email' 				=> $member_email,
					'member_phone'				=> $member_phone,
					'member_password'			=> $member_password,
				);
				$result = $this->m_member->UpdateData('tbl_member', $data, array('member_id' => $member_id));
				if ($result == 1) {
					header('location:' . base_url() . 'member/index');
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
		$result = $this->m_member->DeleteData('tbl_member', array('member_id' => $id));
		if ($result == 1) {
			header('location:' . base_url() . 'member/index');
			$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di hapus.
														</div>');
		} else {
			echo "ERROR";
		}
	}

	// SESSION
	function session_on()
	{
		if (!$this->session->userdata('admin')) {
			header('location:' . base_url() . 'login');
			exit(0);
		}
	}

	function session_off()
	{
		$this->session->sess_destroy();
		session_start();
		session_destroy();
		header('location:' . base_url() . 'login');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
