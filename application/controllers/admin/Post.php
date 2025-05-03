<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');




class Post extends CI_Controller{
    function   __construct() {
        parent::__construct();
    }
    
    function index(){
        $data['contents'] = "Insert a Post";
        $this->load->view('post', $data);
        
    }

    function success(){
        $this->load->model('mod_post');
        $query = $this->mod_post->post_insert();
    }
    
    
    public function mytest(){
        
        
        
//function myFunction($zx){
    
$a = array('a','b','c','d','a','b','c','d');



$b = array(
    
    'a'=>1,    
    'd' => 3,
    'e' =>1 ,
    'f' => 4
);

//print_r($b);
echo "<ul>";

foreach ($b as $key=>$value) { 
    
//    if($key == ){}

echo "<li>". $key. "         ". $value. "</li>";
}?>


</ul>
<?php
    }
}

