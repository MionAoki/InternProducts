<?php
class Model_regist extends CI_Model {
 
    public function __construct()
    {
	$this->load->library('encrypt');
        $this->load->database();
    }

    public function set_user(){
	$lastname = $this->input->post('lastname');
	$firstname = $this->input->post('firstname');
	$name = $lastname. " ". $firstname;

	$password = $this->encrypt->encode($this->input->post('password'));

        $data = array(
        'user_id' => $this->input->post('user_id'),
        'password' => $password,
	'name' => $name
        );
        return $this->db->insert('login', $data);
    }

}
