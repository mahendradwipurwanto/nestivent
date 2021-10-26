<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_authentication extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function log_aktivitas($KODE_USER, $SENDER, $TYPE){
		$data = array(
			'RECEIVER' 	 	=> $KODE_USER,
			'SENDER' 		=> $SENDER,
			'TYPE'	 		=> $TYPE,
		);
		$this->db->insert('log_aktivitas', $data);
	}

	public function get_auth($email){
		$email = $this->db->escape($email);
		$query = $this->db->query("SELECT * FROM tb_auth a LEFT JOIN tb_pengguna b ON a.KODE_USER = b.KODE_USER WHERE a.EMAIL = $email");

		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function get_akun($kode){
		$kode 	= $this->db->escape($kode);
		$query 	= $this->db->query("SELECT * FROM tb_auth a LEFT JOIN tb_pengguna b ON a.KODE_USER = b.KODE_USER WHERE a.KODE_USER = $kode");

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

	public function get_aktivasi($kode_user){
		$kode_user 	= $this->db->escape($kode_user);
		$query 		= $this->db->query("SELECT * FROM tb_token WHERE KODE = $kode_user AND TYPE = 1");
		if ($query->num_rows() > 0) {
			return $query->row();
		}else {
			return false;
		}
	}

	public function cek_aktivasi($kode_user){
		$kode_user 	= $this->db->escape($kode_user);
		$query 		= $this->db->query("SELECT * FROM tb_token WHERE KODE = $kode_user AND TYPE = 1");
		return $query->num_rows();
	}

	public function aktivasi_kode($kode_aktivasi, $kode_user){

		$db_code 	= $this->encryption->decrypt($this->get_aktivasi($kode_user)->KEY);

		if ($kode_aktivasi == $db_code) {
			return TRUE;
		}else {
			return FALSE;
		}
		// $query = $this->db->query("SELECT * FROM TsB_AKTIVASI a WHERE a.KEY = '$kode_aktivasi'");
		// return $query->num_rows();
	}

	public function create_aktivasi(){

		// CREATE KODE AKTIVASI
		$this->encryption->initialize(array('driver' => 'openssl'));

		do {
			$KODE_AKTIVASI	= random_string('numeric', 6);

			// ENCRYPT KODE AKTIVASI
			$ciphercode 			= $this->encryption->encrypt($KODE_AKTIVASI);
		} while ($this->cek_aktivasi($KODE_AKTIVASI) > 0);

		return $ciphercode;
	}


	//PUSH TO DB

	public function del_user($kode_user){
		$kode_user 			= $this->db->escape($kode_user);
		$this->db->where('KODE_USER', $kode_user);
		$this->db->delete('tb_auth');
	}

	public function register_pengguna(){
		// $kolabolator    = $this->input->post('KOLABOLATOR');

		$nama        	= htmlspecialchars($this->input->post('nama'), true);
		$jk   			= htmlspecialchars($this->input->post('jk'), true);
		$hp   			= htmlspecialchars($this->input->post('hp'), true);
		$alamat     	= htmlspecialchars($this->input->post('alamat'), true);
		$instagram   	= htmlspecialchars($this->input->post('instagram'), true);
		$instansi     	= htmlspecialchars($this->input->post('instansi'), true);
		$jabatan   		= htmlspecialchars($this->input->post('jabatan'), true);

		if ($jabatan == 3):
			$jabatan 	= htmlspecialchars($this->input->post('lainnya'), true);
			$jabatan 	= "3|".$jabatan;
		endif;

		$email        	= htmlspecialchars($this->input->post('email'), true);
		$password   	= htmlspecialchars($this->input->post('password'), true);

		// CREATE UNIQ NAME KODE USER

		$string = preg_replace('/[^a-z]/i', '', $nama);

		$vocal  = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", " ");
		$scrap  = str_replace($vocal, "", $string);
		$begin  = substr($scrap, 0, 4);
		$uniqid	= strtoupper($begin);

		// CREATE KODE USER
		do {
			$KODE_USER 			= "USR_".$uniqid.substr(md5(time()), 0, 3);
		} while ($this->cek_kodeUser($KODE_USER) > 0);

		// TB AUTH
		$auth = array(
			'KODE_USER' 			=> $KODE_USER,
			'EMAIL' 				=> $email,
			'PASSWORD' 				=> password_hash($password, PASSWORD_DEFAULT),
			'ROLE' 					=> 1,
		);

		$this->db->insert('tb_auth', $auth);

		if ($this->db->affected_rows() == true) {

			// if ($kolabolator == true) {
			// 	$this->db->where('email', $email);
			// 	$this->db->update('TB_KOLABOLATOR', array('STATUS' => 1));
			// }

			$pengguna = array(
				'KODE_USER' 		=> $KODE_USER,
				'NAMA'  			=> $nama,
				'JK'  				=> $jk,
				'HP' 				=> $hp,
				'ALAMAT'			=> $alamat,
				'INSTAGRAM'			=> $instagram,
				'INSTANSI'			=> $instansi,
				'JABATAN'			=> $jabatan
			);

			$this->db->insert('tb_pengguna', $pengguna);

			if ($this->db->affected_rows() == true) {

				$chiper 	= $this->create_aktivasi();

				$aktivasi = array(
					'KODE' 			=> $KODE_USER,
					'KEY'  			=> $chiper,
					'TYPE' 			=> 1,
					'STATUS'		=> 0,
					'DATE_CREATED'	=> time()
				);

				$this->db->insert('tb_token', $aktivasi);
				return ($this->db->affected_rows() != 1) ? false : true;

			}else {
				$this->db->delete('tb_token', array('KODE' => $this->db->escape($KODE_USER), 'TYPE' => 1));

				$this->del_user($KODE_USER);
				return false;
			}
		}else {
			$this->del_user($KODE_USER);
			return false;
		}

	}

	public function aktivasi_akun($kode_user){

		$data = array('STATUS' => 1);

		$this->db->where('KODE', $kode_user);
		$this->db->update('tb_token', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}


	// PROSES LUPA

	public function cek_kode($kode){
		$kode = $this->db->escape($kode);
		$query = $this->db->query("SELECT * FROM tb_auth WHERE KODE_USER = $kode");
		return $query->num_rows();
	}

	public function cek_akun($email){
		$email = $this->db->escape($email);
		$query = $this->db->query("SELECT * FROM tb_auth WHERE EMAIL = $email");

		if ($query->num_rows() > 0) {
			return TRUE;
		}else{
			return false;
		}
	}

	public function cek_token($token){
		$token = $this->db->escape($token);
		$query = $this->db->query("SELECT * FROM tb_token a WHERE a.KEY = $token AND a.TYPE = 2");

		if ($query->num_rows() > 0) {
			return TRUE;
		}else{
			return false;
		}
	}

	public function get_token($token){
		$token = $this->db->escape($token);
		$query = $this->db->query("SELECT * FROM tb_token a WHERE a.KEY = $token AND a.TYPE = 2");

		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	// PENGAJUAN AKSES Penyelenggara

	public function cek_penyelenggara($kode){
		$kode 	= $this->db->escape($kode);
		$query 	= $this->db->get_where("tb_penyelenggara", array('KODE_PENYELENGGARA' => $kode));
		// $query 	= $this->db->query("SELECT * FROM tb_penyelenggara WHERE KODE_PENYELENGGARA = $kode");
		return $query->num_rows();
	}

	public function cek_owner(){
		$kode_user 	= $this->session->usedata('kode_user');
		$query 			= $this->db->get_where("tb_auth", array('KODE_USER' => $kode_user, 'STATUS' => 3));
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function daftar_penyelenggara($file, $KODE){

		// INFO PENYELENGGARA
		$KODE_PENYELENGGARA				= $KODE;
		$email										= htmlspecialchars($this->input->post("email"));
		$password									= htmlspecialchars($this->input->post("password"));
		$nama_akun								= htmlspecialchars($this->input->post("nama_akun"), TRUE);
		$NAMA											= htmlspecialchars($this->input->post("nama"), TRUE);
		$INSTANSI									= htmlspecialchars($this->input->post("instansi"), TRUE);
		$ALAMAT										= htmlspecialchars($this->input->post("alamat"), TRUE);
		$HP												= htmlspecialchars($this->input->post("hp"), TRUE);
		$LOGO											= $file;
		$DESKRIPSI								= htmlspecialchars($this->input->post("deskripsi"), TRUE);

		// CREATE UNIQ NAME KODE USER

		$string = preg_replace('/[^a-z]/i', '', $NAMA);

		$vocal  = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", " ");
		$scrap  = str_replace($vocal, "", $string);
		$begin  = substr($scrap, 0, 4);
		$uniqid	= strtoupper($begin);

		// CREATE KODE USER
		do {
			$KODE_USER 			= "PYL_".$uniqid.substr(md5(time()), 0, 3);
		} while ($this->cek_kodeUser($KODE_USER) > 0);

		// STATUS PENYELENGGARA
		// 0 Menunggu VERIFIKASI
		// 1 DITERIMA
		// 2 DITOLAK
		// 3 SUSPEND
		// 4 NONAKTIF

		$auth_penyelenggara = array(
			'KODE_USER' 			=> $KODE_USER,
			'EMAIL' 					=> $email,
			'PASSWORD' 				=> password_hash($password, PASSWORD_DEFAULT),
			'ROLE' 						=> 3,
		);
		$this->db->insert('tb_auth', $auth_penyelenggara);

		$pengguna = array(
			'KODE_USER' 		=> $KODE_USER,
			'NAMA'  				=> $nama_akun,
			'HP' 						=> $HP,
			'ALAMAT'				=> $ALAMAT,
			'INSTANSI'			=> $INSTANSI,
		);

		$this->db->insert('tb_pengguna', $pengguna);

    	$chiper 	= $this->create_aktivasi();
    
    	$aktivasi = array(
    		'KODE' 			=> $KODE_USER,
    		'KEY'  			=> $chiper,
    		'TYPE' 			=> 1,
    		'STATUS'		=> 0,
    		'DATE_CREATED'	=> time()
    	);
    
    	$this->db->insert('tb_token', $aktivasi);

		$penyelenggara = array(
			'KODE_PENYELENGGARA' 	=> $KODE,
			'KODE_USER' 					=> $KODE_USER,
			'NAMA' 								=> $NAMA,
			'INSTANSI' 						=> $INSTANSI,
			'LOGO' 								=> $LOGO,
			'DESKRIPSI' 					=> $DESKRIPSI
		);
		$this->db->insert('tb_penyelenggara', $penyelenggara);
		return ($this->db->affected_rows() != 1) ? false : true;

	}


}
