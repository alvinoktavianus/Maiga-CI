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

			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[employees.email]');
			$this->form_validation->set_rules('name', 'Nama', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('conf-pass', 'Ulangi Password', 'trim|required|matches[password]');
			$this->form_validation->set_rules('lob', 'Tempat Lahir', 'trim|required');
			$this->form_validation->set_rules('dob', 'Tanggal Lahir', 'trim|required');
			$this->form_validation->set_rules('mobile', 'No. HP', 'trim|required|numeric');
			$this->form_validation->set_rules('department', 'Departemen', 'trim|required');
			$this->form_validation->set_rules('startwork', 'Mulai Bekerja', 'trim|required');
			$this->form_validation->set_rules('bankaccountname', 'Nama Bank Karyawan', 'trim|required');
			$this->form_validation->set_rules('bankaccountnumber', 'No. Rekening Karyawan', 'trim|required');

			if ($this->form_validation->run() == FALSE) {

				$this->session->set_flashdata('email', $this->input->post('email'));
				$this->session->set_flashdata('name', $this->input->post('name'));
				$this->session->set_flashdata('password', $this->input->post('password'));
				$this->session->set_flashdata('conf-pass', $this->input->post('conf-pass'));
				$this->session->set_flashdata('lob', $this->input->post('lob'));
				$this->session->set_flashdata('dob', $this->input->post('dob'));
				$this->session->set_flashdata('mobile', $this->input->post('mobile'));
				$this->session->set_flashdata('department', $this->input->post('department'));
				$this->session->set_flashdata('startwork', $this->input->post('startwork'));
				$this->session->set_flashdata('bankaccountname', $this->input->post('bankaccountname'));
				$this->session->set_flashdata('bankaccountnumber', $this->input->post('bankaccountnumber'));
				$this->session->set_flashdata('errors', validation_errors());

			} else {
				
				$data = array(
					'nama' => $this->input->post('name'),
					'tempatlahir' => $this->input->post('lob'),
					'tanggallahir' => $this->input->post('dob'),
					'mobile' => $this->input->post('mobile'),
					'email' => $this->input->post('email'),
					'password' => $this->bcrypt->hash_password($this->input->post('password')),
					'jabatan' => $this->input->post('position'),
					'department' => $this->input->post('department'),
					'mulaibekerja' => $this->input->post('startwork'),
					'namabank' => $this->input->post('bankaccountname'),
					'norekening' => $this->input->post('bankaccountnumber'),
					'status' => $this->input->post('status'),
					'iskontrak' => $this->input->post('iscontract'),
					'role' => $this->input->post('role')
				);

				$this->db->trans_begin();

				$this->load->model('admin_model');
				$this->admin_model->register_new_employee($data);

				$this->db->trans_commit();

				$this->session->set_flashdata('success', 'Successfully create new employee!');

			}

			redirect('/admin/register','refresh');

		} else {
			redirect('/','refresh');
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
			redirect('/','refresh');
		}
	}

	public function updateemployee()
	{
		if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'adm' && $this->input->get('email') != null ) {
			$this->load->model('user_model');
			$data['profile'] = $this->user_model->find_by_email($this->input->get('email'))[0];
			$data['page'] = "updateemployee";
			$data['page_title'] = "Update Employee | Maiga";
			$this->load->view('include/masterlogin', $data);
		} else {
			redirect('/','refresh');
		}
	}

	public function do_update_employee()
	{
		if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'adm' && $this->input->get('email') != null ) {

			if ( $this->input->post('endwork') != null ) {
				$data['selesaibekerja'] = $this->input->post('endwork');
				$data['status'] = "Tidak Aktif";
			}
			$data['jabatan'] = $this->input->post('position');
			$data['department'] = $this->input->post('department');

			$this->db->trans_begin();

			$this->load->model('admin_model');
			$this->admin_model->update_employee($this->input->get('email'), $data);

			$this->db->trans_commit();

			$this->session->set_flashdata('success', "Successfully update ".$this->input->get('email').'.');
			redirect('/admin/employeelist', 'refresh');

		} else {
			redirect('/','refresh');
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