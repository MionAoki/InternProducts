<?php
class User_login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_login');
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library(array('session', 'form_validation'));

	$this->load->library('Login_session');
    }

    public function index()
    {
        $this->login();
    }

    public function login()
    {
	$this->form_validation->set_rules('user_id', 'ユーザーID', 'required',
				array('required' => '%sは必須です.')
				);
	$this->form_validation->set_rules('password', 'パスワード', 
				'required',
				array('required' => 'パスワードは必須です.')
				);
 
        if($this->form_validation->run() === FALSE)
        {
            $this->load->view('pages/login');
        }
        else
        {
		$user_id = $this->input->post('user_id');
		$password = $this->input->post('password');

		if ($this->Model_login->checkData($user_id,$password) == "True")
            	{
		 $this->login_session->login($user_id); 
		 redirect('loggedin/success');
		}
             	else
             	{
		 $data["login_false"] = "false";
		 $this->load->view('pages/login',$data);
             	}
        }
	$this->load->view('templates/new_footer');
    }

}
