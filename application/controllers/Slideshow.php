<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */

class Slideshow extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['title'] = "Slideshow";
        $data['slideshow'] = "Add Page Slideshow images";
        $data['username'] = $this->session->userdata('username');
        $this->load->view('slideshow/v_slideshow', $data);
    }

    Public function do_upload() {
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation');

        // form validation check   
        $this->form_validation->set_rules('slidename', 'Slide Name', 'required');

        // image informatio upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->do_upload();
        if (!$this->form_validation->run()) {
            redirect(base_url('slideshow'));
        } else {
            $img_data = $this->upload->data();
            $file_name = $img_data['file_name'];
            $this->load->model('mod_slide');
            $query = $this->mod_slide->insert_slide($file_name);
//            print_r($file_name); exit;
            if ($query == 1) {
                redirect(base_url('slideshow/slidelist'));
            }
        }
    }

    public function slidelist() {
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The Slide";


        $this->load->Model('mod_slide');
        $data['slide_content'] = $this->mod_slide->view_slide();
        $this->load->view('slideshow/v_slidelists', $data);
    }

    public function editslide() {

        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Edit Slide";

        $slide_info = $this->security->xss_clean($this->uri->segment(3));
        $this->load->Model('mod_slide');
        $data['slide_content'] = $this->mod_slide->edit_slide($slide_info);
//        print_r($data); exit;
        $this->load->view('slideshow/v_slideshowedit', $data);
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
            redirect(base_url('slideshow/editslide/' . $slide_info));
        } else {
            $img_data = $this->upload->data();
            $file_name = $img_data['file_name'];
            $this->load->Model('mod_slide');
            $result = $this->mod_slide->update_slide($slide_info, $file_name);

            if ($result) {
                redirect(base_url('slideshow/slidelist'));
            }
        }
    }

    public function inactiveslideshowLists() {
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The slideshow";


        $this->load->Model('mod_slide');
        $data['inactiveslideshow_content'] = $this->mod_slide->view_inactiveslide();
//        echo "<pre>";
//        print_r($data); exit;
        $this->load->view('slideshow/v_slideshowinactivelists', $data);
    }

}