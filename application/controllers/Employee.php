<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function index()
	{
		if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'emp' ) {
			$this->load->model('employee_model');
			$data['page_title'] = "Employee ".$this->session->userdata('user_session')['email']." | Maiga";
			$data['page'] = 'homeview';
			$data['profile'] = $this->employee_model->find_by_email($this->session->userdata('user_session')['email']);
			$this->load->view('include/masterlogin', $data);
		} else {
			redirect('/','refresh');
		}
	}

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
			$data['options'] = $this->employee_model->get_topic();
			$data['assignments'] = $this->employee_model->get_all_assignment($this->session->userdata('user_session')['email']);
			$this->load->view('include/masterlogin', $data);
		} else {
			redirect('/','refresh');
		}
	}

	public function downloadpayroll()
	{
		if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'emp' ) {
			$this->load->model('employee_model');
			$data['page_title'] = "Download Payroll | Maiga";
			$data['page'] = "downloadpayrollview";
			$data['payrolls'] = $this->employee_model->get_all_payrolls_by_email($this->session->userdata('user_session')['email']);
			$this->load->view('include/masterlogin', $data);
		} else {
			redirect('/','refresh');
		}
	}

	public function getpayroll()
	{
		if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'emp' && $this->input->get('filename') != null ) {
			$path = "./uploads/payrolls/".$this->input->get('filename');
			force_download($path, NULL);
		} else {
			redirect('/','refresh');
		}
	}

	public function do_upload_revision()
	{
		if ( $this->session->has_userdata('user_session') &&
			 $this->session->userdata('user_session')['role'] == 'emp' &&
			 $this->input->get('topic') != null &&
			 $this->input->get('filename') != null ) {

			$config['upload_path'] = './uploads/assignments/';
			$config['allowed_types'] = 'doc|docx';

			$this->upload->initialize($config);

			if ( $this->upload->do_upload('revision')){

				$data = $this->upload->data();

				$email = $this->session->userdata('user_session')['email'];
				$topic = $this->input->get('topic');
				$filename = $this->input->get('filename');

				$query = array(
					'assignment' => $data['file_name'],
					'status' => 'P',
					'updatedttm' => date('Y-m-d H:i:s', now('Asia/Jakarta'))
				);

				$this->db->trans_begin();

				$this->load->model('employee_model');
				$this->employee_model->update_assignment( $email, $topic, $filename, $query );

				$this->db->trans_commit();

			}

			redirect('/employee/uploadassignment','refresh');

		} else {
			redirect('/','refresh');
		}
	}

	public function do_uploadassignment()
	{
		if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'emp' ) {

			$this->form_validation->set_rules('description', 'Description', 'trim|required');

			if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('errors', validation_errors());
				redirect('/employee/uploadassignment','refresh');
			} else {

				$config['upload_path'] = './uploads/assignments/';
				$config['allowed_types'] = 'doc|docx';
				
				$this->upload->initialize($config);
				
				if ( $this->upload->do_upload('assignment')){

					$data = $this->upload->data();

					$query = array(
						'email' => $this->session->userdata('user_session')['email'],
						'assignment' => $data['file_name'],
						'description' => $this->input->post('description'),
						'uploadedby' => 'emp'
					);

					$this->db->trans_begin();

					$this->load->model('employee_model');
					$this->employee_model->insert_assignment_by_email( $this->session->userdata('user_session')['email'], $query );

					$this->db->trans_commit();

					$this->session->set_flashdata('success', 'Successfully upload assignment.');

					redirect('/employee/uploadassignment','refresh');
				}
				else{
					$this->session->set_flashdata('errors', $this->upload->display_errors());
					redirect('/employee/uploadassignment','refresh');
				}

			}

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