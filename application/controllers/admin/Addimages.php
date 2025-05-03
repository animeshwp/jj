<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Addimages extends CI_Controller {    
    
//    private  $messege = "done";
    
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Mod_addimageinfo', 'Mod_addimageinfo');
        
        
        
    }

    public function index() {
        
        $data['username'] = $this->session->userdata('username');

        $data['image_data'] = $this->Mod_addimageinfo->viewimageinfo();

        $this->load->view('templates/admin/common/header', $data);
        $this->load->view('templates/admin/common/left_nav');
        $this->load->view('templates/admin/ads/v_ads', $data);
        $this->load->view('templates/admin/common/footer');

    }

    public function save() {  
        
        $messege = "done";
        
        $config['upload_path'] = './uploads/ads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
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