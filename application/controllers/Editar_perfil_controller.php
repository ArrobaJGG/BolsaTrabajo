<?php
class Editar_perfil_controller extends SuperController{
	
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
		$this->removeCache();
		$this->load->library('upload');
		$this->load->library('image_lib');
		
	}

	
	public function index(){
		
		if ($this->session->userdata('rol')=='alumno'){		
			$id_login = $this->session->userdata['id_login'];
			$rol = $this->session->userdata['rol'];
			
			if ($this->input->post('Enviar')){
				
				$this->form_validation->set_rules('nombre', 'nombre ', 'required|callback_letras');
				$this->form_validation->set_rules('apellido','apellido','callback_letras');
				$this->form_validation->set_rules('telefono','telefono','integer');
				$this->form_validation->set_rules('dni','dni','required');
				$this->form_validation->set_rules('codigo_postal','codigo_postal','integer');
				$this->form_validation->set_rules('resumen','resumen','max_length[1000]');
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
					$telefono = $this->input->post('telefono');
					$dni = $this->input->post('dni');
					$fecha_nacimiento = $this->input->post('fecha_nacimiento');
					$codigo_postal = $this->input->post('codigo_postal');
					$resumen = $this->input->post('resumen');
					$familia = $this->input->post('familia');
					$idioma = $this->input->post('idioma');
					$nivelleido = $this->input->post('nivelleido');
					$nivelescrito = $this->input->post('nivelescrito');
					$nivelhablado = $this->input->post('nivelhablado');
					$titulado = $this->input->post('titulado');
					$curso = $this->input->post('curso');
					$fecha_inicio = $this->input->post('fecha_inicio');
					$fecha_final = $this->input->post('fecha_final');
					$experiencia = $this->input->post('experiencia');
					$logo = $this->input->post('logo');
					$parametros_alumno = array( "nombre" => $nombre, 
						"dni" => $dni,
						"apellidos" => $apellidos ,
						"telefono" => $telefono,
						"fecha_nacimiento" => $fecha_nacimiento,
						"id_login" => $id_login,
						"codigo_postal" => $codigo_postal,
						"resumen" => $resumen,
						"experiencia" => $experiencia,
						"logo" => $logo);
					$parametros_alumno_curso= array("id_curso"=> $curso,
						"fecha_inicio" => $fecha_inicio,
						"fecha_final" => $fecha_final,
						"id_login" => $id_login
						);
					$parametros_nivel= array("nivelleido" => $nivelleido,
						"nivelescrito" => $nivelescrito,
						"nivelhablado" => $nivelhablado
						);
					$parametros_familia_alumno= array( "familia" => $familia,
						"id_login" => $id_login);
					$parametros_alumno_idioma= array( "idioma" => $idioma);
					
					
					$mi_archivo = 'logo';
					$config['upload_path'] ='./img/imgr/';
					$config['allowed_types'] = 'jpg';
					$config['max_size'] = '2048';
					$config['overwrite'] = TRUE;
					$config['file_name'] = $id_login;
					//$config['encrypt_name'] = FAlSE;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload($mi_archivo)) {
     					//echo $this->upload->display_errors(); exit();
					} else {     
						$data = array('upload_data' => $this->upload->data());
						$img_full_path = $config['upload_path'] . $data['upload_data']['file_name'];
						
    				// REDIMENSIONAMOS
						$config['image_library'] = 'gd2';
						$config['source_image'] = $img_full_path;
						$config['maintain_ratio'] = TRUE;
						$config['overwrite'] = TRUE;
						$config['width'] = 275;
						$config['height'] = 250;
						$config['new_image'] = './img/'. $data['upload_data']['file_name'];
						$img_redim1 = $config['new_image'];
						$this->load->library('image_lib', $config);
						if (!$this->image_lib->resize()) {
							@unlink($img_full_path);
							echo $this->image_lib->display_errors(); exit();
						}
						$this->image_lib->clear();

     				// REDIMENSIONAMOS DE NUEVO
						$config['image_library'] = 'gd2';
						$config['source_image'] = $img_full_path;
						$config['maintain_ratio'] = TRUE;
						$config['overwrite'] = TRUE;
						$config['width'] = 100;
						$config['height'] = 100;
						$config['new_image'] = './img/'. $data['upload_data']['file_name'];
     				$this->image_lib->initialize($config); /// <<- IMPORTANTE
     				if (!$this->image_lib->resize()) {
     					@unlink($img_full_path);
     					@unlink($img_redim1);
     					echo $this->image_lib->display_errors(); exit();
     				}
     			}
     			
     			
					   //$actualizar_alumno = $this->alumno_model->actualizar($parametros,$id_login);
     			
     			$actualizar_alumno = $this->alumno_model->actualizar_alumno($parametros_alumno,$id_login);
				if($curso!="0"){
     				if ($this->alumno_model->tiene_alumno_curso($curso,$id_login)==0){
     					$actualizar_alumno = $this->alumno_model->insertar_alumno_curso($parametros_alumno_curso,$id_login);
					}
				}
				
 				//$actualizar_nivel  = $this->idioma_model->actualizar_idioma($parametros_idioma,$id_login);
     			
				//$actualizar_alumno=$this->alumno_model->actualizar($nombre,$apellidos,$telefono,$dni,$fecha,$codigo_postal,$descripcion,$experiencia);
     			$datos["mensaje"] = "Validacion correcta";
     			$cogerdatos=$this->alumno_model->coger_datos($id);
				if($cogerdatos->nombre!=null&&$cogerdatos->apellido!=null&&$this->alumno_model->contar_alumno($id)!=0){
					 $this->alumno_model->validar_alumno($id);			
				}
				redirect('/resumen_alumno_controller');
     			
     		}


     		
     	}
     	$datos_alumnos = $this->alumno_model->id_login($id_login);
     	$datos_alumnos['cursos'] = $this->alumno_model->alumno_curso($id_login);
     	$data['javascript'] = 'assets/js/directivas.js';
        $data['libreria'] = array("http://ajax.googleapis.com/ajax/libs/angularjs/1.6.0/angular-route.js",
                     "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular-animate.js",
                     base_url('assets/js/editar_perfil.js'));  
		$data['css'] = array("/BolsaTrabajo/assets/css/cabecera.css",
				    "/BolsaTrabajo/assets/css/editar_perfil.css",
                    "/BolsaTrabajo/assets/css/directivas.css",
                    "assets/font-awesome/css/font-awesome.min.css");
		
     	
     	$data['titulo'] = "Editar Perfil";
     	$data['idiomas']=$this->idioma_model->idioma();
     	$data['niveles']=$this->idioma_model->nivelleido();
     	$data['niveleshablados']=$this->idioma_model->nivelhablado();
     	$data['nivelesescritos']=$this->idioma_model->nivelescrito();
     	$data['familias']=$this->familia_laboral_model->familia();
     	$data['alumnos_cursos']=$this->curso_model->get_curso($id_login);

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