<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('home/mod_menu', 'mod_menu');
        $this->load->Model('home/mod_submenu', 'mod_submenu');
        $this->load->model('home/mod_slide', 'mod_slide');
        $this->load->model('home/mod_links', 'mod_links');
        $this->load->model('home/mod_message', 'mod_message');
        $this->load->model('home/mod_widget', 'mod_widget');
        $this->load->model('home/mod_widgetsdata', 'mod_widgetsdata');
        $this->load->model('home/mod_news', 'mod_widgetsdata');
    }

    function index()
    {


        // for ($i = 1; $i < 93; $i++) {
        //     echo "https://www.banksbd.org/routings/" . $i . ".html<br>";
        // }
        // exit;

        $data['title'] = "Institute of Education Research Alumni Association (IERAA)";

        // view on Menu
        $data['menu_content'] = $this->mod_menu->view_hmenu();

        // view on submenu
        $data['submenu_content'] = $this->mod_submenu->view_submenu();

        // slide view on home page
        $data['temp']['slide_info'] = $this->mod_slide->view_hslide();

        // weblists view on home page
        $data['links_info'] = $this->mod_links->view_hlinks();

        // welcome messege
        $datas['wmessege_info'] = $this->mod_message->view_hmessage();

        // widgets         
        $data['widget_info'] = $this->mod_widget->view_hwidget();

        // widgets
        $data['widgets_data'] = $this->mod_widgetsdata->view_widgetsdatafront();

        // News
        $data['news_info'] = $this->mod_news->view_hnews();


        // view for home page
        $this->load->view('templates/default/common/header');
        $this->load->view('templates/default/home/index', $data);
        $this->load->view('templates/default/common/footer');
    }
}