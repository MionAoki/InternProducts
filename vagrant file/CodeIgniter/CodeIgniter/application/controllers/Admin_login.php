<?php
class Admin_login extends CI_Controller
{
        public function __construct()
          {
              parent::__construct();
	      $this->load->model('admin/Model_adminlogin');
	      $this->load->library(array('session', 'form_validation'));
	      $this->load->helper(array('login','replace'));
	      $this->load->library('Login_session');
          }

        public function index()
        {
                $this->login();
        }

	public function login()
	{
		$rule = $this->Model_adminlogin->validation();
                $this->form_validation->set_rules($rule);
		if($this->form_validation->run() === FALSE)
		{
            	 $this->load->view('pages/admin/admin_login');
		}else
		{

		 $admin_id = $this->input->post('admin_id');
                 $password = $this->input->post('password');

                 if (checkData("admin_login","admin_id", $admin_id, $password) == "True")
                 {
                  $this->login_session->admin_login($admin_id);
                  redirect('admin_main/main');
                 }
                 else
                 {
		  $this->session->set_flashdata('login_false','ログインIDまたはパスワードが間違っています');
                  redirect('admin_login/login');
                 }
		}
	}

	public function encryption()
	{
	 if ( ! $this->login_session->is_adminlogged_in())
         {
		redirect('admin_login/login');
         }
	 else{
	 $input_pass = delEmpty($this->input->post('encry_pass'));
	 if(isset($input_pass)){
	  $this->session->set_flashdata('input_pass',$input_pass);
	  $data["encry_pass"] = $this->Model_adminlogin->encry_inputpass($input_pass);
	  $this->load->view('pages/admin/admin_pass',$data);
	 }else{
	  $this->load->view('pages/admin/admin_pass');
	 }
	 }
	}

}

