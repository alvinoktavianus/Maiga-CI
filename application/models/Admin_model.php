<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function get_all_employees()
	{
		$this->db->where('role', 'emp');
		$this->db->where('status', 'Aktif');
		return $this->db->get('employees')->result();
	}

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */