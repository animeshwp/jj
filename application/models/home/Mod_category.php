<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Mod_category extends CI_Model
{

    private $_jj_category = "jj_category";
    private $_jj_post = "jj_post";
    private $_jj_author = "jj_author";

    function __construct()
    {
        parent::__construct();
    }


    public function fview($slug)
    {
        $this->db->select('id');
        $this->db->from($this->_jj_category);
        $this->db->where('slug', $slug);
        $cat_query = $this->db->get();

        if ($cat_query->num_rows() == 0) {
            return []; // No category found, return empty result
        }

        $cat_id = $cat_query->row()->id; // Fetch cat_id
        // print_r($cat_id ); exit();

        // Step 2: Fetch all posts from jj_post matching the cat_id
        $this->db->select($this->_jj_post . '.*, ' . $this->_jj_category . '.title,' . $this->_jj_category . '.slug');
        $this->db->from($this->_jj_post);
        $this->db->join($this->_jj_category, $this->_jj_category . '.id = ' . $this->_jj_post . '.cat_id', 'left');
        // $this->db->join($this->_jj_author, $this->_jj_author.'.id = '.$this->_jj_post.'.authorId', 'left');

        $this->db->where($this->_jj_post . '.cat_id', $cat_id);
        $this->db->order_by($this->_jj_post . '.created_at', 'DESC'); // Order by created_at DESC
        $this->db->limit(4); // Limit results to 4
        $this->db->where($this->_jj_post . '.post_status', 1);
        return $this->db->get()->result(); // Return result as an array of objects

    }



    public function fviews($slug)
    {
        $this->db->select('id');
        $this->db->from($this->_jj_category);
        $this->db->where('slug', $slug);
        $cat_query = $this->db->get();

        if ($cat_query->num_rows() == 0) {
            return []; // No category found, return empty result
        }

        $cat_id = $cat_query->row()->id; // Fetch cat_id
        // print_r($cat_id ); exit();

        // Step 2: Fetch all posts from jj_post matching the cat_id
        $this->db->select($this->_jj_post . '.*, ' . $this->_jj_category . '.title,' . $this->_jj_category . '.slug');
        $this->db->from($this->_jj_post);
        $this->db->join($this->_jj_category, $this->_jj_category . '.id = ' . $this->_jj_post . '.cat_id', 'left');
        // $this->db->join($this->_jj_author, $this->_jj_author.'.id = '.$this->_jj_post.'.authorId', 'left');

        $this->db->where($this->_jj_post . '.cat_id', $cat_id);
        $this->db->order_by($this->_jj_post . '.created_at', 'DESC'); // Order by created_at DESC
        $this->db->limit(6, 4); // Limit results to 4
        $this->db->where($this->_jj_post . '.post_status', 1);
        return $this->db->get()->result(); // Return result as an array of objects

    }

    public function fpview()
    {
        // $this->db->order_by('created_at', 'desc'); 
        // Step 2: Fetch all posts from jj_post matching the cat_id
        $this->db->select($this->_jj_post . '.*, ' . $this->_jj_category . '.title,' . $this->_jj_category . '.slug');
        $this->db->from($this->_jj_post);
        $this->db->join($this->_jj_category, $this->_jj_category . '.id = ' . $this->_jj_post . '.cat_id', 'left');
        // $this->db->join($this->_jj_author, $this->_jj_author.'.id = '.$this->_jj_post.'.authorId', 'left');

        $this->db->where($this->_jj_post . '.post_status', 1);
        $this->db->order_by($this->_jj_post . '.created_at', 'DESC'); // Order by created_at DESC
        $this->db->limit(5, 4); // Limit results to 4
        return $this->db->get()->result(); // Return result as an array of objects
    }


    public function fcategories()
    {
        $this->db->select('*');
        $this->db->from($this->_jj_category);
        return $this->db->get()->result(); // Return all categories
    }


    public function category_name_acc_to_id($slug)
    {
        $this->db->select('title, sum');
        $this->db->from($this->_jj_category);
        $this->db->where('slug', $slug);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row(); // Return category name
        } else {
            return null; // No category found
        }
    }

}