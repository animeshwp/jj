<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class Opportunities extends MY_Controller {
    public function __Construct(){
        parent::__construct();
        
        $this->load->model('admin/mod_opportunities', 'mod_opportunities');
        }
    
    public function index(){
        $data['username'] = $this->session->userdata('username');
//        $this->load->view('v_users', array('error' => ' '));
        $data['title'] = "Add New opportunities";
        $this->load->view('opportunities/v_opportunities', $data);

    }
    
    Public function do_upload() {  
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation'); 
         
        // form validation check   
        $this->form_validation->set_rules('opportunitiesname', 'opportunities Name', 'required');
        
        // image informatio upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|doc|docx|pdf|xls|xlsx|pptx|ppt';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        $yes_upload = $this->upload->do_upload();
        if (!$this->form_validation->run()) {
            redirect(base_url('admin/opportunities'));
            
        }elseif (!$yes_upload) {
           redirect(base_url('admin/opportunities'));        
                
        } else {             
            $img_data =  $this->upload->data();
            $file_name = $img_data['file_name'];
            
            $query = $this->mod_opportunities->insert_opportunities($file_name);
//            print_r($file_name); exit;
            if($query == 1 ){
                redirect(base_url('admin/opportunities'));
            }
        }
    }

    
    public function opportunitieslists(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The opportunities";
        
        
 
        $data['opportunities_content'] = $this->mod_opportunities->view_opportunities();
        $this->load->view('opportunities/v_opportunitieslists', $data);

    }
    
    public function editopportunities($id){
            
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Edit opportunities";  
        
        $opportunities_info = (int)$id;
 
        $data['opportunities_content'] = $this->mod_opportunities->edit_opportunities($opportunities_info);
//        print_r($data); exit;
        $this->load->view('opportunities/v_opportunitiesedit', $data);
    }


    public function updateopportunities($id){ //update_opportunities
        
        
        
        $this->load->library('form_validation'); 
        $data['title'] = "List of The opportunities";
        $data['username'] = $this->session->userdata('username');
        $opportunities_info = (int)$id;              
         
        // form validation check   
        $this->form_validation->set_rules('opportunitiesname', 'opportunities Name', 'required');
        
        
        // image informatio upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|doc|docx|pdf|xls|xlsx|pptx|ppt';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        $yes_upload = $this->upload->do_upload();
        if (!$this->form_validation->run()) {
//            redirect(base_url('opportunities'));
            redirect(base_url().'admin/opportunities/editopportunities/'.$opportunities_info);
       
            
//        }elseif (!$yes_upload) {
//           
//            redirect(base_url().'admin/opportunities/editopportunities/'.$opportunities_info);
                
        } else {             
            $img_data =  $this->upload->data();
            $file_name = $img_data['file_name'];
            
            $result = $this->mod_opportunities->update_opportunities($file_name, $opportunities_info);
        
        if($result){
            redirect(base_url('admin/opportunities/opportunitieslists'));
            }       
        }
    }
    
    public function inactiveopportunities(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The opportunities";
        

        $data['inactiveopportunities_content'] = $this->mod_opportunities->view_inactiveopportunities();
//        echo "<pre>";
//        print_r($data); exit;
        $this->load->view('opportunities/v_opportunitiesinactivelists', $data);

    }
    
    public function deleteopportunities($id){
        $id = (int)$id;
        $this->mod_opportunities->delete_opportunities($id);
        redirect(base_url('admin/opportunities/opportunitieslists'));
    }
}

