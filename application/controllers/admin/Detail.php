<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class Detail extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
        $this->load->model('home/mod_widget', 'mod_widget');
        $this->load->model('home/mod_links', 'mod_links');
        $this->load->model('home/mod_menu', 'mod_menu');
        $this->load->Model('home/mod_submenu', 'mod_submenu');
        $this->load->Model('home/mod_publications', 'mod_publications');
        $this->load->Model('home/mod_page', 'mod_page');
        
    }
    
    public function index(){

    }
    
    public function menudetail(){
 
        $data['widget_info'] = $this->mod_widget->view_hwidget(); 
        
 
        $data['links_info'] = $this->mod_links->view_hlinks(); 
        
        
        
        $menudetail_info = $this->security->xss_clean($this->uri->segment(3)); 

 
        $data['menu_content'] = $this->mod_menu->view_hmenu();
        $data['menudetail_content'] = $this->mod_menu->detail_menu($menudetail_info);

        // view on submenu
 
        $data['submenu_content'] = $this->mod_submenu->view_submenu();
        
        $this->load->view('home/v_detail', $data);
    }
    
    public function submenudetail(){
 
        $data['widget_info'] = $this->mod_widget->view_hwidget(); 
        
 
        $data['links_info'] = $this->mod_links->view_hlinks(); 
        
        $submenudetail_info = $this->security->xss_clean($this->uri->segment(3)); 
 
        $data['menu_content'] = $this->mod_menu->view_hmenu();
        
 
        $data['submenu_content'] = $this->mod_submenu->view_hsubmenu();
        $data['submenudetail_content'] = $this->mod_submenu->detail_submenu($submenudetail_info);
//        print_r($data); exit;
        $this->load->view('home/v_submenu', $data);
    }
    
    public function detailwidget(){
        
 
        $data['widget_info'] = $this->mod_widget->view_hwidget(); 
        
 
        $data['links_info'] = $this->mod_links->view_hlinks(); 
        
        $widgetdetail_info = $this->security->xss_clean($this->uri->segment(3)); 
        
 
        $data['publications_content'] = $this->mod_publications->view_publications();
        
 
        $data['menu_content'] = $this->mod_menu->view_hmenu();
        
        // view on submenu
 
        $data['submenu_content'] = $this->mod_submenu->view_submenu();
        
       
        $data['widgetdetail_content'] = $this->mod_widget->detail_widget($widgetdetail_info);
        
        $widgetsdata_info = $this->security->xss_clean($this->uri->segment(3));
 
        $data['widgetsdata_content'] = $this->mod_widgetsdata->view_widgetsdatafront($widgetsdata_info);
 
        $this->load->view('home/v_widgets', $data); 
    }
    
    public function detailnews(){
        $newsdetail_info = $this->security->xss_clean($this->uri->segment(3)); 
        
//         $this->load->model('home/mod_widget');
        $data['widget_info'] = $this->mod_widget->view_hwidget(); 
        
 
        $data['links_info'] = $this->mod_links->view_hlinks(); 
        
        $widgetdetail_info = $this->security->xss_clean($this->uri->segment(3)); 
        
 
        $data['publications_content'] = $this->mod_publications->view_publications();
        
 
        $data['menu_content'] = $this->mod_menu->view_hmenu();
        
        // view on submenu
 
        $data['submenu_content'] = $this->mod_submenu->view_submenu();
        
        
        $data['widgetdetail_content'] = $this->mod_widget->detail_widget($widgetdetail_info);
        
        $widgetsdata_info = $this->security->xss_clean($this->uri->segment(3));
 
        $data['widgetsdata_content'] = $this->mod_widgetsdata->view_widgetsdatafront($widgetsdata_info);
        
 
        $data['newsdetail_content'] = $this->mod_news->detail_news($newsdetail_info);
        
//        print_r($datas); exit;
        $this->load->view('home/v_news', $data); 
    }
    
    
//    news list for public 
    public function newslists(){
         $newsdetail_info = $this->security->xss_clean($this->uri->segment(3)); 
 
        $data['widget_info'] = $this->mod_widget->view_hwidget(); 
        
 
        $data['links_info'] = $this->mod_links->view_hlinks(); 
        
        $widgetdetail_info = $this->security->xss_clean($this->uri->segment(3)); 
        
 
        $data['publications_content'] = $this->mod_publications->view_publications();
        
 
        $data['menu_content'] = $this->mod_menu->view_hmenu();
        
        // view on submenu
 
        $data['submenu_content'] = $this->mod_submenu->view_submenu();
        
      
        $data['widgetdetail_content'] = $this->mod_widget->detail_widget($widgetdetail_info);
        
        $widgetsdata_info = $this->security->xss_clean($this->uri->segment(3));
 
        $data['widgetsdata_content'] = $this->mod_widgetsdata->view_widgetsdatafront($widgetsdata_info);
        
 
        $data['newsdetail_content'] = $this->mod_news->detail_news($newsdetail_info);
        
 
        $data['news_content'] = $this->mod_news->view_news();
        $this->load->view('home/v_newslists', $data);

    }
    
    
    


    public function detailpage(){
        $pagedetail_info = $this->security->xss_clean($this->uri->segment(3)); 
        
 
        $data['links_info'] = $this->mod_links->view_hlinks(); 
        
 
        $data['widget_info'] = $this->mod_widget->view_hwidget(); 
        
 
        $data['menu_content'] = $this->mod_menu->view_hmenu();
        
        // view on submenu
 
        $data['submenu_content'] = $this->mod_submenu->view_submenu();
        
 
        $data['pagedetail_content'] = $this->mod_page->detail_page($pagedetail_info);
//        print_r($data); exit;
        $this->load->view('home/v_page', $data); 
    }
    
    
}