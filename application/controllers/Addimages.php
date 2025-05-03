<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class Addimages extends MY_Controller {    
    
     
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Mod_addimageinfo', 'Mod_addimageinfo');        
    }

    public function index() {
        
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Image Manager";        
        
        $data['image_data'] = $this->Mod_addimageinfo->viewimageinfo();

        $this->load->view('components/imagemanager/admin/index', $data);
    }

    public function do_upload($messege) {  
        
        $messege = "done";
        
        $config['upload_path'] = './uploads/';
//        $config['allowed_types'] = 'gif|jpg|png|jpeg|doc|docx|pdf|xls|xlsx|pptx|pptx';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
//        $config['allowed_types'] = '*';

        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            
            redirect('addimages');

        } else {
            
            $data = $this->upload->data();
            
             
            $data = $data['file_name'];
 
            $this->Mod_addimageinfo->addimageinfo($data);
            redirect(base_url('addimages/viewimageslist', refresh));

        }
    }
    
    
      public function viewimageslist(){
        
        $data['username'] = $this->session->userdata('username');

        $data['title'] = "Image Manager";
        
 
        
        $data['image_data'] = $this->Mod_addimageinfo->viewimageinfo();
        
        
        $this->load->view('components/imagemanager/admin/viewimageslist', $data);

    }

    public function myinformation(){

    }

}