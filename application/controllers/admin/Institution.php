<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class Institution extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->Model('admin/mod_Institution');
    }

    public function index() {
        $data['title'] = "Institution";
        $data['slideshow'] = "Add Page Institution images";
        $data['username'] = $this->session->userdata('username');
        $this->load->view('slideshow/v_slideshow', $data);
    }

    Public function do_upload() {

        // image informatio upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '2000';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        if($this->upload->do_upload('logo')){

            $img_data = $this->upload->data();
            $file_name['logo'] = $img_data['file_name'];
            // $this->load->model('admin/mod_slide');

               // print_r($file_name); exit;
            // print_r($_POST);exit;
            $query = $this->mod_Institution->updateLogo($file_name);

            redirect(base_url('admin_area'));
             
        }else{
            redirect(base_url('admin_area'));
        }
    }


    Public function do_upload_bgimage() {

        // image informatio upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '2000';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        if($this->upload->do_upload('bgimage')){

            $img_data = $this->upload->data();
            $file_name['bgimage'] = $img_data['file_name'];
            // $this->load->model('admin/mod_slide');

               // print_r($file_name); exit;
            // print_r($_POST);exit;
            $query = $this->mod_Institution->do_upload_bgimage($file_name);

            redirect(base_url('admin_area'));
             
        }else{
            redirect(base_url('admin_area'));
        }
    }

    public function slidelist() {
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The Slide";


        $this->load->Model('admin/mod_slide');
        $data['slide_content'] = $this->mod_slide->view_slide();
        $this->load->view('slideshow/v_slidelists', $data);
    }

    public function UpdateInstitution() {

        // print_r($_POST); exit;
 
        $this->mod_Institution->UpdateInstitution();

        redirect(base_url('admin_area'));
 
    }

    public function updateslide() { //update_slide
        $this->load->library('form_validation');
        $data['title'] = "List of The Slide";
        $data['username'] = $this->session->userdata('username');
        $slide_info = $this->security->xss_clean($this->input->post('hidd_id'));

        // form validation check   
        $this->form_validation->set_rules('slidename', 'slide Name', 'required');

        // image informatio upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->do_upload();
        
        if ($this->form_validation->run() == False) {
            redirect(base_url('admin/slideshow/editslide/' . $slide_info));
        } else {
            $img_data = $this->upload->data();
            $file_name = $img_data['file_name'];
            $this->load->Model('admin/mod_slide');
            $result = $this->mod_slide->update_slide($slide_info, $file_name);

            if ($result) {
                redirect(base_url('admin/slideshow/slidelist'));
            }
        }
    }

    public function inactiveslideshowLists() {
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The slideshow";


        $this->load->Model('admin/mod_slide');
        $data['inactiveslideshow_content'] = $this->mod_slide->view_inactiveslide();
//        echo "<pre>";
//        print_r($data); exit;
        $this->load->view('slideshow/v_slideshowinactivelists', $data);
    }


    public function deleteslide($id){

        $this->load->Model('admin/mod_slide');
        $this->mod_slide->deleteslide($id);

        redirect(base_url('admin/slideshow/slidelist'));

    }

}

// end