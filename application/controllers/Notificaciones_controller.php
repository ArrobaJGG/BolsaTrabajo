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
	public function reportes(){
		$reportes = $this->reporte_model->get_reportes()? $this->reporte_model->get_reportes():array();
		
		foreach ($reportes as $key => $reporte) {
			//var_dump($reporte);
			$reportes[$key]['nombre'] = $this->alumno_model->get_nombre($reporte['id_entidad']);
		}
		//sleep ( 2 );
		echo json_encode($reportes);
		
	}
	public function alumnos($limite=PHP_MAX_INT){
		$alumnos = $this->alumno_model->get_alumnos($limite)? $this->alumno_model->get_alumnos($limite):array();
		echo json_encode($alumnos);
	}
	public function borrar_alumno(){
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
	public function empresas($limite = PHP_MAX_INT){
		$empresas = $this->empresa_model->get_empresas($limite)? $this->empresa_model->get_empresas($limite):array();
		foreach ($empresas as $key => $value) {
			$empresas[$key]['correo'] = $this->login_model->get_correo($value['id_login']);
		}
		echo json_encode($empresas);
	}
	public function borrar_empresa(){
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
	public function cargar_familias(){
		$this->load->model("familia_laboral_model");
		$familias = $this->familia_laboral_model->familia();
		echo json_encode($familias);
	}
	public function profesores($limite = PHP_MAX_INT){
		$profesores = $this->profesor_model->get_profesores($limite)? $this->profesor_model->get_profesores($limite):array();
		foreach ($profesores as $key => $value) {
			$profesores[$key]['correo'] = $this->login_model->get_correo($value['id_login']);
		}
		echo json_encode($profesores);
	}
	public function borrar_profesor(){
		$this->form_validation->set_rules('id', 'id', 'numeric|required|trim|xss_clean');
		$id = $this->input->post('id');
		if($this->profesor_model->borrar_profesor($id)){
			$this->login_model->borrar_usuario($id);
			$mensaje = "Alumno borrado correctamente";
		}
		else{
			$mensaje = "Ha ocurrido un error";
		}
		echo $mensaje;
	}
}
?>