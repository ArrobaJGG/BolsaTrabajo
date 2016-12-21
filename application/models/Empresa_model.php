<?php 

class Empresa_model extends CI_Model{
	public function __construct()
        {
                $this->load->database();
        }
	public function crear_empresa($datos){
		$sql = "INSERT INTO empresa(id_login,nombre) 
					VALUES ('".$datos['id_login']."','".
					$datos['nombre'].
					"')";
		return $this->db->query($sql);
	}
public function get_correo($correo){
		$sql = "SELECT correo FROM login WHERE correo='$correo'";
		$query = $this->db->query($sql);
		$row = $query->row();
		$devolver = isset($row) ? $row->correo : false;
		return $devolver;
	}
public function cogerid($correo){
$sql= "select * from empresa where correo = '$correo'";	
}


public function traerdatos($correo){
	$sql = "SELECT * FROM empresa WHERE correo = '$correo'";
	$query = $this->db->query($sql);
	// para coger el id
	$row = $query->row();	
	return $row;
}



}
?>