<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class Downloads extends MY_Controller {
    public function __Construct(){
        parent::__construct();
//        $data['username'] = $this->session->userdata('username');  // logged in userdata  
        }
    
    public function index(){
        $data['username'] = $this->session->userdata('username');
//        $this->load->view('v_users', array('error' => ' '));
        $data['title'] = "downloads";
        $this->load->view('downloads/v_downloads', $data);

    }
    
    Public function do_upload() {  
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation'); 
         
        // form validation check   
         $this->form_validation->set_rules('downloadsname', 'downloads Name', 'required');
        
        // image informatio upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        if (!$this->form_validation->run()) {
            redirect(base_url('downloads'));
                
        } else {             
            $img_data =  $this->upload->data();
            $file_name = $img_data['file_name'];
            $this->load->model('mod_downloads');
            $query = $this->mod_downloads->insert_downloads($file_name);
//            print_r($file_name); exit;
            if($query == 1 ){
                redirect(base_url('downloads/downloadslists'));
            }
        }
    }

    
    public function downloadslists(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The downloads";
        
        
        $this->load->Model('mod_downloads');
        $data['downloads_content'] = $this->mod_downloads->view_downloads();
        $this->load->view('downloads/v_downloadslists', $data);

    }
    
    public function editdownloads(){
            
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Edit downloads";  
        
        $downloads_info = $this->security->xss_clean($this->uri->segment(3)); 
        $this->load->Model('mod_downloads');
        $data['downloads_content'] = $this->mod_downloads->edit_downloads($downloads_info);
//        print_r($data); exit;
        $this->load->view('downloads/v_downloadsedit', $data);
    }


    public function updatedownloads(){ //update_downloads
        $this->load->library('form_validation'); 
        $data['title'] = "List of The downloads";
        $data['username'] = $this->session->userdata('username');
        $downloads_info = $this->security->xss_clean($this->input->post('hidd_id'));              
         
        // form validation check   
        $this->form_validation->set_rules('downloadsname', 'downloads Name', 'required');
        
        if($this->form_validation->run() == False){
            redirect(base_url('downloads/editdownloads/?page_id='.$downloads_info));
        }else{
        $this->load->Model('mod_downloads');
        $result = $this->mod_downloads->update_downloads($downloads_info);
        
        if($result){
            redirect(base_url('downloads/downloadslists'));
        }
        
        }
    }
    
    public function inactivedownloads(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The downloads";
        
        
        $this->load->Model('mod_downloads');
        $data['inactivedownloads_content'] = $this->mod_downloads->view_inactivedownloads();

        $this->load->view('downloads/v_downloadsinactivelists', $data);

    }
}

