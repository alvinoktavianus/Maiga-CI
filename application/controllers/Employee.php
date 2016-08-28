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
			$data['page_title'] = "Upload Assignment | Maiga";
			$data['page'] = "uploadassignmentview";
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
		if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'emp' ) {
			$data['page_title'] = "Update Profile | Maiga";
			$data['page'] = "updateprofileview";
			$this->load->view('include/masterlogin', $data);
		} else {
			redirect('/','refresh');
		}
	}

	public function do_updateprofile()
	{
		
	}

}

/* End of file Employee.php */
/* Location: ./application/controllers/Employee.php */