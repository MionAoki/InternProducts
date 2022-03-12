<?php
class Model_adminprofdata extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('getdb','replace'));
    }

    public function getAddData($kind , $add_num)
    {
	for($i=0;$i<$add_num+1;$i=$i+1){
	 $input_list[] = $this->input->post($kind.$i);
	}

	return $input_list;
    }

    public function validation($kind , $add_num)
    {
	if($kind == "location"){$kind_jp = "所在地";}
	else if($kind == "sector"){$kind_jp = "業種";}
	else if($kind == "job"){$kind_jp = "職種";}
	else if($kind == "purpose"){$kind_jp = "参加目的";}
	else{$kind_jp = "";}

	for($i=0;$i<$add_num+1;$i=$i+1){
	$rule[] = array(
	 'field' => $kind.$i,'label' => $kind_jp,
	 'rules' => 'required|is_unique['.$kind.'.list]',
	 'errors' => array('required' => '%sを入力してください.',
			'is_unique' => 'すでに存在しています.')
	);
	}
	return $rule;
    }

    public function add_data($datalist,$kind,$add_num)
    {
	$count = 0;
	for($i=0;$i<$add_num+1;$i=$i+1){
	 $data_arr = array("list" => $datalist[$i]);
	 if($this->db->insert($kind, $data_arr)){
		$count = $count + 1;
	 }else{
	 	break;
	 }
	}
	if($count == $add_num + 1){
		return TRUE;
	}else{
		return FALSE;
	}
    }


    public function getFormar($table_name,$select_id)
    {
	$id = preg_replace('/[^0-9]/', '', $select_id);
	$formar = getData($table_name,"id",$id);
	return $formar;
    }


    public function identifyTable($select_edit)
    {
	if(strpos($select_edit,'location') !== false){
		$table_name = "location";
	}else if(strpos($select_edit,'sector') !== false){
		$table_name = "sector";
	}else if(strpos($select_edit,'job') !== false){
                $table_name = "job";
        }else if(strpos($select_edit,'purpose') !== false){
                $table_name = "purpose";
        }else{
		$table_name = "";
	}

	return $table_name;
    }


    public function edit_data($datalist,$kind,$edit_id)
    {
	$data_arr = array("list" => $datalist);
	$this->db->where('id', $edit_id);
	return $this->db->update($kind, $data_arr);
    }

    public function delData($table_name,$del_id)
    {
	$id = preg_replace('/[^0-9]/', '', $del_id);
	return $this->db->delete($table_name, array('id' => $id));
    }


}


