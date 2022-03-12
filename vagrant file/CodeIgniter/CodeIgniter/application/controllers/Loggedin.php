<?php
class Loggedin extends CI_Controller
{
	public function __construct()
          {
              parent::__construct();
	      $this->load->model("Model_loggedin");
              $this->load->helper(array('url', 'html'));
              $this->load->library('Login_session');
	      $this->load->helper('getdb');
          }

	public function index()
	{
		$this->success();
	}

	public function success()
	{
		if ( ! $this->login_session->is_logged_in())
		{
   		 redirect('user_login/login');
		}
		else
		{
		 $data["main_content"] = "pages/table_animals";
		 $data["user_name"] = $this->session->userdata('user_name');
		 $data["tag"] = getColumn("tag_animals","tag_name");
		 $tag_id = $this->input->post('tag_id');
		 if(isset($tag_id)) //tag search from a detail page
		 {
			$data["selected_tagid"] = (int)$tag_id[0];
			$data["tag_name"] = getName($tag_id,"tag_animals","tag_name");
			$data["results"] = $this->Model_loggedin->fromTagId($tag_id);
                 }
		 else
		 {
		 	$data["results"] = getTable("animals");
		 }
		 $this->load->view('pages/login_success', $data);
		 $this->load->view('templates/new_footer');
		}
	}

	public function search()
	{
		 $is_ajax = $this->input->post("ajax");
                 if($is_ajax)
                 {
                        $data["main_content"] = "pages/table_animals";
                        $keyword = $this->input->post("keyword");
				$del_space = str_replace(array(" ", "　"), "", $keyword);
			$tag_data = $this->input->post("tag_data");

			if($del_space == "") //no Keyword
			{
			 if($tag_data == NULL) //No search
			 {
                         $data["results"] = getTable("animals");
                         }
                         else //tag search only
			 {
                         $data["tag_name"] = getName($tag_data,"tag_animals","tag_name");
			 $nodup = $this->Model_loggedin->nodup_id($tag_data);
			 $data["results"] = $this->Model_loggedin->fromIdArray($nodup);
                         }
			}
			else	//Keyword is there
			{
			 $data["keyword"] = $keyword;
                 	 $how_search = $_POST['how_search'];
                 	 $key_way = [$keyword, $how_search];
			 
			 if(isset($tag_data)) //tag checked & input keyword
			 {
				$data["tag_name"] = getName($tag_data,"tag_animals","tag_name");
				$data["results"] = $this->Model_loggedin->tag_key_search($tag_data,$key_way);
			 }
			 else //keyword search only
			 {
                        	$data["results"] = $this->Model_loggedin->searchdb($key_way);
			 }
			}
			$this->load->view($data["main_content"], $data);
                 }
                 else{}
	}

	public function logout()
	{
		$this->login_session->logout();
		redirect('user_login/login');
	}
}


