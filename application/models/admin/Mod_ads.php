<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_ads extends CI_Model{
    
    private $_jj_ads = "jj_ads";
    
    
    public function __construct() {
        parent::__construct();
    }  
    
    public function save($data){
        $data['created_at'] = date("Y-m-d H:i:s");
        $result = $this->db->insert($this->_jj_ads, $data);
        return $this->db->insert_id();
    }
    
    public function view_ads(){
        return $this->db->get($this->_jj_ads)->result();        

    }

    public function get_loc_name($id){
        return $this->db->get_where($this->_jj_ads, array("id"=> $id))->row()->pos;
    }

}