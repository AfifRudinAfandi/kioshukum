<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $incuiry = [
		'inquiry_name_1' => 'required|alpha_numeric',
		'inquiry_name_2' => 'required|alpha_numeric',
		'inquiry_email' => 'required|valid_email',
		'incuiry_phone' => 'required',
		'inquiry_type' => 'required',
		'inquiry_message' => 'required'
	];
	
	public $incuiry_errors = [
		'inquiry_name_1' => [
			'required'      => 'First Name Wajib diisi',
			'alpha_numeric' => 'First Name Hanya boleh diisi dengan huruf dan angka'
		],
		'inquiry_name_2' => [
			'required'      => 'Last Name Wajib diisi',
			'alpha_numeric' => 'Last Name Hanya boleh diisi dengan huruf dan angka'
		],
		'inquiry_email' => [
			'required'          => 'Email Address Wajib diisi',
			'email.valid_email' => 'Email Address Tidak valid'
		],
		'incuiry_phone' => [
			'required'      => 'Phone Wajib diisi'
		],
		'inquiry_type' => [
			'required'      => 'Type Wajib diisi'
		],
		'inquiry_message' => [
			'required'      => 'Message Wajib diisi'
		]
	];

}
