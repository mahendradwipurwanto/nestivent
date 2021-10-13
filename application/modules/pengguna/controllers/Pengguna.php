<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_pengguna');
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

		if ($this->session->userdata('role') != 1) {
			$this->session->set_flashdata('error', "Mohon maaf hak akses anda tidak diperuntukan untuk halaman ini");
			redirect($this->agent->referrer());
		}

		$pengguna 	= $this->M_pengguna->cek_aktivasi($this->session->userdata('kode_user'));
		$profil		= ($this->uri->segment(1) == "pengguna" && empty($this->uri->segment(2)) ? TRUE : FALSE);

		if ($pengguna->STATUS == 0 AND $profil == FALSE) {
			$this->session->set_flashdata('error', "Harap lakukan aktivasi akun anda, untuk melanjutkan");
			redirect(site_url('hold-verification'));
		}
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
		$data['notifikasi']			= $this->M_pengguna->get_notifikasi($this->session->userdata("kode_user"));
		$data['alert_kpanel']		= $this->M_pengguna->get_alertMakeKpanel($this->session->userdata("kode_user"));

		$data['event']				= $this->M_pengguna->get_eventAll();

		$data['daftarEvent']		= $this->M_pengguna->count_pesertaEvent($this->session->userdata("kode_user"));
		$data['daftarKompetisi']	= $this->M_pengguna->count_pesertaKompetisi($this->session->userdata("kode_user"));

		$data['CI']					= $this;

		$data['module'] 			= "pengguna";
		$data['fileview'] 			= "profil";
		echo Modules::run('template/frontend_user', $data);
	}

	public function notifikasi(){
		$this->load->library('pagination');

		$config['base_url'] 				= base_url().'pengguna/notifikasi';
		$config['total_rows'] 				= $this->M_pengguna->countAllNotifikasi($this->session->userdata("kode_user"));
		$config['per_page'] 				= 10;

		$config['full_tag_open'] 			= '<nav class="d-flex justify-content-between align-items-center" aria-label="Page navigation example"><ul class="pagination pagination-sm">';
		$config['full_tag_close'] 			= '</ul></nav>';

		$config['next_link'] 				= '&raquo';
		$config['next_tag_open'] 			= '<li class="page-item">';
		$config['next_tag_close'] 			= '</li>';

		$config['prev_link'] 				= '&laquo';
		$config['prev_tag_open'] 			= '<li class="page-item">';
		$config['prev_tag_close'] 			= '</li>';

		$config['cur_tag_open'] 			= '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] 			= '<span class="sr-only">(current)</span></a></li>';

		$config['num_tag_open'] 			= '<li class="page-item">';
		$config['num_tag_close'] 			= '</li>';

		$config['attributes']					= array('class' => 'page-link');

		$this->pagination->initialize($config);

		$data['notifikasi']	= $this->M_pengguna->get_AllNotifikasi($this->session->userdata("kode_user"), $config['per_page'], (!$this->uri->segment(3) ? 0 : $this->uri->segment(3)));
		$data['CI']					= $this;

		$data['module'] 		= "pengguna";
		$data['fileview'] 		= "notifikasi";
		echo Modules::run('template/frontend_user', $data);
	}

	public function k_panel(){
		$this->load->library('pagination');

		$config['base_url'] 				= base_url().'pengguna/k-panel';
		$config['total_rows'] 				= $this->M_pengguna->count_kpanel($this->session->userdata("kode_user"));
		$config['per_page'] 				= 10;

		$config['full_tag_open'] 			= '<nav class="d-flex justify-content-between align-items-center" aria-label="Page navigation example"><ul class="pagination pagination-sm">';
		$config['full_tag_close'] 			= '</ul></nav>';

		$config['next_link'] 				= '&raquo';
		$config['next_tag_open'] 			= '<li class="page-item">';
		$config['next_tag_close'] 			= '</li>';

		$config['prev_link'] 				= '&laquo';
		$config['prev_tag_open'] 			= '<li class="page-item">';
		$config['prev_tag_close'] 			= '</li>';

		$config['cur_tag_open'] 			= '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] 			= '<span class="sr-only">(current)</span></a></li>';

		$config['num_tag_open'] 			= '<li class="page-item">';
		$config['num_tag_close'] 			= '</li>';

		$config['attributes']					= array('class' => 'page-link');

		$this->pagination->initialize($config);

		$data['k_panel']		= $this->M_pengguna->get_kpanel($this->session->userdata("email"), $config['per_page'], (!$this->uri->segment(3) ? 0 : $this->uri->segment(3)));

		$data['CI']				= $this;

		$data['module'] 		= "pengguna";
		$data['fileview'] 		= "k_panel";
		echo Modules::run('template/frontend_user', $data);
	}

	public function kompetisi(){

		$data['module'] 		= "pengguna";
		$data['fileview'] 		= "kompetisi";
		echo Modules::run('template/frontend_user', $data);
	}

	public function event(){
		$this->load->library('pagination');

		$config['base_url'] 				= base_url().'pengguna/event';
		$config['total_rows'] 				= $this->M_pengguna->count_eventDiikuti($this->session->userdata("kode_user"));
		$config['per_page'] 				= 10;

		$config['full_tag_open'] 			= '<nav class="d-flex justify-content-between align-items-center" aria-label="Page navigation example"><ul class="pagination pagination-sm">';
		$config['full_tag_close'] 			= '</ul></nav>';

		$config['next_link'] 				= '&raquo';
		$config['next_tag_open'] 			= '<li class="page-item">';
		$config['next_tag_close'] 			= '</li>';

		$config['prev_link'] 				= '&laquo';
		$config['prev_tag_open'] 			= '<li class="page-item">';
		$config['prev_tag_close'] 			= '</li>';

		$config['cur_tag_open'] 			= '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] 			= '<span class="sr-only">(current)</span></a></li>';

		$config['num_tag_open'] 			= '<li class="page-item">';
		$config['num_tag_close'] 			= '</li>';

		$config['attributes']				= array('class' => 'page-link');

		$this->pagination->initialize($config);

		$data['eventDiikuti']	= $this->M_pengguna->eventDiikuti($this->session->userdata('kode_user'), $config['per_page'], (!$this->uri->segment(3) ? 0 : $this->uri->segment(3)));

		$data['module'] 		= "pengguna";
		$data['fileview'] 		= "event";
		echo Modules::run('template/frontend_user', $data);
	}

	public function detail_daftar($id){
		if ($this->M_pengguna->get_detailDaftar($id) == false) {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat menampilkan data pendaftaran anda!");
			redirect($this->agent->referrer());
		}else{
			$data['data-pendaftaran']	= $this->M_pengguna->get_detailDaftar($id);

			$data['CI']				= $this;

			$data['module'] 		= "pengguna";
			$data['fileview'] 		= "pendaftaran_detail";
			echo Modules::run('template/frontend_user', $data);
		}
	}

	public function pengaturan(){
		if ($this->M_pengguna->get_userDetail($this->session->userdata("kode_user")) == false) {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat menampilkan data diri anda!");
			redirect(base_url());
		}else{
			$data['user']			= $this->M_pengguna->get_userDetail($this->session->userdata("kode_user"));

			$data['CI']				= $this;

			$data['module'] 		= "pengguna";
			$data['fileview'] 		= "pengaturan";
			echo Modules::run('template/frontend_user', $data);
		}
	}

	// PROSES
	function ubah_profil(){
		if ($this->M_pengguna->ubah_profil($this->session->userdata("kode_user")) == TRUE) {
			$this->session->set_flashdata('success', "Berhasil mengubah data diri anda!");
			redirect(site_url('pengguna/pengaturan'));
		}else {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah data diri anda!");
			redirect($this->agent->referrer());
		}
	}

	public function ubah_foto(){

		$filename 	= null;
		$kode_user	= $this->session->userdata("kode_user");
		// UPLOAD
		if (!empty($_FILES['profil']['name'])) {
			// CREATE FILENAME
			$path  		= $_FILES['profil']['name'];
			$ext   		= pathinfo($path, PATHINFO_EXTENSION);

			$time		= time();
			$filename	= "FOTO_-{$time}.{$ext}";

			$folder		= "berkas/pengguna/{$kode_user}/foto";

			if (!is_dir($folder)) {
				mkdir($folder, 0755, true);
			}

			// UPLOAD FILE
			$config['upload_path']          = $folder;
			$config['allowed_types']        = 'JPEG|jpeg|JPG|jpg|PNG|png';
			$config['max_size']             = 10048;
			$config['file_name']			= $filename;
			$config['overwrite']			= TRUE;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('profil')){
				$this->session->set_flashdata('error', 'Terjadi kesalahan saat meng-upload Foto anda!!');
				redirect($this->agent->referrer());
			}else {

				$this->db->where('KODE_USER', $kode_user);
				$this->db->update('TB_PENGGUNA', array('PROFIL' => $filename));
				$cek = ($this->db->affected_rows() != 1) ? false : true;
				if ($cek == TRUE) {
					$this->session->set_flashdata('success', 'Berhasil mengubah foto profil akun anda!!');
					redirect($this->agent->referrer());
				}else {
					$this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah foto profil akun anda!");
					redirect($this->agent->referrer());
				}
			}
		}else {
			$this->session->set_flashdata('error', 'Harap pilih foto untuk dapat diupload!!');
			redirect($this->agent->referrer());
		}
	}

	function hapus_foto(){

		$this->db->where('KODE_USER', $this->session->userdata("kode_user"));
		$this->db->update('TB_PENGGUNA', array('PROFIL' => null));

		$cek = ($this->db->affected_rows() != 1) ? false : true;
		if ($cek == TRUE) {
			$this->session->set_flashdata('success', "Berhasil menghapus foto profil anda !!");
			redirect($this->agent->referrer());
		}else {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat menghapus foto profil akun anda!");
			redirect($this->agent->referrer());
		}
	}

	function hapus_akun(){
		$hapus_akun 	= $this->input->post('hapus_akun');
		$deadline		= strtotime("+7 day", time());

		if ($hapus_akun == "hapus/{$this->session->userdata('email')}") {
			if ($this->M_pengguna->hapus_akun($this->session->userdata("kode_user"), $deadline) == TRUE) {
				$date 	= date("d F Y : H:i");
				$this->session->set_flashdata('success', "Berhasil melakukan proses penghapusan akun. Anda dapat membatalkan hal ini di pengaturan > batal hapus akun. Sebelum {$date} !!");
				redirect(site_url('pengguna/pengaturan'));
			}else {
				$this->session->set_flashdata('error', "Terjadi kesalahan saat melakukan proses penghapusan akun anda!");
				redirect($this->agent->referrer());
			}
		}else {
			$this->session->set_flashdata('error', "Harap periksa pengetikan anda!");
			redirect($this->agent->referrer());
		}
	}

	function batal_hapus(){
		$batal_hapus 	= $this->input->post('batal_hapus');

		if ($batal_hapus == "batal/{$this->session->userdata('email')}") {
			if ($this->M_pengguna->batal_hapus() == TRUE) {
				$this->session->set_flashdata('success', "Berhasil melakukan membatalkan proses penghapusan akun anda, senang anda bergabung kembali !!");
				redirect(site_url('pengguna/pengaturan'));
			}else {
				$this->session->set_flashdata('error', "Terjadi kesalahan saat melakukan membatalkan proses penghapusan akun anda!");
				redirect($this->agent->referrer());
			}
		}else {
			$this->session->set_flashdata('error', "Harap periksa pengetikan anda!");
			redirect($this->agent->referrer());
		}
	}

	function jangan_tampilkan($identifier){

		if ($this->M_pengguna->jangan_tampilkan($identifier, $this->session->userdata("kode_user")) == TRUE) {
			$this->session->set_flashdata('success', "Berhasil menghilangkan peringatan !!");
			redirect($this->agent->referrer());
		}else {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat menghilangkan peringatan!!");
			redirect($this->agent->referrer());
		}
	}

	function read_notifikasi($kode_notifikasi){

		if ($this->M_pengguna->read_notifikasi($kode_notifikasi) == TRUE) {
			$this->session->set_flashdata('success', "Berhasil mengubah status notifikasi !!");
			redirect($this->agent->referrer());
		}else {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah status notifikasi!!");
			redirect($this->agent->referrer());
		}
	}

	function read_notifikasiAll(){

		if ($this->M_pengguna->read_notifikasiAll() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil mengubah status semua notifikasi !!");
			redirect($this->agent->referrer());
		}else {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah status semua notifikasi!!");
			redirect($this->agent->referrer());
		}
	}

}?>
