<?php

class Model_introduce extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
	$this->load->helper('replace');
	$this->load->helper('getdb');
    }

    function assign_data($id){
	$info = getData("animals","id",$id);
	foreach($info as $row){
		$data_array["id"] = $row->id;
		$data_array["name"] = $row->name;
		$data_array["point"] = $row->point;
		$data_array["introduction"] = $row->introduction;
		$data_array["sub_name"] = $row->sub_name;
		$data_array["tag_id"] = $row->tag_id;
	}
	$data_array["tag_array"] = replace($data_array["tag_id"]);
	$data_array["tag_name"] = getName($data_array["tag_array"],"tag_animals","tag_name");
	$data_array["animalid"] = (int)$id;

	return $data_array;
    }

    public function getDate()
    {
        $list = getTable("time_table");
        foreach($list as $value){ //stdClass->array 変換
         $value = (array)$value;
         $new_list[] = $value;
        }
        $date_arr = array_column($new_list, 'day');
        $count = array_count_values($date_arr);
        $DateList = array_keys($count);
        sort($DateList);
        return $DateList;
    }


    function back_front($id){
	$idlist = getColumn("animals","id");
	$center = array_search($id,$idlist);
	if($center-1 == -1){
		$back = NULL;
		$front = $idlist[$center+1];
	}elseif($center+1 == count($idlist)){
		$back = $idlist[$center-1];
		$front = NULL;
	}else{
		$back = $idlist[$center-1];
		$front = $idlist[$center+1];
	}
	$back_front = array($back,$front);
	return $back_front;
    }


    function getTime($date){
	$query = $this->db->get_where('time_table',array('day'=>$date));
	$timetable = $query->result();
	foreach($timetable as $value){
		$sTime_array[] = $value->startTime;
	}
	array_multisort($sTime_array,SORT_ASC,SORT_NUMERIC,$timetable);
	//timetableをsTime順に並べ替え

	return $timetable;
    }

    function getTimeMass($date){
	$query = $this->db->where('day',$date);
        $query = $this->db->select_min('startTime','min_time');
	$mTime = $this->db->get('time_table')->result();
	
        $minTime = $mTime[0]->min_time;
	$minTime = date('H:00:00' , strtotime($minTime));

	$date_array = $this->Model_introduce->getTime($date);

	$cnt = 0;
	foreach($date_array as $row){
		$sTime = $row->startTime;
		$comp = strtotime('+1 hours', strtotime($minTime));
         	$compTime = date('H:i:s',$comp);
         	if($sTime < $compTime){
                	$cnt = $cnt + 1;
         	}else{
			$minTime = date('H:00:00' , strtotime($sTime));
                	$cnt = 1;
		}
		$time_cnt["$minTime"]=$cnt;
	}

	return $time_cnt;
    }

    function change_time($date , $array){
	$data_array["timelist"] = $this->Model_introduce->getTime($date);
	$data_array["timeMass"] = $this->Model_introduce->getTimeMass($date);
	$data_array = array_merge($array , $data_array);
	
	return $data_array;
    }

}
