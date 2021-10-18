<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_pendaftaran', 'M_daftar');
		$this->load->model('Authentication/M_authentication');

	}

	public function daftar($kode){

		if ($this->M_daftar->get_kegiatan($kode) != false) {
			if ($this->M_daftar->get_formMeta($kode) != false) {
				if ($this->M_daftar->cek_dataPeserta($kode, $this->session->userdata('kode_user')) == false) {
					$data['kegiatan']		= $this->M_daftar->get_kegiatan($kode);
					$data['formulir']		= $this->M_daftar->get_formMeta($kode);
					$data['KODE_KEGIATAN']	= $kode;

					$data['controller']			= $this;

					$data['module'] 	= "pendaftaran";
					$data['fileview'] 	= "pendaftaran";
					echo Modules::run('template/frontend_main', $data);
				}else{
					$this->session->set_flashdata('warning', "Anda telah mendaftarkan diri pada kegiatan ini !!");
					redirect(site_url($this->M_daftar->cek_dataPeserta($kode, $this->session->userdata('kode_user'))->KEGIATAN.'/'.$this->M_daftar->cek_dataPeserta($kode, $this->session->userdata('kode_user'))->KODE));
				}
			}else{
				$this->session->set_flashdata('error', "Tidak dapat menemukan formulir kegiatan tersebut !!");
				redirect($this->agent->referrer());
			}
		}else{
			$this->session->set_flashdata('error', "Tidak dapat menemukan kegiatan tersebut !!");
			redirect($this->agent->referrer());
		}
	}

	function prosesPendaftaran($kegiatan){

		if ($kegiatan == "event") {
			$tabel = "PENDAFTARAN_EVENT";
		}else{
			$tabel = "PENDAFTARAN_KOMPETISi";
		}

		$uniqid		= strtolower($this->session->userdata('kode_user'));
		$time 		= substr(md5(time()), 0, 6);

		do {
			$KODE_PENDAFTARAN      = "{$uniqid}-{$time}";
		} while ($this->M_daftar->cek_kodeDaftar($KODE_PENDAFTARAN) > 0);

		$KODE_KOMPETISI		= $this->input->post('KODE_KOMPETISI');
		$KODE_KEGIATAN		= $this->input->post('KODE_KEGIATAN');
		$ID_TIKET			= $this->input->post('ID_TIKET');
		$ID_FORM			= $this->input->post('ID_FORM', true);
		$ID_FORM_FILE		= $this->input->post('ID_FORM_FILE', true);
		$TYPE				= $this->input->post('TYPE', true);
		$JAWABAN			= $this->input->post('JAWABAN');
		$FILE_SIZE			= $this->input->post('FILE_SIZE', true);
		$FILE_TYPE			= $this->input->post('FILE_TYPE', true);

		if ($kegiatan == "event") {
			$daftar = array(
				'KODE_PENDAFTARAN' 	=> $KODE_PENDAFTARAN, 
				'KODE_EVENT'		=> $KODE_KEGIATAN, 
				'KODE_USER' 		=> $this->session->userdata('kode_user'), 
				'ID_TIKET' 			=> $ID_TIKET,
			);
		}else{
			$daftar = array(
				'KODE_PENDAFTARAN' 	=> $KODE_PENDAFTARAN, 
				'KODE_KOMPETISI'		=> $KODE_KEGIATAN, 
				'KODE_USER' 		=> $this->session->userdata('kode_user'), 
				'ID_TIKET' 			=> $ID_TIKET,
			);
		}
			
		$prosesJawaban = false;

		if ($this->M_daftar->insert_pendaftaran($daftar, $tabel) == true) {

			$cpt = count($_FILES['JAWABAN']['name']);
			for($j=0; $j<$cpt; $j++) {
				if (!empty($_FILES['JAWABAN']['name'])) {
				      // CREATE FILENAME

					$files = $_FILES['JAWABAN'];

					echo var_dump($_FILES['JAWABAN']['name'][$j]);

					$_FILES['BERKAS[]']['name']		= $files['name'][$j];
					$_FILES['BERKAS[]']['type']		= $files['type'][$j];
					$_FILES['BERKAS[]']['tmp_name']	= $files['tmp_name'][$j];
					$_FILES['BERKAS[]']['error']	= $files['error'][$j];
					$_FILES['BERKAS[]']['size']		= $files['size'][$j];

					$time   	= time();
					$KODE_USER  = $this->session->userdata('kode_user');

					$folder   	= "berkas/pendaftaran/{$KODE_USER}/{$kegiatan}/{$KODE_KEGIATAN}/";

					if (!is_dir($folder)) {
						mkdir($folder, 0755, true);
					}

					$config['upload_path']          = $folder;
					$config['allowed_types']        = '*';
					$config['max_size']             = 10*1024;
					$config['overwrite']            = true;

					$this->load->library('upload', $config);
					if ($this->upload->do_upload('BERKAS[]')) {
						$upload_data 	= $this->upload->data();

						$data = array(
							'KODE_PENDAFTARAN' 	=> $KODE_PENDAFTARAN, 
							'ID_FORM'			=> isset($ID_FORM_FILE[$j]) ? $ID_FORM_FILE[$j] : null, 
							'JAWABAN' 			=> $upload_data['file_name']
						);
						if ($this->M_daftar->insert_jawaban($data) == false) {
							break;
							// echo "a";
							$this->M_daftar->delete_pendaftaran($KODE_PENDAFTARAN, $tabel);
							$this->session->set_flashdata('error', "Terjadi kesalahan saat mengirim jawaban anda !!");
							redirect($this->agent->referrer());
						}else{
							$prosesJawaban = true;
						}
					}else{
						break;
						// echo "b";
						$this->M_daftar->delete_pendaftaran($KODE_PENDAFTARAN, $tabel);
						$this->session->set_flashdata('error', "Terjadi kesalahan saat mengunggah berkas anda !!");
						redirect($this->agent->referrer());
					}
				}else{
					break;
					// echo "c";
					$this->M_daftar->delete_pendaftaran($KODE_PENDAFTARAN, $tabel);
					$this->session->set_flashdata('error', "Terjadi kesalahan, anda belum memilih berkas !!");
					redirect($this->agent->referrer());
				}
			}


			if($this->input->post('BAYAR') == 1){
	
				// UPLOAD FILE
				$con['upload_path']          = $folders;
				$con['allowed_types']        = 'JPEG|jpeg|JPG|jpg|PNG|png';
				$con['max_size']             = 1024*10;
				$con['overwrite']						= TRUE;
	
				$this->load->library('upload', $con);
				if ($this->upload->do_upload('BUKTI_BAYAR')){
					$upload_data 	= $this->upload->data();
					$this->db->where('KODE_PENDAFTARAN', $KODE_PENDAFTARAN);
					$this->db->update('PENDAFTARAN_EVENT', array('BUKTI_BAYAR' => $upload_data['file_name']));
				}
			}
			foreach ($ID_FORM as $i => $a) {
				if ($TYPE[$i] != "FILE") {
					$data = array(
						'KODE_PENDAFTARAN' 	=> $KODE_PENDAFTARAN, 
						'ID_FORM'			=> isset($ID_FORM[$i]) ? $ID_FORM[$i] : null, 
						'JAWABAN' 			=> isset($JAWABAN[$i]) ? $JAWABAN[$i] : null
					);
					if ($this->M_daftar->insert_jawaban($data) == false) {
						break;
						// echo "d";
						$this->M_daftar->delete_pendaftaran($KODE_PENDAFTARAN, $tabel);
						$this->session->set_flashdata('error', "Terjadi kesalahan saat mengirim jawaban anda !!");
						redirect($this->agent->referrer());
					}else{
						// echo "e";
						$prosesJawaban = true;
					}
				}

			}
			if ($prosesJawaban == true) {
				$this->session->set_flashdata('success', "Berhasil mengirim data pendaftaran anda !!");
				if ($kegiatan == "event") {
					$this->M_authentication->log_aktivitas($this->session->userdata('kode_user'), $this->session->userdata('kode_user'), 13);
					redirect(site_url('pengguna/event'));
				}else{
					$this->M_authentication->log_aktivitas($this->session->userdata('kode_user'), $this->session->userdata('kode_user'), 14);
					redirect(site_url('pengguna/kompetisi'));
				}
			}else{
				$this->M_daftar->delete_pendaftaran($KODE_PENDAFTARAN, $tabel);
				$this->session->set_flashdata('error', "Terjadi kesalahan saat mengirim jawaban anda !!");
				redirect($this->agent->referrer());
			}
		}else{
			$this->M_daftar->delete_pendaftaran($KODE_PENDAFTARAN, $tabel);
			$this->session->set_flashdata('error', "Terjadi kesalahan saat mengirim pendaftaran anda !!");
			redirect($this->agent->referrer());
		}

	}

}?>
