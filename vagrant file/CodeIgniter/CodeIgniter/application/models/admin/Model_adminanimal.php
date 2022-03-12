<?php
class Model_adminanimal extends CI_Model {

    public function __construct()
    {
	parent::__construct();
        $this->load->database();
	$this->load->helper('url');
	$this->load->helper(array('getdb','replace'));
	$this->load->library('upload');
    }

    public function getList()
    {
	$list = getTable("animals");
	for($i=0;$i<count($list); $i=$i+1){
	 $list[$i] = (array)$list[$i];
	 $tag_id = array_column($list, 'tag_id')[$i];
	 $tag = getName(replace($tag_id),"tag_animals","tag_name");
	 $tag = implode(",", $tag);
	 $list[$i]['tag'] = $tag;
	}
	return $list;
    }

    public function new_getList()
    {
	$list = getTable("animals");
	foreach($list as $row){
	 $tag_id = $row -> tag_id;
	 $tag = getName(replace($tag_id),"tag_animals","tag_name");
	 $tag = implode(",", $tag);
	 $row -> tag = $tag;
	}
	return $list;
    }


    public function inputData()
    {
	$datalist["name"] = $this->input->post("name");
        $datalist["point"] = $this->input->post("point");
        $datalist["introduction"] = $this->input->post("introduction");
        $datalist["sub_name"] = $this->input->post("sub_name");
        $datalist["chk_box"] = $this->input->post("tag");
	$datalist["aim_id"] = $this->input->post("aim_id"); //content="edit" only
        
	$add_num = $this->input->post("add_num");

	if($add_num != 0){
	 $new_tag = array();
	 $j=0;
	 for($i=1; $i<=$add_num; $i=$i+1)
	 {
	  $add_form = $this->input->post("new_tag".$i);
	  $add_form = str_replace("　", " ", $add_form); //全角space->半角space
	  $add_form = str_replace(" ", "", $add_form); //半角space->なし

	  if($add_form != ""){
		$new_tag[$j] = $add_form;
		$j=$j+1;
	  }
	  $datalist["new_tag"] = $new_tag;
	 }
	}else{
	 $datalist["new_tag"] = NULL;
	}
	return $datalist;
    }

    public function ImageSetting() //ファイルアップロード設定
    {
	$config['upload_path'] = './assets/img';
	$config['allowed_types'] = 'jpg|jpeg|png';
	$config['overwrite'] = TRUE;
	$config['max_size'] = 0;
	$config['max_width'] = 1024;
	$config['max_height'] = 768;

	$this->upload->initialize($config);

	return $config;
    }

    public function validation($content)
    {
	$rule = array(
                array(
                'field' => 'point','label' => '分類','rules' => 'required',
                'errors' => array('required' => '%sを入力してください.')
                ),
		array(
                'field' => 'introduction','label' => '特徴','rules' => 'required',
                'errors' => array('required' => '%sを入力してください.')
                ),
        );

	if($content == "add"){
	 $name_rule = array(
		array(
                'field' => 'name','label' => '動物名','rules' => 'required|is_unique[animals.name]',
                'errors' => array('required' => '%sを入力してください.',
                                'is_unique' => 'すでに存在しています.')
		),
	 );
	}elseif($content == "edit"){
	 $name_rule = array(
		array(
                'field' => 'name','label' => '動物名','rules' => 'required',
                'errors' => array('required' => '%sを入力してください.')
		),
	 );
	}
	$rule = array_merge($rule,$name_rule);
	return $rule;
    }

    public function add_animal($datalist)
    {
	$query = $this->db->where('name', $datalist["name"]);
	$YN = $this->db->get('animals')->result();
	
	$tag_id = $this->Model_adminanimal->chk_tags($datalist["content"],$datalist["aim_id"],$datalist["new_tag"],$datalist["chk_box"]);

	$data = array(
		'id' => getMaxId("animals")+1,
        	'name' => $datalist["name"],
        	'point' => $datalist["point"],
		'introduction' => $datalist["introduction"],
		'sub_name' => $datalist["sub_name"],
		'tag_id' => $tag_id,
        	);
	$insert = $this->db->insert('animals', $data);

	if($datalist["sub_name"] != ""){
	  $this->Model_adminanimal->ImageSetting();
	  $upload = $this->upload->do_upload('picture');
	}else{
	  $upload = TRUE;
	}

	if($insert && $upload){return TRUE;}
	else{return FALSE;}
    }

