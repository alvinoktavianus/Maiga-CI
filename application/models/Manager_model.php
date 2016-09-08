<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager_model extends CI_Model {

    public function find_by_email($email)
    {
        $this->db->select('nama, tempatlahir, tanggallahir, mobile, jabatan, department, mulaibekerja, namabank, norekening');
        $this->db->where('email', $email);
        return $this->db->get('employees')->result()[0];
    }

    public function get_all_homework()
    {
        $this->db->where('createdby', 'mgr');
        return $this->db->get('homeworks')->result();
    }

    public function create_new_assignment($data)
    {
        $this->db->insert('homeworks', $data);
    }

    public function get_all_topics()
    {
        $this->db->where('createdby', 'mgr');
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
        $this->db->where('assignments.uploadedby', 'emp');
        $this->db->order_by('assignments.updatedttm', 'desc');
        return $this->db->get()->result();
    }

    public function update_assignment($email, $data, $assignment)
    {
        $this->db->where('email', $email);
        $this->db->where('assignment', $assignment);
        $this->db->update('assignments', $data);
    }

    public function get_all_payroll($email)
    {
        $this->db->where('email', $email);
        return $this->db->get('payrolls')->result();
    }

    public function get_topics()
    {
        $this->db->where('assignedfor', 'mgr');
        $this->db->select('topic');
        $results = $this->db->get('homeworks')->result();
        $topic[''] = '';
        foreach ($results as $result) $topic[$result->topic] = $result->topic;
        return $topic;
    }

    public function get_all_assignment($email)
    {
        $this->db->select('assignments.assignment, assignments.createdttm, assignments.description, assignments.status, assignments.checkedon, assignments.topic');
        $this->db->from('assignments');
        $this->db->join('employees', 'employees.email = assignments.email');
        $this->db->where('employees.role', 'mgr');
        $this->db->where('employees.status', 'Aktif');
        $this->db->where('employees.email', $email);
        $this->db->order_by('assignments.createdttm', 'desc');
        return $this->db->get()->result();
    }

    public function insert_to_history($query)
    {
        $this->db->insert('histories', $query);
    }

    public function insert_assignment_by_email($email, $data)
    {
        $this->db->where('email', $email);
        $this->db->insert('assignments', $data);
    }

}

/* End of file Manager_model.php */
/* Location: ./application/models/Manager_model.php */