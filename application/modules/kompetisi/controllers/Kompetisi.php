<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kompetisi extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_kompetisi');

	}

	public function index(){

		$data['module'] 		= "kompetisi";
		$data['fileview'] 	= "kompetisi";
		echo Modules::run('template/frontend_main', $data);
	}

}?>
