<?php 

class Resumenempresa_controller extends CI_Controller{
	
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
			// miramos si el valor de array esta vacio
			//var_dump($ofertas['ofertas']);
			if(!isset($ofertas['ofertas'])){
				// si esta vacio le damos unos valores minimos
				//$ofertas['ofertas'] = array("titulo" => "no hay titulo", "resumen" => "no hay resumen");
			}else{
				//$ofertas['ofertas'] = array("titulo" => $ofertas['titulo'], "resumen" => $oferta->resumen);
			}		
			
				//echo($this->session->$correo);
 				$data['libreria'] = array();
 				$data["titulo"]="Resumen Empresa";
				$data["javascript"]="assets/js/resumen_empresa.js";
				$this->load->view("includes/header",$data);
				$this->load->view('Resumenempresa_view', $ofertas);
				$this->load->view("includes/footer", $data);
		}else{
			redirect('login_controller');
		}
		
	}


}








 ?>