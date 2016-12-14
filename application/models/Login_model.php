<?php 
class Login_model extends CI_Model{
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
		$query = $this->db->query($sql);
		return $query->row();
	}
	public function get_rol($correo){
		$slq = "SELECT rol FROM login WHERE correo='$correo'";
		$query = $this->db->query($sql);
		return $query->row();
		
	}
	public function actualizar_ultimo_login($id_login,$fecha){
		$sql = "UPDATE login SET ultimo_login = '$fecha' where id_login='$id_login'";
		return $this->db->query($sql);
	}
}


 ?>