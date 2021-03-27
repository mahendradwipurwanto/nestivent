<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_authentication', 'm_auth');

	}

	public function index(){

		$data['module'] 		= "authentication";
		$data['fileview'] 	= "login";
		echo Modules::run('template/frontend_auth', $data);
	}

	public function daftar(){

		$data['module'] 		= "authentication";
		$data['fileview'] 	= "daftar";
		echo Modules::run('template/frontend_auth', $data);
	}

	public function recovery(){

		$data['module'] 		= "authentication";
		$data['fileview'] 	= "recovery";
		echo Modules::run('template/frontend_auth', $data);
	}
}
