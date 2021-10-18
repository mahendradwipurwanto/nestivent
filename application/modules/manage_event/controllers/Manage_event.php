<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_event extends MX_Controller {
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
    if ($this->session->userdata('mstatus_event') == FALSE || !$this->session->userdata('mstatus_event')) {
      $this->session->set_flashdata('error', "Harap re-akses event anda");
      redirect(site_url('dashboard-penyelenggara/eventku'));
    }
    
    $this->load->model('M_manageEvent', 'M_manage');
    
    $this->load->model('Event/M_event');
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

  function tampil_surat($kode_pendaftaran = "", $id = "")
  {
      $form = $this->M_manage->get_formData($kode_pendaftaran, $id);
      if ($form != false) {
          $data['form'] = $form;
          $data['pendaftaran'] = $this->M_manage->get_pendaftaran_by_kode_pendaftaran($kode_pendaftaran);
          $data['module']       = "Manage_event";
          $data['fileview']     = "ajax/tampil_surat";
          echo Modules::run('template/blank_template', $data);
      } else {
          $data['form'] = false;
          $data['module']       = "Manage_event";
          $data['fileview']     = "ajax/tampil_surat";
          echo Modules::run('template/blank_template', $data);
      }
  }


  // EVENT

  public function index(){

    $data['c_peserta']  = $this->M_manage->count_peserta($this->session->userdata('manage_event'));
    $data['c_verif']    = $this->M_manage->count_pesertaVerif($this->session->userdata('manage_event'));

    $data['module']     = "manage_event";
    $data['fileview']   = "dashboard";
    echo Modules::run('template/manage_event_main', $data);
  }

  // PENGATURAN
  public function pengaturan(){

    $data['module']     = "manage_event";
    $data['fileview']   = "pengaturan";
    echo Modules::run('template/manage_event_main', $data);
  }

  public function pengaturan_umum(){

    $data['module']     = "manage_event";
    $data['fileview']   = "pengaturan/pengaturan_umum";
    echo Modules::run('template/manage_event_main', $data);
  }

  // DATA AKTIVITAS & NOTIFIKASI K-PANEL
  public function aktivitas(){
    $this->load->library('pagination');

    $config['base_url']         = base_url().'manage-event/aktivitas-event';
    $config['total_rows']       = $this->M_manage->count_aktivitasEvent($this->session->userdata('manage_event'));
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

    $data['aktivitas']  = $this->M_manage->get_aktivitasEvent($config['per_page'], (!$this->uri->segment(3) ? 0 : $this->uri->segment(3)), $this->session->userdata('manage_event'));
    $data['CI']         = $this;

    $data['module']     = "manage_event";
    $data['fileview']   = "aktivitas";
    echo Modules::run('template/manage_event_main', $data);
  }

  // DATA NOTIFIKASI SISTEM
  public function notifikasi(){
    $this->load->library('pagination');

    $config['base_url']         = base_url().'manage-event/aktivitas-event';
    $config['total_rows']       = $this->M_manage->count_notifikasiEvent($this->session->userdata('manage_event'));
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

    $data['notifikasi'] = $this->M_manage->get_notifikasiEvent($config['per_page'], (!$this->uri->segment(3) ? 0 : $this->uri->segment(3)), $this->session->userdata('manage_event'));
    $data['CI']         = $this;

    $data['module']     = "manage_event";
    $data['fileview']   = "notifikasi";
    echo Modules::run('template/manage_event_main', $data);
  }

  //PENDAFTARAN

  public function atur_pendaftaran(){
    $data['cek_form']   = $this->M_manage->cek_form($this->session->userdata('manage_event'));
    $data['get_form']   = $this->M_manage->get_form($this->session->userdata('manage_event'));

    $data['CI']         = $this;

    $data['module']     = "manage_event";
    $data['fileview']   = "pendaftaran/atur_pendaftaran";
    echo Modules::run('template/manage_event_main', $data);
  }

  public function data_peserta(){
    $data['cek_form']         = $this->M_manage->cek_form($this->session->userdata('manage_event'));
    $data['get_form']         = $this->M_manage->get_form($this->session->userdata('manage_event'));

    $data['get_pendaftaran']  = $this->M_manage->get_dataPendaftaran($this->session->userdata('manage_event'));

    $data['controller']         = $this;

    $data['module']     = "manage_event";
    $data['fileview']   = "pendaftaran/data_peserta";
    echo Modules::run('template/manage_event_main', $data);
  }

  public function verifikasi_berkas(){
    $data['cek_form']         = $this->M_manage->cek_form($this->session->userdata('manage_event'));
    $data['get_form']         = $this->M_manage->get_formBerkas($this->session->userdata('manage_event'));
    $data['event']            = $this->M_event->get_eventDetail($this->session->userdata('manage_event'));
    $data['get_pendaftaran']  = $this->M_manage->get_dataPendaftaran($this->session->userdata('manage_event'));

    $data['controller']         = $this;

    $data['module']     = "manage_event";
    $data['fileview']   = "pendaftaran/verifikasi_berkas";
    echo Modules::run('template/manage_event_main', $data);
  }

  //PROSES

  function proses_aturPendaftaran(){
    if ($this->M_manage->proses_aturPendaftaran($this->session->userdata('manage_event')) == TRUE)  {

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
    if ($this->M_manage->proses_updatePendaftaran($this->session->userdata('manage_event')) == TRUE)  {

      $this->session->set_flashdata('success', "Berhasil mengubah form pendaftaran !!");
      redirect($this->agent->referrer());
    }else {
      $this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah form pendaftaran!");
      redirect($this->agent->referrer());
    }
  }

  function terima_pendaftaranEvent()
  {
      $nama = $this->input->post('NAMA');
      if ($this->M_manage->terima_pendaftaranEvent() == TRUE) {

          $this->session->set_flashdata('success', "Berhasil verifikasi berkas pendaftaran {$nama} !!");
          redirect($this->agent->referrer());
      } else {
          $this->session->set_flashdata('error', "Terjadi kesalahan saat verifikasi berkas pendaftaran {$nama}!");
          redirect($this->agent->referrer());
      }
  }

  function tolak_pendaftaranEvent()
  {
      $nama = $this->input->post('NAMA');
      if ($this->M_manage->tolak_pendaftaranEvent() == TRUE) {

          $this->session->set_flashdata('success', "Berhasil menolak berkas pendaftaran {$nama} !!");
          redirect($this->agent->referrer());
      } else {
          $this->session->set_flashdata('error', "Terjadi kesalahan saat menolak berkas pendaftaran {$nama}!");
          redirect($this->agent->referrer());
      }
  }
  // END PROSES
}
