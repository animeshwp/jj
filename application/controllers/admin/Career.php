<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */

class Career extends MY_Controller
{
    public function __Construct()
    {
        parent::__construct();
        $this->load->model('admin/mod_career', 'mod_career');
    }

    public function index()
    {
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Add New career";
        $this->load->view('templates/admin/career/v_career', $data);
    }

    public function saveit()
    {
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Add New career";
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation');

        // form validation check   
        $this->form_validation->set_rules('careername', 'Job Title', 'required');
        $this->form_validation->set_rules('careerdate', 'Date', 'required');
        $this->form_validation->set_rules('jobtype', 'Organiztion Name', 'required');

        // image informatio upload
//        $config['upload_path'] = './uploads/';
//        $config['allowed_types'] = '*';
//        $config['max_size'] = '10000';

//        $this->load->library('upload', $config);
//        $yes_upload = $this->upload->do_upload('userfile');

        if (!$this->form_validation->run()) {

            $this->load->view('templates/admin/career/v_career', $data);

//        } elseif (!$yes_upload) {
//
//            $this->load->view('templates/admin/career/v_career', $data);

        } else {

//            $img_data =  $this->upload->data($yes_upload);
//            $file_name = $img_data['file_name'];

            $query = $this->mod_career->insert_career();

            if ($query == 1) {

                redirect(base_url('admin/career/careerlists'));
            }
        }
    }


    public function careerlists()
    {

        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The career";

        $data['career_content'] = $this->mod_career->view_career();
        $this->load->view('templates/admin/career/v_careerlists', $data);
    }

    public function editcareer($id)
    {
        $id = (int)$id;
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Edit career";
        $data['career_content'] = $this->mod_career->edit_career($id);
        $this->load->view('templates/admin/career/v_careeredit', $data);
    }


    public function updatecareer($id)
    { 
   
 
        $career_info =  (int)$id;
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Edit career";
        
        $this->load->library('form_validation');

        // form validation check   
        $this->form_validation->set_rules('careername', 'Job Title', 'required');
        $this->form_validation->set_rules('careerdate', 'Date', 'required');
        $this->form_validation->set_rules('jobtype', 'Organiztion Name', 'required');

       

        // image informatio upload
//        $config['upload_path'] = './uploads/';
//        $config['allowed_types'] = '*';
//        $config['max_size'] = '2000';
//        $config['encrypt_name'] = TRUE;
//
//        $this->load->library('upload', $config);
//        $yes_upload = $this->upload->do_upload();

        if ($this->form_validation->run() == False) {

            $data['career_content'] = $this->mod_career->edit_career($id);
        $this->load->view('templates/admin/career/v_careeredit', $data);

        } else {

//            $img_data =  $this->upload->data();
//            $file_name = $img_data['file_name'];
            $result = $this->mod_career->update_career($career_info);

            if ($result) {

                redirect(base_url('admin/career/careerlists'));

            }
        }
    }

    public function inactivecareerLists()
    {
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The career";

        $this->load->Model('mod_career');
        $data['inactivecareer_content'] = $this->mod_career->view_inactivecareer();
        $this->load->view('templates/admin/career/v_careerinactivelists', $data);
    }


    public function deletecareer($id)
    {
        $career_id = (int)$id;

        $this->mod_career->delete_career($career_id);
        $this->careerlists('refresh');
    }

    //    public function deletecareer(){
    //        
    //    }
}