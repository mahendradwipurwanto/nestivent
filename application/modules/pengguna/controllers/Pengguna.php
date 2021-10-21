<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_pengguna');
		$this->load->model('Pendaftaran/M_pendaftaran');
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
		$this->load->library('pagination');

		$config['base_url'] 				= base_url().'pengguna/kompetisi';
		$config['total_rows'] 				= $this->M_pengguna->count_kompetisiDiikuti($this->session->userdata("kode_user"));
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

		$data['kompetisiDiikuti']	= $this->M_pengguna->kompetisiDiikuti($this->session->userdata('kode_user'), $config['per_page'], (!$this->uri->segment(3) ? 0 : $this->uri->segment(3)));

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

	public function detail_daftar($kode_pendaftaran){
		if ($this->M_pengguna->cek_daftarEvent($kode_pendaftaran) == false) {
			$this->session->set_flashdata('warning', "Anda belum melakukan pendaftaran event !!");
			redirect($this->agent->referrer());
		} else {
			$dataPeserta 			= $this->M_pengguna->get_detailDaftarEvent($kode_pendaftaran);
					if ($this->M_pendaftaran->get_formMeta($dataPeserta->KODE_EVENT) != false) {
						$data['dataPendaftaran'] = $dataPeserta;
						$data['kegiatan']		= $this->M_pendaftaran->get_kegiatan($dataPeserta->KODE_EVENT);
						$data['formulir']		= $this->M_pendaftaran->get_formMeta($dataPeserta->KODE_EVENT);

						$data['KODE_EVENT']	= $dataPeserta->KODE_EVENT;

						$data['controller']			= $this;

						$data['module'] 	= "pengguna";
						$data['fileview'] 	= "pendaftaran_detail";
						echo Modules::run('template/frontend_user', $data);
					} else {
						$this->session->set_flashdata('warning', "Mohon maaf formulir pendaftaran sedang diatur, harap tunggu beberapa saat !!");
						redirect($this->agent->referrer());
					}
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
			$config['max_size']             = 1024*10;
			$config['file_name']						= $filename;
			$config['overwrite']						= TRUE;

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

	function updatePendaftaran_event()
	{

		// STATIC FORM DEFAULT
		$KODE_EVENT	= $this->input->post('KODE_EVENT');
		$KODE_PENDAFTARAN	= $this->input->post('KODE_PENDAFTARAN');

		// DYNAMIC FORM SECONDARY
		$ID_FORM			= $this->input->post('ID_FORM', true);
		$ID_FORM_FILE		= $this->input->post('ID_FORM_FILE', true);
		$TYPE				= $this->input->post('TYPE', true);
		$JAWABAN			= $this->input->post('JAWABAN');
		$FILE_SIZE			= $this->input->post('FILE_SIZE', true);
		$FILE_TYPE			= $this->input->post('FILE_TYPE', true);

		$prosesJawaban = false;

		$cpt = count($_FILES['JAWABAN']['name']);
		for ($j = 0; $j < $cpt; $j++) {
			if (!empty($_FILES['JAWABAN']['name'])) {
				// CREATE FILENAME

				$files = $_FILES['JAWABAN'];

				$_FILES['BERKAS[]']['name']		= $files['name'][$j];
				$_FILES['BERKAS[]']['type']		= $files['type'][$j];
				$_FILES['BERKAS[]']['tmp_name']	= $files['tmp_name'][$j];
				$_FILES['BERKAS[]']['error']	= $files['error'][$j];
				$_FILES['BERKAS[]']['size']		= $files['size'][$j];

				$time   	= time();
				$KODE_USER  = $this->session->userdata('kode_user');

				$folder   	= "berkas/pendaftaran/{$KODE_USER}/event/{$KODE_EVENT}/";

				if (!is_dir($folder)) {
					mkdir($folder, 0755, true);
				}

				$config['upload_path']          = $folder;
				$config['allowed_types']        = '*';
				$config['max_size']             = 10*1024;
				$config['overwrite']            = true;

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('BERKAS[]')) {
					$upload_data 	= $this->upload->data();

					$data = array(
						'JAWABAN' 			=> $upload_data['file_name']
					);
					if ($this->M_pengguna->update_jawaban($KODE_PENDAFTARAN, $ID_FORM_FILE[$j], $data) == false) {
						// break;
						// echo "a";
						$this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah jawaban anda !!");
						redirect($this->agent->referrer());
					} else {
						$prosesJawaban = true;
					}
				}
			}
		}
		foreach ($ID_FORM as $i => $a) {
			if ($TYPE[$i] != "FILE") {
				$data = array(
					'JAWABAN' 			=> isset($JAWABAN[$i]) ? $JAWABAN[$i] : null
				);
				$this->M_pengguna->update_jawaban($KODE_PENDAFTARAN, $ID_FORM[$i], $data);
				$prosesJawaban = true;
			}
		}


		if($this->input->post('BAYAR') == 1){
			$config['allowed_types']        = 'JPEG|jpeg|JPG|jpg|PNG|png';
			$config['max_size']             = 1024*10;
			$config['overwrite']						= TRUE;

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('BUKTI_BAYAR')){
				$upload_data 	= $this->upload->data();
				$this->db->where('KODE_PENDAFTARAN', $KODE_PENDAFTARAN);
				$this->db->update('PENDAFTARAN_EVENT', array('BUKTI_BAYAR' => $upload_data['file_name']));
			}
		}
		if ($prosesJawaban == true) {
			$this->session->set_flashdata('success', "Berhasil mengubah data berkas anda !!");
			redirect(site_url('pengguna/event'));
		} else {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah jawaban anda !!");
			redirect($this->agent->referrer());
		}
	}

	// KOMPETISI

	public function detail_daftarKompetisi($kode_pendaftaran){
		if ($this->M_pengguna->cek_daftarKompetisi($kode_pendaftaran) == false) {
			$this->session->set_flashdata('warning', "Anda belum melakukan pendaftaran Kompetisi !!");
			redirect($this->agent->referrer());
		} else {
			$dataPeserta 			= $this->M_pengguna->get_detailDaftarKompetisi($kode_pendaftaran);
					if ($this->M_pendaftaran->get_formMeta($dataPeserta->KODE_KOMPETISI) != false) {
						$data['dataPendaftaran'] = $dataPeserta;
						$data['kegiatan']		= $this->M_pendaftaran->get_kegiatan($dataPeserta->KODE_KOMPETISI);
						$data['formulir']		= $this->M_pendaftaran->get_formMeta($dataPeserta->KODE_KOMPETISI);

						$data['get_anggotaTim']	= $this->M_pengguna->get_anggotaTim($dataPeserta->KODE_PENDAFTARAN);
						$data['cekBerkas']			= $this->M_pengguna->cek_kelengkapanBerkas($dataPeserta->KODE_KOMPETISI, $dataPeserta->KODE_PENDAFTARAN);
						$data['cek_Karya']		= $this->M_pengguna->cek_Karya($dataPeserta->KODE_PENDAFTARAN);
						$data['cekPembayaran']		= $this->M_pengguna->cekPembayaran($dataPeserta->KODE_PENDAFTARAN);
						$data['KODE_EVENT']		= $dataPeserta->KODE_KOMPETISI;

						$data['controller']		= $this;

						$data['module'] 		= "pengguna";
						$data['fileview'] 	= "pendaftaran_kompetisiDetail";
						echo Modules::run('template/frontend_user', $data);
					} else {
						$this->session->set_flashdata('warning', "Mohon maaf formulir pendaftaran sedang diatur, harap tunggu beberapa saat !!");
						redirect($this->agent->referrer());
					}
		}
	}

	public function berkas_daftarKompetisi($kode_pendaftaran){
		if ($this->M_pengguna->cek_daftarKompetisi($kode_pendaftaran) == false) {
			$this->session->set_flashdata('warning', "Anda belum melakukan pendaftaran kompetisi !!");
			redirect($this->agent->referrer());
		} else {
			$dataPeserta 			= $this->M_pengguna->get_detailDaftarKompetisi($kode_pendaftaran);
			if ($this->M_pendaftaran->cek_pendaftaranStatus($dataPeserta->KODE_KOMPETISI) != false) {
				if ($this->M_pendaftaran->get_bidangLomba($dataPeserta->KODE_KOMPETISI) != false) {
					if ($this->M_pendaftaran->get_formMeta($dataPeserta->KODE_KOMPETISI) != false) {
						$data['dataPendaftaran'] = $dataPeserta;
						$data['kegiatan']		= $this->M_pendaftaran->get_kegiatan($dataPeserta->KODE_KOMPETISI);
						$data['formulir']		= $this->M_pendaftaran->get_formMeta($dataPeserta->KODE_KOMPETISI);
						$data['bidang_lomba']		= $this->M_pendaftaran->get_bidangLomba($dataPeserta->KODE_KOMPETISI);

						$data['KODE_KEGIATAN']	= $dataPeserta->KODE_KOMPETISI;

						$data['controller']		  = $this;

						$data['module'] 		= "pengguna";
						$data['fileview'] 	= "pendaftaran_kompetisiBerkas";
						echo Modules::run('template/frontend_user', $data);
					} else {
						$this->session->set_flashdata('warning', "Mohon maaf formulir pendaftaran sedang diatur, harap tunggu beberapa saat !!");
						redirect($this->agent->referrer());
					}
				} else {
					$this->session->set_flashdata('warning', "Mohon maaf bekum ada bidang lomba yang dibuka, harap tunggu beberapa saat !!");
					redirect($this->agent->referrer());
				}
			} else {
				$this->session->set_flashdata('warning', "Pendaftaran belum dibuka !!");
				redirect($this->agent->referrer());
			}
		}
	}

	function anggota_kompetisi($kode_pendaftaran){
		if ($this->M_pengguna->cek_daftarKompetisi($kode_pendaftaran) == false) {
			$this->session->set_flashdata('warning', "Anda belum melakukan pendaftaran kompetisi !!");
			redirect($this->agent->referrer());
		} else {
			$dataPeserta 							= $this->M_pengguna->get_detailDaftarKompetisi($kode_pendaftaran);
			$data['dataPendaftaran'] 	= $dataPeserta;
			$data['get_anggotaTim']		= $this->M_pengguna->get_anggotaTim($dataPeserta->KODE_PENDAFTARAN);
			$data['dataAnggota']			= $this->M_pengguna->get_dataAnggota($dataPeserta->KODE_PENDAFTARAN);
			$data['dataKetua']				= $this->M_pengguna->get_dataKetua($dataPeserta->KODE_PENDAFTARAN);
			$data['dataDospem']				= $this->M_pengguna->get_dataDospem($dataPeserta->KODE_PENDAFTARAN);

			$data['KODE_PENDAFTARAN']	= $kode_pendaftaran;
			$data['controller']		= $this;

			$data['module'] 			= "pengguna";
			$data['fileview'] 		= "pendaftaran_kompetisiAnggota";
			echo Modules::run('template/frontend_user', $data);
		}
	}

	public function data_pembayaranKompetisi($kode_pendaftaran)
	{
		if ($this->M_pengguna->cek_daftarKompetisi($kode_pendaftaran) == false) {
			$this->session->set_flashdata('warning', "Anda belum melakukan pendaftaran kompetisi !!");
			redirect($this->agent->referrer());
		} else {
			$dataPeserta 			= $this->M_pengguna->get_detailDaftarKompetisi($kode_pendaftaran);

			// if ($this->General->cek_statBayar($dataPeserta->KODE_PENDAFTARAN) != false AND $this->General->cek_statBayarFailed($dataPeserta->KODE_PENDAFTARAN) == false) {
			$data['dataPendaftaran'] 	= $dataPeserta;
			$data['dataPembayaran']		= $this->M_pengguna->get_dataPembayaran($dataPeserta->KODE_PENDAFTARAN);
			$data['cekPembayaran']		= $this->M_pengguna->cekPembayaran($dataPeserta->KODE_PENDAFTARAN);
			$data['kompetisi']				= $this->M_pendaftaran->get_kegiatan($dataPeserta->KODE_KOMPETISI);

			$data['controller']				= $this;

			$data['module'] 			= "pengguna";
			$data['fileview'] 		= "pendaftaran_kompetisiPembayaran";
			echo Modules::run('template/frontend_user', $data);
			// } else {
			// 	$this->session->set_flashdata('warning', "Anda belum menyelesaikan pembayaran biaya pendaftaran !!");
			// 	redirect($this->agent->referrer());
			// }
		}
	}

	public function data_karya($kode_pendaftaran)
	{
		if ($this->M_pengguna->cek_daftarKompetisi($kode_pendaftaran) == false) {
			$this->session->set_flashdata('warning', "Anda belum melakukan pendaftaran kompetisi !!");
			redirect($this->agent->referrer());
		} else {
			$dataPeserta 			= $this->M_pengguna->get_detailDaftarKompetisi($kode_pendaftaran);

			// if ($this->General->cek_statBayar($dataPeserta->KODE_PENDAFTARAN) != false AND $this->General->cek_statBayarFailed($dataPeserta->KODE_PENDAFTARAN) == false) {
			$data['dataPendaftaran'] 	= $dataPeserta;
			$data['dataKarya']				= $this->M_pengguna->get_dataKarya($dataPeserta->KODE_PENDAFTARAN);

			$data['CI']						= $this;

			$data['module'] 			= "pengguna";
			$data['fileview'] 		= "pendaftaran_kompetisiKarya";
			echo Modules::run('template/frontend_user', $data);
			// } else {
			// 	$this->session->set_flashdata('warning', "Anda belum menyelesaikan pembayaran biaya pendaftaran !!");
			// 	redirect($this->agent->referrer());
			// }
		}
	}

	function tambah_anggota()
	{

		if ($this->M_pengguna->tambah_anggota() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil menambah data anggota !!");
			redirect($this->agent->referrer());
		} else {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat menambah data anggota !!");
			redirect($this->agent->referrer());
		}
	}

	function edit_anggota()
	{

		if ($this->M_pengguna->edit_anggota() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil mengubah data anggota !!");
			redirect($this->agent->referrer());
		} else {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah data anggota !!");
			redirect($this->agent->referrer());
		}
	}

	function hapus_anggota()
	{

		if ($this->M_pengguna->hapus_anggota() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil menghapus data anggota !!");
			redirect($this->agent->referrer());
		} else {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat menghapus data anggota !!");
			redirect($this->agent->referrer());
		}
	}

	function update_pts()
	{

		if ($this->M_pengguna->update_pts() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil mengubah data PTS anda !!");
			redirect($this->agent->referrer());
		} else {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah  data PTS anda !!");
			redirect($this->agent->referrer());
		}
	}

	function update_berkasKompetisi()
	{
		
		$bidang_lomba 	= $this->input->post('BIDANG_LOMBA');
		$nama_tim 			= $this->input->post('NAMA_TIM');

		$bidang_lomba   = preg_replace("/[^a-zA-Z]+/", "_", $bidang_lomba);
		$nama_tim  	 		= preg_replace("/[^a-zA-Z]+/", "_", $nama_tim);

		// STATIC FORM DEFAULT
		$KODE_KOMPETISI		= $this->input->post('KODE_KOMPETISI');
		$KODE_PENDAFTARAN	= $this->input->post('KODE_PENDAFTARAN');

		// DYNAMIC FORM SECONDARY
		$ID_FORM				= $this->input->post('ID_FORM', true);
		$ID_FORM_FILE		= $this->input->post('ID_FORM_FILE', true);
		$TYPE						= $this->input->post('TYPE', true);
		$JAWABAN				= $this->input->post('JAWABAN');
		$FILE_SIZE			= $this->input->post('FILE_SIZE', true);
		$FILE_TYPE			= $this->input->post('FILE_TYPE', true);

		$prosesJawaban = false;

		$cpt = count($_FILES['JAWABAN']['name']);
		for ($j = 0; $j < $cpt; $j++) {
			if (!empty($_FILES['JAWABAN']['name'])) {
				// CREATE FILENAME

				$files = $_FILES['JAWABAN'];

				$_FILES['BERKAS[]']['name']			= $files['name'][$j];
				$_FILES['BERKAS[]']['type']			= $files['type'][$j];
				$_FILES['BERKAS[]']['tmp_name']	= $files['tmp_name'][$j];
				$_FILES['BERKAS[]']['error']		= $files['error'][$j];
				$_FILES['BERKAS[]']['size']			= $files['size'][$j];

				$time   		= time();
				$KODE_USER  = $this->session->userdata('kode_user');

				$folder   	= "berkas/pendaftaran/kompetisi/{$KODE_KOMPETISI}/{$bidang_lomba}/{$nama_tim}_{$KODE_USER}/";

				if (!is_dir($folder)) {
					mkdir($folder, 0755, true);
				}

				$config['upload_path']          = $folder;
				$config['allowed_types']        = '*';
				$config['max_size']             = 10*1024;
				$config['overwrite']            = true;

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('BERKAS[]')) {
					$upload_data 	= $this->upload->data();

					$data = array(
						'JAWABAN' 			=> $upload_data['file_name']
					);
					if ($this->M_pengguna->update_jawaban($KODE_PENDAFTARAN, $ID_FORM_FILE[$j], $data) == false) {
						// break;
						// echo "a";
						$this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah jawaban anda !!");
						redirect($this->agent->referrer());
					} else {
						$prosesJawaban = true;
					}
				}
			}
		}
		foreach ($ID_FORM as $i => $a) {
			if ($TYPE[$i] != "FILE") {
				$data = array(
					'JAWABAN' 			=> isset($JAWABAN[$i]) ? $JAWABAN[$i] : null
				);
				$this->M_pengguna->update_jawaban($KODE_PENDAFTARAN, $ID_FORM[$i], $data);
				$prosesJawaban = true;
			}
		}
		if ($prosesJawaban == true) {
			$this->session->set_flashdata('success', "Berhasil mengubah data berkas anda !!");
			redirect(site_url('detail-daftar-kompetisi/'.$KODE_PENDAFTARAN));
		} else {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah jawaban anda !!");
			redirect($this->agent->referrer());
		}
	}

	// KARYA

	function kelola_karya(){
		$kode_user 							= $this->session->userdata('kode_user');
		$kode_kompetisi 				= $this->input->post('KODE_KOMPETISI');
		$kode_pendaftaran 			= $this->input->post('KODE_PENDAFTARAN');
		$bidang_lomba 	= $this->input->post('BIDANG_LOMBA');
		$nama_tim 			= $this->input->post('NAMA_TIM');

		$bidang_lomba   = preg_replace("/[^a-zA-Z]+/", "_", $bidang_lomba);
		$nama_tim  	 	= preg_replace("/[^a-zA-Z]+/", "_", $nama_tim);

		if (!empty($_FILES['KARYA']['name'])) {

			$folder		= "berkas/pendaftaran/kompetisi/{$bidang_lomba}/{$nama_tim}_{$kode_user}/karya/";

			if (!is_dir($folder)) {
				mkdir($folder, 0755, true);
			}

			// UPLOAD FILE
			$config['upload_path']          = $folder;
			$config['allowed_types']        = '*';
			$config['max_size']             = 10048;
			$config['overwrite']						= TRUE;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('KARYA')) {
				$this->session->set_flashdata('error', 'Terjadi kesalahan saat menunggah Karya anda!!');
				redirect($this->agent->referrer());
			} else {
				$upload_data 	= $this->upload->data();

				if ($this->M_pengguna->kelola_karya($upload_data['file_name']) == TRUE) {
					$this->session->set_flashdata('success', "Berhasil mengatur data karya anda !!");
					redirect(site_url('detail-daftar-kompetisi/'.$kode_pendaftaran));
				} else {
					$this->session->set_flashdata('error', "Terjadi kesalahan saat mengatur data karya anda !!");
					redirect($this->agent->referrer());
				}
			}
		} else {

			if ($this->M_pengguna->kelola_karya(null) == TRUE) {
				$this->session->set_flashdata('success', "Berhasil mengatur data karya anda !!");
				redirect(site_url('detail-daftar-kompetisi/'.$kode_pendaftaran));
			} else {
				$this->session->set_flashdata('warning', "Tidak ada perubahan pada data karya anda !!");
				redirect($this->agent->referrer());
			}
		}
	}

	function kelola_pembayaran(){
		
		$kode_user 							= $this->session->userdata('kode_user');
		$bidang_lomba 	= $this->input->post('BIDANG_LOMBA');
		$nama_tim 			= $this->input->post('NAMA_TIM');

		$bidang_lomba   = preg_replace("/[^a-zA-Z]+/", "_", $bidang_lomba);
		$nama_tim  	 		= preg_replace("/[^a-zA-Z]+/", "_", $nama_tim);

		// STATIC FORM DEFAULT
		$KODE_KOMPETISI		= $this->input->post('KODE_KOMPETISI');
		$KODE_PENDAFTARAN	= $this->input->post('KODE_PENDAFTARAN');
		$TOT_BAYAR				= $this->input->post('TOT_BAYAR');

		if (!empty($_FILES['BUKTI_BAYAR']['name'])) {

			$folder		= "berkas/pendaftaran/kompetisi/{$bidang_lomba}/{$nama_tim}_{$kode_user}/pembayaran/";

			if (!is_dir($folder)) {
				mkdir($folder, 0755, true);
			}

		// UPLOAD FILE
		$con['upload_path']          = $folder;
		$con['allowed_types']        = 'JPEG|jpeg|JPG|jpg|PNG|png';
		$con['max_size']             = 1024*10;
		$con['overwrite']						= TRUE;

		$this->load->library('upload', $con);
		if ($this->upload->do_upload('BUKTI_BAYAR')){
			$upload_data 	= $this->upload->data();
			if($this->M_pengguna->cekPembayaran($KODE_PENDAFTARAN) == FALSE){

					$data = array(
						'KODE_TRANS' 				=> $this->M_pengguna->gen_kodeTrans(),
						'KODE_PENDAFTARAN' 	=> $KODE_PENDAFTARAN,
						'TOT_BAYAR' 				=> $TOT_BAYAR,
						'BUKTI_BAYAR' 			=> $upload_data['file_name'],
					);
					
					$this->db->insert('tb_transaksi', $data);
					$cek = ($this->db->affected_rows() != 1) ? false : true;

			}else{
				$KODE_TRANS = $this->input->post('KODE_TRANS');
				$data = array(
					'TOT_BAYAR' 				=> $TOT_BAYAR,
					'BUKTI_BAYAR' 			=> $upload_data['file_name'],
				);
				
				$this->db->where('KODE_TRANS', $KODE_TRANS);
				$this->db->update('tb_transaksi', $data);
				$cek = ($this->db->affected_rows() != 1) ? false : true;

			}
			if ($cek == TRUE) {
				$this->session->set_flashdata('success', "Berhasil mengunggah bukti pembayaran anda !!");
				redirect(site_url('detail-daftar-kompetisi/'.$KODE_PENDAFTARAN));
			} else {
				$this->session->set_flashdata('warning', "Terjadi kesalahan saat mengunggah bukti pembayaran anda !!");
				redirect($this->agent->referrer());
			}
		} else {
			$this->session->set_flashdata('warning', "Terjadi kesalahan saat mengunggah bukti pembayaran anda !");
			redirect($this->agent->referrer());
		}
	}
	}

}?>
