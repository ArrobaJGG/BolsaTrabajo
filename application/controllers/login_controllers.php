<?php
class login_controllers extends CI_Controller{
	
public function __construct(){
    parent::__construct();
    $this->load->model('news_model');
    $this->load->helper('url_helper');
}
	
public function index(){
	$this->load->view("includes/header");
	$this->load->view("login_view");
	$this->load->view("includes/footer");
}
}
?>