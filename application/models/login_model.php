<?php 
class News_model extends CI_Model{
	public function __construct()
        {
                $this->load->database();
        }
	public function crear_usuario($datos){
		$slq = "INSERT INTO bolsa_trabajo(correo,contrasena,rol,ultimo_login) 
				VALUES('".$datos['correo']."','".
				$datos['contrasena']."','".
				$datos['rol']."','".
				$datos['ultimo_login']."'";
		return $this->db->query($sql);
	}	
	public function get_contrasena($correo){
		$slq = "SELECT contrasena FROM login WHERE correo='$correo'";
		return $this->db->query($sql);
	}
}


 ?>