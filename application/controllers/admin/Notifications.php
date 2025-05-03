<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Notifications extends CI_Controller{
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
        $data['title'] = "Jibon Joyee";
        $this->load->model('home/mod_category', 'mod_category');
      
    }
    public function index(){
        $data['username'] = $this->session->userdata('username');
 
        $this->load->view('templates/admin/common/header', $data);
        $this->load->view('templates/admin/common/left_nav');
        $this->load->view('templates/admin/category/index', $data);        
        $this->load->view('templates/admin/common/footer');

    }
    
    public function detail($slug){
       
        
        // $this->load->model('Post_model');
        $data['posts'] = $this->mod_category->fview($slug);
        $data['cats'] = $this->mod_category->fcategories();
        $data['cat_name'] = $this->mod_category->category_name_acc_to_id($slug);

        if (empty($data['cats'])) {

            echo "no post found";
        } else{
            // echo "<pre>";
            // print_r($data); exit();

            $this->load->view('templates/front/common/header',$data);
            // $this->load->view('templates/front/common/left_nav');
            $this->load->view('templates/front/category/index', $data);
            $this->load->view('templates/front/common/footer');
            
        }      


    }  
  
    
}