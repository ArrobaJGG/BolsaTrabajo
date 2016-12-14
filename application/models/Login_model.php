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
		$row = $query->row();
		$devolver = isset($row) ? $row->contrasena : false;
		return $devolver;
	}
	public function get_rol($correo){
		$sql = "SELECT rol FROM login WHERE correo='$correo'";
		$query = $this->db->query($sql);
		$row = $query->row();
		$devolver = isset($row) ? $row->rol : false;
		return $devolver;
		
	}
	public function get_correo($correo){
		$sql = "SELECT correo FROM login WHERE correo='$correo'";
		$query = $this->db->query($sql);
		$row = $query->row();
		$devolver = isset($row) ? $row->correo : false;
		return $devolver;
	}
	public function actualizar_ultimo_login($correo,$fecha){
		$sql = "UPDATE login SET ultimo_login = '$fecha' where id_login='$correo'";
		return $this->db->query($sql);
	}
	/*public function actualizarempresa(){
		$sql = "Update empresa Set nombre=$nombre, cif=$cif, telefono=$telefono, telefono2=$telefono2, contacto=$contacto, logo=$logo";
	}*/
}


 ?>