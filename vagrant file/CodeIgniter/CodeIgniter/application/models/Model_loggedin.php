<?php

class Model_loggedin extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->helper('replace');
    }

    function searchdb($key_way){	//andor検索
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

    function fromIdArray($id_array){	//複数のidそれぞれに一致するanimals(table)内のデータを取得
	for($i=0;$i<count($id_array); $i=$i+1){
        $query = $this->db->or_where('id', $id_array[$i]);
	}
        return $this->db->get('animals')->result();
    }

    function fromTagId($id_array){	//tag_idを持つanimals(table)のデータを取得
	$animals=array();
	for($i=0; $i<count($id_array); $i=$i+1){
        	$query = $this->db->get_where("tag_animals",array("id"=> $id_array[$i]));
        	$tag_data = $query->result();
		foreach($tag_data as $row){
		 $text_animal_id = $row->animal_id;
		}
		$animal_array = replace($text_animal_id);
		for($j=0; $j<count($animal_array); $j=$j+1){
		 $query = $this->db->or_where('id', $animal_array[$j]);
		}
	 $animals = array_merge($animals , $this->db->get('animals')->result());
	}
	return $animals;
    	
    }

    function stockIds($cand){	//$cand(array)が持つid(key)のデータを格納
	$i=0;
	foreach($cand as $row){
        	$stock_id[$i] = $row->id;
        	$i=$i+1;
        }
	return $stock_id;
    }

    function nodup_id($tag_data){ //$tag_dataから得られたデータのidを抜き出して重複をなくす
	$tag_searched = $this->Model_loggedin->fromTagId($tag_data);
	$stock_id = $this->Model_loggedin->stockIds($tag_searched);
	$no_dup = array_values(array_unique($stock_id)); //not duplicate
	return $no_dup;
    }

    function tag_key_search($tag_data,$key_way){ 
	//引数から得られたidの中で重複したものを取得->animal(table)からそのidのデータを取得
	$stock_tagid = $this->Model_loggedin->nodup_id($tag_data);
	$result_key = $this->Model_loggedin->searchdb($key_way);
		if($result_key == NULL){
		 $stock_keyid = [];
		}else{
		 $stock_keyid = $this->Model_loggedin->stockIds($result_key);
		}
	$result_add = array_merge($stock_tagid , $stock_keyid);
	$no_dup = array_keys(array_count_values($result_add), 1);
	$dup = array_values(array_unique(array_diff($result_add, $no_dup)));
	if(empty($dup)){
	 return $dup;
	}else{
	 return $this->Model_loggedin->fromIdArray($dup);
	}

    }

}






