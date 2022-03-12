<?php
class Introduce extends CI_Controller{
	public function __construct()
        {
		parent::__construct();
              	$this->load->library('Login_session');
		$this->load->model("Model_introduce");
	}
	
	public function index()
	{
		$this->detail();
	}
	public function detail($id)
	{
		if ( ! $this->login_session->is_logged_in())
                {
                 redirect('user_login/login');
                }
		else
		{
		 $data = $this->Model_introduce->assign_data($id);
		 $data["backfront"] = $this->Model_introduce->back_front($id);
		 $data["DateList"] = $this->Model_introduce->getDate(); 

		 $data["changeTable"] = "pages/introduce_detail/timetable";
		 $is_ajax = $this->input->post("ajax");
		 if($is_ajax){
                        $day = $this->input->post("checked_day");
			$data = $this->Model_introduce->change_time($day,$data);

                        $this->load->view($data["changeTable"], $data);
                 }
		 else{
			$day = $data["DateList"][0];
			$data = $this->Model_introduce->change_time($day,$data);
	
			$this->load->view('pages/introduction', $data);
			$this->load->view('templates/new_footer');
		 }
		}
	}

}


