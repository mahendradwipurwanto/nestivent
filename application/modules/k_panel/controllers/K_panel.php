<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class K_panel extends MX_Controller {
  public function __construct(){
    parent::__construct();

    if ($this->agent->is_mobile()) {
      $this->session->set_flashdata('error', "K-PANEL HANYA DAPAT DIAKSES MELALUI BROWSER");
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
    if ($this->session->userdata('status_akses') == FALSE || !$this->session->userdata('status_akses')) {
      $this->session->set_flashdata('error', "Harap re-akses k-panel anda");
      redirect('pengguna/k-panel');
    }
    
    $this->load->model('M_kpanel');
  }

  public function index(){
    $data['kegiatan']   = $this->M_kpanel->count_event($this->session->userdata('kode_akses'))+$this->M_kpanel->count_kompetisi($this->session->userdata('kode_akses'));
    $data['event']      = $this->M_kpanel->count_event($this->session->userdata('kode_akses'));
    $data['kompetisi']  = $this->M_kpanel->count_kompetisi($this->session->userdata('kode_akses'));
    $data['peserta']    = $this->M_kpanel->count_event($this->session->userdata('kode_akses'));

    $data['module']     = "k_panel";
    $data['fileview']   = "dashboard";
    echo Modules::run('template/kpanel_main', $data);
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

  // PENGATURAN
  public function pengaturan(){

    $data['module']     = "k_panel";
    $data['fileview']   = "pengaturan";
    echo Modules::run('template/kpanel_main', $data);
  }

  public function pengaturan_umum(){

    $data['penyelenggara']  = $this->M_kpanel->get_penyelenggaraDetail($this->session->userdata('kode_akses'));

    $data['module']     = "k_panel";
    $data['fileview']   = "pengaturan/informasi";
    echo Modules::run('template/kpanel_main', $data);
  }

  public function pengaturan_landing(){

    $data['module']     = "k_panel";
    $data['fileview']   = "pengaturan/halaman_info";
    echo Modules::run('template/kpanel_main', $data);
  }

  public function pengaturan_kolabolator(){

    $data['module']     = "k_panel";
    $data['fileview']   = "pengaturan/manage_kolabolator";
    echo Modules::run('template/kpanel_main', $data);
  }

  // EVENT
  public function eventku(){
    $data['event']      = $this->M_kpanel->get_eventAll();

    $data['module']     = "k_panel";
    $data['fileview']   = "event/data_event";
    echo Modules::run('template/kpanel_main', $data);
  }

  public function buat_event(){

    $data['module']     = "k_panel";
    $data['fileview']   = "event/tambah_event";
    echo Modules::run('template/kpanel_main', $data);
  }

  // KOMPETISI
  public function kompetisiku(){
    $data['kompetisi']  = $this->M_kpanel->get_kompetisiAll();

    $data['module']     = "k_panel";
    $data['fileview']   = "kompetisi/data_kompetisi";
    echo Modules::run('template/kpanel_main', $data);
  }

  public function buat_kompetisi(){

    $data['module']     = "k_panel";
    $data['fileview']   = "kompetisi/tambah_kompetisi";
    echo Modules::run('template/kpanel_main', $data);
  }


  // DATA AKTIVITAS & NOTIFIKASI K-PANEL
  public function aktivitas(){
    $this->load->library('pagination');

    $config['base_url']         = base_url().'k-panel/aktivitas-k-panel';
    $config['total_rows']       = $this->M_kpanel->count_aktivitasKpanel($this->session->userdata('kode_akses'));
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

    $data['aktivitas']  = $this->M_kpanel->get_aktivitasKpanel($config['per_page'], (!$this->uri->segment(3) ? 0 : $this->uri->segment(3)), $this->session->userdata('kode_akses'));
    $data['CI']         = $this;

    $data['module']     = "k_panel";
    $data['fileview']   = "aktivitas";
    echo Modules::run('template/kpanel_main', $data);
  }

  // DATA NOTIFIKASI SISTEM
  public function notifikasi(){
    $this->load->library('pagination');

    $config['base_url']         = base_url().'k-panel/notifikasi-k-panel';
    $config['total_rows']       = $this->M_kpanel->count_notifikasiKpanel($this->session->userdata('kode_akses'));
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

    $data['notifikasi'] = $this->M_kpanel->get_notifikasiKpanel($config['per_page'], (!$this->uri->segment(3) ? 0 : $this->uri->segment(3)), $this->session->userdata('kode_akses'));
    $data['CI']         = $this;

    $data['module']     = "k_panel";
    $data['fileview']   = "notifikasi";
    echo Modules::run('template/kpanel_main', $data);
  }

  //PROSES

  // EVENT
  function proses_buatEvent(){
    $filename             = null;
    $KODE_PENYELENGGARA   = $this->session->userdata("kode_akses");
    $JUDUL                = htmlspecialchars($this->input->post("JUDUL"), true);

    // UPLOAD
    if (!empty($_FILES['POSTER']['name'])) {
      // CREATE FILENAME
      $path     = $_FILES['POSTER']['name'];
      $ext      = pathinfo($path, PATHINFO_EXTENSION);


      $char = array('!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '+', '=', '|', ';', '.', '`', '~', '[', ']', '{', '}', '?', '/\s+/', ' ', '_', '"');
      $uniqid = str_replace($char, '-', $JUDUL);

      $uniqid = str_replace('--', '-', $uniqid);

      $uniqid = strtolower($uniqid);

      $time = substr(md5(time()), 0, 3);
      // CREATE KODE EVENT
      do {
        $KODE_EVENT      = "event-{$uniqid}-{$time}";
      } while ($this->M_kpanel->cek_kodeEvent($KODE_EVENT) > 0);

      $time   = time();
      $filename = "POSTER_-{$time}.{$ext}";

      $folder   = "berkas/penyelenggara/{$KODE_PENYELENGGARA}/event/{$KODE_EVENT}/POSTER/";

      if (!is_dir($folder)) {
        mkdir($folder, 0755, true);
      }

      // UPLOAD FILE
      $config['upload_path']    = $folder;
      $config['allowed_types']  = 'JPEG|jpeg|JPG|jpg|PNG|png';
      $config['max_size']       = 2048;
      $config['file_name']      = $filename;
      $config['overwrite']      = TRUE;

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('POSTER')){
        $this->session->set_flashdata('error', 'Terjadi kesalahan saat mengunggah Poster anda!!');
        redirect($this->agent->referrer());
      }else {
        if ($this->M_kpanel->proses_buatEvent($KODE_EVENT, $filename) == TRUE) {

        // SAVE LOG K-Panel
          $this->M_kpanel->log_aktivitasKpanel($KODE_PENYELENGGARA, $this->session->userdata("kode_user"), 11, 3);

          $this->session->set_flashdata('success', 'Berhasil membuat event anda!!');
          redirect('k-panel/eventku');
        }else {
          $this->session->set_flashdata('error', "Terjadi kesalahan saat membuat event anda!");
          redirect($this->agent->referrer());
        }
      }
    }else {
      $this->session->set_flashdata('error', 'Harap pilih Poster untuk dapat diupload!!');
      redirect($this->agent->referrer());
    }
  }

  // KOMPETISI

  function proses_buatKompetisi(){
    $filename             = null;
    $KODE_PENYELENGGARA   = $this->session->userdata("kode_akses");
    $JUDUL                = htmlspecialchars($this->input->post("JUDUL"), true);

    // UPLOAD
    if (!empty($_FILES['POSTER']['name'])) {
      // CREATE FILENAME
      $path     = $_FILES['POSTER']['name'];
      $ext      = pathinfo($path, PATHINFO_EXTENSION);


      $char = array('!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '+', '=', '|', ';', '.', '`', '~', '[', ']', '{', '}', '?', '/\s+/', ' ', '_', '"');
      $uniqid = str_replace($char, '-', $JUDUL);

      $uniqid = str_replace('--', '-', $uniqid);

      $uniqid = strtolower($uniqid);

      $time = substr(md5(time()), 0, 3);
      // CREATE KODE KOMPETISI
      do {
        $KODE_KOMPETISI      = "kompetisi-{$uniqid}-{$time}";
      } while ($this->M_kpanel->cek_kodeKompetisi($KODE_KOMPETISI) > 0);

      $time   = time();
      $filename = "POSTER_-{$time}.{$ext}";

      $folder   = "berkas/penyelenggara/{$KODE_PENYELENGGARA}/kompetisi/{$KODE_KOMPETISI}/POSTER/";

      if (!is_dir($folder)) {
        mkdir($folder, 0755, true);
      }

      // UPLOAD FILE
      $config['upload_path']    = $folder;
      $config['allowed_types']  = 'JPEG|jpeg|JPG|jpg|PNG|png';
      $config['max_size']       = 2048;
      $config['file_name']      = $filename;
      $config['overwrite']      = TRUE;

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('POSTER')){
        $this->session->set_flashdata('error', 'Terjadi kesalahan saat mengunggah Poster anda!!');
        redirect($this->agent->referrer());
      }else {
        if ($this->M_kpanel->proses_buatKompetisi($KODE_KOMPETISI, $filename) == TRUE) {

        // SAVE LOG K-Panel
          $this->M_kpanel->log_aktivitasKpanel($KODE_PENYELENGGARA, $this->session->userdata("kode_user"), 11, 3);

          $this->session->set_flashdata('success', 'Berhasil membuat kompetisi anda!!');
          redirect('k-panel/kompetisiku');
        }else {
          $this->session->set_flashdata('error', "Terjadi kesalahan saat membuat kompetisi anda!");
          redirect($this->agent->referrer());
        }
      }
    }else {
      $this->session->set_flashdata('error', 'Harap pilih Poster untuk dapat diupload!!');
      redirect($this->agent->referrer());
    }
  }


  // PENGATURAN
  function ubah_sosmed(){
    if ($this->M_kpanel->ubah_sosmed($this->session->userdata('kode_akses')) == TRUE) {
      $this->session->set_flashdata('success', "Berhasil mengubah data !!");
      redirect($this->agent->referrer());
    }else {
      $this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah data !!");
      redirect($this->agent->referrer());
    }
  }

  function ubah_informasi(){
    if ($this->M_kpanel->ubah_informasi($this->session->userdata('kode_akses')) == TRUE) {
      $this->session->set_flashdata('success', "Berhasil mengubah data !!");
      redirect($this->agent->referrer());
    }else {
      $this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah data !!");
      redirect($this->agent->referrer());
    }
  }

  function ubah_logo(){
    $KODE = $this->session->userdata('kode_akses');
    // UPLOAD
    if (!empty($_FILES['LOGO']['name'])) {
      // CREATE FILENAME
      $path     = $_FILES['LOGO']['name'];
      $ext      = pathinfo($path, PATHINFO_EXTENSION);

      $time   = time();
      $filename = "LOGO_{$time}.{$ext}";

      $folder   = "berkas/penyelenggara/{$KODE}";

      if (!is_dir($folder)) {
        mkdir($folder, 0755, true);
      }

      // UPLOAD FILE
      $config['upload_path']    = $folder;
      $config['allowed_types']  = 'JPEG|jpeg|JPG|jpg|PNG|png';
      $config['max_size']       = 10048;
      $config['file_name']      = $filename;
      $config['overwrite']      = TRUE;

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('LOGO')){
        $this->session->set_flashdata('error', 'Terjadi kesalahan saat meng-upload logo!!');
        redirect($this->agent->referrer());
      }else {

        $this->db->where('KODE_PENYELENGGARA', $this->session->userdata('kode_akses'));
        $this->db->update('TB_PENYELENGGARA', array('LOGO' => $filename));
        $cek = ($this->db->affected_rows() != 1) ? false : true;
        if ($cek == TRUE) {
          $this->session->set_flashdata('success', 'Berhasil mengubah logo!!');
          redirect($this->agent->referrer());
        }else {
          $this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah logo!");
          redirect($this->agent->referrer());
        }
      }
    }else {
      $this->session->set_flashdata('error', 'Harap pilih foto untuk dapat diupload!!');
      redirect($this->agent->referrer());
    }
  }
}
