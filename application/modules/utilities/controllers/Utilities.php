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

	// Company page

	public function about(){

		$data['c_penyelenggara']	= $this->M_uti->c_penyelenggara();
		$data['c_kegiatan']			= $this->M_uti->c_kegiatan();
		$data['c_pengguna']			= $this->M_uti->c_pengguna();

		$data['module'] 	= "utilities";
		$data['fileview'] 	= "about";
		echo Modules::run('template/frontend_main', $data);
	}

	public function contact(){

		$data['module'] 		= "utilities";
		$data['fileview'] 	= "contact";
		echo Modules::run('template/frontend_main', $data);
	}

	public function bantuan(){

		$data['module'] 		= "utilities";
		$data['fileview'] 	= "bantuan";
		echo Modules::run('template/frontend_main', $data);
	}

	public function package(){

		$data['module'] 		= "utilities";
		$data['fileview'] 	= "package";
		echo Modules::run('template/frontend_main', $data);
	}

	public function hireus(){

		$data['module'] 		= "utilities";
		$data['fileview'] 	= "hire-us";
		echo Modules::run('template/frontend_main', $data);
	}

	public function careers(){

		$data['module'] 		= "utilities";
		$data['fileview'] 	= "careers";
		echo Modules::run('template/frontend_main', $data);
	}

	public function careers_detail($id){

		$data['module'] 		= "utilities";
		$data['fileview'] 	= "career_detail";
		echo Modules::run('template/frontend_main', $data);
	}


	// Policy page

	public function privacy(){

		$data['module'] 		= "utilities";
		$data['fileview'] 	= "privacy";
		echo Modules::run('template/frontend_main', $data);
	}

	public function term(){

		$data['module'] 		= "utilities";
		$data['fileview'] 	= "term";
		echo Modules::run('template/frontend_main', $data);
	}

}

?>
