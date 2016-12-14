<?php 
class Login_model extends CI_Model{
	public function __construct()
        {
                $this->load->database();
        }
	public function crear_usuario($datos){
		$sql = "INSERT INTO login(correo,contrasena,rol,ultimo_login) 
				VALUES('".$datos['correo']."','".
				$datos['contrasena']."','".
				$datos['rol']."','".
				$datos['ultimo_login']."')";
		return $this->db->query($sql);
	}	
	public function get_contrasena($correo){
		$sql = "SELECT contrasena FROM login WHERE correo='$correo'";
		$query = $this->db->query($sql);
		return $query->row();
	}
	public function get_rol($correo){
		$sql = "SELECT rol FROM login WHERE correo='$correo'";
		$query = $this->db->query($sql);
		return $query->row();
		
	}
	public function actualizar_ultimo_login($correo,$fecha){
		$sql = "UPDATE login SET ultimo_login = '$fecha' where id_login='$correo'";
		return $this->db->query($sql);
	}
}


 ?>