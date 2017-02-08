<?php
class Ofertas_controller extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('ofertas_model');
        //para poder ir de un controlador a otro facilmente
         $this->load->helper(array('form', 'url'));
        $this->load->helper('form','url_helper');
        $this->load->library("session");
        
    }
    
    public function apuntados($id_oferta){
        $rol = $this->session->userdata('rol');
        $id_login = $this->session->userdata('id_login');
        if($rol == "profesor"||$rol=="empresa"){
            if($this->ofertas_model->comprobar($id_oferta,$id_login)!=0){
                $data['alumnos'] = $this->ofertas_model->get_apuntados($id_oferta);
                
                $data['javascript'] = '';
                $data['libreria'] = array();  
                $data['css'] = array("/BolsaTrabajo/assets/css/cabecera.css",
                    "/BolsaTrabajo/assets/css/resumen_alumno.css",
                    "/BolsaTrabajo/assets/css/notificaciones.css",
                    "/BolsaTrabajo/assets/font-awesome/css/font-awesome.min.css");

                $this->load->view("includes/header",$data);
                $this->load->view('ofertas_view',$data);
                $this->load->view("includes/footer", $data);
                
            }
            else{
                redirect('../login_controller');
            }
            
            
        }
        else{
            redirect('../login_controller');
        }
    }
}