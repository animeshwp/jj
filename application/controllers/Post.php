<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Post extends CI_Controller
{
    public function __Construct()
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

        // $this->load->model('admin/mod_posts', 'mod_posts');
    }

    public function index()
    {


    }

    public function detail($slug = null, $id = null)
    {

        $data['posts'] = $this->mod_category->fview($slug);
        $data['cats'] = $this->mod_category->fcategories();
        $data['latest_post'] = $this->mod_category->fpview();
        $data['cat_name'] = $this->mod_category->category_name_acc_to_id($slug);
        $data['single_post'] = $this->mod_posts->get_post($id);
        $data['most_viewed'] = $this->mod_posts->get_most_viewed_posts(5); // Get top 5
        $this->mod_posts->increment_view_count($id);

        if (empty($data['cats'] && $data['single_post'])) {

            redirect(base_url());

        } else {

            $this->load->view('templates/front/common/header', $data);
            // $this->load->view('templates/front/common/left_nav');
            $this->load->view('templates/front/post/index', $data);
            $this->load->view('templates/front/common/footer');

        }


    }

    public function rating()
    {
        $post_id = $this->input->post('post_id');
        $rating = $this->input->post('rating');

        if ($this->mod_posts->insert_rating($post_id, $rating)) {
            echo json_encode(["status" => "success", "message" => "Rating saved!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to save rating"]);
        }
    }

    // Fetch average rating
    public function get_average($post_id)
    {
        $average_rating = $this->mod_posts->get_average_rating($post_id);
        echo json_encode(["average" => en2bnNumber($average_rating)]);
    }
}