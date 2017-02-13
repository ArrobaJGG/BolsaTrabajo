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
			$ofertas['ofertas'] = $this->Ofertas_model->ofertas_alumno($id_login);
			
			
		
			
			 	
			
				//echo($this->session->$correo);
 			
 				$data["titulo"]="Resumen Alumno";

			

                $data['javascript'] = 'assets/js/directivas.js';
                $data['libreria'] = array("http://ajax.googleapis.com/ajax/libs/angularjs/1.6.0/angular-route.js",
                     "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular-animate.js",
                     base_url('assets/js/resumen_alumno.js'));  
				$data['css'] = array("/BolsaTrabajo/assets/css/cabecera.css",
				    "/BolsaTrabajo/assets/css/resumen_alumno.css",
                    "/BolsaTrabajo/assets/css/directivas.css",
                    "assets/font-awesome/css/font-awesome.min.css");

				$this->load->view("includes/header",$data);
				$this->load->view('resumen_alumno_view',$ofertas);
				$this->load->view("includes/footer", $data);
					
		}else{
			redirect('login_controller');
		}
		
	}
	public function agregar_oferta($id_oferta){
	    $this->load->model('alumno_model');
	    if($rol = $this->session->userdata('rol')){
	        $id_login = $this->session->userdata('id_login');
            if(!$this->alumno_model->esta_apuntado($id_oferta,$id_login)){             
	            $this->alumno_model->apuntarse_oferta($id_oferta,$id_login);
            }
            redirect('/resumen_alumno_controller');
	    }
        else{
            redirect('BolsaTrabajo/login_controller');
        }
	}

	
}
?>