<?php 
class Buscador_controller extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('ofertas_model');
		$this->load->model('familia_laboral_model');
		$this->load->model('curso_model');
		//para poder ir de un controlador a otro facilmente
		 $this->load->helper(array('form', 'url'));
		$this->load->helper('form','url_helper');
		$this->load->library("session");
		$this->load->library('form_validation');
	}
	public function validar($function,$arg=array()){
		if($this->session->userdata('correo')){
			call_user_func( array('Buscador_controller',$function),$arg);
		}
	}
	protected function get_datos(){
		$datos['tipos'] = array('alumno','profesor','oferta','empresa');
		$datos['familias'] = $this->familia_laboral_model->familia();
		$datos['categorias'] = $this->curso_model->get_categoria();
		$datos['cursos'] = $this->curso_model->get_curso();
		$datos['etiquetas'] = $this->ofertas_model->etiqueta();
		echo json_encode($datos);
	}
}