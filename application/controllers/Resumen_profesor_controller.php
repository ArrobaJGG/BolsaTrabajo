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
            $data['javascript'] = 'assets/js/directivas.js';
            $data['libreria'] = array("http://ajax.googleapis.com/ajax/libs/angularjs/1.6.0/angular-route.js",
             "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular-animate.js",
             base_url('assets/js/resumen_profesor.js'));   
            $data['titulo'] = "Resumen profesor";
            $data['css'] = array("/BolsaTrabajo/assets/css/cabecera.css",
                "assets/font-awesome/css/font-awesome.min.css",
                "/BolsaTrabajo/assets/css/notificaciones.css",
				"/BolsaTrabajo/assets/css/directivas.css");
			
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
	    $rest_json = file_get_contents("php://input");
        $_POST = json_decode($rest_json, true);
        $limite = $this->input->post('numero_alumnos');
        $offset = $this->input->post('desplazamiento');
        $datos = array(
            'limite' => $limite,
            'offset' => $offset
        );
		$datos = $this->ofertas_model->get_ofertas($datos);
		echo json_encode($datos);
	}
	protected function get_mis_alumnos(){
		$departamento = $this->profesor_model->get_familia_laboral($this->session->userdata['id_login']);
		$datos['alumnos'] = $this->alumno_model->get_alumnos_familia_laboral($departamento,10);
		echo json_encode($datos);
	}
    protected function get_todos_alumnos(){
        $offset = 0;
        $limite = 10;
        $nombre = '';
        $apellidos = '';
        $dato = array(
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'limite' => $limite,
            'offset' => $offset
        );
        $datos = $this->alumno_model->get_alumnos($dato);
        echo json_encode($datos);
    }
	protected function editar_perfil_oculto(){
		$rest_json = file_get_contents("php://input");
        $_POST = json_decode($rest_json, true);
		$datos = $this->input->post();
		$this->alumno_model->actualizar_perfil_oculto($datos['perfil'],$datos['id_login']);
	}
	protected function perfil_oculto($id){
		$data['texto'] = $this->alumno_model->get_perfil_oculto($id);
		echo json_encode($data);
	}
}