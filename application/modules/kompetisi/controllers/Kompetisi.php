<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kompetisi extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_kompetisi');

	}

	public function index(){
		$this->load->library('pagination');

		$config['base_url'] 				= base_url().'kompetisi';
		$config['total_rows'] 				= $this->M_kompetisi->count_kompetisi();
		$config['per_page'] 				= 5;

		$config['full_tag_open'] 			= '<nav class="d-flex justify-content-between align-items-center" aria-label="Page navigation example"><ul class="pagination justify-content-center pagination-sm">';
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

		$data['kompetisi']			= $this->M_kompetisi->get_kompetisiAll($config['per_page'], (!$this->uri->segment(2) ? 0 : $this->uri->segment(2)));
		$data['c_kompetisi']		= $config['total_rows'];
		$data['CI']					= $this;

		$data['module'] 			= "kompetisi";
		$data['fileview'] 			= "kompetisi";
		echo Modules::run('template/frontend_main', $data);
	}

	public function kompetisi_list(){
		$this->load->library('pagination');

		$config['base_url'] 				= base_url().'kompetisi';
		$config['total_rows'] 				= $this->M_kompetisi->count_kompetisi();
		$config['per_page'] 				= 5;

		$config['full_tag_open'] 			= '<nav class="d-flex justify-content-between align-items-center" aria-label="Page navigation example"><ul class="pagination justify-content-center pagination-sm">';
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

		$data['kompetisi']		= $this->M_kompetisi->get_kompetisiAll($config['per_page'], (!$this->uri->segment(2) ? 0 : $this->uri->segment(2)));
		$data['c_kompetisi']	= $config['total_rows'];
		$data['CI']				= $this;

		$data['module'] 		= "kompetisi";
		$data['fileview'] 		= "kompetisi_list";
		echo Modules::run('template/frontend_main', $data);
	}

	public function kompetisi_detail($id){
		if ($this->M_kompetisi->get_kompetisiDetail($id) == false) {
			$this->session->set_flashdata('error', 'Terjadi kesalahan saat mencari detail kompetisi!!');
			redirect($this->agent->referrer());
		}else{

			$data['daftar']		= $this->M_kompetisi->cek_dataPeserta($this->session->userdata('kode_user'), $id);
			$data['kompetisi']	= $this->M_kompetisi->get_kompetisiDetail($id);
			$data['bidang']		= $this->M_kompetisi->get_kompetisiBidang($id);
			$data['unduhan']	= $this->M_kompetisi->get_berkasUnduhan($id);

			$data['tiket']		= $this->M_kompetisi->get_tiketKompetisi($id);
			$data['sosmed']		= $this->M_kompetisi->get_sosmedKompetisi($id);
			$data['contact']	= $this->M_kompetisi->get_contactKompetisi($id);
			$data['CI']			= $this;

			$data['module'] 	= "kompetisi";
			$data['fileview'] 	= "kompetisi_detail";
			echo Modules::run('template/frontend_main', $data);
		}
	}

	public function galeri_karya($id){

		$data['module'] 	= "kompetisi";
		$data['fileview'] 	= "galeri_karya";
		echo Modules::run('template/frontend_main', $data);
	}

}?>
