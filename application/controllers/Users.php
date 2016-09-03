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
									'isloggedin' => true,
									'profilepic' => $result->profilepic
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

	public function editprofile()
	{
		if ( $this->session->has_userdata('user_session') ) {
			$this->load->model('user_model');
			$data['page_title'] = 'Edit Profile | Maiga';
			$data['page'] = "editprofileview";
			$data['profile'] = $this->user_model->find_by_email( $this->session->userdata('user_session')['email'] )[0];
			$this->load->view('include/masterlogin', $data);
		} else {
			redirect('/','refresh');
		}
	}

	public function do_editprofile()
	{
		if ( $this->session->has_userdata('user_session') ) {

			$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]');
			$this->form_validation->set_rules('conf-pass', 'Ulangi Password', 'trim|matches[password]');
			$this->form_validation->set_rules('lob', 'Tempat Lahir', 'trim');
			$this->form_validation->set_rules('dob', 'Tanggal Lahir', 'trim');
			$this->form_validation->set_rules('bankaccountname', 'Nama Bank Karyawan', 'trim');
			$this->form_validation->set_rules('bankaccountnumber', 'No. Rekening Karyawan', 'trim');

			if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('errors', validation_errors());
			} else {
				$this->load->model('user_model');
				$currentprofile = $this->user_model->find_by_email( $this->session->userdata('user_session')['email'] )[0];
				$currpassword = $currentprofile->password;

				if ( $this->input->post('old-password') != null ) {
					if ($this->bcrypt->check_password($this->input->post('old-password'), $currpassword)) {
						$query['password'] = $this->bcrypt->hash_password($this->input->post('password'));
					} else {
						$this->session->set_flashdata('errors', 'Password lama tidak sesuai');
						redirect('/users/editprofile','refresh');
					}
				}

				if ( $currentprofile->tempatlahir != $this->input->post('lob') ) $query['tempatlahir'] = $this->input->post('lob');
				if ( $currentprofile->tanggallahir != $this->input->post('dob') ) $query['tanggallahir'] = $this->input->post('dob');
				if ( $currentprofile->namabank != $this->input->post('bankaccountname') ) $query['namabank'] = $this->input->post('bankaccountname');
				if ( $currentprofile->norekening != $this->input->post('bankaccountnumber') ) $query['norekening'] = $this->input->post('bankaccountnumber');

				if ( $_FILES['profilepic']['name'] != "" ) {
	                $config['upload_path'] = './uploads/profilepics/';
	                $config['allowed_types'] = 'jpg|jpeg|png';
	                
	                $this->upload->initialize($config);
	                
	                if ( $this->upload->do_upload('profilepic')){

	                    $data = $this->upload->data();
	                    $query['profilepic'] = $data['file_name'];

	                    $session = $this->session->userdata('user_session');
	                    $session['profilepic'] = $data['file_name'];
	                    $this->session->set_userdata( 'user_session', $session );

	                }
	                else{
	                    $this->session->set_flashdata('errors', $this->upload->display_errors());
	                    redirect('/users/editprofile','refresh');
	                }
				}
				
				if ( isset($query) ) {
					$this->db->trans_begin();
					$this->user_model->update_by_email( $this->session->userdata('user_session')['email'], $query );
					$this->db->trans_commit();

					$this->session->set_flashdata('success', 'Berhasil perbaharui data');
				}
			}

			redirect('/users/editprofile','refresh');

		} else {
			redirect('/','refresh');
		}
	}

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */