<?php 
class Empresa_model extends CI_Model{
	public function __construct()
        {
                $this->load->database();
        }



public function actualizarempresa(){
		$sql = "Update empresa Set nombre=$nombre, cif=$cif, telefono=$telefono, telefono2=$telefono2, contacto=$contacto, logo=$logo";
	}

}
?>