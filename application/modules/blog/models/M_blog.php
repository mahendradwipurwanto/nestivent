<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_blog extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	// JENIS
	// 1 ARTIKEL
	// 2 BERITA

	function get_artikelAll($limit, $start){
		$query = $this->db->query("SELECT * JOIN TB_ARTIKEL ORDER BY CREATED_AT DESC LIMIT $start, $limit");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	function get_berita(){
		$query = $this->db->query("SELECT * JOIN TB_ARTIKEL WHERE JENIS 2 ORDER BY CREATED_AT DESC LIMIT 3");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	function get_populer(){
		$query = $this->db->query("SELECT a.*, (SELECT b.COUNT FROM TB_ARTIKEL_VIEWER b WHERE b.KODE_ARTIKEL = a.KODE_ARTIKEL) as VIEWS JOIN TB_ARTIKEL a ORDER BY a.VIEWS DESC LIMIT 3");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	function get_artikel($kode){
		$query = $this->db->get_where("TB_ARTIKEL", array("KODE_ARTIKEL" => $kode));
		if ($query->num_rows() > 0) {
			return $query->row();
		}else {
			return false;
		}
	}

	function get_tag(){
		$query = $this->db->get_where("TB_ARTIKEL_TAG", array("KODE_ARTIKEL" => $kode));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	function newsletter(){
		$email	= $this->input->post('email');

		$this->db->insert("TB_NEWSLETTER", array('email' => $email));
		return ($this->db->affected_rows() != 1) ? false : true;
	}
}
