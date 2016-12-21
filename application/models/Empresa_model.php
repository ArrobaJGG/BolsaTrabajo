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

	public function datos_empresa($correo){
		$sql= "select * from login,empresa where empresa.id_login = login.id_login and correo='$correo'";
		$query = $this->db->query($sql);
		$row = $query->row();	
		return row();
	}

}
?>