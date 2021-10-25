<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pendaftaran extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function cek_pendaftaranStatus($kode){
		$query 	= $this->db->get_where("tb_kompetisi", array('KODE_KOMPETISI' => $kode));
		if ($query->row()->STATUS_KOMPETISI == 1) {
			return true;
		}else{
			return false;
		}
	}

    // get daftar bidang lomba
    public function get_bidangLomba($kode){
        $query = $this->db->get_where('bidang_lomba', array('KODE_KOMPETISI' => $kode));
        if ($query->num_rows() > 0) {
            return $query->result();
        }else{
            return false;
        }
    }

	function get_kegiatan($kode){
		$kode 	= $this->db->escape($kode);
		$query 	= $this->db->query("SELECT a.JUDUL, a.TANGGAL, a.BAYAR, a.BANK, a.NO_REK, 'event' as 'KEGIATAN' FROM TB_EVENT a WHERE a.KODE_EVENT = $kode UNION ALL SELECT b.JUDUL, b.TANGGAL, b.BAYAR, b.BANK, b.NO_REK, 'kompetisi' as 'KEGIATAN' FROM TB_KOMPETISI b WHERE b.KODE_KOMPETISI = $kode ");
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	function get_kegiatanTiket($kode){
		$kode 	= $this->db->escape($kode);
		$query 	= $this->db->query("SELECT * FROM TB_TIKET WHERE KODE = $kode ");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	function cek_dataPeserta($id, $kode){
		$kode 	= $this->db->escape($kode);
		$id 	= $this->db->escape($id);
		$query 	= $this->db->query("SELECT KODE_PENDAFTARAN as KODE, STATUS FROM pendaftaran_event WHERE KODE_EVENT = $id AND KODE_USER = $kode");
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	function cek_dataPesertaKompetisi($kode, $tabel){
		$kode 	= $this->db->escape($kode);
		// $id 	= $this->db->escape($id);
		$query 	= $this->db->query("SELECT KODE_PENDAFTARAN as KODE, STATUS FROM {$tabel} WHERE KODE_USER = $kode");
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function get_ptsAll($search = null){
		$querSearch = "";
		if($search != null){
			$querSearch = "WHERE namapt LIKE '%$search%' OR kodept LIKE '%$search%' AND kodept != 000001";
		}

        $query  = $this->db->query("SELECT kodept,namapt FROM pt $querSearch LIMIT 20");
        $result = $query->result();
        return $result;
	}
	
	function get_formMeta($kode){
		$this->db->where('KODE', $kode);
		$query = $this->db->get("FORM_META");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	function get_formItem($kode){
		$query = $this->db->get_where("FORM_ITEM", array('ID_FORM' => $kode));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	function cek_kodeDaftar($kode){
		$query = $this->db->query("SELECT * FROM (SELECT KODE_PENDAFTARAN FROM PENDAFTARAN_EVENT UNION SELECT KODE_PENDAFTARAN FROM PENDAFTARAN_KOMPETISI) U WHERE U.KODE_PENDAFTARAN = '$kode'");

		return $query->num_rows();
	}

	function insert_pendaftaran($data, $tabel){
		$this->db->insert($tabel, $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function insert_jawaban($data){
		$this->db->insert('PENDAFTARAN_DATA', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function delete_pendaftaran($kode, $tabel){
		$this->db->where('KODE_PENDAFTARAN', $kode);
		$this->db->delete($tabel);
		return ($this->db->affected_rows() != 1) ? false : true;
	}
}
