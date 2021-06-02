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
		$profil			= ($this->uri->segment(1) == "pengguna" && empty($this->uri->segment(2)) ? TRUE : FALSE);

		if ($pengguna->STATUS == 0 AND $profil == FALSE) {
			redirect(site_url('hold-verification'));
		}
	}

	public function index(){

		$data['module'] 		= "pengguna";
		$data['fileview'] 	= "profil";
		echo Modules::run('template/backend_main', $data);
	}

	public function notifikasi(){

		$data['module'] 		= "pengguna";
		$data['fileview'] 	= "notifikasi";
		echo Modules::run('template/backend_main', $data);
	}

	public function kompetisi(){

		$data['module'] 		= "pengguna";
		$data['fileview'] 	= "kompetisi";
		echo Modules::run('template/backend_main', $data);
	}

	public function event(){

		$data['module'] 		= "pengguna";
		$data['fileview'] 	= "event";
		echo Modules::run('template/backend_main', $data);
	}

	public function pengaturan(){
		if ($this->M_pungguna->get_userDetail($this->session->userdata("kode_user")) == false) {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat menampilkan data diri anda!");
			redirect(base_url());
		}else{
			$data['user']				= $this->M_pungguna->get_userDetail($this->session->userdata("kode_user"));

			$data['module'] 		= "pengguna";
			$data['fileview'] 	= "pengaturan";
			echo Modules::run('template/backend_main', $data);
		}
	}

	// PROSES
	function ubah_profil(){
		if ($this->M_pungguna->ubah_profil($this->session->userdata("kode_user")) == TRUE) {
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
			$path  = $_FILES['profil']['name'];
			$ext   = pathinfo($path, PATHINFO_EXTENSION);

			$time			= time();
			$filename	= "FOTO_-{$time}.{$ext}";

			$folder		= "berkas/pengguna/{$kode_user}/foto";

			if (!is_dir($folder)) {
				mkdir($folder, 0755, true);
			}

			// UPLOAD FILE
			$config['upload_path']          = $folder;
			$config['allowed_types']        = 'JPEG|jpeg|JPG|jpg|PNG|png';
			$config['max_size']             = 10048;
			$config['file_name']						= $filename;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('profil')){
				$this->session->set_flashdata('error', 'Terjadi kesalahan saat meng-upload Foto anda!!');
				redirect($this->agent->referrer());
			}else {

				$this->db->where('KODE_USER', $kode_user);
				$this->db->update('TB_PENGGUNA', array('PROFIL' => $filename));

				$this->session->set_flashdata('success', 'Berhasil mengubah foto profil akun anda!!');
				redirect($this->agent->referrer());
			}
		}else {
			$this->session->set_flashdata('error', 'Harap pilih foto untuk dapat diupload!!');
			redirect($this->agent->referrer());
		}
	}

}?>
