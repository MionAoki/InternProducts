<?php
class Model_login extends CI_Model{
    public function __construct()
    {
        $this->load->library('encrypt');
        $this->load->database();
    }

    public function checkData($user_id,$password){
	$query = $this->db->get_where("login",array('user_id'=>$user_id));
	$cand = $query->result();
	if(empty($cand) != "true"){
	 	foreach($cand as $row){
		$target = $row->password;
	 	}
	 	$target = $this->encrypt->decode($target);
	 	if($password == $target){
			$match = "True";
		}else{
			$match = "False";
		}
	}else{
	 	$match = "False";
	}

	return $match;
    }
}
