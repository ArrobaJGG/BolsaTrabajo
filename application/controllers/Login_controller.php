<?php
class Login_controller extends CI_Controller{
//

public function __construct(){
    parent::__construct();
    $this->load->model('login_model');
	//para poder ir de un controlador a otro facilmente
    $this->load->helper(array('form','url'));
	$this->load->library('form_validation');
	$this->load->library('session');

}
//	
public function index(){
	$datos=array();
			 if($this->input->post("Enviar")){
            //Validaciones
            //name del campo, titulo, restricciones
            $this->form_validation->set_rules('email', 'email', 'required|valid_email|trim');
            $this->form_validation->set_rules('contrasena', 'contrasena', 'required|min_length[3]');
            //Mensajes
            // %s es el nombre del campo que ha fallado
            $this->form_validation->set_message('required','El campo %s es obligatorio'); 
            $this->form_validation->set_message('min_length[3]','El campo %s debe tener mas de 3 caracteres');
            $this->form_validation->set_message('valid_email','El campo %s debe ser un email correcto');
             
             if($this->form_validation->run()==false){ //Si la validación es incorrecta
               $datos["mensaje"]="Validación incorrecta";
             }else{
           		
				//verificar contraseña con la contraseña del has code, el conector final es debido a que en el model es un array y tiene que coger solamente la contraseña
             if (password_verify ( $this->input->post("contrasena") ,$this->login_model->get_contrasena($this->input->post("email")))){
	
             	$correo=$this->input->post('email');
				$rol=$this->login_model->get_rol($this->input->post("email"));
				$usuario_data=array("correo"=>$correo,"rol"=>$rol);
				$this->session->set_userdata($usuario_data);
				$this->login_model->actualizar_ultimo_login($usuario,date("Y/m/d"));
				switch ($rol){
					case 'alumno':
						redirect("resumenalumno_controller");
						break;
					case 'profesor':
						redirect("resumenprofesor_controller");
						break;
					case 'empresa':
						redirect("resumenempresa_controller");
						break;
				}
				}else{
				$datos["mensaje"]="Usuario o contraseña incorrectos";
				 		
				}
			 }
        }
    $data["titulo"]="Login";
	$data["javascript"]="assets/js/login_controller.js";
	$this->load->view("includes/header",$data);
	$this->load->view("login_view",$datos);
	$this->load->view("includes/footer");
	
	    }
}

?>