<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilities extends MX_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('M_utilities', 'M_uti');

	}

	// Util Page

	public function e_404(){

		$data['module'] 		= "utilities";
		$data['fileview'] 	= "404";
		echo Modules::run('template/frontend_util', $data);
	}

	public function maintenance(){

		$data['module'] 		= "utilities";
		$data['fileview'] 	= "maintenance";
		echo Modules::run('template/frontend_util', $data);
	}

	public function coming_soon(){

		$data['module'] 		= "utilities";
		$data['fileview'] 	= "coming-soon";
		echo Modules::run('template/frontend_util', $data);
	}

}

?>
