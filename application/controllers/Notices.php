<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Notices extends CI_Controller {
    public function __Construct(){
        parent::__construct();

        // News  
        $this->load->model('home/mod_news', 'mod_news');
        // View Menu
        $this->load->model('home/mod_menu');        
        // view on submenu
        $this->load->Model('home/mod_submenu');        
        // slide view on home page
        $this->load->model('home/mod_slide');
        $this->load->model('home/mod_message');
        // News 
        $this->load->model('home/mod_news');
        // notices
        $this->load->model('home/Mod_notices', 'Mod_notices');
        
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

        // notices
        $data['event_info'] = $this->Mod_notices->view_notices(); 

        $data['notices_info'] = $this->Mod_notices->view_hnotices();
            
        $this->load->view('templates/default/common/header', $data);
        $this->load->view('templates/default/notices/index', $data);
        $this->load->view('templates/default/common/footer', $data);
    }
    
     
}