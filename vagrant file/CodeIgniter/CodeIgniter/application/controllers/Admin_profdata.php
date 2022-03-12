<?php
class Admin_profdata extends CI_Controller
{
        public function __construct()
          {
              parent::__construct();
	      $this->load->Model('admin/Model_adminprofdata');
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
	 if(isset($_SESSION['edit_result'])){
		$data["msg"] = $_SESSION['edit_result'];
	 }

	 $data["location"] = getTable("location");
	 $data["sector"] = getTable("sector");
	 $data["job"] = getTable("job");
	 $data["purpose"] = getTable("purpose");
	 $this->load->view('pages/admin/admin_profdata',$data);
	}


	public function edit()
	{
	 $kind = $this->input->post("add_kind"); //編集するテーブルを取得(menuの追加を押したとき)
		if($kind == NULL){$kind = NULL;}
	 $select_table = $this->input->post("select_table"); //編集するテーブルを取得(フォーム送信時)
	 $select_edit = $this->input->post("select_edit"); //編集ボタン押した時取得
	 $add_num = $this->input->post("add_num");
	 $data["add_num"] = $add_num;
	 $content = $this->input->post("content");

	 if(isset($select_edit)){ //編集ボタンを押した場合
		$select_table = $this->Model_adminprofdata->identifyTable($select_edit);
		$data["formar"] = $this->Model_adminprofdata->getFormar($select_table,$select_edit);
		$data["kind"] = $select_table;
		$this->load->view('pages/admin/profdata_edit',$data);
	 }
	 elseif(isset($kind)){
		$data["kind"] = $kind;
		$this->load->view('pages/admin/profdata_edit',$data);
	 }
	 else{
	 
	 $validation = $this->Model_adminprofdata->validation($select_table , $add_num);
	 $this->form_validation->set_rules($validation);

	 if($this->form_validation->run() === FALSE){
		$data["kind"] = $select_table;
		if($content == "edit"){
		 $data["hold_id"] = $this->input->post("edit_id");
		}
		$this->load->view('pages/admin/profdata_edit',$data);
	 }else{
		if($content == "add"){
		 $datalist = $this->Model_adminprofdata->getAddData($select_table,$add_num);

		 if($this->Model_adminprofdata->add_data($datalist,$select_table,$add_num)){
		  $this->session->set_flashdata('edit_result','データを編集しました');
		 }else{
		  $this->session->set_flashdata('edit_result','データを編集できませんでした');
		 }
		}elseif($content == "edit"){
		 $datalist = $this->input->post($select_table."0");
		 $edit_id = $this->input->post("edit_id");
		 if($this->Model_adminprofdata->edit_data($datalist,$select_table,$edit_id)){
                  $this->session->set_flashdata('edit_result','データを編集しました');
                 }else{
                  $this->session->set_flashdata('edit_result','データを編集できませんでした');
                 }
		} /*if($content == "")*/

		redirect('admin_profdata/editmenu');
	 }
	 } /*if(isset($select_edit))else()*/
	}


	public function deldata()
	{
	 $del_id = $this->input->post("delid");
	 $select_table = $this->Model_adminprofdata->identifyTable($del_id);
	 if($this->Model_adminprofdata->delData($select_table,$del_id)){
	  $this->session->set_flashdata('edit_result', 'データを削除しました');
	 }else{
	  $this->session->set_flashdata('edit_result', 'データを削除できませんでした');
	 }

	 redirect('admin_profdata/editmenu');
	}


}
