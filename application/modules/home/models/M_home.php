<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function get_eventAll(){
		$query = $this->db->query("SELECT a.KODE_EVENT as KODE, a.JUDUL, a.TANGGAL, 'kegiatan' FROM TB_EVENT a UNION SELECT b.KODE_KOMPETISI as KODE, b.JUDUL, b.TANGGAL, 2 FROM TB_KOMPETISI b ORDER BY TANGGAL DESC LIMIT 6");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}
}
