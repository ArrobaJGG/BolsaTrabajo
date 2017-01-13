<?php
class Notificaciones_controller extends CI_Controller{
	
	public function __construct(){
	    parent::__construct();
	    $this->load->model('login_model');
		//para poder ir de un controlador a otro facilmente
	    $this->load->helper('url_helper');
		$this->load->model('reporte_model');
		$this->load->model('alumno_model');
		$this->load->library('session');
	}
	public function index(){
		if($this->session->userdata('rol')=='administrador'){
			$data['notificaciones'] = array();
			$data['javascript'] = 'assets/js/notificaciones.js';
			$data['libreria'] = array("http://ajax.googleapis.com/ajax/libs/angularjs/1.6.0/angular-route.js");		
			$data['titulo'] = "Notificaciones";
			
			$this->load->view("includes/header", $data);
			$this->load->view("notificaciones_view");
			$this->load->view("includes/footer", $data);
		}
		else{
			redirect('./login_controller');
		}
	}
	public function reportes(){
		$reportes = $this->reporte_model->get_reportes()? $this->reporte_model->get_reportes():array();
		
		foreach ($reportes as $key => $reporte) {
			//var_dump($reporte);
			$reportes[$key]['nombre'] = $this->alumno_model->get_nombre($reporte['id_entidad']);
		}
		//sleep ( 2 );
		echo json_encode($reportes);
		
	}
}
?>