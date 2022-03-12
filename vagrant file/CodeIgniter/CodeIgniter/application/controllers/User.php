<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_regist');
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation'));
    }

    public function index()
    {
        $this->register();
    }

    public function register()
    {
	$name_vali = array(
		array('field' => 'lastname','label' => '姓','rules' => 'required',
		'errors' => array('required' => '%sを入力してください.')),
		array('field' => 'firstname','label' => '名','rules' => 'required',
                'errors' => array('required' => '%sを入力してください.'))
		);
	$this->form_validation->set_rules($name_vali);

	$this->form_validation->set_rules('user_id', 'ユーザーID', 'required|is_unique[login.user_id]',
	array('required' => '%sを入力してください.',
	'is_unique' => 'その%sはすでに登録済です.<br/>入力を変更してください.'));

	$this->form_validation->set_rules('password', 'パスワード', 
	'required', 
	array('required' => '%sを入力してください.'));
 
	$this->form_validation->set_rules('passconf', 'パスワード確認',
        'required|matches[password]',
        array('required' => '%sを入力してください.' , 
	'matches' => '%sが一致しません.'));

        if($this->form_validation->run() === FALSE)
        {
            $this->load->view('pages/register');
	    $this->load->view('templates/new_footer');
        }
        else
        {
		if ($this->Model_regist->set_user())
            	{                             
                 $this->session->set_flashdata('msg_success','Registration Successful!');
             	 redirect('user/success');
		}
             	else
             	{
                 $this->session->set_flashdata('msg_error','Error! Please try again later.');
                 redirect('user/register');
             	}
        }
    }

    public function success()
    {
	$this->load->view('pages/register_success');
	$this->load->view('templates/new_footer');
    }

}



