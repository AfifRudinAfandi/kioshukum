<?php namespace App\Controllers;

use App\Models\SettingModel;
use App\Models\LawyerModel;


class Lawyer extends BaseController
{

	public function __construct()
    {
		$settingModel = new SettingModel();
		$this->setting      = $settingModel->getSetting();
	}

	public function index($lawyer_slug = null)
	{

		$lawyerModel = new LawyerModel();
		
        $render = [
        	'setting'						=> $this->setting->getRow(),
			'blog_title'		=> 'Kios Hukum',
            'lawyer' => $lawyerModel->getLawyer("WHERE tbl_lawyer.lawyer_slug = '$lawyer_slug'")->getResultArray(),
            'outher_lawyer' => $lawyerModel->getLawyer("WHERE tbl_lawyer.lawyer_slug != '$lawyer_slug' LIMIT 4")->getResult(),
        ];

		echo view('lawyer', $render);
    }
}