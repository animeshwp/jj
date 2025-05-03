<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */



class Mod_registration extends CI_Model {

    private $_alumni = "tbl_alumnis";

    public function __construct() {
        parent::__construct();
    }


    
    public function save_alumni_data($data){
        $data['updated_at'] = date("Y-m-d H:i:s");
        
        $result = $this->db->insert($this->_alumni, $data);
        if ($result > 0){
            return $result;
        }
    }
    
    public function get_alumni_data(){

        return $this->db->get($this->_alumni)->result();
    }

    public function get_detail_alumni_data($id){   

        return $this->db->get_where($this->_alumni, array('alumni_id' => $id))->row();

    }

}