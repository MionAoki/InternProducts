<?php
class Admin_main extends CI_Controller
{
        public function __construct()
        {
              parent::__construct();
	      $this->load->library('Login_session');
        }

        public function index()
        {
                $this->main();
        }

	public function main()
	{
	 if ( ! $this->login_session->is_adminlogged_in()){
		redirect('admin_login/login');
	 }
	 else{
		$this->load->view('pages/admin/admin_main');	
	 }
	}

	public function logout()
        {
                $this->login_session->admin_logout();
                redirect('admin_login/login');
        }

}

