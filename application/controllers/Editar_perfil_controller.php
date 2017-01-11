<?php
class Editar_perfil_controller extends CI_Controller{
	
	public function __construct(){
	parent::__construct();
	$this->load->model('alumno_model');
	//para poder ir de un controlador a otro facilmente
    $this->load->helper(array('form','url'));
	$this->load->library('form_validation');
	$this->load->library('session');
	}
			
	public function index(){
		 	$this->form_validation->set_rules('nombre', 'nombre ', 'required|alpha');
            $this->form_validation->set_rules('apellido','apellido','required|alpha');
			$this->form_validation->set_rules('telefono','telefono','required|integer');
			$this->form_validation->set_rules('dni','dni','required');
			$this->form_validation->set_rules('fecha','fecha','required');
			$this->form_validation->set_rules('codigopostal','codigopostal','required|integer');
			$this->form_validation->set_rules('descripcion','descripcion','required|max_length');
			$this->form_validation->set_rules('ano_inicio','ano_inicio','required|callback_numcheck');
			$this->form_validation->set_rules('ano_fin','ano_fin','required|calback_numcheckmax');
            
            //Mensajes
            // %s es el nombre del campo que ha fallado
            $this->form_validation->set_message('required','El campo %s es obligatorio');
			$this->form_validation->set_message('alpha','El campo %s debe estar compuesto solo por letras');
			$this->form_validation->set_message('integer', 'El campo %s deve poseer solo numeros enteros');
            $this->form_validation->set_message('min_length','El campo %s debe tener mas de 3 caracteres');
			$this->form_validation->set_message('max_length','El campo %s debe tener como maximo 1000 caracter');
            $this->form_validation->set_message('valid_email','El campo %s debe ser un email correcto');
			
			if($this->form_validation->run()==false){ //Si la validación es incorrecta
               $datos["mensaje"]="Validación incorrecta";
             }else{
			 	
			 }
			
		$data['titulo'] = "Editar Perfil";
		//$data["javascript"]="assets/js/editar_perfil.js";
		$this->load->view("includes/header", $data);
		$this->load->view("Editar_perfil_view");
		$this->load->view("includes/footer");
		
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
}
?>