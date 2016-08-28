<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array( 'form', 'url' ));
    }

    public function uploadpayroll()
    {
        
    }

    public function do_upload()
    {
        $config['upload_path'] = './uploads/payrolls';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload()){
            $error = array('error' => $this->upload->display_errors());
        }
        else{
            $data = array('upload_data' => $this->upload->data());
            echo "success";
        }
    }

}

/* End of file Upload.php */
/* Location: ./application/controllers/Upload.php */