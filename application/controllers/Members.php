<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
 * Project Name : Alumni Management System
 * Project Description :  Alumni Management System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */
class Members extends CI_Controller
{
	
	public function __Construct(){
        parent::__construct();

	$this->load->model('home/mod_widget', 'mod_widget');
        $this->load->model('home/mod_links', 'mod_links');
        $this->load->model('home/mod_menu', 'mod_menu');
        $this->load->model('home/mod_members', 'mod_members');
        $this->load->Model('home/mod_submenu', 'mod_submenu');
        $this->load->Model('home/mod_publications', 'mod_publications');
        $this->load->Model('home/mod_page', 'mod_page');
        $this->load->model('home/mod_opportunities', 'mod_opportunities');
        $this->load->model('home/mod_pgdresult', 'mod_pgdresult');
        $data['title'] = "Institute of Education Research Alumni Association (IERAA)";
        $this->load->model('admin/Mod_registration', 'Mod_registration');
	}


	public function index()	
        {

        	$data['title'] = "Institute of Education Research Alumni Association (IERAA)";
                $this->load->model('home/mod_menu');
                $data['menu_content'] = $this->mod_menu->view_hmenu();
                $data['leftmenu_content'] = $this->mod_menu->view_hmenu_left();
                
                // view on submenu
                $this->load->Model('home/mod_submenu');
                $data['submenu_content'] = $this->mod_submenu->view_hsubmenu();
                
                // slide view on home page
                $this->load->model('home/mod_slide');
                $data['slide_info'] = $this->mod_slide->view_hslide();          
                       
                
                // weblists view on home page        
                $this->load->model('home/mod_links');
                $data['links_info'] = $this->mod_links->view_hlinks(); 
                
                // welcome messege 

                // $this->load->model('home/mod_message');
                // $data['wmessege_info'] = $this->mod_message->view_hmessage();
                
                 // widgets 
                $this->load->model('home/mod_widget');
                $data['widget_info'] = $this->mod_widget->view_hwidget(); 
                $data['box_info'] = $this->mod_widget->view_new_widget(); 

        //        echo "<pre>";
        //        print_r($data); exit;\
                
                 // News 
                $this->load->model('home/mod_news');
                $data['news_info'] = $this->mod_news->view_hnews(); 
        //        echo "<pre>";
        //        print_r($data); exit;
                $this->load->model('home/mod_message');
                $data['wmessege_info'] = $this->mod_message->view_hmessage();
                 // News 
                $this->load->model('home/mod_news');
                $data['news_info'] = $this->mod_news->view_hnews(); 
        //        echo "<pre>";

                $this->load->model('home/mod_events');
                $data['events_info'] = $this->mod_events->view_hevents(); 
               // echo "<pre>";
               // print_r($datas); exit;

               
                $data['menu_content'] = $this->mod_menu->view_hmenu();
                $data['members'] = $this->mod_members->memberlist();

                // view on submenu        
                $this->load->view('templates/default/common/header', $data);
                $this->load->view('templates/default/members/index', $data);
                $this->load->view('templates/default/common/footer', $data);
	}


        public function apply()
        {
                $data['title'] = "Institute of Education Research Alumni Association (IERAA)";
                $this->load->model('home/mod_menu');
                $data['menu_content'] = $this->mod_menu->view_hmenu();
                $data['leftmenu_content'] = $this->mod_menu->view_hmenu_left();
                
                // view on submenu
                $this->load->Model('home/mod_submenu');
                $data['submenu_content'] = $this->mod_submenu->view_hsubmenu();
                
                // slide view on home page
                $this->load->model('home/mod_slide');
                $data['slide_info'] = $this->mod_slide->view_hslide();          
                       
                
                // weblists view on home page        
                $this->load->model('home/mod_links');
                $data['links_info'] = $this->mod_links->view_hlinks(); 
                
                // welcome messege 

                // $this->load->model('home/mod_message');
                // $data['wmessege_info'] = $this->mod_message->view_hmessage();
                
                 // widgets 
                $this->load->model('home/mod_widget');
                $data['widget_info'] = $this->mod_widget->view_hwidget(); 
                $data['box_info'] = $this->mod_widget->view_new_widget(); 

        //        echo "<pre>";
        //        print_r($data); exit;\
                
                 // News 
                $this->load->model('home/mod_news');
                $data['news_info'] = $this->mod_news->view_hnews(); 
        //        echo "<pre>";
        //        print_r($data); exit;
                $this->load->model('home/mod_message');
                $data['wmessege_info'] = $this->mod_message->view_hmessage();
                 // News 
                $this->load->model('home/mod_news');
                $data['news_info'] = $this->mod_news->view_hnews(); 
        //        echo "<pre>";

                $this->load->model('home/mod_events');
                $data['events_info'] = $this->mod_events->view_hevents(); 
               // echo "<pre>";
               // print_r($datas); exit;

               
                $data['menu_content'] = $this->mod_menu->view_hmenu();
                $data['members'] = $this->mod_members->memberlist();

                
                

                $this->load->library('form_validation'); 

                // form validation check   
                $this->form_validation->set_rules('data[fullname]', 'fullname', 'required', array('required'=>"Name is Empty!"));
                // $this->form_validation->set_rules('data[alumni_regno]', 'Alumni\'s ID', 'required', array('required'=>"Alumni ID is Empty!"));
                // $this->form_validation->set_rules('data[batch]', 'batch', 'required', array('required'=>"Select Batch!"));
                // $this->form_validation->set_rules('data[passingyear]', 'passingyear', 'required', array('required'=>"Select Passing Year!"));
                // $this->form_validation->set_rules('data[address]', 'address', 'required', array('required'=>"Add your Address!"));
                $this->form_validation->set_rules('data[mobileno]', 'mobileno', 'required', array('required'=>"Add Mobile Number!"));
                // $this->form_validation->set_rules('data[workingstation]', 'workingstation', 'required', array('required'=>"Add your Work Station!"));
                $this->form_validation->set_rules('data[email]', 'email', 'required', array('required'=>"Email is Empty!"));
                $this->form_validation->set_rules('data[password]', 'password', 'required', array('required'=>"Password Field is Empty!"));
                $this->form_validation->set_rules('data[conf_password]', 'Confirm Password', 'required|matches[data[password]]', array('required'=>"Password is Empty!"));
                
                
                if (!$this->form_validation->run()) {

                    // view on submenu        
                        $this->load->view('templates/default/common/header', $data);
                        $this->load->view('templates/default/members/apply', $data);
                        $this->load->view('templates/default/common/footer', $data);
                        // print_r($_POST); 

                } else {  

                    //smart_sector
                    $data = $this->input->post('data', TRUE);  
                    $data['password'] = md5($data['password']);
                    unset($data['conf_password']);
   
                //     print_r($data); exit;
                      
                    $insert = $this->Mod_registration->save_alumni_data($data);
                //     $insert = $this->Mod_registration->save_alumni_data($data);
                    
                    if(!empty($insert))
                    {
                        $message['message'] = "Registration Successfully Completed!";
                        $this->session->set_userdata($message);
                        redirect(base_url('admin/registration'));   

                    } else {
                        
                        $errormessage['errormessage'] = "Not Completed! Please try again.";
                        $this->session->set_userdata($errormessage);
                        redirect(base_url('admin/registration'));
                    }              
                    
                }

        }

        public function myevents()
        {
                echo "string";
        }
}