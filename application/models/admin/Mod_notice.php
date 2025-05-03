<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Mod_notice extends CI_Model {

    private $_jj_notice = "jj_notice";
    function __construct() {
        parent::__construct();
    }
    
    function insert_notice($data){
        $data['created_at'] = date("Y-m-d H:i:s");
         
       // echo "<pre>";
       // print_r ($data); exit();
        $result = $this->db->insert($this->_jj_notice,$data);
        if ($result > 0){
            return $result;
        }
    }
    
    function view_notice(){
        $this->db->order_by('created_at', 'desc'); 
        $notice_query = $this->db->get_where($this->_jj_notice);       
        $notice_result = $notice_query->result();           
        return $notice_result;
    }
    
    function view_hnotice(){ // model for home page notice
        $this->db->order_by('notice_date', 'desc'); 
//        $notice_query = $this->db->get_where('vimg_notice');
        $notice_query = $this->db->get_where('vimg_notice', array('notice_status' => 1));       

        $notice_result = $notice_query->result_array();           
        return $notice_result;
    }
    
    function view_inactivenotice(){ // model for home page notice
        $inactivenotice_query = $this->db->get_where('vimg_notice', array('notice_status' => 0));       
        $inactivenotice_result = $inactivenotice_query->result_array();           
        return $inactivenotice_result;
    }
    
    
    function edit_notice($id){
        $notice_query = $this->db->get_where($this->_jj_notice, array('id' => $id) );       
        $notice_result = $notice_query->row();                   
        return $notice_result;
    }
    
    function detail_notice($nemudetail_id){
        $noticedetail_query = $this->db->get_where('vimg_notice', array('notice_id' => $nemudetail_id) );       
        $noticedetail_result = $noticedetail_query->result_array();               
//        echo "<pre>";
//        print_r ($noticedetail_result); exit();              
        return $noticedetail_result;
    }

    function update_notice($notice_info, $data){

        $data['created_at'] = date("Y-m-d H:i:s");

        
        $this->db->where('id', $notice_info);
        $result = $this->db->update($this->_jj_notice, $data);
        if ($result > 0){
            return $result;
        }
    }
    
    
    public function delete_notice($notice_id){
        $this->db->where('notice_id', $notice_id);
        $this->db->delete('vimg_notice');
        return $this->db->affected_rows();
    }
    
    public function get_notice()
    {
        // $this->db->order_by('notice_date', 'desc'); 
        $this->db->limit(1); 
        return $this->db->get_where($this->_jj_notice, array('status'=> 1))->row()->notice_title;
  
    }
    
}


// CREATE TABLE IF NOT EXISTS `vimg_notice` (
//  `notice_id` int(11) NOT NULL AUTO_INCREMENT,
//  `notice_name` varchar(255) NOT NULL,
//  `notice_date` datetime NOT NULL,
//  `notice_text` text NOT NULL,
//  `notice_status` tinyint(4) NOT NULL,
//  `notice_image` varchar(100) NOT NULL,
//  PRIMARY KEY (`notice_id`)
// ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;