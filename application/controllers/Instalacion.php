<?php
class Instalacion extends CI_Controller{
	
	function __construct() {
		parent::__construct();
		//para poder ir de un controlador a otro facilmente
		$this->load->helper(array('form', 'url'));
		$this->load->helper('form','url_helper');
		$this->load->library('form_validation');
	}
	
	public function index(){
		//error_reporting(0);
		$this->form_validation->set_rules('usuario', 'usuario', 'required|trim');
		$this->form_validation->set_rules('contrasena', 'contrasena', 'required|trim');
		$this->form_validation->set_rules('localizacion', 'localizacion', 'required|trim');
		$this->form_validation->set_rules('base_datos', 'base_datos', 'required|trim');
		
		if($this->form_validation->run()!==false){
			$localizacion = $this->input->post('localizacion')?$this->input->post('localizacion'):null;
			$usuario = $this->input->post('usuario')?$this->input->post('usuario'):null;
			$contrasena = $this->input->post('contrasena')?$this->input->post('contrasena'):null;
			$base_datos = $this->input->post('base_datos')?$this->input->post('base_datos'):null;
			
			echo $localizacion;
			echo "<br>";/*
			echo $usuario;
			echo "<br>";
			echo $contrasena;
			echo "<br>";
			echo $base_datos;
			echo "<br>";*/
			$filename = APPPATH.'config\database.php';
			$file = fopen($filename, 'r+');
			$filesize =filesize ($filename);
			$stringArchivo = fread ( $file , $filesize );
			
			$quitar = array(
				"'hostname' => 'localhost'",
				"'username' => 'bolsa'",
				"'password' => 'trabajo'",
				"'database' => 'bolsa_trabajo'"
			);
			$replacement = array(
				"'hostname' => '$localizacion'",
				"'username' => '$usuario'",
				"'password' => '$contrasena'",
				"'database' => '$base_datos'"
			);
			$i = 0;
			$stringCambiado = $stringArchivo;
			while($i < count($replacement)){
				$posicionConfiguracion = strrpos ( $stringCambiado , $quitar[$i]);
				$stringCambiado = substr_replace($stringCambiado, $replacement[$i], $posicionConfiguracion,strlen($quitar[$i]));
				$i++;
			}
				/*
				$configuracion = substr ($stringArchivo, $posicionConfiguracion );
				$configuracion = ltrim($configuracion,'$db[\'default\'] = array(');
				$configuracion = rtrim($configuracion);
				$configuracion = rtrim($configuracion,');');*/
				
			$enlace = mysqli_connect($localizacion, $usuario, $contrasena, $base_datos);
			if(!$enlace){
				echo "nope";
			}
			else{
				fclose($file);
				$file = fopen($filename, 'w');
				fwrite($file,$stringCambiado);
			}
			echo $stringCambiado;
			
	        
		}
		$data['titulo'] = "Instalacion";
		$data['javascript'] = 'assets/js/directivas.js';
        $data['libreria'] = array("http://ajax.googleapis.com/ajax/libs/angularjs/1.6.0/angular-route.js",
             "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular-animate.js",
             base_url('assets/js/resumen_alumno.js'));  
		$data['css'] = array("/BolsaTrabajo/assets/css/cabecera.css",
		    "/BolsaTrabajo/assets/css/resumen_alumno.css",
            "/BolsaTrabajo/assets/css/directivas.css"
			);
				
		$this->load->view("includes/header",$data);
		$this->load->view('instalacion_view');
		$this->load->view("includes/footer", $data);
	}
	
}