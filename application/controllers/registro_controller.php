<?php
class registro_controller extends CI_Controller{
	
public function __construct(){
    parent::__construct();
    $this->load->model('login_model');
	//para poder ir de un controlador a otro facilmente
    $this->load->helper('url_helper');
}
	
public function index(){
	$this->load->view("includes/header");
	$this->load->view("registro_view");
	$this->load->view("includes/footer");
}
}
?>