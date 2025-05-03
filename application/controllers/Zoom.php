<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class Zoom extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
       
    }
    
    public function index(){


        $apiKey = "TTW1G24SbWhSParcaiFMg";
        $apiSecret = "Wh15m3YDdVif9qFKILTVC4CeTn7n4Hgs";

        $payload = array(
            "topic" => "Test Meeting",
            "type" => 2,  // 2 = Scheduled Meeting
            "start_time" => "2025-03-20T10:00:00Z",
            "duration" => 30,
            "timezone" => "UTC",
            "agenda" => "Test Zoom Integration",
            "settings" => array(
                "host_video" => true,
                "participant_video" => true,
                "mute_upon_entry" => true
            )
        );

        $jwt = base64_encode(json_encode(["alg" => "HS256", "typ" => "JWT"])) . "." .
               base64_encode(json_encode(["iss" => $apiKey, "exp" => time() + 3600])) . "." .
               base64_encode(hash_hmac("sha256", "header.payload", $apiSecret, true));

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.zoom.us/v2/users/me/meetings");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $jwt",
            "Content-Type: application/json"
        ));

        $response = curl_exec($ch);
        curl_close($ch);
        echo $response;
         


        
    }
    
}