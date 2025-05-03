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

        $this->load->model('admin/mod_widget', 'mod_widget');

    }

    public function index() {
        $data['username'] = $this->session->userdata('username');
//        $this->load->view('v_users', array('error' => ' '));
        $data['title'] = "Widget";
        $this->load->view('widget/v_widget', $data);
    }

    Public function do_upload() {
        $data['title'] = "Widget";
        $data['username'] = $this->session->userdata('username');
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation');

        // form validation check   
        $this->form_validation->set_rules('widgetname', 'widget Name', 'required');
        $this->form_validation->set_rules('page_loc', 'Page Location', 'required');

        // image informatio upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '2000';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->do_upload();

        if (!$this->form_validation->run()) {
            $this->load->view('widget/v_widget', $data);
        } else {
            $img_data = $this->upload->data();
            $file_name = $img_data['file_name'];
             
            $query = $this->mod_widget->insert_widget($file_name);
//            print_r($file_name); exit;
            if ($query == 1) {
                redirect(base_url('admin/widget/widgetlists'));
            }
        }
    }

    public function widgetlists() {
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The widget";

 
        $data['widget_content'] = $this->mod_widget->view_widget();
        $this->load->view('widget/v_widgetlists', $data);
    }

    public function editwidget($id) {

        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Edit widget";

        $widget_info = (int)$id;
       
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

        // image informatio upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '2000';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->do_upload();

        if ($this->form_validation->run() == False) {
            redirect(base_url('admin/widget/editwidget/?page_id=' . $widget_info));
        } else {
            $img_data = $this->upload->data();
            $file_name = $img_data['file_name'];
            $result = $this->mod_widget->update_widget($widget_info, $file_name);

            if ($result) {
                redirect(base_url('admin/widget/widgetlists'));
            }
        }
    }

    public function inactivewidgetLists() {
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The widget";
 
        $data['inactivewidget_content'] = $this->mod_widget->view_inactivewidget();
//        echo "<pre>";
//        print_r($data); exit;
        $this->load->view('widget/v_widgetinactivelists', $data);
    }

    public function deletewidget($id){
        $id = (int)$id;

        $result = $this->mod_widget->delete_widget($id);

            if ($result) {
                redirect(base_url('admin/widget/widgetlists'));
            }

    }


    public function widgets_new() {
        $data['username'] = $this->session->userdata('username');
//        $this->load->view('v_users', array('error' => ' '));
        $data['title'] = "Widget";
        $this->load->view('widget-new/v_widget', $data);
    }

    Public function savewidgets_new() {
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation');

        $data = $this->input->post('data', TRUE);

        // form validation check   
        $this->form_validation->set_rules('data[boxtitle]', 'widget Name', 'required');
        // image informatio upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '2000';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->do_upload('myiamge');

        if (!$this->form_validation->run()) {
            redirect(base_url('admin/widget/widgets_new'));
        } else {
            $img_data = $this->upload->data();
            $data['file_name'] = $img_data['file_name'];
             
            $query = $this->mod_widget->insert_widget_new($data);
        // print_r($_POST); // exit;
        //    print_r($file_name); exit;
            if ($query == 1) {
                redirect(base_url('admin/widget/new_widgetlists'));
            }
        }
    }

    public function new_widgetlists() {
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The widget";

 
        $data['widget_content'] = $this->mod_widget->view_new_widget();
        $this->load->view('widget-new/v_widgetlists', $data);
    }

    public function new_editwidget($id) {

        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Edit widget";

        $widget_info = (int)$id;
       
        $data['box_content'] = $this->mod_widget->edit_widget_new($widget_info);
//        print_r($data); exit;
        $this->load->view('widget-new/v_widgetedit', $data);
    }

    public function new_updatewidget() { //update_widget
        $this->load->library('form_validation');
        
        $widget_info = $this->security->xss_clean($this->input->post('hidd_id'));

        // form validation check   
        $this->form_validation->set_rules('data[boxtitle]', 'widget Name', 'required');

         $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '2000';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->do_upload('myiamge');




        if ($this->form_validation->run() == False) {
            redirect(base_url('admin/widget/new_editwidget/'.$widget_info));
        } else {

            $img_data = $this->upload->data();
            $file_name = $img_data['file_name'];

            // echo $file_name; exit;
           
            $result = $this->mod_widget->update_widget_new($widget_info, $file_name);

            if ($result) {
                redirect(base_url('admin/widget/new_widgetlists'));
            }
        }
    }

    public function new_inactivewidgetLists() {
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "List of The widget";
 
        $data['inactivewidget_content'] = $this->mod_widget->view_inactivewidget();
//        echo "<pre>";
//        print_r($data); exit;
        $this->load->view('widget-new/v_widgetinactivelists', $data);
    }

    public function new_deletewidget($id){
        $id = (int)$id;

        $result = $this->mod_widget->delete_box_widget($id);

            if ($result) {
                redirect(base_url('admin/widget/new_widgetlists'));
            }

    }

}