<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_pungguna');
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

		$pengguna 	= $this->M_pungguna->cek_aktivasi($this->session->userdata('kode_user'));

		if ($pengguna->STATUS == 0) {
			redirect(site_url('hold-verification'));
		}
	}

	public function index(){

		$data['module'] 		= "pengguna";
		$data['fileview'] 	= "profil";
		echo Modules::run('template/backend_main', $data);
	}

}?>
