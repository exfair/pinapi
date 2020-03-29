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
                    "proxies_id"     => $this->input->post("proxies_id"),
                    "session_id"     => $this->input->post("session_id"),
                    "username"       => $this->input->post("username"),
                    "totalpin"       => $this->input->post("totalpin")
                    
                ),
                    "account"
            );

            // TODO Alert sistemi eklenecek...
            if($insert){

               redirect(base_url("hesap"));

            } else {

              redirect(base_url("hesap"));

            }

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "ekle";
            $viewData->form_error = true;

           // $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        
        
    }
}
