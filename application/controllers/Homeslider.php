<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */



class Homeslider extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('mod_slide', 'mod_slide');
    }
   
    public function index(){
        $data['slide_info'] = $this->mod_slide->view_hslide();        
        $this->load->view('home/v_slide', $data);
    }

    public function apply($value='')
    {
        $data['slide_info'] = $this->mod_slide->view_hslide();        
        $this->load->view('home/v_slide', $data);
    }
}
