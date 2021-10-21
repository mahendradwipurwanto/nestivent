<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_kompetisi extends MX_Controller {
  public function __construct(){
    parent::__construct();

    if ($this->agent->is_mobile()) {
      $this->session->set_flashdata('error', "PANEL KEGIATAN HANYA DAPAT DIAKSES MELALUI BROWSER");
      redirect(base_url());
    }

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
    
    $this->load->model('M_manageKompetisi', 'M_manage');
  }


	// MAILER SENDER
	function send_email($email, $subject, $message){

		$mail = array(
			'to' 			=> $email,
			'subject'		=> $subject,
			'message'		=> $this->body_html($message)
		);

		if ($this->mailer->send($mail) == TRUE) {
			return true;
		}else {
			return false;
		}
	}

  function tinymce_upload() {
    $config['upload_path'] = './berkas/tmp/post/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size'] = 0;
    $config['file_name'] = time();
    $this->load->library('upload', $config);
    if ( ! $this->upload->do_upload('file')) {
      $this->output->set_header('HTTP/1.0 500 Server Error');
      exit;
    } else {
      $file = $this->upload->data();
      $this->output
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode(['location' => base_url().'berkas/tmp/post/'.$file['file_name']]))
      ->_display();
      exit;
    }
  }


  // KOMPETISI

  public function index(){

    $data['c_peserta']  = $this->M_manage->count_peserta($this->session->userdata('manage_event'));
    $data['c_verif']    = $this->M_manage->count_pesertaVerif($this->session->userdata('manage_event'));

    $data['module']     = "manage_kompetisi";
    $data['fileview']   = "dashboard";
    echo Modules::run('template/manage_kompetisi_main', $data);
  }

  // PENGATURAN
  public function pengaturan(){

    $data['module']     = "manage_kompetisi";
    $data['fileview']   = "pengaturan";
    echo Modules::run('template/manage_kompetisi_main', $data);
  }

  public function pengaturan_umum(){

    $data['module']     = "manage_kompetisi";
    $data['fileview']   = "pengaturan/pengaturan_umum";
    echo Modules::run('template/manage_kompetisi_main', $data);
  }

  // DATA AKTIVITAS & NOTIFIKASI K-PANEL
  public function aktivitas(){
    $this->load->library('pagination');

    $config['base_url']         = base_url().'manage-kompetisi/aktivitas-kompetisi';
    $config['total_rows']       = $this->M_manage->count_aktivitaskompetisi($this->session->userdata('manage_kompetisi'));
    $config['per_page']         = 5;

    $config['full_tag_open']    = '<nav class="d-flex justify-content-between align-items-center" aria-label="Page navigation example"><ul class="pagination justify-content-center pagination-sm">';
    $config['full_tag_close']   = '</ul></nav>';

    $config['next_link']        = '&raquo';
    $config['next_tag_open']    = '<li class="page-item">';
    $config['next_tag_close']   = '</li>';

    $config['prev_link']        = '&laquo';
    $config['prev_tag_open']    = '<li class="page-item">';
    $config['prev_tag_close']   = '</li>';

    $config['cur_tag_open']     = '<li class="page-item active"><a class="page-link" href="#">';
    $config['cur_tag_close']    = '<span class="sr-only">(current)</span></a></li>';

    $config['num_tag_open']     = '<li class="page-item">';
    $config['num_tag_close']    = '</li>';

    $config['attributes']       = array('class' => 'page-link');

    $this->pagination->initialize($config);

    $data['aktivitas']  = $this->M_manage->get_aktivitaskompetisi($config['per_page'], (!$this->uri->segment(3) ? 0 : $this->uri->segment(3)), $this->session->userdata('manage_kompetisi'));
    $data['CI']         = $this;

    $data['module']     = "manage_kompetisi";
    $data['fileview']   = "aktivitas";
    echo Modules::run('template/manage_kompetisi_main', $data);
  }

  // DATA NOTIFIKASI SISTEM
  public function notifikasi(){
    $this->load->library('pagination');

    $config['base_url']         = base_url().'manage-kompetisi/aktivitas-kompetisi';
    $config['total_rows']       = $this->M_manage->count_notifikasikompetisi($this->session->userdata('manage_kompetisi'));
    $config['per_page']         = 5;

    $config['full_tag_open']    = '<nav class="d-flex justify-content-between align-items-center" aria-label="Page navigation example"><ul class="pagination justify-content-center pagination-sm">';
    $config['full_tag_close']   = '</ul></nav>';

    $config['next_link']        = '&raquo';
    $config['next_tag_open']    = '<li class="page-item">';
    $config['next_tag_close']   = '</li>';

    $config['prev_link']        = '&laquo';
    $config['prev_tag_open']    = '<li class="page-item">';
    $config['prev_tag_close']   = '</li>';

    $config['cur_tag_open']     = '<li class="page-item active"><a class="page-link" href="#">';
    $config['cur_tag_close']    = '<span class="sr-only">(current)</span></a></li>';

    $config['num_tag_open']     = '<li class="page-item">';
    $config['num_tag_close']    = '</li>';

    $config['attributes']       = array('class' => 'page-link');

    $this->pagination->initialize($config);

    $data['notifikasi'] = $this->M_manage->get_notifikasikompetisi($config['per_page'], (!$this->uri->segment(3) ? 0 : $this->uri->segment(3)), $this->session->userdata('manage_kompetisi'));
    $data['CI']         = $this;

    $data['module']     = "manage_kompetisi";
    $data['fileview']   = "notifikasi";
    echo Modules::run('template/manage_kompetisi_main', $data);
  }

  // BIDANG LOMBA

  public function bidang_lomba(){

    $data['bidang_lomba'] = $this->M_manage->get_bidangLomba($this->session->userdata('manage_kompetisi'));

    $data['module']     = "manage_kompetisi";
    $data['fileview']   = "kompetisi/bidang_lomba";
    echo Modules::run('template/manage_kompetisi_main', $data);
  }

  //PROSES
  
  function tambah_bidangLomba(){
    if ($this->M_manage->tambah_bidangLomba($this->session->userdata('manage_kompetisi')) == TRUE) {
      $this->session->set_flashdata('success', "Berhasil menambahkan data bidang lomba !!");
      redirect($this->agent->referrer());
    }else{
      $this->session->set_flashdata('error', "Terjadi kesalahan saat menambahkan data bidang lomba !!");
      redirect($this->agent->referrer());
    }
  }

  function edit_bidangLomba(){
    if ($this->M_manage->edit_bidangLomba() == TRUE) {
      $this->session->set_flashdata('success', "Berhasil mengubah data bidang lomba !!");
      redirect($this->agent->referrer());
    }else{
      $this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah data bidang lomba !!");
      redirect($this->agent->referrer());
    }
  }

  function hapus_bidangLomba(){
    if ($this->M_manage->hapus_bidangLomba() == TRUE) {
      $this->session->set_flashdata('success', "Berhasil menghapus data bidang lomba !!");
      redirect($this->agent->referrer());
    }else{
      $this->session->set_flashdata('error', "Terjadi kesalahan saat menghapus data bidang lomba !!");
      redirect($this->agent->referrer());
    }
  }

  // END BIDANG LOMBA

  // DATA JURI
  
  public function data_juri(){

    $data['bidang_lomba'] = $this->M_manage->get_bidangLomba($this->session->userdata('manage_kompetisi'));
    $data['data_juri']    = $this->M_manage->get_dataJuri($this->session->userdata('manage_kompetisi'));
    $data['controller']           = $this;

    $data['module']     = "manage_kompetisi";
    $data['fileview']   = "data_juri";
    echo Modules::run('template/manage_kompetisi_main', $data);
  }

  //PROSES
  
  function tambah_juri(){
    if ($this->input->post('PASSWORD') == $this->input->post('CONFIRM_PASSWORD')) {
      // CREATE UNIQ NAME KODE USER

			$string = preg_replace('/[^a-z]/i', '', $this->input->post("NAMA_JURI"));

			$vocal  = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", " ");
			$scrap  = str_replace($vocal, "", $string);
			$begin  = substr($scrap, 0, 4);
			$uniqid = strtoupper($begin);

      // CREATE KODE USER
			do {
				$KODE_USER      = "JRI_".$uniqid.substr(md5(time()), 0, 3);
			} while ($this->M_manage->cek_kodeUser($KODE_USER) > 0);

          // UPLOAD
			if (!empty($_FILES['PROFIL']['name'])) {

        $kode_kompetisi = $this->session->userdata('manage_kompetisi');
        $folder   = "berkas/juri/kompetisi/{$kode_kompetisi}/{$KODE_USER}/";

				if (!is_dir($folder)) {
					mkdir($folder, 0755, true);
				}

              // UPLOAD FILE
				$config['upload_path']        = $folder;
				$config['allowed_types']      = 'png|jpg|jpeg|gif';
				$config['max_size']           = 10*1024;
				$config['overwrite']          = TRUE;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('PROFIL')){
					$this->session->set_flashdata('error', 'Terjadi kesalahan saat mengunggah foto!!');
					redirect($this->agent->referrer());
				}else {
					$upload_data = $this->upload->data();

					if ($this->M_manage->tambah_juri($KODE_USER, $upload_data['file_name']) == TRUE) {
						$this->session->set_flashdata('success', "Berhasil menambahkan data juri !!");
						redirect($this->agent->referrer());
					}else{
						$this->session->set_flashdata('error', "Terjadi kesalahan saat menambahkan data juri !!");
						redirect($this->agent->referrer());
					}
				}
			}else {

				if ($this->M_manage->tambah_juri($KODE_USER, null) == TRUE) {
					$this->session->set_flashdata('success', "Berhasil menambahkan data juri !!");
					redirect($this->agent->referrer());
				}else{
					$this->session->set_flashdata('error', "Terjadi kesalahan saat menambahkan data juri !!");
					redirect($this->agent->referrer());
				}
			}
    }else{
      $this->session->set_flashdata('error', "Password yang anda masukkan tidak sama !!");
      redirect($this->agent->referrer());
    }
  }
  
  function edit_juri(){
    if (!empty($_FILES['NEW_PROFIL']['name'])) {
			$KODE_USER = $this->input->post('KODE_USER');
      $kode_kompetisi = $this->session->userdata('manage_kompetisi');
			$folder   = "berkas/juri/kompetisi/{$kode_kompetisi}/{$KODE_USER}/";

			if (!is_dir($folder)) {
				mkdir($folder, 0755, true);
			}

              // UPLOAD FILE
			$config['upload_path']        = $folder;
			$config['allowed_types']      = 'png|jpg|jpeg|gif';
			$config['max_size']           = 10*1024;
			$config['overwrite']          = TRUE;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('NEW_PROFIL')){
				$this->session->set_flashdata('error', 'Terjadi kesalahan saat mengunggah foto!!');
				redirect($this->agent->referrer());
			}else {
				$upload_data = $this->upload->data();

				if ($this->M_manage->edit_juri($upload_data['file_name']) == TRUE) {
					$this->session->set_flashdata('success', "Berhasil mengubah data juri !!");
					redirect($this->agent->referrer());
				}else{
					$this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah data juri !!");
					redirect($this->agent->referrer());
				}
			}
		}else {
			if ($this->M_manage->edit_juri($this->input->post('PROFIL')) == TRUE) {
				$this->session->set_flashdata('success', "Berhasil mengubah data juri !!");
				redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah data juri !!");
				redirect($this->agent->referrer());
			}
		}
  }

	function pass_juri(){
		if ($this->M_manage->pass_juri() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil mengubah password juri !!");
			redirect($this->agent->referrer());
		}else{
			$this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah password juri !!");
			redirect($this->agent->referrer());
		}
	}

  function hapus_juri(){
    if ($this->M_manage->hapus_juri() == TRUE) {
      $this->session->set_flashdata('success', "Berhasil menghapus data juri !!");
      redirect($this->agent->referrer());
    }else{
      $this->session->set_flashdata('error', "Terjadi kesalahan saat menghapus data juri !!");
      redirect($this->agent->referrer());
    }
  }

  // END DATA JURI
  

	// DATA KOORDINATOR

	public function data_koordinator()
	{

		$data['bidang_lomba']       = $this->M_manage->get_bidangLomba($this->session->userdata('manage_kompetisi'));
		$data['data_koordinator']    = $this->M_manage->get_dataKoordinator($this->session->userdata('manage_kompetisi'));
		$data['controller']           = $this;

		$data['module']     = "manage_kompetisi";
		$data['fileview']   = "data_koordinator";
		echo Modules::run('template/manage_kompetisi_main', $data);
	}

	//PROSES

	function tambah_koordinator()
	{
		if ($this->input->post('PASSWORD') == $this->input->post('CONFIRM_PASSWORD')) {


      		// CREATE UNIQ NAME KODE USER
			$string = preg_replace('/[^a-z]/i', '', $this->input->post('NAMA_KOORDINATOR'));

			$vocal  = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", " ");
			$scrap  = str_replace($vocal, "", $string);
			$begin  = substr($scrap, 0, 4);
			$uniqid = strtoupper($begin);

			// CREATE KODE USER
			do {
				$KODE_USER      = "KOR_" . $uniqid . substr(md5(time()), 0, 3);
			} while ($this->M_manage->cek_kodeUser($KODE_USER) > 0);

			if ($this->M_manage->tambah_koordinator($KODE_USER) == TRUE) {

				$BIDANG_LOMBA 		= $this->M_manage->get_bidangKoordinator($KODE_USER) != false ? $this->M_manage->get_bidangKoordinator($KODE_USER)->BIDANG_LOMBA : 'BIDANG TIDAK DITEMUKAN';
				$NAMA_KOORDINATOR	= $this->input->post('NAMA_KOORDINATOR');
				$EMAIL				= $this->input->post('EMAIL');
				$PASSWORD			= $this->input->post('PASSWORD');
        $PENYELENGGARA = $this->session->userdata('penyelenggara_akses');

				$subject	= "Akun koordinator LO Kreatif Bidang Lomba - {$BIDANG_LOMBA}";
				$message 	= "Hai {$NAMA_KOORDINATOR}, kamu telah ditambahkan sebagai koordinator {$PENYELENGGARA} bidang lomba <i>{$BIDANG_LOMBA}</i>. Berikut hak akses untuk masuk ke akun kamu:</br></br><table cellspacing='0' cellpadding='0' style='table{border:none}'><tr><td><b>Email</b></td><td>: {$EMAIL}</td></tr><tr><td><b>Password</b></td><td>: {$PASSWORD}</td></tr></table></br></br>";

				$this->send_email($EMAIL, $subject, $message);
				$this->session->set_flashdata('success', "Berhasil menambahkan data koordinator !!");
				redirect($this->agent->referrer());
			} else {
				$this->session->set_flashdata('error', "Terjadi kesalahan saat menambahkan data koordinator !!");
				redirect($this->agent->referrer());
			}
		} else {
			$this->session->set_flashdata('error', "Password yang anda masukkan tidak sama !!");
			redirect($this->agent->referrer());
		}
	}

	function edit_koordinator()
	{
		if ($this->M_manage->edit_koordinator() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil mengubah data koordinator !!");
			redirect($this->agent->referrer());
		} else {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah data koordinator !!");
			redirect($this->agent->referrer());
		}
	}

	function pass_koordinator(){
		if ($this->M_manage->pass_koordinator() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil mengubah password koordinator !!");
			redirect($this->agent->referrer());
		}else{
			$this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah password koordinator !!");
			redirect($this->agent->referrer());
		}
	}

	function hapus_koordinator()
	{
		if ($this->M_manage->hapus_koordinator() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil menghapus data koordinator !!");
			redirect($this->agent->referrer());
		} else {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat menghapus data koordinator !!");
			redirect($this->agent->referrer());
		}
	}

  // END DATA KOORDINATOR
  
  

	// DATA BERKAS LOMBA
	public function berkas_lomba()
	{
		$data['berkas_lomba']		  	= $this->M_manage->get_berkasLomba($this->session->userdata('manage_kompetisi'));

		$data['module'] 	= "manage_kompetisi";
		$data['fileview'] 	= "berkas_lomba";
		echo Modules::run('template/manage_kompetisi_main', $data);
	}

	function tambahBerkas()
	{

		// UPLOAD
		if (!empty($_FILES['LINK']['name'])) {

      $kode_kompetisi = $this->session->userdata('manage_kompetisi');
			$folder   = "berkas/kebutuhan/kompetisi/{$kode_kompetisi}/";

			if (!is_dir($folder)) {
				mkdir($folder, 0755, true);
			}

			// UPLOAD FILE
			$config['upload_path']    		= $folder;
			$config['allowed_types']        = '*';
			$config['max_size']             = 10 * 1024;
			$config['overwrite']			= TRUE;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('LINK')) {
				$this->session->set_flashdata('error', 'Terjadi kesalahan saat mengunggah berkas!!');
				redirect($this->agent->referrer());
			} else {
				$upload_data = $this->upload->data();

				if ($this->M_manage->tambahBerkas($upload_data['file_name']) == TRUE) {

					$this->session->set_flashdata('success', "Berhasil menambahkan berkas kebutuhan !!");
					redirect($this->agent->referrer());
				} else {
					$this->session->set_flashdata('error', "Terjadi kesalahan saat menambahkan berkas kebutuhan !!");
					redirect($this->agent->referrer());
				}
			}
		} else {
			$this->session->set_flashdata('warning', 'Anda tidak memilih file untuk diunggah!!');
			redirect($this->agent->referrer());
		}
	}

	function editBerkas()
	{

		// UPLOAD
		if (!empty($_FILES['NEW_LINK']['name'])) {
      $kode_kompetisi = $this->session->userdata('manage_kompetisi');
			$folder   = "berkas/kebutuhan/kompetisi/{$kode_kompetisi}/";

			if (!is_dir($folder)) {
				mkdir($folder, 0755, true);
			}

			// UPLOAD FILE
			$config['upload_path']    		= $folder;
			$config['allowed_types']        = '*';
			$config['max_size']             = 10 * 1024;
			$config['overwrite']			= TRUE;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('NEW_LINK')) {
				$this->session->set_flashdata('error', 'Terjadi kesalahan saat mengunggah berkas!!');
				redirect($this->agent->referrer());
			} else {
				$upload_data = $this->upload->data();
				if ($this->M_manage->editBerkas($upload_data['file_name']) == TRUE) {

					$this->session->set_flashdata('success', "Berhasil mengubah berkas kebutuhan !!");
					redirect($this->agent->referrer());
				} else {
					$this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah berkas kebutuhan !!");
					redirect($this->agent->referrer());
				}
			}
		} else {
			if ($this->M_manage->editBerkas($this->input->post('LINK')) == TRUE) {

				$this->session->set_flashdata('success', "Berhasil mengubah berkas kebutuhan !!");
				redirect($this->agent->referrer());
			} else {
				$this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah berkas kebutuhan !!");
				redirect($this->agent->referrer());
			}
		}
	}

	function hapusBerkas()
	{
		if ($this->M_manage->hapusBerkas() == TRUE) {

			$this->session->set_flashdata('success', "Berhasil menghapus berkas kebutuhan !!");
			redirect($this->agent->referrer());
		} else {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat menghapus berkas kebutuhan !!");
			redirect($this->agent->referrer());
		}
	}

  // TAHAP PENILAIAN

  public function tahap_penilaian(){
    $data['tahap_penilaian']  = $this->M_manage->get_tahapPenilaian($this->session->userdata('manage_kompetisi'));

    $data['module']     = "manage_kompetisi";
    $data['fileview']   = "kompetisi/tahap_penilaian";
    echo Modules::run('template/manage_kompetisi_main', $data);
  }

  //PROSES
  
  function tambah_tahap(){
    if ($this->M_manage->tambah_tahap($this->session->userdata('manage_kompetisi')) == TRUE) {
      $this->session->set_flashdata('success', "Berhasil menambahkan tahap penilaian !!");
      redirect($this->agent->referrer());
    }else{
      $this->session->set_flashdata('error', "Terjadi kesalahan saat menambahkan tahap penilaian !!");
      redirect($this->agent->referrer());
    }
  }
  
  function edit_tahap(){
    if ($this->M_manage->edit_tahap() == TRUE) {
      $this->session->set_flashdata('success', "Berhasil mengubah tahap penilaian !!");
      redirect($this->agent->referrer());
    }else{
      $this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah tahap penilaian !!");
      redirect($this->agent->referrer());
    }
  }

  function hapus_tahap(){
    if ($this->M_manage->hapus_tahap() == TRUE) {
      $this->session->set_flashdata('success', "Berhasil menghapus tahap penilaian !!");
      redirect($this->agent->referrer());
    }else{
      $this->session->set_flashdata('error', "Terjadi kesalahan saat menghapus tahap penilaian !!");
      redirect($this->agent->referrer());
    }
  }

  // END TAHAP PENILAIAN

  // KRITERIA PENILAIAN

  public function kriteria_penilaian(){
    $data['tahap_penilaian']  = $this->M_manage->get_tahapPenilaian($this->session->userdata('manage_kompetisi'));
    $data['bidang_lomba']     = $this->M_manage->get_bidangLomba($this->session->userdata('manage_kompetisi'));
    $data['controller']        = $this;

    $data['module']     = "manage_kompetisi";
    $data['fileview']   = "kompetisi/kriteria_penilaian";
    echo Modules::run('template/manage_kompetisi_main', $data);
  }

  public function data_kriteria($id_tahap, $id_bidang){
    $data['kriteria_penilaian']     = $this->M_manage->get_kriteriaPenilaian($id_tahap, $id_bidang);

    $data['id_tahap']   = $id_tahap;
    $data['id_bidang']  = $id_bidang;

    $data['module']     = "manage_kompetisi";
    $data['fileview']   = "kompetisi/kriteria_data";
    echo Modules::run('template/manage_kompetisi_main', $data);
  }

  //PROSES
  
  function tambah_kriteria($id_tahap, $id_bidang){
    if ($this->M_manage->tambah_kriteria($id_tahap, $id_bidang) == TRUE) {
      $this->session->set_flashdata('success', "Berhasil menambahkan kriteria penilaian !!");
      redirect($this->agent->referrer());
    }else{
      $this->session->set_flashdata('error', "Terjadi kesalahan saat menambahkan kriteria penilaian !!");
      redirect($this->agent->referrer());
    }
  }
  
  function edit_kriteria(){
    if ($this->M_manage->edit_kriteria() == TRUE) {
      $this->session->set_flashdata('success', "Berhasil mengubah kriteria penilaian !!");
      redirect($this->agent->referrer());
    }else{
      $this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah kriteria penilaian !!");
      redirect($this->agent->referrer());
    }
  }

  function hapus_kriteria(){
    if ($this->M_manage->hapus_kriteria() == TRUE) {
      $this->session->set_flashdata('success', "Berhasil menghapus kriteria penilaian !!");
      redirect($this->agent->referrer());
    }else{
      $this->session->set_flashdata('error', "Terjadi kesalahan saat menghapus kriteria penilaian !!");
      redirect($this->agent->referrer());
    }
  }

  // END KRITERIA PENILAIAN

  //PENDAFTARAN

  public function atur_pendaftaran(){
    $data['cek_form']   = $this->M_manage->cek_form($this->session->userdata('manage_kompetisi'));
    $data['get_form']   = $this->M_manage->get_form($this->session->userdata('manage_kompetisi'));

    $data['CI']         = $this;

    $data['module']     = "manage_kompetisi";
    $data['fileview']   = "pendaftaran/atur_pendaftaran";
    echo Modules::run('template/manage_kompetisi_main', $data);
  }

  public function data_peserta(){
    $data['cek_form']         = $this->M_manage->cek_form($this->session->userdata('manage_kompetisi'));
    $data['get_form']         = $this->M_manage->get_formBerkas($this->session->userdata('manage_kompetisi'));

    $data['get_pendaftaran']  = $this->M_manage->get_dataPendaftaran($this->session->userdata('manage_kompetisi'));

    $data['module']     = "manage_kompetisi";
    $data['fileview']   = "pendaftaran/data_peserta";
    echo Modules::run('template/manage_kompetisi_main', $data);
  }

  public function verifikasi_berkas(){
    $data['cek_form']         = $this->M_manage->cek_form($this->session->userdata('manage_kompetisi'));
    $data['get_form']         = $this->M_manage->get_formBerkas($this->session->userdata('manage_kompetisi'));

    $data['get_pendaftaran']  = $this->M_manage->get_dataPendaftaran($this->session->userdata('manage_kompetisi'));

    $data['module']     = "manage_kompetisi";
    $data['fileview']   = "pendaftaran/verifikasi_berkas";
    echo Modules::run('template/manage_kompetisi_main', $data);
  }

  public function hasil_penilaian(){

    $data['module']     = "manage_kompetisi";
    $data['fileview']   = "kompetisi/hasil_penilaian";
    echo Modules::run('template/manage_kompetisi_main', $data);
  }

  //PROSES

  function proses_aturPendaftaran(){
    if ($this->M_manage->proses_aturPendaftaran($this->session->userdata('manage_kompetisi')) == TRUE)  {

      $this->session->set_flashdata('success', "Berhasil mengatur form pendaftaran !!");
      redirect($this->agent->referrer());
    }else {
      $this->session->set_flashdata('error', "Terjadi kesalahan saat mengatur form pendaftaran!");
      redirect($this->agent->referrer());
    }
  }

  function hapus_formPendaftaran($ID_FORM){
    if ($this->M_manage->hapus_formPendaftaran($ID_FORM) == TRUE)  {

      $this->session->set_flashdata('success', "Berhasil menghapus form pendaftaran !!");
      redirect($this->agent->referrer());
    }else {
      $this->session->set_flashdata('error', "Terjadi kesalahan saat menghapus form pendaftaran!");
      redirect($this->agent->referrer());
    }
  }

  function proses_updatePendaftaran(){
    if ($this->M_manage->proses_updatePendaftaran($this->session->userdata('manage_kompetisi')) == TRUE)  {

      $this->session->set_flashdata('success', "Berhasil mengubah form pendaftaran !!");
      redirect($this->agent->referrer());
    }else {
      $this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah form pendaftaran!");
      redirect($this->agent->referrer());
    }
  }
  // END PROSES

	function body_html($message){
    $PENYELENGGARA = $this->session->userdata('penyelenggara_akses');
		return '
		<html>

		<head>
		<title>'.$PENYELENGGARA.'</title>
		</head>

		<body style="
		font-family: -webkit-pictograph;
		color: #333333;
		font-size: 16px;
		background:#EEEEEE;">
		<div style="margin: 0 auto 0 auto; width: 560px;">
		<div style="padding-top: 55px; text-align : center;">
		<div style="font-weight: 700;font-size: 32px;">
		<span style="font-size: 32px; ">LO-KREATIF</span>
		</div>
		</div>
		<div style="background: white">
		<main><div style="margin-top: 32px;">
		<div style="height: 12px; background: #0B4C8A;"></div>
		<div style="margin: 32px 56px 0 56px">
		<div>
		<span style="font-size: 16px;">
		'.$message.'
		<br><br><br>
		<span class="text-muted">Regards,<br>'.$PENYELENGGARA.'</span>
		</span>
		</div>
		</div>
		</div>

		</main>
		<hr style="
		width: 513px; 
		margin-top: 34px;
		border-top: 1px solid #cecece; 
		border-bottom: none;" />
		<div>
		<div style="margin: 32px 56px 0 56px">
		<div style="margin-top: 32px">
		<img style="margin: auto;display: block;" src="https://i.ibb.co/XtvzJBX/icon-ts.png" width="75px" height="auto" alt="LO Kreatif logo">
		<div style="text-align: center; font-size: 10px; margin-top:10px">'.$PENYELENGGARA.' 2021</div>
		</div>
		</div>
		</div>
		<hr style="border-top: 1px dashed #CECECE; margin-top: 24px; border-bottom: none;">
		<div style="margin-top: 13px; text-align : center; font-size:10px;">This email has been generated
		automatically, please do not reply.</div>
		<div style="height: 12px; background: #0B4C8A; margin-top:10px;"></div>
		</div>
		</body>
		';
	}
}
