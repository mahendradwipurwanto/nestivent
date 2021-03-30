<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_blog');

	}

	public function index(){

		$data['module'] 		= "blog";
		$data['fileview'] 	= "blog_list";
		echo Modules::run('template/frontend_main', $data);
	}

	public function blog_detail($id){

		$data['module'] 		= "blog";
		$data['fileview'] 	= "blog_detail";
		echo Modules::run('template/frontend_main', $data);
	}
}
