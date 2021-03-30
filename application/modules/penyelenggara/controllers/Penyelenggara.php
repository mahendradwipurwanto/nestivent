<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyelenggara extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_penyelenggara');

	}

	public function index(){

		$data['module'] 		= "penyelenggara";
		$data['fileview'] 	= "penyelenggara";
		echo Modules::run('template/frontend_main', $data);
	}

	public function penyelenggara_detail($id){

		$data['module'] 		= "penyelenggara";
		$data['fileview'] 	= "penyelenggara_detail";
		echo Modules::run('template/frontend_main', $data);
	}

}?>
