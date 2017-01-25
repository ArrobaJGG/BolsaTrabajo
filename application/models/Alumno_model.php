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
	public function actualizar($nombre,$apellidos,$telefono,$DNI,$fecha_nacimiento,$codigo_postal,$descripcion,$experiencia){
		$data = array(
		'nombre'=> $nombre,
		'apellidos'=> $apellidos,
		'telefono1'=> $telefono,
		'dni' => $DNI,
		'fecha_nacimiento' => $fecha_nacimiento,
		'codigo_postal' => $codigo_postal,
		'descripcion' => $descripcion,
		'experiencia' => $experiencia
		);
		return $this->db->insert('alumno',$data);
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
		$sql = "select * from curso,alumno_curso where curso.id_curso=alumno_curso.id_curso and alumno_curso.id_login=$id_login";
		$query = $this->db->query($sql);
		$row = $query->row_array();	
		return $row;
	}
	public function borrar_alumno($id){
		$sql = "DELETE FROM alumno WHERE id_login = '$id'";
		return $this->db->query($sql);
	}
	public function borrar_alumno_idioma($id){
		$sql = "DELETE FROM alumno_idioma WHERE id_login = '$id'";
		return $this->db->query($sql);
	}
	public function borrar_alumno_curso($id){
		$sql = "DELETE FROM alumno_curso WHERE id_login = '$id'";
		return $this->db->query($sql);
	}
	public function borrar_oferta_alumno($id){
		$sql = "DELETE FROM oferta_alumno WHERE id_login = '$id'";
		return $this->db->query($sql);
	}
	public function borrar_etiqueta_alumno($id){
		$sql = "DELETE FROM etiqueta_alumno WHERE id_login = '$id'";
		return $this->db->query($sql);
	}
}
?>