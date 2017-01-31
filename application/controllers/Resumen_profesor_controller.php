<?php
class Resumen_profesor_controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('login_model');
        //para poder ir de un controlador a otro facilmente
        $this->load->helper('url_helper');
        $this->load->model('reporte_model');
        $this->load->model('alumno_model');
        $this->load->model('empresa_model');
		$this->load->model('ofertas_model');
        $this->load->model('profesor_model');
        $this->load->model('idioma_model');
        $this->load->library('session');
        $this -> load -> helper('form');
        $this -> load -> library('form_validation');
    }
    public function index(){
        if($this->session->userdata('rol')=='profesor'){
            $data['notificaciones'] = array();
            $data['javascript'] = 'assets/js/resumen_profesor.js';
            $data['libreria'] = array("http://ajax.googleapis.com/ajax/libs/angularjs/1.6.0/angular-route.js","https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js");     
            $data['titulo'] = "Resumen profesor";
            
            $this->load->view("includes/header", $data);
            $this->load->view("resumen_profesor_view");
            $this->load->view("includes/footer", $data);
        }
        else{
            redirect('./login_controller');
        }
    }
	public function validar($function,$arg = array()){
		if($this->session->userdata('rol') == 'profesor'){
			call_user_func( array('resumen_profesor_controller',$function),$arg);
		}
	}
	protected function get_info_resumen(){
		$departamento = $this->profesor_model->get_familia_laboral($this->session->userdata['id_login']);
		$datos['alumnos'] = $this->alumno_model->get_alumnos_familia_laboral($departamento,10);
		$datos['ofertas'] = $this->ofertas_model->get_ofertas_familia_laboral($departamento,10);
		echo json_encode($datos);
	}
	protected function get_mis_ofertas(){
		$datos['ofertas'] = $this->ofertas_model->datos_oferta($this->session->userdata('id_login'));
		echo json_encode($datos);
	}
	protected function get_todas_ofertas(){
		$datos['ofertas'] = $this->ofertas_model->get_ofertas(10);
		echo json_encode($datos);
	}
	protected function get_mis_alumnos(){
		$departamento = $this->profesor_model->get_familia_laboral($this->session->userdata['id_login']);
		$datos['alumnos'] = $this->alumno_model->get_alumnos_familia_laboral($departamento,10);
		echo json_encode($datos);
	}
	protected function editar_perfil_oculto(){
		$rest_json = file_get_contents("php://input");
        $_POST = json_decode($rest_json, true);
		$datos = $this->input->post();
		echo json_encode($this->input->post());
	}
}