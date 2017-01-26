<?php
class Notificaciones_controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('login_model');
        //para poder ir de un controlador a otro facilmente
        $this->load->helper('url_helper');
        $this->load->model('reporte_model');
        $this->load->model('alumno_model');
        $this->load->model('empresa_model');
        $this->load->model('profesor_model');
        $this->load->model('idioma_model');
        $this->load->library('session');
        $this -> load -> helper('form');
        $this -> load -> library('form_validation');
    }
    public function index(){
        if($this->session->userdata('rol')=='profesor'){
            $data['notificaciones'] = array();
            $data['javascript'] = 'assets/js/resumen_profesor.js';
            $data['libreria'] = array("http://ajax.googleapis.com/ajax/libs/angularjs/1.6.0/angular-route.js");     
            $data['titulo'] = "Resumen profesor";
            
            $this->load->view("includes/header", $data);
            $this->load->view("resumen_profesor_view");
            $this->load->view("includes/footer", $data);
        }
        else{
            redirect('./login_controller');
        }
    }
}