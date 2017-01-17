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
	public function actualizar($parametros,$id_login){
		$sql = "UPDATE empresa SET nombre = '$parametros[nombre]', cif = '$parametros[cif]', telefono1 = $parametros[telefono], telefono2 = $parametros[telefono2], persona_contacto= '$parametros[persona_contacto]'  WHERE id_login = $id_login";
		$query = $this->db->query($sql);
		//$row = $query->row();	
		//return $row;
	}
	public function ruta($ruta, $id_login){
		$sql = "update  empresa set  logo=$ruta where id_login=$id_login";
		$query = $this->db->query($sql);
	}
	public function actualizar_alumno($columnas,$datos){
		/*
		 * Cambiar insert por update y alguna cosa mas para poder actualizar solo los campos que se envian
		 */
		$sql = "INSERT INTO alumno (";
		foreach ($columnas as $columna) {
			$sql += $columna.',';
		}
		trim($sql,',');
		$sql += ') VALUES (';
		foreach ($datos as $dato) {
			$sql += $dato.',';
		}
		trim($sql,',');
		$sql += ')';
		return $this->db->query($sql);
	}
	
	public function validar_empresa($id){
		$sql = "UPDATE empresa SET estado = true WHERE id_login = $id";
		return $this->db->query($sql);
	}
	
	public function get_empresas($limit){
		$sql = "SELECT * FROM empresa ORDER BY id_login DESC LIMIT $limit";
		$query = $this->db->query($sql);
		$devolver = isset($query) ? $query->result_array() : false;
		return $devolver;
	}
	public function borrar_empresa($id){
		$sql = "DELETE FROM empresa WHERE id_login = '$id'";
		return $this->db->query($sql);
	}
}
?>