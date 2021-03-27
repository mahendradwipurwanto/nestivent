<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['M_template']);
	}

	public function frontend($data){
		$this->load->view('frontend', $data);
	}

	public function frontend_main($data){
		$this->load->view('frontend_main', $data);
	}

}
