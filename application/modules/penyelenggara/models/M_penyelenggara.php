<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penyelenggara extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function count_BidangLomba($KODE_KOMPETISI){
		$query = $this->db->query("SELECT * FROM BIDANG_LOMBA WHERE KODE_KOMPETISI = '$KODE_KOMPETISI'");
		return $query->num_rows();
	}

	function count_penyelenggara(){
		$query = $this->db->query("SELECT * FROM TB_PENYELENGGARA");
		return $query->num_rows();
	}

	function get_penyelenggara($limit, $start){
		$query = $this->db->query("SELECT * FROM TB_PENYELENGGARA LIMIT $start, $limit");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	function get_featuredPenyelenggara(){
		$query = $this->db->query("SELECT * FROM TB_PENYELENGGARA WHERE FEATURED = 1 LIMIT 4");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	function get_penyelenggaraDetail($kode){
		$kode = $this->db->escape($kode);
		$query = $this->db->query("SELECT a.*, (SELECT COUNT(*) FROM TB_EVENT b WHERE b.KODE_PENYELENGGARA = $kode) as JML_EVENT, (SELECT COUNT(*) FROM TB_KOMPETISI b WHERE b.KODE_PENYELENGGARA = $kode) as JML_KOMPETISI FROM TB_PENYELENGGARA a WHERE a.KODE_PENYELENGGARA = $kode AND a.STATUS = 1");
		if ($query->num_rows() > 0) {
			return $query->row();
		}else {
			return false;
		}
	}

	function get_Eventpenyelenggara($kode){
		$kode = $this->db->escape($kode);
		$query = $this->db->query("SELECT * FROM TB_EVENT WHERE KODE_PENYELENGGARA = $kode");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	function get_Kompetisipenyelenggara($kode){
		$kode = $this->db->escape($kode);
		$query = $this->db->query("SELECT * FROM TB_KOMPETISI WHERE KODE_PENYELENGGARA = $kode");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	function cek_hakPenyelenggara($kode){
		$user 	= $this->session->userdata("email");
		$query 	= $this->db->query("SELECT * FROM TB_KOLABOLATOR WHERE KODE_PENYELENGGARA = '$kode' AND EMAIL = '$user'");
		return $query->num_rows();
	}

	// PROSES

	function laporkan_penyelenggara(){
		$KODE_PENYELENGGARA		= $this->input->post('KODE_PENYELENGGARA');
		$PESAN					= $this->input->post('PESAN');
		
		// TYPE
		// 1. LAPORAN PENYELENGGARA
		$data = array(
			'SENDER' 	=> $this->session->userdata('kode_user'), 
			'MESSAGE' 	=> $PESAN, 
			'TYPE' 		=> 1, 
			'TARGET' 	=> $KODE_PENYELENGGARA,
		);

		$this->db->insert('TB_LAPORAN', $data);
		return ($this->db->affected_rows() != 1) ? false : true;

	}

	function kirimPesan_penyelenggara(){
		$KODE_PENYELENGGARA		= $this->input->post('KODE_PENYELENGGARA');
		$PESAN					= $this->input->post('PESAN');
		
		$data = array(
			'RECEIVER' 	=> $KODE_PENYELENGGARA, 
			'SENDER' 	=> $this->session->userdata('kode_user'), 
			'MESSAGE' 	=> $PESAN, 
		);

		$this->db->insert('TB_PESAN', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
		
	}
}
