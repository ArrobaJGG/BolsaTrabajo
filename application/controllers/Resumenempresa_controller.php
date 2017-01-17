<?php 

class Resumenempresa_controller extends CI_Controller{
	
	function __construct() {
		parent::__construct();
		$this->load->model('empresa_model');
		//para poder ir de un controlador a otro facilmente
		 $this->load->helper(array('form', 'url'));
		$this->load->helper('form','url_helper');
		$this->load->library("session");
		
	}
	
	public function index(){
		if ($this->session->userdata('rol')=='empresa') {
			
			
			//echo($this->session->$correo);
 				$data['libreria'] = array();
 				$data["titulo"]="Resumen Empresa";
				$data["javascript"]="assets/js/editar_empresa.js";
				$this->load->view("includes/header",$data);
				$this->load->view('Resumenempresa_view');
				$this->load->view("includes/footer", $data);
		}else{
			redirect('login_controller');
		}
		
	}


}








 ?>