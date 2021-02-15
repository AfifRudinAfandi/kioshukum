<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
	}

	public function index($mess = -1)
	{
		$this->session_on();
		$data = array(
			'session' 	=> $this->session->userdata('admin'),
			'title' 	=> 'Admin Panel',
			'message' => $mess,
			'setting' 	=> $this->m_admin->GetSetting()->result_array()
		);
		render_backend('admin/setting/index', $data);;
	}

	function save()
	{
		$this->session_on();
		if ($_POST) {
			$title 			= $_POST['title'];
			$description 	= $_POST['description'];
			$keyword 		= $_POST['keyword'];
			$seo 			= $_POST['seo'];

			$web_logo = $_POST['web_logo'];
			$web_favicon = $_POST['web_favicon'];
			$web_address_1 = $_POST['web_address_1'];
			$web_address_2 = $_POST['web_address_2'];

			$sms	= $_POST['sms'];
			$telfone	= $_POST['telfone'];
			$email	= $_POST['email'];

			$web_facebook	= $_POST['web_facebook'];
			$web_twitter	= $_POST['web_twitter'];
			$web_youtube	= $_POST['web_youtube'];


			$footer = $_POST['footer'];
			$css = $_POST['css'];

			$data = array(
				'web_title' => $title,
				'web_description' => $description,
				'web_keyword' => $keyword,
				'google_seo' => $seo,


				'web_logo' => $web_logo,
				'web_favicon' => $web_favicon,
				'web_address_1' => $web_address_1,
				'web_address_2' => $web_address_2,

				'web_sms' => $sms,
				'web_telfone' => $telfone,
				'web_email' => $email,

				'web_facebook' => $web_facebook,
				'web_twitter' => $web_twitter,
				'web_youtube' => $web_youtube,


				'footer' => $footer,
				'custom_css' => $css,
			);
			$result = $this->m_admin->UpdateData('tbl_setting', $data, array('id' => '1'));
			if ($result == 1) {
				header('location:' . base_url() . 'setting/index');
				$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
			} else {
				header('location:' . base_url() . 'setting/index');
				$this->session->set_flashdata('message', '	<div class="alert alert-danger">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data gagal di simpan.
														</div>');
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
