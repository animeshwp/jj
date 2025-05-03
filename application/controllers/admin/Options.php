<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Options extends CI_Controller {    
    
//    private  $messege = "done";
    
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Mod_addimageinfo', 'Mod_addimageinfo');
        $this->load->model('admin/Mod_options', 'Mod_options');       
        
    }

    public function index() {
        
        $data['username'] = $this->session->userdata('username');  
        $data['menu']=$this->Mod_options->getdata();
        
        $this->load->view('templates/admin/common/header', $data);
        $this->load->view('templates/admin/common/left_nav');
        $this->load->view('templates/admin/options/index', $data);
        $this->load->view('templates/admin/common/footer');
        
    }

    public function saveit()
    {
       
        $data = $this->input->post('data', TRUE);        
        $this->Mod_options->menuupdates($data);
        redirect($this->index());

        
         
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
            
//            print_r($data); exit;
            
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