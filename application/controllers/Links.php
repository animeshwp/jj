<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */



class Links extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $data['title'] =  "links";
        $data['links'] = "Add Web links images";
        $data['username'] = $this->session->userdata('username');
        $this->load->view('links/v_links', $data);
    }
    
    Public function do_upload() {  
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation'); 
         
        // form validation check   
         $this->form_validation->set_rules('linksname', 'links Name', 'required');
         $this->form_validation->set_rules('weblink', 'Web links', 'required');

        if (!$this->form_validation->run()) {
            redirect(base_url('links'));
                
        } else {             

            $this->load->model('mod_links');
            $query = $this->mod_links->insert_links();
//            print_r($file_name); exit;
            if($query == 1 ){
                redirect(base_url('links/linkslists'));
            }
        }
    }

    
    public function linkslists(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Web links";
        
        
        $this->load->Model('mod_links');
        $data['links_content'] = $this->mod_links->view_links();
        $this->load->view('links/v_linkslists', $data);

    }
    
    public function editlinks(){
            
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Edit Web links";  
        
        $links_info = $this->security->xss_clean($this->uri->segment(3)); 
        $this->load->Model('mod_links');
        $data['links_content'] = $this->mod_links->edit_links($links_info);
//        print_r($data); exit;
        $this->load->view('links/v_linksedit', $data);
    }


    public function updatelinks(){ //update_links
        $this->load->library('form_validation'); 
        $data['title'] = "List of The Web links";
        $data['username'] = $this->session->userdata('username');
        $links_info = $this->security->xss_clean($this->input->post('hidd_id'));              
         
        // form validation check   
        $this->form_validation->set_rules('linksname', 'links Name', 'required');
        
        if($this->form_validation->run() == False){
            redirect(base_url('links/editlinks/'.$links_info));
        }else{
        $this->load->Model('mod_links');
        $result = $this->mod_links->update_links($links_info);
        
        if($result){
            redirect(base_url('links/linkslists'));
        }
        
        }
    }
    
    public function inactiveLinksLists(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The links";
        
        
        $this->load->Model('mod_links');
        $data['inactivelinks_content'] = $this->mod_links->view_inactivelinks();
//        echo "<pre>";
//        print_r($data); exit;
        $this->load->view('links/v_linksinactivelists', $data);

    }
    
}