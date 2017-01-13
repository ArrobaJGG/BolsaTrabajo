<?php
class Editar_perfil_controller extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('familia_laboral_model');
		$this->load->model('idioma_model');
		$this->load->model('alumno_model');
	//para poder ir de un controlador a otro facilmente
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	
	public function index(){
		/*if (isset($this->session->userdata['correo'])) {		
			$id_login = $this->session->userdata['id_login'];
			
		
			 if($this->input->post("Enviar")){*/
				$this->form_validation->set_rules('nombre', 'nombre ', 'required|callback_solo_letras');
				$this->form_validation->set_rules('apellido','apellido','required|alpha');
				$this->form_validation->set_rules('telefono','telefono','required|integer');
				$this->form_validation->set_rules('dni','dni','required');
				$this->form_validation->set_rules('fecha','fecha','required');
				$this->form_validation->set_rules('codigopostal','codigopostal','required|integer');
				$this->form_validation->set_rules('descripcion','descripcion','required|max_length');
				$this->form_validation->set_rules('ano_inicio','ano_inicio','required|callback_numcheck');
				$this->form_validation->set_rules('ano_fin','ano_fin','required|calback_numcheckmax');
				
            //Mensajes
            // gorka paga la coca primer aviso
            // %s es el nombre del campo que ha fallado
			  	$this->form_validation->set_message('required','El campo %s es obligatorio');
				$this->form_validation->set_message('alpha','El campo %s debe estar compuesto solo por letras');
				$this->form_validation->set_message('integer', 'El campo %s debe poseer solo numeros enteros');
				$this->form_validation->set_message('min_length','El campo %s debe tener mas de 3 caracteres');
				$this->form_validation->set_message('max_length','El campo %s debe tener como maximo 1000 caracter');
				$this->form_validation->set_message('valid_email','El campo %s debe ser un email correcto');
				
			if($this->form_validation->run()==false){ //Si la validación es incorrecta
				$datos["mensaje"]="Validación incorrecta";
			}else{
				$nombre = $this->input->post('nombre');
				$apellido = $this->input->post('apellido');
				$telefono = $this->input->post('telefono');
				$DNI = $this->input->post('DNI');
				$fecha = $this->input->post('fecha');
				$codigo_postal = $this->input->post('codigopostal');
				$descripcion = $this->input->post('descripcion');
				$familia = $this->input->post('familia');
				$idioma = $this->input->post('idioma');
				$nivel_leido = $this->input->post('nivelleido');
				$nivel_escrito = $this->input->post('nivelescrito');
				$nivel_hablado = $this->input->post('nivelhablado');
				$titulado = $this->input->post('titulado');
				$curso = $this->input->post('curso');
				$ano_inicio = $this->input->post('ano_inicio');
				$ano_fin = $this->input->post('ano_fin');
				$experiencia = $this->input->post('experiencia');
				$foto = $this->input->post('foto');
				
				
			//}
				
		//	} 
			
		}
		
		$data['titulo'] = "Editar Perfil";
		$data["javascript"]="assets/js/editar_perfil.js";
		$data['idiomas']=$this->idioma_model->idioma();
		$data['niveles']=$this->idioma_model->nivelleido();
		$data['niveleshablados']=$this->idioma_model->nivelhablado();
		$data['nivelesescritos']=$this->idioma_model->nivelescrito();
		$data['familias']=$this->familia_laboral_model->familia();
		$this->load->view("includes/header", $data);
		$this->load->view("Editar_perfil_view");
		$this->load->view("includes/footer", $data);
		
	}


public function numcheck($in){
	if (intval($in) < 1960) {
		$this->form_validation->set_message('numcheck', 'el campo %s tiene que ser mas que 1960');
		return FALSE;
	} else {
		return TRUE;
	}
}
public function numcheckmax($in){
	if (intval($in) > 1980) {
		$this->form_validation->set_message('numcheck', 'el campo %s tiene que ser menos que 1980');
		return FALSE;
	} else {
		return TRUE;
	}
}
public function solo_letras($cadena)
{
    $patron = '/[a-zA-Z,.\s]*$/';
    if( !preg_match( $patron, $cadena ) ) {
        return FALSE;
    }
    else {
        return TRUE;
    }
}

}
?>