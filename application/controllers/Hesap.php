<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hesap extends CI_Controller {
  public $viewFolder="";
  
  public function __construct() {
      
      parent::__construct();
      $this->viewFolder = "hesap";
      $this->load->model("main_model");
  }

    public function index()
	{
  
        $viewData = new stdClass();
           

        $items =  $this->main_model->get_all(
                 array(), "id ASC" ,"account"

        );
        
        $viewData->viewFolder = $this->viewFolder;
        $viewData->items = $items;
       
        $viewData->subViewFolder = "liste";
        $this->load->view("hesap/liste/index", $viewData);
        
        
	}
     public function new_form(){

        $viewData = new stdClass();
        $proxies =  $this->main_model->getAvailableProxies();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "ekle";
        $viewData->proxies = $proxies;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }
     
      public function delete($id){

        $delete = $this->main_model->delete(
            array(
                "id"    => $id
            ),
           "account"
        );

        // TODO Alert Sistemi Eklenecek...
        if($delete){
            redirect(base_url("hesap"));
        } else {
            redirect(base_url("hesap"));
        }

    }
    public function save(){
       
            $insert = $this->main_model->add(
                array(
                    "proxy_id"     => $this->input->post("proxy"),
                    "session_id"     => $this->input->post("session_id"),
                    "username"       => $this->input->post("username"),
                    "totalpin"       => 0
                    
                ),
                    "account"
            );

            // TODO Alert sistemi eklenecek...
            if($insert){

               redirect(base_url("hesap"));

            } else {

              redirect(base_url("hesap"));

            }
    }
    public function selected(){
       
        $limit = $_POST["limit"];

        foreach($_POST as $key=>$p){
            if(strpos($key, "selected") !== false){
                $account_id = str_replace("selected-","",$key);
                
                $url = 'http://localhost/auto/index.php';
                $curl = curl_init();
        
                $post['limit'] = $limit;
                $post['account_id'] = $account_id;
                /*$post['session_token'] = "TWc9PSZodWQzMUdwczYxdW1pM1BqNjlFZHF6VzEyTVVBS1JLc3NJRWRLNlNRL094OFoyL0FZZ0d6OFgxeGVCT0FmcmZsMU9wSTZKelErS1E0QmFEd2RMRWdsWnZLOG9lY0F4cFQ1QVp2THlCKzhubnlGcEF3ZlpxUzR6N1NEY2xjZ1pHSEJuOTlCbDJrblhTUGJSUEpOVXNuNDcvOGt1cjFPVmNJbmpDWld6aWdXK0tLK25XMDJwWENvcmlKd3VycHNURmI3bGQwdXRSZHJha1RZUXhRRlZmWVA1Y3Vmc2NqbytOWlJabVRpTVJLSWxoK1hUUDQ2VkFUTGUwNEFsQ3JiKzR4VEEzcnp6SW9PeWEwa2lIMFVsRWM3NUJYWm1YSDhYVzV2UXlmaEg1R0N2dHB4NDlVeXBMMmQrK2c1dHpKUXFtdFVKZ2g4ZXB6QVRWd1lhTFJrMVF3YlRUbkhYNFVSRW1rajRBNUk2dFo5WkpaNXhGR1VyOTlVTnoxOFVzTWdrcVIyb0VLRXhqVGM1STRwRWtQQzE0NEEvN2lXL3pKOHcxa2xVUHIvK3hXdDhWL0lmZVJmTnlpbm0wY1R1elpveGd6WlB1eVZvYVIvSm1xeUpUdHpLc3dlZWJYWktFRGJHQ2pIS3JXbThnNXlwMVpRcTVFWDNIMUdvNGtRS0MwZGg5dmIvZ0NKU1VxVjJTVVpPN3pxck9zZ1ZydHBzTnBNNnRxOUlvZllreTNOZUNpdEd5SFFRN0laamlVRkhvbkkyelhoUmMyVWVPZ0VobVdUTFZaZHY3L2xabkJPV0ZYblF1QUdVUDNLWnl5K1BjeTNzMmxEZkd5NU9LdzQ2NDY0K1FrT2pmc29YZ3dhNHc0c0dMUUtlV0ZXeU1BT0lLa3dGOUlSVVhCM1M2TzYxTG41VWZNaCtNTUhPUzVLUDZtZDhHUWwvZ0VpUU0rZ3hGenNqNFBoOHR0b0ZaNk9OVHdmaEYwN09icU5wblgwQnU2RVRacGt4anBXZ09DeFdmeVJrUDdyK2tYTENmeCs0bXR6OVp2cVFFT2JrOWJRTHBibkNZZlA3ZmtZbnYxWGJrTE93YXByVjQ3alh5ekYzU2MvUTJjJnNLR2x4NE1qd01iSzg2aHhEdTRSMlc4cDg2UT0===";
                $post['proxy'] = "185.33.85.170:45785";*/
        
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt ($curl, CURLOPT_POST, TRUE);
                curl_setopt ($curl, CURLOPT_POSTFIELDS, $post); 
            
                curl_setopt($curl, CURLOPT_USERAGENT, 'api');
            
                curl_setopt($curl, CURLOPT_TIMEOUT, 1); 
                curl_setopt($curl, CURLOPT_HEADER, 0);
                curl_setopt($curl,  CURLOPT_RETURNTRANSFER, false);
                curl_setopt($curl, CURLOPT_FORBID_REUSE, true);
                curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 1);
                curl_setopt($curl, CURLOPT_DNS_CACHE_TIMEOUT, 10); 
            
                curl_setopt($curl, CURLOPT_FRESH_CONNECT, true);
            
                curl_exec($curl);   
            
                curl_close($curl);

                echo $account_id." -> başlatıldı <br>";



            }

        }

        
    }
}
