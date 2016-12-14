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
			 if($this->input->post("Enviar")){
            //Validaciones
            //name del campo, titulo, restricciones
            $this->form_validation->set_rules('usuario', 'usuario', 'required|valid_email|trim');
            $this->form_validation->set_rules('contrasena', 'contrasena', 'required|min_length[3]');
            //Mensajes
            // %s es el nombre del campo que ha fallado
            $this->form_validation->set_message('required','El campo %s es obligatorio'); 
            $this->form_validation->set_message('min_length[3]','El campo %s debe tener mas de 3 caracteres');
            $this->form_validation->set_message('valid_email','El campo %s debe ser un email correcto');
             
             if($this->form_validation->run()==false){ //Si la validación es incorrecta
                $datos["mensaje"]="Validación incorrecta";
             }else{
                $datos["mensaje"]="Validación correcta";
				//verificar contraseña con la contraseña del has code, el conector final es debido a que en el model es un array y tiene que coger solamente la contraseña
             if (password_verify ( $this->input->post("contrasena") , $this->login_model->get_contrasena($this->input->post("usuario"))->contrasena)){
             	$correo=$this->input->post('usuario');
				$rol=$this->login_model->get_rol($this->input->post("usuario"))->rol;
				$usuario_data=array("correo"=>$correo,"rol"=>$rol);
				$this->session->set_userdata($usuario_data);
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
				 	}
			 }
        }
    $data["titulo"]="Login";
	$this->load->view("includes/header",$data);
	$this->load->view("login_view");
	$this->load->view("includes/footer");
	    
	    }
}

?>