<?php
class Resumen_alumno_controller extends CI_Controller{
	
	function __construct() {
		parent::__construct();
		$this->load->model('Alumno_model');
		//para poder ir de un controlador a otro facilmente
		 $this->load->helper(array('form', 'url'));
		$this->load->helper('form','url_helper');
		$this->load->library("session");
		
	}
	
	public function index(){
		if ($this->session->userdata('rol')=='alumno') {
			$id_login = $this->session->userdata['id_login'];
			// array con los datos
			
			
			
		
			
			 	
			
				//echo($this->session->$correo);
 				$data['libreria'] = array();
 				$data["titulo"]="Resumen Alumno";
				$data["javascript"]="assets/js/editar_empresa.js";
				$data['css'] = array("/BolsaTrabajo/assets/css/cabecera.css");
				$this->load->view("includes/header",$data);
				$this->load->view('Resumen_alumno_view');
				$this->load->view("includes/footer", $data);
					
		}else{
			redirect('login_controller');
		}
		
	}
}
?>