<?php

namespace App\Controllers;

use App\Models\SettingModel;
use App\Models\FaqModel;

class Frequently_ask_question extends BaseController
{

	public function __construct()
    {
		$settingModel = new SettingModel();
		$this->setting      = $settingModel->getSetting();
	}

	public function index()
	{

		$faqModel = new FaqModel();

		$render = [
			'setting'						=> $this->setting->getRow(),
			'blog_title'		=> 'Kios Hukum',
			'faq_data'         	=> $faqModel->getFaq()->getResult(),
			'faq_category_data' => $faqModel->getCategoryFaq()->getResult(),
		];
		
		$render['faq'] = '<div class="tab-content" id="pills-tabContent">';
		
		$cat = $faqModel->getCategoryFaq()->getResult();
		$no = 1;
		foreach($cat as $category){
			$render['faq'] .= '<div class="tab-pane fade ';
			if($no == 1){ $render['faq'] .= 'show active'; }
			$render['faq'] .= '" id="'.$category->category_faq_slug.'" role="tabpanel" aria-labelledby="'.$category->category_faq_slug.'-tab">';
			$render['faq'] .= '<h5 class="tab-title">'.$category->category_faq_name.'</h5>';
			$render['faq'] .= '<p class="tab-description">'.$category->category_faq_description.'</p>';
			$render['faq'] .= '<div class="accordion accordion-flush" id="accordionFlushExample">';
			
			$dataFaq = $faqModel->getFaq(' WHERE faq_category_id='.$category->id)->getResult();
			foreach($dataFaq as $faq){
				$render['faq'] .= '
					
					<div class="accordion-item">
						<h2 class="accordion-header" id="flush-heading'.$faq->id.'">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse'.$faq->id.'" aria-expanded="false" aria-controls="flush-collapse'.$faq->id.'">
								'.$faq->faq_question.'
							</button>
						</h2>
						<div id="flush-collapse'.$faq->id.'" class="accordion-collapse collapse" aria-labelledby="flush-heading'.$faq->id.'" data-bs-parent="#accordionFlushExample" style="">
							<div class="accordion-body">'.$faq->faq_answer.'</div>
						</div>
					</div>
					
				';
			}
			$render['faq'] .= '</div>';
			$render['faq'] .= '</div>';
			$no++;
		}
		
		$render['faq'] .= '</div>';

		echo view('frequently_ask_question', $render);
	}
	
	public function search()
	{
		$faqModel = new FaqModel();
		
		//$query = $faqModel->cari($q)->getResult();
		//dd($query);
		
		$render = [
			'setting'						=> $this->setting->getRow(),
			'blog_title'		=> 'Kios Hukum',
			'faq_data'         	=> $faqModel->getFaq()->getResult(),
			'faq_category_data' => $faqModel->getCategoryFaq()->getResult(),
		];
		
		$render['cari'] = '<div class="tab-content" id="pills-tabContent">';
		
		$q = $this->request->getVar('q');
		$dataFaq = $faqModel->cari($q)->getResult();
		if($dataFaq == 0){
			$render['cari'] .= 'Nodata'; 
		}else{
		$no = 1;
		
			$render['cari'] .= '<div class="tab-pane fade ';
			if($no == 1){ $render['cari'] .= 'show active'; }
			$render['cari'] .= '" id="" role="tabpanel" aria-labelledby="">';
			$render['cari'] .= '<h5 class="tab-title"></h5>';
			$render['cari'] .= '<p class="tab-description"></p>';
			$render['cari'] .= '<div class="accordion accordion-flush" id="accordionFlushExample">';
			
			//$dataFaq = $faqModel->getFaq(' WHERE faq_category_id='.$category->id)->getResult();
			foreach($dataFaq as $faq){
				$render['cari'] .= '
					
					<div class="accordion-item">
						<h2 class="accordion-header" id="flush-heading'.$faq->id.'">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse'.$faq->id.'" aria-expanded="false" aria-controls="flush-collapse'.$faq->id.'">
								'.$faq->faq_question.'
							</button>
						</h2>
						<div id="flush-collapse'.$faq->id.'" class="accordion-collapse collapse" aria-labelledby="flush-heading'.$faq->id.'" data-bs-parent="#accordionFlushExample" style="">
							<div class="accordion-body">'.$faq->faq_answer.'</div>
						</div>
					</div>
					
				';
			}
			$render['cari'] .= '</div>';
			$render['cari'] .= '</div>';
			$no++;
		
		}
		$render['cari'] .= '</div>';
		
		echo view('frequently_ask_question', $render);
	}
}
