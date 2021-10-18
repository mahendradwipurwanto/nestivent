<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function LOG_AKTIVITAS($KODE_USER, $SENDER, $TYPE){
		$data = array(
			'RECEIVER' 	 	=> $KODE_USER,
			'SENDER' 		=> $SENDER,
			'TYPE'	 		=> $TYPE,
		);
		$this->db->insert('LOG_AKTIVITAS', $data);
	}

	function cek_passAdmin($pass){
		$kode_user 		= $this->session->userdata("kode_user");
		$query 			= $this->db->query("SELECT * FROM TB_AUTH WHERE KODE_USER = '$kode_user'");
		$password_lama	= $query->row()->PASSWORD;

		if(password_verify($pass, $password_lama)){
			return TRUE;
		}else{
			return FALSE;

		}
	}

	// COUNTING

	public function count_pesertaEvent($kode){
		return $this->db->get_where('PENDAFTARAN_EVENT', array('KODE_EVENT' => $kode))->num_rows();
	}

	public function count_pesertaKompetisi($kode){
		return $this->db->get_where('PENDAFTARAN_EVENT', array('KODE_EVENT' => $kode))->num_rows();
	}

	public function count_pesertaEventAll(){
		return $this->db->get('PENDAFTARAN_EVENT')->num_rows();
	}

	public function count_pesertaKompetisiAll(){
		return $this->db->get('PENDAFTARAN_EVENT')->num_rows();
	}


	// PENGGUNA
	function countPengguna(){
		$query 	= $this->db->query("SELECT * FROM TB_AUTH WHERE ROLE = 1");
		return $query->num_rows();
	}

	function countDiffPengguna(){
		$query 	= $this->db->query("SELECT * FROM TB_AUTH WHERE ROLE = 1 AND JOIN_DATE <= now() - INTERVAL 1 DAY");
		return $query->num_rows();
	}

	function countNonPengguna(){
		$query 	= $this->db->query("SELECT * FROM TB_AUTH WHERE ROLE = 1 AND NONAKTIF = 1");
		return $query->num_rows();
	}

	function countDiffNonPengguna(){
		$query 	= $this->db->query("SELECT * FROM TB_AUTH WHERE ROLE = 1 AND NONAKTIF = 1 AND JOIN_DATE <= now() - INTERVAL 8 DAY");
		return $query->num_rows();
	}

	function countNewPengguna(){
		$query 	= $this->db->query("SELECT * FROM TB_AUTH WHERE ROLE = 1 AND JOIN_DATE >= now() - INTERVAL 1 DAY");
		return $query->num_rows();
	}

	// PENGAJUAN / K-PANEL

	function countKPanel(){
		$query 	= $this->db->query("SELECT * FROM TB_KOLABOLATOR WHERE EMAIL IN (SELECT EMAIL FROM TB_AUTH WHERE ROLE = 1)");
		return $query->num_rows();
	}

	function countDiffKPanel(){
		$query 	= $this->db->query("SELECT * FROM TB_KOLABOLATOR WHERE EMAIL IN (SELECT EMAIL FROM TB_AUTH WHERE ROLE = 1) AND KODE_PENYELENGGARA IN(SELECT KODE_PENYELENGGARA FROM TB_PENYELENGGARA WHERE MAKE_DATE <= now() - INTERVAL 1 DAY)");
		return $query->num_rows();
	}

	function countPengajuan(){
		$query 	= $this->db->query("SELECT * FROM TB_PENYELENGGARA");
		return $query->num_rows();
	}

	function pengajuanHariINI(){
		$query 	= $this->db->query("SELECT * FROM TB_PENYELENGGARA WHERE MAKE_DATE >= now() - INTERVAL 1 DAY AND STATUS = 0");
		return $query->num_rows();
	}

	function pengajuanLama(){
		$query 	= $this->db->query("SELECT * FROM TB_PENYELENGGARA WHERE MAKE_DATE <= now() - INTERVAL 1 DAY AND STATUS = 0");
		return $query->num_rows();
	}


	// PENYELENGGARA
	function countPenyelenggara(){
		$query 	= $this->db->query("SELECT * FROM TB_PENYELENGGARA");
		return $query->num_rows();
	}

	function countDiffPenyelenggara(){
		$query 	= $this->db->query("SELECT * FROM TB_PENYELENGGARA WHERE MAKE_DATE <= now() - INTERVAL 1 DAY");
		return $query->num_rows();
	}

	// KOMPETISI

	function countKompetisi(){
		$query 	= $this->db->query("SELECT * FROM TB_KOMPETISI");
		return $query->num_rows();
	}

	function countDiffKompetisi(){
		$query 	= $this->db->query("SELECT * FROM TB_KOMPETISI WHERE LOG_TIME <= now() - INTERVAL 8 DAY");
		return $query->num_rows();
	}

	function countNewKompetisi(){
		$query 	= $this->db->query("SELECT * FROM TB_KOMPETISI WHERE LOG_TIME >= now() - INTERVAL 1 DAY");
		return $query->num_rows();
	}

	// EVENT

	function countEvent(){
		$query 	= $this->db->query("SELECT * FROM TB_EVENT");
		return $query->num_rows();
	}

	function countDiffEvent(){
		$query 	= $this->db->query("SELECT * FROM TB_EVENT WHERE LOG_TIME <= now() - INTERVAL 8 DAY");
		return $query->num_rows();
	}

	function countNewEvent(){
		$query 	= $this->db->query("SELECT * FROM TB_EVENT WHERE LOG_TIME >= now() - INTERVAL 1 DAY");
		return $query->num_rows();
	}

	// END COUNTING

	// PENGGUNA

	function get_pengguna(){
		$query 	= $this->db->query("SELECT * FROM TB_AUTH a JOIN TB_PENGGUNA b ON a.KODE_USER = b.KODE_USER WHERE a.ROLE = 1");
		return $query->result();
	}

	// PENYELENGGARA / K-PANEL

	function get_penyelenggara(){
		$query 	= $this->db->query("SELECT * FROM TB_PENYELENGGARA");

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	function get_penyelenggaraPengajuan(){
		$query 	= $this->db->query("SELECT * FROM TB_PENYELENGGARA WHERE STATUS = 0");
		return $query->result();
	}

	function get_pengajuPenyelenggara($kode){
		$query 	= $this->db->query("SELECT* FROM TB_PENYELENGGARA a, TB_PENGGUNA b WHERE a.KODE_USER = b.KODE_USER AND a.KODE_PENYELENGGARA = '$kode'");
		return $query->row()->NAMA;
	}

	function get_pengajuKode($kode){
		$query 	= $this->db->query("SELECT c.KODE_USER FROM TB_KOLABOLATOR a LEFT JOIN TB_AUTH b ON a.EMAIL = b.EMAIL LEFT JOIN TB_PENGGUNA c ON b.KODE_USER = c.KODE_USER WHERE a.KODE_PENYELENGGARA = '$kode' AND a.BAGIAN <= 1");
		return $query->result();
	}

	function get_kolabolatorList($kode){
		$query 	= $this->db->query("SELECT a.STATUS, a.EMAIL, c.NAMA FROM TB_KOLABOLATOR a LEFT JOIN TB_AUTH b ON a.EMAIL = b.EMAIL LEFT JOIN TB_PENGGUNA c ON b.KODE_USER = c.KODE_USER WHERE a.KODE_PENYELENGGARA = '$kode' AND a.BAGIAN > 0");
		return $query->result();
	}

	function cek_kolabolatorAkun($email){
		$query = $this->db->query("SELECT * FROM TB_AUTH WHERE EMAIL = '$email'");

		if ($query->num_rows() > 0):
			return TRUE;
		else:
			return FALSE;
		endif;

	}

	// AKTIVITAS & NOTIFIKASI

	public function count_aktivitasAdmin(){
		$query = $this->db->query("SELECT * FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 0");
		return $query->num_rows();
	}

	public function get_aktivitasAdmin($limit, $start){
		$query = $this->db->query("SELECT a.*, b.* FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 0 ORDER BY a.CREATED_AT DESC LIMIT $start, $limit");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	public function count_notifikasiAdmin(){
		$query = $this->db->query("SELECT * FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 1");
		return $query->num_rows();
	}

	public function get_notifikasiAdmin($limit, $start){
		$query = $this->db->query("SELECT a.*, b.* FROM LOG_AKTIVITAS a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 1 ORDER BY a.CREATED_AT DESC LIMIT $start, $limit");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

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

	// PENGATURAN

	// MAILER

	function get_mailerHost(){
		$query = $this->db->query("SELECT VALUE FROM TB_PENGATURAN a WHERE a.KEY = 'EM_HOST'");
		return $query->row()->VALUE;
	}

	function get_mailerUsername(){
		$query = $this->db->query("SELECT VALUE FROM TB_PENGATURAN a WHERE a.KEY = 'EM_USERNAME'");
		return $query->row()->VALUE;
	}

	function get_mailerPassword(){
		$query = $this->db->query("SELECT VALUE FROM TB_PENGATURAN a WHERE a.KEY = 'EM_PASSWORD'");
		return $query->row()->VALUE;
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

	function cek_menuPenyelenggara($KODE_PENYELENGGARA){
		$query = $this->db->query("SELECT * FROM MENU_PENYELENGGARA WHERE KODE_PENYELENGGARA = '$KODE_PENYELENGGARA'");

		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	// END PENGATURAN

	// EVENT

	public function get_eventAllD(){
		$this->db->select('a.*, b.NAMA');
		$this->db->from('TB_EVENT a');
		$this->db->join('TB_PENYELENGGARA b', 'a.KODE_PENYELENGGARA = b.KODE_PENYELENGGARA');
		$this->db->limit(5);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	public function get_eventAll(){
		$this->db->select('a.*, b.NAMA');
		$this->db->from('TB_EVENT a');
		$this->db->join('TB_PENYELENGGARA b', 'a.KODE_PENYELENGGARA = b.KODE_PENYELENGGARA');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	// KOMPETISI

	public function get_kompetisiAllD(){
		$this->db->select('a.*, b.NAMA');
		$this->db->from('TB_KOMPETISI a');
		$this->db->join('TB_PENYELENGGARA b', 'a.KODE_PENYELENGGARA = b.KODE_PENYELENGGARA');
		$this->db->limit(5);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	public function get_kompetisiAll(){
		$this->db->select('a.*, b.NAMA');
		$this->db->from('TB_KOMPETISI a');
		$this->db->join('TB_PENYELENGGARA b', 'a.KODE_PENYELENGGARA = b.KODE_PENYELENGGARA');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}


	// PROSES

	// VERIFIKASI PENGAJUAN
	// 0 MENUNGGU VERIFIKASI / NON-ACTIVE
	// 1 DITERIMA / ACTIVE
	// 2 DITOLAK / CANCELED
	// 3 SUSPENDED

	function count_megaMenuPenyelenggara(){
		return $this->db->get('MENU_PENYELENGGARA')->num_rows();
	}
	public function terimaPenyelenggara(){
		$kode 		= $this->input->POST('KODE_PENYELENGGARA');
		$pesan 		= $this->input->POST('PESAN');
		$receiver 	= $this->input->post('RECEIVER');

			// SAVE LOG
		$this->LOG_AKTIVITAS($receiver, $this->session->userdata("kode_user"), 9);

		$this->db->where('KODE_PENYELENGGARA', $kode);
		$this->db->update('TB_PENYELENGGARA', array('STATUS' => 1));

		$cek = ($this->db->affected_rows() != 1) ? false : true;

		if ($this->count_megaMenuPenyelenggara() < 5) {
			$POSITION = $this->count_megaMenuPenyelenggara()+1;
			$data = array(
				'KODE_PENYELENGGARA' => $kode,
				'POSITION'			 => $POSITION
			);
			$this->db->insert('MENU_PENYELENGGARA', $data);
		}

		if ($cek == TRUE) {
			$data = array(
				'KODE_PENYELENGGARA' 	=> $kode,
				'PESAN'				 	=> $pesan,
				'STATUS_VERIFIKASI'		=> 1,
			);
			$this->db->insert('LOG_VERIFIKASI_PENGAJUAN', $data);
			return ($this->db->affected_rows() != 1) ? false : true;

		}else{
			$this->db->delete('MENU_PENYELENGGARA', array('KODE_PENYELENGGARA' => $this->db->escape($kode)));

			$this->db->where('KODE_PENYELENGGARA', $kode);
			$this->db->update('TB_PENYELENGGARA', array('STATUS' => 0));
			return false;
		}
	}

	public function tolakPenyelenggara(){
		$kode 		= $this->input->POST('KODE_PENYELENGGARA');
		$pesan 		= $this->input->POST('PESAN');
		$receiver 	= $this->input->post('RECEIVER');

			// SAVE LOG
		$this->LOG_AKTIVITAS($receiver, $this->session->userdata("kode_user"), 10);


		$this->db->where('KODE_PENYELENGGARA', $kode);
		$this->db->update('TB_PENYELENGGARA', array('STATUS' => 2));

		$cek = ($this->db->affected_rows() != 1) ? false : true;

		if ($cek == TRUE) {
			$data = array(
				'KODE_PENYELENGGARA'	=> $kode,
				'PESAN'					=> $pesan,
				'STATUS_VERIFIKASI'		=> 2,
			);
			$this->db->insert('LOG_VERIFIKASI_PENGAJUAN', $data);
			return ($this->db->affected_rows() != 1) ? false : true;

		}else{

			$this->db->where('KODE_PENYELENGGARA', $kode);
			$this->db->update('TB_PENYELENGGARA', array('STATUS' => 0));
			return false;
		}
	}

	public function ganti_passAdmin(){
		$pass 		= htmlspecialchars($this->input->post('PASS_BARU'), true);
		$pass 		= password_hash($pass, PASSWORD_DEFAULT);

		$this->db->where('KODE_USER', $this->session->userdata("kode_user"));
		$this->db->update('TB_AUTH', array('PASSWORD' => $pass));

		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function ubah_mailer(){
		$EM_HOST 			= $this->input->post('EM_HOST');
		$EM_USERNAME 		= $this->input->post('EM_USERNAME');
		$EM_PASSWORD 		= $this->input->post('EM_PASSWORD');


		$this->db->where('KEY', "EM_HOST");
		$this->db->update('TB_PENGATURAN', array('VALUE' => $EM_HOST));

		$this->db->where('KEY', "EM_USERNAME");
		$this->db->update('TB_PENGATURAN', array('VALUE' => $EM_USERNAME));

		$this->db->where('KEY', "EM_PASSWORD");
		$this->db->update('TB_PENGATURAN', array('VALUE' => $EM_PASSWORD));


		return true;
	}

	public function ubah_sosmed(){
		$LN_FACEBOOK 		= $this->input->post('LN_FACEBOOK');
		$LN_INSTAGRAM 		= $this->input->post('LN_INSTAGRAM');
		$LN_TWITTER 		= $this->input->post('LN_TWITTER');
		$LN_GITHUB 			= $this->input->post('LN_GITHUB');


		$this->db->where('KEY', "LN_FACEBOOK");
		$this->db->update('TB_PENGATURAN', array('VALUE' => $LN_FACEBOOK));

		$this->db->where('KEY', "LN_INSTAGRAM");
		$this->db->update('TB_PENGATURAN', array('VALUE' => $LN_INSTAGRAM));

		$this->db->where('KEY', "LN_TWITTER");
		$this->db->update('TB_PENGATURAN', array('VALUE' => $LN_TWITTER));

		$this->db->where('KEY', "LN_GITHUB");
		$this->db->update('TB_PENGATURAN', array('VALUE' => $LN_GITHUB));


		return true;
	}

	public function ubah_websiteInfo(){
		$WEB_JUDUL 			= $this->input->POST('WEB_JUDUL');
		$WEB_DESKRIPSI 		= $this->input->POST('WEB_DESKRIPSI');
		$WEB_WA 			= $this->input->POST('WEB_WA');
		$WEB_HERO_BUTTON 	= $this->input->POST('WEB_HERO_BUTTON');
		$OPEN_CAREER 		= $this->input->POST('OPEN_CAREER');


		$this->db->where('KEY', "WEB_JUDUL");
		$this->db->update('TB_PENGATURAN', array('VALUE' => $WEB_JUDUL));

		$this->db->where('KEY', "WEB_DESKRIPSI");
		$this->db->update('TB_PENGATURAN', array('VALUE' => $WEB_DESKRIPSI));

		$this->db->where('KEY', "WEB_WA");
		$this->db->update('TB_PENGATURAN', array('VALUE' => $WEB_WA));

		$this->db->where('KEY', "WEB_HERO_BUTTON");
		$this->db->update('TB_PENGATURAN', array('VALUE' => ($WEB_HERO_BUTTON == true ? 1 : 0)));

		$this->db->where('KEY', "OPEN_CAREER");
		$this->db->update('TB_PENGATURAN', array('VALUE' => ($OPEN_CAREER == true ? 1 : 0)));


		return true;
	}

	public function atur_daftarPenyelenggara(){
		$this->db->empty_table('MENU_PENYELENGGARA');
		// var_dump($this->input->post('daftarPenyelenggara'));
		$no 		= 1;
		foreach ($this->input->post('daftarPenyelenggara') as $list) {
			$data = array(
				'KODE_PENYELENGGARA' => $list,
				'POSITION'			 => $no++
			);
			$this->db->insert('MENU_PENYELENGGARA', $data);
		}
		return true;
	}

}
