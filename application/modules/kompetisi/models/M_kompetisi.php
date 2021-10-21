<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kompetisi extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function count_kompetisi(){
		$query = $this->db->get('TB_KOMPETISI');
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

	public function get_kompetisiAll(){
		$this->db->select('a.*, b.NAMA, b.LOGO');
		$this->db->from('TB_KOMPETISI a');
		$this->db->join('TB_PENYELENGGARA b', 'a.KODE_PENYELENGGARA = b.KODE_PENYELENGGARA');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	public function get_kompetisiDetail($KODE_KOMPETISI){
		$this->db->select('a.*, b.NAMA, b.KODE_PENYELENGGARA, b.LOGO');
		$this->db->from('TB_KOMPETISI a');
		$this->db->join('TB_PENYELENGGARA b', 'a.KODE_PENYELENGGARA = b.KODE_PENYELENGGARA');
		$this->db->where('a.KODE_KOMPETISI', $KODE_KOMPETISI);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}

	}

	public function get_berkasUnduhan($KODE_KOMPETISI){
		$query = $this->db->get_where('berkas_kebutuhan', array('KODE_KOMPETISI' => $KODE_KOMPETISI));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	public function get_kompetisiBidang($KODE_KOMPETISI){
		$query	= $this->db->get_where('BIDANG_LOMBA', array('KODE_KOMPETISI' => $KODE_KOMPETISI));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_tiketKompetisi($KODE_KOMPETISI){
		$this->db->select('*');
		$this->db->from('TB_TIKET');
		$this->db->where(array('TYPE' => 2, 'KODE' => $KODE_KOMPETISI));
		$this->db->order_by('HARGA_TIKET', 'ASC');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	public function get_tiketRange($KODE_KOMPETISI){
		$this->db->select('min(HARGA_TIKET) as low, max(HARGA_TIKET) as high');
		$this->db->from('TB_TIKET');
		$this->db->where(array('TYPE' => 2, 'KODE' => $KODE_KOMPETISI));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}

	}

	public function get_sosmedKompetisi($KODE_KOMPETISI){
		$this->db->select('*');
		$this->db->from('TB_SOSMED');
		$this->db->where(array('TYPE' => 2, 'KODE' => $KODE_KOMPETISI));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	public function get_contactKompetisi($KODE_KOMPETISI){
		$this->db->select('*');
		$this->db->from('TB_CONTACT_PERSON');
		$this->db->where(array('TYPE' => 2, 'KODE' => $KODE_KOMPETISI));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}
}
