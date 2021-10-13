<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_manageKompetisi extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	// TYPE CP, SOSMED, TIKET
	// 1. KOMPETISI
	// 2. KOMPETISI

	public function log_aktivitasKpanel($KODE_PENYELENGGARA, $KODE_USER, $TYPE, $GROUP){
		$data = array(
			'RECEIVER' 	 	=> $KODE_PENYELENGGARA,
			'SENDER' 		=> $KODE_USER,
			'TYPE'	 		=> $TYPE,
			'RECEIVER_GROUP'=> $GROUP,
		);
		$this->db->insert('LOG_AKTIVITAS', $data);
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
		return $this->db->get_where("PENDAFTARAN_KOMPETISI", array('KODE_KOMPETISI' => $kode))->num_rows();
	}

	function count_pesertaVerif($kode){
		return $this->db->get_where("PENDAFTARAN_KOMPETISI", array('KODE_KOMPETISI' => $kode, 'STATUS' => 1))->num_rows();
	}

	// AKTIVITAS & NOTIFIKASI
	public function count_aktivitasKompetisi($kode_akses){
		$query = $this->db->query("SELECT * FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 0 AND a.RECEIVER_GROUP = 4 AND a.RECEIVER = '$kode_akses'");
		return $query->num_rows();
	}

	public function get_aktivitasKompetisi($limit, $start, $kode_akses){
		$query = $this->db->query("SELECT a.*, b.* FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 0 AND a.RECEIVER_GROUP = 4 AND a.RECEIVER = '$kode_akses' ORDER BY a.CREATED_AT DESC LIMIT $start, $limit");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	public function count_notifikasiKompetisi($kode_akses){
		$query = $this->db->query("SELECT * FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 1 AND a.READ = 0 AND a.RECEIVER_GROUP = 4 AND a.RECEIVER = '$kode_akses'");
		return $query->num_rows();
	}

	public function get_notifikasiKompetisi($limit, $start, $kode_akses){
		$query = $this->db->query("SELECT a.*, b.* FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 1 AND a.RECEIVER_GROUP = 4 AND a.RECEIVER = '$kode_akses' ORDER BY a.CREATED_AT DESC LIMIT $start, $limit");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	//BIDANG LOMBA
	function get_bidangLomba($kode_kompetisi){
		$query	= $this->db->get_where('BIDANG_LOMBA', array('KODE_KOMPETISI' => $kode_kompetisi));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	function tambah_bidangLomba($kode_kompetisi){
		$BIDANG_LOMBA 	= htmlspecialchars($this->input->post('BIDANG_LOMBA'), true);
		$TEAM 			= $this->input->post('TEAM');
		$MIN_ANGGOTA 	= htmlspecialchars($this->input->post('MIN_ANGGOTA'), true);
		$MAX_ANGGOTA 	= htmlspecialchars($this->input->post('MAX_ANGGOTA'), true);
		$KETERANGAN 	= htmlspecialchars($this->input->post('KETERANGAN'), true);

		$data = array(
			'KODE_KOMPETISI'=> $kode_kompetisi,
			'TEAM'			=> ($TEAM == true ? 1 : 0),
			'MIN_ANGGOTA'	=> ($TEAM == true ? $MIN_ANGGOTA : null),
			'MAX_ANGGOTA'	=> ($TEAM == true ? $MAX_ANGGOTA : null),
			'BIDANG_LOMBA' 	=> $BIDANG_LOMBA,
			'KETERANGAN' 	=> $KETERANGAN,
		);
		$this->db->insert('BIDANG_LOMBA', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function edit_bidangLomba(){
		$ID_BIDANG 		= $this->input->post('ID_BIDANG');

		$BIDANG_LOMBA 	= htmlspecialchars($this->input->post('BIDANG_LOMBA'), true);
		$TEAM 			= $this->input->post('TEAM');
		$MIN_ANGGOTA 	= htmlspecialchars($this->input->post('MIN_ANGGOTA'), true);
		$MAX_ANGGOTA 	= htmlspecialchars($this->input->post('MAX_ANGGOTA'), true);
		$KETERANGAN 	= htmlspecialchars($this->input->post('KETERANGAN'), true);

		$data = array(
			'BIDANG_LOMBA' 	=> $BIDANG_LOMBA,
			'TEAM'			=> ($TEAM == true ? 1 : 0),
			'MIN_ANGGOTA'	=> ($TEAM == true ? $MIN_ANGGOTA : null),
			'MAX_ANGGOTA'	=> ($TEAM == true ? $MAX_ANGGOTA : null),
			'KETERANGAN' 	=> $KETERANGAN,
		);

		$this->db->where('ID_BIDANG', $ID_BIDANG);
		$this->db->update('BIDANG_LOMBA', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function hapus_bidangLomba(){
		$ID_BIDANG 		= $this->input->post('ID_BIDANG');

		$this->db->where('ID_BIDANG', $ID_BIDANG);
		$this->db->delete('BIDANG_LOMBA');
		return ($this->db->affected_rows() != 1) ? false : true;

	}

	//DATA JURI
	function get_dataJuri($kode_kompetisi){
		$query = $this->db->query("SELECT a.*, b.NAMA, b.HP FROM TB_AUTH a JOIN TB_PENGGUNA b ON a.KODE_USER = b.KODE_USER WHERE a.ROLE = 2 AND a.KODE_USER IN (SELECT KODE_USER FROM BIDANG_JURI WHERE ID_BIDANG IN (SELECT ID_BIDANG FROM BIDANG_LOMBA WHERE KODE_KOMPETISI = '$kode_kompetisi'))");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}
	function get_bidangJuri($kode_user){
		$this->db->select('a.ID, a.ID_BIDANG, b.BIDANG_LOMBA');
		$this->db->from('BIDANG_JURI a');
		$this->db->join('BIDANG_LOMBA b', 'a.ID_BIDANG = b.ID_BIDANG');
		$query = $this->db->get_where('BIDANG_JURI', array('a.KODE_USER' => $kode_user));
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function cek_kodeUser($kode_user){
		$kode_user 	= $this->db->escape($kode_user);
		$query 		= $this->db->query("SELECT * FROM TB_AUTH WHERE KODE_USER = $kode_user");
		return $query->num_rows();
	}

	public function del_user($kode_user){
		$kode_user 			= $this->db->escape($kode_user);
		$this->db->where('KODE_USER', $kode_user);
		$this->db->delete('TB_AUTH');
	}

	function tambah_juri(){
		$NAMA_JURI 		= htmlspecialchars($this->input->post('NAMA_JURI'), true);
		$EMAIL 			= htmlspecialchars($this->input->post('EMAIL'), true);
		$HP 			= htmlspecialchars($this->input->post('HP'), true);
		$PASSWORD 		= htmlspecialchars($this->input->post('PASSWORD'), true);
		$BIDANG_JURI 	= htmlspecialchars($this->input->post('BIDANG_JURI'), true);

		// CREATE UNIQ NAME KODE USER

		$string = preg_replace('/[^a-z]/i', '', $NAMA_JURI);

		$vocal  = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", " ");
		$scrap  = str_replace($vocal, "", $string);
		$begin  = substr($scrap, 0, 4);
		$uniqid	= strtoupper($begin);

		// CREATE KODE USER
		do {
			$KODE_USER 			= "JRI_".$uniqid.substr(md5(time()), 0, 3);
		} while ($this->cek_kodeUser($KODE_USER) > 0);

		$data = array(
			'KODE_USER'		=> $KODE_USER,
			'EMAIL'			=> $EMAIL,
			'PASSWORD'		=> password_hash($PASSWORD, PASSWORD_DEFAULT),
			'ROLE'			=> 2,
		);
		$this->db->insert('TB_AUTH', $data);

		if ($this->db->affected_rows() == true) {

			$pengguna = array(
				'KODE_USER' 		=> $KODE_USER,
				'NAMA'  			=> $NAMA_JURI,
				'HP' 				=> $HP,
			);

			$this->db->insert('TB_PENGGUNA', $pengguna);

			if ($this->db->affected_rows() == true) {

				$bidang = array(
					'KODE_USER' 		=> $KODE_USER,
					'ID_BIDANG'  		=> $BIDANG_JURI,
				);

				$this->db->insert('BIDANG_JURI', $bidang);
				return ($this->db->affected_rows() != 1) ? false : true;

			}else{
				$this->del_user($KODE_USER);
				return false;
			}
			
		}else{
			$this->del_user($KODE_USER);
			return false;
		}
	}

	function edit_juri(){
		$ID 			= htmlspecialchars($this->input->post('ID'), true);
		$KODE_USER 		= htmlspecialchars($this->input->post('KODE_USER'), true);

		$NAMA_JURI 		= htmlspecialchars($this->input->post('NAMA_JURI'), true);
		$EMAIL 			= htmlspecialchars($this->input->post('EMAIL'), true);
		$HP 			= htmlspecialchars($this->input->post('HP'), true);
		$PASSWORD 		= htmlspecialchars($this->input->post('PASSWORD'), true);
		$BIDANG_JURI 	= htmlspecialchars($this->input->post('BIDANG_JURI'), true);


		$data = array(
			'EMAIL'			=> $EMAIL,
			'PASSWORD'		=> password_hash($PASSWORD, PASSWORD_DEFAULT),
		);

		$this->db->where('KODE_USER', $KODE_USER);
		$this->db->update('TB_AUTH', $data);

		$pengguna = array(
			'NAMA'  			=> $NAMA_JURI,
			'HP' 				=> $HP,
		);

		$this->db->where('KODE_USER', $KODE_USER);
		$this->db->update('TB_PENGGUNA', $pengguna);

		$bidang = array(
			'ID_BIDANG'  		=> $BIDANG_JURI,
		);

		$this->db->where('ID', $ID);
		$this->db->update('BIDANG_JURI', $bidang);
		return true;
	}

	function hapus_juri(){
		$ID 			= $this->input->post('ID');
		$KODE_USER 		= $this->input->post('KODE_USER');

		$this->db->where('ID', $ID);
		$this->db->delete('BIDANG_JURI');

		$this->db->where('KODE_USER', $KODE_USER);
		$this->db->delete('TB_AUTH');
		return ($this->db->affected_rows() != 1) ? false : true;

	}

	//TAHAP PENILAIAN
	function get_tahapPenilaian($kode_kompetisi){
		$query	= $this->db->get_where('TAHAP_PENILAIAN', array('KODE_KOMPETISI' => $kode_kompetisi));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	function tambah_tahap($kode_kompetisi){
		$NAMA_TAHAP 		= htmlspecialchars($this->input->post('NAMA_TAHAP'), true);
		$KETERANGAN 		= htmlspecialchars($this->input->post('KETERANGAN'), true);
		$TANGGAL_MULAI 		= htmlspecialchars($this->input->post('TANGGAL_MULAI'), true);
		$WAKTU_MULAI 		= htmlspecialchars($this->input->post('WAKTU_MULAI'), true);
		$TANGGAL_BERAKHIR 	= htmlspecialchars($this->input->post('TANGGAL_BERAKHIR'), true);
		$WAKTU_BERAKHIR 	= htmlspecialchars($this->input->post('WAKTU_BERAKHIR'), true);
		$TEAM 				= htmlspecialchars($this->input->post('TEAM'), true);

		$data = array(
			'KODE_KOMPETISI'	=> $kode_kompetisi,
			'NAMA_TAHAP'		=> $NAMA_TAHAP,
			'KETERANGAN'		=> $KETERANGAN,
			'DATE_START'		=> $TANGGAL_MULAI,
			'TIME_START'		=> $WAKTU_MULAI,
			'DATE_END'			=> $TANGGAL_BERAKHIR,
			'TIME_END'			=> $WAKTU_BERAKHIR,
			'TEAM'				=> $TEAM,
		);
		$this->db->insert('TAHAP_PENILAIAN', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function edit_tahap(){
		$ID_TAHAP 			= $this->input->post('ID_TAHAP');

		$NAMA_TAHAP 		= htmlspecialchars($this->input->post('NAMA_TAHAP'), true);
		$KETERANGAN 		= htmlspecialchars($this->input->post('KETERANGAN'), true);
		$TANGGAL_MULAI 		= htmlspecialchars($this->input->post('TANGGAL_MULAI'), true);
		$WAKTU_MULAI 		= htmlspecialchars($this->input->post('WAKTU_MULAI'), true);
		$TANGGAL_BERAKHIR 	= htmlspecialchars($this->input->post('TANGGAL_BERAKHIR'), true);
		$WAKTU_BERAKHIR 	= htmlspecialchars($this->input->post('WAKTU_BERAKHIR'), true);
		$TEAM 				= htmlspecialchars($this->input->post('TEAM'), true);

		$data = array(
			'NAMA_TAHAP'		=> $NAMA_TAHAP,
			'KETERANGAN'		=> $KETERANGAN,
			'DATE_START'		=> $TANGGAL_MULAI,
			'TIME_START'		=> $WAKTU_MULAI,
			'DATE_END'			=> $TANGGAL_BERAKHIR,
			'TIME_END'			=> $WAKTU_BERAKHIR,
			'TEAM'				=> $TEAM,
		);

		$this->db->where('ID_TAHAP', $ID_TAHAP);
		$this->db->update('TAHAP_PENILAIAN', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function hapus_tahap(){
		$ID_TAHAP 		= $this->input->post('ID_TAHAP');

		$this->db->where('ID_TAHAP', $ID_TAHAP);
		$this->db->delete('TAHAP_PENILAIAN');
		return ($this->db->affected_rows() != 1) ? false : true;

	}

	//KRITERIA PENILAIAN

	function cek_kriteriaAtur($id_tahap, $id_bidang){
		return $this->db->get_where('KRITERIA_PENILAIAN', array('ID_TAHAP' => $id_tahap, 'ID_BIDANG' => $id_bidang))->num_rows();
	}

	function get_kriteriaPenilaian($id_tahap, $id_bidang){
		$query	= $this->db->get_where('KRITERIA_PENILAIAN', array('ID_TAHAP' => $id_tahap, 'ID_BIDANG' => $id_bidang));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}
	function get_bidangKriteria($id_tahap){
		$query	= $this->db->get_where('BIDANG_LOMBA', array('KODE_KOMPETISI' => $kode_kompetisi));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	function tambah_kriteria($id_tahap, $id_bidang){
		$KRITERIA 		= $this->input->post('KRITERIA', true);
		$BOBOT 			= $this->input->post('BOBOT', true);
		$KETERANGAN 	= $this->input->post('KETERANGAN', true);

		if (!empty($KRITERIA) && isset($KRITERIA)) {
			foreach ($KRITERIA as $i => $a) {
				$data = array(
					'ID_TAHAP'		=> isset($KRITERIA[$i]) ? $id_tahap : '',
					'ID_BIDANG' 	=> isset($KRITERIA[$i]) ? $id_bidang : '',
					'KRITERIA'		=> isset($KRITERIA[$i]) ? $KRITERIA[$i] : '',
					'BOBOT'			=> isset($BOBOT[$i]) ? $BOBOT[$i] : '',
					'KETERANGAN'	=> isset($KETERANGAN[$i]) ? $KETERANGAN[$i] : '',
				);
				$this->db->insert('KRITERIA_PENILAIAN', $data);
			}
			return ($this->db->affected_rows() != 1) ? false : true;
		}else{
			return false;
		}
	}

	function edit_kriteria(){
		$ID_KRITERIA 		= $this->input->post('ID_KRITERIA');

		$KRITERIA 		= htmlspecialchars($this->input->post('KRITERIA'), true);
		$BOBOT 			= htmlspecialchars($this->input->post('BOBOT'), true);
		$KETERANGAN 	= htmlspecialchars($this->input->post('KETERANGAN'), true);

		$data = array(
			'KRITERIA'		=> $KRITERIA,
			'BOBOT'			=> $BOBOT,
			'KETERANGAN'	=> $KETERANGAN,
		);

		$this->db->where('ID_KRITERIA', $ID_KRITERIA);
		$this->db->update('KRITERIA_PENILAIAN', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function hapus_kriteria(){
		$ID_KRITERIA 		= $this->input->post('ID_KRITERIA');

		$this->db->where('ID_KRITERIA', $ID_KRITERIA);
		$this->db->delete('KRITERIA_PENILAIAN');
		return ($this->db->affected_rows() != 1) ? false : true;

	}

	// FORMULIR

	function cek_form($kode){
		$query = $this->db->get_where("FORM_META", array('KODE' => $kode));
		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	function get_dataPendaftaran($kode){
		$this->db->select("a.*, b.NAMA");
		$this->db->from("PENDAFTARAN_KOMPETISI a");
		$this->db->join("TB_PENGGUNA b", "a.KODE_USER = b.KODE_USER");
		$this->db->where("a.KODE_KOMPETISI", $kode);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	function get_form($kode){
		$query = $this->db->get_where("FORM_META", array('KODE' => $kode));
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

	function get_formData($kode, $id){
		$query = $this->db->get_where("PENDAFTARAN_DATA", array('KODE_PENDAFTARAN' => $kode, 'ID_FORM' => $id));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	function get_formBerkas($kode){
		$query = $this->db->get_where("FORM_META", array('KODE' => $kode, 'TYPE' => 'FILE'));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	function get_formDataBerkas($kode, $id){
		$query = $this->db->get_where("PENDAFTARAN_DATA", array('KODE_PENDAFTARAN' => $kode, 'ID_FORM' => $id));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	// PROSES

	function proses_aturPendaftaran($kode){
		$PERTANYAAN		= $this->input->post('PERTANYAAN', true);
		$TYPE			= $this->input->post('TIPE', true);
		$REQUIRED		= $this->input->post('REQUIRED');
		$KETERANGAN		= $this->input->post('KETERANGAN', true);
		$FILE_SIZE		= $this->input->post('FILE_SIZE', true);
		$FILE_TYPE		= $this->input->post('FILE_TYPE', true);

		$ct = 0;

		foreach ($PERTANYAAN as $i => $a) {
			$data = array(
					'KEGIATAN' 			=> 2, //1. EVENT, 2. KOMPETISI
					'KODE' 				=> $kode,
					'PERTANYAAN' 		=> isset($PERTANYAAN[$i]) ? $PERTANYAAN[$i] : null,
					'TYPE' 				=> isset($TYPE[$i]) ? $TYPE[$i] : null,
					'REQUIRED' 			=> isset($REQUIRED[$i]) ? ($REQUIRED[$i] == TRUE ? 1 : 0) : 0,
					'KETERANGAN' 		=> isset($KETERANGAN[$i]) ? $KETERANGAN[$i] : null,
					'FILE_SIZE' 		=> isset($FILE_SIZE[$i]) ? $FILE_SIZE[$i] : null,
					'FILE_TYPE' 		=> isset($FILE_TYPE[$i]) ? $FILE_TYPE[$i] : null,
				);
			$this->db->insert('FORM_META', $data);
			$cek 		= ($this->db->affected_rows() != 1) ? false : true;

			if ($TYPE[$i] == "RADIO" || $TYPE[$i] == "CHECK" || $TYPE[$i] == "SELECT" && $cek == true) {
				$ID_FORM 	= $this->db->insert_id();

				if ($this->input->post('ITEM')) {
					$ITEM		= $this->input->post('ITEM', true);
					$ITEM_SPLIT	= $this->input->post('ITEM_SPLIT', true);

					for($c=1; $c <= $ITEM_SPLIT[$i]; $c++) {

						$data = array(
							'ID_FORM' 		=> $ID_FORM,
							'ITEM' 			=> isset($ITEM[$ct]) ? $ITEM[$ct] : null,
						);
						$this->db->insert('FORM_ITEM', $data);
						$ct++;
					}
				}
			}

			if ($cek == false) {				
				$this->db->where('KODE', $kode);
				$this->db->delete('FORM_META');
				break;
				return false;
			}
		}
		return true;
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
					'KEGIATAN' 			=> 2, //1. EVENT, 2. KOMPETISI
					'KODE' 				=> $kode,
					'PERTANYAAN' 		=> isset($PERTANYAAN[$i]) ? $PERTANYAAN[$i] : null,
					'TYPE' 				=> isset($TYPE[$i]) ? $TYPE[$i] : null,
					'REQUIRED' 			=> isset($REQUIRED[$i]) ? ($REQUIRED[$i] == TRUE ? 1 : 0) : 0,
					'KETERANGAN' 		=> isset($KETERANGAN[$i]) ? $KETERANGAN[$i] : null,
				);

			if ($ID_FORM[$i] == "") {
				$this->db->insert('FORM_META', $data);

				if ($TYPE[$i] == "RADIO" || $TYPE[$i] == "CHECK" || $TYPE[$i] == "SELECT") {
					$ID_FORM 	= $this->db->insert_id();
					for($c=1; $c <= $ITEM_SPLIT[$i]; $c++) {

						$data = array(
							'ID_FORM' 		=> $ID_FORM,
							'ITEM' 			=> isset($ITEM[$ct]) ? $ITEM[$ct] : null,
						);
						$this->db->insert('FORM_ITEM', $data);
						$ct++;
					}
				}


			}else{
				$this->db->where('ID_FORM', isset($ID_FORM[$i]) ? $ID_FORM[$i] : null);
				$this->db->update('FORM_META', $data);
			}

		}
		return true;
	}

	// END FORMULIR



}
