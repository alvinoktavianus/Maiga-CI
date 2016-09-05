<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {

    public function index()
    {
        if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'mgr' ) {
            $this->load->model('manager_model');
            $data['page_title'] = "Manager | Maiga";
            $data['page'] = 'homeview';
            $data['profile'] = $this->manager_model->find_by_email($this->session->userdata('user_session')['email']);
            $this->load->view('include/masterlogin', $data);
        } else {
            redirect('/','refresh');
        }
    }

    public function checkassignment()
    {
        if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'mgr' ) {
            $this->load->model('manager_model');
            $data['page_title'] = "Check Assignment | Maiga";
            $data['page'] = 'checkassignmentview';
            $data['topics'] = $this->manager_model->get_all_topics();
            $data['csrf'] = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            );
            $this->load->view('include/masterlogin', $data);
        } else {
            redirect('/','refresh');
        }
    }

    public function checkassignments()
    {
        if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'mgr' && $this->input->get('topic') != null ) {
            $this->load->model('manager_model');
            $data['page_title'] = "Check Assignment by topic : ".$this->input->get('topic')." | Maiga";
            $data['topic'] = $this->input->get('topic');
            $data['topics'] = $this->manager_model->get_all_topics();
            $data['page'] = 'checkassignmentsview';
            $data['assignments'] = $this->manager_model->get_assignments_by_topic( $this->input->get('topic') );
            $this->load->view('include/masterlogin', $data);
        } else {
            redirect('/','refresh');
        }
    }

    public function createassignment()
    {
        if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'mgr' ) {
            $this->load->model('manager_model');
            $data['page_title'] = "Create Assignment | Maiga";
            $data['page'] = 'createassignmentview';
            $data['homeworks'] = $this->manager_model->get_all_homework();
            $this->load->view('include/masterlogin', $data);
        } else {
            redirect('/','refresh');
        }
    }

    public function do_createassignment()
    {
        if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'mgr' ) {

            $this->form_validation->set_rules('topic', 'Topik', 'trim|required|is_unique[homeworks.topic]');

            if ($this->form_validation->run() == false) {
                
                $this->session->set_flashdata('topic', $this->input->post('topic'));
                $this->session->set_flashdata('errors', validation_errors());

            } else {
                
                $query = array(
                    'topic' => $this->input->post('topic'),
                    'assignedfor' => 'emp',
                    'createdby' => 'mgr'
                );

                if ( $_FILES['filetugas']['name'] != "" ) {
                    $config['upload_path'] = './uploads/homeworks/';
                    $config['allowed_types'] = 'doc|docx|pdf|xls|xlsx';
                    
                    $this->upload->initialize($config);
                    
                    if ( $this->upload->do_upload('filetugas')){
                        $data = $this->upload->data();
                        $query['homework'] = $data['file_name'];
                    }
                    else{
                        $this->session->set_flashdata('topic', $this->input->post('topic'));
                        $this->session->set_flashdata('errors', $this->upload->display_errors());
                    }
                }

                $this->db->trans_begin();

                $this->load->model('manager_model');
                $this->manager_model->create_new_assignment( $query );

                $this->db->trans_commit();

            }

            redirect('/manager/createassignment','refresh');

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
             $this->input->get('status') != null &&
             $this->input->get('topic') != null ) {

            $data = array(
                'status' => $this->input->get('status'),
                'checkedon' => date('Y-m-d H:i:s', now('Asia/Jakarta'))
            );

            $this->db->trans_begin();

            $this->load->model('manager_model');
            $this->manager_model->update_assignment( $this->input->get('email'), $data, $this->input->get('filename') );

            $this->db->trans_commit();

            $param = $this->security->get_csrf_token_name().'='.$this->security->get_csrf_hash().'&topic='.$this->input->get('topic');

            redirect('/manager/checkassignments?'.$param,'refresh');

        } else {
            redirect('/','refresh');
        }
    }

}

/* End of file Manager.php */
/* Location: ./application/controllers/Manager.php */