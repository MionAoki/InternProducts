<?php
class Admin_timetable extends CI_Controller
{
        public function __construct()
          {
              parent::__construct();
              $this->load->model('admin/Model_admintimetable');
              $this->load->library(array('session', 'form_validation','Login_session'));
              $this->load->helper(array('getdb','replace'));

	      if ( ! $this->login_session->is_adminlogged_in())
              {
                redirect('admin_login/login');
              }
          }

        public function index()
        {
                $this->editmenu();
        }

        public function editmenu()
        {
		$data["Date"] = $this->Model_admintimetable->getDate();
		$data["timetable"] = "pages/admin/timetable_menu";

		if(isset($_SESSION['edit_result'])){
		 $data["msg"] = $_SESSION['edit_result'];
		}
		$is_ajax = $this->input->post("ajax");
		if($is_ajax){
                        $day = $this->input->post("checked_day");
			$data["DateList"] = $this->Model_admintimetable->getDateList($day);
                        $this->load->view($data["timetable"], $data);
                }else{
                        $day = $data["Date"][0];
			$data["DateList"] = $this->Model_admintimetable->getDateList($day);
                	$this->load->view('pages/admin/admin_timetable',$data);
                }
	}

	public function edit()
	{
		$content = $this->input->post("content");
		 if(! isset($content)){
                        if(isset($_SESSION['content'])) //page reload
                        {$content = $_SESSION['content'];}
                        else{$content = "add";} //page direct
                 }
		$this->session->set_flashdata('content',$content);
		 if(strpos($content,'edit') !== false){ //editの場合
                  $edit_id = $content;
                  $content = extractStr($edit_id);
                 }

		$posted = $this->input->post("posted");
		if(! isset($posted)) //押してない場合はvalidationしない
                {
			$data["add_num"] = 0;
                        if($content == "edit"){
                         $data["formar"] = $this->Model_admintimetable->input_formar($edit_id);
                        }
                        $this->load->view('pages/admin/timetable_edit',$data);
                }
		else
		{
		 $data["add_num"] = $this->input->post("add_num");
		  if(isset($_SESSION['add_num'])){$data["add_num"] = $_SESSION['add_num'];}
		  if($data["add_num"] == ""){$data["add_num"] = 0;}
		 $validation = $this->Model_admintimetable->validation($data["add_num"]);
                 $this->form_validation->set_rules($validation);

		 if($this->form_validation->run() === FALSE){
                        $this->load->view('pages/admin/timetable_edit',$data);
                 }
		 else{
			$InputList = $this->Model_admintimetable->inputData();
		 	$InputList["add_num"] = $data["add_num"];
			$InputList["editid"] = preg_replace('/[^0-9]/', '', $edit_id);

		 if($content == "add"){
		 	if($this->Model_admintimetable->add_data($InputList)){
		   	 $this->session->set_flashdata('edit_result','タイムテーブルを編集しました');
		   	}elseif(isset($_SESSION['animal_errmsg'])){
		    	 $this->session->set_flashdata('add_num',$data["add_num"]);
		    	 redirect('admin_timetable/edit');
			}elseif(isset($_SESSION['table_unique'])){
			 redirect('admin_timetable/edit');
			}else{
                         $this->session->set_flashdata('edit_result','タイムテーブルを編集できませんでした');
                        }
		 }
		 else if($content == "edit"){
		  	if($this->Model_admintimetable->edit_data($InputList)){
                   	 $this->session->set_flashdata('edit_result','タイムテーブルを編集しました');
                  	}else{
                   	 if(! isset($_SESSION['animal_errmsg'])){
                    	 $this->session->set_flashdata('edit_result','タイムテーブルを編集できませんでした');
                   	 }else{
			 $this->session->set_flashdata('select_id',$InputList["editid"]);
                    	 redirect('admin_timetable/edit');
                   	 }
			}
		 }
		 redirect('admin_timetable/editmenu');
		}
		}
	} /*function*/


	public function delData(){
	 $del_id = $this->input->post("delid");
	 if($this->Model_admintimetable->delData($del_id)){
	  $this->session->set_flashdata('edit_result','データを削除しました');
	 }else{
	  $this->session->set_flashdata('edit_result','データを削除できませんでした');
	 }
	 redirect('admin_timetable/editmenu');
	}

}

