<?php
class User_profile extends CI_Controller
{
	public function __construct()
	{
              parent::__construct();
	      $this->load->model('Model_userprofile');
              $this->load->helper(array('url', 'html'));
	      $this->load->helper('replace');
              $this->load->library('Login_session');
	      $this->load->library(array('session', 'form_validation'));

	      if ( ! $this->login_session->is_logged_in())
              {
		redirect('user_login/login');
              }
	}
	public function index()
        {
                $this->profile();
        }

	public function profile()
	{
		$user = $this->Model_userprofile->getUserData();

		$this->load->view('pages/user_menu/profile',$user);
		$this->load->view('templates/new_footer');
	}

	public function edit_prof()
        {
		$choices = $this->Model_userprofile->getChoices();
		$user = array_merge($this->Model_userprofile->getUserData(),$choices);

		$this->load->view('pages/user_menu/edit_prof',$user);
                $this->load->view('templates/new_footer');
	}

	public function change_prof()
	{
		$formar = array(
                        'user_name' => $this->session->userdata('user_name'),
                        'user_id' => $this->session->userdata('user_id'),
			'Name' => replace($this->session->userdata('user_name')),
		);
		$user_id = $this->input->post('user_id');
		
		$rule = $this->Model_userprofile->validation($user_id , $formar["user_id"]);
		$this->form_validation->set_rules($rule);
		$this->form_validation->set_rules('location', '所在地', 'callback_dropdown_check');

		if($this->form_validation->run() === FALSE)
        	{
			$this->session->set_flashdata('valid_error',$this->form_validation->error_array());
			redirect('user_profile/edit_prof');
        	}else{
			if ($this->Model_userprofile->change_prof($formar["user_id"]))
                	{
                 	 $this->session->set_flashdata('msg_success','Registration Successful!');
			 $this->login_session->login($user_id);
			 redirect('user_profile/profile');
                	}else{
                 	 $this->session->set_flashdata('msg_error','Error! Please try again later.');
                	 redirect('user_profile/edit_prof');
                	}
		}
	}
	
	public function dropdown_check($str){ //original validation
		if ($str == "選択してください"){
			$this->form_validation->set_message('dropdown_check', '選択してください');
                        return FALSE;
                }else{
                        return TRUE;
                }
	}
}




