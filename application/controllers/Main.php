<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */



class Main extends CI_Controller {

 public function __construct() {
        parent::__construct();

        // $this->load->model('default/Mod_home', 'Mod_home');
            
    }

	public function index()
	{

	
        $data['title'] = "Institute of Education Research Alumni Association (IERAA)";
        $this->load->model('home/mod_menu');
        $data['menu_content'] = $this->mod_menu->view_hmenu();
        $data['leftmenu_content'] = $this->mod_menu->view_hmenu_left();
        
        // view on submenu
        $this->load->Model('home/mod_submenu');
        $data['submenu_content'] = $this->mod_submenu->view_hsubmenu();
        
        // slide view on home page
        $this->load->model('home/mod_slide');
        $data['slide_info'] = $this->mod_slide->view_hslide();          
               
        
        // weblists view on home page        
        $this->load->model('home/mod_links');
        $data['links_info'] = $this->mod_links->view_hlinks(); 
        
        // welcome messege 

        // $this->load->model('home/mod_message');
        // $data['wmessege_info'] = $this->mod_message->view_hmessage();
        
         // widgets 
        $this->load->model('home/mod_widget');
        $data['widget_info'] = $this->mod_widget->view_hwidget(); 
        $data['box_info'] = $this->mod_widget->view_new_widget(); 

//        echo "<pre>";
//        print_r($data); exit;\
        
         // News 
        $this->load->model('home/mod_news');
        $data['news_info'] = $this->mod_news->view_hnews(); 
//        echo "<pre>";
//        print_r($data); exit;
        $this->load->model('home/mod_message');
        $data['wmessege_info'] = $this->mod_message->view_hmessage();
         // News 
        $this->load->model('home/mod_news');
        $data['news_info'] = $this->mod_news->view_hnews(); 
//        echo "<pre>";

        $this->load->model('home/mod_events');
        $data['events_info'] = $this->mod_events->view_hevents(); 
       // echo "<pre>";
       // print_r($datas); exit;
        

        // $data['menucont'] = $this->Mod_home->show();
        $this->load->view('templates/default/common/header', $data);
        $this->load->view('templates/default/home/index', $data);
        $this->load->view('templates/default/common/footer', $data);

	}



	public function home2()
	{

	 
        $this->load->model('home/mod_menu');
        $data['menu_content'] = $this->mod_menu->view_hmenu();
        
        // view on submenu
        $this->load->Model('home/mod_submenu');
        $data['submenu_content'] = $this->mod_submenu->view_hsubmenu();
        
        // slide view on home page
        $this->load->model('home/mod_slide');
        $data['slide_info'] = $this->mod_slide->view_hslide();          
               
        
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

        $this->load->model('home/Mod_widgetsdata');
        $data['widgets_data'] = $this->Mod_widgetsdata->view_hwidgetsdata(); 
        
         // News 
        $this->load->model('home/mod_news');
        $data['news_info'] = $this->mod_news->view_hnews(); 
//        echo "<pre>";
//        print_r($data); exit;


         // News 
        $this->load->model('home/mod_news');
        $data['news_info'] = $this->mod_news->view_hnews(); 
//        echo "<pre>";

        $this->load->model('home/mod_events');
        $data['events_info'] = $this->mod_events->view_hevents(); 
       // echo "<pre>";
       // print_r($datas); exit;
        

		// $data['menucont'] = $this->Mod_home->show();
		$this->load->view('templates/default/common/header', $data);
		$this->load->view('templates/default/home/index', $data);
		$this->load->view('templates/default/common/footer', $data);
	}


}

// END