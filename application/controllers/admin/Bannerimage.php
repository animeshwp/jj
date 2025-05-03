<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class Bannerimage extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Mod_banneriamage', 'Mod_banneriamage');
    }

    public function index() {  
        $data['title'] = "Banner Image";
        $data['username'] = $this->session->userdata('username');         
       
        $this->load->view('templates/admin/imagebanner/v_imagebanner', $data);
    }

    public function do_upload() { 

        $data['title'] = "Banner Image";
        $data['username'] = $this->session->userdata('username');    
        
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')){

            $error = array('error' => $this->upload->display_errors());
            redirect('admin/bannerimage');

        } else {
            
            $data = $this->upload->data();
            $data = $data['file_name'];
            $this->Mod_banneriamage->insert_banneriamage($data);
            redirect(base_url('admin/bannerimage/bannerimagelist', 'refresh'));
        }
    }
    
    
    public function bannerimagelist(){
        $data['title'] = "Banner Image";
        $data['username'] = $this->session->userdata('username');   

        $data['bannersimg_content'] = $this->Mod_banneriamage->view_banneriamage();   
        // print_r($data);     
        $this->load->view('templates/admin/imagebanner/v_imagebannerlists', $data);
    }

    public function bannerimageedit($id){
        $data['title'] = "Banner Image";
        $data['username'] = $this->session->userdata('username'); 

        $data['bannersing_edit'] = $this->Mod_banneriamage->bannerimageedit($id);
     
        $this->load->view('templates/admin/imagebanner/v_imagebannerdataedit', $data);

    }


    public function bannerimageupdate($id){
        $id = (int)$id;
        $data['title'] = "Banner Image";
        $data['username'] = $this->session->userdata('username');    
        
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        $this->upload->do_upload('file');       
            
            $data = $this->upload->data();
            $file_name = $data['file_name'];
            $this->Mod_banneriamage->update_banneriamage($id, $file_name);
            redirect(base_url('admin/bannerimage/bannerimagelist', 'refresh'));
        
    }

     public function inactivebannerimagelist(){
        $data['title'] = "Banner Image";
        $data['username'] = $this->session->userdata('username');   

        $data['bannersimg_content'] = $this->Mod_banneriamage->view_inactivebanneriamage();   
        // print_r($data);     
        $this->load->view('templates/admin/imagebanner/v_imagebannerinactivelists', $data);
    }


    public function bannerimagedelete($id){
        $id = (int)$id;

        $this->Mod_banneriamage->delete_banneriamage($id);
        redirect(base_url('admin/bannerimage/bannerimagelist', 'refresh'));

    }


}
// END