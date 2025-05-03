<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class Pgdresult extends MY_Controller {
    public function __Construct(){
        parent::__construct();
        
        $this->load->model('admin/mod_pgdresult', 'mod_pgdresult');
        }
    
    public function index(){
        $data['username'] = $this->session->userdata('username');
//        $this->load->view('v_users', array('error' => ' '));
        $data['title'] = "Add New pgdresult";
        $this->load->view('pgdresult/v_pgdresult', $data);

    }
    
    Public function do_upload() {  
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation'); 
         
        // form validation check   
        $this->form_validation->set_rules('pgdresultname', 'pgdresult Name', 'required');
        
        // image informatio upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|doc|docx|pdf|xls|xlsx|pptx|ppt';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        $yes_upload = $this->upload->do_upload();
        if (!$this->form_validation->run()) {
            redirect(base_url('admin/pgdresult'));
            
        }elseif (!$yes_upload) {
           redirect(base_url('admin/pgdresult'));        
                
        } else {             
            $img_data =  $this->upload->data();
            $file_name = $img_data['file_name'];
            
            $query = $this->mod_pgdresult->insert_pgdresult($file_name);
//            print_r($file_name); exit;
            if($query == 1 ){
                redirect(base_url('admin/pgdresult'));
            }
        }
    }

    
    public function pgdresultlists(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The pgdresult";
        
        
 
        $data['pgdresult_content'] = $this->mod_pgdresult->view_pgdresult();
        $this->load->view('pgdresult/v_pgdresultlists', $data);

    }
    
    public function editpgdresult($id){
            
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Edit pgdresult";  
        
        $pgdresult_info = (int)$id;
 
        $data['pgdresult_content'] = $this->mod_pgdresult->edit_pgdresult($pgdresult_info);
//        print_r($data); exit;
        $this->load->view('pgdresult/v_pgdresultedit', $data);
    }


    public function updatepgdresult($id){ //update_pgdresult
        
        
        
        $this->load->library('form_validation'); 
        $data['title'] = "List of The pgdresult";
        $data['username'] = $this->session->userdata('username');
        $pgdresult_info = (int)$id;              
         
        // form validation check   
        $this->form_validation->set_rules('pgdresultname', 'pgdresult Name', 'required');
        
        
        // image informatio upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|doc|docx|pdf|xls|xlsx|pptx|ppt';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        $yes_upload = $this->upload->do_upload();
        if (!$this->form_validation->run()) {
//            redirect(base_url('pgdresult'));
            redirect(base_url().'admin/pgdresult/editpgdresult/'.$pgdresult_info);
       
            
//        }elseif (!$yes_upload) {
//           
//            redirect(base_url().'admin/pgdresult/editpgdresult/'.$pgdresult_info);
                
        } else {             
            $img_data =  $this->upload->data();
            $file_name = $img_data['file_name'];
            
            $result = $this->mod_pgdresult->update_pgdresult($file_name, $pgdresult_info);
        
        if($result){
            redirect(base_url('admin/pgdresult/pgdresultlists'));
            }       
        }
    }
    
    public function inactivepgdresult(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The pgdresult";
        

        $data['inactivepgdresult_content'] = $this->mod_pgdresult->view_inactivepgdresult();
//        echo "<pre>";
//        print_r($data); exit;
        $this->load->view('pgdresult/v_pgdresultinactivelists', $data);

    }
    
    public function deletepgdresult($id){
        $id = (int)$id;
        $this->mod_pgdresult->delete_pgdresult($id);
        redirect(base_url('admin/pgdresult/pgdresultlists'));
    }
}

