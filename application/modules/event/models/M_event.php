<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_event extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function count_event(){
		$query = $this->db->get('TB_EVENT');
		return $query->num_rows();

	}

	function cek_dataPeserta($kode, $id){
		$kode 	= $this->db->escape($kode);
		$id 	= $this->db->escape($id);
		$query 	= $this->db->query("SELECT a.KODE_PENDAFTARAN, a.KODE_EVENT as KODE, a.STATUS, 'event' as 'KEGIATAN' FROM PENDAFTARAN_EVENT a WHERE a.KODE_USER = $kode AND a.KODE_EVENT = $id UNION ALL SELECT b.KODE_PENDAFTARAN, b.KODE_KOMPETISI as KODE, b.STATUS, 'kompetisi' as 'KEGIATAN' FROM PENDAFTARAN_KOMPETISI b WHERE b.KODE_USER = $kode AND b.KODE_KOMPETISI = $id");
		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function get_eventAll(){
		$this->db->select('a.*, b.NAMA, b.LOGO');
		$this->db->from('TB_EVENT a');
		$this->db->join('TB_PENYELENGGARA b', 'a.KODE_PENYELENGGARA = b.KODE_PENYELENGGARA');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	public function get_eventDetail($KODE_EVENT){
		$this->db->select('a.*, b.NAMA, b.KODE_PENYELENGGARA, b.LOGO');
		$this->db->from('TB_EVENT a');
		$this->db->join('TB_PENYELENGGARA b', 'a.KODE_PENYELENGGARA = b.KODE_PENYELENGGARA');
		$this->db->where('a.KODE_EVENT', $KODE_EVENT);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}

	}

	public function get_tiketEvent($KODE_EVENT){
		$this->db->select('*');
		$this->db->from('TB_TIKET');
		$this->db->where(array('TYPE' => 1, 'KODE' => $KODE_EVENT));
		$this->db->order_by('HARGA_TIKET', 'ASC');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	public function get_tiketRange($KODE_EVENT){
		$this->db->select('min(HARGA_TIKET) as low, max(HARGA_TIKET) as high');
		$this->db->from('TB_TIKET');
		$this->db->where(array('TYPE' => 1, 'KODE' => $KODE_EVENT));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}

	}

	public function get_sosmedEvent($KODE_EVENT){
		$this->db->select('*');
		$this->db->from('TB_SOSMED');
		$this->db->where(array('TYPE' => 1, 'KODE' => $KODE_EVENT));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	public function get_contactEvent($KODE_EVENT){
		$this->db->select('*');
		$this->db->from('TB_CONTACT_PERSON');
		$this->db->where(array('TYPE' => 1, 'KODE' => $KODE_EVENT));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}
}
