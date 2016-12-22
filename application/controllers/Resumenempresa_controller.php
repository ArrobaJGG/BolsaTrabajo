<?php 

class Resumenempresa_controller extends CI_Controller{
	
	function __construct() {
		parent::__construct();
		$this->load->model('empresa_model');
		//para poder ir de un controlador a otro facilmente
		 $this->load->helper(array('form', 'url'));
		$this->load->helper('form','url_helper');
		$this->load->library("session");
		
	}
	
	public function index(){
		if (isset($this->session->userdata['correo'])) {
			$id_login = $this->session->userdata['id_login'];
			$datos_empresa = $this->empresa_model->id_login($id_login);
			
			
		}
	}


}








 ?>