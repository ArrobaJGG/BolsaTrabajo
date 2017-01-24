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
						$this->load->library('form_validation');
					}
		
public function index(){
		if ($this->session->userdata('rol')=='empresa') {
				$data['familias'] = $this->Familia_laboral_model->familia();	
				$data['etiquetas'] = $this->Ofertas_model->etiqueta();
				//var_dump( $data['etiquetas']);	
				
				if ($this->input->post('Publicar')) {
					
						$this->form_validation->set_rules('titulo', 'titulo', 'required|min_length[3]|alpha');// el trim siempre delante
						$this->form_validation->set_rules('fechae', 'fechae');
						$this->form_validation->set_rules('lugar', 'lugar', 'min_length[3]|alpha');
						$this->form_validation->set_rules('telefono', 'telefono', 'trim|numeric|integer');
						$this->form_validation->set_rules('requisito', 'requisito', 'min_length[3]');
						$this->form_validation->set_rules('sueldo', 'sueldo', 'numeric');
						$this->form_validation->set_rules('funciones', 'funciones', 'min_length[3]');
						$this->form_validation->set_rules('ofrece', 'ofrece', 'min_length[3]');
						$this->form_validation->set_rules('resumen', 'resumen', 'required|min_length[3]');
						$this->form_validation->set_rules('familia', 'familia');
						$this->form_validation->set_rules('etiquetas', 'etiquetas');
						$this->form_validation->set_rules('correo', 'correo', 'valid_email');
						$this->form_validation->set_rules('horario', 'horario');
							
							// mensaje de errores
							$this->form_validation->set_message('required','El campo %s es obligatorio'); 
							$this->form_validation->set_message('alpha','El campo %s debe estar compuesto solo por letras');
						    $this->form_validation->set_message('min_length', ' %s debe ser mas largo');
						    $this->form_validation->set_message('max_lenght','El campo %s debe ser mas corto');
							$this->form_validation->set_message('numeric','El campo %s debe contener solo numeros');
							$this->form_validation->set_message('integer','El campo %s debe contener solo numeros enteros');
							$this->form_validation->set_message('valid_email','El campo email debe ser correcto');	
				} 
						if($this->form_validation->run() ==false){
					    	 					
						}else{
							$titulo = $this->input->post('titulo');
							$fechae = $this->input->post('fechae');
							$lugar = $this->input->post('lugar');
							$telefono = $this->input->post('telefono');
							$requisito = $this->input->post('requisito');
							$sueldo = $this->input->post('sueldo');
							$funciones = $this->input->post('funciones');
							$ofrece = $this->input->post('resumen');
							$familia= $this->input->post('familia');
							$etiquetas = $this->input->post('etiquetas');
							$correo = $this->input->post('correo');
							$horario = $this->input->post('horario');
							$parametros = array ( "titulo" => $titulo,
													"fechae" => $fechae,
													"lugar" => $lugar,
													"telefono" => $telefono,
													"requisito" => $requisito,
													"sueldo" => $sueldo,
													"funciones" => $funciones,
													"ofrece" => $ofrece,
													"familia" => $familia,
													"etiquetas" => $etiquetas,
													"correo" => $correo,
													"horario" => $horario);
	
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