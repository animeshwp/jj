<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class Admin_area extends MY_Controller {

    public function __construct() {
        parent::__construct();
            
    }
    
    public function index(){
        $data['title'] =  site_title();
        $data['username'] = $this->session->userdata('username');
        $data['content'] = "Welcome to Admin Area";
 
        $this->load->view('templates/admin/common/header', $data);
        $this->load->view('templates/admin/common/left_nav');
        $this->load->view('templates/admin/dashboard/v_index', $data);        
        $this->load->view('templates/admin/common/footer');

 
    }
    
    public function moreinfo() {
    	echo "this is eclipse test";
    }

}