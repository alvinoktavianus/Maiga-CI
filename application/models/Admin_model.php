<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function get_all_employees()
	{
		$this->db->where('role', 'emp');
        $this->db->or_where('role', 'mgr');
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
        $this->db->select('employees.nama, payrolls.slipgaji, payrolls.createdttm');
        $this->db->from('payrolls');
        $this->db->join('employees', 'payrolls.email = employees.email');
        $this->db->where('employees.status', 'Aktif');
        return $this->db->get()->result();
    }

    public function insert_payroll($data)
    {
        $this->db->insert('payrolls', $data);
    }

    public function get_all_assignments()
    {
        $this->db->select('employees.nama, employees.email, assignments.assignment, assignments.createdttm, assignments.description, assignments.ischecked');
        $this->db->from('assignments');
        $this->db->where('employees.role', 'emp');
        $this->db->where('employees.status', 'Aktif');
        $this->db->join('employees', 'employees.email = assignments.email');
        $this->db->order_by('assignments.createdttm', 'desc');
        return $this->db->get()->result();
    }

    public function find_by_email($email)
    {
        $this->db->where('email', $email);
        return $this->db->get('employees')->result()[0];
    }

    public function mark_assignment($email, $filename)
    {
        $data['ischecked'] = 'Y';
        $this->db->where('email', $email);
        $this->db->where('assignment', $filename);
        $this->db->update('assignments', $data);
    }

    public function get_all_topics()
    {
        $results = $this->db->get('homeworks')->result();
        $topics[''] = '';
        foreach($results as $result) $topics[$result->topic] = $result->topic;
        return $topics;
    }

    public function get_assignments_by_topic($topic)
    {
        $this->db->select('assignments.email, assignments.assignment, assignments.createdttm, assignments.updatedttm, employees.nama, assignments.status, assignments.description');
        $this->db->from('assignments');
        $this->db->join('employees', 'employees.email = assignments.email', 'left');
        $this->db->where('assignments.topic', $topic);
        $this->db->order_by('assignments.updatedttm', 'desc');
        return $this->db->get()->result();
    }

    public function update_assignment($email, $data, $assignment)
    {
        $this->db->where('email', $email);
        $this->db->where('assignment', $assignment);
        $this->db->update('assignments', $data);
    }

    public function create_new_assignment($data)
    {
        $this->db->insert('homeworks', $data);
    }

    public function get_all_homeworks()
    {
        return $this->db->get('homeworks')->result();
    }

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */