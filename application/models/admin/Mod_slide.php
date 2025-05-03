<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class Mod_slide extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insert_slide($img_info) {
        $day = date("Y-m-d H:i:s");
        $slide_info = array(
            "slide_name" => $this->input->post('slidename'),
            "slide_date" => $day,
            "slide_text" => $this->input->post('slide_text'),
            "slide_status" => $this->input->post('slide_status'),
            "slide_image" => $img_info
        );
        
       // echo "<pre>";
       // print_r ($slide_info); exit();
        $result = $this->db->insert('vimg_slide', $slide_info);
        if ($result > 0) {
            return $result;
        }
    }

    public function view_slide() {
        $slide_query = $this->db->get_where('vimg_slide', array('slide_status' => 1));
        $slide_result = $slide_query->result_array();
        return $slide_result;
    }

    public function view_inactiveslide() { // model for home page slide
        $slide_query = $this->db->get_where('vimg_slide', array('slide_status' => 0));
        $slide_result = $slide_query->result_array();

        return $slide_result;
    }

    public function view_hslide() { // model for home page slide
        $slide_query = $this->db->get_where('vimg_slide', array('slide_status' => 1));
        $slide_result = $slide_query->result_array();

        return $slide_result;
    }

    public function edit_slide($slide_id) {
        $slide_query = $this->db->get_where('vimg_slide', array('slide_id' => $slide_id));
        $slide_result = $slide_query->result_array();
//        echo "<pre>";
//        print_r ($slide_result); exit();              
        return $slide_result;
    }

    public function update_slide($nemu_id, $img_info) {
        $day = date("Y-m-d H:i:s");
        if (empty($img_info)) {
            $slide_info = array(
                "slide_name" => $this->input->post('slidename'),
                "slide_date" => $day,
                "slide_text" => $this->input->post('slide_text'),
                "slide_status" => $this->input->post('slide_status')
            );
        } else {

            $slide_info = array(
                "slide_name" => $this->input->post('slidename'),
                "slide_date" => $day,
                "slide_text" => $this->input->post('slide_text'),
                "slide_status" => $this->input->post('slide_status'),
                "slide_image" => $img_info
            );
        }

        $this->db->where('slide_id', $nemu_id);
        $result = $this->db->update('vimg_slide', $slide_info);

        if ($result > 0) {
            return $result;
        }
    }

    public function deleteslide($id){
        $this->db->where('slide_id', $id);
        $result = $this->db->delete('vimg_slide');

        if ($result > 0) {
            return $result;
        }
    }
}