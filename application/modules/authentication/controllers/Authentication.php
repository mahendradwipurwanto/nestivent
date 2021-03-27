<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_authentication', 'm_auth');

	}

	public function index()
	{
		$this->load->view('welcome_message');
	}
}
