<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */



class Ecmembers extends MY_Controller {
    public function __Construct(){
        parent::__construct();
        
        $this->load->model('admin/mod_ec_members', 'mod_ec_members');
        }
    
    public function index(){
        $data['username'] = $this->session->userdata('username');

        $data['title'] = "Add New ec_member";
        $this->load->view('templates/admin/ec_member/v_ec_member', $data);

    }
    
    Public function do_upload() {  
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation'); 
         
        // form validation check   
        $this->form_validation->set_rules('ec_membername', 'ec_member Name', 'required');
//        $this->form_validation->set_rules('userfile', 'File', 'required');
        
        // image informatio upload
        $config['upload_path'] = './uploads/';
//        $config['allowed_types'] = 'gif|jpg|png';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '10000';
//        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        $yes_upload = $this->upload->do_upload();
        if (!$this->form_validation->run()) {
            redirect(base_url('admin/ec_member'));
            
        }elseif (!$yes_upload) {
           redirect(base_url('admin/ec_member'));        
                
        } else {             
            $img_data =  $this->upload->data($yes_upload);
            $file_name = $img_data['file_name'];
            
            
            $query = $this->mod_ec_member->insert_ec_member($file_name);
//            print_r($file_name); exit;
            if($query == 1 ){
                redirect(base_url('admin/templates/admin/ec_member/ec_memberlists'));
            }
        }
    }

    
    public function ec_memberlists(){
        
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The ec_member";
        
        $data['ec_member_content'] = $this->mod_ec_member->view_ec_member();
        $this->load->view('templates/admin/ec_member/v_ec_memberlists', $data);

    }
    
    public function editec_member($id){
        $id = (int)$id;
//        echo $id; exit;
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Edit ec_member";  
        
//        $ec_member_info = $this->security->xss_clean($this->uri->segment(3)); 
 
        $data['ec_member_content'] = $this->mod_ec_member->edit_ec_member($id);
//        print_r($data); exit;
        $this->load->view('templates/admin/ec_member/v_ec_memberedit', $data);
    }


    public function updateec_member($id){ //update_ec_member
        $this->load->library('form_validation'); 
        $data['title'] = "List of The ec_member";
        $data['username'] = $this->session->userdata('username');
        $ec_member_info =  (int)$id;              
         
        // form validation check   
        $this->form_validation->set_rules('ec_membername', 'ec_member Name', 'required');
        
        // image informatio upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        $yes_upload = $this->upload->do_upload();
        
        if($this->form_validation->run() == False){
            redirect(base_url('admin/templates/admin/ec_member/edittemplates/admin/ec_member/'.$ec_member_info));
            
        }else{
            
             $img_data =  $this->upload->data($yes_upload);
            $file_name = $img_data['file_name'];
            
 
        $result = $this->mod_ec_member->update_ec_member($ec_member_info, $file_name);
        
        if($result){
            redirect(base_url('admin/templates/admin/ec_member/ec_memberlists'));            
            }        
        }
    }
    
    public function inactiveec_memberLists(){
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The ec_member";
        
        
        $this->load->Model('mod_ec_member');
        $data['inactiveec_member_content'] = $this->mod_ec_member->view_inactiveec_member();
//        echo "<pre>";
//        print_r($data); exit;
        $this->load->view('templates/admin/ec_member/v_ec_memberinactivelists', $data);

    }
    
    
    public function deleteec_member($id){
        $ec_member_id = (int)$id;
 
        $this->mod_ec_member->delete_ec_member($ec_member_id);
        $this->ec_memberlists('refresh');
        
    }
    
//    public function deleteec_member(){
//        
//    }
}