<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Welcome extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('home/Mod_addimageinfo', 'Mod_addimageinfo');
        $this->load->model('home/Mod_options', 'Mod_options');     
        
    }

	public function index()
	{
		$data['menu']=$this->Mod_options->getdata();
		$this->load->view('templates/front/site/index', $data);
	}
}
