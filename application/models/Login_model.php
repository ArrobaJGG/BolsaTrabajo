<?php 
class Login_model extends CI_Model{
	public function __construct()
        {
                $this->load->database();
        }
	public function crear_usuario($datos){
		$sql = "INSERT INTO login(correo,contrasena,rol,ultimo_login,fecha_creacion,hash_validar) 
				VALUES('".$datos['correo']."','".
				$datos['contrasena']."','".
				$datos['rol']."','".
				$datos['ultimo_login']."','".
				$datos['fecha_creacion']."','".
				$datos['hash_validar'].
				"')";
		return $this->db->query($sql);
	}	
	public function get_contrasena($correo){
		$sql = "SELECT contrasena FROM login WHERE correo='$correo'";
		$query = $this->db->query($sql);
		$row = $query->row();
		$devolver = isset($row) ? $row->contrasena : false;
		return $devolver;
	}
	public function get_rol($correo)
		{
		$sql = "SELECT rol FROM login WHERE correo='$correo'";
		$query = $this->db->query($sql);
		$row = $query->row();
		$devolver = isset($row) ? $row->rol : false;
		return $devolver;
		}
	public function get_correo($id)
		{
		$sql = "SELECT correo FROM login WHERE id_login='$id'";
		$query = $this->db->query($sql);
		$row = $query->row();
		$devolver = isset($row) ? $row->correo : false;
		return $devolver;
		}
	public function get_id($correo){
		$sql = "SELECT id_login FROM login WHERE correo='$correo'";
		$query = $this->db->query($sql);
		$row = $query->row();
		$devolver = isset($row) ? $row->id_login : false;
		return $devolver;
	}
	public function actualizar_ultimo_login($correo,$fecha){
		$sql = "UPDATE login SET ultimo_login = '$fecha' where correo='$correo'";
		return $this->db->query($sql);
	}
	public function validar_login($correo){
		$sql = "UPDATE login SET validado = 1 WHERE correo = '$correo'";
		return $this->db->query($sql);
	}
	public function existe_correo($hash){
		$sql = "SELECT correo FROM login WHERE hash_validar='$hash'";
		$query = $this->db->query($sql);
		$row = $query->row();
		$existe = isset($row) ? $row->correo : false;
		return $existe;
	}
	public function existe_cuenta($correo){
		$sql = "SELECT correo FROM login WHERE correo='$correo'";
		$query = $this->db->query($sql);
		$row = $query->row();
		$existe = isset($row) ? $row->correo : false;
		return $existe;
	}
	public function set_contrasena($correo,$contrasena){
		$sql = "UPDATE login SET contrasena = '$contrasena' WHERE correo = '$correo'";
		return $this->db->query($sql);
	}
	public function esta_validado($correo){
		$sql = "SELECT validado FROM login WHERE correo = '$correo'";
		$query= $this->db->query($sql);
		$row = $query->row();
		$devolver = isset($row) ? $row->validado : false;
		return $devolver;
	}
	public function borrar_usuario($id){
		$sql = "DELETE FROM login WHERE id_login = $id";;
		return $this->db->query($sql);
	}
}


 ?>