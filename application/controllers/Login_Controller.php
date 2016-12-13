<?php
class Login_Controller extends CI_Controller{
//	
public function __construct(){
    parent::__construct();
    $this->load->model('login_model');
	//para poder ir de un controlador a otro facilmente
    $this->load->helper('url_helper');
}
//	
public function index(){
	$data["titulo"]="login";
	$this->load->view("includes/header",$data);
	$this->load->view("login_view");
	$this->load->view("includes/footer");
}
}
?>