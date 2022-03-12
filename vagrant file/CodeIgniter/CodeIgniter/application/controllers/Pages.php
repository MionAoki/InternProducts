<?php
class Pages extends CI_Controller {

        public function show($page = 'home')
        {

		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))    
       		{
        	 //application/views/errors/html/error_404.php shows
       		  show_404();
       		 }

        	$data['title'] = ucfirst($page);

        	$this->load->view('templates/header',$data);
        	$this->load->view('pages/'.$page, $data);
        	$this->load->view('templates/footer');

        }

}
