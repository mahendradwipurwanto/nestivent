<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_manageEvent extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	// TYPE CP, SOSMED, TIKET
	// 1. EVENT
	// 2. KOMPETISI

	public function log_aktivitasKpanel($KODE_PENYELENGGARA, $KODE_USER, $TYPE, $GROUP){
		$data = array(
			'RECEIVER' 	 	=> $KODE_PENYELENGGARA,
			'SENDER' 		=> $KODE_USER,
			'TYPE'	 		=> $TYPE,
			'RECEIVER_GROUP'=> $GROUP,
		);
		$this->db->insert('log_aktivitas', $data);
	}

	function cek_hakakses($kode){
		$user 	= $this->session->userdata("email");
		$query 	= $this->db->query("SELECT * FROM TB_KOLABOLATOR WHERE KODE_PENYELENGGARA = '$kode' AND EMAIL = '$user'");
		if ($query->num_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function count_peserta($kode){
		return $this->db->get_where("pendaftaran_event", array('KODE_EVENT' => $kode))->num_rows();
	}

	function count_pesertaVerif($kode){
		return $this->db->get_where("pendaftaran_event", array('KODE_EVENT' => $kode, 'STATUS' => 1))->num_rows();
	}

	// AKTIVITAS & NOTIFIKASI
	public function count_aktivitasEvent($kode_akses){
		$query = $this->db->query("SELECT * FROM log_aktivitas a JOIN log_type b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 0 AND a.RECEIVER_GROUP = 4 AND a.RECEIVER = '$kode_akses'");
		return $query->num_rows();
	}

	public function get_aktivitasEvent($limit, $start, $kode_akses){
		$query = $this->db->query("SELECT a.*, b.* FROM log_aktivitas a JOIN log_type b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 0 AND a.RECEIVER_GROUP = 4 AND a.RECEIVER = '$kode_akses' ORDER BY a.CREATED_AT DESC LIMIT $start, $limit");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	public function count_notifikasiEvent($kode_akses){
		$query = $this->db->query("SELECT * FROM log_aktivitas a JOIN log_type b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 1 AND a.READ = 0 AND a.RECEIVER_GROUP = 4 AND a.RECEIVER = '$kode_akses'");
		return $query->num_rows();
	}

	public function get_notifikasiEvent($limit, $start, $kode_akses){
		$query = $this->db->query("SELECT a.*, b.* FROM log_aktivitas a JOIN log_type b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 1 AND a.RECEIVER_GROUP = 4 AND a.RECEIVER = '$kode_akses' ORDER BY a.CREATED_AT DESC LIMIT $start, $limit");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	// FORMULIR

	function cek_form($kode){
		$query = $this->db->get_where("form_meta", array('KODE' => $kode));
		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	function get_dataPendaftaran($kode){
		$this->db->select("a.*, b.NAMA, b.HP");
		$this->db->from("pendaftaran_event a");
		$this->db->join("tb_pengguna b", "a.KODE_USER = b.KODE_USER");
		$this->db->where("a.KODE_EVENT", $kode);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	function get_pendaftaran_by_kode_pendaftaran($kode_pendaftaran)
	{
			$this->db->select("*");
			$this->db->from("pendaftaran_event a");
			$this->db->join("tb_pengguna b", "a.KODE_USER = b.KODE_USER");
			$this->db->join("tb_auth c", "c.KODE_USER = b.KODE_USER");
			$this->db->where('a.KODE_PENDAFTARAN', $kode_pendaftaran);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
					return $query->row();
			} else {
					return false;
			}
	}

	function cek_hargaTiket($ID_TIKET){
		return $this->db->get_where('tb_tiket', array('ID_TIKET' => $ID_TIKET))->row()->HARGA_TIKET;
	}

	function get_form($kode){
		$query = $this->db->get_where("form_meta", array('KODE' => $kode));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	function get_formItem($kode){
		$query = $this->db->get_where("form_item", array('ID_FORM' => $kode));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	function get_formBerkas($kode){
		$query = $this->db->get_where("form_meta", array('KODE' => $kode, 'TYPE' => 'FILE'));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	function get_formData($kode, $id){
		$query = $this->db->get_where("pendaftaran_data", array('KODE_PENDAFTARAN' => $kode, 'ID_FORM' => $id));
		if ($query->num_rows() > 0) {
			return $query->row()->JAWABAN;
		}else{
			return false;
		}
	}

	function get_formDataBerkas($kode, $id){
		$query = $this->db->get_where("pendaftaran_data", array('KODE_PENDAFTARAN' => $kode, 'ID_FORM' => $id));
		if ($query->num_rows() > 0) {
			return $query->row()->JAWABAN;
		}else{
			return false;
		}
	}

	// PROSES

	function proses_aturPendaftaran($kode){

		$PERTANYAAN   = $this->input->post('PERTANYAAN', true);
		$TYPE         = $this->input->post('TIPE', true);
		$REQUIRED     = $this->input->post('REQUIRED');
		$KETERANGAN   = $this->input->post('KETERANGAN', true);
		$FILE_SIZE    = $this->input->post('FILE_SIZE', true);
		$FILE_TYPE    = $this->input->post('FILE_TYPE', true);
		$ITEM         = $this->input->post('ITEM', true);
		$ITEM_SPLIT   = $this->input->post('ITEM_SPLIT', true);

		$ct = 0;

		foreach ($PERTANYAAN as $i => $a) {
			$data = array(
				'KEGIATAN'      => 1, //1. EVENT, 2. KOMPETISI
				'KODE'          => $kode,
				'PERTANYAAN'    => isset($PERTANYAAN[$i]) ? $PERTANYAAN[$i] : null,
				'TYPE'          => isset($TYPE[$i]) ? $TYPE[$i] : null,
				'REQUIRED'      => isset($REQUIRED[$i]) ? ($REQUIRED[$i] == TRUE ? 1 : 0) : 0,
				'KETERANGAN'    => isset($KETERANGAN[$i]) ? $KETERANGAN[$i] : null,
				'FILE_SIZE'     => isset($FILE_SIZE[$i]) ? $FILE_SIZE[$i] : null,
				'FILE_TYPE'     => isset($FILE_TYPE[$i]) ? $FILE_TYPE[$i] : null,
			);
			$this->db->insert('form_meta', $data);
			$cek    = ($this->db->affected_rows() != 1) ? false : true;

			if ($TYPE[$i] == "RADIO" || $TYPE[$i] == "CHECK" || $TYPE[$i] == "SELECT" && $cek == true) {
				$ID_FORM  = $this->db->insert_id();

				if ($this->input->post('ITEM')) {
					echo var_dump($ITEM_SPLIT);

					for($c=1; $c <= $ITEM_SPLIT[$i]; $c++) {

						$data = array(
							'ID_FORM'     => $ID_FORM,
							'ITEM'        => isset($ITEM[$ct]) ? $ITEM[$ct] : null,
						);
						$this->db->insert('form_item', $data);
						$ct++;
					}
				}
			}

			if ($cek == false) {        
				$this->db->where('KODE', $kode);
				$this->db->delete('form_meta');
				break;
				return false;
			}
		}
		return true;
	}

	function hapus_formPendaftaran($ID_FORM){
		$this->db->where('ID_FORM', $ID_FORM);
		$this->db->delete('form_meta');
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function proses_updatePendaftaran($kode){
		$ID_FORM		= $this->input->post('ID_FORM', true);
		$PERTANYAAN		= $this->input->post('PERTANYAAN', true);
		$TYPE			= $this->input->post('TIPE', true);
		$REQUIRED		= $this->input->post('REQUIRED');
		$KETERANGAN		= $this->input->post('KETERANGAN', true);
		if ($this->input->post('ITEM')) {
			$ID_ITEM	= $this->input->post('ID_ITEM', true);
			$ITEM		= $this->input->post('ITEM', true);
			$ITEM_SPLIT	= $this->input->post('ITEM_SPLIT', true);
		}
		
		// echo var_dump($PERTANYAAN);
		// echo "<br>";
		// echo var_dump($REQUIRED);

		$ct = 0;

		foreach ($PERTANYAAN as $i => $a) {
			$data = array(
					'KEGIATAN' 			=> 1, //1. EVENT, 2. KOMPETISI
					'KODE' 				=> $kode,
					'PERTANYAAN' 		=> isset($PERTANYAAN[$i]) ? $PERTANYAAN[$i] : null,
					'TYPE' 				=> isset($TYPE[$i]) ? $TYPE[$i] : null,
					'REQUIRED' 			=> isset($REQUIRED[$i]) ? ($REQUIRED[$i] == TRUE ? 1 : 0) : 0,
					'KETERANGAN' 		=> isset($KETERANGAN[$i]) ? $KETERANGAN[$i] : null,
				);

			if ($ID_FORM[$i] == "") {
				$this->db->insert('form_meta', $data);

				if ($TYPE[$i] == "RADIO" || $TYPE[$i] == "CHECK" || $TYPE[$i] == "SELECT") {
					$ID_FORM 	= $this->db->insert_id();
					for($c=1; $c <= $ITEM_SPLIT[$i]; $c++) {

						$data = array(
							'ID_FORM' 		=> $ID_FORM,
							'ITEM' 			=> isset($ITEM[$ct]) ? $ITEM[$ct] : null,
						);
						$this->db->insert('form_item', $data);
						$ct++;
					}
				}


			}else{
				$this->db->where('ID_FORM', isset($ID_FORM[$i]) ? $ID_FORM[$i] : null);
				$this->db->update('form_meta', $data);
			}

		}
		return true;
	}

	// END FORMULIR



    function terima_pendaftaranEvent()
    {
        $KODE_USER = $this->input->post('KODE_USER');

        $this->db->where('KODE_USER', $KODE_USER);
        $this->db->update('pendaftaran_event', array('STATUS' => 1));
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function tolak_pendaftaranEvent()
    {
        $KODE_USER = $this->input->post('KODE_USER');

        $this->db->where('KODE_USER', $KODE_USER);
        $this->db->update('pendaftaran_event', array('STATUS' => 2));
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
