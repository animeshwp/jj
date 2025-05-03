<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Notice extends CI_Controller {
    public function __Construct(){
        parent::__construct();
//        $data['username'] = $this->session->userdata('username');  // logged in userdata  

        $this->load->model('admin/mod_notice', 'mod_notice');
        }
    
    public function index(){
        
        $data['username'] = $this->session->userdata('username');
        $data['notices'] = $query = $this->mod_notice->view_notice();
 
        $this->load->view('templates/admin/common/header', $data);
        $this->load->view('templates/admin/common/left_nav');
        $this->load->view('templates/admin/notice/v_notice', $data);       
        $this->load->view('templates/admin/common/footer');

    }
    
    Public function save() {  
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation'); 
         
        $data['notices'] = $query = $this->mod_notice->view_notice();
         // print_r($data); exit();
        // form validation check   
         $this->form_validation->set_rules('data[notice_title]', 'Title', 'required');
         $this->form_validation->set_rules('data[notice_date]', 'Date', 'required');        
    
        if (!$this->form_validation->run()) {
            redirect(base_url('notice'));
                
        } else {             
            $data = $this->input->post('data', TRUE);
            $query = $this->mod_notice->insert_notice($data );
           // print_r($query); exit;
            if($query == 1 ){ 
                $this->index();

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
    
    public function editnotice($id){
            
        $data['username'] = $this->session->userdata('username');
        $data['notices'] = $query = $this->mod_notice->view_notice();
        
        $notice_info =$this->uri->segment(4); 
        // echo $notice_info;

        $data['enotice'] = $this->mod_notice->edit_notice($notice_info);
//        print_r($data); exit;
        // $this->load->view('notice/v_noticeedit', $data);

        $this->load->view('templates/admin/common/header', $data);
        $this->load->view('templates/admin/common/left_nav');
        $this->load->view('templates/admin/notice/v_editnotice', $data);       
        $this->load->view('templates/admin/common/footer');
    }


    public function update($id){  
        $this->load->library('form_validation'); 
        
        $data['username'] = $this->session->userdata('username');
        $notice_info = $this->uri->segment(4);
        $data['enotice'] = $this->mod_notice->edit_notice($id); 
        $data['notices'] = $query = $this->mod_notice->view_notice();


         
        // form validation check   
        $this->form_validation->set_rules('data[notice_title]', 'Title', 'required');
        $this->form_validation->set_rules('data[notice_date]', 'Date', 'required');   
        
        if($this->form_validation->run() == False){
            // print_r($this->input->post('data',TRUE));exit();
            redirect(base_url('admin/notice/editnotice/'.$id));
        }else{
            $data = $this->input->post('data',TRUE);
            $result = $this->mod_notice->update_notice($notice_info, $data);
        
        if($result){
            $this->index();
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

