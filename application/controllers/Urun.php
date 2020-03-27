<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Urun extends CI_Controller {
  public $viewFolder="";
  public function __construct() {
      
      parent::__construct();
      $this->viewFolder = "urun";
      $this->load->model("main_model");
  }
	function _remap($param) {
		$this->index($param);
	}

    public function index($param)
	{

        $viewData = new stdClass();

		$product = $this->main_model->get(
            array("url" => $param), "products"
        );
        
        $items = array(
            "product" => $product,
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/index",$viewData);
	}
}
