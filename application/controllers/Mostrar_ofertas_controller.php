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
					//$familia = $this->Ofertas_model->familia($id_familia);
					$data['familias'] = $this->Familia_laboral_model->familia();	
					$data['etiquetas'] = $this->Ofertas_model->etiqueta();
					$data['libreria'] = array();
					$data["titulo"]="Oferta";
					$data["javascript"]="assets/js/editar_oferta.js";
					$this->load->view("includes/header",$data);
					$this->load->view("mostrar_ofertas_view",$datos_oferta,$data);
					$this->load->view("includes/footer", $data);
	}
	
	
	
}




?>