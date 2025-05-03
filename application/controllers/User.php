<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class User extends CI_Controller {
    public function __Construct(){
        parent::__construct();
        }
    
    public function index(){
        $data['username'] = $this->session->userdata('username');
//        $this->load->view('v_users', array('error' => ' '));
        $data['title'] = "Add New User";
        $this->load->view('v_users', $data);

    }
    
    Public function do_upload() {
        $data['username'] = $this->session->userdata('username'); 
        $config['upload_path'] = 'F:/xampp/htdocs/medical/uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            redirect(base_url('user'));
        } else {             
            $img_data =  $this->upload->data();
            $file_name = $img_data['file_name'];
            $this->load->model('mod_user');
            $query = $this->mod_user->insert_user($file_name);
//            print_r($file_name); exit;
            if($query == 1 ){
                redirect(base_url('user/userlists'));
            }
        }
    }
    
    public function userlists(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The Users";
        $this->load->view('v_userlists', $data);
    }

    // public function check_exist_email(){
    //     $this->load->view('checkmail');
    // }

    function email_availibility()  
      {  
           $data["title"] = "Codeigniter Tutorial - Check Email availibility using Ajax";  
           $this->load->view("checkmail", $data);  
           // echo "<pre>";
           // print_r($_SERVER); exit();
      }

    function check_email_avalibility()  
      {  
        
        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  
           {  
                echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Invalid Email</span></label>';  
           }  
        else
           {  
                $this->load->model("main_model");  

                if($this->main_model->is_email_available($_POST["email"]))  
                {  
                     echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Email Already register</label>';  
                }  
                else  
                {  
                     echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Email Available</label>';  
                }  
           }  
      }    
}

