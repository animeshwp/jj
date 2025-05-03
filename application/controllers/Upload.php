<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */



class Upload extends MY_Controller {

    function __construct() {
        parent::__construct();
//		$this->load->helper(array('form', 'url'));
    }

    function index() {
        $this->load->view('v_diagnostic', array('error' => ' '));
    }

    function do_upload() {
         
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());

            redirect(base_url('page'));
        } else {           
            
            $img_data =  $this->upload->data();
            $file_name = $img_data['file_name'];
            $this->load->model('mod_diagnostic');
            $query = $this->mod_diagnostic->insert_moddiagnostic($file_name);
//            print_r($query); exit;
            if($query == 1 ){
                redirect(base_url('page/pagelist'));
            }
        }
    }
}