<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengguna extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function cek_aktivasi($kode_user){
		$query = $this->db->query("SELECT * FROM TB_TOKEN WHERE KODE = '$kode_user' AND TYPE = 1");
		if ($query->num_rows() > 0) {
			return $query->row();
		}else {
			return false;
		}
	}

	public function get_alertMakeKpanel($kode_user){
		$query = $this->db->query("SELECT VALUE FROM TB_PENGGUNA_PENGATURAN WHERE KODE_USER = '$kode_user' AND IDENTIFIER = 'ALERT_MakeK_PANEL'");
		if ($query->num_rows() > 0) {
			return $query->row()->VALUE;
		}else{

			return false;
		}
	}

	public function count_pesertaEvent($kode_user){
		$query = $this->db->get_where("PENDAFTARAN_EVENT", array('KODE_USER' => $kode_user));
		return $query->num_rows();
	}

	public function count_pesertaKompetisi($kode_user){
		$query = $this->db->get_where("PENDAFTARAN_KOMPETISI", array('KODE_USER' => $kode_user));
		return $query->num_rows();
	}

	// NOTIFIKASI

	public function countAllNotifikasi($kode_user){
		$query = $this->db->query("SELECT * FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE a.RECEIVER = '$kode_user' AND b.TYPE = 1");
		return $query->num_rows();
	}

	public function get_AllNotifikasi($kode_user, $limit, $start){
		$query = $this->db->query("SELECT a.*, b.* FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE a.RECEIVER = '$kode_user' AND b.TYPE = 1 ORDER BY a.CREATED_AT DESC LIMIT $start, $limit");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	public function get_notifikasi($kode_user){
		$query = $this->db->query("SELECT a.*, b.* FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE a.RECEIVER = '$kode_user' AND b.TYPE = 1 ORDER BY a.CREATED_AT DESC LIMIT 5");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	public function get_sender($kode){

		if ($kode == "System") {
				return "System";
		}else {
			$part	= explode("_", $kode);

			$this->db->select("NAMA");
			if($part[0] == "USR"):
				$this->db->where("KODE_USER", $kode);
				$sender = $this->db->get("TB_PENGGUNA")->row()->NAMA;
			elseif($part[0] == "PYL"):
				$this->db->where("KODE_PENYELENGGARA", $kode);
				$sender = $this->db->get("TB_PENYELENGGARA")->row()->NAMA;
			elseif($part[0] == "JRI"):
				$this->db->where("KODE_USER", $kode);
				$sender = $this->db->get("TB_PENGGUNA")->row()->NAMA;
			else:
				$sender = "System";
			endif;

			return $sender;
		}
	}

	public function get_detailDaftar($id){
		$query = $this->db->get_where("PENDAFTARAN_EVENT", array('KODE_PENDAFTARAN' => $id));

		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	//KOMPETISI DIIKUTI

	public function count_kompetisiDiikuti($kode_user){
		$query = $this->db->get_where("PENDAFTARAN_KOMPETISI", array('KODE_USER' => $kode_user));
		return $query->num_rows();
	}

	public function kompetisiDiikuti($kode_user, $limit, $start){

		$this->db->select("a.*, b.*, c.*, a.STATUS AS STATUS_PESERTA");
		$this->db->from("PENDAFTARAN_KOMPETISI a");
		$this->db->join("TB_KOMPETISI b", "a.KODE_KOMPETISI = b.KODE_KOMPETISI");
		$this->db->join("TB_PENYELENGGARA c", "b.KODE_PENYELENGGARA = c.KODE_PENYELENGGARA");
		$this->db->where("a.KODE_USER", $kode_user);
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	//EVENT DIIKUTI

	public function count_eventDiikuti($kode_user){
		$query = $this->db->get_where("PENDAFTARAN_EVENT", array('KODE_USER' => $kode_user));
		return $query->num_rows();
	}

	public function eventDiikuti($kode_user, $limit, $start){

		$this->db->select("a.*, b.*, c.*, a.STATUS AS STATUS_PESERTA");
		$this->db->from("PENDAFTARAN_EVENT a");
		$this->db->join("TB_EVENT b", "a.KODE_EVENT = b.KODE_EVENT");
		$this->db->join("TB_PENYELENGGARA c", "b.KODE_PENYELENGGARA = c.KODE_PENYELENGGARA");
		$this->db->where("a.KODE_USER", $kode_user);
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	// PENGGUNA
	public function get_userDetail($kode_user){
		$kode_user	= $this->db->escape($kode_user);

		$query			= $this->db->query("SELECT a.*, b.EMAIL, b.NONAKTIF, b.DEADLINE FROM TB_PENGGUNA a LEFT JOIN TB_AUTH b ON a.KODE_USER = b.KODE_USER WHERE a.KODE_USER = $kode_user");
		if ($query->num_rows() > 0) {
			return $query->row();
		}else {
			return false;
		}
	}

	// K-PANEL
	public function get_kpanel($email, $limit, $start){

		$query			= $this->db->query("SELECT a.BAGIAN, b.* FROM TB_KOLABOLATOR a LEFT JOIN TB_PENYELENGGARA b ON a.KODE_PENYELENGGARA = b.KODE_PENYELENGGARA WHERE a.EMAIL = '$email' ORDER BY b.MAKE_DATE DESC LIMIT $start, $limit");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	function count_kpanel($email){
		$email 	= $this->db->escape($email);

		$query	= $this->db->query("SELECT * FROM TB_KOLABOLATOR WHERE EMAIL = $email");

		return $query->num_rows();

	}

	// EVENT

	public function get_eventAll(){
		$query = $this->db->query("SELECT a.KODE_EVENT as KODE, a.JUDUL, a.TANGGAL, 'kegiatan' FROM TB_EVENT a UNION SELECT b.KODE_KOMPETISI as KODE, b.JUDUL, b.TANGGAL, 2 FROM TB_KOMPETISI b ORDER BY TANGGAL DESC LIMIT 5");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}


	// PROSES

	function ubah_profil($kode_user){

		$nama        	= htmlspecialchars($this->input->post('nama'), true);
		$jk   			= htmlspecialchars($this->input->post('jk'), true);
		$hp   			= htmlspecialchars($this->input->post('hp'), true);
		$alamat     	= htmlspecialchars($this->input->post('alamat'), true);
		$instagram   	= htmlspecialchars($this->input->post('instagram'), true);
		$instansi     	= htmlspecialchars($this->input->post('instansi'), true);
		$jabatan   		= htmlspecialchars($this->input->post('jabatan'), true);

		if ($jabatan == 3) {
			$jabatan = htmlspecialchars($this->input->post('lainnya'), true);
			$jabatan = "3|".$jabatan;
		}

		$data = array(
			'NAMA'  			=> $nama,
			'JK'  				=> $jk,
			'HP' 				=> $hp,
			'ALAMAT'			=> $alamat,
			'INSTAGRAM'			=> $instagram,
			'INSTANSI'			=> $instansi,
			'JABATAN'			=> $jabatan
		);

		$this->db->where('KODE_USER', $kode_user);
		$this->db->update('TB_PENGGUNA', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function hapus_akun($kode_user, $deadline){
		$this->db->where('KODE_USER', $kode_user);
		$this->db->update('TB_AUTH', array('NONAKTIF' => 1, 'DEADLINE' => $deadline));
		$cek = ($this->db->affected_rows() != 1) ? false : true;

		$nama = $this->session->userdata('nama');
		$date = date("d F Y - H:i");

		if ($cek == true) {
			$data = array(
				'RECEIVER'  => $kode_user,
				'SENDER' 		=> "System",
				'TYPE'		  => 6,
			);
			$this->db->insert('LOG_AKTIVITAS', $data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}else {
			return false;
		}
	}

	function batal_hapus(){

		$kode_user 	= $this->session->userdata('kode_user');
		$nama 			= $this->session->userdata('nama');

		$this->db->where('KODE_USER', $kode_user);
		$this->db->update('TB_AUTH', array('NONAKTIF' => 0, 'DEADLINE' => NULL));
		$cek 	= ($this->db->affected_rows() != 1) ? false : true;

		if ($cek == true) {
			$data = array(
				'RECEIVER'  => $kode_user,
				'SENDER' 		=> "System",
				'TYPE'		  => 7,
			);
			$this->db->insert('LOG_AKTIVITAS', $data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}else {
			return false;
		}
	}

	function jangan_tampilkan($identifier, $kode_user){

		$this->db->where(array('IDENTIFIER' => $identifier, 'KODE_USER' => $kode_user));
		$this->db->update('TB_PENGGUNA_PENGATURAN', array('VALUE' => 0));
		return ($this->db->affected_rows() != 1) ? false : true;

	}

	function read_notifikasi($kode_notifikasi){

		$this->db->where('ID_LOG', $kode_notifikasi);
		$this->db->update('LOG_AKTIVITAS', array('READ' => 1));
		return ($this->db->affected_rows() != 1) ? false : true;

	}

	function read_notifikasiAll(){
		$kode = $this->session->userdata('kode_user');
		$this->db->query("UPDATE LOG_AKTIVITAS a SET a.READ = 1 WHERE a.RECEIVER = '$kode' AND a.TYPE IN (SELECT ID_TYPE FROM LOG_TYPE b WHERE b.TYPE = 1)");
		return true;

	}

	// DETAIL PENDAFTARAN

	public function cek_daftarEvent($kode_pendaftaran){
		$query = $this->db->get_where("pendaftaran_event", array('KODE_PENDAFTARAN' => $kode_pendaftaran));
		return $query->num_rows();
	}

	public function cek_daftarKompetisi($kode_pendaftaran){
		$query = $this->db->get_where("pendaftaran_kompetisi", array('KODE_PENDAFTARAN' => $kode_pendaftaran));
		return $query->num_rows();
	}

	// - get data pendaftaran kompetisi by kode_pendaftaran
	public function get_detailDaftarEvent($kode_pendaftaran){
			$this->db->select("*");
			$this->db->from("pendaftaran_event");
			$this->db->where("KODE_PENDAFTARAN", $kode_pendaftaran);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
					return $query->row();
			}else {
					return false;
			}
	}

	// - get data pendaftaran kompetisi by kode_pendaftaran
	public function get_detailDaftarKompetisi($kode_pendaftaran){
			$this->db->select("a.*, pt.*, b.*, b.BIDANG_LOMBA as BIDANG");
			$this->db->from("pendaftaran_kompetisi a");
			$this->db->join("pt", "a.ASAL_PTS = pt.kodept", "left");
			$this->db->join("bidang_lomba b", "a.BIDANG_LOMBA = b.ID_BIDANG");
			$this->db->where("a.KODE_PENDAFTARAN", $kode_pendaftaran);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
					return $query->row();
			}else {
					return false;
			}
	}

	// get form item by kode meta
	public function get_formItem($kode){
			$query = $this->db->get_where("form_item", array('ID_FORM' => $kode));
			if ($query->num_rows() > 0) {
					return $query->result();
			}else{
					return false;
			}
	}

	// get data pendaftara by kode_pendaftaran and id_form
	public function get_formData($kode, $id){
			$query = $this->db->get_where("pendaftaran_data", array('KODE_PENDAFTARAN' => $kode, 'ID_FORM' => $id));
			if ($query->num_rows() > 0) {
					return $query->row()->JAWABAN;
			}else{
					return false;
			}
	}

	function update_jawaban($KODE_PENDAFTARAN, $ID_FORM, $data){

		$cek = $this->db->get_where('pendaftaran_data', array('KODE_PENDAFTARAN' => $KODE_PENDAFTARAN, 'ID_FORM' => $ID_FORM));

		if ($cek->num_rows() > 0) {
			$this->db->where(array('KODE_PENDAFTARAN' => $KODE_PENDAFTARAN, 'ID_FORM' => $ID_FORM));
			$this->db->update('pendaftaran_data', $data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}else{

			$this->db->insert('pendaftaran_data', array('KODE_PENDAFTARAN' => $KODE_PENDAFTARAN, 'ID_FORM' => $ID_FORM));

			$this->db->where(array('KODE_PENDAFTARAN' => $KODE_PENDAFTARAN, 'ID_FORM' => $ID_FORM));
			$this->db->update('pendaftaran_data', $data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}
	}

	// PENDAFTARAN KOMPETISI

    // - get data anggota by kode_pendaftaran

    public function get_anggotaTim($kode){
			$query = $this->db->get_where('tb_anggota', array('KODE_PENDAFTARAN' => $kode));
			if ($query->num_rows() > 0) {
					return $query->result();
			}else{
					return false;
			}
	}

    // - get data ketua by kode_pendaftaran jabatan 1

    public function get_dataKetua($kode){
			$query = $this->db->get_where('tb_anggota', array('KODE_PENDAFTARAN' => $kode, 'PERAN' => 1));
			if ($query->num_rows() > 0) {
					return $query->row();
			}else{
					return false;
			}
	}

	// - get data dospem by kode_pendaftaran jabatan 2

	public function get_dataDospem($kode){
			$query = $this->db->get_where('tb_anggota', array('KODE_PENDAFTARAN' => $kode, 'PERAN' => 2));
			if ($query->num_rows() > 0) {
					return $query->row();
			}else{
					return false;
			}
	}

    // - get data anggota by kode_pendaftaran jabatan 3

    public function get_dataAnggota($kode){
			$query = $this->db->get_where('tb_anggota', array('KODE_PENDAFTARAN' => $kode, 'PERAN' => 3));
			if ($query->num_rows() > 0) {
					return $query->result();
			}else{
					return false;
			}
	}

	// - cek kelengkapan data berkas peserta by kode_pendaftaran

	public function cek_kelengkapanBerkas($kegiatan, $kode){
			$query = $this->db->query("SELECT ID_FORM FROM form_meta WHERE KODE = '$kegiatan' AND REQUIRED = 1 AND ID_FORM NOT IN (SELECT ID_FORM FROM pendaftaran_data WHERE KODE_PENDAFTARAN = '$kode' AND JAWABAN != '')");
			if ($query->num_rows() > 0) {
					return false;
			}else{
					return true;
			}
	}
	
	// PEMBAYARAN
	function cekPembayaran($KODE_PENDAFTARAN){
		$query = $this->db->get_where('tb_transaksi', array('KODE_PENDAFTARAN' => $KODE_PENDAFTARAN));
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	function get_dataPembayaran($KODE_PENDAFTARAN){
		$query = $this->db->query("SELECT * FROM tb_transaksi a LEFT JOIN pendaftaran_kompetisi b ON a.KODE_PENDAFTARAN = b.KODE_PENDAFTARAN WHERE a.KODE_PENDAFTARAN = '$KODE_PENDAFTARAN'");
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	function get_biayaDaftar($ID_TIKET){
		$query = $this->db->get_where('tb_tiket', array('ID_TIKET' => $ID_TIKET));
		if ($query->num_rows() > 0) {
			return $query->row()->HARGA_TIKET;
		}else{
			return "Harap hubungi admin anda";
		}
	}

	// GENERATE KODE TRANSAKSI

	function cek_kodeTransaksi($KODE_TRANS)
	{
			$query  = $this->db->get_where("tb_transaksi", array('KODE_TRANS' => $KODE_TRANS));
			return $query->num_rows();
	}

	public function gen_kodeTrans()
	{
			do {
					$time           = substr(md5(time()), 0, 6);
					$KODE_TRANS     = "TRAN_{$time}";
			} while ($this->cek_kodeTransaksi($KODE_TRANS) > 0);

			return $KODE_TRANS;
	}

	// KARYA

	function cek_Karya($KODE_PENDAFTARAN){
		$query = $this->db->get_where('tb_karya', array('KODE_PENDAFTARAN' => $KODE_PENDAFTARAN));
		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	function get_dataKarya($KODE_PENDAFTARAN){
		$query = $this->db->query("SELECT * FROM tb_karya a LEFT JOIN pendaftaran_kompetisi b ON a.KODE_PENDAFTARAN = b.KODE_PENDAFTARAN WHERE a.KODE_PENDAFTARAN = '$KODE_PENDAFTARAN'");
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	function kelola_karya($FILE){

		$KODE_PENDAFTARAN	= $this->input->post('KODE_PENDAFTARAN');
		$TIPE_KARYA				= $this->input->post('TIPE_KARYA');

		$JUDUL						= htmlspecialchars($this->input->post('JUDUL'), true);

		// FILE PDF / GAMBAR
		if ($TIPE_KARYA == 1 || $TIPE_KARYA == 2) {
			if ($FILE == null) {
				$data = array(
					'KODE_PENDAFTARAN' 	=> $KODE_PENDAFTARAN,
					'JUDUL' 						=> $JUDUL,
				);
			}else{
				$data = array(
					'KODE_PENDAFTARAN' 	=> $KODE_PENDAFTARAN,
					'JUDUL' 						=> $JUDUL,
					'FILE' 							=> $FILE,
				);
			}
		// LINK
		}elseif ($TIPE_KARYA == 3) {
		$LINK				= $this->input->post('LINK');
			$data = array(
				'KODE_PENDAFTARAN' 	=> $KODE_PENDAFTARAN,
				'JUDUL' 			=> $JUDUL,
				'LINK' 				=> $LINK,
			);
		}

		if ($this->cek_Karya($KODE_PENDAFTARAN) == true) {
			$this->db->where('KODE_PENDAFTARAN', $KODE_PENDAFTARAN);
			$this->db->update('tb_karya', $data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}else{
			$this->db->insert('tb_karya', $data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}
	}

	function update_pts(){

		$KODE_PENDAFTARAN	= $this->input->post('KODE_PENDAFTARAN');
		$NAMA_TIM			= $this->input->post('NAMA_TIM');
		$PT					= $this->input->post('ASAL_PTS');
		$PT 	    		= explode("-", $PT);
		$ASAL_PTS			= $PT[0];
		$ALAMAT_PTS			= $this->input->post('ALAMAT_PTS');

		if (empty($ASAL_PTS)) {
			$data = array(
				'NAMA_TIM'  		=> $NAMA_TIM,
				'ALAMAT_PTS'  		=> $ALAMAT_PTS
			);
		}else{
			$data = array(
				'NAMA_TIM'  		=> $NAMA_TIM,
				'ASAL_PTS'  		=> $ASAL_PTS,
				'ALAMAT_PTS'  		=> $ALAMAT_PTS
			);
		}

		$this->db->where('KODE_PENDAFTARAN', $KODE_PENDAFTARAN);
		$this->db->update('pendaftaran_kompetisi', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function tambah_anggota(){
		$KODE_PENDAFTARAN = $this->input->post('KODE_PENDAFTARAN');
		$NAMA = $this->input->post('NAMA');
		$NIM = $this->input->post('NIM');
		$EMAIL = $this->input->post('EMAIL');
		$HP = $this->input->post('HP');
		$PERAN = $this->input->post('PERAN');

		$data = array(
			'KODE_PENDAFTARAN'=> $KODE_PENDAFTARAN,
			'NAMA' 						=> $NAMA,
			'NIM' 						=> $NIM,
			'EMAIL' 					=> $EMAIL,
			'HP' 							=> $HP,
			'PERAN' 					=> $PERAN,
		);

		$this->db->insert('tb_anggota', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function edit_anggota(){
		$KODE_PENDAFTARAN = $this->input->post('KODE_PENDAFTARAN');
		$NAMA = $this->input->post('NAMA');
		$NIM = $this->input->post('NIM');
		$EMAIL = $this->input->post('EMAIL');
		$HP = $this->input->post('HP');
		$PERAN = $this->input->post('PERAN');

		$data = array(
			'NAMA' 						=> $NAMA,
			'NIM' 						=> $NIM,
			'EMAIL' 					=> $EMAIL,
			'HP' 							=> $HP,
			'PERAN' 					=> $PERAN,
		);

		$this->db->where('KODE_PENDAFTARAN', $KODE_PENDAFTARAN);
		$this->db->update('tb_anggota', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function hapus_anggota(){
		$ID_ANGGOTA = $this->input->post('ID_ANGGOTA');

		$this->db->where('ID_ANGGOTA', $ID_ANGGOTA);
		$this->db->delete('tb_anggota');
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	
}
