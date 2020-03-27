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
           

        $items =  $this->main_model->get_all(
            array(), "id ASC" ,"proxies"        
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->items = $items;
        $viewData->subViewFolder = "liste";
        $this->load->view("proxy/liste/index", $viewData);
        
        
	}
         public function new_form(){

        $viewData = new stdClass();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "liste";

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
}
