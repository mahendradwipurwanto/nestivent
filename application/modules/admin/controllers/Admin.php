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

	public function index(){
		$data['pengguna']		  			= $this->M_admin->countPengguna();
		$data['diffPengguna']		  	= $this->M_admin->countDiffPengguna();
		$data['penyelenggara'] 			= $this->M_admin->countPenyelenggara();
		$data['diffPenyelenggara'] 	= $this->M_admin->countDiffPenyelenggara();
		$data['kompetisi']					= $this->M_admin->countKompetisi();
		$data['diffKompetisi']			= $this->M_admin->countDiffKompetisi();
		$data['event']							= $this->M_admin->countEvent();
		$data['diffEvent']					= $this->M_admin->countDiffEvent();

		$data['module'] 		= "admin";
		$data['fileview'] 	= "dashboard";
		echo Modules::run('template/backend_main', $data);
	}

	// DATA PENGGUNA
	public function data_pengguna(){
		$data['pengguna']					= $this->M_admin->get_pengguna();
		$data['countPengguna']		= $this->M_admin->countPengguna();
		$data['diffPengguna']		  = $this->M_admin->countDiffPengguna();
		$data['nonPengguna']			= $this->M_admin->countNonPengguna();
		$data['diffNonPengguna']  = $this->M_admin->countDiffNonPengguna();
		$data['NewPengguna']  	  = $this->M_admin->countNewPengguna();
		$data['countKPanel']			= $this->M_admin->countKPanel();
		$data['diffKPanel']  			= $this->M_admin->countDiffKPanel();

		$data['module'] 		= "admin";
		$data['fileview'] 	= "data_pengguna";
		echo Modules::run('template/backend_main', $data);
	}

	// DATA AKTIVITAS SISTEM
	public function aktivitas(){
		$this->load->library('pagination');

		$config['base_url'] 					= base_url().'aktivitas-sistem';
		$config['total_rows'] 				= $this->M_admin->count_aktivitasAdmin();
		$config['per_page'] 					= 5;

		$config['full_tag_open'] 			= '<nav class="d-flex justify-content-between align-items-center" aria-label="Page navigation example"><ul class="pagination justify-content-center pagination-sm">';
		$config['full_tag_close'] 		= '</ul></nav>';

		$config['next_link'] 					= '&raquo';
		$config['next_tag_open'] 			= '<li class="page-item">';
		$config['next_tag_close'] 		= '</li>';

		$config['prev_link'] 					= '&laquo';
		$config['prev_tag_open'] 			= '<li class="page-item">';
		$config['prev_tag_close'] 		= '</li>';

		$config['cur_tag_open'] 			= '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] 			= '<span class="sr-only">(current)</span></a></li>';

		$config['num_tag_open'] 			= '<li class="page-item">';
		$config['num_tag_close'] 			= '</li>';

		$config['attributes']					= array('class' => 'page-link');

		$this->pagination->initialize($config);

		$data['aktivitas']	= $this->M_admin->get_aktivitasAdmin($config['per_page'], (!$this->uri->segment(3) ? 0 : $this->uri->segment(3)));
		$data['CI']					= $this;

		$data['module'] 		= "admin";
		$data['fileview'] 	= "aktivitas";
		echo Modules::run('template/backend_main', $data);
	}

	// DATA NOTIFIKASI SISTEM
	public function notifikasi(){
		$this->load->library('pagination');

		$config['base_url'] 					= base_url().'notifikasi-sistem';
		$config['total_rows'] 				= $this->M_admin->count_notifikasiAdmin();
		$config['per_page'] 					= 5;

		$config['full_tag_open'] 			= '<nav class="d-flex justify-content-between align-items-center" aria-label="Page navigation example"><ul class="pagination justify-content-center pagination-sm">';
		$config['full_tag_close'] 		= '</ul></nav>';

		$config['next_link'] 					= '&raquo';
		$config['next_tag_open'] 			= '<li class="page-item">';
		$config['next_tag_close'] 		= '</li>';

		$config['prev_link'] 					= '&laquo';
		$config['prev_tag_open'] 			= '<li class="page-item">';
		$config['prev_tag_close'] 		= '</li>';

		$config['cur_tag_open'] 			= '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] 			= '<span class="sr-only">(current)</span></a></li>';

		$config['num_tag_open'] 			= '<li class="page-item">';
		$config['num_tag_close'] 			= '</li>';

		$config['attributes']					= array('class' => 'page-link');

		$this->pagination->initialize($config);

		$data['notifikasi']	= $this->M_admin->get_notifikasiAdmin($config['per_page'], (!$this->uri->segment(3) ? 0 : $this->uri->segment(3)));
		$data['CI']					= $this;

		$data['module'] 		= "admin";
		$data['fileview'] 	= "notifikasi";
		echo Modules::run('template/backend_main', $data);
	}

}?>
