<?php

class Model_get extends CI_Model{
    function getData($page){            //取得したデータを『$page』に挿入
	$this->load->database();
        $query = $this->db->get("friend");
		//get_where("friend", array("page" => $page)); 
                //friendのカラム内にあるpageテーブルから情報を取得する
        return $query->result();    //結果を表示する
    }
}
