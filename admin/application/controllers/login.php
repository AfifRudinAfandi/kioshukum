<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
	}

	public function index($mess = 1)
	{
		$this->load->view('admin/login', array('title' => 'Login Panel Admin / Author'));
	}

	function p_login()
	{
		if ($_POST) {
			$username 				= addslashes($_POST['username']);
			$password 				= md5($_POST['password']);
			$temp = $this->m_admin->GetUser("WHERE user_login = '$username' AND user_password = '$password'")->result_array();
			if ($temp != NULL && $temp[0]['user_level'] == '0') {
				$data = array(
					'user_id'		=> $temp[0]['user_id'],
					'user_nama' 	=> $temp[0]['user_nama_depan'],
				);
				$this->session->set_userdata('admin', $data);
				session_start();
				$_SESSION['kcfinder'] = false;
				header('location:' . base_url() . 'dashboard');
			} elseif ($temp != NULL && $temp[0]['user_level'] == '1') {
				$data = array(
					'user_id'		=> $temp[0]['user_id'],
					'user_nama' 	=> $temp[0]['user_nama_depan'],
				);
				$this->session->set_userdata('author', $data);
				session_start();
				$_SESSION['kcfinder'] = false;
				header('location:' . base_url() . 'author/');
			} else {
				$this->session->set_flashdata('message', 'Username atau password anda tidak cocok.');
				header('location:' . base_url() . 'login');
			}
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
