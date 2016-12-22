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

	
	public function id_login($id_login){
		$sql= "select * from empresa where id_login='$id_login'";
		$query = $this->db->query($sql);
		$row = $query->row();	
		return $row;
	}
	public function actualizar(){
		$sql = "UPDATE empresa SET cif = $cif, telefono1 = $telefono1, telefono2=$telefono2, persona_contacto= $contacto, nombre = $nombre WHERE id_login = 1";
		$query = $this->db->query($sql);
		$row = $query->row();	
		return $row;
	}
	

}
?>