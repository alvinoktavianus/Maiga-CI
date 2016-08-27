<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		if ( !$this->session->has_userdata('user_session') ) {
			$this->load->view('include/login');
		} else {

		}
	}

	public function do_login()
	{
		if ( !$this->session->has_userdata('user_session') ) {

			$this->form_validation->set_rules('inputEmail', 'Email address', 'trim|required|valid_email');
			$this->form_validation->set_rules('inputPassword', 'Password', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('errors', validation_errors());
			} else {
				# code...
			}
			redirect('/','refresh');

		} else {
			redirect('/','refresh');
		}
	}

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */