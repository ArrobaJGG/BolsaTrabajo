<?php
class Editarempresa_controller extends CI_Controller{
	
public function __construct(){
parent::__construct();
$this->load->model('login_model');
//para poder ir de un controlador a otro facilmente
 $this->load->helper(array('form', 'url'));
$this->load->helper('url_helper');
}
		
public function index(){
	$data['titulo'] = "Editar Empresa";
	$this->load->view("includes/header", $data);
	//$this->load->view("Editarempresa_view");
	
	if ($this->input->post('Actualizar')){
		$this->load->library('form_validation');
				$this->form_validation->set_rules('Nombre', 'Nombre');
				//die ($this->input->post('Nombre'));
				$this->form_validation->set_rules('Cif', 'Cif');
				$this->form_validation->set_rules('Telefono', 'Telefono');
				$this->form_validation->set_rules('Telefono2', 'Telefono2');
				$this->form_validation->set_rules('Contacto', 'Contacto');
				$this->form_validation->set_rules('Archivo', 'Archivo');

                if ($this->form_validation->run() == TRUE){
                       $nombre = $this->input->post('Nombre');
					   $cif = $this->input->post('Cif');
					   $telefono = $this->input->post('Telefono');
					   $telefono2 = $this->input->post('Telefono2');
					   $contacto = $this->input->post('Contacto');
					   $archivo = $this->input->post('Archivo');
					   
					   $this->load->model('Login_model/actualizarempresa');
					   $this->Login_model->update($nombre,$cif,$telefono,$telefono2,$contacto,$archivo);
					   
                }
                else{
					
						echo form_error('nombre');
						echo form_label('Nombre', 'nombre');
						echo form_input('nombre');echo '<br>';
						echo form_error('sueldo');
						echo form_label('Sueldo', 'sueldo');
						echo form_input('sueldo');echo '<br>';
						
                }
			
		
	}
	else {
			$this->load->view('Editarempresa_view');
		}
				
		$this->load->view("includes/footer");
}
}
?>