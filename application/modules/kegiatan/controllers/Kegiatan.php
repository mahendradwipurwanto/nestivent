<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kompetisi extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_kegiatan');

	}

	public function index(){

		$data['module'] 		= "kegiatan";
		$data['fileview'] 	= "login";
		echo Modules::run('template/frontend_auth', $data);
	}

}?>
