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
	public function get_profesores($datos){
		$sql = "SELECT * FROM profesor,login WHERE
              profesor.id_login = login.id_login
              AND nombre COLLATE utf8_general_ci LIKE '%$datos[nombre]%' COLLATE utf8_general_ci 
              AND correo COLLATE utf8_general_ci LIKE '%$datos[correo]%' COLLATE utf8_general_ci
              AND validado = true 
          ORDER BY profesor.id_login DESC LIMIT $datos[offset], $datos[limite]";
		$query = $this->db->query($sql);
		$devolver['profesores'] = isset($query) ? $query->result_array() : false;
        $devolver['numero_lineas'] = $this->db->query("SELECT count(profesor.id_login) numero_lineas FROM profesor,login WHERE
              profesor.id_login = login.id_login
              AND nombre COLLATE utf8_general_ci LIKE '%$datos[nombre]%' COLLATE utf8_general_ci 
              AND correo COLLATE utf8_general_ci LIKE '%$datos[correo]%' COLLATE utf8_general_ci
              AND validado = true 
          ORDER BY profesor.id_login")->row()->numero_lineas;
		return $devolver;
	}
	public function borrar_profesor($id){
		$sql = "DELETE FROM profesor WHERE id_login = '$id'";
		return $this->db->query($sql);
	}
	public function get_familia_laboral($id){
		$sql = "SELECT id_familia_laboral FROM profesor WHERE id_login ='$id'";
		$query = $this->db->query($sql);
		$devolver = isset($query) ? $query->row()->id_familia_laboral : false;
		return $devolver;
	}
}