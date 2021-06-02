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
		$data['kPanel']		= $this->M_template->have_panel($this->session->userdata('email'));
		$this->load->view('frontend/frontend_main', $data);
	}

	public function backend_main($data){
		$data['kPanel']		= $this->M_template->have_panel($this->session->userdata('email'));
		$data['pFoto']		= $this->M_template->get_foto($this->session->userdata('kode_user'));
		$data['aktivasi']	= $this->M_template->cek_aktivasi($this->session->userdata('kode_user'));

		$this->load->view('backend/backend_main', $data);
	}

	function cookie_agrement(){

		$cookie= array(

      'name'   => 'cookie_agrement',
      'value'  => TRUE,
      'expire' => 86400*30,
      'domain' => 'https://nestivent.org/',
      'path'   => '/',

		);

		$this->input->set_cookie($cookie);

		log_message('debug', 'Cookies agrement check');

		redirect(base_url());
		// echo $this->input->cookie('cookie_agrement', TRUE);
	}


}
