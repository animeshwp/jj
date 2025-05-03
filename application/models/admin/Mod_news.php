<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Mod_news extends CI_Model
{

    private $_jj_post = " jj_post";

    function __construct()
    {
        parent::__construct();
    }

    function insert_news($data)
    {
        $data['created_at'] = date("Y-m-d H:i:s");

        $data['post_status'] = 1;
        // echo "<pre>";
        // print_r ($data); exit();
        $result = $this->db->insert($this->_jj_post, $data);
        if ($result > 0) {
            return $result;
        }
    }

    function view_news()
    {
        return $this->db->order_by('post_id ', 'desc')->get_where($this->_jj_post)->result();
    }

    //     function view_hnews(){ // model for home page news
//         $this->db->order_by('news_date', 'desc'); 
// //        $news_query = $this->db->get_where('vimg_news');
//         $news_query = $this->db->get_where('vimg_news', array('news_status' => 1));       

    //         $news_result = $news_query->result_array();           
//         return $news_result;
//     }

    //     function view_inactivenews(){ // model for home page news
//         $inactivenews_query = $this->db->get_where('vimg_news', array('news_status' => 0));       
//         $inactivenews_result = $inactivenews_query->result_array();           
//         return $inactivenews_result;
//     }


    function edit_news($id)
    {
        return $this->db->get_where($this->_jj_post, array('post_id' => $id))->row();

    }

    //     function detail_news($nemudetail_id){
//         $newsdetail_query = $this->db->get_where('vimg_news', array('news_id' => $nemudetail_id) );       
//         $newsdetail_result = $newsdetail_query->result_array();               
// //        echo "<pre>";
// //        print_r ($newsdetail_result); exit();              
//         return $newsdetail_result;
//     }

    function update_news($data, $id)
    {
        $data['updated_at'] = date("Y-m-d H:i:s");

        print_r($data);
        exit();

        $this->db->where('post_id', $id);
        $result = $this->db->update($this->_jj_post, $data);
        if ($result > 0) {
            return $result;
        }
    }


    public function delete_news($news_id)
    {
        $this->db->where('post_id', $news_id);
        $this->db->delete($this->_jj_post);
        return $this->db->affected_rows();
    }

    public function get_count()
    {
        return $this->db->count_all($this->_jj_post);
    }

    public function get_authors($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('post_id ', 'desc');
        $query = $this->db->get($this->_jj_post);

        return $query->result();
    }



}


//CREATE TABLE IF NOT EXISTS `vimg_news` (
//  `news_id` int(11) NOT NULL AUTO_INCREMENT,
//  `news_name` varchar(255) NOT NULL,
//  `news_date` datetime NOT NULL,
//  `news_text` text NOT NULL,
//  `news_status` tinyint(4) NOT NULL,
//  `news_image` varchar(100) NOT NULL,
//  PRIMARY KEY (`news_id`)
//) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;