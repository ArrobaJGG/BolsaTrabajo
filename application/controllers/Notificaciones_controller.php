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
		$this->load->model('ofertas_model');
		foreach ($reportes as $key => $reporte) {
			switch ($reporte['tipo']) {
				case 'alumno':
					$reportes[$key]['nombre'] = $this->alumno_model->get_nombre($reporte['id_entidad']);
					break;
				case 'empresa':
					$reportes[$key]['nombre'] = $this->empresa_model->get_nombre($reporte['id_entidad']);
					break;
				case 'oferta':
					$reportes[$key]['nombre'] = $this->ofertas_model->get_nombre($reporte['id_entidad']);
				break;
			}
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
		//TODO poner mismo formato que en el resto
		$this->form_validation->set_rules('id', 'id', 'numeric|required|trim');
		if($this -> form_validation -> run() != false){
			$id = $this->input->post('id');
			$this->alumno_model->borrar_alumno_curso($id);
			$this->alumno_model->borrar_alumno_idioma($id);
			$this->alumno_model->borrar_oferta_alumno($id);
			$this->alumno_model->borrar_etiqueta_alumno($id);
			$this->alumno_model->borrar_alumno($id);
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
		$this->form_validation->set_rules('id', 'id', 'numeric|required|trim');
		$id = $this->input->post('id');
		$mensajes['error'] = false;
		if($this -> form_validation -> run() != false){
			if($this->empresa_model->borrar_empresa($id)){
				$this->login_model->borrar_usuario($id);
				$mensajes['mensaje'] = "Empresa borrado correctamente";
			}
			else{
				$mensajes['error'] = true;
				$mensajes['mensaje'] = "Ha ocurrido un error";
			}
		}
		else{
			$mensajes['error'] = true;
				$mensajes['mensaje'] = "ID invalida";
		}
		echo json_encode($mensajes);
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
			if($this->idioma_model->borrar_alumno_idioma($id)){
			    $this->idioma_model->borrar_idioma($id);
				$mensajes['mensaje'] = "Idioma borrado";
			}
		}
		else{
			$mensajes['mensaje'] = "ID invalida";
			$mensajes['error'] = true; 
		}
		echo json_encode($mensajes);
	}
    protected function get_familias_cursos_etiquetas(){
        $this->load->model('ofertas_model');
        $this->load->model('familia_laboral_model');
        $this->load->model('curso_model');
        $datos['etiquetas'] = $this->ofertas_model->etiqueta() ? $this->ofertas_model->etiqueta() : array();
        $datos['familias'] = $this->familia_laboral_model->familia() ? $this->familia_laboral_model->familia() : array();
        $datos['cursos'] = $this->curso_model->get_curso() ? $this->curso_model->get_curso() :array();
        echo json_encode($datos);
    }
    protected function agregar_etiqueta(){
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim|regex_match[/^([a-z,0-9,A-Z,á,é,í,ó,ú,â,ê,ô,ã,õ,ç,Á,É,Í,Ó,Ú,Â,Ê,Ô,Ã,Õ,Ç,ü,ñ,Ü,Ñ," "]+)$/]');
        $this->form_validation->set_rules('id', 'id', 'numeric|required|trim');
        $familia = $this->input->post('id');
        $nombre = $this->input->post('nombre');
        $this->load->model('ofertas_model');
        if($this -> form_validation -> run() != false){
            if($this->ofertas_model->agregar_etiqueta($nombre,$familia)){
                $mensaje ="Etiqueta agregada correctamente";
            }
            else{
                $mensaje ="error";
            }
        } 
    }
	protected function editar_etiqueta(){
		$this->load->model('ofertas_model');
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|trim|regex_match[/^([a-z,A-Z,á,é,í,ó,ú,â,ê,ô,ã,õ,ç,Á,É,Í,Ó,Ú,Â,Ê,Ô,Ã,Õ,Ç,ü,ñ,Ü,Ñ," "]+)$/]');
		$this->form_validation->set_rules('id', 'id', 'numeric|required|trim');
		$nombre = $this->input->post('nombre');
		$id = $this->input->post('id');
		$mensajes['error'] = false;
		if ($this -> form_validation -> run() != false){
			if($this->ofertas_model->editar_etiqueta($nombre,$id)){
				$mensajes['mensaje']= "Editado satisfactoriamente";
			}
			else{
				$mensajes['mensaje'] = "No se ha podido editar";
				$mensajes['error'] = true;
			}
		}
		else{
			$mensajes['mensaje'] = "Nombre invalido";
			$mensajes['error'] = true;
		}
		echo json_encode($mensajes);
	}
	protected function numero_etiqueta_borrado(){
		$this->load->model('ofertas_model');
		$this->form_validation->set_rules('id', 'id', 'numeric|required|trim');
        $id = $this->input->post('id');
		if($this -> form_validation -> run() != false){
			$numero['alumno'] = $this->ofertas_model->get_numero_etiqueta_alumno_borrado($id) ? $this->ofertas_model->get_numero_etiqueta_alumno_borrado($id) : "0";
			$numero['oferta']= $this->ofertas_model->get_numero_etiqueta_oferta_borrado($id) ? $this->ofertas_model->get_numero_etiqueta_oferta_borrado($id) : "0";
		}
		else{
			$numero['alumno'] = "0";
			$numero['oferta'] = "0";
		}
        echo json_encode($numero);
	}
	protected function borrar_etiqueta(){
		$this->load->model('ofertas_model');
		$this->form_validation->set_rules('id', 'id', 'numeric|required|trim');
		$mensajes['error'] = false;
		$id = $this->input->post('id');
		if ($this -> form_validation -> run() != false){
			if($this->ofertas_model->borrar_etiqueta_alumno($id)&&$this->ofertas_model->borrar_etiqueta_oferta($id)){
			    $this->ofertas_model->borrar_etiqueta($id);
				$mensajes['mensaje'] = "Etiqueta borrada";
			}
		}
		else{
			$mensajes['mensaje'] = "ID invalida";
			$mensajes['error'] = true; 
		}
		echo json_encode($mensajes);
	}
    protected function numero_idioma_borrado(){
        $this->form_validation->set_rules('id', 'id', 'numeric|required|trim');
        $id = $this->input->post('id');
		if($this -> form_validation -> run() != false){
			$numero = $this->idioma_model->get_numero_idioma_borrado($id) ? $this->idioma_model->get_numero_idioma_borrado($id) : "0";
		}
		else{
			$numero = "0";
		}
        echo $numero;
    }
	protected function editar_familia(){
	    $this->load->model('familia_laboral_model');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim|regex_match[/^([a-z,A-Z,á,é,í,ó,ú,â,ê,ô,ã,õ,ç,Á,É,Í,Ó,Ú,Â,Ê,Ô,Ã,Õ,Ç,ü,ñ,Ü,Ñ," "]+)$/]');
        $this->form_validation->set_rules('id', 'id', 'numeric|required|trim');
        $nombre = $this->input->post('nombre');
        $id = $this->input->post('id');
        $mensajes['error'] = false;
        if ($this -> form_validation -> run() != false){
            if($this->familia_laboral_model->editar_familia($id,$nombre)){
                $mensajes['mensaje']= "Editado satisfactoriamente";
            }
            else{
                $mensajes['mensaje'] = "No se ha podido editar";
                $mensajes['error'] = true;
            }
        }
        else{
            $mensajes['mensaje'] = "Nombre invalido";
            $mensajes['error'] = true;
        }
        echo json_encode($mensajes);
	}
    protected function numero_familia_borrado(){
        $this->load->model('familia_laboral_model');
        $this->load->model('ofertas_model');
        $this->form_validation->set_rules('id', 'id', 'numeric|required|trim');
        $id = $this->input->post('id');
        $numero['error'] = false;
        if($this -> form_validation -> run() != false){
            $numero['oferta'] = $this->familia_laboral_model->get_numero_familia_oferta_borrado($id) ? $this->familia_laboral_model->get_numero_familia_oferta_borrado($id) : "0";
            $numero['profesor']= $this->familia_laboral_model->get_numero_familia_profesor_borrado($id) ? $this->familia_laboral_model->get_numero_familia_profesor_borrado($id) : "0";
            $numero['etiqueta']= $this->familia_laboral_model->get_numero_familia_etiqueta_borrado($id) ? $this->familia_laboral_model->get_numero_familia_etiqueta_borrado($id) : "0";
            $numero['curso']= $this->familia_laboral_model->get_numero_familia_curso_borrado($id) ? $this->familia_laboral_model->get_numero_familia_curso_borrado($id) : "0";
            
        }
        else{
            $numero['error'] = true;
        }
        echo json_encode($numero);
    }
    protected function borrar_familia(){
        $this->load->model('ofertas_model');
        $this->load->model('familia_laboral_model');
        $this->form_validation->set_rules('id', 'id', 'numeric|required|trim');
        $mensajes['error'] = false;
        $id = $this->input->post('id');
        if ($this -> form_validation -> run() != false){
            $etiquetas = $this->ofertas_model-> get_id_etiqueta_con_id_familia($id);
            foreach ($etiquetas as $etiqueta) {
                $this->ofertas_model->borrar_etiqueta_alumno($etiqueta['id_etiqueta']);
                $this->ofertas_model->borrar_etiqueta_oferta($etiqueta['id_etiqueta']);
            }
            if($this->ofertas_model->borrar_etiqueta($id)){
                $this->familia_laboral_model->borrar_familia($id);
                $mensajes['mensaje'] = "Etiqueta borrada";
            }
        }
        else{
            $mensajes['mensaje'] = "ID invalida";
            $mensajes['error'] = true; 
        }
        echo json_encode($mensajes);
    }
	protected function validar_empresa(){
		$this->form_validation->set_rules('id', 'id', 'numeric|required|trim');
        $mensajes['error'] = false;
        $id = $this->input->post('id');
		if ($this -> form_validation -> run() != false){
			if($this->empresa_model->validar_empresa($id)){
				$mensajes['mensaje'] = "validacion correcta";
			}
			else{
				$mensajes['mensajes'] = "ha ocurrido un error";
			}
		}
		else{
			$mensajes['mensaje'] = "ID invalida";
            $mensajes['error'] = true; 
		}
	}
	protected function borrar_reporte(){
		$this->form_validation->set_rules('id', 'id', 'numeric|required|trim');
		$mensajes['error'] = false;
		$id = $this->input->post('id');
		if ($this -> form_validation -> run() != false){
			$this->reporte_model->borrar_reporte($id);
			$mensajes['mensaje'] = "Reporte borrado";
		}
		else{
			$mensajes['mensaje'] = "ID invalida";
			$mensajes['error'] = true; 
		}
		echo json_encode($mensajes);
	}
	protected function borrar_entidad(){
		$this->form_validation->set_rules('id', 'id', 'numeric|required|trim');
		$mensajes['error'] = false;
		$this->form_validation->set_rules('tipo', 'tipo', 'required|trim|alpha');
		if ($this -> form_validation -> run() != false){
			$id = $this->input->post('id');
			$tipo = $this->input->post('tipo');
			switch ($tipo) {
				case 'alumno':
					$this->borrar_alumno();
					break;
				case 'empresa':
					$this->borrar_empresa();
					break;
				case 'oferta':
					$this->borrar_oferta();
			}
		}
		else{
			$mensajes['mensaje'] = "ID invalida";
			$mensajes['error'] = true; 
		}
	}
	protected function borrar_oferta(){
		$this->form_validation->set_rules('id', 'id', 'numeric|required|trim');
		$this->load->model('ofertas_model');
		$mensajes['error'] = false;
		$id = $this->input->post('id');
		if ($this -> form_validation -> run() != false){
			$this->ofertas_model->borrar_oferta($id);
			$mensajes['mensaje'] = "Oferta borrado";
		}
		else{
			$mensajes['mensaje'] = "ID invalida";
			$mensajes['error'] = true; 
		}
		echo json_encode($mensajes);
	}
}
?>