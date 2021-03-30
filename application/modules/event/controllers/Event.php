<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_event');

	}

	public function index(){

		$data['module'] 		= "event";
		$data['fileview'] 	= "event";
		echo Modules::run('template/frontend_main', $data);
	}

	public function event_detail($id){

		$data['module'] 		= "event";
		$data['fileview'] 	= "event_detail";
		echo Modules::run('template/frontend_main', $data);
	}

}?>
