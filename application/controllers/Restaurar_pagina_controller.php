<?php
    class Restaurar_pagina_controller extends CI_Controller{
    public function __construct(){
            parent::__construct();
            $this->load->helper('url_helper');
            $this->load->model('restaurar_model');
    }   
    public function index(){
        
        $data['javascript'] = 'assets/js/directivas.js';
        $data['libreria'] = array("http://ajax.googleapis.com/ajax/libs/angularjs/1.6.0/angular-route.js",
             "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular-animate.js",
             base_url('assets/js/resumen_empresa.js'));      
        $data["titulo"]="Restaurar";
        $data['css'] = array("/BolsaTrabajo/assets/css/cabecera.css"
            ,"assets/font-awesome/css/font-awesome.min.css",
            "/BolsaTrabajo/assets/css/directivas.css");
        $this->load->view("includes/header",$data);
        $this->load->view('restaurar_view');
        $this->load->view("includes/footer", $data);
    }
    public function subir(){
        if (isset($_FILES['files'])) {
            $localizacion = $_FILES['files']["tmp_name"];
            
            $archivo = fopen($localizacion, "r") or die("Unable to open file!");
            $sql ="";
            while($linea  = fgetss($archivo)){
                $sql=$sql.$linea;
                if(strpos($linea,";")!==FALSE){
                    $sql = rtrim($sql,';');
                    
                    echo $this->restaurar_model->ejecutar($sql);
                    
                    $sql = '';
                }
            }
            echo "fin de la recuperacion";
        }
    }
    
}