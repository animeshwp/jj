<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Mod_posts extends CI_Model {

    private $_jj_post = "jj_post";
    private $_jj_category = "jj_category";
    private $_jj_subcategory = "jj_subcategory";
    private $_jj_author = "jj_author";
    private $_jj_ratings = "jj_ratings";

    function __construct() {
        parent::__construct();
    }    

    function fpview(){
        $this->db->order_by('created_at', 'desc'); 
        $this->db->limit(6); 
        return $this->db->get($this->_jj_post, array('post_status' => 1))->result();
    }

    public function get_post($id)
    {
        
        $this->db->select('jj_post.*, jj_category.title, jj_subcategory.sub_cat, jj_subcategory.slug as subcat_slug');
        $this->db->from('jj_post');
        $this->db->join('jj_category', 'jj_category.id = jj_post.cat_id', 'left');
        $this->db->join('jj_subcategory', 'jj_subcategory.id = jj_post.subcat_id', 'left');
        // $this->db->join('jj_author', 'jj_author.id = jj_post.authorId', 'left');
        $this->db->where('jj_post.post_id', $id);
        $this->db->where('jj_post.post_status', 1);
        // $this->db->order_by('jj_post.created_at', 'DESC'); // Order by created_at DESC
        $this->db->limit(4); // Limit to 4 results

        $query = $this->db->get();
        return $query->row(); // Return result as array of objects

        // return $this->db->get_where($this->_jj_post, array('post_id'=>$id, 'post_status'=>1))->row();
        // // $this->db->order_by('created_at', 'desc'); 
        // // Step 2: Fetch all posts from jj_post matching the cat_id
        // $this->db->select($this->_jj_post.'.*, '.$this->_jj_category.'.title,'.$this->_jj_category.'.slug,'.$this->_jj_subcategory.'.sub_cat,'.$this->_jj_subcategory.'.slug');
        // $this->db->from($this->_jj_post);
        // $this->db->join($this->_jj_category, $this->_jj_category.'.id = '.$this->_jj_post.'.cat_id', $this->_jj_subcategory.'.id = '.$this->_jj_post.'.subcat_id', 'left');
        // // $this->db->where($this->_jj_post.'.cat_id', $cat_id);
        // // $this->db->order_by($this->_jj_post.'.created_at', 'DESC'); // Order by created_at DESC
        // // $this->db->limit(6); // Limit results to 4
        // return $this->db->get()->row(); // Return result as an array of objects
    }
    
    function view_hnews(){ // model for home page news
        $this->db->order_by('news_date', 'desc'); 
//        $news_query = $this->db->get_where('vimg_news');
        $news_query = $this->db->get_where('vimg_news', array('news_status' => 1));       

        $news_result = $news_query->result();           
        return $news_result;
    }
    
    function view_inactivenews(){ // model for home page news
        $inactivenews_query = $this->db->get_where('vimg_news', array('news_status' => 0));       
        $inactivenews_result = $inactivenews_query->result_array();           
        return $inactivenews_result;
    }
    
    
    function edit_news($nemu_id){
        $news_query = $this->db->get_where('vimg_news', array('news_id' => $nemu_id) );       
        $news_result = $news_query->result_array();               
//        echo "<pre>";
//        print_r ($news_result); exit();              
        return $news_result;
    }
    
    function detail_news($nemudetail_id){
        $newsdetail_query = $this->db->get_where('vimg_news', array('news_id' => $nemudetail_id) );       
        $newsdetail_result = $newsdetail_query->result_array();               
//        echo "<pre>";
//        print_r ($newsdetail_result); exit();              
        return $newsdetail_result;
    }

    function update_news($nemu_id, $img_info){
        if(empty($img_info)){
        $news_info = array(
            "news_name"      => $this->input->post('newsname'),
            "news_sum"      =>  $this->input->post('news_text'),
            "news_text"      => $this->input->post('news_text'),
            "news_status"    => $this->input->post('news_status')         
        );
        }else{
            $news_info = array(
            "news_name"      => $this->input->post('newsname'),
            "news_sum"      =>  $this->input->post('news_text'),
//            "news_date"      => $day,
            "news_text"      => $this->input->post('news_text'),
            "news_status"    => $this->input->post('news_status'),
            "news_image"     => $img_info            
        );
        }        
        $this->db->where('news_id', $nemu_id);
        $result = $this->db->update('vimg_news',$news_info);
        if ($result > 0){
            return $result;
        }
    }
    
    
    public function delete_news($news_id){
        $this->db->where('news_id', $news_id);
        $this->db->delete('vimg_news');
        return $this->db->affected_rows();
    }

     // Insert rating
    public function insert_rating($post_id, $rating) {
        $data = [
            'post_id' => $post_id,
            'rating' => $rating
        ];
        return $this->db->insert($this->_jj_ratings, $data);
    }

    // Get average rating for a post
    public function get_average_rating($post_id) {
        $this->db->select('AVG(rating) as avg_rating');
        $this->db->where('post_id', $post_id);
        $query = $this->db->get($this->_jj_ratings);

        $avg_rating = $query->row()->avg_rating;

        return round($avg_rating ?? 0, 1); // Use 0 if null to avoid error
    }


    public function increment_view_count($post_id) {
        $this->db->where('post_id', $post_id);
        $this->db->set('view_count', 'view_count + 1', FALSE); // Increment view count
        $this->db->update($this->_jj_post);
    }

    public function get_most_viewed_posts($limit) {
    
        $this->db->select($this->_jj_post.'.*, '.$this->_jj_category.'.title,'.$this->_jj_category.'.slug');
        $this->db->from($this->_jj_post);
        $this->db->join($this->_jj_category, $this->_jj_category.'.id = '.$this->_jj_post.'.cat_id', 'left');
        // $this->db->join($this->_jj_author, $this->_jj_author.'.id = '.$this->_jj_post.'.authorId', 'left');

        $this->db->where($this->_jj_post.'.post_status', 1);
        $this->db->order_by($this->_jj_post.'.view_count', 'DESC'); // Order by created_at DESC
        $this->db->limit($limit); // Limit results to 4
        return $this->db->get()->result(); // Return result as an array of objects        
    }    
}