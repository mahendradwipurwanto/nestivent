<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zoom extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_zoom');

	}

}?>
