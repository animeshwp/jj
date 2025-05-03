<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mod_fees extends CI_Model {

   

    private $_vimg_fees = "vimg_fees";

    function __construct() {
        
        parent::__construct();
    }

    function view_fees(){
        $this->db->order_by("created_at", "desc");
        return $this->db->get_where($this->_vimg_fees)->result_array();        
    }
    
    function update_fees_status($data){

        // $fees_update = array(
        //     'deposit_status' => 'Success'                       
        // );

        print_r($data); // exit();

        $this->db->where('trnx_id', $_GET['transId']);
        return $this->db->update($this->_vimg_fees , $data);

    }


    function insert_ec_members($img_info){
        $day = date("Y-m-d H:i:s");
        $member_info = array(
            "name"    => $this->input->post('name'),
            "designation"      => $this->input->post('designation'),
            "position_in_ec"      => $this->input->post('position_in_ec'),
            "membership_no"    => $this->input->post('membership_no'),
            "email"      => $this->input->post('email'),
            "cadre"      => $this->input->post('cadre'),
            "member_status"    => $this->input->post('member_status'),
            "photo"     => $img_info            
        );
 
        $result = $this->db->insert('vimg_ec_members',$member_info);
        if ($result > 0){
            return $result;
        }
    }
    
    function view_ec_members(){
        $member_query = $this->db->get_where('vimg_ec_members', array('member_status' => 1, 'serial_no'));       
        $member_result = $member_query->result_array();           
        return $member_result;
    }

    function view_ec_member(){
        $member_query = $this->db->get_where('vimg_ec_members', array('member_status' => 1, 'position_in_ec' => 'president'));       
        $member_result = $member_query->result_array();           
        return $member_result;
    }

    
    function view_h_ec_members(){ // model for home page member
        $member_query = $this->db->get_where('vimg_ec_members', array('member_status' => 1));       
        $member_result = $member_query->result_array();           
        return $member_result;
    }
    
    
    function edit_ec_members($nemu_id){
        $member_query = $this->db->get_where('vimg_ec_members', array('member_id' => $nemu_id) );       
        $member_result = $member_query->result_array();               
//        echo "<pre>";
//        print_r ($member_result); exit();              
        return $member_result;
    }


    function update_ec_member($member_id, $file_name){

        $day = date("Y-m-d H:i:s");

        if(empty($file_name)){ 

            $member_info = array(
                "member_status"     => $this->input->post('member_status'),
                "designation"       => $this->input->post('designation'),
                "position_in_ec"    => $this->input->post('position_in_ec'),
                "membership_no"     => $this->input->post('membership_no'),
                "email"             => $this->input->post('email'),
                "cadre"             => $this->input->post('cadre'),
                "name"              => $this->input->post('name')      
            );
        }else{
            $member_info = array(
                "member_status"     => $this->input->post('member_status'),
                "designation"       => $this->input->post('designation'),
                "position_in_ec"    => $this->input->post('position_in_ec'),
                "membership_no"     => $this->input->post('membership_no'),
                "email"             => $this->input->post('email'),
                "cadre"             => $this->input->post('cadre'),
                "name"              => $this->input->post('name'),
                "photo"             => $file_name          
            );
        }
        $this->db->where('member_id', $member_id);
        $result = $this->db->update('vimg_ec_members',$member_info);
        if ($result > 0){
            return $result;
        }
    } //payment_list($user_id)

    public function payment_list($user_id)
    {
        $user_id = $this->session->userdata('user_id');
        return $this->db->get_where($this->_vimg_fees, array('user_id'=>$user_id, 'deposit_status' => "Success") )->result();
    }
}


//CREATE TABLE IF NOT EXISTS `vimg_ec_members` (
//  `member_id` int(11) NOT NULL AUTO_INCREMENT,
//  `member_name` varchar(255) NOT NULL,
//  `member_date` datetime NOT NULL,
//  `member_text` text NOT NULL,
//  `member_status` tinyint(4) NOT NULL,
//  `member_image` varchar(100) NOT NULL,
//  PRIMARY KEY (`member_id`)
//) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;
