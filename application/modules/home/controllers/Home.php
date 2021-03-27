<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('M_home');

	}

	// Home page

	public function index(){

		$data['module'] 		= "home";
		$data['fileview'] 	= "home";
		echo Modules::run('template/frontend_main', $data);
	}

	public function penyelenggara(){


		$data['module'] 		= "home";
		$data['fileview'] 	= "penyelenggara";
		echo Modules::run('template/frontend_main', $data);
	}

	public function kegiatan(){


		$data['module'] 		= "home";
		$data['fileview'] 	= "kegiatan";
		echo Modules::run('template/frontend_main', $data);
	}
}
