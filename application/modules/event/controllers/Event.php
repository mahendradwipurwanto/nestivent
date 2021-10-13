<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_event');

	}

	public function index(){
		$this->load->library('pagination');

		$config['base_url'] 				= base_url().'event';
		$config['total_rows'] 				= $this->M_event->count_event();
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

		$data['event']	= $this->M_event->get_eventAll($config['per_page'], (!$this->uri->segment(2) ? 0 : $this->uri->segment(2)));
		$data['CI']					= $this;

		$data['module'] 	= "event";
		$data['fileview'] 	= "event";
		echo Modules::run('template/frontend_main', $data);
	}

	public function event_detail($id){

		if ($this->M_event->get_eventDetail($id) == FALSE) {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat menampilkan detail event tersebut !!");
			redirect($this->agent->referrer());
		}else{

			$data['daftar']		= $this->M_event->cek_dataPeserta($this->session->userdata('kode_user'), $id);
			$data['event']		= $this->M_event->get_eventDetail($id);

			$data['tiket']		= $this->M_event->get_tiketEvent($id);
			$data['sosmed']		= $this->M_event->get_sosmedEvent($id);
			$data['contact']	= $this->M_event->get_contactEvent($id);
			$data['CI']			= $this;

			$data['module'] 	= "event";
			$data['fileview'] 	= "event_detail";
			echo Modules::run('template/frontend_main', $data);
		}
	}

}?>
