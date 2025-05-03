<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detail extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
        $this->load->model('home/mod_widget', 'mod_widget');
        $this->load->model('home/mod_links', 'mod_links');
        $this->load->model('home/mod_menu', 'mod_menu');
        $this->load->Model('home/mod_submenu', 'mod_submenu');
        $this->load->Model('home/mod_publications', 'mod_publications');
        $this->load->Model('home/mod_page', 'mod_page');
        $this->load->model('home/mod_opportunities', 'mod_opportunities');
        $this->load->model('home/mod_pgdresult', 'mod_pgdresult');
        $data['title'] = "Institute of Education Research Alumni Association (IERAA)";
        $this->load->model('home/mod_events', 'mod_events');
      
    }
    
    public function index($id){

        $id = (int)$id;

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

       
        $data['menu_content'] = $this->mod_menu->view_hmenu();
        $data['menudetail_content'] = $this->mod_menu->detail_menu($id);

        // view on submenu        
        $this->load->view('templates/default/common/header', $data);
        $this->load->view('templates/default/home/menu_index', $data);
        $this->load->view('templates/default/common/footer', $data);


    }
    
    public function menudetail($id){
        
        $data['widget_info'] = $this->mod_widget->view_hwidget(); 
        $data['links_info'] = $this->mod_links->view_hlinks();        
        $menudetail_info = (int)$id; 
        $data['menu_content'] = $this->mod_menu->view_hmenu();
        $data['menudetail_content'] = $this->mod_menu->detail_menu($menudetail_info);

        // view on submenu        
        $this->load->view('templates/default/common/header', $data);
        $this->load->view('templates/default/home/menu_index', $data);
        $this->load->view('templates/default/common/footer', $data);
    }
        
    public function detailevents($id){
        $data['title'] = "Institute of Education Research Alumni Association (IERAA)";
        
        $data['widget_info'] = $this->mod_widget->view_hwidget(); 
        $data['links_info'] = $this->mod_links->view_hlinks();        
        $menudetail_info = (int)$id; 
        $data['menu_content'] = $this->mod_menu->view_hmenu();
        $data['menudetail_content'] = $this->mod_menu->detail_menu($menudetail_info);
        $data['event_info'] = $this->mod_events->view_events(); 

        $data['events_info'] = $this->mod_events->view_hevents();

        // view on submenu        
        $this->load->view('templates/default/common/header', $data);
        $this->load->view('templates/default/events/events_detail', $data);
        $this->load->view('templates/default/common/footer', $data);
    }  

    public function detailnovices($id){
        $data['title'] = "Institute of Education Research Alumni Association (IERAA)";
        
        $data['widget_info'] = $this->mod_widget->view_hwidget(); 
        $data['links_info'] = $this->mod_links->view_hlinks();        
        $menudetail_info = (int)$id; 
        $data['menu_content'] = $this->mod_menu->view_hmenu();
        $data['menudetail_content'] = $this->mod_menu->detail_menu($menudetail_info);
        $data['event_info'] = $this->mod_events->view_events(); 

        $data['events_info'] = $this->mod_events->view_hevents();

        // view on submenu        
        $this->load->view('templates/default/common/header', $data);
        $this->load->view('templates/default/events/events_detail', $data);
        $this->load->view('templates/default/common/footer', $data);
    }
    
    public function submenudetail($id){
        $data['title'] = "Institute of Education Research Alumni Association (IERAA)";

        $id = (int)$id;
 
        $data['widget_info'] = $this->mod_widget->view_hwidget(); 
        
 
        $data['links_info'] = $this->mod_links->view_hlinks(); 
        
        $submenudetail_info = $this->security->xss_clean($this->uri->segment(3)); 
 
        $data['menu_content'] = $this->mod_menu->view_hmenu();
        
 
        $data['submenu_content'] = $this->mod_submenu->view_hsubmenu();
        $data['submenudetail_content'] = $this->mod_submenu->detail_submenu($submenudetail_info);
 

 
        $this->load->model('home/mod_menu');
        $data['menu_content'] = $this->mod_menu->view_hmenu();
        $data['leftmenu_content'] = $this->mod_menu->view_hmenu_left();
        // view on submenu
        $this->load->Model('home/mod_submenu');
        $data['submenu_content'] = $this->mod_submenu->view_submenu($id);
        
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


//        print_r($data); exit;

        $this->load->view('templates/default/common/header',  $data);
        $this->load->view('templates/default/submenu/index', $data);
        $this->load->view('templates/default/common/footer');

    }
    
    public function detailwidget($id){

        $id = (int)$id;
        
 
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
 
        $data['submenu_content'] = $this->mod_submenu->view_submenu($id);
        
        
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


    public function detailpage($id){
 
        $data['title'] = "Institute of Education Research Alumni Association (IERAA)";

        $id = (int)$id;
 
        $data['widget_info'] = $this->mod_widget->view_hwidget();
        $data['links_info'] = $this->mod_links->view_hlinks();
        $data['menu_content'] = $this->mod_menu->view_hmenu();
        $data['submenu_content'] = $this->mod_submenu->view_hsubmenu();
        $data['submenudetail_content'] = $this->mod_submenu->detail_submenu($id);
 
        $this->load->model('home/mod_menu');
        $data['menu_content'] = $this->mod_menu->view_hmenu();
        $data['leftmenu_content'] = $this->mod_menu->view_hmenu_left();
        // view on submenu
        $this->load->Model('home/mod_submenu');
        $data['submenu_content'] = $this->mod_submenu->view_submenu($id);
        
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
//        print_r($data); exit;
        
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
   
//        print_r($data); exit;

        $data['pagedetail_content'] = $this->mod_page->detail_page($id);
       // print_r($data); exit;

        $this->load->view('templates/default/common/header',  $data);
        $this->load->view('templates/default/page/index', $data);
        $this->load->view('templates/default/common/footer');

    }    
    
    
    
    public function opportunitylist(){
         $data['links_info'] = $this->mod_links->view_hlinks();        
 
        $data['widget_info'] = $this->mod_widget->view_hwidget();        
 
        $data['menu_content'] = $this->mod_menu->view_hmenu();        
        // view on submenu
 
        $data['submenu_content'] = $this->mod_submenu->view_submenu();  
        $data['opp_contetn'] = $this->mod_opportunities->opportunitieslist();
        $this->load->view('opportunities/home/hv_opportunities', $data);
    }
    
    
    
     public function pgdresultlist(){
         $data['links_info'] = $this->mod_links->view_hlinks();        
 
        $data['widget_info'] = $this->mod_widget->view_hwidget();        
 
        $data['menu_content'] = $this->mod_menu->view_hmenu();        
        // view on submenu
 
        $data['submenu_content'] = $this->mod_submenu->view_submenu();  
        $data['pdg_result'] = $this->mod_pgdresult->view_pgdresult();
//        print_r($datas); exit;
        
        $this->load->view('pgdresult/home/hv_pgdresult', $data);
    }
    
}