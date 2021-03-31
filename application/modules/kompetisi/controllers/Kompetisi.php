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

	public function kompetisi_list(){

		$data['module'] 		= "kompetisi";
		$data['fileview'] 	= "kompetisi_list";
		echo Modules::run('template/frontend_main', $data);
	}

	public function kompetisi_detail($id){

		$data['module'] 		= "kompetisi";
		$data['fileview'] 	= "kompetisi_detail";
		echo Modules::run('template/frontend_main', $data);
	}

	public function galeri_karya($id){

		$data['module'] 		= "kompetisi";
		$data['fileview'] 	= "galeri_karya";
		echo Modules::run('template/frontend_main', $data);
	}

}?>
