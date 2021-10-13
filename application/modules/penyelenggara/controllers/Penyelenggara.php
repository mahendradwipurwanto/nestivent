<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyelenggara extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_penyelenggara');

	}

	public function index(){
		$this->load->library('pagination');

		$config['base_url'] 				= base_url().'penyelenggara/page';
		$config['total_rows'] 				= $this->M_penyelenggara->count_penyelenggara();
		$config['per_page'] 				= 12;

		$config['full_tag_open'] 			= '<nav aria-label="Page navigation example"><ul class="pagination justify-content-end pagination-sm">';
		$config['full_tag_close'] 			= '</ul></nav>';

		$config['next_link'] 				= '&raquo';
		$config['next_tag_open'] 			= '<li class="page-item">';
		$config['next_tag_close'] 			= '</li>';

		$config['prev_link'] 				= '&laquo';
		$config['prev_tag_open'] 			= '<li class="page-item">';
		$config['prev_tag_close'] 			= '</li>';

		$config['cur_tag_open'] 			= '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] 			= '<span class="sr-only">(current)</span></a></li>';

		$config['num_tag_open'] 			= '<li class="page-item">';
		$config['num_tag_close'] 			= '</li>';

		$config['attributes']				= array('class' => 'page-link');

		$this->pagination->initialize($config);

		$data['penyelenggara']				= $this->M_penyelenggara->get_penyelenggara($config['per_page'], (!$this->uri->segment(3) ? 0 : $this->uri->segment(3)));
		$data['featuredPenyelenggara']		= $this->M_penyelenggara->get_featuredPenyelenggara();

		$data['module'] 		= "penyelenggara";
		$data['fileview'] 		= "penyelenggara";
		echo Modules::run('template/frontend_main', $data);
	}

	public function penyelenggara_detail($id){
		if ($this->M_penyelenggara->get_penyelenggaraDetail($id) == false) {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat menampilkan data penyelenggara !!");
			redirect($this->agent->referrer());
		}else{
			$data['penyelenggara']	= $this->M_penyelenggara->get_penyelenggaraDetail($id);
			$data['event']			= $this->M_penyelenggara->get_Eventpenyelenggara($id);
			$data['kompetisi']		= $this->M_penyelenggara->get_Kompetisipenyelenggara($id);
			$data['CI']				= $this;

			$data['module'] 		= "penyelenggara";
			$data['fileview'] 		= "penyelenggara_detail";
			echo Modules::run('template/frontend_main', $data);
		}
	}

	function laporkan_penyelenggara(){
		if ($this->session->userdata('logged_in') == FALSE || !$this->session->userdata('logged_in')){

			$this->session->set_userdata('redirect', "penyelenggara/".$this->input->post('KODE_PENYELENGGARA'));
			$this->session->set_flashdata('error', "Harap login ke akun anda, untuk melanjutkan");
			redirect('login');
		}else{
			if ($this->M_penyelenggara->laporkan_penyelenggara() == TRUE) {
				$this->session->set_flashdata('success', "Berhasil melaporkan penyelenggara !!");
				redirect($this->agent->referrer());
			}else {
				$this->session->set_flashdata('error', "Terjadi kesalahan saat melaporkan penyelenggara !!");
				redirect($this->agent->referrer());
			}
		}
	}

	function kirimPesan_penyelenggara(){
		if ($this->session->userdata('logged_in') == FALSE || !$this->session->userdata('logged_in')){

			$this->session->set_userdata('redirect', "penyelenggara/".$this->input->post('KODE_PENYELENGGARA'));
			$this->session->set_flashdata('error', "Harap login ke akun anda, untuk melanjutkan");
			redirect('login');
		}else{
			if ($this->M_penyelenggara->kirimPesan_penyelenggara() == TRUE) {
				$this->session->set_flashdata('success', "Berhasil mengirim pesan ke penyelenggara !!");
				redirect($this->agent->referrer());
			}else {
				$this->session->set_flashdata('error', "Terjadi kesalahan saat mengirim pesan ke penyelenggara !!");
				redirect($this->agent->referrer());
			}
		}
	}

}?>
