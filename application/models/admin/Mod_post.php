<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Mod_post extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function post_insert()
    {
        $now = date("Y-m-d H:i:s");
        $post_info = array(
            "title" => $this->input->post('title'),
            "body_text" => $this->input->post('body_text'),
            "post_time" => $now
        );
        echo "<pre>";
        print_r($post_info); //echo date('d-m-Y  T: H:i:s'); 
//        echo "<pre>";
//        echo $now;
        exit();

    }
}