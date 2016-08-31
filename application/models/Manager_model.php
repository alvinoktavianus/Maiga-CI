<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager_model extends CI_Model {

    public function get_all_assignment()
    {
        $this->db->select('assignments.email, assignments.assignment, assignments.createdttm, assignments.updatedttm, employees.nama, assignments.status');
        $this->db->from('assignments');
        $this->db->join('employees', 'assignments.email = employees.email');
        $this->db->order_by('assignments.updatedttm', 'desc');
        return $this->db->get()->result();
    }

    public function get_all_homework()
    {
        return $this->db->get('homeworks')->result();
    }

    public function create_new_assignment($data)
    {
        $this->db->insert('homeworks', $data);
    }

}

/* End of file Manager_model.php */
/* Location: ./application/models/Manager_model.php */