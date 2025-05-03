<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Users extends CI_Controller {
    public function __Construct(){
        parent::__construct();
        $this->load->Model('home/mod_users', 'mod_users');
        $this->load->Model('admin/mod_membership', 'mod_membership');        
        
    }
    
    public function index(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Add New User";
        $this->load->view('v_users', $data);

    }
    
    public function login(){

        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation');
        
        
        $this->form_validation->set_rules('username', 'Username', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() == FALSE){
            
            $this->load->view('home/header');
            $this->load->view('users/v_login');
            $this->load->view('home/footer');
            
        }else{
            
        
        $user_data = $this->mod_users->login_info();

        
        if($user_data['login_validation']== FALSE ){

            redirect(base_url("users/login"));
        }else{
                $session_data = array(
                    'name'  => $user_data['name'],
                    'user_id'  => $user_data['user_id'],
                    'username'  => $user_data['username'],
                    'password'     => $user_data['password'],
                    'logged_info' => TRUE
               );
                $this->session->set_userdata($session_data);
                redirect(base_url('users/my_account'));

            }
        }
    } 
    
    
    public function change_password(){

        $logged_info = $this->session->userdata('logged_info');
        if($logged_info == FALSE){
            redirect(base_url());
        }
        $data['username'] = $this->session->userdata('username');
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation'); 

        $data['pass_mismatch_msg'] = "";
        $user_id = $this->session->userdata('user_id');

        $this->form_validation->set_rules('new_password', 'new_password', 'required', array('required'=>" এই ফিল্ডটি পূরণ করুন"));
        $this->form_validation->set_rules('retype_password', 'retype_password', 'required', array('required'=>" এই ফিল্ডটি পূরণ করুন"));


        if (!$this->form_validation->run()) {
            $this->load->view('home/header');   
            $this->load->view('users/v_change_password', $data);
            $this->load->view('home/footer');
        } else {

            if($this->input->post('new_password') != $this->input->post('retype_password')){
                $data['pass_mismatch_msg'] = "Password mismatched! Please try again.";
                $this->load->view('users/v_change_password', $data);
        
            }
            else{
                $query = $this->mod_users->update_password($user_id);

                if ($query == 1) {
                    redirect(base_url('logout'));
                }
            }

        }
        
    }

    public function admin_change_password($user_id){
        $logged_info = $this->session->userdata('logged_info');
        if($logged_info == FALSE){
            redirect(base_url('users/login'));
        }
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation'); 

        $data['pass_change_success'] = "";
        $data['user_id'] = $user_id;

        $this->form_validation->set_rules('new_password', 'new_password', 'required', array('required'=>" এই ফিল্ডটি পূরণ করুন"));
        $this->form_validation->set_rules('retype_password', 'retype_password', 'required', array('required'=>" এই ফিল্ডটি পূরণ করুন"));

        $data['user_content'] = $this->mod_users->edit_user($user_id);

        //die("dd");

        if (!$this->form_validation->run()) {   
    
            $this->load->view('users/a_change_password', $data);
        } else {

            $query = $this->mod_users->update_password($user_id);
            //echo $query;
           
            if ($query == 1) {
                $data_success['pass_change_success'] = "Password changed successfully.";
                $this->session->set_userdata($data_success);
                
                redirect(base_url('users/user_list'));
            }            
        }        
    }

    public function my_account(){
        $logged_info = $this->session->userdata('logged_info');
        if($logged_info == FALSE){
            redirect(base_url('users/login'));
        }
        $data['message']= "Your Membership Account is Created Successfully. Thank You!";
        $this->load->view('home/header');
        $this->load->view('users/v_my_account', $data);
        $this->load->view('home/footer');
    }

    public function my_profile(){
        $logged_info = $this->session->userdata('logged_info');
        if($logged_info == FALSE){
            redirect(base_url('users/login'));
        }
        

        $data['membership_content'] = $this->mod_membership->view_members_informatoins();
       
        $data['message']= "Your Membership Account is Created Successfully. Thank You!";
        $this->load->view('home/header');
        $this->load->view('users/v_my_profile', $data);
        $this->load->view('home/footer');
    }

    public function my_membership(){
        $logged_info = $this->session->userdata('logged_info');
        if($logged_info == FALSE){
            redirect(base_url('users/login'));
        }
        $data['users_content'] = $this->mod_membership->get_membersinfo_accto_session_id($_SESSION['user_id']);
        $data['users_contents'] = $this->mod_membership->view_members_informatoin();
        
        $this->load->view('home/header');
        $this->load->view('users/v_my_membership', $data);
        $this->load->view('home/footer');
    }

    public function my_fees(){
        $logged_info = $this->session->userdata('logged_info');
        if($logged_info == FALSE){
            redirect(base_url('users/login'));
        }
         // print_r($_SESSION);
        $data['users_content'] = $this->mod_membership->get_membersinfo_accto_session_id();
        // echo "UOC".rand(); 
        // echo "<pre>";
        // print_r($data); exit;
        $this->load->view('home/header');
        $this->load->view('users/v_my_fees', $data);
        $this->load->view('home/footer');
    }
    
    public function user_list(){
        $logged_info = $this->session->userdata('logged_info');
        if($logged_info == FALSE){
            redirect(base_url('users/login'));
        }
        $data['username'] = $this->session->userdata('username');
        $data['users_content'] = $this->mod_users->view_users();
        $this->load->view('users/v_user_list', $data);

    }


}

