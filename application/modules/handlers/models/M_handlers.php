<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_handlers extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function log_aktivitasKpanel($KODE_PENYELENGGARA, $KODE_USER, $TYPE, $GROUP){
		$data = array(
			'RECEIVER' 	 	=> $KODE_PENYELENGGARA,
			'SENDER' 		=> $KODE_USER,
			'TYPE'	 		=> $TYPE,
			'RECEIVER_GROUP'=> $GROUP,
		);
		$this->db->insert('LOG_AKTIVITAS', $data);
	}

	public function get_kpanelData($email){
		$this->db->select('*');
		$this->db->from('TB_KOLABOLATOR');
		$this->db->join('TB_PENYELENGGARA', 'TB_KOLABOLATOR.KODE_PENYELENGGARA = TB_PENYELENGGARA.KODE_PENYELENGGARA');
		$this->db->where('email', $email); 
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
		}
		
	}

	public function get_eventData($kode){
		$query = $this->db->get_where('TB_EVENT', array('KODE_EVENT' => $kode));
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
		}
		
	}

	public function get_kompetisiData($kode){
		$query = $this->db->get_where('TB_KOMPETISI', array('KODE_KOMPETISI' => $kode));
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
		}
		
	}
}
