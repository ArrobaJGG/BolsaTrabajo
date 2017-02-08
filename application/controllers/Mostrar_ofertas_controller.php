<?php
	class Mostrar_ofertas_controller extends CI_Controller{
	public function __construct(){
				parent::__construct();
				$this->load->model('Ofertas_model');
				$this->load->model('Familia_laboral_model');
				//para poder ir de un controlador a otro facilmente
				 $this->load->helper(array('form', 'url'));
				$this->load->helper('form','url_helper');
				$this->load->library("session");
				//$this->load->library('form_validation');

	}	
	//TODO cuando se mete un id que no corresponde peta
	public function index($id_oferta){
					$datos_oferta = $this->Ofertas_model->datos_una_oferta($id_oferta);
					$id_login = $this->session->userdata('id_login');
					$id_familia = $datos_oferta->id_familia;
					$familia = $this->Ofertas_model->traer_familia($id_familia);
					$data['nombre_familia'] = $familia[0]['nombre'];
					$data['familias'] = $this->Familia_laboral_model->familia();	
					$data['etiquetas'] = $this->Ofertas_model->etiqueta();
					$data['libreria'] = array();
					$data["titulo"]="Oferta";
					$data['css'] = array("/BolsaTrabajo/assets/css/cabecera.css","/BolsaTrabajo/assets/css/mostrar_ofertas.css");
					$data["javascript"]="assets/js/editar_oferta.js";
					$esmia = $this->Ofertas_model->comprobar($id_oferta,$id_login);
					//var_dump($esmia);
					$data["esmia"]= $esmia;
                    $data['botonAgregarse'] =  false;
					switch ($this->session->userdata('rol')) {
						case 'empresa':
								$data['volver'] = "Resumen_empresa_controller";
							break;
						
						case 'profesor':
								$data['volver'] = "Resumen_profesor_controller";
							break;
						
						case 'alumno':
								$data['volver'] = "Resumen_alumno_controller";
                                $data['botonAgregarse'] =  true;
							break;
						case 'administrador':
							$data['volver'] = "Notificaciones_controller";
							break;
					}
					
					
					$this->load->view("includes/header",$data);
					$this->load->view("mostrar_ofertas_view",$datos_oferta,$data);
					$this->load->view("includes/footer", $data);
	}
	
	
	
}




?>