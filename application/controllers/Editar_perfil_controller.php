<?php
class Editar_perfil_controller extends CI_Controller{
	
public function __construct(){
parent::__construct();
$this->load->model('familia_laboral_model');
$this->load->model('idioma_model');
$this->load->model('alumno_model');
$this->load->model('curso_model');
//para poder ir de un controlador a otro facilmente
$this->load->helper(array('form','url'));
$this->load->library('form_validation'); 
$this->load->library('session');


}

		
public function index(){
	
	if ($this->session->userdata('rol')=='alumno') {		
		$id_login = $this->session->userdata['id_login'];
		$rol = $this->session->userdata['rol'];
		
	if ($this->input->post('Enviar')){
		var_dump($this->input->post());
				$this->form_validation->set_rules('nombre', 'nombre ', 'required|callback_letras');
				$this->form_validation->set_rules('apellido','apellido','callback_letras');
				$this->form_validation->set_rules('telefono','telefono','integer');
				$this->form_validation->set_rules('dni','dni','required');
				$this->form_validation->set_rules('fecha','fecha','required');
				$this->form_validation->set_rules('codigopostal','codigopostal','integer');
				$this->form_validation->set_rules('descripcion','descripcion','max_length[1000]');
				$this->form_validation->set_rules('fecha_inicio','fecha_inicio');
				$this->form_validation->set_rules('fecha_final','fecha_final');
				
            //Mensajes
            // %s es el nombre del campo que ha fallado
				$this->form_validation->set_message('required','El campo %s es obligatorio');
				$this->form_validation->set_message('alpha','El campo %s debe estar compuesto solo por letras');
				$this->form_validation->set_message('integer', 'El campo %s debe poseer solo numeros enteros');
				$this->form_validation->set_message('min_length','El campo %s debe tener mas de 3 caracteres');
				$this->form_validation->set_message('max_length','El campo %s debe tener como maximo 1000 caracter');
				
			    if($this->form_validation->run() ==false){
			    	 //$datos["mensaje"] = "Validacion incorrecta";
					
				}else{
				$nombre = $this->input->post('nombre');
				$apellidos = $this->input->post('apellidos');
				$telefono = $this->input->post('telefono1');
				$dni = $this->input->post('dni');
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
				$fecha_inicio = $this->input->post('fecha_inicio');
				$fecha_final = $this->input->post('fecha_final');
				$experiencia = $this->input->post('experiencia');
				$logo = $this->input->post('logo');
					 $parametros_alumno = array( "nombre" => $nombre, 
					   						"dni" => $dni,
					   						"apellidos" => $apellidos ,
					   						"telefono1" => $telefono,
					   						"fecha" => $fecha,
					   						"id_login" => $id_login,
					   						"codigopostal" => $codigo_postal,
					   						"descripcion" => $descripcion,
					   						"experiencia" => $experiencia,
					   						"logo" => $logo);
					    $mi_archivo = 'logo';
				        $config['upload_path'] = './img/';
						//$config['default'] = './img/pordefecto.jpg/';
						$config['overwrite'] = TRUE;
						$config['upload_path'] = FCPATH . './img/';
						$config['file_name'] = $id_login;
						$config['allowed_types'] = 'jpg';
						//$config['max_size'] = "50000";//kb
						//$config['max_width'] = "2000"; // kb
						//$config['max_height'] = "2000";// kb
								
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
								        
						if (!$this->upload->do_upload($mi_archivo)) {
								//*** ocurrio un error
								/*$data['uploadError'] = $this->upload->display_errors();
								echo $this->upload->display_errors();
								return;*/
						}
						
														
						$data['uploadSuccess'] = $this->upload->data();
   			 
					   //$actualizar_alumno = $this->alumno_model->actualizar($parametros,$id_login);
					  
					   	$actualizar_alumno = $this->alumno_model->actualizar($parametros_alumno,$id_login);
					   //$actualizar_alumno=$this->alumno_model->actualizar($nombre,$apellidos,$telefono,$dni,$fecha,$codigo_postal,$descripcion,$experiencia);
					   	$datos["mensaje"] = "Validacion correcta";
					   
					
				}

			    

}
				$datos_alumnos = $this->alumno_model->id_login($id_login);
     			$datos_alumnos['cursos'] = $this->alumno_model->alumno_curso($id_login);
     			$data['libreria']=array();
     			$data['titulo'] = "Editar Perfil";
     			$data["javascript"]="assets/js/editar_perfil.js";
     			$data['idiomas']=$this->idioma_model->idioma();
     			$data['niveles']=$this->idioma_model->nivelleido();
     			$data['niveleshablados']=$this->idioma_model->nivelhablado();
     			$data['nivelesescritos']=$this->idioma_model->nivelescrito();
     			$data['familias']=$this->familia_laboral_model->familia();
				//$data['cursos']=$this->alumno_model->alumno_curso($id_login);
     			
     			$this->load->view("includes/header",$data);
     			$this->load->view("Editar_perfil_view", $datos_alumnos);
     			$this->load->view("includes/footer",$data );	
}
else{
	redirect('login_controller');
}
}
     	public function letras($cadena){
     		if (!preg_match( '/[0-9]+$/i', $cadena ))
     		{
     			if(preg_match( '/^[a-z ,.]*$/i', $cadena ))
     				return TRUE;
     		}
     		else {
     			$this->form_validation->set_message('letras', 'el campo %s tiene que tener solo letras');
     			return FALSE;
     		}
     	}
     	}
?>