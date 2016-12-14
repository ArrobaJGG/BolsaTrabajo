<?php
class Editarperfil_controller extends CI_Controller{
	
	public function __construct(){
	parent::__construct();
	$this->load->model('login_model');
	//para poder ir de un controlador a otro facilmente
	$this->load->helper('url_helper');
	}
			
	public function index(){
		$data['titulo'] = "Editar Perfil";
		$this->load->view("includes/header", $data);
		$this->load->view("EditarPerfil_view");
		$this->load->view("includes/footer");
		
	}
}
?>