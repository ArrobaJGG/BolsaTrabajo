<?php 
class Profesor_model extends CI_Model{
	public function __construct()
        {
                $this->load->database();
        }
	public function crear_profesor($datos){
		$sql = "INSERT INTO profesor
				(id_login,nombre,apellidos,id_familia_laboral,activo)
			VALUES
				('$datos[id_login]','$datos[nombre]','$datos[apellidos]','$datos[id_familia_laboral]','$datos[activo]')";
		return $this->db->query($sql);
	}	
	public function get_profesores($limit){
		$sql = "SELECT * FROM profesor ORDER BY id_login DESC LIMIT $limit";
		$query = $this->db->query($sql);
		$devolver = isset($query) ? $query->result_array() : false;
		return $devolver;
	}
	public function borrar_profesor($id){
		$sql = "DELETE FROM profesor WHERE id_login = '$id'";
		return $this->db->query($sql);
	}
}