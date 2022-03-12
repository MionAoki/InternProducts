<?php
if( ! function_exists('getTable')){
        function getTable($table){
         $CI =& get_instance();
         $CI->load->database();
         $query = $CI->db->get($table);
	 return $query->result();
        }
}

if( ! function_exists('getData')){
	function getData($table , $column , $data){
	 $CI =& get_instance();
	 $CI->load->database();
	 $query = $CI->db->get_where($table,array($column => $data));
	 return $query->result();
    	}
}

if( ! function_exists('getName')){ //$id_array内のidに対応する名前を取得する
	function getName($id_array,$table,$column){
	 $CI =& get_instance();
         $CI->load->database();
	 $name = array();
	 for($i=0; $i<count($id_array); $i=$i+1){
	  $query = $CI->db->get_where($table,array("id"=> $id_array[$i]));
	  $tag_data = $query->result();
          foreach($tag_data as $row){
		$name[] = $row->$column;
	  }
	 }
	 return $name;
	}
}

if( ! function_exists('getColumn')){
	function getColumn($table,$column){
	 $CI =& get_instance();
         $CI->load->database();
         $query = $CI->db->get($table);
         $result = $query->result();
         $i = 0;
         foreach($result as $row){
                $column_data[$i] = $row->$column;
                $i=$i+1;
         }
         return $column_data;
    	}
}

if( ! function_exists('getMaxId')){
        function getMaxId($table){
	 $CI =& get_instance();
         $CI->load->database();
	 $CI->load->helper('getdb');
	 
	 $id_array = getColumn($table,"id");
	 $max = max($id_array);

	 return $max;
	}


}

