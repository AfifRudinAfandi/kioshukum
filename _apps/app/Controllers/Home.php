<?php namespace App\Controllers;

use App\Models\SettingModel;
use App\Models\HomeModel;

class Home extends BaseController
{

	public function __construct()
    {
		$settingModel = new SettingModel();
		$this->setting      = $settingModel->getSetting();
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
            'landing_service_category'  => $data_landing[0]['landing_service_category'],
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
    
    public function landing($landing_id = null, $landing_slug = null)
	{
		$session = \Config\Services::session();

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
							<td>
								<button class="btn button-book mx-auto" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Book Now</button>
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
						<a class="btn button-book-mobile" href="#">Book Now</a>
					  </div>
					</div>
				</div>
				';
				$n++;
			}
			
            $render['result'] .= '
            </div>
			
			';
			
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
