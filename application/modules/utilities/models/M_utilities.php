<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_utilities extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function c_penyelenggara(){
		return $this->db->get_where("TB_PENYELENGGARA", array('STATUS' => 1))->num_rows();
	}

	function c_kegiatan(){
		return $this->db->query("SELECT a.KODE_EVENT as KODE FROM TB_EVENT a UNION SELECT b.KODE_KOMPETISI as KODE FROM TB_KOMPETISI b")->num_rows();
	}

	function c_pengguna(){
		return $this->db->get_where("TB_AUTH", array('ROLE' => 1))->num_rows();
	}

}
