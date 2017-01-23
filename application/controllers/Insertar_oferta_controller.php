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
				
				if ($this->input->post('Publicar')) {
				$this->load->library('form_validation');
				$this->form_validation->set_rules('titulo', 'titulo', 'required|min_length[3]');// el trim siempre delante
				$this->form_validation->set_rules('fechae', 'fechae');
				$this->form_validation->set_rules('lugar', 'lugar', 'min_length[3]');
				$this->form_validation->set_rules('telefono', 'telefono', 'trim|numeric|integer');
				$this->form_validation->set_rules('requisito', 'requisito', 'required|min_length[3]');
				$this->form_validation->set_rules('sueldo', 'sueldo', 'numeric');
				$this->form_validation->set_rules('funciones', 'funciones', 'min_length[3]');
				$this->form_validation->set_rules('ofrece', 'ofrece', 'min_length[3]');
				$this->form_validation->set_rules('resumen', 'resumen', 'min_length[3]');
				$this->form_validation->set_rules('familia', 'familia');
				$this->form_validation->set_rules('etiquetas', 'etiquetas', 'min_length[3]');
					// mensaje de errores
					$this->form_validation->set_message('required','El campo %s es obligatorio'); 
					$this->form_validation->set_message('alpha','El campo %s debe estar compuesto solo por letras');
				    $this->form_validation->set_message('min_length', ' %s es muy corto');
				    $this->form_validation->set_message('max_lenght','El campo %s debe contener solo numeros');
					$this->form_validation->set_message('numeric','El campo %s debe contener solo numeros');
					$this->form_validation->set_message('integer','El campo %s debe contener solo numeros enteros');	
				} 
						if($this->form_validation->run() ==false){
					    	 					
						}else{
							
						}
				
				
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