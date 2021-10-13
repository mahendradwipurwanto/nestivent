<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MX_Controller {
  public function __construct(){
    parent::__construct();
  }

  function email_valid($email){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Valid";
    }else{
      echo "Tidak valid";
    }
  }

  function para(){
    $string = '<p>Toasts are intended to be small interruptions to your visitors or users, so to help those with screen readers and similar assistive technologies, you should wrap your toasts in an <a href="https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/ARIA_Live_Regions"><code class="language-plaintext highlighter-rouge">aria-live</code> region</a>. Changes to live regions (such as injecting/updating a toast component) are automatically announced by screen readers without needing to move the user’s focus or otherwise interrupt the user. Additionally, include <code class="language-plaintext highlighter-rouge">aria-atomic="true"</code> to ensure that the entire toast is always announced as a single (atomic) unit, rather than announcing what was changed (which could lead to problems if you only update part of the toast’s content, or if displaying the same toast content at a later point in time). If the information needed is important for the process, e.g. for a list of errors in a form, then use the <a href="/docs/4.5/components/alerts/">alert component</a> instead of toast.</p><p>Note that the live region needs to be present in the markup <em>before</em> the toast is generated or updated. If you dynamically generate both at the same time and inject them into the page, they will generally not be announced by assistive technologies.</p><p>You also need to adapt the <code class="language-plaintext highlighter-rouge">role</code> and <code class="language-plaintext highlighter-rouge">aria-live</code> level depending on the content. If it’s an important message like an error, use <code class="language-plaintext highlighter-rouge">role="alert" aria-live="assertive"</code>, otherwise use <code class="language-plaintext highlighter-rouge">role="status" aria-live="polite"</code> attributes.</p>';
    echo $first = substr($string, strpos($string, "<p"), strpos($string, "</p>")+4);
    echo "<hr>";
    echo substr($string, strpos($string, "</p>"));
  }

  public function backend(){

    $data['module'] 		= "Test";
    $data['fileview'] 	= "test";
    echo Modules::run('template/backend_main', $data);
  }

  public function desc(){
    $kode = "L-KRT-IUTOJM9B";

    $get = $this->db->query("SELECT DESKRIPSI FROM TB_PENYELENGGARA WHERE KODE_PENYELENGGARA = '$kode'")->row()->DESKRIPSI;

    $data = json_decode($get);

    print_r(array_values($data));;
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
