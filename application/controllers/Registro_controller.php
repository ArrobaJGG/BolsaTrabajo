<?php
class Registro_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this -> load -> model('login_model');
		$this -> load -> model('empresa_model');
		//para poder ir de un controlador a otro facilmente
		$this -> load -> helper('url_helper');
		$this -> load -> library('email');
		//session_destroy();
		$this -> load -> library('session');
	}

	public function index() {

		$this -> load -> helper('form');
		$this -> load -> library('form_validation');

		$informacion = array();
		if ($this -> input -> post('Enviar')) {
			$this -> form_validation -> set_rules('usuario', 'Usuario', 'required|valid_email|trim');
			$this -> form_validation -> set_rules('contrasena', 'Contraseña', 'required');
			$this -> form_validation -> set_rules('nombre_empresa', 'Nombre empresa', 'required');
			if ($this -> form_validation -> run() != false) {
				$caracteres_invalidos = array('/', '$');
				if (!$this -> login_model -> get_correo($this -> input -> post('usuario'))) {
					$datos = array('correo' => $this -> input -> post('usuario'), 'rol' => 'empresa', 'contrasena' => password_hash($this -> input -> post('contrasena'), PASSWORD_DEFAULT), 'fecha_creacion' => date("Y/m/d"), 'ultimo_login' => date("Y/m/d"), 'validado' => false, 'hash_validar' => str_replace($caracteres_invalidos, '', password_hash(time() . $this -> input -> post('usuario'), PASSWORD_DEFAULT)));
					if ($this -> login_model -> crear_usuario($datos)) {
						if ($id = $this -> login_model -> get_id($datos['correo'])) {
							$datos_empresa = Array('id_login' => $id, 'nombre' => $this -> input -> post('nombre_empresa'));
							$this -> empresa_model -> crear_empresa($datos_empresa);
						}
						//Montar el mail y enviar
						//*
						$this -> email -> from('arrobajgg@gmail.com', 'BolsaTrabajoFPTxurdinaga');
						$this -> email -> to($datos['correo']);
						$this -> email -> subject('Validacion Bolsa de trabajo FPTxurdinaga');
						$this -> email -> message('Para validar su correo vaya a esta direccion http://localhost/BolsaTrabajo/Registro_controller/validar/' . $datos['hash_validar']);
						$this -> email -> send();
						//*/
					} else {
						echo "esto no deberia estar pasando";
					}
				} else {
					$informacion['correo_invalido'] = 'Cuenta ya existente.';
				}

			}

		}
		$data['javascript'] = array('assets/js/registro_controller.js');
		$data['libreria'] = array();
		$data['titulo'] = "Registrarse";
		$this -> load -> view("includes/header", $data);
		$this -> load -> view("registro_view", $informacion);
		$this -> load -> view("includes/footer", $data);
	}

	public function validar($hash) {
		if ($correo = $this -> login_model -> existe_correo($hash)) {
			if ($this -> login_model -> validar_login($correo)) {
				echo "Validado con exito";

			} else {
				echo "ha ocurrido un error";
			}
		} else {
			echo "quien puñetas eres";
		}
	}

	public function cambiar_contrasena_alumno($hash = false) {
		$this -> load -> model('alumno_model');
			
		$this -> load -> helper('form');
		$this -> load -> library('form_validation');
		$data = array();
		$data['error'] = '';
		$this -> load -> library('session');
		//var_dump($this->session->userdata());
		if ($this -> session -> userdata('tipo')=='cambio'&&$this->input->post('enviar')) {
			$this -> form_validation -> set_rules('contrasena', 'contrasena', 'required|min_length[3]');
			if (!$this -> form_validation -> run() == false && $this -> input -> post('contrasena') == $this -> input -> post('repetirContrasena')) {
				$contrasena_codificada = password_hash($this -> input -> post('contrasena'), PASSWORD_DEFAULT);
				if ($this -> login_model -> set_contrasena($this -> session -> userdata('usuario'), $contrasena_codificada)) {
					$this -> alumno_model -> crear_alumno($this -> session -> userdata('id_login'));
					$this -> login_model -> validar_login($correo);
					$this->session->unset_userdata('tipo');
					$this->session->userdata['rol'] = 'alumno';
					redirect('../resumenalumno_controller');
				}
			}
			else{
				//echo $this->session->userdata('id_login');
				//echo $this->alumno_model->existe($this->session->userdata('id_login'));
				$data['error'] = "Campos invalidos";
			}
			
		} else {
			if ($correo = $this -> login_model -> existe_correo($hash)) {
				$this->alumno_model->existe($this->login_model->get_id($correo));
				if($this->login_model->esta_validado($this->session->userdata('usuario'))) redirect('../../login_controller');
				if ($this -> login_model -> validar_login($correo)) {
					$datos_sesion = array(
						'usuario' => $correo,
						'id_login' => $this -> login_model -> get_id($correo),
						'tipo' => 'cambio');
					$this -> session -> set_userdata($datos_sesion);
					//var_dump($this->session->userdata());
				} else {
					echo "ha ocurrido un error";
				}
			} else {
				redirect('../../login_controller');
			}
		}
		$data['javascript'] = array();
		$data['libreria'] = array();
		$data['titulo'] = "Cambiar contraseña";

		$this -> load -> view("includes/header", $data);
		$this -> load -> view("cambiar_contrasena", $data);
		$this -> load -> view("includes/footer", $data);

	}

	public function cambiar_contrasena_empresa($hash = false) {
		$this -> load -> model('alumno_model');
			
		$this -> load -> helper('form');
		$this -> load -> library('form_validation');
		$data = array();
		$data['error'] = '';
		$this -> load -> library('session');
		//var_dump($this->session->userdata());
		if ($this -> session -> userdata('tipo')=='cambio'&&$this->input->post('enviar')) {
			
			$this -> form_validation -> set_rules('contrasena', 'contrasena', 'required|min_length[3]');
			if (!$this -> form_validation -> run() == false && $this -> input -> post('contrasena') == $this -> input -> post('repetirContrasena')) {
				$contrasena_codificada = password_hash($this -> input -> post('contrasena'), PASSWORD_DEFAULT);
				if ($this -> login_model -> set_contrasena($this -> session -> userdata('usuario'), $contrasena_codificada)) {
					$this->session->unset_userdata('tipo');
					$this -> login_model -> validar_login($correo);
					$this->session->userdata['rol'] = 'empresa';
					redirect('../../resumenempresa_controller');
				}
			}
			else{
				//echo $this->session->userdata('id_login');
				//echo $this->alumno_model->existe($this->session->userdata('id_login'));
				$data['error'] = "Campos invalidos";
			}
			
		} else {
			if ($correo = $this -> login_model -> existe_correo($hash)) {
				echo $this->login_model->esta_validado($correo);
				if($this->login_model->esta_validado($correo)) redirect('../../login_controller');
				if ($this -> login_model -> validar_login($correo)) {
					$datos_sesion = array(
						'usuario' => $correo,
						'id_login' => $this -> login_model -> get_id($correo),
						'tipo' => 'cambio');
					$this -> session -> set_userdata($datos_sesion);
					//var_dump($this->session->userdata());
				} else {
					echo "ha ocurrido un error";
				}
			} else {
				redirect('../../login_controller');
			}
		}
		
		$data['javascript'] = array();
		$data['libreria'] = array();
		$data['titulo'] = "Cambiar contraseña";

		$this -> load -> view("includes/header", $data);
		$this -> load -> view("cambiar_contrasena", $data);
		$this -> load -> view("includes/footer", $data);

	}

	public function registrar_alumno() {
		$this -> load -> helper('form');
		$this -> load -> library('form_validation');
		if (isset($this -> session -> userdata['correo'])) {
			if ($this -> session -> userdata['rol'] == 'administrador') {
				//*
				if ($this -> input -> post('usuario')) {
					$this -> form_validation -> set_rules('usuario', 'Usuario', 'valid_email|trim');
					if ($this -> form_validation -> run() != false) {
						$caracteres_invalidos = array('/', '$');
						if (!$this -> login_model -> get_correo($this -> input -> post('usuario'))) {
							echo "correo enviado";
							$datos = array('correo' => $this -> input -> post('usuario'),
								'rol' => 'alumno', 
								'contrasena' => password_hash($this -> string_aleatorio(10), PASSWORD_DEFAULT), 
								'fecha_creacion' => date("Y/m/d"), 
								'ultimo_login' => date("Y/m/d"), 
								'validado' => false, 
								'hash_validar' => str_replace($caracteres_invalidos, '', password_hash(time() . $this -> input -> post('usuario'), PASSWORD_DEFAULT)));
							if ($this -> login_model -> crear_usuario($datos)) {
								//Montar el mail y enviar
								//*
								$this -> email -> from('arrobajgg@gmail.com', 'BolsaTrabajoFPTxurdinaga');
								$this -> email -> to($datos['correo']);
								$this -> email -> subject('Validacion Bolsa de trabajo FPTxurdinaga');
								$this -> email -> message('Para validar su correo vaya a esta direccion http://localhost/BolsaTrabajo/Registro_controller/cambiar_contrasena_alumno/' . $datos['hash_validar']);
								$this -> email -> send();
								//*/
							}

						} else {
							echo "El correo introducido ya existe";
						}
					} else {
						echo "correo invalido";
					}

				}//*/
			}
			else{
				echo "salir";
			}
		} else {
			echo "salir";
		}
	}
	public function registrar_empresa(){
		$this -> load -> helper('form');
		$this -> load -> library('form_validation');
		
		$this -> form_validation -> set_rules('usuario', 'Usuario', 'required|valid_email|trim');
		$this -> form_validation -> set_rules('nombre', 'Nombre empresa', 'required');
		if ($this -> form_validation -> run() != false) {
			$caracteres_invalidos = array('/', '$');
			if (!$this -> login_model -> get_correo($this -> input -> post('usuario'))) {
				$datos = array(
					'correo' => $this -> input -> post('usuario'),
					'rol' => 'empresa', 'contrasena' => password_hash($this -> string_aleatorio(10), PASSWORD_DEFAULT),
					'fecha_creacion' => date("Y/m/d"),
					'ultimo_login' => date("Y/m/d"),
					'validado' => false,
					'hash_validar' => str_replace($caracteres_invalidos, '', password_hash(time() . $this -> input -> post('usuario'), PASSWORD_DEFAULT)));
				if ($this -> login_model -> crear_usuario($datos)) {
					if ($id = $this -> login_model -> get_id($datos['correo'])) {
						$datos_empresa = Array('id_login' => $id, 'nombre' => $this -> input -> post('nombre'));
						$this -> empresa_model -> crear_empresa($datos_empresa);
						$this->empresa_model->validar_empresa($id);
						//Montar el mail y enviar
						//*
						$this -> email -> from('arrobajgg@gmail.com', 'BolsaTrabajoFPTxurdinaga');
						$this -> email -> to($datos['correo']);
						$this -> email -> subject('Validacion Bolsa de trabajo FPTxurdinaga');
						$this -> email -> message('Para validar su correo vaya a esta direccion http://localhost/BolsaTrabajo/Registro_controller/cambiar_contrasena_empresa/' . $datos['hash_validar']);
						$this -> email -> send();
						//*/
						echo "correo enviado";
					}
				}
			}
			else{
				echo "El correo introducido ya existe";
			}
		}
		else {
			echo "correo invalido";
		}
	}
	protected function crear_alumnos(){
		if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
		
		// uploads image in the folder images
		    $temp = explode(".", $_FILES["file"]["name"]);
		    $newfilename = substr(md5(time()), 0, 10) . '.' . end($temp);
		    move_uploaded_file($_FILES['file']['tmp_name'], 'images/' . $newfilename);
		
		// give callback to your angular code with the image src name
		    echo json_encode($newfilename);
		}
	}
	//*Algoritmo para generar strings aleatorios
	protected function string_aleatorio($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
		$str = '';
		$max = mb_strlen($keyspace, '8bit') - 1;
		for ($i = 0; $i < $length; ++$i) {
			$str .= $keyspace[random_int(0, $max)];
		}
		return $str;
	}

}
?>