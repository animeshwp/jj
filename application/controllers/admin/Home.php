<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
            
    }
    function index(){
        
        $data['title'] = "IERAA";
        $this->load->model('home/mod_menu');
        $data['menu_content'] = $this->mod_menu->view_hmenu();
        
        // view on submenu
        $this->load->Model('home/mod_submenu');
        $data['submenu_content'] = $this->mod_submenu->view_submenu();
        
        // slide view on home page
        $this->load->model('home/mod_slide');
        $data['temp']['slide_info'] = $this->mod_slide->view_hslide();          
               
        
        // weblists view on home page        
        $this->load->model('home/mod_links');
        $data['links_info'] = $this->mod_links->view_hlinks(); 
        
        // welcome messege 

        $this->load->model('home/mod_message');
        $data['wmessege_info'] = $this->mod_message->view_hmessage();
        
         // widgets 
        $this->load->model('home/mod_widget');
        $data['widget_info'] = $this->mod_widget->view_hwidget(); 
//        echo "<pre>";
//        print_r($data); exit;\
        
         // News 
        $this->load->model('home/mod_news');
        $data['news_info'] = $this->mod_news->view_hnews(); 
//        echo "<pre>";
//        print_r($data); exit;
        
        // view for home page
        $this->load->view('home/header');
        $this->load->view('home/v_home', $data); 
        $this->load->view('home/footer');
     
    }
    
    public function homeslide(){
        $slide_info = '';
        $this->load->model('home/mod_slide');
        $data['slide_info'] = $this->mod_slide->view_hslide();        
        $this->load->view('v_slide', $data);
    }
    

}
