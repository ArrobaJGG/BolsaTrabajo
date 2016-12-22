<?php
class Editarperfil_controller extends CI_Controller{
	
	public function __construct(){
	parent::__construct();
	$this->load->model('alumno_model');
	//para poder ir de un controlador a otro facilmente
	$this->load->helper('url_helper');
	}
			
	public function index(){
		$data['titulo'] = "Editar Perfil";
		$data["javascript"]="assets/js/editar_perfil.js";
		$this->load->view("includes/header", $data);
		$this->load->view("Editar_Perfil_view");
		$this->load->view("includes/footer");
		
	}
}
?>