<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('M_home');

	}

	// Home page

	public function index(){
		$data['event']		= $this->M_home->get_eventAll();
		$data['CI']			= $this;

		$data['module'] 	= "home";
		$data['fileview'] 	= "home";
		echo Modules::run('template/frontend_main', $data);
	}
}
