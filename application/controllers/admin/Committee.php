<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Committee extends MY_Controller {
    public function __Construct(){
        parent::__construct();

        // News  
        $this->load->model('admin/mod_news', 'mod_news');
        // View Menu
        $this->load->model('admin/mod_menu');        
        // view on submenu
        $this->load->Model('admin/mod_submenu');        
        // slide view on home page
        $this->load->model('admin/mod_slide');
        $this->load->model('admin/mod_message');
        // News 
        $this->load->model('admin/mod_news');
        // ec_comm
//        $this->load->model('admin/mod_ec_comm', 'mod_ec_comm');
        
        }
    
    public function index(){
        $data['title'] = "Institute of Education Research Alumni Association (IERAA)";

        $data['menu_content'] = $this->mod_menu->view_hmenu();
        $data['leftmenu_content'] = $this->mod_menu->view_hmenu_left();
        
        // view on submenu
        $data['submenu_content'] = $this->mod_submenu->view_hsubmenu();
        
        // slide view on home page
        $data['slide_info'] = $this->mod_slide->view_hslide();
        $data['wmessege_info'] = $this->mod_message->view_hmessage();        

        // News 
        $data['news_info'] = $this->mod_news->view_hnews(); 

        // ec_comm
        $data['event_info'] = $this->mod_ec_comm->view_ec_comm(); 
        $data['ec_comm_info'] = $this->mod_ec_comm->view_hec_comm();
            
        $this->load->view('templates/default/common/header', $data);
        $this->load->view('templates/default/ec_comm/index', $data);
        $this->load->view('templates/default/common/footer', $data);
    }
    
    public function ec_committee()
    {
        // code...
    }
     
}