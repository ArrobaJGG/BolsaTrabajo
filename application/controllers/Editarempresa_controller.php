<?php
class Editarempresa_controller extends CI_Controller{
	
public function __construct(){
parent::__construct();
$this->load->model('empresa_model');
//para poder ir de un controlador a otro facilmente
 $this->load->helper(array('form', 'url'));
$this->load->helper('form','url_helper');


}
		
public function index(){
	if ($this->input->post('Actualizar')){
		$this->load->library('form_validation');
				$this->form_validation->set_rules('Nombre', 'Nombre', 'trim|required|min_length[3]|alpha');
				$this->form_validation->set_rules('Cif', 'Cif');
				$this->form_validation->set_rules('Telefono', 'Telefono', 'trim|required|numeric|max_length[9]|min_lenght[9]');
				$this->form_validation->set_rules('Telefono2', 'Telefono2');
				$this->form_validation->set_rules('Contacto', 'Contacto');
				$this->form_validation->set_rules('Archivo', 'Archivo');
					$this->form_validation->set_message('required','El campo %s es obligatorio'); 
					$this->form_validation->set_message('alpha','El campo %s debe estar compuesto solo por letras');
				    $this->form_validation->set_message('min_length', ' %s es muy corto');
				    $this->form_validation->set_message('max_lenght','El campo %s debe contener solo numeros');
					$this->form_validation->set_message('numeric','El campo %s debe contener solo numeros');

               
			    if($this->form_validation->run() ==false){
			    	 //$datos["mensaje"] = "Validacion incorrecta";
					
				}else{
					  $nombre = $this->input->post('Nombre');
					   $cif = $this->input->post('Cif');
					   $telefono = $this->input->post('Telefono');
					   $telefono2 = $this->input->post('Telefono2');
					   $contacto = $this->input->post('Contacto');
					   $archivo = $this->input->post('Archivo');
					   
					   $this->load->model('Empresa_model/actualizarempresa');
					   $this->Login_model->update($nombre,$cif,$telefono,$telefono2,$contacto,$archivo);
					   $datos["mensaje"] = "Validacion correcta";
					
				}
			    

}
 				$data["titulo"]="Editar Empresa";
				$this->load->view("includes/header",$data);
				$this->load->view("editarempresa_view");
				$this->load->view("includes/footer");
}
}
?>