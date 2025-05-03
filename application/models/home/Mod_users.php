<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_users extends CI_Model {

    private $_vimg_fees = "vimg_fees";

    function __construct() {
        parent::__construct();
    }
    
    function insert_user(){
        $day = date("Y-m-d H:i:s");
        $user_info = array(
            "name"      => $this->input->post('name'),
            "email"     => $this->input->post('email'),
            "username"     => $this->input->post('username'),
            "password"  => md5($this->input->post('password'))        
        );

        $this->db->insert('vimg_users',$user_info);
        $insert_id = $this->db->insert_id();
        if ($insert_id > 0){
            return $insert_id;
        }
    }

    function login_info()
    {

       $user_check = $this->db->get_where('vimg_users', 
            array( 
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password'))
        ));

       if ($user_check->num_rows() > 0){ 
            $rec = $user_check->row_array();
            $user_info = array( 
                'user_id' => $rec['user_id'],
                'username' => $rec['username'],
                'password' => $rec['password'],
                'login_validation' => TRUE
            );
       }else{
           return FALSE;
       }

       return $user_info;
    }

    function edit_user($user_id){
        $user_query = $this->db->get_where('vimg_users', array('user_id' => $user_id) );       
        $user_query = $user_query->result_array();                         
        return $user_query;
    }


    public function update_password($user_id)
    {

        $password_info = array(
            "password"      => md5($this->input->post('new_password'))
        );

        $this->db->where('user_id', $user_id);
        $result = $this->db->update('vimg_users', $password_info);
        if ($result > 0){
            return $result;
        }

   }

    function view_users(){
        $user_query = $this->db->get_where('vimg_users', array('status' => 1));       
        $user_result = $user_query->result_array();           
        return $user_result;
    }

 


}
