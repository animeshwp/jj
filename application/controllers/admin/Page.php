<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */



class Page extends MY_Controller {
    public function __Construct(){
        parent::__construct();                
        
        $this->load->Model('admin/mod_page', 'mod_page');
        }
    
    public function index(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Add New page";
        $this->load->view('page/v_page', $data);

    }
    
    Public function do_upload() {  
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation'); 
         
        // form validation check   
        $this->form_validation->set_rules('pagename', 'page Name', 'required');
        $this->form_validation->set_rules('page_text', 'page Name', 'required');
        

        if (!$this->form_validation->run()) {
            redirect(base_url('page'));
                  
                
        } else {             
 
            $query = $this->mod_page->insert_page();
//            print_r($query); exit;

                redirect(base_url('page'));

        }
    }

    
    public function pagelists(){
        
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The page";

        $data['page_content'] = $this->mod_page->view_page();
 
        $this->load->view('page/v_pagelists', $data);

    }
    
    public function editpage(){
            
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Edit page";  
        
        $page_info = $this->security->xss_clean($this->uri->segment(4)); 

   
 
        $data['page_content'] = $this->mod_page->edit_page($page_info);
 
        $this->load->view('page/v_pageedit', $data);
    }


    public function updatepage(){ //update_page
        $this->load->library('form_validation'); 
        $data['title'] = "List of The page";
        $data['username'] = $this->session->userdata('username');
        $page_info = $this->security->xss_clean($this->input->post('hidd_id'));              
         
        // form validation check   
        $this->form_validation->set_rules('pagename', 'page Name', 'required');
        
        if($this->form_validation->run() == False){
            redirect(base_url('page/editpage/?page_id='.$page_info));
            
        }else{
            
 
        $result = $this->mod_page->update_page($page_info);
        
        if($result){
            redirect(base_url('page/pagelists'));            
            }        
        }
    }
    
    public function inactivepageLists(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The page";
        
 
        $data['inactivepage_content'] = $this->mod_page->view_inactivepage();
//        echo "<pre>";
//        print_r($data); exit;
        $this->load->view('page/v_pageinactivelists', $data);

    }
    
    public function deletepage($id){
        $nemu_id = (int)$id;
 
        $data['inactivepage_content'] = $this->mod_page->page_delete($nemu_id);
        $this->pagelists('refresh');
        
    }
           
}
