<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */




class Widget extends MY_Controller {

    public function __Construct() {
        parent::__construct();

    }

    public function index() {
        $data['username'] = $this->session->userdata('username');
//        $this->load->view('v_users', array('error' => ' '));
        $data['title'] = "Widget";
        $this->load->view('widget/v_widget', $data);
    }

    Public function do_upload() {
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation');

        // form validation check   
        $this->form_validation->set_rules('widgetname', 'widget Name', 'required');

        // image informatio upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->do_upload();
        if (!$this->form_validation->run()) {
            redirect(base_url('widget'));
        } else {
            $img_data = $this->upload->data();
            $file_name = $img_data['file_name'];
            $this->load->model('mod_widget');
            $query = $this->mod_widget->insert_widget($file_name);
//            print_r($file_name); exit;
            if ($query == 1) {
                redirect(base_url('widget/widgetlists'));
            }
        }
    }

    public function widgetlists() {
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The widget";


        $this->load->Model('mod_widget');
        $data['widget_content'] = $this->mod_widget->view_widget();
        $this->load->view('widget/v_widgetlists', $data);
    }

    public function editwidget() {

        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Edit widget";

        $widget_info = $this->security->xss_clean($this->uri->segment(3));
        $this->load->Model('mod_widget');
        $data['widget_content'] = $this->mod_widget->edit_widget($widget_info);
//        print_r($data); exit;
        $this->load->view('widget/v_widgetedit', $data);
    }

    public function updatewidget() { //update_widget
        $this->load->library('form_validation');
        $data['title'] = "List of The widget";
        $data['username'] = $this->session->userdata('username');
        $widget_info = $this->security->xss_clean($this->input->post('hidd_id'));

        // form validation check   
        $this->form_validation->set_rules('widgetname', 'widget Name', 'required');

        if ($this->form_validation->run() == False) {
            redirect(base_url('widget/editwidget/?page_id=' . $widget_info));
        } else {
            $this->load->Model('mod_widget');
            $result = $this->mod_widget->update_widget($widget_info);

            if ($result) {
                redirect(base_url('widget/widgetlists'));
            }
        }
    }

    public function inactivewidgetLists() {
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The widget";


        $this->load->Model('mod_widget');
        $data['inactivewidget_content'] = $this->mod_widget->view_inactivewidget();
//        echo "<pre>";
//        print_r($data); exit;
        $this->load->view('widget/v_widgetinactivelists', $data);
    }

}

