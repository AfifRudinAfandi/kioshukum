<?php 
namespace App\Controllers;

use App\Models\SettingModel;
use App\Models\HomeModel;


class Account extends BaseController
{

	public function __construct()
    {
		$settingModel = new SettingModel();
		$this->setting      = $settingModel->getSetting();
	}

	public function index()
	{

		$homeModel = new HomeModel();
		
        $render = [
        	'setting'						=> $this->setting->getRow(),
            'blog_title'		=> 'Kios Hukum',
            '_css' => array(
                base_url() . "/assets/static/css/dashboard.css"
            )
        ];

		echo view('dashboard', $render);
    }

    public function login()
	{
		
        $render = [
        	'setting'	 => $this->setting->getRow(),
            'blog_title' => 'Kios Hukum',
            '_js'  		 => "
                <script>
				  const togglePassword = document.querySelector('#togglePassword');
				  const password = document.querySelector('#password');

				  togglePassword.addEventListener('click', function (e) {
					const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
					password.setAttribute('type', type);
					this.classList.toggle('fa-eye-slash');
				  });
				</script>
				
				<script>
					$('#form').submit(function(e) {
						$('#messages').removeClass('alert alert-danger').hide();
						$('#loader').show();
					
						var form = $(this);
						var formdata = false;
						if(window.FormData){
							formdata = new FormData(form[0]);
						}

						var formAction = form.attr('action');
						$.ajax({
							type        : 'POST',
							url         : '".base_url()."/account/login_proses',
							cache       : false,
							data        : formdata ? formdata : form.serialize(),
							contentType : false,
							processData : false,
							dataType	: 'json',
					
							success: function(response) {
								if(response.type == 'success') {
									setTimeout(function(){ 
										$('#loader').hide();
										$('#messages').show();
										$('#messages').addClass('alert alert-success').text(response.message);
										setTimeout(function(){
											document.location='/account';
										}, 3000);
									}, 3000);
								} else {
									setTimeout(function(){ 
										$('#loader').hide();
										$('#messages').show();
										$('#messages').addClass('alert alert-danger').text(response.message);
									}, 3000);
									
								}
							}
						});
						
						e.preventDefault();
					});
				</script>
            ",
        ];

		echo view('login', $render);
    }

    public function register()
	{
		
        $render = [
        	'setting'						=> $this->setting->getRow(),
            'blog_title'		=> 'Kios Hukum',
            '_js' => "

<script>
      const togglePassword = document.querySelector('#togglePassword');
      const password = document.querySelector('#password');

      const togglePasswordConfirm = document.querySelector('#togglePasswordConfirm');
      const passwordConfirm = document.querySelector('#confirm_password');

      togglePassword.addEventListener('click', function (e) {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
      });
      togglePasswordConfirm.addEventListener('click', function (e) {
        const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordConfirm.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
      });
    </script>
	
	<script>
	$('#password, #confirm_password').on('keyup', function () {
	  if ($('#password').val() == $('#confirm_password').val()) {
		$('#message_password').html('Matching').css('color', 'green');
	  } else 
		$('#message_password').html('Not Matching').css('color', 'red');
	});
    </script>
	
		<script>
			$('#form').submit(function(e) {
				$('#messages').removeClass('alert alert-danger').hide();
				$('#loader').show();
			
				var form = $(this);
				var formdata = false;
				if(window.FormData){
					formdata = new FormData(form[0]);
				}

				var formAction = form.attr('action');
				$.ajax({
					type        : 'POST',
					url         : '".base_url()."/account/register_proses',
					cache       : false,
					data        : formdata ? formdata : form.serialize(),
					contentType : false,
					processData : false,
					dataType	: 'json',
			
					success: function(response) {
						if(response.type == 'success') {
							setTimeout(function(){ 
								$('#loader').hide();
								$('#messages').show();
								$('#messages').addClass('alert alert-success').text(response.message);
								setTimeout(function(){
									document.location='login';
								}, 3000);
							}, 3000);
						} else {
							setTimeout(function(){ 
								$('#loader').hide();
								$('#messages').show();
								$('#messages').addClass('alert alert-danger').text(response.message);
							}, 3000);
							
						}
					}
				});
				
				e.preventDefault();
			});
		</script>
		
		
            ",
        ];

		echo view('register', $render);
    }
	
	public function login_proses()
	{
		$homeModel = new homeModel();
			
		$cek = $homeModel->cekLogin($_POST['email']);
		if($cek){
			if(password_verify($_POST['password'], $cek->member_password)){
				$newdata = [
						'member_id'         => $cek->member_id,
						'member_first_name' => $cek->member_first_name,
						'member_last_name'  => $cek->member_last_name,
						'member_email'      => $cek->member_email,
						'member_phone'      => $cek->member_phone,
				];
				$session = \Config\Services::session();
				$session->set($newdata);
				
				$output = json_encode(array('type'=>'success', 'message' => 'Log in successfully, creating your session.'));
				die($output);
			}else{
				$output = json_encode(array('type'=>'error', 'message' => 'Wrong Password!'));
				die($output);
			}
		}else{
			$output = json_encode(array('type'=>'error', 'message' => 'No data!'));
			die($output);
		}
	}
	
	public function register_proses()
	{
		$homeModel = new homeModel();
		$cek = $homeModel->getEmail($_POST['email']);
		
		if($cek > 0){
			$output = json_encode(array('type'=>'error', 'message' => 'Email already registered.'));
			die($output);
		}else{
			if (isset($_POST['first_name'])) {
				$data = [
					'member_first_name'       => $_POST['first_name'],
					'member_last_name'        => $_POST['last_name'],
					'member_email'            => $_POST['email'],
					'member_phone'            => $_POST['phone'],
					'member_password'         => password_hash($_POST['password'], PASSWORD_DEFAULT)
				];
				 
				$in = $homeModel->insertMember($data);
				if($in){
					$output = json_encode(array('type'=>'success', 'message' => 'Register successfully, now you can login.'));
					die($output);
				}else{
					$output = json_encode(array('type'=>'error', 'message' => 'something wrong!'));
					die($output);
				}
			}else{
				$output = json_encode(array('type'=>'error', 'message' => 'No data.'));
				
				die($output);
			}
		}
	}
}