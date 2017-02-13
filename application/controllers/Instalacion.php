<?php
class Instalacion extends CI_Controller{
	
	function __construct() {
		parent::__construct();
		$this->load->model('Ofertas_model');
		//para poder ir de un controlador a otro facilmente
		 $this->load->helper(array('form', 'url'));
		$this->load->helper('form','url_helper');
		$this->load->library("session");
		
	}
	
	public function index(){
		
		
        $data['javascript'] = 'assets/js/directivas.js';
        $data['libreria'] = array("http://ajax.googleapis.com/ajax/libs/angularjs/1.6.0/angular-route.js",
             "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular-animate.js",
             base_url('assets/js/resumen_alumno.js'));  
		$data['css'] = array("/BolsaTrabajo/assets/css/cabecera.css",
		    "/BolsaTrabajo/assets/css/resumen_alumno.css",
            "/BolsaTrabajo/assets/css/directivas.css"
			);
		
		$this->load->view("includes/header",$data);
		$this->load->view('instalacion_view');
		$this->load->view("includes/footer", $data);
	}
	
}