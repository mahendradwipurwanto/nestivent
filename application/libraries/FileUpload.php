<?php defined('BASEPATH') OR exit('No direct script access allowed');

class FileUpload{

  public function upload($file, $file_name, $folder){

    if (!is_dir($folder)) {
      mkdir($folder, 0755, true);
    }

    $config['upload_path']          = $folder;
    $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|doc|docx';
    $config['max_size']             = 8192;
    $config['overwrite'] 						= true;
    $config['file_ext_tolower'] 	  = true;
    $config['file_name'] 	  				= $file_name;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload($file)){
      // $error = array('error' => $this->upload->display_errors());
      // print_r($error);
      return FALSE;
    }else{
      // $data = array('upload_data' => $this->upload->data());
      return TRUE;
    }
  }

}
?>
