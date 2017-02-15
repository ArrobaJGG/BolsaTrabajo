<?php
class Editar_oferta_controller extends CI_Controller{
	
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
	// TODO falta que no casque cuando no hay una id_oferta
	public function index($id_oferta = null){
		
			if ($this->session->userdata('rol')=='empresa'||$this->session->userdata('rol')=='profesor') {
					$id_login = $this->session->userdata['id_login'];
					
					$datos_oferta = $this->Ofertas_model->datos_una_oferta($id_oferta);
					$data['familias'] = $this->Familia_laboral_model->familia();	
					$data['etiquetas'] = $this->Ofertas_model->etiqueta();
					$data['css'] = array("/BolsaTrabajo/assets/css/cabecera.css","/BolsaTrabajo/assets/css/editar_oferta.css");
					$data['libreria'] = array();
					$data["titulo"]="Editar Oferta";
					$data["javascript"]="assets/js/editar_oferta.js";
					$this->load->view("includes/header",$data);
					$this->load->view("editar_oferta_view",$datos_oferta,$data);
					$this->load->view("includes/footer", $data);
					
					
					

						
			} else {
					redirect('../../Login_controller');
			}
			
	}



	public function actualiza ($id_oferta){
		$id_login = $this->session->userdata['id_login'];
		if ($this->input->post('Actualizar')) {
								
									$this->form_validation->set_rules('titulo', 'titulo', 'required|min_length[3]');// el trim siempre delante
									$this->form_validation->set_rules('nombre','nombre');
									$this->form_validation->set_rules('fechae', 'fechae');
									$this->form_validation->set_rules('lugar', 'lugar', 'min_length[3]|alpha');
									$this->form_validation->set_rules('telefono', 'telefono', 'trim|numeric|integer');
									$this->form_validation->set_rules('requisito', 'requisito', 'min_length[3]');
									$this->form_validation->set_rules('sueldo', 'sueldo', 'numeric');
									$this->form_validation->set_rules('funciones', 'funciones', 'min_length[3]');
									$this->form_validation->set_rules('ofrece', 'ofrece', 'min_length[3]');
									$this->form_validation->set_rules('resumen', 'resumen', 'required|min_length[3]');
									$this->form_validation->set_rules('id_familia', 'id_familia');										
									$this->form_validation->set_rules('etiquetas', 'etiquetas');
									$this->form_validation->set_rules('correo', 'correo', 'valid_email');
									$this->form_validation->set_rules('horario', 'horario');
									$this->form_validation->set_rules('duracion', 'duracion');
										
										// mensaje de errores
												$this->form_validation->set_message('required','El campo %s es obligatorio'); 
												$this->form_validation->set_message('alpha','El campo %s debe estar compuesto solo por letras');
											    $this->form_validation->set_message('min_length', ' %s debe ser mas largo');
											    $this->form_validation->set_message('max_lenght','El campo %s debe ser mas corto');
												$this->form_validation->set_message('numeric','El campo %s debe contener solo numeros');
												$this->form_validation->set_message('integer','El campo %s debe contener solo numeros enteros');
												$this->form_validation->set_message('valid_email','El campo email debe ser correcto');
						}
						if ($this->form_validation->run() ==false){
							$this->index($id_oferta);	
						}else{
							$titulo = ($this->input->post('titulo')) ? $this->input->post('titulo') : null;
							$nombre = ($this->input->post('nombre')) ? $this->input->post('nombre') : null ;
							$fechae  = ($this->input->post('fechae')) ? $this->input->post('fechae') : null ;
							$lugar = ($this->input->post('lugar')) ? $this->input->post('lugar'): null ;
							$telefono = ($this->input->post('telefono')) ? $this->input->post('telefono') : null ;
							$requisito = ($this->input->post('requisito')) ? $this->input->post('requisito') : null ;
							$sueldo = ($this->input->post('sueldo')) ? $this->input->post('sueldo') : null;
							$funciones = ($this->input->post('funciones')) ? $this->input->post('funciones') : null ;
							$ofrece = ($this->input->post('ofrece')) ? $this->input->post('ofrece') : null ;
							$resumen = ($this->input->post('resumen')) ? $this->input->post('resumen') : null ;
							$id_familia = ($this->input->post('id_familia')) ? $this->input->post('id_familia') : null ;
							$etiquetas = ($this->input->post('etiquetas')) ? $this->input->post('etiquetas') : null ;
							$correo  = ($this->input->post('correo')) ? $this->input->post('correo') : null ;
							$horario = ($this->input->post('horario')) ? $this->input->post('horario') : null ;
							$oculto = ($this->input->post('oculto')) ? $this->input->post('oculto') : FALSE;
							$duracion = ($this->input->post('duracion')) ? $this->input->post('duracion') : null;
							
							$parametros = array ( 
													"titulo" => $titulo,
													"nombre" =>$nombre,
													"fechae" => $fechae,
													"lugar" => $lugar,
													"telefono" => $telefono,
													"requisito" => $requisito,
													"sueldo" => $sueldo,
													"funciones" => $funciones,
													"ofrece" => $ofrece,
													"id_familia" => $id_familia,
													"etiquetas" => $etiquetas,
													"correo" => $correo,
													"horario" => $horario,
													"resumen" => $resumen,
													"oculto" => $oculto,
													"fechac" => date('Y/m/d'),
													"duracion" => $duracion
													);
									
									$actualizardatos = $this->Ofertas_model->actualizar($parametros,$id_oferta);
									if ($this->session->userdata('rol')=='empresa') {
										redirect('../BolsaTrabajo/Resumen_empresa_controller');
									}
									if ($this->session->userdata('rol')=='profesor') {
										redirect('../../Resumen_profesor_controller');
									}
									
						}
		
	}

}

?>