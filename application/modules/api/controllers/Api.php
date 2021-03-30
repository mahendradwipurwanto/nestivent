<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_api');

	}

}?>
