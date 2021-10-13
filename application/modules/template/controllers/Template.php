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

		// SOSMED
		$data['LN_FACEBOOK']		= $this->M_template->get_facebookLink();
		$data['LN_INSTAGRAM']		= $this->M_template->get_instagramLink();
		$data['LN_TWITTER']			= $this->M_template->get_twitterLink();
		$data['LN_GITHUB']			= $this->M_template->get_githubLink();

		// LOGO
		$data['LOGO_FAV']			= $this->M_template->get_logoFav();
		$data['LOGO_WHITE']			= $this->M_template->get_logoWhite();
		$data['LOGO_BLACK']			= $this->M_template->get_logoBlack();

		// META
		$data['WEB_JUDUL']			= $this->M_template->get_webJudul();
		$data['WEB_DESKRIPSI']		= $this->M_template->get_webDeskripsi();
		$data['WEB_WA']				= $this->M_template->get_webWa();
		$data['WEB_HERO_BUTTON']	= $this->M_template->get_webHeroButton();
		$data['OPEN_CAREER']		= $this->M_template->get_openCareer();

		// ETC
		$data['pFoto']				= $this->M_template->get_foto($this->session->userdata('kode_user'));
		$data['notifikasi']			= $this->M_template->get_notifikasiAdmin();
		$data['aktivitas']			= $this->M_template->get_aktivitasAdmin();
		$data['c_notifikasi']		= $this->M_template->count_notifikasiAdmin();
		$data['c_aktivitas']		= $this->M_template->count_aktivitasAdmin();
		
		$data['CI']					= $this;

		$this->load->view('backend/backend_main', $data);
	}

	public function kpanel_main($data){

		// SOSMED
		$data['LN_FACEBOOK']		= $this->M_template->get_facebookLink();
		$data['LN_INSTAGRAM']		= $this->M_template->get_instagramLink();
		$data['LN_TWITTER']			= $this->M_template->get_twitterLink();
		$data['LN_GITHUB']			= $this->M_template->get_githubLink();

		// LOGO
		$data['LOGO_FAV']			= $this->M_template->get_logoFav();
		$data['LOGO_WHITE']			= $this->M_template->get_logoWhite();
		$data['LOGO_BLACK']			= $this->M_template->get_logoBlack();

		// META
		$data['WEB_JUDUL']			= $this->M_template->get_webJudul();
		$data['WEB_DESKRIPSI']		= $this->M_template->get_webDeskripsi();
		$data['WEB_WA']				= $this->M_template->get_webWa();
		$data['WEB_HERO_BUTTON']	= $this->M_template->get_webHeroButton();
		$data['OPEN_CAREER']		= $this->M_template->get_openCareer();

		// ETC
		$data['pFoto']				= $this->M_template->get_foto($this->session->userdata('kode_user'));
		$data['notifikasi']			= $this->M_template->get_notifikasiKpanel($this->session->userdata('kode_akses'));
		$data['aktivitas']			= $this->M_template->get_aktivitasKpanel($this->session->userdata('kode_akses'));
		$data['c_notifikasi']		= $this->M_template->count_notifikasiKpanel($this->session->userdata('kode_akses'));
		$data['c_aktivitas']		= $this->M_template->count_aktivitasKpanel($this->session->userdata('kode_akses'));

		$data['panel_kegiatan']		= $this->M_template->get_kegiatanPenyelenggara($this->session->userdata('kode_akses'));

		$kpanel 					= $this->M_template->get_penyelenggaraPengguna($this->session->userdata('email'));

		if ($kpanel->STATUS == 0):
			$kpanel_badgeColor 		= "secondary";
			$kpanel_status 			= "NON-ACTIVE";
		elseif ($kpanel->STATUS == 1):
			$kpanel_badgeColor 		= "primary";
			$kpanel_status 			= "ACTIVE";
		elseif ($kpanel->STATUS == 2):
			$kpanel_badgeColor 		= "warning";
			$kpanel_status 			= "CANCELED";
		else:
			$kpanel_badgeColor 		= "danger";
			$kpanel_status 			= "SUSPEND";
		endif;
		
		$nama 						= explode(" ", $kpanel->NAMA);
		$kpanel_nama 				= $nama[0];

		$data['kpanel_NAMA']		= $kpanel_nama;
		$data['kpanel_LOGO']		= $kpanel->LOGO;
		$data['kpanel_KODE']		= $kpanel->KODE_PENYELENGGARA;
		$data['kpanel_BadgeSTATUS']	= $kpanel_badgeColor;
		$data['kpanel_STATUS']		= $kpanel_status;

		$data['kpanel_BadgeSTATUS']	= $kpanel_badgeColor;
		$data['kpanel_STATUS']		= $kpanel_status;

		$data['CI']					= $this;

		$this->load->view('kpanel/kpanel_main', $data);
	}

	public function manage_kompetisi_main($data){

		// SOSMED
		$data['LN_FACEBOOK']		= $this->M_template->get_facebookLink();
		$data['LN_INSTAGRAM']		= $this->M_template->get_instagramLink();
		$data['LN_TWITTER']			= $this->M_template->get_twitterLink();
		$data['LN_GITHUB']			= $this->M_template->get_githubLink();

		// LOGO
		$data['LOGO_FAV']			= $this->M_template->get_logoFav();
		$data['LOGO_WHITE']			= $this->M_template->get_logoWhite();
		$data['LOGO_BLACK']			= $this->M_template->get_logoBlack();

		// META
		$data['WEB_JUDUL']			= $this->M_template->get_webJudul();
		$data['WEB_DESKRIPSI']		= $this->M_template->get_webDeskripsi();
		$data['WEB_WA']				= $this->M_template->get_webWa();
		$data['WEB_HERO_BUTTON']	= $this->M_template->get_webHeroButton();
		$data['OPEN_CAREER']		= $this->M_template->get_openCareer();

		// ETC
		$data['pFoto']				= $this->M_template->get_foto($this->session->userdata('kode_user'));
		$data['notifikasi']			= $this->M_template->get_notifikasiKompetisi($this->session->userdata('manage_kompetisi'));
		$data['aktivitas']			= $this->M_template->get_aktivitasKompetisi($this->session->userdata('manage_kompetisi'));
		$data['c_notifikasi']		= $this->M_template->count_notifikasiKompetisi($this->session->userdata('manage_kompetisi'));
		$data['c_aktivitas']		= $this->M_template->count_aktivitasKompetisi($this->session->userdata('manage_kompetisi'));

		$data['panel_kegiatan']		= $this->M_template->get_kegiatanPenyelenggara($this->session->userdata('kode_akses'));

		$kpanel 					= $this->M_template->get_penyelenggaraPengguna($this->session->userdata('email'));

		if ($kpanel->STATUS == 0):
			$kpanel_badgeColor 		= "secondary";
			$kpanel_status 			= "NON-ACTIVE";
		elseif ($kpanel->STATUS == 1):
			$kpanel_badgeColor 		= "primary";
			$kpanel_status 			= "ACTIVE";
		elseif ($kpanel->STATUS == 2):
			$kpanel_badgeColor 		= "warning";
			$kpanel_status 			= "CANCELED";
		else:
			$kpanel_badgeColor 		= "danger";
			$kpanel_status 			= "SUSPEND";
		endif;
		
		$nama 						= explode(" ", $kpanel->NAMA);
		$kpanel_nama 				= $nama[0];

		$data['kpanel_NAMA']		= $kpanel_nama;
		$data['kpanel_LOGO']		= $kpanel->LOGO;
		$data['kpanel_KODE']		= $kpanel->KODE_PENYELENGGARA;
		$data['kpanel_BadgeSTATUS']	= $kpanel_badgeColor;
		$data['kpanel_STATUS']		= $kpanel_status;

		$data['kpanel_BadgeSTATUS']	= $kpanel_badgeColor;
		$data['kpanel_STATUS']		= $kpanel_status;

	    $data['cek_form']   		= $this->M_template->cek_form($this->session->userdata('manage_kompetisi'));

		$data['CI']					= $this;

		$this->load->view('manage_kompetisi/manage_main', $data);
	}

	public function manage_event_main($data){

		// SOSMED
		$data['LN_FACEBOOK']		= $this->M_template->get_facebookLink();
		$data['LN_INSTAGRAM']		= $this->M_template->get_instagramLink();
		$data['LN_TWITTER']			= $this->M_template->get_twitterLink();
		$data['LN_GITHUB']			= $this->M_template->get_githubLink();

		// LOGO
		$data['LOGO_FAV']			= $this->M_template->get_logoFav();
		$data['LOGO_WHITE']			= $this->M_template->get_logoWhite();
		$data['LOGO_BLACK']			= $this->M_template->get_logoBlack();

		// META
		$data['WEB_JUDUL']			= $this->M_template->get_webJudul();
		$data['WEB_DESKRIPSI']		= $this->M_template->get_webDeskripsi();
		$data['WEB_WA']				= $this->M_template->get_webWa();
		$data['WEB_HERO_BUTTON']	= $this->M_template->get_webHeroButton();
		$data['OPEN_CAREER']		= $this->M_template->get_openCareer();

		// ETC
		$data['pFoto']				= $this->M_template->get_foto($this->session->userdata('kode_user'));
		$data['notifikasi']			= $this->M_template->get_notifikasiEvent($this->session->userdata('manage_event'));
		$data['aktivitas']			= $this->M_template->get_aktivitasEvent($this->session->userdata('manage_event'));
		$data['c_notifikasi']		= $this->M_template->count_notifikasiEvent($this->session->userdata('manage_event'));
		$data['c_aktivitas']		= $this->M_template->count_aktivitasEvent($this->session->userdata('manage_event'));

		$data['panel_kegiatan']		= $this->M_template->get_kegiatanPenyelenggara($this->session->userdata('kode_akses'));

		$kpanel 					= $this->M_template->get_penyelenggaraPengguna($this->session->userdata('email'));

		if ($kpanel->STATUS == 0):
			$kpanel_badgeColor 		= "secondary";
			$kpanel_status 			= "NON-ACTIVE";
		elseif ($kpanel->STATUS == 1):
			$kpanel_badgeColor 		= "primary";
			$kpanel_status 			= "ACTIVE";
		elseif ($kpanel->STATUS == 2):
			$kpanel_badgeColor 		= "warning";
			$kpanel_status 			= "CANCELED";
		else:
			$kpanel_badgeColor 		= "danger";
			$kpanel_status 			= "SUSPEND";
		endif;
		
		$nama 						= explode(" ", $kpanel->NAMA);
		$kpanel_nama 				= $nama[0];

		$data['kpanel_NAMA']		= $kpanel_nama;
		$data['kpanel_LOGO']		= $kpanel->LOGO;
		$data['kpanel_KODE']		= $kpanel->KODE_PENYELENGGARA;
		$data['kpanel_BadgeSTATUS']	= $kpanel_badgeColor;
		$data['kpanel_STATUS']		= $kpanel_status;

		$data['kpanel_BadgeSTATUS']	= $kpanel_badgeColor;
		$data['kpanel_STATUS']		= $kpanel_status;

	    $data['cek_form']   		= $this->M_template->cek_form($this->session->userdata('manage_event'));

		$data['CI']					= $this;

		$this->load->view('manage_event/manage_main', $data);
	}

	public function frontend_util($data){

		// SOSMED
		$data['LN_FACEBOOK']		= $this->M_template->get_facebookLink();
		$data['LN_INSTAGRAM']		= $this->M_template->get_instagramLink();
		$data['LN_TWITTER']			= $this->M_template->get_twitterLink();
		$data['LN_GITHUB']			= $this->M_template->get_githubLink();

		// LOGO
		$data['LOGO_FAV']			= $this->M_template->get_logoFav();
		$data['LOGO_WHITE']			= $this->M_template->get_logoWhite();
		$data['LOGO_BLACK']			= $this->M_template->get_logoBlack();

		// META
		$data['WEB_JUDUL']			= $this->M_template->get_webJudul();
		$data['WEB_DESKRIPSI']		= $this->M_template->get_webDeskripsi();
		$data['WEB_WA']				= $this->M_template->get_webWa();
		$data['WEB_HERO_BUTTON']	= $this->M_template->get_webHeroButton();
		$data['OPEN_CAREER']		= $this->M_template->get_openCareer();

		// ETC

		$data['CI']					= $this;

		$this->load->view('frontend/frontend_util', $data);
	}

	public function frontend_auth($data){

		// SOSMED
		$data['LN_FACEBOOK']		= $this->M_template->get_facebookLink();
		$data['LN_INSTAGRAM']		= $this->M_template->get_instagramLink();
		$data['LN_TWITTER']			= $this->M_template->get_twitterLink();
		$data['LN_GITHUB']			= $this->M_template->get_githubLink();

		// LOGO
		$data['LOGO_FAV']			= $this->M_template->get_logoFav();
		$data['LOGO_WHITE']			= $this->M_template->get_logoWhite();
		$data['LOGO_BLACK']			= $this->M_template->get_logoBlack();

		// META
		$data['WEB_JUDUL']			= $this->M_template->get_webJudul();
		$data['WEB_DESKRIPSI']		= $this->M_template->get_webDeskripsi();
		$data['WEB_WA']				= $this->M_template->get_webWa();
		$data['WEB_HERO_BUTTON']	= $this->M_template->get_webHeroButton();
		$data['OPEN_CAREER']		= $this->M_template->get_openCareer();

		// ETC

		$data['CI']					= $this;

		$this->load->view('frontend/frontend_auth', $data);
	}

	public function frontend_main($data){

		// MEGA MENU PENYELENGGARA
		$data['mega_penyelenggara']	= $this->M_template->get_megaPenyelenggara();

		// SOSMED
		$data['LN_FACEBOOK']		= $this->M_template->get_facebookLink();
		$data['LN_INSTAGRAM']		= $this->M_template->get_instagramLink();
		$data['LN_TWITTER']			= $this->M_template->get_twitterLink();
		$data['LN_GITHUB']			= $this->M_template->get_githubLink();

		// LOGO
		$data['LOGO_FAV']			= $this->M_template->get_logoFav();
		$data['LOGO_WHITE']			= $this->M_template->get_logoWhite();
		$data['LOGO_BLACK']			= $this->M_template->get_logoBlack();

		// META
		$data['WEB_JUDUL']			= $this->M_template->get_webJudul();
		$data['WEB_DESKRIPSI']		= $this->M_template->get_webDeskripsi();
		$data['WEB_WA']				= $this->M_template->get_webWa();
		$data['WEB_HERO_BUTTON']	= $this->M_template->get_webHeroButton();
		$data['OPEN_CAREER']		= $this->M_template->get_openCareer();

		// ETC

		if ($this->M_template->have_panel($this->session->userdata('email')) == TRUE || $this->M_template->pending_kpanel($this->session->userdata('email')) == TRUE) {

			$kpanel 					= $this->M_template->get_penyelenggaraPengguna($this->session->userdata('email'));

			if ($kpanel->STATUS == 0):
				$kpanel_badgeColor 		= "secondary";
				$kpanel_status 			= "NON-ACTIVE";
			elseif ($kpanel->STATUS == 1):
				$kpanel_badgeColor 		= "primary";
				$kpanel_status 			= "ACTIVE";
			elseif ($kpanel->STATUS == 2):
				$kpanel_badgeColor 		= "warning";
				$kpanel_status 			= "CANCELED";
			else:
				$kpanel_badgeColor 		= "danger";
				$kpanel_status 			= "SUSPEND";
			endif;
			
			$nama 						= explode(" ", $kpanel->NAMA);
			$kpanel_nama 				= $nama[0];

			$data['kpanel_NAMA']		= $kpanel_nama;
			$data['kpanel_LOGO']		= $kpanel->LOGO;
			$data['kpanel_KODE']		= $kpanel->KODE_PENYELENGGARA;
			$data['kpanel_BadgeSTATUS']	= $kpanel_badgeColor;
			$data['kpanel_STATUS']		= $kpanel_status;
		}

		$data['count_kpanel']		= $this->M_template->count_kpanel($this->session->userdata('email'));
		$data['kPanel']				= $this->M_template->have_panel($this->session->userdata('email'));
		$data['pending_kpanel']		= $this->M_template->pending_kpanel($this->session->userdata('email'));
		$data['pFoto']				= $this->M_template->get_foto($this->session->userdata('kode_user'));
		$data['aktivasi']			= $this->M_template->cek_aktivasi($this->session->userdata('kode_user'));
		$data['c_notifikasi']	= $this->M_template->count_notifikasi($this->session->userdata('kode_user'));

		$data['CI']					= $this;

		$this->load->view('frontend/frontend_main', $data);
	}

	public function frontend_user($data){

		// MEGA MENU PENYELENGGARA
		$data['mega_penyelenggara']	= $this->M_template->get_megaPenyelenggara();

		// SOSMED
		$data['LN_FACEBOOK']		= $this->M_template->get_facebookLink();
		$data['LN_INSTAGRAM']		= $this->M_template->get_instagramLink();
		$data['LN_TWITTER']			= $this->M_template->get_twitterLink();
		$data['LN_GITHUB']			= $this->M_template->get_githubLink();

		// LOGO
		$data['LOGO_FAV']			= $this->M_template->get_logoFav();
		$data['LOGO_WHITE']			= $this->M_template->get_logoWhite();
		$data['LOGO_BLACK']			= $this->M_template->get_logoBlack();

		// META
		$data['WEB_JUDUL']			= $this->M_template->get_webJudul();
		$data['WEB_DESKRIPSI']		= $this->M_template->get_webDeskripsi();
		$data['WEB_WA']				= $this->M_template->get_webWa();
		$data['WEB_HERO_BUTTON']	= $this->M_template->get_webHeroButton();
		$data['OPEN_CAREER']		= $this->M_template->get_openCareer();

		// ETC

		if ($this->M_template->have_panel($this->session->userdata('email')) == TRUE || $this->M_template->pending_kpanel($this->session->userdata('email')) == TRUE) {

			$kpanel 					= $this->M_template->get_penyelenggaraPengguna($this->session->userdata('email'));

			if ($kpanel->STATUS == 0):
				$kpanel_badgeColor 		= "secondary";
				$kpanel_status 			= "NON-ACTIVE";
			elseif ($kpanel->STATUS == 1):
				$kpanel_badgeColor 		= "primary";
				$kpanel_status 			= "ACTIVE";
			elseif ($kpanel->STATUS == 2):
				$kpanel_badgeColor 		= "warning";
				$kpanel_status 			= "CANCELED";
			else:
				$kpanel_badgeColor 		= "danger";
				$kpanel_status 			= "SUSPEND";
			endif;
			
			$nama 						= explode(" ", $kpanel->NAMA);
			$kpanel_nama 				= $nama[0];

			$data['kpanel_NAMA']		= $kpanel_nama;
			$data['kpanel_LOGO']		= $kpanel->LOGO;
			$data['kpanel_KODE']		= $kpanel->KODE_PENYELENGGARA;
			$data['kpanel_BadgeSTATUS']	= $kpanel_badgeColor;
			$data['kpanel_STATUS']		= $kpanel_status;
		}

		$data['count_kpanel']		= $this->M_template->count_kpanel($this->session->userdata('email'));
		$data['kPanel']				= $this->M_template->have_panel($this->session->userdata('email'));
		$data['pending_kpanel']		= $this->M_template->pending_kpanel($this->session->userdata('email'));
		$data['pFoto']				= $this->M_template->get_foto($this->session->userdata('kode_user'));
		$data['aktivasi']			= $this->M_template->cek_aktivasi($this->session->userdata('kode_user'));
		$data['c_notifikasi']		= $this->M_template->count_notifikasi($this->session->userdata('kode_user'));

		$data['CI']					= $this;

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
