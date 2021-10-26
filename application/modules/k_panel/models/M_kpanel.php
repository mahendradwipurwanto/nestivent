<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kpanel extends CI_Model {
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

	function get_penyelenggaraDetail($kode){
		$kode = $this->db->escape($kode);
		$query = $this->db->query("SELECT a.*, a.NAMA AS NAMA_P, b.HP, b.ALAMAT, b.NAMA AS NAMA_AKUN, c.*, (SELECT COUNT(*) FROM tb_event b WHERE b.KODE_PENYELENGGARA = $kode) as JML_EVENT, (SELECT COUNT(*) FROM tb_kompetisi b WHERE b.KODE_PENYELENGGARA = $kode) as JML_KOMPETISI FROM tb_penyelenggara a, tb_pengguna b, tb_auth c WHERE a.KODE_USER = b.KODE_USER AND a.KODE_USER = c.KODE_USER AND a.KODE_PENYELENGGARA = $kode AND a.STATUS = 1");
		if ($query->num_rows() > 0) {
			return $query->row();
		}else {
			return false;
		}
	}

	// COUNT

	function count_event($kode){
		$query = $this->db->get_where('tb_event', array('KODE_PENYELENGGARA' => $kode));
		return $query->num_rows();
	}

	function count_kompetisi($kode){
		$query = $this->db->get_where('tb_kompetisi', array('KODE_PENYELENGGARA' => $kode));
		return $query->num_rows();
	}

	function count_peserta($kode){
		$this->db->select('*');
		$this->db->from('tb_event a');
		$this->db->join('pendaftaran_event b', 'a.KODE_EVENT = b.KODE_EVENT');
		$this->db->where('a.KODE_PENYELENGGARA', $kode);
		$query = $this->db->get();
		$a = $query->num_rows();
		
		$this->db->select('*');
		$this->db->from('tb_kompetisi a');
		$this->db->join('pendaftaran_kompetisi b', 'a.KODE_KOMPETISI = b.KODE_KOMPETISI');
		$this->db->where('a.KODE_PENYELENGGARA', $kode);
		$query2 = $this->db->get();
		$b = $query2->num_rows();

		return $a+$b;
	}

	// END COUNT

	// AKTIVITAS & NOTIFIKASI
	public function count_aktivitasKpanel($kode_akses){
		$query = $this->db->query("SELECT * FROM log_aktivitas a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 0 AND a.RECEIVER_GROUP = 3 AND a.RECEIVER = '$kode_akses'");
		return $query->num_rows();
	}

	public function get_aktivitasKpanel($limit, $start, $kode_akses){
		$query = $this->db->query("SELECT a.*, b.* FROM log_aktivitas a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 0 AND a.RECEIVER_GROUP = 3 AND a.RECEIVER = '$kode_akses' ORDER BY a.CREATED_AT DESC LIMIT $start, $limit");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
	}

	public function count_notifikasiKpanel($kode_akses){
		$query = $this->db->query("SELECT * FROM log_aktivitas a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 1 AND a.READ = 0 AND a.RECEIVER_GROUP = 3 AND a.RECEIVER = '$kode_akses'");
		return $query->num_rows();
	}

	public function get_notifikasiKpanel($limit, $start, $kode_akses){
		$query = $this->db->query("SELECT a.*, b.* FROM log_aktivitas a JOIN LOG_TYPE b ON a.TYPE = b.ID_TYPE WHERE b.TYPE = 1 AND a.RECEIVER_GROUP = 3 AND a.RECEIVER = '$kode_akses' ORDER BY a.CREATED_AT DESC LIMIT $start, $limit");
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
			$sender = $this->db->get("tb_pengguna")->row()->PROFIL;
		elseif($part[0] == "PYL"):
			$this->db->where("KODE_PENYELENGGARA", $kode);
			$sender = $this->db->get("tb_penyelenggara")->row()->PROFIL;
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
				$sender = $this->db->get("tb_pengguna")->row()->NAMA;
			elseif($part[0] == "PYL"):
				$this->db->where("KODE_PENYELENGGARA", $kode);
				$sender = $this->db->get("tb_penyelenggara")->row()->NAMA;
			else:
				$sender = "System";
			endif;

			return $sender;
		}
	}


	// EVENT

	public function get_eventAll(){
		$this->db->select('a.*, b.NAMA');
		$this->db->from('tb_event a');
		$this->db->join('tb_penyelenggara b', 'a.KODE_PENYELENGGARA = b.KODE_PENYELENGGARA');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	public function get_eventDetail($KODE_EVENT){
		$this->db->select('*');
		$this->db->from('tb_event');
		$this->db->join('tb_penyelenggara', 'tb_penyelenggara.KODE_PENYELENGGARA = tb_event.KODE_PENYELENGGARA');
		$this->db->where('KODE_EVENT', $KODE_EVENT);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}

	}

	public function get_tiketEvent($KODE_EVENT){
		$this->db->select('*');
		$this->db->from('tb_tiket');
		$this->db->where(array('TYPE' => 1, 'KODE' => $KODE_EVENT));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	public function get_sosmedEvent($KODE_EVENT){
		$this->db->select('*');
		$this->db->from('tb_sosmed');
		$this->db->where(array('TYPE' => 1, 'KODE' => $KODE_EVENT));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	public function get_contactEvent($KODE_EVENT){
		$this->db->select('*');
		$this->db->from('tb_contact_person');
		$this->db->where(array('TYPE' => 1, 'KODE' => $KODE_EVENT));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}


	// KOMPETISI

	public function get_kompetisiAll(){
		$this->db->select('a.*, b.NAMA');
		$this->db->from('tb_kompetisi a');
		$this->db->join('tb_penyelenggara b', 'a.KODE_PENYELENGGARA = b.KODE_PENYELENGGARA');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	public function get_kompetisiDetail($KODE_KOMPETISI){
		$this->db->select('*');
		$this->db->from('tb_kompetisi');
		$this->db->join('tb_penyelenggara', 'tb_penyelenggara.KODE_PENYELENGGARA = tb_kompetisi.KODE_PENYELENGGARA');
		$this->db->where('KODE_KOMPETISI', $KODE_KOMPETISI);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}

	}

	public function get_tiketKompetisi($KODE_KOMPETISI){
		$this->db->select('*');
		$this->db->from('tb_tiket');
		$this->db->where(array('TYPE' => 2, 'KODE' => $KODE_KOMPETISI));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	public function get_sosmedKompetisi($KODE_KOMPETISI){
		$this->db->select('*');
		$this->db->from('tb_sosmed');
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
		$this->db->from('tb_contact_person');
		$this->db->where(array('TYPE' => 2, 'KODE' => $KODE_KOMPETISI));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}


	// PROSES

	// EVENT
	function cek_kodeEvent($kode){
		$query 		= $this->db->query("SELECT * FROM tb_event WHERE KODE_EVENT = '$kode'");
		return $query->num_rows();
	}

	function proses_buatEvent($KODE_EVENT, $filename){
		// EVENT
		$JENIS				= htmlspecialchars($this->input->post('JENIS'), true);
		$JUDUL				= htmlspecialchars($this->input->post('JUDUL'), true);
		$TANGGAL			= htmlspecialchars($this->input->post('TANGGAL'), true);
		$WAKTU				= htmlspecialchars($this->input->post('WAKTU'), true);
		$MEDIA 				= htmlspecialchars($this->input->post('MEDIA'), true);
		$BAYAR 				= $this->input->post('BAYAR');
		$ONLINE 			= $this->input->post('ONLINE');
		$DESKRIPSI 			= $this->input->post('DESKRIPSI');

		//TIKET
		$NAMA_TIKET 		= $this->input->post('NAMA_TIKET', true);
		$HARGA_TIKET 		= $this->input->post('HARGA_TIKET', true);

		//SOSMED
		$SOSMED 			= $this->input->post('SOSMED', true);
		$NAMA_SOSMED 		= $this->input->post('NAMA_SOSMED', true);
		$LINK_SOSMED 		= $this->input->post('LINK_SOSMED', true);

		//CONTACT
		$NAMA_CONTACT 		= $this->input->post('NAMA_CONTACT', true);
		$CONTACT 			= $this->input->post('CONTACT', true);
		$CONTACT_MEDIA 		= $this->input->post('CONTACT_MEDIA', true);


		// INSERT EVENT

		$event = array(
			'KODE_EVENT' 			=> $KODE_EVENT,
			'KODE_PENYELENGGARA' 	=> $this->session->userdata('kode_akses'),
			'JUDUL' 				=> $JUDUL,
			'JENIS' 				=> $JENIS,
			'POSTER' 				=> $filename,
			'TANGGAL' 				=> $TANGGAL,
			'WAKTU' 				=> $WAKTU,
			'MEDIA' 				=> $MEDIA,
			'BAYAR' 				=> ($BAYAR == TRUE ? 1 : 0),
			'ONLINE' 				=> ($ONLINE == TRUE ? 1 : 0),
			'DESKRIPSI' 			=> $DESKRIPSI,
		);

		$this->db->insert('tb_event', $event);

		$cek = ($this->db->affected_rows() != 1) ? false : true;

		if ($cek == TRUE) {
			// TIKET
			foreach ($NAMA_TIKET as $i => $a) {
				if ($NAMA_TIKET[$i] != "") {
					$tiket = array(
						'TYPE' 				=> 1,
						'KODE' 				=> $KODE_EVENT,
						'NAMA_TIKET' 		=> isset($NAMA_TIKET[$i]) ? $NAMA_TIKET[$i] : '',
						'HARGA_TIKET'		=> isset($HARGA_TIKET[$i]) ? $HARGA_TIKET[$i] : '',
					);
					$this->db->insert('tb_tiket', $tiket);
				}
			}

			// SOSMED
			foreach ($NAMA_SOSMED as $j => $b) {
				if ($NAMA_SOSMED[$j] != "") {
					$sosmed = array(
						'TYPE' 				=> 1,
						'KODE' 				=> $KODE_EVENT,
						'NAMA_SOSMED' 		=> isset($NAMA_SOSMED[$j]) ? $NAMA_SOSMED[$j] : '',
						'LINK_SOSMED'		=> isset($LINK_SOSMED[$j]) ? $LINK_SOSMED[$j] : '',
						'SOSMED'			=> isset($SOSMED[$j]) ? $SOSMED[$j] : '',
					);
					$this->db->insert('tb_sosmed', $sosmed);
				}
			}

			// CP
			foreach ($NAMA_CONTACT as $k => $a) {
				if ($NAMA_CONTACT[$k] != "") {
					$contact = array(
						'TYPE' 				=> 1,
						'KODE' 				=> $KODE_EVENT,
						'NAMA_CONTACT' 		=> isset($NAMA_CONTACT[$k]) ? $NAMA_CONTACT[$k] : '',
						'CONTACT'			=> isset($CONTACT[$k]) ? $CONTACT[$k] : '',
						'CONTACT_MEDIA'		=> isset($CONTACT_MEDIA[$k]) ? $CONTACT_MEDIA[$k] : '',
					);
					$this->db->insert('tb_contact_person', $contact);
				}
			}
			return true;
		}else{
			$this->db->delete('tb_event', array('KODE_EVENT', $KODE_EVENT));
			return false;
		}
	}


	// KOMPETISI
	function cek_kodeKompetisi($kode){
		$query 		= $this->db->query("SELECT * FROM tb_kompetisi WHERE KODE_KOMPETISI = '$kode'");
		return $query->num_rows();
	}

	function proses_buatKompetisi($KODE_KOMPETISI, $filename){
		// EVENT
		$JUDUL				= htmlspecialchars($this->input->post('JUDUL'), true);
		$TANGGAL			= htmlspecialchars($this->input->post('TANGGAL'), true);
		$WAKTU				= htmlspecialchars($this->input->post('WAKTU'), true);
		$MEDIA 				= htmlspecialchars($this->input->post('MEDIA'), true);
		$BAYAR 				= $this->input->post('BAYAR');
		$ONLINE 			= $this->input->post('ONLINE');
		$DESKRIPSI 			= $this->input->post('DESKRIPSI');

		//TIKET
		$NAMA_TIKET 		= $this->input->post('NAMA_TIKET', true);
		$HARGA_TIKET 		= $this->input->post('HARGA_TIKET', true);

		//SOSMED
		$SOSMED 			= $this->input->post('SOSMED', true);
		$NAMA_SOSMED 		= $this->input->post('NAMA_SOSMED', true);
		$LINK_SOSMED 		= $this->input->post('LINK_SOSMED', true);

		//CONTACT
		$NAMA_CONTACT 		= $this->input->post('NAMA_CONTACT', true);
		$CONTACT 			= $this->input->post('CONTACT', true);
		$CONTACT_MEDIA 		= $this->input->post('CONTACT_MEDIA', true);


		// INSERT EVENT

		$event = array(
			'KODE_KOMPETISI' 		=> $KODE_KOMPETISI,
			'KODE_PENYELENGGARA' 	=> $this->session->userdata('kode_akses'),
			'JUDUL' 				=> $JUDUL,
			'POSTER' 				=> $filename,
			'TANGGAL' 				=> $TANGGAL,
			'WAKTU' 				=> $WAKTU,
			'MEDIA' 				=> $MEDIA,
			'BAYAR' 				=> ($BAYAR == TRUE ? 1 : 0),
			'ONLINE' 				=> ($ONLINE == TRUE ? 1 : 0),
			'DESKRIPSI' 			=> $DESKRIPSI,
		);

		$this->db->insert('tb_kompetisi', $event);

		$cek = ($this->db->affected_rows() != 1) ? false : true;

		if ($cek == TRUE) {
			// TIKET
			foreach ($NAMA_TIKET as $i => $a) {
				if ($NAMA_TIKET[$i] != "") {
					$tiket = array(
						'TYPE' 				=> 2,
						'KODE' 				=> $KODE_KOMPETISI,
						'NAMA_TIKET' 		=> isset($NAMA_TIKET[$i]) ? $NAMA_TIKET[$i] : '',
						'HARGA_TIKET'		=> isset($HARGA_TIKET[$i]) ? $HARGA_TIKET[$i] : '',
					);
					$this->db->insert('tb_tiket', $tiket);
				}
			}

			// SOSMED
			foreach ($NAMA_SOSMED as $j => $b) {
				if ($NAMA_SOSMED[$j] != "") {
					$sosmed = array(
						'TYPE' 				=> 2,
						'KODE' 				=> $KODE_KOMPETISI,
						'NAMA_SOSMED' 		=> isset($NAMA_SOSMED[$j]) ? $NAMA_SOSMED[$j] : '',
						'LINK_SOSMED'		=> isset($LINK_SOSMED[$j]) ? $LINK_SOSMED[$j] : '',
						'SOSMED'			=> isset($SOSMED[$j]) ? $SOSMED[$j] : '',
					);
					$this->db->insert('tb_sosmed', $sosmed);
				}
			}

			// CP
			foreach ($NAMA_CONTACT as $k => $a) {
				if ($NAMA_CONTACT[$k] != "") {
					$contact = array(
						'TYPE' 				=> 2,
						'KODE' 				=> $KODE_KOMPETISI,
						'NAMA_CONTACT' 		=> isset($NAMA_CONTACT[$k]) ? $NAMA_CONTACT[$k] : '',
						'CONTACT'			=> isset($CONTACT[$k]) ? $CONTACT[$k] : '',
						'CONTACT_MEDIA'		=> isset($CONTACT_MEDIA[$k]) ? $CONTACT_MEDIA[$k] : '',
					);
					$this->db->insert('tb_contact_person', $contact);
				}
			}
			return true;
		}else{
			$this->db->delete('tb_kompetisi', array('KODE_KOMPETISI', $KODE_KOMPETISI));
			return false;
		}
	}

	// PENGATURAN

	public function ubah_sosmed($KODE_PENYELENGGARA){
		$FACEBOOK 		= $this->input->post('FACEBOOK');
		$INSTAGRAM 		= $this->input->post('INSTAGRAM');
		$TWITTER 		= $this->input->post('TWITTER');
		$GITHUB 		= $this->input->post('GITHUB');

		$data = array(
			'FACEBOOK' 		=> ($FACEBOOK == "Belum diatur" ? null : $FACEBOOK),
			'INSTAGRAM' 	=> ($INSTAGRAM == "Belum diatur" ? null : $INSTAGRAM),
			'TWITTER' 		=> ($TWITTER == "Belum diatur" ? null : $TWITTER),
			'GITHUB' 		=> ($GITHUB == "Belum diatur" ? null : $GITHUB),
		);

		$this->db->where('KODE_PENYELENGGARA', $KODE_PENYELENGGARA);
		$this->db->update('tb_penyelenggara', $data);

		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function ubah_informasi($KODE_PENYELENGGARA){
		$NAMA_AKUN 		= $this->input->post('NAMA_AKUN');
		$HP 					= $this->input->post('HP');
		$ALAMAT 			= $this->input->post('ALAMAT');

		$NAMA 				= $this->input->post('NAMA');
		$INSTANSI 		= $this->input->post('INSTANSI');
		$DESKRIPSI 		= $this->input->post('DESKRIPSI');

		$akun = array(
			'NAMA' 		=> $NAMA_AKUN,
			'HP' 			=> $HP,
			'ALAMAT' 	=> $ALAMAT,
		);

		$this->db->where('KODE_USER', $this->session->userdata('kode_user'));
		$this->db->update('tb_pengguna', $akun);

		$data = array(
			'NAMA' 		=> $NAMA,
			'INSTANSI' 	=> $INSTANSI,
			'DESKRIPSI' => $DESKRIPSI,
		);

		$this->db->where('KODE_PENYELENGGARA', $KODE_PENYELENGGARA);
		$this->db->update('tb_penyelenggara', $data);

		return ($this->db->affected_rows() != 1) ? false : true;
	}
}
