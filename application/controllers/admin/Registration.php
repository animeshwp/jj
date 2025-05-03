<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IERAA
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class Registration extends MY_Controller {

    public function __construct() {
        parent::__construct();     
    
        $this->load->model('admin/Mod_registration', 'Mod_registration');
    }
         

    public function index()
    {
        $data['title'] = "Registration Page";
  
        $data['username'] = $this->session->userdata('username');
        $this->load->model('home/mod_menu');
        $data['menu_content'] = $this->mod_menu->view_hmenu();
    
        
        // slide view on home page
        $this->load->model('home/mod_slide');
        $data['temp']['slide_info'] = $this->mod_slide->view_hslide();          
               
        
        // weblists view on home page        
        $this->load->model('home/mod_links');
        $data['links_info'] = $this->mod_links->view_hlinks(); 
        
        // welcome messege
        $this->load->model('home/mod_message');
        $data['wmessege_info'] = $this->mod_message->view_hmessage();
        
         // widgets 
        $this->load->model('home/mod_widget');
        $data['widget_info'] = $this->mod_widget->view_hwidget();     

     
 
        $this->load->library('form_validation'); 

        // form validation check   
        $this->form_validation->set_rules('data[fullname]', 'fullname', 'required', array('required'=>"Name is Empty!"));
        $this->form_validation->set_rules('data[alumni_regno]', 'Alumni\'s ID', 'required', array('required'=>"Alumni ID is Empty!"));
        $this->form_validation->set_rules('data[batch]', 'batch', 'required', array('required'=>"Select Batch!"));
        $this->form_validation->set_rules('data[passingyear]', 'passingyear', 'required', array('required'=>"Select Passing Year!"));
        $this->form_validation->set_rules('data[address]', 'address', 'required', array('required'=>"Add your Address!"));
        $this->form_validation->set_rules('data[mobileno]', 'mobileno', 'required', array('required'=>"Add Mobile Number!"));
        $this->form_validation->set_rules('data[email]', 'email', 'required', array('required'=>"Email is Empty!"));
        $this->form_validation->set_rules('data[workingstation]', 'workingstation', 'required', array('required'=>"Add your Work Station!"));
        
        
        if (!$this->form_validation->run()) {

            $this->load->view('templates/admin/common/header', $data);
            $this->load->view('templates/admin/common/left_nav');
            $this->load->view('templates/admin/registration/index', $data);
            $this->load->view('templates/admin/common/footer');

        } else {  

            //smart_sector
            $data = $this->input->post('data', TRUE);        
            $insert = $this->Mod_registration->save_alumni_data($data);
            
            if(!empty($insert))
            {
                $message['message'] = "Registration Successfully Completed!";
                $this->session->set_userdata($message);
                redirect(base_url('admin/registration'));   

            } else {
                
                $errormessage['errormessage'] = "Not Completed! Please try again.";
                $this->session->set_userdata($errormessage);
                redirect(base_url('admin/registration'));
            }              
            
        }
        
    }
    
    public function view(){
        
        $data['title'] = "Registration Page";
        
        $data['username'] = $this->session->userdata('username');
        $data['alumnis'] = $this->Mod_registration->get_alumni_data();
        $this->load->view('templates/admin/common/header', $data);
        $this->load->view('templates/admin/common/left_nav');
        $this->load->view('templates/admin/registration/view_index', $data);
        $this->load->view('templates/admin/common/footer');
     }

     public function detail($id){
        $id = (int)$id;
        $data['title'] = "Alumni Detail Information";
        
        $data['username'] = $this->session->userdata('username');
        $data['alumni'] = $this->Mod_registration->get_detail_alumni_data($id);
        $this->load->view('templates/admin/common/header', $data);
        $this->load->view('templates/admin/common/left_nav');
        $this->load->view('templates/admin/registration/view_detail', $data);
        $this->load->view('templates/admin/common/footer');
     }

}