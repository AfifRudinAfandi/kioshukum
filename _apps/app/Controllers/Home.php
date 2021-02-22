<?php namespace App\Controllers;

use App\Models\SettingModel;
use App\Models\HomeModel;

class Home extends BaseController
{
	protected $session;
	
	public function __construct()
    {
		$settingModel = new SettingModel();
		$this->setting      = $settingModel->getSetting();
		$this->session = \Config\Services::session();
	}

	public function index()
	{

		$homeModel    = new HomeModel();
		$data_landing = $homeModel->getLanding("WHERE landing_slug = 'home'")->getResultArray();
		
        $render = [
			'setting'					=> $this->setting->getRow(),
			'blog_title'		        => 'Kios Hukum',
            'landing_id'                => $data_landing[0]['landing_id'],
            'landing_name'              => $data_landing[0]['landing_name'],
            'landing_slide'             => $data_landing[0]['landing_slide'],
            'landing_slide_data'        => $homeModel->getSlide("WHERE slide_id_category  = ".$data_landing[0]['landing_slide']."")->getResult(),
            //'landing_service_category'  => $data_landing[0]['landing_service_category'],
			'landing_shortcut_menu'  	=> $homeModel->getShortCutMenu("WHERE is_parent = 93")->getResult(),
            'service_category_data'     => $homeModel->getServiceCategory()->getResult(),
            's1_landing_title'          => $data_landing[0]['s1_landing_title'],
            's1_landing_content'        => $data_landing[0]['s1_landing_content'],
            's2_landing_title'          => $data_landing[0]['s2_landing_title'],
            's2_landing_icon1'          => $data_landing[0]['s2_landing_icon1'],
            's2_landing_icon2'          => $data_landing[0]['s2_landing_icon2'],
            's2_landing_icon3'          => $data_landing[0]['s2_landing_icon3'],
            's2_landing_title1'         => $data_landing[0]['s2_landing_title1'],
            's2_landing_title2'         => $data_landing[0]['s2_landing_title2'],
            's2_landing_title3'         => $data_landing[0]['s2_landing_title3'],
            's2_landing_description1'   => $data_landing[0]['s2_landing_description1'],
            's2_landing_description2'   => $data_landing[0]['s2_landing_description2'],
            's2_landing_description3'   => $data_landing[0]['s2_landing_description3'],
            'landing_partner'           => $data_landing[0]['landing_partner'],
            'landing_partner_data'      => $homeModel->getPartner('where set_as_home=1')->getResultArray(),
            'landing_testimonial'       => $data_landing[0]['landing_testimonial'],
            'landing_testimonial_data'  => $homeModel->getTestimonial('WHERE set_as_home=1 AND testimonial_status=1')->getResultArray()
        ];

		echo view('home', $render);
    }

    public function blog()
	{

	}
    
	public function booking()
	{
		$homeModel = new HomeModel();
		
		$data = [
			'booking_date'          => date("Y-m-d H:i:s"),
			'booking_member_id'     => $this->request->getVar('member_id'),
			'booking_service_id'    => $this->request->getVar('service_id'),
			'booking_city'  => $this->request->getVar('service_city'),
			'booking_price' => $this->request->getVar('service_price'),
			'booking_status'        => 0,
		];
		
		$member = $homeModel->getMember($this->request->getVar('member_id'));
		$service = $homeModel->getService("WHERE service_id=".$this->request->getVar('service_id'))->getRow();
		
		$in = $homeModel->insertBooking($data);
		
		if($in){
			echo '
			<script>
			var whatsappMessage= "*Nama:* '.$member->member_first_name.'"+"\r\n"+"*Email:* '.$member->member_email.'"+"\r\n"+"*HP:* '.$member->member_phone.'"+"\r\n"+"*Booking Service:* '.$service->service_name.'"+"\r\n"+"*Kota:* '.$this->request->getVar('service_city').'"+"\r\n"+"*Kota:* '.$this->request->getVar('service_price').'";
			whatsappMessage = window.encodeURIComponent(whatsappMessage)
			window.open("https://wa.me/6281927939290?text="+whatsappMessage);
			</script>
			';
			
		}else{
			echo '<script>alert("Failed."); document.location="'.base_url('page/4/service-perizinan').'";</script>';
		}
		
	}
	
