<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class Publications extends MY_Controller {
    public function __Construct(){
        parent::__construct();
        }
    
    public function index(){
        $data['username'] = $this->session->userdata('username');
//        $this->load->view('v_users', array('error' => ' '));
        $data['title'] = "Add New publications";
        $this->load->view('v_publications', $data);

    }
    
    Public function do_upload() {  
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation'); 
         
        // form validation check   
        $this->form_validation->set_rules('publicationsname', 'publications Name', 'required');
        $this->form_validation->set_rules('publicationssum', 'publications Summary', 'required');
        
        // image informatio upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        $yes_upload = $this->upload->do_upload();
        if (!$this->form_validation->run()) {
            redirect(base_url('publications'));
            
        }elseif (!$yes_upload) {
           redirect(base_url('publications'));        
                
        } else {             
            $img_data =  $this->upload->data();
            $file_name = $img_data['file_name'];
            $this->load->model('mod_publications');
            $query = $this->mod_publications->insert_publications($file_name);
//            print_r($file_name); exit;
            if($query == 1 ){
                redirect(base_url('publications'));
            }
        }
    }

    
    public function publicationslists(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The publications";
        
        
        $this->load->Model('mod_publications');
        $data['publications_content'] = $this->mod_publications->view_publications();
        $this->load->view('v_publicationslists', $data);
        $this->load->view('v_widgets', $data);

    }
    
    public function editpublications(){
            
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Edit publications";  
        
        $publications_info = $this->security->xss_clean($this->uri->segment(3)); 
        $this->load->Model('mod_publications');
        $data['publications_content'] = $this->mod_publications->edit_publications($publications_info);
//        print_r($data); exit;
        $this->load->view('v_publicationsedit', $data);
    }


    public function updatepublications(){ //update_publications
        $this->load->library('form_validation'); 
        $data['title'] = "List of The publications";
        $data['username'] = $this->session->userdata('username');
        $publications_info = $this->security->xss_clean($this->input->post('hidd_id'));              
         
        // form validation check   
        $this->form_validation->set_rules('publicationsname', 'publications Name', 'required');
        $this->form_validation->set_rules('publicationssum', 'publications Summary', 'required');
        
        if($this->form_validation->run() == False){
            redirect(base_url('publications/editpublications/?page_id='.$publications_info));
            
        }else{
            
        $this->load->Model('mod_publications');
        $result = $this->mod_publications->update_publications($publications_info);
        
        if($result){
            redirect(base_url('publications/publicationslists'));            
            }        
        }
    }
    
    public function inactivepublications(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The publications";
        
        
        $this->load->Model('mod_publications');
        $data['inactivepublications_content'] = $this->mod_publications->view_inactivepublications();

        $this->load->view('v_publicationsinactivelists', $data);

    }
}

