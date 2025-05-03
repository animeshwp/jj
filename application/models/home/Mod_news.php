<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Mod_news extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function insert_news($img_info){
        $day = date("Y-m-d H:i:s");
        $news_info = array(
            "news_name"      => $this->input->post('newsname'),
            "news_sum"      =>  $this->input->post('news_text'),
            "news_date"      => $day,
            "news_text"      => $this->input->post('news_text'),
            "news_status"    => $this->input->post('news_status'),
            "news_image"     => $img_info            
        );
//        echo "<pre>";
//        print_r ($news_info); exit();
        $result = $this->db->insert('vimg_news',$news_info);
        if ($result > 0){
            return $result;
        }
    }
    
    function view_news(){
        $this->db->order_by('news_date', 'desc'); 
        $news_query = $this->db->get_where('vimg_news', array('news_status' => 1));       
        $news_result = $news_query->result_array();           
        return $news_result;
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