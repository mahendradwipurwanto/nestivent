<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	// COUNTING
	function countPengguna(){
		$query 	= $this->db->query("SELECT * FROM TB_AUTH WHERE ROLE = 1");
		return $query->num_rows();
	}

	function countDiffPengguna(){
		$query 	= $this->db->query("SELECT * FROM TB_AUTH WHERE ROLE = 1 AND JOIN_DATE <= now() - INTERVAL 1 DAY");
		return $query->num_rows();
	}

	function countPenyelenggara(){
		$query 	= $this->db->query("SELECT * FROM TB_PENYELENGGARA");
		return $query->num_rows();
	}

	function countDiffPenyelenggara(){
		$query 	= $this->db->query("SELECT * FROM TB_PENYELENGGARA WHERE MAKE_DATE <= now() - INTERVAL 1 DAY");
		return $query->num_rows();
	}

	function countKompetisi(){
		$query 	= $this->db->query("SELECT * FROM TB_AUTH WHERE ROLE = 1");
		return $query->num_rows();
	}

	function countDiffKompetisi(){
		$query 	= $this->db->query("SELECT * FROM TB_AUTH WHERE ROLE = 1");
		return $query->num_rows();
	}

	function countEvent(){
		$query 	= $this->db->query("SELECT * FROM TB_AUTH WHERE ROLE = 1");
		return $query->num_rows();
	}

	function countDiffEvent(){
		$query 	= $this->db->query("SELECT * FROM TB_AUTH WHERE ROLE = 1");
		return $query->num_rows();
	}

	function countNonPengguna(){
		$query 	= $this->db->query("SELECT * FROM TB_AUTH WHERE ROLE = 1 AND NONAKTIF = 1");
		return $query->num_rows();
	}

	function countDiffNonPengguna(){
		$query 	= $this->db->query("SELECT * FROM TB_AUTH WHERE ROLE = 1 AND NONAKTIF = 1 AND JOIN_DATE <= now() - INTERVAL 8 DAY");
		return $query->num_rows();
	}

	function countNewPengguna(){
		$query 	= $this->db->query("SELECT * FROM TB_AUTH WHERE ROLE = 1 AND JOIN_DATE >= now() - INTERVAL 1 DAY");
		return $query->num_rows();
	}

	function countKPanel(){
		$query 	= $this->db->query("SELECT * FROM TB_KOLABOLATOR WHERE EMAIL IN (SELECT EMAIL FROM TB_AUTH WHERE ROLE = 1)");
		return $query->num_rows();
	}

	function countDiffKPanel(){
		$query 	= $this->db->query("SELECT * FROM TB_KOLABOLATOR WHERE EMAIL IN (SELECT EMAIL FROM TB_AUTH WHERE ROLE = 1) AND KODE_PENYELENGGARA IN(SELECT KODE_PENYELENGGARA FROM TB_PENYELENGGARA WHERE MAKE_DATE <= now() - INTERVAL 1 DAY)");
		return $query->num_rows();
	}

	// PENGGUNA

	function get_pengguna(){
		$query 	= $this->db->query("SELECT * FROM TB_AUTH a JOIN TB_PENGGUNA b ON a.KODE_USER = b.KODE_USER WHERE a.ROLE = 1");
		return $query->result();
	}

	// AKTIVITAS & NOTIFIKASI

	public function count_aktivitasAdmin(){
		$query = $this->db->query("SELECT * FROM log_aktivitas a JOIN log_type b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 0");
		return $query->num_rows();
	}

	public function get_aktivitasAdmin($limit, $start){
		$query = $this->db->query("SELECT a.*, b.* FROM log_aktivitas a JOIN log_type b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 0 ORDER BY a.CREATED_AT DESC LIMIT $start, $limit");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	public function count_notifikasiAdmin(){
		$query = $this->db->query("SELECT * FROM log_aktivitas a JOIN log_type b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 1");
		return $query->num_rows();
	}

	public function get_notifikasiAdmin($limit, $start){
		$query = $this->db->query("SELECT a.*, b.* FROM log_aktivitas a JOIN log_type b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 1 ORDER BY a.CREATED_AT DESC LIMIT $start, $limit");
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

}
