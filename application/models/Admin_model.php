<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function get_all_employees()
	{
		$this->db->where('role', 'emp');
		$this->db->where('status', 'Aktif');
		return $this->db->get('employees')->result();
	}

    public function register_new_employee($data)
    {
        $this->db->insert('employees', $data);
    }

    public function update_employee($email, $data)
    {
        $this->db->where('email', $email);
        $this->db->update('employees', $data);
    }

    public function remove_employee($email, $data)
    {
        $this->db->where('email', $email);
        $this->db->update('employees', $data);
    }

    public function get_all_payrolls()
    {
        $this->db->select('employees.nama, payrolls.slipgaji, payrolls.isdownloaded, payrolls.createdttm');
        $this->db->from('payrolls');
        $this->db->join('employees', 'payrolls.email = employees.email');
        $this->db->where('employees.status', 'Aktif');
        return $this->db->get()->result();
    }

    public function insert_payroll($data)
    {
        $this->db->insert('payrolls', $data);
    }

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */