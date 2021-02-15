<?php namespace App\Controllers;

use App\Models\SettingModel;
use App\Models\TestimonialModel;


class Testimonial extends BaseController
{

	public function __construct()
    {
		$settingModel = new SettingModel();
		$this->setting = $settingModel->getSetting();
	}

	public function index()
	{

		$testimonialModel = new TestimonialModel();
		
        $render = [
        	'setting'			=> $this->setting->getRow(),
			'blog_title'		=> 'Kios Hukum',
            'testimonial_data' 	=> $testimonialModel->getTestimonial('WHERE set_as_home=1 AND testimonial_status=1')->getResultArray(),
        ];

		echo view('testimonial', $render);
    }
}