<?php namespace App\Controllers;

use App\Models\SettingModel;
use App\Models\HomeModel;

class Contact extends BaseController
{

    public function __construct()
    {

    	$settingModel = new SettingModel();
		$this->setting      = $settingModel->getSetting();

        helper('form');
        $this->form_validation = \Config\Services::validation();
    }

	public function index()
	{
		$homeModel = new HomeModel();
        $render = [
        	'setting'					=> $this->setting->getRow(),
            'blog_title'				=> 'Kios Hukum',
            'landing_partner_data'      => $homeModel->getPartner()->getResultArray(),
            'office_data'      			=> $homeModel->getOffice()->getResultArray(),
        ];

		$render['_js'] = "
<script>
tinymce.init({
  selector: 'textarea#basic',
  height: 300,
  menubar: false,
  plugins: [
    'advlist autolink',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo ' +
  'bold italic | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  ' | help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});

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
		url         : '".base_url()."/contact/send',
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
		";

		echo view('contact', $render);
    }

    public function send()
    {
        $homeModel = new homeModel();
		
		if (isset($_POST['inquiry_name1'])) {
			$data = [
				'inquiry_name'      => $this->request->getPost('inquiry_name1') .' '. $this->request->getPost('inquiry_name2'),
				'inquiry_email'     => $this->request->getPost('inquiry_email'),
				'inquiry_phone'     => $this->request->getPost('inquiry_phone'),
				'inquiry_type'      => $this->request->getPost('inquiry_type'),
				'inquiry_message'   => $this->request->getPost('inquiry_message'),
				'at_date_time'      => date("Y-m-d H:i:s"),
			];
			 
			$in = $homeModel->insertInquiry($data);
			if($in){
				$output = json_encode(array('type'=>'success', 'message' => 'Contact sent successfully.'));
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