<?php
class Editarempresa_controller extends CI_Controller{
	
public function __construct(){
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
		
	if ($this->input->post('Actualizar')){
		$this->load->library('form_validation');
				$this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[3]|alpha');
				$this->form_validation->set_rules('cif', 'Cif', 'required|max_length[9]');
				$this->form_validation->set_rules('telefono', 'Telefono', 'trim|required|numeric');
				$this->form_validation->set_rules('telefono2', 'Telefono2', 'trim|required|numeric');
				$this->form_validation->set_rules('contacto', 'Contacto', 'required|alpha|trim');
				$this->form_validation->set_rules('archivo', 'Archivo');
					$this->form_validation->set_message('required','El campo %s es obligatorio'); 
					$this->form_validation->set_message('alpha','El campo %s debe estar compuesto solo por letras');
				    $this->form_validation->set_message('min_length', ' %s es muy corto');
				    $this->form_validation->set_message('max_lenght','El campo %s debe contener solo numeros');
					$this->form_validation->set_message('numeric','El campo %s debe contener solo numeros');

               
			    if($this->form_validation->run() ==false){
			    	 //$datos["mensaje"] = "Validacion incorrecta";
					
				}else{
					   $nombre = $this->input->post('nombre');
					   $cif = $this->input->post('cif');
					   $telefono = $this->input->post('telefono');
					   $telefono2 = $this->input->post('telefono2');
					   $contacto = $this->input->post('contacto');
					   $archivo = $this->input->post('archivo');
					   $parametros = array( "nombre" => $nombre, 
					   						"cif" => $cif,
					   						"telefono" => $telefono ,
					   						"telefono2" => $telefono2,
					   						"contacto" => $contacto,
					   						"id_login" => $id_login,
					   						$archivo);
					   
					   $actualizar_empresa = $this->empresa_model->actualizar($parametros,$id_login);
					   //$this->Empresa_model->update($nombre,$cif,$telefono,$telefono2,$contacto,$archivo);
					   $datos["mensaje"] = "Validacion correcta";
					   
					
				}

			    

}
				$datos_empresa = $this->empresa_model->id_login($id_login);
				//echo($this->session->$correo);
 				$data["titulo"]="Editar Empresa";
				$data["javascript"]="assets/js/editar_empresa.js";
				$this->load->view("includes/header",$data);
				$this->load->view("editarempresa_view",$datos_empresa);
				$this->load->view("includes/footer", $data);
}
else{
	redirect('login_controller');
}

}

}
?>