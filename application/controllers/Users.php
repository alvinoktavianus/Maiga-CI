<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		if ( !$this->session->has_userdata('user_session') ) {
			$this->load->view('include/login');
		} else {
			switch ($this->session->userdata('user_session')['role']) {
				case 'adm':
					redirect('/admin','refresh');
					break;
				case 'mgr':
					redirect('/manager','refresh');
					break;
				case 'emp':
					redirect('/employee','refresh');
					break;
			}
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
				$email = $this->input->post('inputEmail');
				$password = $this->input->post('inputPassword');

				$this->load->model('user_model');

				if (count($this->user_model->find_by_email($email)) == 1) {

					foreach($this->user_model->find_by_email($email) as $result) {
						if ( $result->email == $email && $this->bcrypt->check_password($password, $result->password) ) {
							if ( $result->status == 'Aktif' ) {
								$array = array(
									'email' => $result->email,
									'role' => $result->role,
									'isloggedin' => true
								);
								$this->session->set_userdata( 'user_session', $array );
								$data['page'] = 'homeview';
								switch ($result->role) {
									case 'adm':
										redirect('/admin','refresh');
										break;
									case 'mgr':
										redirect('/manager','refresh');
										break;
									case 'emp':
										redirect('/employee','refresh');
										break;
								}
							} else {
								$this->session->set_flashdata('errors', 'Account has been disabled by administrator.');
							}
						} else {
							$this->session->set_flashdata('errors', 'Wrong email address or password!');
						}
					}

				} else {
					$this->session->set_flashdata('errors', 'Wrong email adress or password!');
				}

			}
			redirect('/','refresh');

		} else {
			redirect('/','refresh');
		}
	}

	public function do_logout()
	{
        if ( $this->session->has_userdata('user_session') ) {
            $this->session->unset_userdata('user_session');
        }
        redirect('/','refresh');
	}

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */