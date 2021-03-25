<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* HODController
*/
class Hod extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Hod_model');

	}

	public function index()
	{
		echo "WE";
		// $this->load->view('welcome', $data);
	}

	public function pengguna_masuk()
	{
		$this->load->view('login');
	}
}

/* End of file HODController.php */
/* Location: ./application/modules/hod/controller/HODController.php */
