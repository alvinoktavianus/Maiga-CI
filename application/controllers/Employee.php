<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function profile()
	{
		if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'emp' ) {
			$this->load->model('employee_model');
			$data['page_title'] = "Profile | Maiga";
			$data['page'] = "profileview";
			$data['employee'] = $this->employee_model->find_by_email($this->session->userdata('user_session')['email']);
			$this->load->view('include/masterlogin', $data);
		} else {
			redirect('/','refresh');
		}
	}

	public function uploadassignment()
	{
		if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'emp' ) {
			$this->load->model('employee_model');
			$data['page_title'] = "Upload Assignment | Maiga";
			$data['page'] = "uploadassignmentview";
			$data['assignments'] = $this->employee_model->get_all_assignment($this->session->userdata('user_session')['email']);
			$this->load->view('include/masterlogin', $data);
		} else {
			redirect('/','refresh');
		}
	}

	public function downloadpayroll()
	{
		if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'emp' ) {
			$data['page_title'] = "Download Payroll | Maiga";
			$data['page'] = "downloadpayrollview";
			$this->load->view('include/masterlogin', $data);
		} else {
			redirect('/','refresh');
		}
	}

	public function do_uploadassignment()
	{
		
	}

	public function updateprofile()
	{
		if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'emp') {
			$this->load->model('employee_model');
			$data['page_title'] = "Update Profile | Maiga";
			$data['employee'] = $this->employee_model->find_detail_by_email($this->session->userdata('user_session')['email']);
			$data['page'] = "updateprofileview";
			$this->load->view('include/masterlogin', $data);
		} else {
			redirect('/','refresh');
		}
	}

	public function do_updateprofile()
	{
		if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'emp') {

			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('conf-pass', 'Ulangi Password', 'trim|required|matches[password]');
			$this->form_validation->set_rules('tempatlahir', 'Tempat Lahir', 'trim|required');
			$this->form_validation->set_rules('tanggallahir', 'Tanggal Lahir', 'trim|required');
			$this->form_validation->set_rules('mobile', 'No. HP.', 'trim|required|numeric');
			$this->form_validation->set_rules('namabank', 'Nama Bank', 'trim|required');
			$this->form_validation->set_rules('norekening', 'No. Rekening', 'trim|required|numeric');

			if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('errors', validation_errors());
			} else {
				
				$data = array(
					'nama' => $this->input->post('nama'),
					'tempatlahir' => $this->input->post('tempatlahir'),
					'tanggallahir' => $this->input->post('tanggallahir'),
					'mobile' => $this->input->post('mobile'),
					'password' => $this->bcrypt->hash_password($this->input->post('password')),
					'namabank' => $this->input->post('namabank'),
					'norekening' => $this->input->post('norekening')
				);

				$this->db->trans_begin();

				$this->load->model('employee_model');
				$this->employee_model->update_profile( $this->session->userdata('user_session')['email'], $data );

				$this->db->trans_commit();

				$this->session->set_flashdata('success', 'Successfully update profile!');

			}
			redirect('/employee/profile','refresh');
		} else {
			redirect('/','refresh');
		}
	}

}

/* End of file Employee.php */
/* Location: ./application/controllers/Employee.php */