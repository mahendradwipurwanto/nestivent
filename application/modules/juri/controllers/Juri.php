<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Juri extends MX_Controller {
	public function __construct(){
		parent::__construct();
		if ($this->agent->is_mobile()) {
			$this->session->set_flashdata('error', "Halaman penjurian hanya dapat diakses melalui dekstop browser");
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
		if ($this->session->userdata("role") != 2 && $this->session->userdata("role") != 0 && $this->session->userdata("role") != 4) {
			$this->session->set_flashdata('error', "Mohon maaf hak akses anda bukan juri");
			redirect(base_url());
		}
		$this->load->model('M_juri');
		$this->load->model('Admin/M_admin');
// 		$this->load->model('Manage_kompetisi/M_manageKompetisi', 'M_manage');
	}

	function get_karyaTim($kode){
		$karya = $this->M_juri->get_karyaTim($kode);
		if ($karya == false) {
			$this->load->view('ajax/karya_404');
		}else{
			$data['berkas']	= $karya;
			$this->load->view('ajax/karya_tim', $data);
		}
	}

	function get_detailTim($kode){
		$karya = $this->M_juri->get_karyaTim($kode);
		$nilai = $this->M_juri->get_riwayatNilai($this->tahap_aktif(1), $kode);
		if ($karya != false || !empty($karya->FILE)) {
			$data['berkas']			= $karya;
			$data['status_nilai']	= $nilai;
			$this->load->view('ajax/karya_detail', $data);
		}
	}

	function get_riwayatNilai($kode){
		$nilai = $this->M_juri->get_riwayatNilai($this->tahap_aktif(1), $kode);
			$data['KODE_PENDAFTARAN'] = $kode;
		if ($nilai == false) {
			$data['dataKriteria']   = $this->M_juri->get_kriteriaPenilaian($this->tahap_aktif(1), $this->bidang_juri(1));
			$this->load->view('ajax/lembar_nilai', $data);
		}else{
			$data['nilai']	= $nilai;
			$this->load->view('ajax/riwayatNilai_tim', $data);
		}
	}

	function bidang_juri($param = 1){

		$juri = $this->M_juri->get_dataJuri($this->session->userdata('kode_user'));

		switch ($param) {

			// GET ID BIDANG LOMBA JURI
			case 1:
			return $juri->ID_BIDANG;
			break;

			// GET NAMA BIDANG LOMBA JURI
			case 2:
			return $juri->BIDANG_LOMBA;
			break;

			// GET JURI KODE KOMPETISI
			case 3:
			return $juri->KODE_KOMPETISI;
			break;
			
			default:
			return "Terjadi Masalah, saat mengambil data juri!!";
			break;
		}
	}

	function tahap_aktif($param = 1){

		$tahap = $this->M_juri->get_tahapPenilaian($this->bidang_juri(3));
		if ($tahap != false) {
			switch ($param) {

				// GET ID TAHAP AKIF
				case 1:
				return $tahap->ID_TAHAP;
				break;

				// GET NAMA TAHAP AKIF
				case 2:
				return $tahap->NAMA_TAHAP;
				break;
				
				default:
				return "Terjadi Masalah, saat mengambil tahap aktif!!";
				break;
			}
		}else{
			return 10;
		}
	}

	function count_totalNilai(){

		if($this->input->post('ID_KRITERIA')){
			$total	= 0;

			$id_kriteria 	= $this->input->post('ID_KRITERIA', true);
			$bobot 			= $this->input->post('BOBOT', true);
			$nilai 			= $this->input->post('NILAI', true);

			foreach ($id_kriteria as $i => $a) {
				$total = $total+($bobot[$i]*$nilai[$i]/100);
			}
			echo number_format($total,2);
		}

	}

	public function index(){
		$data['tahap']			= $this->M_juri->get_tahapPenilaian($this->bidang_juri(3));
		$data['tim']			= $this->M_juri->get_countTIM($this->tahap_aktif(1), $this->bidang_juri(1), $this->session->userdata('kode_user'));
		$data['pedoman']		= $this->M_juri->get_pedoman();
		$data['controller']				= $this;
		// echo "test";
		$data['module'] 	= "juri";
		$data['fileview'] 	= "dashboard";
		echo Modules::run('template/backend_main', $data);
	}

	public function penilaian(){
		if ($this->agent->is_mobile()) {
			$this->session->set_flashdata('warning', "Penilaian hanya dapat dilakukan melalui dekstop browser");
			redirect(base_url());
		}else{
			$data['tahap']			= $this->M_juri->get_tahapPenilaian($this->bidang_juri(3));
			$data['bidang_juri']    = $this->tahap_aktif(2);
			$data['dataKriteria']   = $this->M_juri->get_kriteriaPenilaian($this->tahap_aktif(1), $this->bidang_juri(1));
			$data['tim']			= $this->M_juri->get_countTIM($this->tahap_aktif(1), $this->bidang_juri(1), $this->session->userdata('kode_user'));

			$data['daftar_tim']		= $this->M_juri->get_dataTIM($this->tahap_aktif(1), $this->bidang_juri(1), $this->session->userdata('kode_user'));

			$data['daftar_timSudah']		= $this->M_juri->get_timRiwayat($this->tahap_aktif(1), $this->bidang_juri(1), $this->session->userdata('kode_user'));

			$data['controller']				= $this;

			$data['module'] 		= "juri";
			$data['fileview'] 		= "new_penilaian";
			echo Modules::run('template/backend_main', $data);
		}
	}

	public function hasil_penilaian($tahap = 0){

				$data['tahap']				= $this->M_juri->get_tahapPenilaianAll($this->bidang_juri(3));
        $bidang_lomba 				= $this->M_juri->get_bidangLomba_by_id($this->bidang_juri(1));
        $tahap_penilaian 			= $this->M_juri->get_tahapLomba_by_id($tahap);

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
        $data['id_bidang'] 	= $this->bidang_juri(1);

		$data['tim']		= $this->M_juri->get_hasilPenilaian($tahap, $this->bidang_juri(1));

        $data['controller']			= $this;

		$data['module']     = "juri";
		$data['fileview']   = "hasil_penilaian";
		echo Modules::run('template/backend_main', $data);
	}

	public function riwayat_penilaian(){
		if ($this->agent->is_mobile()) {
			$this->session->set_flashdata('warning', "Penilaian hanya dapat dilakukan melalui dekstop browser");
			redirect(base_url());
		}else{
			$data['dataKriteria']   = $this->M_juri->get_kriteriaPenilaian($this->tahap_aktif(1), $this->bidang_juri(1));
			$data['tim']			= $this->M_juri->get_countTIM($this->tahap_aktif(1), $this->bidang_juri(1), $this->session->userdata('kode_user'));
			$data['tim']			= $this->M_juri->get_countTIM($this->tahap_aktif(1), $this->bidang_juri(1), $this->session->userdata('kode_user'));
			$data['bidang_juri']    = $this->tahap_aktif(2);

			$data['daftar_tim']		= $this->M_juri->get_timRiwayat($this->tahap_aktif(1), $this->bidang_juri(1), $this->session->userdata('kode_user'));

			$data['controller']				= $this;

			$data['tahap']			= $this->M_juri->get_tahapPenilaianAll($this->bidang_juri(3));
	        $data['id_tahap'] 		= $this->tahap_aktif(1);
	        $data['id_bidang'] 		= $this->bidang_juri(1);

			$data['module'] 		= "juri";
			$data['fileview'] 		= "new_riwayat_penilaian";
			echo Modules::run('template/backend_main', $data);
		}
	}

	// PROSES

	function submit_nilai(){
		if ($this->M_juri->submit_nilai($this->tahap_aktif(1), $this->session->userdata('kode_user')) == TRUE) {
			$this->session->set_flashdata('success', "Berhasil mengirim data nilai anda !!");
			redirect(site_url('juri/penilaian'));
		} else {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat mengirim data nilai anda!!");
			redirect($this->agent->referrer());
		}
	}

	function edit_nilai(){
		if ($this->M_juri->edit_nilai() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil mengubah data nilai anda !!");
			redirect($this->agent->referrer());
		} else {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah data nilai anda!!");
			redirect($this->agent->referrer());
		}
	}

	// HASIL PENILAIAN
	function get_tahapLomba_by_id($id_tahap){
		$query = $this->db->get_where('tahap_penilaian', array('ID_TAHAP' => $id_tahap));
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}
	}
	function get_hasilPenilaian($id_tahap, $id_bidang){
		// case
		// 1. Berdasarkan nilai tertinggi (sudah ada data penilaian) / berdasarkan id tahap
		$this->db->select('*');
		$this->db->from('v_penilaian');
		
		if ($id_bidang != 0) {
			$this->db->where('ID_BIDANG', $id_bidang);
		}
		
		if ($id_tahap != 0) {
			$this->db->where('TAHAP', $id_tahap);
		}
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

}?>
