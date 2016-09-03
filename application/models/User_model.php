<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function find_by_email($email)
	{
		$this->db->where('email', $email);
		return $this->db->get('employees')->result();
	}

    public function update_by_email($email, $data)
    {
        $this->db->where('email', $email);
        $this->db->update('employees', $data);
    }

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */