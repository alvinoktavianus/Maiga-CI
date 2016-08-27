<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function find_by_email($email)
	{
		$this->db->where('email', $email);
		return $this->db->get('employees')->result();
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */