 <?php 
class Alumno_model extends CI_Model{
	public function __construct()
        {
                $this->load->database();
        }
	public function get_nombre($id_login){
		$sql = "SELECT nombre FROM alumno WHERE id_login = $id_login";
		$query = $this->db->query($sql);
		$row = $query->row();
		$devolver = isset($row) ? $row->nombre : false;
		return $devolver;
	}
	public function existe($id_login){
		$sql = "SELECT nombre FROM alumno WHERE id_login = $id_login";
		$query = $this->db->query($sql);
		$row = $query->row();
		$devolver = isset($row) ? true : false;
		return $devolver;
	}
	public function actualizar_alumno($columnas,$datos){
		/*
		 * Cambiar insert por update y alguna cosa mas para poder actualizar solo los campos que se envian
		 */
		$sql = "UPDATE INTO alumno (";
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

	public function crear_alumno($id_login){
		$sql = "INSERT INTO alumno (id_login) VALUES ('$id_login')";
		return $this->db->query($sql);
	}

	public function get_alumnos($limite = PHP_INT_MAX){
		$sql = "SELECT * FROM alumno ORDER BY id_login DESC LIMIT $limite";
		$query = $this->db->query($sql);
		$devolver = isset($query) ? $query->result_array() : false;
		return $devolver;
	}
	public function actualizar($parametros,$id_login){
		$sql = "UPDATE alumno SET nombre = '$parametros[nombre]', apellido = $parametros[apellido], telefono1 = $parametros[telefono], DNI = $parametros[DNI], fecha = $parametros[fecha]   WHERE id_login = $id_login";
		$query = $this->db->query($sql);
		//$row = $query->row();	
		//return $row;

	}
	public function id_login($id_login){
		$sql= "select * from alumno where id_login='$id_login'";
		$query = $this->db->query($sql);
		$row = $query->row_array();	
		return $row;
	}
	public function ruta($ruta, $id_login){
		$sql = "update  alumno set  foto=$ruta where id_login=$id_login";
		$query = $this->db->query($sql);
	}
	public function validar_alumno($id){
		$sql = "UPDATE alumno SET estado = true WHERE id_login = $id";
		return $this->db->query($sql);
	}
	public function alumno_curso($id_login){
		$sql = "select nombre,fecha_inicio,fecha_final from curso,alumno_curso where curso.id_curso=alumno_curso.id_curso and alumno_curso.id_login=$id_login";
		$query = $this->db->query($sql);
		$row = $query->row_array();	
		return $row;

	}
	public function borrar_alumno($id){
		$sql = "DELETE FROM alumno WHERE id_login = '$id'";
		return $this->db->query($sql);
	}
}
?>