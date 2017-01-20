<?php
class Insertar_oferta_controller extends CI_Controller{
	
			public function __construct(){
						parent::__construct();
						$this->load->model('Ofertas_model');
						$this->load->model('Familia_laboral_model');
						//para poder ir de un controlador a otro facilmente
						$this->load->helper(array('form', 'url'));
						$this->load->helper('form','url_helper');
						$this->load->library("session");
		
					}
		
public function index(){
		if ($this->session->userdata('rol')=='empresa') {
				$data['familias'] = $this->Familia_laboral_model->familia();	
				$data['etiquetas'] = $this->Ofertas_model->etiqueta();
				//var_dump( $data['etiquetas']);	
				
				
				
				$data['libreria'] = array();
				$data['titulo'] = "Insertar Oferta";
				$data["javascript"]="assets/js/Insertar_oferta.js";
				$this->load->view("includes/header",$data);
				$this->load->view("Insertar_oferta_view",$data);
				$this->load->view("includes/footer",$data);
				
			}else{
					redirect('login_controller');
			}
			
			
		}

}
?>