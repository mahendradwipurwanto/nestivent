<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['M_template']);
	}

	public function frontend_util($data){
		$this->load->view('frontend/frontend_util', $data);
	}

	public function frontend_auth($data){
		$this->load->view('frontend/frontend_auth', $data);
	}

	public function frontend_main($data){
		$this->load->view('frontend/frontend_main', $data);
	}

}
