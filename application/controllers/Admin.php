<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function register()
	{
		if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'adm' ) {
			$data['page_title'] = "Register New Employee | Maiga";
			$data['page'] = "registerview";
			$this->load->view('include/masterlogin', $data);
		} else {
			redirect('/','refresh');
		}
	}

	public function do_register()
	{
		if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'adm' ) {

		} else {

		}
	}

	public function uploadpayroll()
	{
		if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'adm' ) {
			$data['page_title'] = "Upload Payroll | Maiga";
			$data['page'] = "uploadpayrollview";
			$this->load->view('include/masterlogin', $data);
		} else {

		}
	}

	public function do_uploadpayroll()
	{
		if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'adm' ) {

		} else {

		}
	}

	public function downloadassignment()
	{
		if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'adm' ) {
			$data['page_title'] = "Download Assignment | Maiga";
			$data['page'] = "downloadassignmentview";
			$this->load->view('include/masterlogin', $data);
		} else {

		}
	}

	public function employeelist()
	{
		if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'adm' ) {
			$this->load->model('admin_model');
			$data['employees'] = $this->admin_model->get_all_employees();
			$data['page_title'] = "List Employee | Maiga";
			$data['page'] = "employeelistview";
			$this->load->view('include/masterlogin', $data);
		} else {

		}
	}

	public function updateemployee()
	{
		if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'adm' ) {

		} else {

		}
	}

	public function removeemployee()
	{
		if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'adm' ) {

		} else {
			
		}
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */