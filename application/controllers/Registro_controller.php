<?php
class Registro_controller extends CI_Controller{
	
	public function __construct(){
	    parent::__construct();
	    $this->load->model('login_model');
		//para poder ir de un controlador a otro facilmente
	    $this->load->helper('url_helper');
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
					'ultimo_login' => date("Y/m/d")
					);
					if($this->login_model->crear_usuario($datos)){
						echo "todo guay";
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
}
?>