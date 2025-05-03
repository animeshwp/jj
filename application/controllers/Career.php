<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Career extends CI_Controller
{
    public function __Construct()
    {
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
        // careers
        $this->load->model('home/mod_careers', 'mod_careers');
        $this->load->model('home/mod_links');
        $this->load->model('home/mod_message');
        $this->load->model('home/mod_widget');
        $this->load->model('home/mod_widgetsdata');
    }

    public function index()
    {
        $data['title'] = "Institute of Education Research Alumni Association (IERAA)";

        $data['menu_content'] = $this->mod_menu->view_hmenu();
        $data['leftmenu_content'] = $this->mod_menu->view_hmenu_left();
        $data['submenu_content'] = $this->mod_submenu->view_hsubmenu();
        $data['slide_info'] = $this->mod_slide->view_hslide();
        $data['wmessege_info'] = $this->mod_message->view_hmessage();
        $data['wmessege_info'] = $this->mod_message->view_hmessage();
        $data['widget_info'] = $this->mod_widget->view_hwidget();
        $data['news_info'] = $this->mod_news->view_hnews();
        $data['career_info'] = $this->mod_careers->view_career();
        $data['careers_info'] = $this->mod_careers->view_hcareer();
        $data['widget_info'] = $this->mod_widget->view_hwidget();
        $data['box_info'] = $this->mod_widget->view_new_widget();
        // echo "<pre>";
        // print_r($datas);
        // exit;

        $this->load->view('templates/default/common/header', $data);
        $this->load->view('templates/default/careers/index', $data);
        $this->load->view('templates/default/common/footer', $data);
    }
}