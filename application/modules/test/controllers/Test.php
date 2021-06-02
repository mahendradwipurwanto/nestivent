<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MX_Controller {
  public function __construct(){
    parent::__construct();
  }

  public function index(){

    $stack = array();

    $data["nama"] = "mahendra";
    array_push($stack, $data);

    $data["email"] = "novan@";
    array_push($stack, $data);

    $data["alamat"] = "malang";
    array_push($stack, $data);

    $db =  json_encode($stack);

    print_f($db);

  }

  function qr_code(){
    $text = date("d-m-Y H:i:s");
    echo '<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='.$text.'&choe=UTF-8" title="Link to Google.com" />';
  }

  function word(){
    $str = 'qwerty!@#$@#$^@#$Hello %#$sdsds654ss';
    echo preg_replace(array('~[^a-zA-Z0-9\s]+~', '/ /'), array('', '-'), strtolower($str));
  }

  function set(){

    $cookie= array(

      'name'   => 'remember_me',
      'value'  => TRUE,
      'expire' => '300',
      'secure' => TRUE

    );

    $this->input->set_cookie($cookie);
    log_message('debug', 'Cookies agrement check');

    // echo $this->input->cookie('remember_me', TRUE);
  }

  public function encrypt(){
    $this->encryption->initialize(array('driver' => 'openssl'));
    $plain_text = 'This is a plain-text message!';
    $ciphertext = $this->encryption->encrypt($plain_text);
    echo $key = bin2hex($this->encryption->create_key(16));
    // Outputs: This is a plain-text message!
    // echo $this->encryption->decrypt($ciphertext);

  }

  public function rand(){
    $this->load->helper('string');
    echo random_string('numeric', 6);
  }

}
