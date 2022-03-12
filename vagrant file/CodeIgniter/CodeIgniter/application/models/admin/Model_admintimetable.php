<?php
class Model_admintimetable extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('getdb','replace'));
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

    public function getDateList($date)
    {
	$query = $this->db->get_where('time_table', array('day' => $date));
	$list = $query->result();

	foreach($list as $value)
        {
         $filled_animalid = $value->filled_animalid;
	 $set_animal = $this->Model_admintimetable->change_id($filled_animalid);

         $value->set_animal = $set_animal;
         $value = (array)$value;

         $datelist[] = $value;
        }
        return $datelist;
    }

    public function change_id($id_str)
    {
	if($id_str != ""){
	 $set_id_arr = replace($id_str);
	 $set_name = getName($set_id_arr,"animals","name");
	 $set_name_str = implode(",",$set_name);
	}else{
	 $set_name_str = NULL;
	}
	
	return $set_name_str;
    }

    public function inputData()
    {
	$add_num = $this->input->post("add_num");
	$InputList = array(
	 "date" => $this->input->post("date"),
	 array(
	  "sTime" => $this->input->post("sTime0"),
	  "eTime" => $this->input->post("eTime0"),
	  "filled_animal" => $this->input->post("filled_animal0"),
	 ),
	);

	if(! $add_num == 0){
	 for($i=1;$i<$add_num+1;$i=$i+1){
	  $add_arr = array(
          	"sTime" => $this->input->post("sTime".$i),
          	"eTime" => $this->input->post("eTime".$i),
          	"filled_animal" => $this->input->post("filled_animal".$i),
	  );
	  if($add_arr["sTime"] != NULL && $add_arr["eTime"] != NULL){
		$InputList[$i] = $add_arr;
	  }
	 }
	}
	return $InputList;
    }

    public function validation($num)
    {
	$rule = array(
                array(
                'field' => 'date','label' => '日付','rules' => 'required',
                'errors' => array('required' => '%sを入力してください.')
                ),
                array(
                'field' => 'sTime0','label' => '開始時間','rules' => 'required',
                'errors' => array('required' => '入力してください.')
                ),
                array(
                'field' => 'eTime0','label' => '終了時間','rules' => 'required',
                'errors' => array('required' => '入力してください.')
                ),
        );
	for($i=1;$i<$num+1;$i=$i+1){
	 $add_rule = array(
		array(
                'field' => 'sTime'.$i,'label' => '開始時間','rules' => 'required',
                'errors' => array('required' => '入力してください.')
                ),
                array(
                'field' => 'eTime'.$i,'label' => '終了時間','rules' => 'required',
                'errors' => array('required' => '入力してください.')
                ),
	 );

	$rule = array_merge($rule,$add_rule);
	}
	
        return $rule;
    }

    public function add_data($datalist)
    {
	for($i=0;$i<=$datalist["add_num"];$i=$i+1){

	$data_arr[$i] = array(
		'day' => $datalist["date"],
		'startTime' => $datalist[$i]["sTime"],
		'endTime' => $datalist[$i]["eTime"],
	);
	$query = $this->db->get_where('time_table',$data_arr[$i]);
	$YN = $query->result();
	if(empty($YN)) //入力した値が存在しない場合->新規登録
	{
	 $animal_name = replace($datalist[$i]["filled_animal"]);
	 foreach($animal_name as $animal){
		$query = $this->db->get_where('animals', array('name' => $animal));
		$exist = $query->result();
		if(empty($exist)){ //動物が存在しない場合->エラー(登録しない)
		 $animal_err[$i][] = $animal;
		}else{
		 $animal_id[$i][] = $exist[0] -> id;
		}
	 } /*foreach*/

	 if(! empty($animal_err)){
	  $animal_errmsg[$i] = convStr($animal_err[$i])." は動物データ内に存在しません";
	 }
	 if(! empty($animal_id)){
	  $data_arr[$i]["filled_animalid"] = convStr(arraySort($animal_id[$i]));
	 }
	}else{
		$this->session->set_flashdata('table_unique',"すでに存在しています");
		return FALSE;
	}
	} /*for*/

	 if(isset($animal_errmsg)){
		$this->session->set_flashdata('animal_errmsg',$animal_errmsg);
	 }else{
		foreach($data_arr as $value){
		 if($this->db->insert('time_table', $value)){
			$ok[] = "ok";
		 }else{
			break;
		 }
		}
		if(count($ok) == count($data_arr)){return TRUE;}
	 }
    }

    public function edit_data($datalist)
    {
	$data_arr = array(
                'day' => $datalist["date"],
                'startTime' => $datalist[0]["sTime"],
                'endTime' => $datalist[0]["eTime"],
        );
	$animal_name = replace($datalist[0]["filled_animal"]);
	foreach($animal_name as $animal){
                $query = $this->db->get_where('animals', array('name' => $animal));
                $exist = $query->result();
                if(empty($exist)){ //動物が存在しない場合->エラー(登録しない)
                 $animal_err[] = $animal;
                }else{
                 $animal_id[] = $exist[0] -> id;
                }
         } /*foreach*/
	 
	 if(! empty($animal_err)){
          $animal_errmsg = convStr($animal_err)." は動物データ内に存在しません";
	  $animal_errmsg = (array)$animal_errmsg;
         }
         if(! empty($animal_id)){
          $data_arr["filled_animalid"] = convStr(arraySort($animal_id));
         }

	 if(isset($animal_errmsg)){
                $this->session->set_flashdata('animal_errmsg',$animal_errmsg);
	 }else{
		$this->db->where('ScheduleId', $datalist["editid"]);
		return $this->db->update('time_table', $data_arr);
	 }

    }


    public function input_formar($edit_id)
    {
	$id = preg_replace('/[^0-9]/', '', $edit_id);
	$query = $this->db->get_where('time_table', array('ScheduleId' => $id));
	$result = $query->result();

	$filled_animal = $this->Model_admintimetable->change_id($result[0]->filled_animalid);
	$datalist = array(
		'edit_id' => $id,
		'date' => $result[0] -> day,
		'sTime' => $result[0] -> startTime,
		'eTime' => $result[0] -> endTime,
		'filled_animal' => $filled_animal,
	);
	return $datalist;
    }


    public function delData($del_id)
    {
	$id = preg_replace('/[^0-9]/', '', $del_id);
	return $this->db->delete('time_table', array('ScheduleId' => $id));
    }

}
