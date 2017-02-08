<?php
class Resumen_alumno_controller extends CI_Controller{
	
	function __construct() {
		parent::__construct();
		$this->load->model('Ofertas_model');
		//para poder ir de un controlador a otro facilmente
		 $this->load->helper(array('form', 'url'));
		$this->load->helper('form','url_helper');
		$this->load->library("session");
		
	}
	
	public function index(){
		if ($this->session->userdata('rol')=='alumno') {
			$id_login = $this->session->userdata['id_login'];
			// array con los datos
			$ofertas['ofertas'] = $this->Ofertas_model->datos_oferta($id_login);
			
			
		
			
			 	
			
				//echo($this->session->$correo);
 			
 				$data["titulo"]="Resumen Alumno";

			

                $data['javascript'] = 'assets/js/directivas.js';
                $data['libreria'] = array("http://ajax.googleapis.com/ajax/libs/angularjs/1.6.0/angular-route.js",
                     "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular-animate.js",
                     base_url('assets/js/editar_alumno.js'));  
				$data['css'] = array("/BolsaTrabajo/assets/css/cabecera.css",
				    "/BolsaTrabajo/assets/css/resumen_alumno.css",
                    "/BolsaTrabajo/assets/css/directivas.css",
                    "assets/font-awesome/css/font-awesome.min.css");

				$this->load->view("includes/header",$data);
				$this->load->view('Resumen_alumno_view',$ofertas);
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