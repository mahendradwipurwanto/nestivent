<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pungguna extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function cek_aktivasi($kode_user){
		$query = $this->db->query("SELECT * FROM TB_TOKEN WHERE KODE = '$kode_user' AND TYPE = 1");
		if ($query->num_rows() > 0) {
			return $query->row();
		}else {
			return false;
		}
	}

	// NOTIFIKASI

	public function countAllNotifikasi($kode_user){
		$query = $this->db->query("SELECT a.*, b.TYPE as TYPE_DESC FROM log_aktivitas a JOIN log_type b ON a.TYPE = b.ID_TYPE WHERE KODE_USER = '$kode_user'");
		return $query->num_rows();
	}

	public function get_AllNotifikasi($kode_user, $limit, $start){
		$query = $this->db->query("SELECT a.*, b.TYPE as TYPE_DESC FROM log_aktivitas a JOIN log_type b ON a.TYPE = b.ID_TYPE WHERE KODE_USER = '$kode_user' ORDER BY a.LOG_TIME DESC LIMIT $start, $limit");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	public function get_notifikasi($kode_user){
		$query = $this->db->query("SELECT a.*, b.TYPE as TYPE_DESC FROM log_aktivitas a JOIN log_type b ON a.TYPE = b.ID_TYPE WHERE KODE_USER = '$kode_user' ORDER BY a.LOG_TIME DESC LIMIT 5");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	// PENGGUNA
	public function get_userDetail($kode_user){
		$kode_user	= $this->db->escape($kode_user);

		$query			= $this->db->query("SELECT a.*, b.EMAIL, b.NONAKTIF, b.DEADLINE FROM TB_PENGGUNA a LEFT JOIN TB_AUTH b ON a.KODE_USER = b.KODE_USER WHERE a.KODE_USER = $kode_user");
		if ($query->num_rows() > 0) {
			return $query->row();
		}else {
			return false;
		}
	}


	// PROSES

	function ubah_profil($kode_user){

		$nama        	= htmlspecialchars($this->input->post('nama'), true);
		$jk   				= htmlspecialchars($this->input->post('jk'), true);
		$hp   				= htmlspecialchars($this->input->post('hp'), true);
		$alamat     	= htmlspecialchars($this->input->post('alamat'), true);
		$instagram   	= htmlspecialchars($this->input->post('instagram'), true);
		$instansi     = htmlspecialchars($this->input->post('instansi'), true);
		$jabatan   		= htmlspecialchars($this->input->post('jabatan'), true);

		if ($jabatan == 3) {
			$jabatan = htmlspecialchars($this->input->post('lainnya'), true);
			$jabatan = "3|".$jabatan;
		}

		$data = array(
			'NAMA'  			=> $nama,
			'JK'  				=> $jk,
			'HP' 					=> $hp,
			'ALAMAT'			=> $alamat,
			'INSTAGRAM'		=> $instagram,
			'INSTANSI'		=> $instansi,
			'JABATAN'			=> $jabatan
		);

		$this->db->where('KODE_USER', $kode_user);
		$this->db->update('TB_PENGGUNA', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function hapus_akun($kode_user, $deadline){
		$this->db->where('KODE_USER', $kode_user);
		$this->db->update('TB_AUTH', array('NONAKTIF' => 1, 'DEADLINE' => $deadline));
		$cek = ($this->db->affected_rows() != 1) ? false : true;

		$nama = $this->session->userdata('nama');
		$date = date("d F Y - H:i");

		if ($cek == true) {
			$data = array(
				'KODE_USER' => $kode_user,
				'TYPE' 			=> 6,
				'AKTIVITAS' => "PENGHAPUSAN AKUN {$nama} PADA: {$date}",
			);
			$this->db->insert('LOG_AKTIVITAS', $data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}else {
			return false;
		}
	}

	function batal_hapus(){

		$kode_user 	= $this->session->userdata('kode_user');
		$nama 			= $this->session->userdata('nama');

		$this->db->where('KODE_USER', $kode_user);
		$this->db->update('TB_AUTH', array('NONAKTIF' => 0, 'DEADLINE' => null));
		$cek 				= ($this->db->affected_rows() != 1) ? false : true;

		if ($cek == true) {
			$data = array(
				'KODE_USER' => $kode_user,
				'TYPE' 			=> 7,
				'AKTIVITAS' => "PEMBATALAN PROSES PENGHAPUSAN AKUN {$nama}",
			);
			$this->db->insert('LOG_AKTIVITAS', $data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}else {
			return false;
		}
	}
}
