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
    if ($this->session->userdata('manage_kompetisi') == FALSE || !$this->session->userdata('manage_kompetisi')) {
      $this->session->set_flashdata('error', "Harap re-akses kompetisi anda");
      redirect(site_url('dashboard-penyelenggara/kompetisiku'));
    }
    
    $this->load->model('M_manageKompetisi', 'M_manage');
    $this->load->model('Template/M_template');
  }

  // AJAX GOES HERE

	function seleksi_tim(){
		$kodePendaftaran	= explode(',', $_POST['KODE_PENDAFTARAN']);
		$tahap				= $_POST['KE_TAHAP'];
		$dataStoreOrd		= array();
		
		foreach ($kodePendaftaran as $item) {		
			$this->M_manage->seleksi_tim($item, $tahap);
		}

		$this->session->set_flashdata('success', "Berhasil menyeleksi tim kedalam tahap yang ditentukan!");
		redirect(site_url('manage-kompetisi/seleksi'));
	}

	function get_tahapData(){
    if($this->input->post('TAHAP') == 0){
      echo json_encode(['tim' => 0, 'status' => "berlangsung"]);
    }else{
      $tahap = $this->M_manage->get_tahapData($this->input->post('TAHAP'));
          switch ($tahap->STATUS) {
            case 0:
              $status = '<span class"badge badge-secondary">belum dimulai</span>';
              break;
  
            case 1:
              $status = '<span class"badge badge-success">berlangsung</span>';
              break;
  
            case 2:
              $status = '<span class"badge badge-warning">berakhir</span>';
              break;
            
            default:
              $status = '<span class"badge badge-secondary">belum dimulai</span>';
              break;
          }
      echo json_encode(['tim' => ($tahap->TEAM == 0 ? 'tidak ada batasan' : $tahap->TEAM), 'status' => $status]);
    }
	}

	function get_tahapDataTujuan(){
		$tahap = $this->M_manage->get_tahapData($this->input->post('KE_TAHAP'));
        switch ($tahap->STATUS) {
          case 0:
            $status = '<span class"badge badge-secondary">belum dimulai</span>';
            break;

          case 1:
            $status = '<span class"badge badge-success">berlangsung</span>';
            break;

          case 2:
            $status = '<span class"badge badge-warning">berakhir</span>';
            break;
          
          default:
            $status = '<span class"badge badge-secondary">belum dimulai</span>';
            break;
        }
		echo json_encode(['tim' => ($tahap->TEAM == 0 ? 'tidak ada batasan' : $tahap->TEAM), 'status' => $status]);
	}

  function tampil_anggota_tim($kode_pendaftaran = "")
  {   
      $anggota = $this->M_manage->get_anggota_tim($kode_pendaftaran);
      if($anggota != false){
          $data['anggota'] = $anggota;
          $data['controller'] = $this;
          $data['module']     = "manage_kompetisi";
          $data['fileview']     = "ajax/tampil_anggota_tim";
          echo Modules::run('template/blank_template', $data);
      }else{
          $data['tim'] = $this->M_manage->get_pendaftaran_by_kode_pendaftaran($kode_pendaftaran);
          $data['anggota'] = false;
          $data['controller'] = $this;
          $data['module']     = "manage_kompetisi";
          $data['fileview']     = "ajax/tampil_anggota_tim";
          echo Modules::run('template/blank_template', $data);
      }
  }

  function tampil_berkas_tim($kode_pendaftaran = "")
  {
      $berkas = $this->M_manage->get_karya_by_kode_pendaftaran($kode_pendaftaran);
      if ($berkas != false) {
          $data['berkas'] = $berkas;
          $data['controller'] = $this;
          $data['module']     = "manage_kompetisi";
          $data['fileview']     = "ajax/tampil_berkas_tim";
          echo Modules::run('template/blank_template', $data);
      } else {
          $data['berkas'] = false;
          $data['controller'] = $this;
          $data['module']     = "manage_kompetisi";
          $data['fileview']     = "ajax/tampil_berkas_tim";
          echo Modules::run('template/blank_template', $data);
      }
  }

  function tampil_surat($kode_pendaftaran = "", $id = "")
  {
      $form = $this->M_manage->get_formData($kode_pendaftaran, $id);
      if ($form != false) {
          $data['form'] = $form;
          $data['pendaftaran'] = $this->M_manage->get_pendaftaran_by_kode_pendaftaran($kode_pendaftaran);
          $data['controller'] = $this;
          $data['module']     = "manage_kompetisi";
          $data['fileview']     = "ajax/tampil_surat";
          echo Modules::run('template/blank_template', $data);
      } else {
          $data['form'] = false;
          $data['controller'] = $this;
          $data['module']     = "manage_kompetisi";
          $data['fileview']     = "ajax/tampil_surat";
          echo Modules::run('template/blank_template', $data);
      }
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

	function get_detailPeserta($kode){
		$peserta 		= $this->M_manage->get_dataPeserta($kode);
    $anggota 		= $this->M_manage->get_anggota_tim($peserta->KODE_PENDAFTARAN);
		$data['kegiatan']		= $this->M_template->get_kompetisi($this->session->userdata('manage_kompetisi'));
		$data['CI']		  = $this;
		$data['key']	  = $peserta;
		$data['anggota']= $anggota;
		$this->load->view('ajax/ajax_modalPeserta', $data);
	}


  // KOMPETISI

  public function index(){

    $data['c_peserta']  = $this->M_manage->count_peserta($this->session->userdata('manage_kompetisi'));
    $data['c_verif']    = $this->M_manage->count_pesertaVerif($this->session->userdata('manage_kompetisi'));

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

  public function data_peserta($bidang = 0){
    $bidang_lomba = $this->M_manage->get_bidangLomba_by_id($bidang);
    if($bidang_lomba == false){
        $data['all_bidang_lomba'] = $this->M_manage->get_bidangLomba($this->session->userdata('manage_kompetisi'));
        $data['bidang_lomba'] = "Semua";
    }else{
        $data['all_bidang_lomba'] = $this->M_manage->get_bidangLomba($this->session->userdata('manage_kompetisi'));
        $data['bidang_lomba'] = $bidang_lomba->BIDANG_LOMBA;
    }
$data['peserta']		= $this->M_manage->get_peserta($bidang);
$data['jmlMhs'] 		= $this->M_manage->get_countMhs($bidang);
$data['jmlTim'] 		= $this->M_manage->get_countTim($bidang);
$data['jmlPTS'] 		= count($this->M_manage->get_countPTS($bidang));

    $data['module']     = "manage_kompetisi";
    $data['fileview']   = "pendaftaran/data_peserta";
    echo Modules::run('template/manage_kompetisi_main', $data);
  }

  public function verifikasi_berkas($param = 0){ // 
    $bidang_lomba = $this->M_manage->get_bidangLomba_by_id($param);
    if($bidang_lomba == false){
        $data['all_bidang_lomba'] = $this->M_manage->get_bidangLomba($this->session->userdata('manage_kompetisi'));
        $data['bidang_lomba'] = "Semua";
        $data["jumlah_tim"] =  $this->M_manage->get_jumlah_tim()->jumlah_tim;
        $data['jumlah_berkas_belum_terverifikasi'] = $this->M_manage->get_jumlah_berkas_belum_terverifikasi()->jumlah_berkas_belum_terverifikasi;;
        $data['jumlah_berkas_terverifikasi'] = $this->M_manage->get_jumlah_berkas_terverifikasi()->jumlah_berkas_terverifikasi;;
        $data['jumlah_berkas_ditolak'] = $this->M_manage->get_jumlah_berkas_ditolak()->jumlah_berkas_ditolak;;
        $data['get_pendaftaran']  = $this->M_manage->get_dataPendaftaran($this->session->userdata('manage_kompetisi'));
    }else{
        $data['all_bidang_lomba'] = $this->M_manage->get_bidangLomba($this->session->userdata('manage_kompetisi'));
        $data['bidang_lomba'] = $bidang_lomba->BIDANG_LOMBA;
        $data["jumlah_tim"] =  $this->M_manage->get_jumlah_tim($bidang_lomba->ID_BIDANG)->jumlah_tim;
        $data['jumlah_berkas_belum_terverifikasi'] = $this->M_manage->get_jumlah_berkas_belum_terverifikasi($bidang_lomba->ID_BIDANG)->jumlah_berkas_belum_terverifikasi;
        $data['jumlah_berkas_terverifikasi'] = $this->M_manage->get_jumlah_berkas_terverifikasi($bidang_lomba->ID_BIDANG)->jumlah_berkas_terverifikasi;
        $data['jumlah_berkas_ditolak'] = $this->M_manage->get_jumlah_berkas_ditolak($bidang_lomba->ID_BIDANG)->jumlah_berkas_ditolak;
        $data['get_pendaftaran']  = $this->M_manage->get_dataPendaftaran_by_bidang_lomba($bidang_lomba->ID_BIDANG);
    }
$data['cek_form']         = $this->M_manage->cek_form($this->session->userdata('manage_kompetisi'));
$data['get_form']         = $this->M_manage->get_form($this->session->userdata('manage_kompetisi'));
$data['get_formBerkas']   = $this->M_manage->get_formBerkas($this->session->userdata('manage_kompetisi'));
$data['controller']       = $this;

$data['module']     = "manage_kompetisi";
$data['fileview']   = "pendaftaran/verifikasi_berkas";
echo Modules::run('template/manage_kompetisi_main', $data);
  }

  function terima_pendaftaran()
  {
      $nama_tim = $this->input->post('NAMA_TIM');
      if ($this->M_manage->terima_pendaftaran() == TRUE) {

          $this->session->set_flashdata('success', "Berhasil verifikasi data pendaftaran TIM {$nama_tim} !!");
          redirect($this->agent->referrer());
      } else {
          $this->session->set_flashdata('error', "Terjadi kesalahan saat verifikasi data pendaftaran TIM {$nama_tim}!");
          redirect($this->agent->referrer());
      }
  }

  function tolak_pendaftaran()
  {
      $nama_tim = $this->input->post('NAMA_TIM');
      if ($this->M_manage->tolak_pendaftaran() == TRUE) {

          $this->session->set_flashdata('success', "Berhasil menolak data pendaftaran TIM {$nama_tim} !!");
          redirect($this->agent->referrer());
      } else {
          $this->session->set_flashdata('error', "Terjadi kesalahan saat menolak data pendaftaran TIM {$nama_tim}!");
          redirect($this->agent->referrer());
      }
  }

  public function hasil_penilaian($tahap = 0, $bidang = 0){

		$data['tahap']				= $this->M_manage->get_tahapPenilaian($this->session->userdata('manage_kompetisi'));
        $data['all_bidang_lomba'] 	= $this->M_manage->get_bidangLomba($this->session->userdata('manage_kompetisi'));
        $bidang_lomba 				= $this->M_manage->get_bidangLomba_by_id($bidang);
        $tahap_penilaian 			= $this->M_manage->get_tahapLomba_by_id($tahap);

        if($tahap == false){
            $data['tahap_penilaian'] 	= "Pilih Tahap";
        }else{
            $data['tahap_penilaian'] 	= $tahap_penilaian->NAMA_TAHAP;
        }

        if($bidang_lomba == false){
            $data['bidang_lomba'] 		= "Semua";
        }else{
            $data['bidang_lomba'] 		= $bidang_lomba->BIDANG_LOMBA;
        }
        
        $data['id_tahap'] 	= $tahap;
        $data['id_bidang'] 	= $bidang;

		    $data['tim']		= $this->M_manage->get_hasilPenilaian($tahap, $bidang);

        $data['CI']			= $this;

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

  // DATA TRANSAKSI

  function data_transaksi(){
    $data['jumlah_transaksi'] = $this->M_manage->get_jmlTransaksi();
    $data['total_uang_masuk'] = $this->M_manage->get_totalUang();
    $data['jumlah_pembayaran_sukses'] = $this->M_manage->get_pembayaranSukses();
    $data['transaksi']        = $this->M_manage->get_dataTransaksi();
    
    $data['module']     = "manage_kompetisi";
    $data['fileview']   = "data_transaksi";
    echo Modules::run('template/manage_kompetisi_main', $data);
  }

	public function update_status_transaksi($kode_trans = "")
	{
		if ($kode_trans != "") {
			if ($this->M_manage->update_status_transaksi($kode_trans) == true) {
				$this->session->set_flashdata('success', "Status pembayaran #{$kode_trans} berhasil diperbarui!");
				redirect($this->agent->referrer());
			} else {
				$this->session->set_flashdata('error', "Terjadi kesalahaan saat mengubah status pembayaran #{$kode_trans}!!");
				redirect($this->agent->referrer());
			}
		} else {
			redirect($this->agent->referrer());
		}
	}

	public function delete_transaksi($kode_trans = "")
	{
		if ($kode_trans != "") {
      if ($this->M_manage->delete_transaksi($kode_trans) == true) {
        $this->session->set_flashdata('success', "Berhasil menghapus Transaksi # " . $kode_trans);
        redirect($this->agent->referrer());
      } else {
        $this->session->set_flashdata('error', "Terjadi kesalahan, saat menghapus transaksi!");
        redirect($this->agent->referrer());
      }
		} else {
			$this->session->set_flashdata('error', "Kode Transaksi tidak ditemukan!!");
			redirect($this->agent->referrer());
		}
  }
  

  // SELEKSI
	
	public function get_seleksiTIM($id_bidang = 0, $tim = 0, $id_tahap = 0){
		if ($id_tahap == 0) {
      $bidang_lomba = $this->M_manage->get_bidangLomba_by_id($id_bidang);
      if($bidang_lomba == false){
          $data['max_tim']	= $tim;
          $data['tahap']		= $id_tahap;
    $data['tim']		= $this->M_manage->get_seleksiTIM($param = 0, $id_bidang, $id_tahap);
      }else{
          $data['id_bidang'] 	= $bidang_lomba->BIDANG_LOMBA;
          $data['max_tim']	= $tim;
          $data['tahap']		= $id_tahap;
    $data['tim']		= $this->M_manage->get_seleksiTIM($param = 0, $bidang_lomba->ID_BIDANG, $id_tahap);
      }

      $data['CI']			= $this;
      $data['module'] 	= "manage_kompetisi";
      $data['fileview'] 	= "ajax/ajax_tableSeleksiAwal";
      echo Modules::run('template/blank_template', $data);
		}else{
	        $bidang_lomba = $this->M_manage->get_bidangLomba_by_id($id_bidang);
	        if($bidang_lomba == false){
	            $data['max_tim']	= $tim;
	            $data['tahap']		= $id_tahap;
				$data['tim']		= $this->M_manage->get_seleksiTIM($param = 1, $id_bidang, $id_tahap);
	        }else{
	            $data['id_bidang'] 	= $bidang_lomba->BIDANG_LOMBA;
	            $data['max_tim']	= $tim;
	            $data['tahap']		= $id_tahap;
				$data['tim']		= $this->M_manage->get_seleksiTIM($param = 1, $bidang_lomba->ID_BIDANG, $id_tahap);
	        }

	        $data['CI']			= $this;
			$data['module'] 	= "manage_kompetisi";
			$data['fileview'] 	= "ajax/ajax_tableSeleksi";
			echo Modules::run('template/blank_template', $data);
		}
	}
	
	// public function hasil_seleksi($param = 0){

  //       $bidang_lomba = $this->M_manage->get_bidangLomba_by_id($param);
  //       if($bidang_lomba == false){
  //           $data['all_bidang_lomba'] 	= $this->M_manage->get_bidangLomba($this->session->userdata('manage_kompetisi'));
  //           $data['bidang_lomba'] 		= "Semua";
  //           $data['id_bidang'] 			= 0;
	// 		$data['tahap']		= $this->M_manage->get_tahapPenilaian($this->session->userdata('manage_kompetisi'));
	// 		$data['tim']		= $this->M_manage->get_daftarTIM($param = 0, $id_bidang = 0, $id_tahap = 0);
  //       }else{
  //           $data['all_bidang_lomba'] 	= $this->M_manage->get_bidangLomba($this->session->userdata('manage_kompetisi'));
  //           $data['bidang_lomba'] 		= $bidang_lomba->BIDANG_LOMBA;
  //           $data['id_bidang'] 			= $bidang_lomba->ID_BIDANG;
	// 		$data['tahap']		= $this->M_manage->get_tahapPenilaian($this->session->userdata('manage_kompetisi'));
	// 		$data['tim']		= $this->M_manage->get_daftarTIM($param = 0, $bidang_lomba->ID_BIDANG, $id_tahap = 0);
  //       }


  //       $data['CI']			= $this;
	// 	$data['module'] 	= "manage_kompetisi";
	// 	$data['fileview'] 	= "hasil_seleksi";
	// 	echo Modules::run('template/manage_kompetisi_main', $data);
	// }
	
	public function seleksi($param = 0){

        $bidang_lomba = $this->M_manage->get_bidangLomba_by_id($param);
        if($bidang_lomba == false){
            $data['all_bidang_lomba'] 	= $this->M_manage->get_bidangLomba($this->session->userdata('manage_kompetisi'));
            $data['bidang_lomba'] 		= "Semua";
            $data['id_bidang'] 			= 0;
			$data['tahap']		= $this->M_manage->get_tahapPenilaian($this->session->userdata('manage_kompetisi'));
			$data['tim']		= $this->M_manage->get_daftarTIM($param, $id_bidang = 0, $id_tahap = 1);
        }else{
            $data['all_bidang_lomba'] 	= $this->M_manage->get_bidangLomba($this->session->userdata('manage_kompetisi'));
            $data['bidang_lomba'] 		= $bidang_lomba->BIDANG_LOMBA;
            $data['id_bidang'] 			= $bidang_lomba->ID_BIDANG;
			$data['tahap']		= $this->M_manage->get_tahapPenilaian($this->session->userdata('manage_kompetisi'));
			$data['tim']		= $this->M_manage->get_daftarTIM($param, $bidang_lomba->ID_BIDANG, $id_tahap = 1);
        }


        $data['CI']			= $this;
		$data['module'] 	= "manage_kompetisi";
		$data['fileview'] 	= "seleksi";
		echo Modules::run('template/manage_kompetisi_main', $data);
	}

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
