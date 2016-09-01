<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager_model extends CI_Model {

    public function get_all_homework()
    {
        return $this->db->get('homeworks')->result();
    }

    public function create_new_assignment($data)
    {
        $this->db->insert('homeworks', $data);
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

}

/* End of file Manager_model.php */
/* Location: ./application/models/Manager_model.php */