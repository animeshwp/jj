<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */



class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('admin/Mod_login');
    }

    public function index(){
        
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('username', 'Username', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() == FALSE){
            $this->load->view('v_login');
            
        }else{
            var_dump($_POST);
        
        $admin_data = $this->Mod_login->login_info();
        
      
        if($admin_data['login_validation']== FALSE ){
             print_r($admin_data); exit;
            redirect(base_url('login'));
        }else{
            $session_data = array(
                   'username'  => $admin_data['admin_name'],
                   'password'     => $admin_data['admin_password'],
                   'logged_info' => TRUE
               );
//        echo print_r($session_data); exit;
        $this->session->set_userdata($session_data);
        redirect(base_url('admin_area'));
//        redirect(base_url('adminadmin_area'));
        }
        }
    }    
}
