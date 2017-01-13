<?php
class Partes extends CI_Controller{
	
	public function __construct(){
	    parent::__construct();
	    $this->load->helper('url_helper');
	}
	public function cargar($parte){
		$this->load->view($parte);
	}
}