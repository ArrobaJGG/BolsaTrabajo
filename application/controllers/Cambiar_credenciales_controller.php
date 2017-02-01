<?php 
class Cambiar_credenciales_controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('login_model');
        //para poder ir de un controlador a otro facilmente
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this -> load -> helper('form');
        $this -> load -> library('form_validation');
    }
    public function index(){
        if($this->session->userdata('id_login')){
            
            
            
            
            $data['notificaciones'] = array();
            $data['javascript'] = 'assets/js/cambiar_credenciales.js';
            $data['libreria'] = array("http://ajax.googleapis.com/ajax/libs/angularjs/1.6.0/angular-route.js","https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js");     
            $data['titulo'] = "Resumen profesor";
            $data['correo'] = $this->session->userdata['correo'];
            
            $this->load->view("includes/header", $data);
            $this->load->view("cambiar_credenciales_view");
            $this->load->view("includes/footer", $data);
        }
        else{
            redirect('login_controller');
        }
    }
    public function cambiar_contrasena(){
        if($this->session->userdata('id_login')){
            $this -> form_validation -> set_rules('contrasena', 'Contraseña', 'required|trim');
            $this -> form_validation -> set_rules('contrasenaRepetida', 'Contraseña', 'required');
            if ($this -> form_validation -> run() != false) {
                
                $this->login_model->set_contrasena($this->session->userdata('correo'),password_hash($this -> input -> post('contrasena'), PASSWORD_DEFAULT));
                $data['contrasenaCambiada'] = "Contraseña cambiada satisfactoriamente";
            }
        }
        $this->index();
    }
}
        