<?php
class User_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }
    
    
    public function set_user($id = 0)
    {
        $data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'updated_at' => date('Y-m-d H:i:s')
        );
            
        if ($id == 0) {
            return $this->db->insert('user', $data);
        } 
    }
    

}
