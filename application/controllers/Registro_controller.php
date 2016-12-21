<?php
class Registro_controller extends CI_Controller{
	
	public function __construct(){
	    parent::__construct();
	    $this->load->model('login_model');
		//para poder ir de un controlador a otro facilmente
	    $this->load->helper('url_helper');
		$this->load->library('email');
		//session_destroy();
		$this->load->library('session');
	}
		
	public function index(){
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		if($this->input->post('Enviar')){
			$this->form_validation->set_rules('usuario','Usuario','required|valid_email|trim');
			$this->form_validation->set_rules('contrasena','Contraseña','required');
			if($this->form_validation->run()!=false){
				if(!$this->login_model->get_correo($this->input->post('usuario'))){
					$datos = array(
					'correo' => $this->input->post('usuario'),
					'rol' => 'empresa',
					'contrasena' => password_hash($this->input->post('contrasena'), PASSWORD_DEFAULT),
					'fecha_creacion' => date("Y/m/d"),
					'ultimo_login' => date("Y/m/d"),
					'validado' => false,
					'hash_validar' => str_replace('$','',password_hash(time().$this->input->post('usuario'),PASSWORD_DEFAULT))
					);
					if($this->login_model->crear_usuario($datos)){
						
						//Montar el mail y enviar					
						//*
						$this->email->from('arrobajgg@gmail.com', 'BolsaTrabajoFPTxurdinaga');
						$this->email->to($datos['correo']); 						
						$this->email->subject('Validacion Bolsa de trabajo FPTxurdinaga');
						$this->email->message('Para validar su correo vaya a esta direccion http://localhost/BolsaTrabajo/Registro_controller/validar/'.$datos['hash_validar']);
						$this->email->send();//*/
					}
					else{
						echo "todo no guay";
					}
				}
				else{
					echo "Correo repetido";
				}
				
			}
			
		}
		$data['javascript'] = 'assets/js/registro_controller.js';
		$data['titulo'] = "Registrarse";
		$this->load->view("includes/header", $data);
		$this->load->view("registro_view");
		$this->load->view("includes/footer");
	}
	public function validar($hash){
		if($correo = $this->login_model->existe_correo($hash)){
			if($this->login_model->validar_login($correo)){
				echo "Validado con exito";
			}
			else{
				echo "ha ocurrido un error";
			}		
		}
		else{
			echo "quien puñetas eres";
		}
	}
}
?>