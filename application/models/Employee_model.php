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

}

/* End of file Employee_model.php */
/* Location: ./application/models/Employee_model.php */