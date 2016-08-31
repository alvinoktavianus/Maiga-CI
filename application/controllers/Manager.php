<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {

    public function index()
    {
        if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'mgr' ) {
            $data['page_title'] = "Manager | Treezia";
            $data['page'] = 'homeview';
            $this->load->view('include/masterlogin', $data);
        } else {
            redirect('/','refresh');
        }
    }

    public function checkassignment()
    {
        if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'mgr' ) {
            $this->load->model('manager_model');
            $data['page_title'] = "Check Assignment | Treezia";
            $data['page'] = 'checkassignmentview';
            $data['assignments'] = $this->manager_model->get_all_assignment();
            $this->load->view('include/masterlogin', $data);
        } else {
            redirect('/','refresh');
        }
    }

    public function downloadassignment()
    {
        if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'mgr' && $this->input->get('filename') != null ) {
            $path = './uploads/assignments/'.$this->input->get('filename');
            force_download($path, NULL);
        } else {
            redirect('/','refresh');
        }
    }

    public function updateassignmentstatus()
    {
        if ( $this->session->has_userdata('user_session') &&
             $this->session->userdata('user_session')['role'] == 'mgr' &&
             $this->input->get('email') != null &&
             $this->input->get('filename') != null &&
             $this->input->get('status') != null ) {

            $data = array(
                
            );

            redirect('/manager/checkassignment','refresh');

        } else {
            redirect('/','refresh');
        }
    }

}

/* End of file Manager.php */
/* Location: ./application/controllers/Manager.php */