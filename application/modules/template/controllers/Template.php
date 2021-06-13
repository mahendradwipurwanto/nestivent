<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['M_template']);
	}

	function time_elapsed($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'min',
        's' => 'sec',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
	}

	public function backend_main($data){
		$data['pFoto']				= $this->M_template->get_foto($this->session->userdata('kode_user'));
		$data['notifikasi']		= $this->M_template->get_notifikasiAdmin();
		$data['aktivitas']		= $this->M_template->get_aktivitasAdmin();
		$data['c_notifikasi']	= $this->M_template->count_notifikasiAdmin();
		$data['c_aktivitas']	= $this->M_template->count_aktivitasAdmin();
		$data['CI']						= $this;

		$this->load->view('backend/backend_main', $data);
	}

	public function frontend_util($data){
		$this->load->view('frontend/frontend_util', $data);
	}

	public function frontend_auth($data){
		$this->load->view('frontend/frontend_auth', $data);
	}

	public function frontend_main($data){
		$data['pFoto']				= $this->M_template->get_foto($this->session->userdata('kode_user'));
		$data['kPanel']				= $this->M_template->have_panel($this->session->userdata('email'));
		$this->load->view('frontend/frontend_main', $data);
	}

	public function frontend_user($data){
		$data['kPanel']				= $this->M_template->have_panel($this->session->userdata('email'));
		$data['pFoto']				= $this->M_template->get_foto($this->session->userdata('kode_user'));
		$data['aktivasi']			= $this->M_template->cek_aktivasi($this->session->userdata('kode_user'));
		$data['c_notifikasi']	= $this->M_template->count_notifikasi($this->session->userdata('kode_user'));

		$this->load->view('frontend/frontend_user', $data);
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
