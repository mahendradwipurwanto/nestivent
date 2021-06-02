<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_template extends CI_Model {
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
