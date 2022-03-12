
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_session
{
    const LOGGED_IN = 'logged_in';
    const USER_ID = 'user_id';
    const USER_NAME = 'user_name';

    const ADMIN_LOGGED_IN = 'admin_logged_in';
    const ADMIN_ID = 'admin_id';

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->library('session');
	$this->CI->load->database();
    }

    public function is_logged_in() {
        return $this->CI->session->userdata(self::LOGGED_IN);
    }

    public function get_user_id() {
        return $this->CI->session->userdata(self::USER_ID);
    }

    public function login($user_id) {
        $this->CI->session->set_userdata(self::LOGGED_IN, TRUE);
        $this->CI->session->set_userdata(self::USER_ID, $user_id);
	$query = $this->CI->db->get_where('login', array('user_id' => $user_id));
	foreach ($query->result() as $row)
	{
        	$user_name = $row->name;
	}
	$this->CI->session->set_userdata(self::USER_NAME, $user_name);
    }

    public function logout() {
        $this->CI->session->unset_userdata(self::LOGGED_IN);
        $this->CI->session->unset_userdata(self::USER_ID);
        //$this->CI->session->sess_destroy();
    }


    public function is_adminlogged_in(){
	return $this->CI->session->userdata(self::ADMIN_LOGGED_IN);
    }
    public function admin_login($admin_id){
	$this->CI->session->set_userdata(self::ADMIN_LOGGED_IN, TRUE);
        $this->CI->session->set_userdata(self::ADMIN_ID, $admin_id);
    }
    public function admin_logout(){
        $this->CI->session->unset_userdata(self::ADMIN_LOGGED_IN);
        $this->CI->session->unset_userdata(self::ADMIN_ID);
        //$this->CI->session->sess_destroy();
    }

}


