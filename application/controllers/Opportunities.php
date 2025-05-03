<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */



class Opportunities extends CI_Controller {
    public function __Construct(){
        parent::__construct();
        
        $this->load->model('home/mod_opportunities', 'mod_opportunities');
        
        }
    
    public function index(){
        
        $data['opp_contetn'] = $this->mod_opportunities->opportunitieslist();
        $this->load->view('opportunities/home/hv_opportunities', $data);

    }    
     
}

