<?php

class Show_db extends CI_Model{
    public function __construct(){
	parent::__construct();
	$this->load->database();
	$this->load->helper('replace');
    }

    function searchdb($key_way){
	$word_array = replace($key_way[0]);
	if($key_way[1] == "and_search")
	{
		for($i=0; $i<count($word_array); $i=$i+1)
        	{
                $this->db->group_start();
                $query = $this->db->like('name', $word_array[$i]);
                $query = $this->db->or_like('point', $word_array[$i]);
                $this->db->group_end();
        	}
	}
	else{
		for($i=0; $i<count($word_array); $i=$i+1)
        	{
                $query = $this->db->or_like('name', $word_array[$i]);
                $query = $this->db->or_like('point', $word_array[$i]);
        	}
	}
	return $this->db->get('animals')->result();
    }


}


