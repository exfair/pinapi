<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proxy extends CI_Controller {
  public $viewFolder="";
  
  public function __construct() {
      
      parent::__construct();
      $this->viewFolder = "proxy";
      $this->load->model("main_model");
  }

    public function index()
	{
  
        $viewData = new stdClass();
           

        $items =  $this->main_model->getAvailableProxies();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->items = $items;
        $viewData->subViewFolder = "liste";
        $this->load->view("proxy/liste/index", $viewData);
        
        
	}
     public function new_form(){

        $viewData = new stdClass();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "ekle";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }
     
      public function delete($id){

        $delete = $this->main_model->delete(
            array(
                "id"    => $id
            ),
           "proxies"
        );

        // TODO Alert Sistemi Eklenecek...
        if($delete){
            redirect(base_url("Proxy"));
        } else {
            redirect(base_url("Proxy"));
        }

    }
    public function save(){
        $tarih = $this->input->post("buydate");
        
        $tarih = new DateTime($tarih);
        $tarih->modify('+'.$this->input->post("proxylife").' day');
        
        $buydate =new DateTime( $this->input->post("buydate"));
        
        //echo $tarih;
        //echo $expire;
            $insert = $this->main_model->add(
                array(
                    "ip"         => $this->input->post("ip"),
                    "port"       => $this->input->post("port"),
                    "buyDate"    => $buydate->format('Y-m-d H:i:s'),
                    "expireDate" => $tarih->format('Y-m-d H:i:s')
                ),
                    "proxies"
            );

            // TODO Alert sistemi eklenecek...
            if($insert){

               redirect(base_url("proxy"));

            } else {

              redirect(base_url("proxy"));

            }

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "ekle";
            $viewData->form_error = true;

           // $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        
        
    }
}
