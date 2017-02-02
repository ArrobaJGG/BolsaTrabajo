<?php 

class Resumen_empresa_controller extends CI_Controller{
	
	function __construct() {
		parent::__construct();
		$this->load->model('Ofertas_model');
		//para poder ir de un controlador a otro facilmente
		 $this->load->helper(array('form', 'url'));
		$this->load->helper('form','url_helper');
		$this->load->library("session");
		
	}
	
	public function index(){
		if ($this->session->userdata('rol')=='empresa') {
			$id_login = $this->session->userdata['id_login'];
			// array con los datos
			$ofertas['ofertas'] = $this->Ofertas_model->datos_oferta($id_login);
			
			
		
			
			 	
			
				//echo($this->session->$correo);
 				$data['libreria'] = array();
 				$data["titulo"]="Resumen Empresa";
				$data['css'] = array("/BolsaTrabajo/assets/css/cabecera.css","/BolsaTrabajo/assets/css/resumen_empresa.css");
				$data["javascript"]="assets/js/resumen_empresa.js";
				$this->load->view("includes/header",$data);
				$this->load->view('resumen_empresa_view', $ofertas);
				$this->load->view("includes/footer", $data);
					
		}else{
			redirect('login_controller');
		}
		
	}
	function traerofertas(){
		$id_login = $this->session->userdata['id_login'];
			// array con los datos
			$ofertas = $this->Ofertas_model->datos_oferta($id_login);
			echo json_encode($ofertas);	
			}


}








 ?>