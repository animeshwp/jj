<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class Mod_members extends CI_Model {

    private $_tbl_alumnis= "tbl_alumnis";
    private $_vimg_fees = "vimg_fees";
    private $_vimg_membership = "vimg_membership";

    function __construct() {
        parent::__construct();
    }
    

    function memberlist(){
        return $this->db->get($this->_tbl_alumnis)->result();           

    }

    public function count_members()
    {
        return $this->db->get($this->_tbl_alumnis)->num_rows();           
    }
    
    function view_inactivemessage(){ // model for home page message
        $message_query = $this->db->get_where('vimg_message', array('message_status' => 0));       
        $message_result = $message_query->result_array();           
        return $message_result;
    }
    
    function view_hmessage(){ // model for home page message
        $message_query = $this->db->get_where('vimg_message', array('message_status' => 1));       
        $message_result = $message_query->result_array();           
        return $message_result;
    }
    
    
    function edit_message($nemu_id){
        $message_query = $this->db->get_where('vimg_message', array('message_id' => $nemu_id) );       
        $message_result = $message_query->result_array();               
//        echo "<pre>";
//        print_r ($message_result); exit();              
        return $message_result;
    }


    function update_message($message_id, $file_name){

        $day = date("Y-m-d H:i:s");

        if(empty($file_name)){ 
        $message_info = array(
            "message_name"      => $this->input->post('messagename'),
            "message_date"      => $day,
            "message_text"      => $this->input->post('message_text'),
            "message_status"    => $this->input->post('message_status')         
        );
    }else{
        $message_info = array(
            "message_name"      => $this->input->post('messagename'),
            "message_date"      => $day,
            "message_text"      => $this->input->post('message_text'),
            "message_status"    => $this->input->post('message_status'),
            "message_image"     => $file_name            
        );
    }
//        echo $nemu_id; exit;
//        echo "<pre>";
//        print_r ($message_info); exit();
        $this->db->where('message_id', $message_id);
        $result = $this->db->update('vimg_message',$message_info);
//        ECHO $result; EXIT;
        if ($result > 0){
            return $result;
        }
    }

    public function m_delte_message($message_id){

        $this->db->where('message_id', $message_id);
        $result = $this->db->delete('vimg_message',$message_info);
//        ECHO $result; EXIT;
        if ($result > 0){
            return $result;
        }

    }

    public function embers_name($id)
    {
        this->db->where('message_id', $message_id);
        $result = $this->db->delete('vimg_message',$message_info);
        
    }
    
    function save_fees($data){
        // $day = date("Y-m-d H:i:s");

        $this->db->insert($this->_vimg_fees, $data);
        return $this->db->insert_id();
        
    }

    function get_fees_info($query_data ){

        $query =  $this->db->get_where($this->_vimg_fees, $query_data);
        return $query->num_rows();  
        
    }

    public function view_members(){
       return $this->db->get($this->_vimg_membership)->result_array();
    //    return $this->db->get_where($this->_vimg_membership, array('membership_status' => "Approved"))->result_array();
        // return $this->db->insert_id();
        
    }

    public function view_members_informatoin(){
        // return $this->db->get_wher($this->_vimg_membership)->result_array();
        return $this->db->get_where($this->_vimg_membership, array('membership_status' => "Approved",'user_id'=> $_SESSION['user_id'] ))->row_array();
         // return $this->db->insert_id();
         
     }
// membership_status
     public function is_active_member($user_id)
     {
        $query =  $this->db->get_where($this->_vimg_membership, array('membership_status' => 'Approved', 'user_id' => $user_id));
        return $query->num_rows();
     }
    
}


//CREATE TABLE IF NOT EXISTS `vimg_message` (
//  `message_id` int(11) NOT NULL AUTO_INCREMENT,
//  `message_name` varchar(255) NOT NULL,
//  `message_date` datetime NOT NULL,
//  `message_text` text NOT NULL,
//  `message_status` tinyint(4) NOT NULL,
//  `message_image` varchar(100) NOT NULL,
//  PRIMARY KEY (`message_id`)
//) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;
