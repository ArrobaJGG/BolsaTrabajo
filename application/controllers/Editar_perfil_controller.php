<?php
class Editar_perfil_controller extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model(array('familia_laboral_model','idioma_model','alumno_model','curso_model'));
	//para poder ir de un controlador a otro facilmente
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation'); 
		$this->load->library('session');
		
	}
	
	public function index(){
		if (($this->session->userdata('rol')=='alumno')) {		
			$id_login = $this->session->userdata['id_login'];
			
			
			if($this->input->post("Enviar")){
				$this->form_validation->set_rules('nombre', 'nombre ', 'required|callback_letras');
				$this->form_validation->set_rules('apellido','apellido','required|alpha');
				$this->form_validation->set_rules('telefono','telefono','required|integer');
				$this->form_validation->set_rules('dni','dni','required');
				$this->form_validation->set_rules('fecha','fecha','required');
				$this->form_validation->set_rules('codigopostal','codigopostal','required|integer');
				$this->form_validation->set_rules('descripcion','descripcion','required|max_length');
				$this->form_validation->set_rules('ano_inicio','ano_inicio','required|callback_numcheck');
				$this->form_validation->set_rules('ano_fin','ano_fin','required|callback_numcheckmax');
				
            //Mensajes
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
				$apellidos = $this->input->post('apellidos');
				$telefono = $this->input->post('telefono1');
				$DNI = $this->input->post('dni');
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
				
				$mi_archivo = 'foto';
				$config['upload_path'] = './img/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['encrypt_name'] = TRUE;
						//$config['default'] = './img/pordefecto.jpg/';
				$config['overwrite'] = TRUE;
				$config['upload_path'] = FCPATH . './img/';
				$config['file_name'] = $id_login;
				//$config['max_size'] = "50000";//kb
				//$config['max_width'] = "2000"; // kb
				//$config['max_height'] = "2000";// kb
				
				$this->load->library('upload', $config);		
				$this->upload->initialize($config);
				
				if (!$this->upload->do_upload($mi_archivo)) {
					echo $this->upload->display_errors(); exit();
				}else {     
					$data = array('upload_data' => $this->upload->data());
					$img_full_path = $config['upload_path'] . $data['upload_data']['file_name'];
					
   							// REDIMENSIONAMOS
					$config['image_library'] = 'gd2';
					$config['source_image'] = $img_full_path;
					$config['maintain_ratio'] = TRUE;
					$config['width'] = 275;
					$config['height'] = 250;
					$config['new_image'] = './img red'. $data['upload_data']['file_name'];
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
					$config['width'] = 75;
					$config['height'] = 50;
					$config['new_image'] = '.img red'. $data['upload_data']['file_name'];
     						$this->image_lib->initialize($config); /// <<- IMPORTANTE
     						if (!$this->image_lib->resize()) {
     							@unlink($img_full_path);
     							@unlink($img_redim1);
     							echo $this->image_lib->display_errors(); exit();
     						}
     					}			
     					
     					
     					$data['uploadSuccess'] = $this->upload->data();
     					
     					$enviar_alumno = $this->alumno_model->actualizar($nombre,$apellidos,$telefono,$DNI,$fecha_nacimiento,$codigo_postal,$descripcion,$experiencia);
     					
     					$datos["mensaje"] = "Validacion correcta";
     					
     					
     				}
     				
     			}
     			
		   //} 
     			
     			
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