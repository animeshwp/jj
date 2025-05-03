<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Mod_careers extends CI_Model
{

    private $_vimg_carrers = "vimg_career";

    function __construct()
    {
        parent::__construct();
    }

    function insert_career($img_info)
    {
        $day = date("Y-m-d H:i:s");
        $career_info = array(
            "career_name"      => $this->input->post('careername'),
            // "career_sum"      =>  $this->input->post('career_text'),
            "career_date"      => $day,
            "career_text"      => $this->input->post('career_text'),
            "career_status"    => $this->input->post('career_status'),
            "career_image"     => $img_info
        );
        //        echo "<pre>";
        //        print_r ($career_info); exit();
        $result = $this->db->insert($this->_vimg_carrers, $career_info);
        if ($result > 0) {
            return $result;
        }
    }

    function view_career()
    {
        $this->db->order_by('career_date', 'desc');
        return $this->db->get_where($this->_vimg_carrers, array('career_status' => 1))->result();
    }

    function view_hcareer()
    { // model for home page career

        // $this->db->limit(5);

        $this->db->order_by('career_date', 'desc');
        //        $career_query = $this->db->get_where('vimg_career');
        $career_query = $this->db->get_where($this->_vimg_carrers, array('career_status' => 1));

        $career_result = $career_query->result();
        return $career_result;
    }

    function view_inactivecareer()
    { // model for home page career
        $inactivecareer_query = $this->db->get_where($this->_vimg_carrers, array('career_status' => 0));
        $inactivecareer_result = $inactivecareer_query->result_array();
        return $inactivecareer_result;
    }


    function edit_career($id)
    {
        $career_query = $this->db->get_where($this->_vimg_carrers, array('career_id' => $id));
        $career_result = $career_query->row_array();
        //        echo "<pre>";
        //        print_r ($career_result); exit();              
        return $career_result;
    }

    function detail_career($nemudetail_id)
    {
        $careerdetail_query = $this->db->get_where($this->_vimg_carrers, array('career_id' => $nemudetail_id));
        $careerdetail_result = $careerdetail_query->result_array();
        //        echo "<pre>";
        //        print_r ($careerdetail_result); exit();              
        return $careerdetail_result;
    }

    function update_career($nemu_id, $img_info)
    {
        if (empty($img_info)) {
            $career_info = array(
                "career_name"      => $this->input->post('careername'),
                // "career_sum"      =>  $this->input->post('career_text'),
                "career_text"      => $this->input->post('career_text'),
                "career_status"    => $this->input->post('career_status')
            );
        } else {
            $career_info = array(
                "career_name"      => $this->input->post('careername'),
                // "career_sum"      =>  $this->input->post('career_text'),
                //            "career_date"      => $day,
                "career_text"      => $this->input->post('career_text'),
                "career_status"    => $this->input->post('career_status'),
                "career_image"     => $img_info
            );
        }
        $this->db->where('career_id', $nemu_id);
        $result = $this->db->update($this->_vimg_carrers, $career_info);
        if ($result > 0) {
            return $result;
        }
    }


    public function delete_career($career_id)
    {
        $this->db->where('career_id', $career_id);
        $this->db->delete('vimg_career');
        return $this->db->affected_rows();
    }
}


// CREATE TABLE IF NOT EXISTS `vimg_career` (
//  `career_id` int(11) NOT NULL AUTO_INCREMENT,
//  `career_name` varchar(255) NOT NULL,
//  `career_date` datetime NOT NULL,
//  `career_text` text NOT NULL,
//  `career_status` tinyint(4) NOT NULL,
//  `career_image` varchar(100) NOT NULL,
//  PRIMARY KEY (`career_id`)
// ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;