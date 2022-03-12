<?php
class Model_adminlogin extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function validation()
    {
	$rule = array(
                array(
                'field' => 'admin_id','label' => '管理者ID','rules' => 'required',
                'errors' => array('required' => '%sを入力してください.')
                ),
                array(
                'field' => 'password','label' => 'パスワード','rules' => 'required',
                'errors' => array('required' => '%sを入力してください.')
                ),
        );
	return $rule;
    }

    public function encry_inputpass($password)
    {
	$this->load->library('encrypt');
	$encry_pass = $this->encrypt->encode($password);
	return $encry_pass;
    }

}

