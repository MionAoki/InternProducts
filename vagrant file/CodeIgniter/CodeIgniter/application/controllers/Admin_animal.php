<?php
class Admin_animal extends CI_Controller
{
        public function __construct()
        {
              parent::__construct();
	      $this->load->model('admin/Model_adminanimal');
              $this->load->library('Login_session');
	      $this->load->library('form_validation');

	      if ( ! $this->login_session->is_adminlogged_in())
              {
                redirect('admin_login/login');
              }
        }

        public function index()
        {
                $this->edit();
        }

	public function editmenu()
	{
		if(isset($_SESSION['edit_result'])){
                        $data["msg"] = $_SESSION['edit_result'];
                }else if(isset($_SESSION['del_result'])){
                        $data["msg"] = $_SESSION['del_result'];
                }
		$data["list"] = $this->Model_adminanimal->new_getList();
		$this->load->view('pages/admin/admin_animal',$data);
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
		$data["content"] = $content;
		$data["taglist"] = getColumn("tag_animals","tag_name");

		$posted = $this->input->post("posted"); //編集決定ボタンを押したかどうか判定
		if(! isset($posted)) //押してない場合はvalidationしない
		{
			if($content == "edit"){
			 $data["formar"] = $this->Model_adminanimal->getSpecLine($edit_id);
			}
			$this->load->view('pages/admin/animal_edit',$data);
		}
		else
		{
		 $inputData = $this->Model_adminanimal->inputData();
		 $inputData["content"] = $content;

		 $validation = $this->Model_adminanimal->validation($content);
                 $this->form_validation->set_rules($validation);

		 if($this->form_validation->run() === FALSE ||
                 ($inputData["chk_box"] == NULL && isset($inputData["new_tag"]) == FALSE))
		 {
			if($inputData["chk_box"] == NULL && isset($inputData["new_tag"]) == FALSE){
                         $data["chkbox_err"] = "所持タグを選択(入力)してください.";
			}
			$this->load->view('pages/admin/animal_edit',$data);
		 }else
		 {
			$success_msg = "動物データを編集しました";
			$failure_msg = "動物データを編集できませんでした";
		  if($content == "add")
		  {
                   if($this->Model_adminanimal->add_animal($inputData)){
                   $this->session->set_flashdata('edit_result',$success_msg);
                   }else{
                   $this->session->set_flashdata('edit_result',$failure_msg);
                   }
                  }
		  else if($content == "edit"){
                   if($this->Model_adminanimal->edit_animal($inputData)){
                   $this->session->set_flashdata('edit_result',$success_msg);
                   }else{
                   $this->session->set_flashdata('edit_result',$failure_msg);
                   }
                  }
			redirect('admin_animal/editmenu');
		 
		 } /*validation*/
		} /*isset($posted)*/

	}


	/*データ削除*/
	public function deldata()
	{
		if($this->Model_adminanimal->del_animal()){
		 $this->session->set_flashdata('del_result','データを削除しました');
		}else{
		 $this->session->set_flashdata('del_result','データを削除できませんでした.');
		}
		redirect('admin_animal/editmenu');
	}
}



