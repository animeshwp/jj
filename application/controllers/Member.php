<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */



class Member extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('admin/Mod_login');
        $this->load->model('member/auth_model');
        $this->load->library('form_validation');

    }

    public function index(){
        
        
        $this->form_validation->set_rules('username', 'Username', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() == FALSE){
            if($this->session->has_userdata('username')){
                redirect(base_url('member/dashboard'));
           }else{
               $this->load->view('templates/member/index');
               // do something when doesn't exist
           }
            
        }else{
            
        
        $admin_data = $this->Mod_login->login_info();
        
//        print_r($admin_data); exit;  
        if($admin_data['login_validation']== FALSE ){
            redirect(base_url());
        }else{
            $session_data = array(
                   'username'  => $admin_data['admin_name'],
                   'password'     => $admin_data['admin_password'],
                   'logged_info' => TRUE
               );

        $this->session->set_userdata($session_data);
        redirect(base_url('admin_area'));

        }
        }
    }    

    public function login(){

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->form_validation->set_rules('username', 'Username', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() == FALSE){
            if($this->session->has_userdata('username')){
                redirect(base_url('member/dashboard'));
           }else{
               $this->load->view('templates/member/index');
               // do something when doesn't exist
           }
            
        }else{

        $user = $this->auth_model->authenticate($username, $password);

        // print_r($user); exit();

        if($user == TRUE) {

            $this->session->set_userdata($user);
           
            // print_r($user); exit;
            $data = array('success' => true, 'message' => 'Login successful', 'redirect_url' => base_url('member/dashboard'));
            
            echo json_encode($data);
             
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid username or password', 'redirect_url' => 'member/login'));
        }
    }
    }


    public function dashboard(){

        if(!$this->session->has_userdata('username')){
            redirect(base_url('member'));            
       }else{

        redirect(base_url('alamnis/member/profile')); 

        // $this->load->view('templates/member/common/header');
        // $this->load->view('templates/member/common/sidebar');
        // $this->load->view('templates/member/dashboard');
        // $this->load->view('templates/member/common/footer');
       }

    }
}
// End