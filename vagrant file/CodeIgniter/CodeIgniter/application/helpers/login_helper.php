<?php
if( ! function_exists('checkData')){
        function checkData($table, $column_id, $id, $password){
         $CI =& get_instance();
         $CI->load->database();
	 $CI->load->library('encrypt');

	 $query = $CI->db->get_where($table,array($column_id=>$id));

	 $cand = $query->result();
         if(empty($cand) != "true"){
                foreach($cand as $row){
                $target = $row->password;
                }
                $target = $CI->encrypt->decode($target);
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
