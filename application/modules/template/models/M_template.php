<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_template extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	// NOTIFIKASI

	public function count_notifikasiAdmin(){
		$query = $this->db->query("SELECT * FROM log_aktivitas a JOIN log_type b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 1");
		return $query->num_rows();
	}

	public function count_aktivitasAdmin(){
		$query = $this->db->query("SELECT * FROM log_aktivitas a JOIN log_type b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 0");
		return $query->num_rows();
	}

	public function get_notifikasiAdmin(){
		$query = $this->db->query("SELECT a.*, b.* FROM log_aktivitas a JOIN log_type b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 1 ORDER BY a.CREATED_AT DESC LIMIT 5");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	public function get_aktivitasAdmin(){
		$query = $this->db->query("SELECT a.*, b.* FROM log_aktivitas a JOIN log_type b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 0 ORDER BY a.CREATED_AT DESC LIMIT 8");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	public function get_profil($kode){
		$part	= explode("_", $kode);

		$this->db->select("PROFIL");
		if($part[0] == "USR" || $part[0] == "ADM" || $part[0] == "JRI"):
			$this->db->where("KODE_USER", $kode);
			$sender = $this->db->get("TB_PENGGUNA")->row()->PROFIL;
		elseif($part[0] == "PYL"):
			$this->db->where("KODE_PENYELENGGGARA", $kode);
			$sender = $this->db->get("TB_PENYELENGGGARA")->row()->PROFIL;
		else:
			$sender = "System";
		endif;

		return $sender;
	}

	public function get_sender($kode){

		if ($kode == "System") {
			return "System";
		}else {
			$part	= explode("_", $kode);

			$this->db->select("NAMA");
			if($part[0] == "USR" || $part[0] == "ADM" || $part[0] == "JRI"):
				$this->db->where("KODE_USER", $kode);
				$sender = $this->db->get("TB_PENGGUNA")->row()->NAMA;
			elseif($part[0] == "PYL"):
				$this->db->where("KODE_PENYELENGGGARA", $kode);
				$sender = $this->db->get("TB_PENYELENGGGARA")->row()->NAMA;
			else:
				$sender = "System";
			endif;

			return $sender;
		}
	}

	// END NOTIFIKASI

	public function cek_aktivasi($kode_user){
		$query = $this->db->query("SELECT * FROM TB_TOKEN WHERE KODE = '$kode_user' AND TYPE = 1");
		if ($query->num_rows() > 0) {
			return $query->row();
		}else {
			return false;
		}
	}

	function have_panel($email){
		$email 	= $this->db->escape($email);

		$query	= $this->db->query("SELECT * FROM TB_KOLABOLATOR WHERE EMAIL = $email");

		if ($query->num_rows() > 0) {
			return TRUE;
		}else {
			return FALSE;
		}

	}

	function get_foto($kode_user){
		$kode_user 	= $this->db->escape($kode_user);

		$query	= $this->db->query("SELECT * FROM TB_PENGGUNA WHERE KODE_USER = $kode_user");
		return $query->row();

	}

}
