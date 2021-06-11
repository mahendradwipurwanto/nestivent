<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {
	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('logged_in') == FALSE || !$this->session->userdata('logged_in')){
			if (!empty($_SERVER['QUERY_STRING'])) {
				$uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
			} else {
				$uri = uri_string();
			}
			$this->session->set_userdata('redirect', $uri);
			$this->session->set_flashdata('error', "Harap login ke akun anda, untuk melanjutkan");
			redirect('login');
		}
		$this->load->model('M_admin');

	}

  public function index(){

    $data['module'] 		= "admin";
    $data['fileview'] 	= "dashboard";
    echo Modules::run('template/backend_main', $data);
  }

}?>
