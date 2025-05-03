<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */

class Homelinks extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        }
    
        public function index(){
            $links_info = '';
            $this->load->model('mod_links');
            $mylinkdata['links_info'] = $this->mod_links->view_hlinks();          
            $this->load->view('v_hlinks', $mylinkdata);
        }
}
