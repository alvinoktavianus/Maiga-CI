<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_script
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->model('user_model');
    }

    public function migrate_history()
    {
        $results = $this->ci->user_model->get_all_assignments();
        foreach ($results as $result) {
            $query = array(
                'email' => $result->email,
                'topic' => $result->topic,
                'assignment' => $result->assignment,
                'description' => $result->description,
                'createdttm' => $result->createdttm,
            );


            $this->ci->user_model->migrate_data($query);
        }
        redirect('/admin/maintenance','refresh');
    }

}

/* End of file Migration_script.php */
/* Location: ./application/libraries/Migration_script.php */
