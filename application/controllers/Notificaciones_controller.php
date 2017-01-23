<?php
class Notificaciones_controller extends CI_Controller{
	
	public function __construct(){
	    parent::__construct();
	    $this->load->model('login_model');
		//para poder ir de un controlador a otro facilmente
	    $this->load->helper('url_helper');
		$this->load->model('reporte_model');
		$this->load->model('alumno_model');
		$this->load->model('empresa_model');
		$this->load->model('profesor_model');
		$this->load->model('idioma_model');
		$this->load->library('session');
		$this -> load -> helper('form');
		$this -> load -> library('form_validation');
	}
	public function index(){
		if($this->session->userdata('rol')=='administrador'){
			$data['notificaciones'] = array();
			$data['javascript'] = 'assets/js/notificaciones.js';
			$data['libreria'] = array("http://ajax.googleapis.com/ajax/libs/angularjs/1.6.0/angular-route.js");		
			$data['titulo'] = "Notificaciones";
			
			$this->load->view("includes/header", $data);
			$this->load->view("notificaciones_view");
			$this->load->view("includes/footer", $data);
		}
		else{
			redirect('./login_controller');
		}
	}
	protected function reportes(){
		$reportes = $this->reporte_model->get_reportes()? $this->reporte_model->get_reportes():array();
		
		foreach ($reportes as $key => $reporte) {
			//TODO switch con los tipos de reporte 
			$reportes[$key]['nombre'] = $this->alumno_model->get_nombre($reporte['id_entidad']);
		}
		//sleep ( 2 );
		echo json_encode($reportes);
		
	}
	protected function nuevas_altas($limit){
		$nuevas_altas = $this->empresa_model->get_nuevas_altas($limit) ? $this->empresa_model->get_nuevas_altas($limit) : array();
		echo json_encode($nuevas_altas);
	}
	protected function alumnos($limite=PHP_MAX_INT){
		$alumnos = $this->alumno_model->get_alumnos($limite)? $this->alumno_model->get_alumnos($limite):array();
		echo json_encode($alumnos);
	}
	protected function borrar_alumno(){
		$this->form_validation->set_rules('id', 'id', 'numeric|required|trim|xss_clean');
		$id = $this->input->post('id');
		if($this->alumno_model->borrar_alumno($id)){
			$this->login_model->borrar_usuario($id);
			$mensaje = "Alumno borrado correctamente";
		}
		else{
			$mensaje = "Ha ocurrido un error";
		}
		echo $mensaje;
	}
	protected function empresas($limite = PHP_MAX_INT){
		$empresas = $this->empresa_model->get_empresas($limite)? $this->empresa_model->get_empresas($limite):array();
		foreach ($empresas as $key => $value) {
			$empresas[$key]['correo'] = $this->login_model->get_correo($value['id_login']);
		}
		echo json_encode($empresas);
	}
	protected function borrar_empresa(){
		$this->form_validation->set_rules('id', 'id', 'numeric|required|trim|xss_clean');
		$id = $this->input->post('id');
		if($this->empresa_model->borrar_empresa($id)){
			$this->login_model->borrar_usuario($id);
			$mensaje = "Alumno borrado correctamente";
		}
		else{
			$mensaje = "Ha ocurrido un error";
		}
		echo $mensaje;
	}
	protected function cargar_familias(){
		$this->load->model("familia_laboral_model");
		$familias = $this->familia_laboral_model->familia();
		echo json_encode($familias);
	}
	protected function profesores($limite = PHP_MAX_INT){
		$profesores = $this->profesor_model->get_profesores($limite)? $this->profesor_model->get_profesores($limite):array();
		foreach ($profesores as $key => $value) {
			$profesores[$key]['correo'] = $this->login_model->get_correo($value['id_login']);
		}
		echo json_encode($profesores);
	}
	protected function borrar_profesor(){
		$this->form_validation->set_rules('id', 'id', 'numeric|required|trim|xss_clean');
		$id = $this->input->post('id');
		if ($this -> form_validation -> run() != false){
			if($this->profesor_model->borrar_profesor($id)){
				$this->login_model->borrar_usuario($id);
				$mensaje = "Alumno borrado correctamente";
			}
			else{
				$mensaje = "Ha ocurrido un error";
			}
		}
		else{
			$mensaje = "Datos invalidos";
		}
		echo $mensaje;
	}
	protected function get_idiomas(){
		$idiomas = $this->idioma_model->idioma();
		$idiomas = $idiomas?$idiomas:array();
		echo json_encode($idiomas);
	}
	protected function agregar_idioma(){
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|trim|regex_match[/^([a-z,A-Z,á,é,í,ó,ú,â,ê,ô,ã,õ,ç,Á,É,Í,Ó,Ú,Â,Ê,Ô,Ã,Õ,Ç,ü,ñ,Ü,Ñ," "]+)$/]');
		$idioma = $this->input->post('nombre');
		if ($this -> form_validation -> run() != false){
			if($this->idioma_model->agregar_idioma($idioma)){
				echo "Idioma agregado correctamente";
			}
			else{
				echo "Idioma ya existente";
			}
		}
		else{
			echo "Nombre invalido";
		}
	}
	protected function editar_idioma(){
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|trim|regex_match[/^([a-z,A-Z,á,é,í,ó,ú,â,ê,ô,ã,õ,ç,Á,É,Í,Ó,Ú,Â,Ê,Ô,Ã,Õ,Ç,ü,ñ,Ü,Ñ," "]+)$/]');
		$this->form_validation->set_rules('id', 'id', 'numeric|required|trim');
		$nombre = $this->input->post('nombre');
		$id = $this->input->post('id');
		
		$mensajes['error'] = false;
		if ($this -> form_validation -> run() != false){
			if($this->idioma_model->editar_idioma($id,$nombre)){
				$mensajes['mensaje']= "Editado satisfactoriamente";
			}
			else{
				$mensajes['mensaje']= "No se ha podido editar";
				$mensajes['error'] = true;
			}
		}
		else{
			$mensajes['mensaje'] = "Nombre invalido";
			$mensajes['error'] = true;
		}
		echo json_encode($mensajes);
	}
	public function validar($function,$arg=''){
		//$this->cargar_familias();
		if($this->session->userdata('rol')=='administrador'){
			call_user_func( array('Notificaciones_controller',$function),$arg);
		}
		
	}
	protected function borrar_idioma(){
		$this->form_validation->set_rules('id', 'id', 'numeric|required|trim');
		$mensajes['error'] = false;
		$id = $this->input->post('id');
		if ($this -> form_validation -> run() != false){
			if($this->idioma_model->borrar_idioma($id)){
				$mensajes['mensaje'] = "Idioma borrado";
			}
		}
		else{
			$mensajes['mensaje'] = "ID invalida";
			$mensajes['error'] = true; 
		}
		echo json_encode($mensajes);
	}
}
?>