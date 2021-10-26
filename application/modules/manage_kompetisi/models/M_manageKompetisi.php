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
		return $this->db->get_where("pendaftaran_kompetisi", array('KODE_KOMPETISI' => $kode))->num_rows();
	}

	function count_pesertaVerif($kode){
		return $this->db->get_where("pendaftaran_kompetisi", array('KODE_KOMPETISI' => $kode, 'STATUS' => 1))->num_rows();
	}

	// AKTIVITAS & NOTIFIKASI
	public function count_aktivitasKompetisi($kode_akses){
		$query = $this->db->query("SELECT * FROM log_aktivitas a JOIN log_type b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 0 AND a.RECEIVER_GROUP = 4 AND a.RECEIVER = '$kode_akses'");
		return $query->num_rows();
	}

	public function get_aktivitasKompetisi($limit, $start, $kode_akses){
		$query = $this->db->query("SELECT a.*, b.* FROM log_aktivitas a JOIN log_type b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 0 AND a.RECEIVER_GROUP = 4 AND a.RECEIVER = '$kode_akses' ORDER BY a.CREATED_AT DESC LIMIT $start, $limit");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	public function count_notifikasiKompetisi($kode_akses){
		$query = $this->db->query("SELECT * FROM log_aktivitas a JOIN log_type b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 1 AND a.READ = 0 AND a.RECEIVER_GROUP = 4 AND a.RECEIVER = '$kode_akses'");
		return $query->num_rows();
	}

	public function get_notifikasiKompetisi($limit, $start, $kode_akses){
		$query = $this->db->query("SELECT a.*, b.* FROM log_aktivitas a JOIN log_type b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 1 AND a.RECEIVER_GROUP = 4 AND a.RECEIVER = '$kode_akses' ORDER BY a.CREATED_AT DESC LIMIT $start, $limit");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	//BIDANG LOMBA
	function get_bidangLomba($kode_kompetisi){
		$query	= $this->db->get_where('bidang_lomba', array('KODE_KOMPETISI' => $kode_kompetisi));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	function get_bidangLomba_by_id($id_bidang)
	{
			$query    = $this->db->query("SELECT * FROM bidang_lomba WHERE id_bidang = $id_bidang");
			if ($query->num_rows() > 0) {
					return $query->row();
			} else {
					return false;
			}
	}

	function tambah_bidangLomba($kode_kompetisi){
		$BIDANG_LOMBA 	= htmlspecialchars($this->input->post('BIDANG_LOMBA'), true);
		$TIPE_KARYA 		= $this->input->post('TIPE_KARYA');
		$TEAM 				= $this->input->post('TEAM');
		$MIN_ANGGOTA 	= htmlspecialchars($this->input->post('MIN_ANGGOTA'), true);
		$MAX_ANGGOTA 	= htmlspecialchars($this->input->post('MAX_ANGGOTA'), true);
		$KETERANGAN 	= $this->input->post('KETERANGAN');

		$data = array(
			'KODE_KOMPETISI'=> $kode_kompetisi,
			'TIPE_KARYA'		=> $TIPE_KARYA,
			'TEAM'					=> ($TEAM == true ? 1 : 0),
			'MIN_ANGGOTA'		=> ($TEAM == true ? $MIN_ANGGOTA : null),
			'MAX_ANGGOTA'		=> ($TEAM == true ? $MAX_ANGGOTA : null),
			'BIDANG_LOMBA' 	=> $BIDANG_LOMBA,
			'KETERANGAN' 		=> $KETERANGAN,
		);
		$this->db->insert('bidang_lomba', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function edit_bidangLomba(){
		$ID_BIDANG 		= $this->input->post('ID_BIDANG');

		$BIDANG_LOMBA 	= htmlspecialchars($this->input->post('BIDANG_LOMBA'), true);
		$TIPE_KARYA 		= $this->input->post('TIPE_KARYA');
		$TEAM 				= $this->input->post('TEAM');
		$MIN_ANGGOTA 	= htmlspecialchars($this->input->post('MIN_ANGGOTA'), true);
		$MAX_ANGGOTA 	= htmlspecialchars($this->input->post('MAX_ANGGOTA'), true);
		$KETERANGAN 	= $this->input->post('KETERANGAN');

		$data = array(
			'BIDANG_LOMBA' 	=> $BIDANG_LOMBA,
			'TIPE_KARYA'		=> $TIPE_KARYA,
			'TEAM'				=> ($TEAM == true ? 1 : 0),
			'MIN_ANGGOTA'	=> ($TEAM == true ? $MIN_ANGGOTA : null),
			'MAX_ANGGOTA'	=> ($TEAM == true ? $MAX_ANGGOTA : null),
			'KETERANGAN' 	=> $KETERANGAN,
		);

		$this->db->where('ID_BIDANG', $ID_BIDANG);
		$this->db->update('bidang_lomba', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function hapus_bidangLomba(){
		$ID_BIDANG 		= $this->input->post('ID_BIDANG');

		$this->db->where('ID_BIDANG', $ID_BIDANG);
		$this->db->delete('bidang_lomba');
		return ($this->db->affected_rows() != 1) ? false : true;

	}

	//DATA JURI
	function get_dataJuri($kode_kompetisi){
		$query = $this->db->query("SELECT * FROM tb_auth a JOIN tb_pengguna b ON a.KODE_USER = b.KODE_USER LEFT JOIN bidang_juri c ON a.KODE_USER = c.KODE_USER WHERE a.ROLE = 2 AND a.KODE_USER IN (SELECT KODE_USER FROM bidang_juri WHERE ID_BIDANG IN (SELECT ID_BIDANG FROM bidang_lomba WHERE KODE_KOMPETISI = '$kode_kompetisi'))");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}
	function get_bidangJuri($kode_user){
		$this->db->select('a.ID, a.ID_BIDANG, b.BIDANG_LOMBA');
		$this->db->from('bidang_juri a');
		$this->db->join('bidang_lomba b', 'a.ID_BIDANG = b.ID_BIDANG');
		$query = $this->db->get_where('bidang_juri', array('a.KODE_USER' => $kode_user));
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function cek_kodeUser($kode_user){
		$kode_user 	= $this->db->escape($kode_user);
		$query 		= $this->db->query("SELECT * FROM tb_auth WHERE KODE_USER = $kode_user");
		return $query->num_rows();
	}

	public function del_user($kode_user){
		$kode_user 			= $this->db->escape($kode_user);
		$this->db->where('KODE_USER', $kode_user);
		$this->db->delete('tb_auth');
	}

	function tambah_juri($KODE_USER, $file){
		$NAMA_JURI 		= htmlspecialchars($this->input->post('NAMA_JURI'), true);
		$PEKERJAAN 		= htmlspecialchars($this->input->post('PEKERJAAN'), true);
		$EMAIL 			= htmlspecialchars($this->input->post('EMAIL'), true);
		$HP 			= htmlspecialchars($this->input->post('HP'), true);
		$PASSWORD 		= htmlspecialchars($this->input->post('PASSWORD'), true);
		$BIDANG_JURI 	= htmlspecialchars($this->input->post('BIDANG_JURI'), true);

		$data = array(
			'KODE_USER'		=> $KODE_USER,
			'EMAIL'				=> $EMAIL,
			'PASSWORD'		=> password_hash($PASSWORD, PASSWORD_DEFAULT),
			'ROLE'				=> 2,
		);
		$this->db->insert('tb_auth', $data);

		if ($this->db->affected_rows() == true) {

			$pengguna = array(
				'KODE_USER' 		=> $KODE_USER,
				'PROFIL'  			=> $file,
				'NAMA'  				=> $NAMA_JURI,
				'HP' 						=> $HP,
			);

			$this->db->insert('tb_pengguna', $pengguna);

			if ($this->db->affected_rows() == true) {

				$bidang = array(
					'KODE_USER' 		=> $KODE_USER,
					'ID_BIDANG'  		=> $BIDANG_JURI,
				);

				$this->db->insert('bidang_juri', $bidang);
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

	function edit_juri($file){
		$ID 			= htmlspecialchars($this->input->post('ID'), true);
		$KODE_USER 		= htmlspecialchars($this->input->post('KODE_USER'), true);

		$NAMA_JURI 		= htmlspecialchars($this->input->post('NAMA_JURI'), true);
		$PEKERJAAN 		= $this->input->post('PEKERJAAN');
		$EMAIL 			= htmlspecialchars($this->input->post('EMAIL'), true);
		$HP 			= htmlspecialchars($this->input->post('HP'), true);
		$PASSWORD 		= htmlspecialchars($this->input->post('PASSWORD'), true);
		$BIDANG_JURI 	= htmlspecialchars($this->input->post('BIDANG_JURI'), true);

		$pengguna = array(
			'NAMA'  			=> $NAMA_JURI,
			'PROFIL'  			=> $file,
			'HP' 				=> $HP,
		);

		$this->db->where('KODE_USER', $KODE_USER);
		$this->db->update('tb_pengguna', $pengguna);

		$bidang = array(
			'ID_BIDANG'  		=> $BIDANG_JURI,
			'PEKERJAAN'  		=> $PEKERJAAN,
		);

		$this->db->where('ID', $ID);
		$this->db->update('bidang_juri', $bidang);

		$data = array(
			'EMAIL'	=> $EMAIL,
		);

		$this->db->where('KODE_USER', $KODE_USER);
		$this->db->update('tb_auth', $data);
		return true;
	}

	function pass_juri(){
		$KODE_USER 		= $this->input->post('KODE_USER');
		$PASSWORD 		= $this->input->post('PASSWORD');
		$BIDANG_JURI 	= $this->input->post('BIDANG_JURI');

		$data = array(
			'PASSWORD'	=> password_hash($PASSWORD, PASSWORD_DEFAULT),
		);

		$this->db->where('KODE_USER', $KODE_USER);
		$this->db->update('tb_auth', $data);
		
		return ($this->db->affected_rows() != 1) ? false : true;

	}

	function hapus_juri(){
		$ID 			= $this->input->post('ID');
		$KODE_USER 		= $this->input->post('KODE_USER');

		$this->db->where('ID', $ID);
		$this->db->delete('bidang_juri');

		$this->db->where('KODE_USER', $KODE_USER);
		$this->db->delete('tb_auth');
		return ($this->db->affected_rows() != 1) ? false : true;

	}

	//TAHAP PENILAIAN
	function get_tahapPenilaian($kode_kompetisi){
		$query	= $this->db->get_where('tahap_penilaian', array('KODE_KOMPETISI' => $kode_kompetisi));
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
		$this->db->insert('tahap_penilaian', $data);
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
		$this->db->update('tahap_penilaian', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function hapus_tahap(){
		$ID_TAHAP 		= $this->input->post('ID_TAHAP');

		$this->db->where('ID_TAHAP', $ID_TAHAP);
		$this->db->delete('tahap_penilaian');
		return ($this->db->affected_rows() != 1) ? false : true;

	}

	//KRITERIA PENILAIAN

	function cek_kriteriaAtur($id_tahap, $id_bidang){
		return $this->db->get_where('kriteria_penilaian', array('ID_TAHAP' => $id_tahap, 'ID_BIDANG' => $id_bidang))->num_rows();
	}

	function get_kriteriaPenilaian($id_tahap, $id_bidang){
		$query	= $this->db->get_where('kriteria_penilaian', array('ID_TAHAP' => $id_tahap, 'ID_BIDANG' => $id_bidang));
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}
	function get_bidangKriteria($id_tahap){
		$query	= $this->db->get_where('bidang_lomba', array('KODE_KOMPETISI' => $kode_kompetisi));
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
				$this->db->insert('kriteria_penilaian', $data);
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
		$this->db->update('kriteria_penilaian', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function hapus_kriteria(){
		$ID_KRITERIA 		= $this->input->post('ID_KRITERIA');

		$this->db->where('ID_KRITERIA', $ID_KRITERIA);
		$this->db->delete('kriteria_penilaian');
		return ($this->db->affected_rows() != 1) ? false : true;

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
		$this->db->select("a.*, b.NAMA, b.HP, c.BIDANG_LOMBA AS NAMA_LOMBA");
		$this->db->from("pendaftaran_kompetisi a");
		$this->db->join("tb_pengguna b", "a.KODE_USER = b.KODE_USER");
		$this->db->join("bidang_lomba c", "a.BIDANG_LOMBA = c.ID_BIDANG");
		$this->db->where("a.KODE_KOMPETISI", $kode);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	function get_form($kode){
		$query = $this->db->get_where("form_meta", array('KODE' => $kode, 'TYPE !=' => 'FILE'));
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

	function get_formData($kode, $id){
		$query = $this->db->get_where("pendaftaran_data", array('KODE_PENDAFTARAN' => $kode, 'ID_FORM' => $id));
		if ($query->num_rows() > 0) {
			return $query->row()->JAWABAN;
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

	function get_formDataBerkas($kode, $id){
		$query = $this->db->get_where("pendaftaran_data", array('KODE_PENDAFTARAN' => $kode, 'ID_FORM' => $id));
		if ($query->num_rows() > 0) {
			return $query->result();
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
				'KEGIATAN'      => 2, //1. EVENT, 2. KOMPETISI
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
					'KEGIATAN' 			=> 2, //1. EVENT, 2. KOMPETISI
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

	function get_dataKoordinator($kode_kompetisi){
		$query = $this->db->query("SELECT * FROM tb_auth a JOIN tb_pengguna b ON a.KODE_USER = b.KODE_USER LEFT JOIN bidang_koordinator c ON a.KODE_USER = c.KODE_USER WHERE a.ROLE = 4 AND a.KODE_USER IN (SELECT KODE_USER FROM bidang_koordinator WHERE ID_BIDANG IN (SELECT ID_BIDANG FROM bidang_lomba WHERE KODE_KOMPETISI = '$kode_kompetisi'))");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	function get_bidangKoordinator($kode_user){
		$this->db->select('a.ID, a.ID_BIDANG, b.BIDANG_LOMBA');
		$this->db->from('bidang_koordinator a');
		$this->db->join('bidang_lomba b', 'a.ID_BIDANG = b.ID_BIDANG');
		$query = $this->db->get_where('bidang_koordinator', array('a.KODE_USER' => $kode_user));
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	function tambah_koordinator($KODE_USER){
		$NAMA_KOORDINATOR 		= htmlspecialchars($this->input->post('NAMA_KOORDINATOR'), true);
		$EMAIL 					= htmlspecialchars($this->input->post('EMAIL'), true);
		$PASSWORD 				= htmlspecialchars($this->input->post('PASSWORD'), true);
		$BIDANG_KOORDINATOR 	= htmlspecialchars($this->input->post('BIDANG_KOORDINATOR'), true);

		$data = array(
			'KODE_USER'		=> $KODE_USER,
			'EMAIL'			=> $EMAIL,
			'PASSWORD'		=> password_hash($PASSWORD, PASSWORD_DEFAULT),
			'ROLE'			=> 4,
		);
		$this->db->insert('tb_auth', $data);

		if ($this->db->affected_rows() == true) {

			$koordinator = array(
				'KODE_USER' 		=> $KODE_USER,
				'NAMA'  			=> $NAMA_KOORDINATOR,
			);

			$this->db->insert('tb_pengguna', $koordinator);

			if ($this->db->affected_rows() == true) {

				$bidang = array(
					'KODE_USER' 		=> $KODE_USER,
					'ID_BIDANG'  		=> $BIDANG_KOORDINATOR,
				);

				$this->db->insert('bidang_koordinator', $bidang);
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

	function edit_koordinator(){
		$ID 			= htmlspecialchars($this->input->post('ID'), true);
		$KODE_USER 		= htmlspecialchars($this->input->post('KODE_USER'), true);

		$NAMA_KOORDINATOR 		= htmlspecialchars($this->input->post('NAMA_KOORDINATOR'), true);
		$EMAIL 					= htmlspecialchars($this->input->post('EMAIL'), true);
		$PASSWORD 				= htmlspecialchars($this->input->post('PASSWORD'), true);
		$BIDANG_KOORDINATOR 	= htmlspecialchars($this->input->post('BIDANG_KOORDINATOR'), true);

		if (isset($PASSWORD) || !empty($PASSWORD) || $PASSWORD != null || $PASSWORD != "") {
			$data = array(
				'EMAIL'			=> $EMAIL,
				'PASSWORD'		=> password_hash($PASSWORD, PASSWORD_DEFAULT),
			);
		}else{
			$data = array(
				'EMAIL'			=> $EMAIL,
			);
		}

		$this->db->where('KODE_USER', $KODE_USER);
		$this->db->update('tb_auth', $data);

		$peserta = array(
			'NAMA'  			=> $NAMA_KOORDINATOR,
		);

		$this->db->where('KODE_USER', $KODE_USER);
		$this->db->update('tb_pengguna', $peserta);

		$bidang = array(
			'ID_BIDANG'  		=> $BIDANG_KOORDINATOR,
		);

		$this->db->where('ID', $ID);
		$this->db->update('bidang_koordinator', $bidang);
		return true;
	}

	function pass_koordinator(){
		$KODE_USER 		= $this->input->post('KODE_USER');
		$PASSWORD 		= $this->input->post('PASSWORD');
		$BIDANG_JURI 	= $this->input->post('BIDANG_JURI');

		$data = array(
			'PASSWORD'	=> password_hash($PASSWORD, PASSWORD_DEFAULT),
		);

		$this->db->where('KODE_USER', $KODE_USER);
		$this->db->update('tb_auth', $data);
		
		return ($this->db->affected_rows() != 1) ? false : true;

	}

	function hapus_koordinator(){
		$ID 			= $this->input->post('ID');
		$KODE_USER 		= $this->input->post('KODE_USER');

		$this->db->where('ID', $ID);
		$this->db->delete('bidang_koordinator');

		$this->db->where('KODE_USER', $KODE_USER);
		$this->db->delete('tb_auth');
		return ($this->db->affected_rows() != 1) ? false : true;

	}

	// BERKAS

	public function get_berkasLomba($kode){
		$this->db->select('*');
		$this->db->from('berkas_kebutuhan');
		$this->db->where('KODE_KOMPETISI', $kode);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}


	public function tambahBerkas($file){
		$JUDUL 		= $this->input->post('JUDUL');
		$KETERANGAN = $this->input->post('KETERANGAN');
		$KODE_KOMPETISI = $this->session->userdata('manage_kompetisi');
		$data = array(
			'KODE_KOMPETISI' 		=> $KODE_KOMPETISI,
			'JUDUL' 		=> $JUDUL,
			'LINK' 			=> $file,
			'KETERANGAN' 	=> $KETERANGAN,
		);

		$this->db->insert('berkas_kebutuhan', $data);
		return ($this->db->affected_rows() != 1) ? false : true;

	}


	public function editBerkas($file){
		$ID_BERKAS 	= $this->input->post('ID_BERKAS');
		$JUDUL 		= $this->input->post('JUDUL');
		$KETERANGAN = $this->input->post('KETERANGAN');

		$data = array(
			'JUDUL' 		=> $JUDUL,
			'LINK' 			=> $file,
			'KETERANGAN' 	=> $KETERANGAN,
		);

		$this->db->where('ID_BERKAS', $ID_BERKAS);
		$this->db->update('berkas_kebutuhan', $data);
		return ($this->db->affected_rows() != 1) ? false : true;

	}


	public function hapusBerkas(){
		$ID_BERKAS 	= $this->input->post('ID_BERKAS');

		$this->db->where('ID_BERKAS', $ID_BERKAS);
		$this->db->delete('berkas_kebutuhan');
		return ($this->db->affected_rows() != 1) ? false : true;

	}

	// DATA PESERTA

	function get_peserta($bidang){
		$query 	= $this->db->query("SELECT * FROM tb_auth a JOIN tb_pengguna b ON a.KODE_USER = b.KODE_USER JOIN pendaftaran_kompetisi c ON a.KODE_USER = c.KODE_USER WHERE a.ROLE = 1 AND c.BIDANG_LOMBA = '$bidang'");
		return $query->result();
	}

	function get_countMhs($bidang){
		return $this->db->query("
			SELECT COUNT(ta.ID_ANGGOTA) AS JML_MHS
			FROM pendaftaran_kompetisi pk , tb_anggota ta 
			WHERE pk.KODE_PENDAFTARAN = ta.KODE_PENDAFTARAN AND ta.PERAN IN('1','3') AND BIDANG_LOMBA = '$bidang'
		")->row();
	}
	function get_countTim($bidang){
		return $this->db->query("
			SELECT COUNT(pk.KODE_PENDAFTARAN) AS JML_TIM
			FROM pendaftaran_kompetisi pk WHERE BIDANG_LOMBA = '$bidang'
		")->row();
	}
	function get_countPTS($bidang){
		return $this->db->query("
			SELECT COUNT(pk.ASAL_PTS) AS JML_PTS
			FROM pendaftaran_kompetisi pk WHERE BIDANG_LOMBA = '$bidang'
			GROUP BY pk.ASAL_PTS 
		")->result();
	}

	function get_dataPeserta($kode){
		$query 	= $this->db->query("SELECT * FROM tb_auth a JOIN tb_pengguna b ON a.KODE_USER = b.KODE_USER JOIN pendaftaran_kompetisi c ON a.KODE_USER = c.KODE_USER WHERE a.KODE_USER = '$kode'");
		return $query->row();
	}

	function get_pesertaPendaftaran($KODE_USER){
		$query 	= $this->db->query("SELECT *, c.BIDANG_LOMBA as LOMBA FROM pendaftaran_kompetisi a LEFT JOIN pt b ON a.ASAL_PTS = b.kodept LEFT JOIN bidang_lomba c ON a.BIDANG_LOMBA = c.ID_BIDANG WHERE a.KODE_USER = '$KODE_USER'");
		if ($query->num_rows() > 0) {
			return $query->row();	
		}else{
			return false;
		}
	}

	function get_anggota_tim($kode_pendaftaran)
	{
			$query = $this->db->query("SELECT * FROM pendaftaran_kompetisi AS a, tb_anggota AS b 
			WHERE a.`KODE_PENDAFTARAN` = b.`KODE_PENDAFTARAN`
			AND a.`KODE_PENDAFTARAN` = '$kode_pendaftaran'");
			if ($query->num_rows() > 0) {
					return $query->result();
			} else {
					return false;
			}
	}

	function cek_pembayaranPeserta($KODE_PENDAFTARAN){
		$query 	= $this->db->query("SELECT * FROM tb_transaksi WHERE KODE_PENDAFTARAN = '$KODE_PENDAFTARAN'");
		if ($query->num_rows() > 0) {
		
			return $query->row();
		} else {
			return false;
		}
	}

	// TRANSAKSI

	function get_dataTransaksi(){
		$this->db->select('tt.*, pk.NAMA_TIM, ta.EMAIL, tp.NAMA');
		$this->db->from('tb_transaksi tt');
		$this->db->join('pendaftaran_kompetisi pk', 'tt.KODE_PENDAFTARAN = pk.KODE_PENDAFTARAN');
		$this->db->join('tb_auth ta', 'pk.KODE_USER = ta.KODE_USER');
		$this->db->join('tb_pengguna tp', 'pk.KODE_USER = tp.KODE_USER');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
		
	}

	function get_jmlTransaksi(){
		return $this->db->get('tb_transaksi')->num_rows();
	}

	function get_totalUang(){
		$this->db->select('sum(TOT_BAYAR) as total');
		$this->db->from('tb_transaksi');
		return $this->db->get()->row()->total;
	}

	function get_pembayaranSukses(){
		return $this->db->get_where('tb_transaksi', array('STAT_BAYAR' => 1))->num_rows();
	}

	function update_status_transaksi($kode_trans){
		$status = $this->input->post('status_transaksi');
		$this->db->where('KODE_TRANS', $kode_trans);
		$this->db->update('tb_transaksi', array('STAT_BAYAR' => $status));
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function delete_transaksi($kode_trans){
		$this->db->where('KODE_TRANS', $kode_trans);
		$this->db->delete('tb_transaksi');
		return ($this->db->affected_rows() != 1) ? false : true;
	}


	// VERIFIKASI BERKAS

    function get_dataPendaftaran_by_bidang_lomba($id_bidang)
    {
        $this->db->select("a.*, b.*, c.BIDANG_LOMBA as NAMA_LOMBA");
        $this->db->from("pendaftaran_kompetisi a");
        $this->db->join("tb_pengguna b","a.KODE_USER = b.KODE_USER", 'left');
        $this->db->join("bidang_lomba c","a.BIDANG_LOMBA = c.ID_BIDANG", 'left');
        $this->db->where('a.BIDANG_LOMBA', $id_bidang);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function get_jumlah_tim($id_lomba = "")
    {
        if ($id_lomba == "") {
            $query = $this->db->query("SELECT COUNT(a.`KODE_PENDAFTARAN`) AS jumlah_tim FROM pendaftaran_kompetisi AS a");
        } else {
            $query = $this->db->query("SELECT COUNT(a.`KODE_PENDAFTARAN`) AS jumlah_tim FROM pendaftaran_kompetisi AS a WHERE a.`BIDANG_LOMBA` = $id_lomba");
        }
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function get_jumlah_berkas_belum_terverifikasi($id_bidang = "")
    {
        if ($id_bidang == "") {
            $query = $this->db->query("SELECT COUNT(a.`KODE_PENDAFTARAN`) AS jumlah_berkas_belum_terverifikasi 
            FROM pendaftaran_kompetisi AS a 
            WHERE a.`STATUS` = 0");
        } else {
            $query = $this->db->query("SELECT COUNT(a.`KODE_PENDAFTARAN`) AS jumlah_berkas_belum_terverifikasi 
            FROM pendaftaran_kompetisi AS a 
            WHERE a.`STATUS` = 0
            AND a.`BIDANG_LOMBA` = $id_bidang");
        }
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function get_jumlah_berkas_terverifikasi($id_bidang = "")
    {
        if ($id_bidang == "") {
            $query = $this->db->query("SELECT COUNT(a.`KODE_PENDAFTARAN`) AS jumlah_berkas_terverifikasi 
            FROM pendaftaran_kompetisi AS a 
            WHERE a.`STATUS` = 1");
        } else {
            $query = $this->db->query("SELECT COUNT(a.`KODE_PENDAFTARAN`) AS jumlah_berkas_terverifikasi 
            FROM pendaftaran_kompetisi AS a 
            WHERE a.`STATUS` = 1
            AND a.`BIDANG_LOMBA` = $id_bidang");
        }
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function get_jumlah_berkas_ditolak($id_bidang = "")
    {
        if ($id_bidang == "") {
            $query = $this->db->query("SELECT COUNT(a.`KODE_PENDAFTARAN`) AS jumlah_berkas_ditolak
            FROM pendaftaran_kompetisi AS a 
            WHERE a.`STATUS` = 2");
        } else {
            $query = $this->db->query("SELECT COUNT(a.`KODE_PENDAFTARAN`) AS jumlah_berkas_ditolak 
            FROM pendaftaran_kompetisi AS a 
            WHERE a.`STATUS` = 2
            AND a.`BIDANG_LOMBA` = $id_bidang");
        }
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }


    function get_karya_by_kode_pendaftaran($kode_pendaftaran)
    {
        $query = $this->db->query("SELECT a.* , b.`NAMA_TIM`, b.`KODE_USER`,
        c.`BIDANG_LOMBA`, c.`ID_BIDANG`, c.`TIPE_KARYA`
        FROM tb_karya AS a, pendaftaran_kompetisi AS b, bidang_lomba AS c  WHERE a.`KODE_PENDAFTARAN` = b.`KODE_PENDAFTARAN`
        AND b.`BIDANG_LOMBA` = c.`ID_BIDANG`
        AND a.`KODE_PENDAFTARAN` = '$kode_pendaftaran'
       ");
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function get_pendaftaran_by_kode_pendaftaran($kode_pendaftaran)
    {
        $this->db->select("a.*, b.*, c.*, d.BIDANG_LOMBA AS NAMA_LOMBA");
        $this->db->from("pendaftaran_kompetisi a");
        $this->db->join("tb_pengguna b", "a.KODE_USER = b.KODE_USER");
        $this->db->join("tb_auth c", "c.KODE_USER = b.KODE_USER");
        $this->db->join("bidang_lomba d", "a.BIDANG_LOMBA = d.ID_BIDANG");
        $this->db->where('a.KODE_PENDAFTARAN', $kode_pendaftaran);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }



    function terima_pendaftaran()
    {
        $KODE_USER = $this->input->post('KODE_USER');

        $this->db->where('KODE_USER', $KODE_USER);
        $this->db->update('pendaftaran_kompetisi', array('STATUS' => 1));
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function tolak_pendaftaran()
    {
        $KODE_USER = $this->input->post('KODE_USER');

        $this->db->where('KODE_USER', $KODE_USER);
        $this->db->update('pendaftaran_kompetisi', array('STATUS' => 2));
        return ($this->db->affected_rows() != 1) ? false : true;
    }

		public function seleksi_tim($kode, $tahap){
			$this->db->where('KODE_PENDAFTARAN', $kode);
			$this->db->update('pendaftaran_kompetisi', array('STATUS_SELEKSI' => $tahap));
			
		}

		function get_daftarTIM($param, $id_bidang, $id_tahap){
			// case
			// 0. Seluruh TIM yang telah diverifikasi / STATUS = 1 (belum dinilai)
			// 1. Berdasarkan nilai tertinggi (sudah ada data penilaian) / berdasarkan id tahap
			$this->db->select('*');
			switch ($param) {
				case 0:
					$this->db->from('v_tim');
					
					if ($id_bidang != 0) {
						$this->db->where('ID_BIDANG', $id_bidang);
					}
					
					if ($id_tahap != 0) {
						$this->db->where('TAHAP', $id_tahap);
					}
	
					$this->db->where('STATUS', 1);
					break;
				case 1:
					$this->db->from('v_penilaian');
					
					if ($id_bidang != 0) {
						$this->db->where('ID_BIDANG', $id_bidang);
					}
	
					$this->db->where('TAHAP', $id_tahap);
					break;
					
				default:
					$this->db->from('v_tim');
					$this->db->where('STATUS', 1);
					break;
			}
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				return $query->result();
			}else{
				return false;
			}
		}

		function get_seleksiTIM($param, $id_bidang, $id_tahap){
			// case
			// 0. Seluruh TIM yang telah diverifikasi / STATUS = 1 (belum dinilai)
			// 1. Berdasarkan nilai tertinggi (sudah ada data penilaian) / berdasarkan id tahap
			$this->db->select('*');
			switch ($param) {
				case 0:
					$this->db->from('v_tim');
					
					if ($id_bidang != 0) {
						$this->db->where('ID_BIDANG', $id_bidang);
					}
					
					if ($id_tahap != 0) {
						$this->db->where('TAHAP !=', $id_tahap);
					}
	
					$this->db->where('STATUS', 1);
					break;
				case 1:
					$this->db->from('v_penilaian');
					
					if ($id_bidang != 0) {
						$this->db->where('ID_BIDANG', $id_bidang);
					}
	
					$this->db->where('TAHAP', $id_tahap);
					break;
				default:
					$this->db->from('v_tim');
					$this->db->where('STATUS', 1);
					break;
			}
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				return $query->result();
			}else{
				return false;
			}
		}

		public function get_TotNilai($KODE_PENDAFTARAN, $id_tahap = 1){
			$query = $this->db->query("
				SELECT KODE_PENDAFTARAN,
				ROUND((SUM(NILAI) /
				(SELECT COUNT(*)  AS JML_JURI FROM (SELECT COUNT(KODE_PENDAFTARAN)
				FROM tb_penilaian WHERE KODE_PENDAFTARAN = '$KODE_PENDAFTARAN' AND ID_TAHAP = '$id_tahap'
				GROUP BY KODE_JURI) t)), 2) AS TOT_NILAI,
				(SELECT COUNT(*)  AS JML_JURI FROM
				(SELECT COUNT(KODE_PENDAFTARAN) FROM tb_penilaian
				WHERE KODE_PENDAFTARAN = '$KODE_PENDAFTARAN' AND ID_TAHAP = '$id_tahap' GROUP BY KODE_JURI) t) AS JML_JURI
				FROM tb_penilaian WHERE KODE_PENDAFTARAN = '$KODE_PENDAFTARAN' AND ID_TAHAP = '$id_tahap'
				");
			if ($query->num_rows() > 0) {
				return $query->row();
			}else{
				return false;
			}
		}

		function get_tahapData($id_tahap){
			$query = $this->db->get_where('tahap_penilaian', array('ID_TAHAP' => $id_tahap));
			if ($query->num_rows() > 0 ){
				return $query->row();
			}else{
				return false;
			}
		}

		// HASIL PENILAIAN
	function get_tahapLomba_by_id($id_tahap){
		$query = $this->db->get_where('tahap_penilaian', array('ID_TAHAP' => $id_tahap));
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}
	}
		function get_hasilPenilaian($id_tahap, $id_bidang){
			// case
			// 1. Berdasarkan nilai tertinggi (sudah ada data penilaian) / berdasarkan id tahap
			$this->db->select('*');
			$this->db->from('v_penilaian');
			
			if ($id_bidang != 0) {
				$this->db->where('ID_BIDANG', $id_bidang);
			}
			
			if ($id_tahap != 0) {
				$this->db->where('TAHAP', $id_tahap);
			}
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				return $query->result();
			}else{
				return false;
			}
		}


}
