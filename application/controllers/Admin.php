<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'adm' ) {
			$data['page_title'] = "Admin Home | Maiga";
			$data['page'] = 'homeview';
			$this->load->view('include/masterlogin', $data);
		} else {
			redirect('/','refresh');
		}
	}

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
			$this->form_validation->set_rules('lob', 'Tempat Lahir', 'trim');
			$this->form_validation->set_rules('dob', 'Tanggal Lahir', 'trim');
			$this->form_validation->set_rules('mobile', 'No. HP', 'trim|required|numeric');
			$this->form_validation->set_rules('department', 'Departemen', 'trim|required');
			$this->form_validation->set_rules('startwork', 'Mulai Bekerja', 'trim|required');
			$this->form_validation->set_rules('endwork', 'Selesai Bekerja', 'trim');
			$this->form_validation->set_rules('bankaccountname', 'Nama Bank Karyawan', 'trim|required');
			$this->form_validation->set_rules('bankaccountnumber', 'No. Rekening Karyawan', 'trim|required');
			$this->form_validation->set_rules('position', 'Jabatan', 'trim|required');

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
				$this->session->set_flashdata('endwork', $this->input->post('endwork'));
				$this->session->set_flashdata('bankaccountname', $this->input->post('bankaccountname'));
				$this->session->set_flashdata('bankaccountnumber', $this->input->post('bankaccountnumber'));
				$this->session->set_flashdata('position', $this->input->post('position'));
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
					'selesaibekerja' => $this->input->post('endwork'),
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
			$this->load->model('admin_model');
			$data['page_title'] = "Upload Payroll | Maiga";
			$data['page'] = "uploadpayrollview";
			$data['payrolls'] = $this->admin_model->get_all_payrolls();
			$data['employees'] = $this->admin_model->get_all_employees();
			$this->load->view('include/masterlogin', $data);
		} else {
			redirect('/','refresh');
		}
	}

    public function checkassignment()
    {
        if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'adm' ) {
            $this->load->model('admin_model');
            $data['page_title'] = "Check Assignment | Maiga";
            $data['page'] = 'checkassignmentview';
            $data['topics'] = $this->admin_model->get_all_topics();
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
        if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'adm' && $this->input->get('topic') != null ) {
            $this->load->model('admin_model');
            $data['page_title'] = "Check Assignment by topic : ".$this->input->get('topic')." | Maiga";
            $data['topic'] = $this->input->get('topic');
            $data['topics'] = $this->admin_model->get_all_topics();
            $data['page'] = 'checkassignmentsview';
            $data['assignments'] = $this->admin_model->get_assignments_by_topic( $this->input->get('topic') );
            $this->load->view('include/masterlogin', $data);
        } else {
            redirect('/','refresh');
        }
    }

    public function updateassignmentstatus()
    {
        if ( $this->session->has_userdata('user_session') &&
             $this->session->userdata('user_session')['role'] == 'adm' &&
             $this->input->get('email') != null &&
             $this->input->get('filename') != null &&
             $this->input->get('status') != null &&
             $this->input->get('topic') != null ) {

            $data = array(
                'status' => $this->input->get('status'),
                'checkedon' => date('Y-m-d H:i:s', now('Asia/Jakarta'))
            );

            $this->db->trans_begin();

            $this->load->model('admin_model');
            $this->admin_model->update_assignment( $this->input->get('email'), $data, $this->input->get('filename') );

            $this->db->trans_commit();

            $param = $this->security->get_csrf_token_name().'='.$this->security->get_csrf_hash().'&topic='.$this->input->get('topic');

            redirect('/admin/checkassignments?'.$param,'refresh');

        } else {
            redirect('/','refresh');
        }
    }

	public function do_uploadpayroll()
	{
		if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'adm' ) {

			$this->form_validation->set_rules('namakaryawan', 'Nama Karyawan', 'trim|required');

			if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('errors', validation_errors());
			} else {
				$config['upload_path'] = './uploads/payrolls/';
				$config['allowed_types'] = 'pdf';
				
				$this->upload->initialize($config);
				
				if ( $this->upload->do_upload('slipgaji')){

					$data = $this->upload->data();

					$query = array(
						'email' => $this->input->post('namakaryawan'),
						'slipgaji' => $data['file_name']
					);

					$this->db->trans_begin();

					$this->load->model('admin_model');
					$this->admin_model->insert_payroll( $query );

					$this->db->trans_commit();

					$this->session->set_flashdata('success', 'Successfully upload assignment.');
				}
				else{
					$this->session->set_flashdata('errors', $this->upload->display_errors());
				}
			}

			redirect('/admin/uploadpayroll','refresh');

		} else {
			redirect('/','refresh');
		}
	}

    public function downloadassignment()
    {
        if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'adm' && $this->input->get('filename') != null ) {
            $path = './uploads/assignments/'.$this->input->get('filename');
            force_download($path, NULL);
        } else {
            redirect('/','refresh');
        }
    }

	public function getassignment()
	{
		if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'adm' && $this->input->get('filename') != null ) {
			$path = "./uploads/assignments/".$this->input->get('filename');
			force_download($path, NULL);
		} else {
			redirect('/','refresh');
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

			$data['status'] = "Tidak Aktif";

			$this->load->model('admin_model');
			if ( $this->admin_model->find_by_email($this->input->get('email'))->selesaibekerja == null )
				$data['selesaibekerja'] = date("Y-m-d", time());

			$this->db->trans_begin();
			$this->admin_model->remove_employee($this->input->get('email'), $data);
			$this->db->trans_commit();

			$this->session->set_flashdata('success', "Successfully remove ".$this->input->get('email').'.');
			redirect('/admin/employeelist', 'refresh');

		} else {

		}
	}

    public function createassignment()
    {
        if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'adm' ) {
            $this->load->model('admin_model');
            $data['page_title'] = "Create Assignment | Maiga";
            $data['page'] = 'createassignmentview';
            $data['homeworks'] = $this->admin_model->get_all_homeworks();
            $this->load->view('include/masterlogin', $data);
        } else {
            redirect('/','refresh');
        }
    }

    public function do_createassignment()
    {
        if ( $this->session->has_userdata('user_session') && $this->session->userdata('user_session')['role'] == 'adm' ) {

            $this->form_validation->set_rules('topic', 'Topik', 'trim|required|is_unique[homeworks.topic]');
            $this->form_validation->set_rules('assignedfor', 'Ditugaskan Untuk', 'trim|required');

            if ($this->form_validation->run() == false) {
                
                $this->session->set_flashdata('topic', $this->input->post('topic'));
                $this->session->set_flashdata('assignedfor', $this->input->post('assignedfor'));
                $this->session->set_flashdata('errors', validation_errors());

            } else {
                
                $query = array(
                    'topic' => $this->input->post('topic'),
                    'assignedfor' => $this->input->post('assignedfor'),
                    'createdby' => 'adm'
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
                        $this->session->set_flashdata('assignedfor', $this->input->post('assignedfor'));
                        $this->session->set_flashdata('errors', $this->upload->display_errors());
                    }
                }

                $this->db->trans_begin();

                $this->load->model('admin_model');
                $this->admin_model->create_new_assignment( $query );

                $this->db->trans_commit();

                $this->session->set_flashdata('success', 'Successfully create new assignment.');

            }

            redirect('/admin/createassignment','refresh');

        } else {
            redirect('/','refresh');
        }
    }

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */