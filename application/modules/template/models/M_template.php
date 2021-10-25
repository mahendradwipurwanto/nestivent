<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_template extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	// MEGA PENYELENGGARA

	function get_megaPenyelenggara(){
		$query = $this->db->query("SELECT * FROM MENU_PENYELENGGARA a LEFT JOIN TB_PENYELENGGARA b ON a.KODE_PENYELENGGARA = b.KODE_PENYELENGGARA ORDER BY a.POSITION ASC");

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	// SOSMED

	function get_facebookLink(){
		$query 	= $this->db->query("SELECT VALUE FROM TB_PENGATURAN a WHERE a.KEY = 'LN_FACEBOOK'");
		return $query->row()->VALUE;
	}

	function get_instagramLink(){
		$query 	= $this->db->query("SELECT VALUE FROM TB_PENGATURAN a WHERE a.KEY = 'LN_INSTAGRAM'");
		return $query->row()->VALUE;
	}

	function get_twitterLink(){
		$query 	= $this->db->query("SELECT VALUE FROM TB_PENGATURAN a WHERE a.KEY = 'LN_TWITTER'");
		return $query->row()->VALUE;
	}

	function get_githubLink(){
		$query 	= $this->db->query("SELECT VALUE FROM TB_PENGATURAN a WHERE a.KEY = 'LN_GITHUB'");
		return $query->row()->VALUE;
	}

	// LOGO

	function get_logoFav(){
		$query 	= $this->db->query("SELECT VALUE FROM TB_PENGATURAN a WHERE a.KEY = 'LOGO_FAV'");
		return $query->row()->VALUE;
	}

	function get_logoWhite(){
		$query 	= $this->db->query("SELECT VALUE FROM TB_PENGATURAN a WHERE a.KEY = 'LOGO_WHITE'");
		return $query->row()->VALUE;
	}

	function get_logoBlack(){
		$query 	= $this->db->query("SELECT VALUE FROM TB_PENGATURAN a WHERE a.KEY = 'LOGO_BLACK'");
		return $query->row()->VALUE;
	}

	// META

	function get_webTerm(){
		$query 	= $this->db->query("SELECT VALUE FROM TB_PENGATURAN a WHERE a.KEY = 'WEB_TERM'");
		return $query->row()->VALUE;
	}

	function get_webJudul(){
		$query 	= $this->db->query("SELECT VALUE FROM TB_PENGATURAN a WHERE a.KEY = 'WEB_JUDUL'");
		return $query->row()->VALUE;
	}

	function get_webDeskripsi(){
		$query 	= $this->db->query("SELECT VALUE FROM TB_PENGATURAN a WHERE a.KEY = 'WEB_DESKRIPSI'");
		return $query->row()->VALUE;
	}

	function get_webWa(){
		$query 	= $this->db->query("SELECT VALUE FROM TB_PENGATURAN a WHERE a.KEY = 'WEB_WA'");
		return $query->row()->VALUE;
	}

	function get_webHeroButton(){
		$query 	= $this->db->query("SELECT VALUE FROM TB_PENGATURAN a WHERE a.KEY = 'WEB_HERO_BUTTON'");
		return $query->row()->VALUE;
	}

	function get_openCareer(){
		$query 	= $this->db->query("SELECT VALUE FROM TB_PENGATURAN a WHERE a.KEY = 'OPEN_CAREER'");
		return $query->row()->VALUE;
	}

	// NOTIFIKASI & AKTIVITAS ADMIN

	public function count_notifikasi($kode){
		$query = $this->db->query("SELECT * FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 1 AND a.RECEIVER = '$kode' AND a.READ = 0");
		return $query->num_rows();
	}

	public function count_notifikasiAdmin(){
		$query = $this->db->query("SELECT * FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 1 AND a.READ = 0");
		return $query->num_rows();
	}

	public function count_aktivitasAdmin(){
		$query = $this->db->query("SELECT * FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 0");
		return $query->num_rows();
	}

	public function get_notifikasiAdmin(){
		$query = $this->db->query("SELECT a.*, b.* FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 1 ORDER BY a.CREATED_AT DESC LIMIT 5");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	public function get_aktivitasAdmin(){
		$query = $this->db->query("SELECT a.*, b.* FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 0 ORDER BY a.CREATED_AT DESC LIMIT 8");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	// NOTIFIKASI & AKTIVITAS K-PANEL

	public function count_notifikasiKpanel($kode_akses){
		$query = $this->db->query("SELECT * FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 1 AND a.READ = 0 AND a.RECEIVER_GROUP = 3 AND a.RECEIVER = '$kode_akses'");
		return $query->num_rows();
	}

	public function count_aktivitasKpanel($kode_akses){
		$query = $this->db->query("SELECT * FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 0 AND a.RECEIVER_GROUP = 3 AND a.RECEIVER = '$kode_akses'");
		return $query->num_rows();
	}

	public function get_notifikasiKpanel($kode_akses){
		$query = $this->db->query("SELECT a.*, b.* FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 1 AND a.RECEIVER_GROUP = 3 AND a.RECEIVER = '$kode_akses' ORDER BY a.CREATED_AT DESC LIMIT 5");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	public function get_aktivitasKpanel($kode_akses){
		$query = $this->db->query("SELECT a.*, b.* FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 0 AND a.RECEIVER_GROUP = 3 AND a.RECEIVER = '$kode_akses' ORDER BY a.CREATED_AT DESC LIMIT 8");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	// NOTIFIKASI & AKTIVITAS EVENT


	public function count_notifikasiEvent($kode_akses){
		$query = $this->db->query("SELECT * FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 1 AND a.READ = 0 AND a.RECEIVER_GROUP = 4 AND a.RECEIVER = '$kode_akses'");
		return $query->num_rows();
	}

	public function count_aktivitasEvent($kode_akses){
		$query = $this->db->query("SELECT * FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 0 AND a.RECEIVER_GROUP = 4 AND a.RECEIVER = '$kode_akses'");
		return $query->num_rows();
	}

	public function get_notifikasiEvent($kode_akses){
		$query = $this->db->query("SELECT a.*, b.* FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 1 AND a.RECEIVER_GROUP = 4 AND a.RECEIVER = '$kode_akses' ORDER BY a.CREATED_AT DESC LIMIT 5");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	public function get_aktivitasEvent($kode_akses){
		$query = $this->db->query("SELECT a.*, b.* FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 0 AND a.RECEIVER_GROUP = 4 AND a.RECEIVER = '$kode_akses' ORDER BY a.CREATED_AT DESC LIMIT 8");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	// NOTIFIKASI & AKTIVITAS KOMPETISI


	public function count_notifikasiKompetisi($kode_akses){
		$query = $this->db->query("SELECT * FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 1 AND a.READ = 0 AND a.RECEIVER_GROUP = 5 AND a.RECEIVER = '$kode_akses'");
		return $query->num_rows();
	}

	public function count_aktivitasKompetisi($kode_akses){
		$query = $this->db->query("SELECT * FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 0 AND a.RECEIVER_GROUP = 5 AND a.RECEIVER = '$kode_akses'");
		return $query->num_rows();
	}

	public function get_notifikasiKompetisi($kode_akses){
		$query = $this->db->query("SELECT a.*, b.* FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 1 AND a.RECEIVER_GROUP = 5 AND a.RECEIVER = '$kode_akses' ORDER BY a.CREATED_AT DESC LIMIT 5");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	public function get_aktivitasKompetisi($kode_akses){
		$query = $this->db->query("SELECT a.*, b.* FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 0 AND a.RECEIVER_GROUP = 5 AND a.RECEIVER = '$kode_akses' ORDER BY a.CREATED_AT DESC LIMIT 8");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	// GET PROFIL & SENDER

	public function get_profil($kode){
		$part	= explode("_", $kode);

		$this->db->select("PROFIL");
		if($part[0] == "USR" || $part[0] == "ADM" || $part[0] == "JRI"):
			$this->db->where("KODE_USER", $kode);
			$sender = $this->db->get("TB_PENGGUNA")->row()->PROFIL;
		elseif($part[0] == "PYL"):
			$this->db->where("KODE_PENYELENGGARA", $kode);
			$sender = $this->db->get("TB_PENYELENGGARA")->row()->PROFIL;
		else:
			$sender = "System";
		endif;

		return $sender;
	}

	public function get_sender($kode){

		if ($kode == "System") {
			return "System";
		}else {
			$part	= explode("_", $kode);

			$this->db->select("NAMA");
			if($part[0] == "USR" || $part[0] == "ADM" || $part[0] == "JRI"):
				$this->db->where("KODE_USER", $kode);
				$sender = $this->db->get("TB_PENGGUNA")->row()->NAMA;
			elseif($part[0] == "PYL"):
				$this->db->where("KODE_PENYELENGGARA", $kode);
				$sender = $this->db->get("TB_PENYELENGGARA")->row()->NAMA;
			else:
				$sender = "System";
			endif;

			return $sender;
		}
	}

	// END NOTIFIKASI

	function get_penyelenggaraData($kode_akses){
		return $this->db->get_where("TB_PENYELENGGARA", array('KODE_PENYELENGGARA' => $kode_akses))->row();
	}

	function get_penyelenggaraPengguna($email){
		$email 	= $this->db->escape($email);

		$query	= $this->db->query("SELECT * FROM TB_AUTH a LEFT JOIN TB_PENYELENGGARA b ON a.KODE_USER = b.KODE_USER WHERE a.EMAIL = $email");

		if ($query->num_rows() > 0) {
			return $query->row();
		}else {
			return FALSE;
		}

	}

	public function cek_aktivasi($kode_user){
		$query = $this->db->query("SELECT * FROM TB_TOKEN WHERE KODE = '$kode_user' AND TYPE = 1");
		if ($query->num_rows() > 0) {
			return $query->row();
		}else {
			return false;
		}
	}

	function count_kpanel($email){
		$email 	= $this->db->escape($email);

		$query	= $this->db->query("SELECT * FROM TB_AUTH WHERE EMAIL = $email");

		return $query->num_rows();

	}

	function pending_kpanel($email){
		$email 	= $this->db->escape($email);

		$query	= $this->db->query("SELECT * FROM TB_AUTH WHERE EMAIL = $email AND KODE_USER IN (SELECT KODE_USER FROM TB_PENYELENGGARA WHERE STATUS = 0)");

		if ($query->num_rows() > 0) {
			return TRUE;
		}else {
			return FALSE;
		}

	}

	function have_panel($email){
		$email 	= $this->db->escape($email);

		$query	= $this->db->query("SELECT * FROM TB_AUTH WHERE EMAIL = $email AND KODE_USER IN (SELECT KODE_USER FROM TB_PENYELENGGARA WHERE STATUS = 1)");

		if ($query->num_rows() > 0) {
			return TRUE;
		}else {
			return FALSE;
		}

	}

	function get_foto($kode_user){
		$kode_user 	= $this->db->escape($kode_user);

		$query	= $this->db->query("SELECT * FROM TB_PENGGUNA WHERE KODE_USER = $kode_user");
		return $query->row();

	}

	function get_kegiatanPenyelenggara($kode_akses){
		$kode_akses 	= $this->db->escape($kode_akses);

		$query			= $this->db->query("SELECT a.KODE_EVENT as KODE, a.JUDUL, a.TANGGAL, STATUS_EVENT as STATUS, 'kegiatan' FROM TB_EVENT a UNION SELECT b.KODE_KOMPETISI as KODE, b.JUDUL, b.TANGGAL, STATUS_KOMPETISI as STATUS, 2 FROM TB_KOMPETISI b WHERE KODE_PENYELENGGARA = $kode_akses ORDER BY TANGGAL DESC LIMIT 6");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	function get_kompetisi($kode_kompetisi){
		$query = $this->db->get_where('tb_kompetisi', array('KODE_KOMPETISI' => $kode_kompetisi));
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	// PENDAFTARAN

	function cek_form($kode){
		$query = $this->db->get_where("FORM_META", array('KODE' => $kode));
		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	// END PENDAFTARAN

}
