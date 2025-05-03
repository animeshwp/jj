<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Membership extends CI_Controller
{

    public function __Construct()
    {
        parent::__construct();

        $this->load->model('admin/mod_membership', 'mod_membership');
        $this->load->model('home/mod_users', 'mod_users');
        $this->load->model('api_model');
        $this->load->Model('home/mod_members', 'mod_members');
    }

    public function index()
    {
        //$data['username'] = $this->session->userdata('username');

        $this->load->view('home/header');
        $this->load->view('membership/v_membership');
        $this->load->view('home/footer');
    }

    public function apply()
    {


       
        $this->load->library('form_validation');
        // $data['username'] = $this->session->userdata('username');

        // form validation check   
        //$this->form_validation->set_rules('membership_name', 'membership member Name', 'required');

        $this->form_validation->set_rules('membership_id', 'Membership Number', 'required|is_unique[vimg_membership.membership_id]',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('admission_date', 'admission_date', 'required',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('name', 'name', 'required',  array('required' => "Please fill up the field"));
        // $this->form_validation->set_rules('userfile', 'userfile', 'required',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('type_of_membership', 'type_of_membership', 'required',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('father_husband_name', 'father_husband_name', 'required',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('mother_name', 'membership_no', 'required',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('date_of_birth', 'date_of_birth', 'required',  array('required' => "Please fill up the field"));

        $this->form_validation->set_rules('service_type', 'service_type', 'required',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('latest_designation', 'latest_designation', 'required',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('present_posting', 'present_posting', 'required',  array('required' => "Please fill up the field"));

        $this->form_validation->set_rules('present_address', 'present_address', 'required',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('permanent_address', 'permanent_address', 'required',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|is_unique[vimg_membership.mobile]',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[vimg_users.email]',  array('required' => "Please fill up the field"));


        $this->form_validation->set_rules('nid', 'NID', 'required|is_unique[vimg_membership.nid]',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('religion', 'religion', 'required',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('blood_group', 'blood_group', 'required',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('name_of_the_degree', 'name_of_the_degree', 'required',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('passing_year', 'passing_year', 'required',  array('required' => "Please fill up the field"));

        $this->form_validation->set_rules('name_of_university', 'name_of_university', 'required',  array('required' => "Please fill up the field"));

        $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[5]|max_length[12]|is_unique[vimg_users.username]',  array('required' => "Please set username correctly"));
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]',  array('required' => "Please set password correctly"));


        // image informatio upload
        $config['upload_path'] = './uploads/membership/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '5000';
        $config['encrypt_name'] = TRUE;


        $this->load->library('upload', $config);
        $yes_upload = $this->upload->do_upload('userfile');
        $img_data = $this->upload->data();

        // var_dump($yes_upload); exit();


        if (!$this->form_validation->run() || $yes_upload == FALSE) {

            $data['image_error'] = $this->upload->display_errors();
            $this->load->view('home/header');
            $this->load->view('membership/v_membership', $data);
            $this->load->view('home/footer');

        } else {      

            // var_dump($img_data['file_name']); exit;
            $file_name = $img_data['file_name'];
            $insert_id = $this->mod_users->insert_user();
            $query = $this->mod_membership->insert_membership($file_name, $insert_id);

            if ($query > 0) {

                $data_success['message'] = "Your Membership Account is Created Successfully. Thank You!";
                $this->session->set_userdata($data_success);

                $this->load->view('home/header');   
                $this->load->view('membership/v_membership_success');
                $this->load->view('home/footer');

                $user_data = $this->mod_users->login_info();

        
            if($user_data['login_validation']== FALSE ){

                redirect(base_url("users/login"));
            }else{
                    $session_data = array(
                        'name'  => $user_data['name'],
                        'user_id'  => $user_data['user_id'],
                        'username'  => $user_data['username'],
                        'password'     => $user_data['password'],
                        'logged_info' => TRUE
                   );
                    $this->session->set_userdata($session_data);
                    redirect(base_url('users/my_account'));

                }
            }else{
                $this->load->view('home/header');
                $this->load->view('membership/v_membership');
                $this->load->view('home/footer');
            }
        }
    }

    public function membership_list()
    {
        $data['username'] = $this->session->userdata('username');

        $this->load->Model('mod_membership');
        $data['membership_content'] = $this->mod_membership->view_membership();
        $this->load->view('membership/v_membership_list', $data);
    }

    public function edit_membership()
    {

        $user_id = $this->session->userdata('user_id');
        $this->load->Model('mod_membership');
        $data['membership_content'] = $this->mod_membership->edit_membership($user_id);

        $this->load->view('home/header');
        $this->load->view('membership/v_edit_membership', $data);
        $this->load->view('home/footer');
    }

    public function update_membership()
    { 
    //update_membership

        // echo "<pre>";

        //  print_r($_POST); exit();


        $this->load->library('form_validation');

        $user_id = $this->input->post('user_id');

        // image informatio upload
        $config['upload_path'] = './uploads/membership/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '5000';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $yes_upload = $this->upload->do_upload('userfile');


        // form validation check   
        $this->form_validation->set_rules('membership_id', 'Membership Number', 'required',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('admission_date', 'admission_date', 'required',  array('required' => "Please fill up the field"));

        $this->form_validation->set_rules('name', 'name', 'required',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('type_of_membership', 'type_of_membership', 'required',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('father_husband_name', 'father_husband_name', 'required',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('mother_name', 'Mother\'s Name', 'required',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('date_of_birth', 'date_of_birth', 'required',  array('required' => "Please fill up the field"));

        $this->form_validation->set_rules('service_type', 'service_type', 'required',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('latest_designation', 'latest_designation', 'required',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('present_posting', 'present_posting', 'required',  array('required' => "Please fill up the field"));

        $this->form_validation->set_rules('present_address', 'present_address', 'required',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('permanent_address', 'permanent_address', 'required',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('mobile', 'mobile', 'required',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('email', 'email', 'required',  array('required' => "Please fill up the field"));

        $this->form_validation->set_rules('nid', 'nid', 'required',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('religion', 'religion', 'required',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('blood_group', 'blood_group', 'required',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('name_of_the_degree', 'name_of_the_degree', 'required',  array('required' => "Please fill up the field"));
        $this->form_validation->set_rules('passing_year', 'passing_year', 'required',  array('required' => "Please fill up the field"));

        $this->form_validation->set_rules('name_of_university', 'name_of_university', 'required',  array('required' => "Please fill up the field"));



        if ($this->form_validation->run() == False) {
            redirect(base_url('membership/edit_membership/' . $user_id));
        } else {
            $img_data = $this->upload->data();
            $file_name = $img_data['file_name'];

            $result = $this->mod_membership->update_membership($file_name);

            if ($result) {
                redirect(base_url('users/my_profile'));
            }
        }
    }

    public function change_membership_status($user_id)
    {
        $this->load->helper(array('form', 'html', 'url'));
        $this->load->library('form_validation');

        $data['pass_change_success'] = "";
        $data['user_id'] = $user_id;

        $this->form_validation->set_rules('membership_status', 'new_password', 'required', array('required' => " এই ফিল্ডটি পূরণ করুন"));
        $data['membership_content'] = $this->mod_membership->edit_membership($user_id);

        if (!$this->form_validation->run()) {
            $this->load->view('membership/v_change_membership_status', $data);
        } else {

            $query = $this->mod_membership->update_membership_status($user_id);

            if ($query == 1) {
                $data_success['pass_change_success'] = "Membership status changed successfully.";
                $this->session->set_userdata($data_success);

                redirect(base_url('membership/membership_list'));
            }
        }
    }

    public function save_ipn()
    {
        $this->db->insert('ipn_response');
    }
}