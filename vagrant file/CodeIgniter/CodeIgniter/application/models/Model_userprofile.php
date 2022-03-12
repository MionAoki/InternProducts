<?php
class Model_userprofile extends CI_Model {

    public function __construct()
    {
        $this->load->database();
	$this->load->helper(array('getdb','replace'));
    }

    public function change_prof($formerID){
        $lastname = $this->input->post('lastname');
        $firstname = $this->input->post('firstname');
	$tel = str_replace("ー", "-", $this->input->post('tel'));
	$message = $this->input->post('message');
	$loc_id = $this->input->post('location');
	$sector_id = $this->input->post('sector');
	$job_id = $this->input->post('job');
	$purpose_array = $this->input->post('purpose');
		$purpose_id = implode(",",$purpose_array);
	if(in_array("11",$purpose_array)){
		$other = $this->input->post('other');
	}else{
		$other = "";
	}
	$favtag_array = $this->input->post('favtag');
                $favtag_id = implode(",",$favtag_array);

        $name = $lastname. " ". $firstname;

        $data = array(
        'user_id' => $this->input->post('user_id'),
        'name' => $name,
	'tel' => $tel,
	'message' => $message,
	'location_id' => $loc_id,
	'sector_id' => $sector_id,
	'job_id' => $job_id,
	'purpose_id' => $purpose_id,
	'other' => $other,
	'favtag_id' => $favtag_id,
        );

	$this->db->where('user_id', $formerID);
	return $this->db->update('login', $data);
    }

    public function getNameList($table,$column){
	$query = $this->db->get($table);
	$array = $query->result();
	$i=0;
	foreach($array as $row){
		$list[$i] = $row->$column;
		$i=$i+1;
	}
	return $list;
    }

    public function convID($table,$id,$column){
	if($id == 0){
		$converted = NULL;
	}else{
		$query = $this->db->get_where($table,array('id' => $id));
		$result = $query->result();
		foreach($result as $row){
			$converted = $row->$column;
		}
	}
	return $converted;
    }

    public function convStr($string,$table,$column){
	if($string != ""){
		$id_array = explode(",",$string);
		for($i=0; $i<count($id_array); $i=$i+1){
	 	 $id = (int)$id_array[$i];
	 	 $converted[$i] = $this->Model_userprofile->convID($table, $id, $column);
		}
	}else{
		$converted = NULL;
	}
	return $converted;
    }

    public function getUserData(){
	$user = array(
		'user_name' => $this->session->userdata('user_name'),
		'user_id' => $this->session->userdata('user_id'),
		'Name' => replace($this->session->userdata('user_name')),
		);
	$user_data = getData("login","user_id",$user["user_id"]);
	foreach($user_data as $row){
		$user["tel"] = $row->tel;
		$user["message"] = $row->message;
		$userLoc_id = $row->location_id;
		$userSector_id = $row->sector_id;
		$userJob_id = $row->job_id;
		$purpose_str = $row->purpose_id;
		$user["other"] = $row->other;
		$favtag_str = $row->favtag_id;
	}
	$user["userLoc"] = $this->Model_userprofile->convID("location",$userLoc_id, "list");
	$user["userSector"] = $this->Model_userprofile->convID("sector",$userSector_id, "list");
	$user["userJob"] = $this->Model_userprofile->convID("job",$userJob_id, "list");
	
	$user["userLoc_id"] = $userLoc_id;
	$user["userSector_id"] = $userSector_id;
	$user["userJob_id"] = $userJob_id;
	$user["userPurpose_id"] = explode(",",$purpose_str);
	$user["userFavtag_id"] = explode(",",$favtag_str);
	
	$user["userPurpose"] = $this->Model_userprofile->convStr($purpose_str,"purpose","list");
	$user["userFavtag"] = $this->Model_userprofile->convStr($favtag_str,"tag_animals","tag_name");

	if($user["message"] == ""){$user["message"]= NULL;}
	if($user["other"] == ""){$user["other"]= NULL;}
	
	return $user;
    }

    public function getChoices(){
	$choices = array(
		'location' => getTable("location"),
		'sector' => getTable("sector"),
		'job' => getTable("job"),
		'purpose' => getTable("purpose"),
		'favtag' => getTable("tag_animals"),
                );
	return $choices;
    }
    
    public function validation($user_id , $formar_id){
	$edit_rule = array(
                array(
                'field' => 'lastname','label' => '姓','rules' => 'required',
                'errors' => array('required' => '%sを入力してください.')
                ),
                array(
                'field' => 'firstname','label' => '名','rules' => 'required',
                'errors' => array('required' => '%sを入力してください.')
		),
	);

	if( $user_id != $formar_id)
	{
		$rule = array(
		array(
		'field' => 'user_id','label' => 'ユーザーID','rules' => 'required|is_unique[login.user_id]',
                'errors' => array('required' => '%sを入力してください.',
				'is_unique' => 'その%sはすでに登録済です.<br/>入力を変更してください.')
		)
		);
		$edit_rule = array_merge($edit_rule,$rule);
	}
	return $edit_rule;
    }

}


