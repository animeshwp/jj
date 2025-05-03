<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Notification extends CI_Controller {
    public function __Construct(){
        parent::__construct();
//        $data['username'] = $this->session->userdata('username');  // logged in userdata  

        $this->load->model('admin/mod_notice', 'mod_notice');
        }
    
    public function index(){
        
        $data['username'] = $this->session->userdata('username');
 
        $this->load->view('templates/admin/common/header', $data);
        $this->load->view('templates/admin/common/left_nav');
        $this->load->view('templates/admin/notice/v_notice', $data);       
        $this->load->view('templates/admin/common/footer');

    }
    
    Public function saveNotice() {  
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation'); 
         
        // form validation check   
         $this->form_validation->set_rules('noticename', 'notice Name', 'required');
        
        // image informatio upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        if (!$this->form_validation->run()) {
            redirect(base_url('notice'));
                
        } else {             
            $img_data =  $this->upload->data();
            $file_name = $img_data['file_name'];
            
            $query = $this->mod_notice->insert_notice($file_name);
//            print_r($file_name); exit;
            if($query == 1 ){
                redirect(base_url('notice/noticelists'));
            }
        }
    }

    
    public function noticelists(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The notice";
        
        
        $this->load->Model('mod_notice');
        $data['notice_content'] = $this->mod_notice->view_notice();
        $this->load->view('notice/v_noticelists', $data);

    }
    
    public function editnotice(){
            
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Edit notice";  
        
        $notice_info = $this->security->xss_clean($this->uri->segment(3)); 
        $this->load->Model('mod_notice');
        $data['notice_content'] = $this->mod_notice->edit_notice($notice_info);
//        print_r($data); exit;
        $this->load->view('notice/v_noticeedit', $data);
    }


    public function updatenotice(){ //update_notice
        $this->load->library('form_validation'); 
        $data['title'] = "List of The notice";
        $data['username'] = $this->session->userdata('username');
        $notice_info = $this->security->xss_clean($this->input->post('hidd_id'));              
         
        // form validation check   
        $this->form_validation->set_rules('noticename', 'notice Name', 'required');
        
        if($this->form_validation->run() == False){
            redirect(base_url('notice/editnotice/?page_id='.$notice_info));
        }else{
        $this->load->Model('mod_notice');
        $result = $this->mod_notice->update_notice($notice_info);
        
        if($result){
            redirect(base_url('notice/noticelists'));
        }
        
        }
    }
    
    public function inactivenotice(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The notice";
        
        
        $this->load->Model('mod_notice');
        $data['inactivenotice_content'] = $this->mod_notice->view_inactivenotice();

        $this->load->view('notice/v_noticeinactivelists', $data);

    }
}

