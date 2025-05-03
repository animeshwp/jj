<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mod_membership extends CI_Model {
    private $_vimg_membership = "vimg_membership";
    private $_vimg_users = "vimg_users";
    function __construct() {
        parent::__construct();
    }
    
    function insert_membership($file_name, $insert_id){

        // // print_r($file_name); exit();/*
        // $this->form_validation->set_rules('membership_id', 'membership_id', 'required',  array('required' => "Please fill up the field"));
        // $this->form_validation->set_rules('admission_date', 'admission_date', 'required',  array('required' => "Please fill up the field"));*/

        // if(empty($insert_id)) $insert_id = 0;
        $membership_info = array(
            "membership_id"                  => $this->input->post('membership_id'),
            "admission_date"                  => $this->input->post('admission_date'),
            "name"                  => $this->input->post('name'),
            "user_id"               => $insert_id,
            "photo"                 => $file_name,
            "type_of_membership"    => $this->input->post('type_of_membership'),
            "membership_id"         => "UOC".$this->input->post('mobile'),
            "father_husband_name"   => $this->input->post('father_husband_name'),
            "mother_name"           => $this->input->post('mother_name'),
            "date_of_birth"         => $this->input->post('date_of_birth'),
            "date_of_joining_first_job" => $this->input->post('date_of_joining_first_job'),
            "service_type"          => $this->input->post('service_type'),

            "latest_designation"    => $this->input->post('latest_designation'),
            "present_posting"       => $this->input->post('present_posting'),
            "date_of_joining_present_post"  => $this->input->post('date_of_joining_present_post'),
            "date_of_retirement_from_govt"  => $this->input->post('date_of_retirement_from_govt'),
            "present_address"       => $this->input->post('present_address'),
            "permanent_address"     => $this->input->post('permanent_address'),

            "telephone"             => $this->input->post('telephone'),
            "mobile"                => $this->input->post('mobile'),
            "email"                 => $this->input->post('email'),
            "spouse_name"           => $this->input->post('spouse_name'),
            "spouse_date_of_birth"  => $this->input->post('spouse_date_of_birth'),
            "spouse_occupation"     => $this->input->post('spouse_occupation'),

            "children_name_1"       => $this->input->post('children_name_1'),
            "children_date_of_birth_1"  => $this->input->post('children_date_of_birth_1'),
            "children_occupation_1" => $this->input->post('children_occupation_1'),
            "children_name_2"       => $this->input->post('children_name_2'),
            "children_date_of_birth_2"  => $this->input->post('children_date_of_birth_2'),
            "children_occupation_2"     => $this->input->post('children_occupation_2'),

            "children_name_3"       => $this->input->post('children_name_3'),
            "children_date_of_birth_3"  => $this->input->post('children_date_of_birth_3'),
            "children_occupation_3" => $this->input->post('children_occupation_3'),
            "children_name_4"       => $this->input->post('children_name_4'),
            "children_date_of_birth_4"  => $this->input->post('children_date_of_birth_4'),
            "children_occupation_4" => $this->input->post('children_occupation_4'),

            "children_name_5"       => $this->input->post('children_name_5'),
            "children_date_of_birth_5"  => $this->input->post('children_date_of_birth_5'),
            "children_occupation_5"     => $this->input->post('children_occupation_5'),
            "nid"                   => $this->input->post('nid'),
            "religion"              => $this->input->post('religion'),
            "blood_group"           => $this->input->post('blood_group'),

            "name_of_the_degree"    => $this->input->post('name_of_the_degree'),
            "name_of_university"    => $this->input->post('name_of_university'),
            "membership_in_other_club"  => $this->input->post('membership_in_other_club'),
            "area_of_interest"      => $this->input->post('area_of_interest'),
            "proposer"              => $this->input->post('proposer'),

            "proposer_membership_no"    => $this->input->post('proposer_membership_no'),
            "seconder"              => $this->input->post('seconder'),
            "seconder_membership_no"    => $this->input->post('seconder_membership_no')                     
        );
        // echo "<pre>";
        // print_r($membership_info ); exit();

        $result = $this->db->insert('vimg_membership',$membership_info);
        if ($result > 0){
            return $result;
        } else{
            $this->db->delete($this->_vimg_users,array('user_id'=> $insert_id));
        }
    }
    
    function view_membership(){
        $member_query = $this->db->get_where('vimg_membership');      
        $member_result = $this->db->order_by('id', 'DESC'); 
        $member_result = $member_query->result_array();           
        return $member_result;
    }
    
    function edit_membership($user_id){
        $member_query = $this->db->get_where('vimg_membership', array('user_id' => $user_id) );       
        $member_result = $member_query->row_array();                         
        return $member_result;
    }

    public function update_membership_status($user_id)
    {
        $membership_status_info = array(
            "membership_status"=> $this->input->post('membership_status')
        );

        $this->db->where('user_id', $user_id);
        $result = $this->db->update('vimg_membership',$membership_status_info);
        if ($result > 0){
            return $result;
        }

    }

    function update_membership($file_name){

        $day = date("Y-m-d H:i:s");

        // print_r($file_name); exit();

        if(!empty($file_name)){ 
        $membership_info = array(
            "membership_id"                  => $this->input->post('membership_id'),
            "admission_date"                  => $this->input->post('admission_date'),
            "name"                  => $this->input->post('name'),
            "photo"                 => $file_name,
            "type_of_membership"    => $this->input->post('type_of_membership'),
            "father_husband_name"   => $this->input->post('father_husband_name'),
            "mother_name"           => $this->input->post('mother_name'),
            "date_of_birth"         => $this->input->post('date_of_birth'),
            "date_of_joining_first_job"      => $this->input->post('date_of_joining_first_job'),
            "service_type"    => $this->input->post('service_type'),

            "latest_designation"      => $this->input->post('latest_designation'),
            "present_posting"      => $this->input->post('present_posting'),
            "date_of_joining_present_post"    => $this->input->post('date_of_joining_present_post'),
            "date_of_retirement_from_govt"      => $this->input->post('date_of_retirement_from_govt'),
            "present_address"      => $this->input->post('present_address'),
            "permanent_address"    => $this->input->post('permanent_address'),

            "telephone"      => $this->input->post('telephone'),
            "mobile"      => $this->input->post('mobile'),
            "email"    => $this->input->post('email'),
            "spouse_name"      => $this->input->post('spouse_name'),
            "spouse_date_of_birth"      => $this->input->post('spouse_date_of_birth'),
            "spouse_occupation"    => $this->input->post('spouse_occupation'),

            "children_name_1"      => $this->input->post('children_name_1'),
            "children_date_of_birth_1"      => $this->input->post('children_date_of_birth_1'),
            "children_occupation_1"    => $this->input->post('children_occupation_1'),
            "children_name_2"      => $this->input->post('children_name_2'),
            "children_date_of_birth_2"      => $this->input->post('children_date_of_birth_2'),
            "children_occupation_2"    => $this->input->post('children_occupation_2'),

            "children_name_3"      => $this->input->post('children_name_3'),
            "children_date_of_birth_3"      => $this->input->post('children_date_of_birth_3'),
            "children_occupation_3"    => $this->input->post('children_occupation_3'),
            "children_name_4"      => $this->input->post('children_name_4'),
            "children_date_of_birth_4"      => $this->input->post('children_date_of_birth_4'),
            "children_occupation_4"    => $this->input->post('children_occupation_4'),

            "children_name_5"      => $this->input->post('children_name_5'),
            "children_date_of_birth_5"      => $this->input->post('children_date_of_birth_5'),
            "children_occupation_5"    => $this->input->post('children_occupation_5'),
            "nid"      => $this->input->post('nid'),
            "religion"      => $this->input->post('religion'),
            "blood_group"    => $this->input->post('blood_group'),

            "name_of_the_degree"      => $this->input->post('name_of_the_degree'),
            "name_of_university"    => $this->input->post('name_of_university'),
            "membership_in_other_club"      => $this->input->post('membership_in_other_club'),
            "area_of_interest"      => $this->input->post('area_of_interest'),
            "proposer"    => $this->input->post('proposer'),

            "proposer_membership_no"      => $this->input->post('proposer_membership_id'),
            "seconder"      => $this->input->post('seconder'),
            "seconder_membership_no"    => $this->input->post('seconder_membership_no')     
        );
    }else{
        $membership_info = array(
            "membership_id"                  => $this->input->post('membership_id'),
            "admission_date"                  => $this->input->post('admission_date'),
            "name"    => $this->input->post('name'),
            "type_of_membership"      => $this->input->post('type_of_membership'),
            "father_husband_name"      => $this->input->post('father_husband_name'),
            "mother_name"    => $this->input->post('mother_name'),
            "date_of_birth"      => $this->input->post('date_of_birth'),
            "date_of_joining_first_job"      => $this->input->post('date_of_joining_first_job'),
            "service_type"    => $this->input->post('service_type'),

            "latest_designation"      => $this->input->post('latest_designation'),
            "present_posting"      => $this->input->post('present_posting'),
            "date_of_joining_present_post"    => $this->input->post('date_of_joining_present_post'),
            "date_of_retirement_from_govt"      => $this->input->post('date_of_retirement_from_govt'),
            "present_address"      => $this->input->post('present_address'),
            "permanent_address"    => $this->input->post('permanent_address'),

            "telephone"      => $this->input->post('telephone'),
            "mobile"      => $this->input->post('mobile'),
            "email"    => $this->input->post('email'),
            "spouse_name"      => $this->input->post('spouse_name'),
            "spouse_date_of_birth"      => $this->input->post('spouse_date_of_birth'),
            "spouse_occupation"    => $this->input->post('spouse_occupation'),

            "children_name_1"      => $this->input->post('children_name_1'),
            "children_date_of_birth_1"      => $this->input->post('children_date_of_birth_1'),
            "children_occupation_1"    => $this->input->post('children_occupation_1'),
            "children_name_2"      => $this->input->post('children_name_2'),
            "children_date_of_birth_2"      => $this->input->post('children_date_of_birth_2'),
            "children_occupation_2"    => $this->input->post('children_occupation_2'),

            "children_name_3"      => $this->input->post('children_name_3'),
            "children_date_of_birth_3"      => $this->input->post('children_date_of_birth_3'),
            "children_occupation_3"    => $this->input->post('children_occupation_3'),
            "children_name_4"      => $this->input->post('children_name_4'),
            "children_date_of_birth_4"      => $this->input->post('children_date_of_birth_4'),
            "children_occupation_4"    => $this->input->post('children_occupation_4'),

            "children_name_5"      => $this->input->post('children_name_5'),
            "children_date_of_birth_5"      => $this->input->post('children_date_of_birth_5'),
            "children_occupation_5"    => $this->input->post('children_occupation_5'),
            "nid"      => $this->input->post('nid'),
            "religion"      => $this->input->post('religion'),
            "blood_group"    => $this->input->post('blood_group'),

            "name_of_the_degree"      => $this->input->post('name_of_the_degree'),
            "name_of_university"    => $this->input->post('name_of_university'),
            "membership_in_other_club"      => $this->input->post('membership_in_other_club'),
            "area_of_interest"      => $this->input->post('area_of_interest'),
            "proposer"    => $this->input->post('proposer'),

            "proposer_membership_no"      => $this->input->post('proposer_membership_no'),
            "seconder"      => $this->input->post('seconder'),
            "seconder_membership_no"    => $this->input->post('seconder_membership_no')     
        );
    }

 
        $this->db->where('user_id', $_SESSION['user_id']);
        $result = $this->db->update($this->_vimg_membership,$membership_info);
        if ($result > 0){
            return $result;
        } 
    }

    public function view_my_profile($user_id){
        return $this->db->get_where($this->_vimg_membership, array('user_id'=> $user_id))->row_array();
    }

    public function get_membersinfo_accto_session_id()
    {
        $this->db->select('membership_id,name,mobile,email,present_address');      
        return $this->db->get_where($this->_vimg_membership, array('user_id'=>$_SESSION['user_id']))->row_array();

    }


    public function view_members_informatoin(){
        // return $this->db->get_wher($this->_vimg_membership)->result_array();
        return $this->db->get_where($this->_vimg_membership, array('membership_status' => "Approved",'user_id'=> $_SESSION['user_id'] ))->row_array();
         // return $this->db->insert_id();
         
     }


    public function view_members_informatoins(){
        // return $this->db->get_wher($this->_vimg_membership)->result_array();
        return $this->db->get_where($this->_vimg_membership, array('user_id'=> $_SESSION['user_id'] ))->row_array();
         // return $this->db->insert_id();
         
     }

}