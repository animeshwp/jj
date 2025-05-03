<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Category extends CI_Controller
{
    public function __construct()
    {
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
        $this->load->model('home/mod_posts', 'mod_posts');

    }

    public function index()
    {
        redirect(base_url());
    }

    public function detail($slug)
    {


        $data['posts'] = $this->mod_category->fview($slug);
        $data['postsb'] = $this->mod_category->fviews($slug);
        $data['cats'] = $this->mod_category->fcategories();
        $data['latest_post'] = $this->mod_category->fpview();
        $data['cat_name'] = $this->mod_category->category_name_acc_to_id($slug);
        $data['most_viewed'] = $this->mod_posts->get_most_viewed_posts(5); // Get top 5


        // print_r($data); exit();

        if (empty($data['cats'])) {

            echo "no post found";
        } else {
            // echo "<pre>";
            // print_r($data); exit();

            $this->load->view('templates/front/common/header', $data);
            // $this->load->view('templates/front/common/left_nav');
            $this->load->view('templates/front/category/index', $data);
            $this->load->view('templates/front/common/footer');

        }
    }

    public function post($slug = null, $id = null)
    {
        $data['posts'] = $this->mod_category->fview($slug);
        $data['cats'] = $this->mod_category->fcategories();
        $data['latest_post'] = $this->mod_category->fpview();
        $data['cat_name'] = $this->mod_category->category_name_acc_to_id($slug);

        if (empty($data['cats'])) {

            echo "no post found";
        } else {
            // echo "<pre>";
            // print_r($data); exit();

            $this->load->view('templates/front/common/header', $data);
            // $this->load->view('templates/front/common/left_nav');
            $this->load->view('templates/front/post/index', $data);
            $this->load->view('templates/front/common/footer');

        }


    }

}