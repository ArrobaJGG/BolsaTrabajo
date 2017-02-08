<?php
class Info_login extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->library('session');
    }
    public function index(){
        $rol = $this->session->userdata('rol');
        $data['existeImagen'] = false;
		$data['existeEditar'] = false;
        if($rol=="empresa"||$rol=="alumno"){
            $data['existeImagen'] = true;
            $data['rutaImagen'] = file_exists('img/'.$this->session->userdata('id_login').".jpg")?'/BolsaTrabajo/img/'.$this->session->userdata('id_login').".jpg":'/BolsaTrabajo/img/pordefecto.jpg';
        	if($rol=="empresa"){
        		$data['rutaEditar'] = 'editarempresa_controller';
        	}
			if($rol == "alumno"){
				$data['rutaEditar'] = 'editar_perfil_controller';
			}
			$data['existeEditar'] = true;
		}    
        
        $data['cuenta'] = $this->session->userdata('correo');
        $this->session->userdata('correo');
        $this->load->view('partes/info_login',$data);
    }
}