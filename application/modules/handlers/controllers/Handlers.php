<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Handlers extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_handlers');

	}

// SAVE LOG
// 1. LOGIN
// 2. DAFTAR
// 3. AKTIVASI
// 4. RECOVERY
// 5. PENGAJUAN
// 6. HAPUS AKUN

// RECEIVER GROUP
// 1. PRIVATE
// 2. ADMIN
// 3. PENYELENGGARA
// 4. EVENT

	function init_kpanel($kode){

		if ($this->session->userdata('logged_in') == FALSE || !$this->session->userdata('logged_in')){
			if (!empty($_SERVER['QUERY_STRING'])) {
				$uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
			} else {
				$uri = uri_string();
			}
			$this->session->set_userdata('redirect', $uri);
			$this->session->set_flashdata('error', "Harap login ke akun anda, untuk melanjutkan");
			redirect('login');
		}else{
			if ($this->M_handlers->get_kpanelData($this->session->userdata("email")) == FALSE) {

				$this->session->set_flashdata('error', "Opss... anda tidak memiliki akses ke K-Panel");
				redirect($this->agent->referrer());

			} else {
				$data = $this->M_handlers->get_kpanelData($this->session->userdata("email"), htmlspecialchars($kode));

				$sessiondata = array(
					'kode_akses'     		=> $data->KODE_PENYELENGGARA,
					'penyelenggara_akses'   => $data->NAMA,
					'logo_akses'   			=> $data->LOGO,
					'role_akses'   			=> $data->BAGIAN,
					'status_akses'      	=> TRUE
				);

				$this->session->set_userdata($sessiondata);

				// SAVE LOG K-Panel
				$this->M_handlers->log_aktivitasKpanel($data->KODE_PENYELENGGARA, $this->session->userdata("kode_user"), 10, 3);

				$this->session->set_flashdata('success', "Selamat datang, ".$this->session->userdata("nama")." di akses panel ".$data->NAMA."mu");
				redirect('k-panel');
			}

		}
	}

	function akses_event($kode){

		if ($this->session->userdata('logged_in') == FALSE || !$this->session->userdata('logged_in')){
			if (!empty($_SERVER['QUERY_STRING'])) {
				$uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
			} else {
				$uri = uri_string();
			}
			$this->session->set_userdata('redirect', $uri);
			$this->session->set_flashdata('error', "Harap login ke akun anda, untuk melanjutkan");
			redirect('login');
		}else{
			if ($this->M_handlers->get_kpanelData($this->session->userdata("email")) == FALSE) {

				$this->session->set_flashdata('error', "Opss... anda tidak memiliki akses ke K-Panel");
				redirect($this->agent->referrer());

			} else {

				$data = $this->M_handlers->get_eventData($kode);

				$sessiondata = array(
					'manage_event'     		=> $data->KODE_EVENT,
					'manage_namaEvent'     	=> $data->JUDUL,
					'mstatus_event'      	=> TRUE
				);

				$this->session->set_userdata($sessiondata);

				// SAVE LOG K-Panel
				$this->M_handlers->log_aktivitasKpanel($kode, $this->session->userdata("kode_user"), 12, 4);

				$this->session->set_flashdata('success', "Selamat datang, ".$this->session->userdata("nama")." di panel eventmu");
				redirect('manage-event');
			}

		}
	}

	function akses_kompetisi($kode){

		if ($this->session->userdata('logged_in') == FALSE || !$this->session->userdata('logged_in')){
			if (!empty($_SERVER['QUERY_STRING'])) {
				$uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
			} else {
				$uri = uri_string();
			}
			$this->session->set_userdata('redirect', $uri);
			$this->session->set_flashdata('error', "Harap login ke akun anda, untuk melanjutkan");
			redirect('login');
		}else{
			if ($this->M_handlers->get_kpanelData($this->session->userdata("email")) == FALSE) {

				$this->session->set_flashdata('error', "Opss... anda tidak memiliki akses ke K-Panel");
				redirect($this->agent->referrer());

			} else {

				$data = $this->M_handlers->get_kompetisiData($kode);

				$sessiondata = array(
					'manage_kompetisi'     		=> $data->KODE_KOMPETISI,
					'manage_namaKompetisi'     	=> $data->JUDUL,
					'mstatus_kompetisi'      	=> TRUE
				);

				$this->session->set_userdata($sessiondata);

				// SAVE LOG K-Panel
				$this->M_handlers->log_aktivitasKpanel($kode, $this->session->userdata("kode_user"), 12, 4);

				$this->session->set_flashdata('success', "Selamat datang, ".$this->session->userdata("nama")." di panel kompetisimu");
				redirect('manage-kompetisi');
			}

		}
	}

}
