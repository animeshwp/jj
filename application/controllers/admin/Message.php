<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


class Message extends MY_Controller {

    public function __Construct() {
        parent::__construct();
//        $data['username'] = $this->session->userdata('username');  // logged in userdata  
        
         $this->load->model('admin/mod_links');
        $data['links_info'] = $this->mod_links->view_hlinks(); 
        

        $this->load->model('admin/mod_message', 'mod_message');
        
    }

    public function index() {
        $data['username'] = $this->session->userdata('username');
//        $this->load->view('v_users', array('error' => ' '));
        $data['title'] = "Add New Messege";
        $this->load->view('message/v_message', $data);
    }

    Public function do_upload() {
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation');

        // form validation check   
        $this->form_validation->set_rules('messagename', 'message Name', 'required');

        // image informatio upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->do_upload();
        if (!$this->form_validation->run()) {
            redirect(base_url('admin/message'));
        } else {
            $img_data = $this->upload->data();
            $file_name = $img_data['file_name'];
            
            $query = $this->mod_message->insert_message($file_name);
//            print_r($file_name); exit;
            if ($query == 1) {
                redirect(base_url('admin/message/messagelists'));
            }
        }
    }

    public function messagelists() {
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The message";


        $this->load->Model('mod_message');
        $data['message_content'] = $this->mod_message->view_message();
        $this->load->view('message/v_messagelists', $data);
    }

    public function editmessage($id) {

        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Edit message";

        $message_info = (int)$id;
        $this->load->Model('mod_message');
        $data['message_content'] = $this->mod_message->edit_message($message_info);
//        print_r($data); exit;
        $this->load->view('message/v_messageedit', $data);
    }

    public function updatemessage() { //update_message
        $this->load->library('form_validation');
        $data['title'] = "List of The message";
        $data['username'] = $this->session->userdata('username');
        $message_info = $this->security->xss_clean($this->input->post('hidd_id'));

        // image informatio upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->do_upload();


        // form validation check   
        $this->form_validation->set_rules('messagename', 'message Name', 'required');

        if ($this->form_validation->run() == False) {
            redirect(base_url('admin/message/editmessage/?page_id=' . $message_info));
        } else {
            $img_data = $this->upload->data();
            $file_name = $img_data['file_name'];

            $result = $this->mod_message->update_message($message_info, $file_name);

            if ($result) {
                redirect(base_url('admin/message/messagelists'));
            }
        }
    }

    public function inactivemessageLists() {
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The message";
 
        $data['inactivemessage_content'] = $this->mod_message->view_inactivemessage();
//        echo "<pre>";
//        print_r($data); exit;
        $this->load->view('message/v_messageinactivelists', $data);
    }

    public function delete_message($id){

        $query = $this->mod_message->m_delte_message($id);
//        echo "<pre>";
//        print_r($data); exit;
        if ($query == 1) {
                redirect(base_url('admin/message/messagelists'));
            }


    }

}