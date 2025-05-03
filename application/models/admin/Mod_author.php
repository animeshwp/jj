<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Mod_author extends CI_Model {        


    private $_jj_subcategory = "jj_subcategory";
    private $_jj_author = "jj_author";


    function __construct() {
        parent::__construct();
    }
    
    function save($data){
        $data['created_at'] = date("Y-m-d H:i:s");
        $result = $this->db->insert($this->_jj_author,$data);
        if ($result > 0){
            return $result;
        }
    }    


    public function view_author(){
        return $this->db->get($this->_jj_author)->result();
    }




    public function edit_author($id){
        return $this->db->get_where($this->_jj_author, array('id' => $id) )->row();                            
    
    }



    public function update_author($id, $data){
 
        $result = $this->db->update($this->_jj_author, $data, array('id' => $id ));
        if ($result > 0){
            return $result;
        }
    }
   
    
    public function authors(){
        // $this->db->select('title');
        return $this->db->get_where($this->_jj_author, array('status' => 1) )->result();
    } 
   

    public function authors_name_acc_to_id($id){
        $this->db->select('name');
        return $this->db->get_where($this->_jj_author, array('id' => $id) )->row();
    }


    public function category_info_acc_to_id($id){
        $this->db->select('title,slug');
        return $this->db->get_where($this->_jj_author, array('id' => $id) )->row();
    }
}