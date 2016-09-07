<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

    public function find_by_email($email)
    {
        $this->db->select('nama, tempatlahir, tanggallahir, mobile, jabatan, department, mulaibekerja, namabank, norekening');
        $this->db->where('email', $email);
        return $this->db->get('employees')->result()[0];
    }

    public function find_detail_by_email($email)
    {
        $this->db->select('nama, tempatlahir, tanggallahir, mobile, namabank, norekening');
        $this->db->where('email', $email);
        return $this->db->get('employees')->result()[0];
    }

    public function update_profile($email, $data)
    {
        $this->db->where('email', $email);
        $this->db->update('employees', $data);
    }

    public function get_all_assignment($email)
    {
        $this->db->select('assignments.assignment, assignments.createdttm, assignments.description, assignments.status, assignments.checkedon, assignments.topic');
        $this->db->from('assignments');
        $this->db->join('employees', 'employees.email = assignments.email');
        $this->db->where('employees.role', 'emp');
        $this->db->where('employees.status', 'Aktif');
        $this->db->where('employees.email', $email);
        $this->db->order_by('assignments.createdttm', 'desc');
        return $this->db->get()->result();
    }

    public function get_all_payrolls_by_email($email)
    {
        $this->db->where('email', $email);
        $this->db->order_by('createdttm', 'desc');
        return $this->db->get('payrolls')->result();
    }

    public function insert_assignment_by_email($email, $data)
    {
        $this->db->where('email', $email);
        $this->db->insert('assignments', $data);
    }

    public function get_topic()
    {
        $this->db->select('topic');
        $results = $this->db->get('homeworks')->result();
        $topic[''] = '';
        foreach ($results as $result) $topic[$result->topic] = $result->topic;
        return $topic;
    }

    public function update_assignment($email, $topic, $filename, $data)
    {
        $this->db->where('email', $email);
        $this->db->where('topic', $topic);
        $this->db->where('assignment', $filename);
        $this->db->update('assignments', $data);
    }

    public function insert_to_history($query)
    {
        $this->db->insert('histories', $query);
    }

}

/* End of file Employee_model.php */
/* Location: ./application/models/Employee_model.php */