    public function landing($landing_id = null, $landing_slug = null)
	{
		
		$homeModel = new HomeModel();
        $data_landing = $homeModel->getLanding("WHERE landing_id = '$landing_id' AND landing_slug = '$landing_slug'")->getResultArray();
		
		$render['setting']					= $this->setting->getRow();
		$render['blog_title']		       	= 'Kios Hukum';
        $render['landing_id']               = $data_landing[0]['landing_id'];
        $render['landing_name']             = $data_landing[0]['landing_name'];
        $render['landing_shortdesc']        = $data_landing[0]['landing_shortdesc'];
        $render['landing_search']           = $data_landing[0]['landing_search'];
		$render['landing_service_category'] = $data_landing[0]['landing_service_category'];
		
        $render['landing_slide']            = $data_landing[0]['landing_slide'];
        $render['landing_slide_data']       = $homeModel->getSlide("WHERE slide_id_category  = ".$data_landing[0]['landing_slide']."")->getResult();
        $render['landing_service_category']	= $data_landing[0]['landing_service_category'];
        $render['service_category_data']    = $homeModel->getServiceCategory()->getResult();
	
        $render['landing_work']             = $data_landing[0]['landing_work'];
		$render['work_list']                = $data_landing[0]['work_list'];

		if($data_landing[0]['work_list'] != 0){
			$render['landing_work_data'] = $homeModel->getWork("WHERE work_category_id  = ".$data_landing[0]['work_list']."")->getResult();
		}else{
			$render['landing_work_data'] = $homeModel->getWork()->getResult();
		}

		$render['landing_lawyers'] = $data_landing[0]['landing_lawyers'];
		$render['lawyers_list'] = $data_landing[0]['lawyers_list'];

		if($data_landing[0]['lawyers_list'] != 0){
			$render['landing_lawyer_data'] = $homeModel->getLawyer("WHERE lawyer_category_id  = ".$data_landing[0]['lawyers_list']."")->getResult();
		}else{
			$render['landing_lawyer_data'] = $homeModel->getLawyer()->getResult();
		}
		
		$render['section1_on'] = $data_landing[0]['section1_on'];
		$render['s1_landing_title'] = $data_landing[0]['s1_landing_title'];
		$render['s1_landing_content'] = $data_landing[0]['s1_landing_content'];

		$render['section2_on'] = $data_landing[0]['section2_on'];
		$render['s2_landing_title'] = $data_landing[0]['s2_landing_title'];
		$render['s2_landing_icon1'] = $data_landing[0]['s2_landing_icon1'];
		$render['s2_landing_icon2'] = $data_landing[0]['s2_landing_icon2'];
		$render['s2_landing_icon3'] = $data_landing[0]['s2_landing_icon3'];
		$render['s2_landing_title1'] = $data_landing[0]['s2_landing_title1'];
		$render['s2_landing_title2'] = $data_landing[0]['s2_landing_title2'];
		$render['s2_landing_title3'] = $data_landing[0]['s2_landing_title3'];
		$render['s2_landing_description1'] = $data_landing[0]['s2_landing_description1'];
		$render['s2_landing_description2'] = $data_landing[0]['s2_landing_description2'];
		$render['s2_landing_description3'] = $data_landing[0]['s2_landing_description3'];

		$render['partner_on']               	= $data_landing[0]['partner_on'];
		$render['landing_partner']               = $data_landing[0]['landing_partner'];

		if($data_landing[0]['landing_partner'] != 0){
			$render['landing_partner_data'] = $homeModel->getPartner("WHERE partner_category_id=".$data_landing[0]['landing_partner']." AND set_as_home=1")->getResultArray();
		}else{
			$render['landing_partner_data'] = $homeModel->getPartner('WHERE set_as_home=1')->getResultArray();
		}

		$render['testimonial_on'] = $data_landing[0]['testimonial_on'];
		$render['landing_testimonial'] = $data_landing[0]['landing_testimonial'];

		if($data_landing[0]['landing_testimonial'] != 0){
			$render['landing_testimonial_data'] = $homeModel->getTestimonial("WHERE testimonial_category_id=".$data_landing[0]['landing_testimonial']." AND set_as_home=1 AND testimonial_status=1")->getResultArray();
		}else{
			$render['landing_testimonial_data'] = $homeModel->getTestimonial("WHERE set_as_home=1 AND testimonial_status=1")->getResultArray();
		}

		$c = $homeModel->getServiceCategory()->getResult();
		$render['service'] = '<select name="service" class="form-select" aria-label="Default select example" required>';
		$render['service'] .= '<option value="">--Pilih Service--</option>';
		foreach($c as $category){
			$render['service'] .= '<option value="'.$category->category_id.'">'.$category->category_name.'</option>';
		}
		$render['service'] .= '</select>';
		
		if(isset($_POST['wilayah'])){
			$wilayah = $_POST['wilayah'];
			$service = $_POST['service'];
			
			$w = $homeModel->getService(" WHERE service_category_id=".$service)->getResult();
			
			$render['result'] = '
			<div class="table-responsive">
				<p class="table-description">
				Tawaran terbaik kami untuk layanan terpilih
				</p>
				
				<table class="table table-pricing">
					<thead>
						<tr>
							<th class="pricing-table-title" scope="col">Layanan</th>
							<th class="pricing-table-title" scope="col">Wilayah</th>
							<th class="pricing-table-title" scope="col">Harga</th>
							<th class="pricing-table-title" scope="col"></th>
						</tr>
					</thead>
					<tbody>';
					
					foreach($w as $ser){
						$render['result'] .= '
						<tr>
							<td>
								'.$ser->service_name.'
								<p>
								'.$ser->service_description.'
								</p>
							</td>
							<td>'.$wilayah.'</td>
							<td>IDR. ';
							
							if($wilayah == 'jabotabek'){
								$cost = $ser->service_jabotabek_cost;
								$render['result'] .= number_format($ser->service_jabotabek_cost, 0, ',', '.');
							}
							if($wilayah == 'surabaya'){
								$cost = $ser->service_surabaya_cost;
								$render['result'] .=  number_format($ser->service_surabaya_cost, 0, ',', '.');
							}
							if($wilayah == 'other'){
								$cost = $ser->service_other_cost;
								$render['result'] .=  number_format($ser->service_other_cost, 0, ',', '.');
							}
						$render['result'] .= '
							</td>
							<td>';
								
								if($this->session->has('member_id')){
									$render['result'] .= '<form method="post" action="'.base_url().'/home/booking">
									<input type="hidden" name="member_id" value="'.$this->session->get()['member_id'].'">
									<input type="hidden" name="service_id" value="'.$ser->service_id.'">
									<input type="hidden" name="service_city" value="'.$wilayah.'">
									<input type="hidden" name="service_price" value="'.$cost.'">
									<button type="submit" class="btn button-book mx-auto">Book Now</button>
									</form>';
								}else{
									$render['result'] .= '<button class="btn button-book mx-auto" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Book Now</button>';
								}
								
						$render['result'] .= '
							</td>
						</tr>
						';
					}
					
				$render['result'] .= '
					</tbody>
				</table>
            </div>
			
			
			
			<div class="accordion accordion-flush accordion-pricing" id="accordionPricing">
			';
			$n = 1;
			foreach($w as $ser){
				$render['result'] .= '
				<div class="accordion-item">
					<h2 class="accordion-header" id="flush-heading'.$n.'">
					  <button class="accordion-button collapsed collapse-item-pricing"
						type="button"
						data-bs-toggle="collapse"
						data-bs-target="#flush-collapse'.$n.'"
						aria-expanded="false"
						aria-controls="flush-collapse'.$n.'"
					  >
						<p class="table-header">Layanan</p>
						<p class="table-title">
						  '.$ser->service_name.'
						</p>
						<p class="table-content">
						  '.$ser->service_description.'
						</p>
					  </button>
					</h2>
					<div
					  id="flush-collapse'.$n.'"
					  class="accordion-collapse collapse"
					  aria-labelledby="flush-heading'.$n.'"
					  data-bs-parent="#accordionPricing"
					>
					  <div class="accordion-body">
						<a class="link-pernyataan" href="#">download Peryaratan</a>
						<div class="wrapper-table-content">
						  <p class="table-header">Wilayah</p>
						  <p class="table-title">'.$wilayah.'</p>
						</div>
						<div class="wrapper-table-content">
						  <p class="table-header">Harga</p>
						  <p class="table-title">';
						  
						  if($wilayah == 'jabotabek'){
							$cost = $ser->service_jabotabek_cost;
							$render['result'] .= 'IDR. '.number_format($ser->service_jabotabek_cost, 0, ',', '.');
						}
						if($wilayah == 'surabaya'){
							$cost = $ser->service_surabaya_cost;
							$render['result'] .=  'IDR. '.number_format($ser->service_surabaya_cost, 0, ',', '.');
						}
						if($wilayah == 'other'){
							$cost = $ser->service_other_cost;
							$render['result'] .=  'IDR. '.number_format($ser->service_other_cost, 0, ',', '.');
						}
						  
					$render['result'] .= '	  
						  </p>
						</div>
						';
						// if($this->session->has('member_id')){
						// 			$render['result'] .= '<a class="btn button-book-mobile" href="/home/booking">Book Now</a>';
						// 		}else{
						// 			$render['result'] .= '<a class="btn button-book-mobile" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Book Now</a>';
						// 		}
						if($this->session->has('member_id')){
							$render['result'] .= '<form method="post" action="'.base_url().'/home/booking">
							<input type="hidden" name="member_id" value="'.$this->session->get()['member_id'].'">
							<input type="hidden" name="service_id" value="'.$ser->service_id.'">
							<input type="hidden" name="service_city" value="'.$wilayah.'">
							<input type="hidden" name="service_price" value="'.$cost.'">
							<div class="wrapper-btn-mobile">
								<button type="submit" class="btn button-book-mobile mx-auto">Book Now</button>
							</div>
							</form>';
						}else{
							$render['result'] .= '<a class="btn button-book-mobile mx-auto" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Book Now</a>';
						}
					$render['result'] .= '	
					  </div>
					</div>
				</div>
				';
				$n++;
			}
			
            $render['result'] .= '
            </div>
			
			';
			
			$render['_js'] = "
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
										document.location='".base_url()."/page/4/service-perizinan';
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
			";
			
		}
		
		if(isset($_POST['service_id'])){
			if(empty($session->member_id)){
				header("Location: ".base_url('account/login'));
			}else{
				
			}
		}

		echo view('landing', $render);
	}

}