    public function edit_animal($datalist)
    {
         $tag_id = $this->Model_adminanimal->chk_tags($datalist["content"],$datalist["aim_id"],$datalist["new_tag"],$datalist["chk_box"]);

	$formar = getData("animals" , "id" , $datalist["aim_id"]);
	$subname_formar = $formar[0] -> sub_name;

        $data = array(
                'name' => $datalist["name"],
                'point' => $datalist["point"],
                'introduction' => $datalist["introduction"],
                'sub_name' => $datalist["sub_name"],
                'tag_id' => $tag_id,
                );
         $this->db->where('id', $datalist["aim_id"]);
         $update = $this->db->update('animals', $data);

	 if($data["sub_name"]==$subname_formar || $data["sub_name"]==""){
		$upload = TRUE;
	 }else{
		$this->Model_adminanimal->ImageSetting();
                $upload = $this->upload->do_upload('picture');
	 }

         if($update && $upload){return TRUE;}
         else{return FALSE;}
    }

    public function chk_tags($content,$aim_id,$new_tag_array,$chk_array)
    {
	if(isset($new_tag_array)){ //追加タグを入力した場合
	 for($j=0;$j<count($new_tag_array);$j=$j+1)
         {
		$query = $this->db->where('tag_name', $new_tag_array[$j]);
                $result = $this->db->get('tag_animals')->result();
                if(empty($result)) //追加タグ名が存在していない場合
                {
                 $chk_array[] = getMaxId("tag_animals")+1;
                 $this->Model_adminanimal->add_newtag($content,$aim_id,$new_tag_array[$j]);
                }else //すでにタグ名が存在している場合
                {
                 $chk_array[] = $result[0]->id;
		}
         }
          $chk_array = arraySort($chk_array); //重複を削除
	}

         for($i=0;$i<count($chk_array);$i=$i+1) //選択,入力タグを文字列にする
         {
          if($i==0){
           $tag_id = $chk_array[$i];
          }else{
           $tag_id = $tag_id.",".$chk_array[$i];
          }
	 $this->Model_adminanimal->linktag($content,$aim_id,$chk_array[$i]);	  
         }
	return $tag_id; //動物が所持するタグ(table:animals|columun:tag_id)
    }

    public function add_newtag($content,$aim_id,$tag_name) //タグの新規登録
    {
	if($content == "add"){
	 $animal_id = getMaxId("animals")+1;
	}elseif($content == "edit"){
	 $animal_id = $aim_id;
	}

	$data = array(
	'id' => getMaxId("tag_animals")+1,
	'tag_name' => $tag_name ,
	'animal_id' => $animal_id,
	);
	return $this->db->insert('tag_animals', $data);
    }

    public function linktag($content,$aim_id,$tag_id) //tag_animalsテーブルのanimal_idカラムの更新
    {
	$animal_id = getData("tag_animals","id",$tag_id)[0]->animal_id;
	if(strpos($animal_id,',') !== FALSE){ //$animal_idが複数かどうか
	   $animal_id = replace($animal_id);
	}else{
	   $animal_id = (array)$animal_id;
	}

	if($content == "add"){
           $animal_id[] = getMaxId("animals")+1;
        }elseif($content == "edit"){
           $animal_id[] = $aim_id;
        }
	$change = array('animal_id' => convStr($animal_id));
	$this->db->where('id', $tag_id);
        $this->db->update('tag_animals', $change);
    }


    public function getSpecLine($edit_id) //選択したidのデータを取得
    {
	$id = preg_replace('/[^0-9]/', '', $edit_id);
	$list = $this->Model_adminanimal->getList();
	
	$id_arr = array_column($list,'id');
	$num = array_search($id,$id_arr);
	$specLine = $list[$num];

	$tag_array = replace($specLine["tag_id"]);
	$specLine["chk_box"] = $tag_array;

	return $specLine;
    }

    public function del_animal()
    {
	$delname = $this->input->post("delid");
	$this->Model_adminanimal->del_tagdata($delname);
	return $this->db->delete('animals', array('name' => $delname));
    }

    public function del_tagdata($name) //動物を削除する際にタグの所持する動物idも削除する
    {
	$query = $this->db->get_where('animals', array('name' => $name));
	$result = $query->result();
        $animalID = $result[0]->id;
        $tag_id = replace($result[0]->tag_id);
	foreach($tag_id as $value)
	{
	 $query = $this->db->get_where('tag_animals', array('id' => $value));
	 $tag = $query->result();
	 $animal_id = replace($tag[0]->animal_id);
	 $target = array_search($animalID,$animal_id);
	 unset($animal_id[$target]); //タグが所持する動物idを削除
	 $update = convStr($animal_id);

	 if($update == ""){
	 	$this->db->delete('tag_animals', array('id' => $value));
	 }else{
	 	$change = array('animal_id' => $update);
         	$this->db->where('id', $value);
         	$this->db->update('tag_animals', $change);
	 }
	}
    }

}



