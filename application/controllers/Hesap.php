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
           
        $items = array(
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/index", $viewData);
	}
}
