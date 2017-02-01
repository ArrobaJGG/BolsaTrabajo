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
	public function actualizar_alumno1($columnas,$datos){
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

	public function get_alumnos($limite = PHP_INT_MAX,$desplazamiento = 0){
		$sql = "SELECT * FROM alumno ORDER BY id_login DESC LIMIT $desplazamiento, $limite";
		$query = $this->db->query($sql);
		$devolver = isset($query) ? $query->result_array() : false;
		return $devolver;
	}
	public function get_alumnos_familia_laboral($id,$limite = PHP_INT_MAX){
		$sql = "SELECT * FROM alumno WHERE id_login IN (SELECT id_login FROM alumno_curso a,curso c WHERE a.id_curso = c.id_curso AND id_familia = '$id') ORDER BY id_login LIMIT $limite";
		$query = $this->db->query($sql);
		$devolver = isset($query) ? $query->result_array() : false;
		return $devolver;
	}
	public function actualizar_alumno($parametros_alumno,$id_login){
		$sql = "UPDATE alumno SET nombre = '$parametros_alumno[nombre]', dni = '$parametros_alumno[dni]', telefono1 = $parametros_alumno[telefono], fecha_nacimiento = '$parametros_alumno[fecha_nacimiento]', codigo_postal= '$parametros_alumno[codigo_postal]', resumen= '$parametros_alumno[resumen]', experiencia= '$parametros_alumno[experiencia]'  WHERE id_login = $id_login";
		$query = $this->db->query($sql);
	}

	public function actualizar_familia($parametros_familia,$id_login){
		
	}

	public function actualizar_alumno_curso($parametros_alumno_curso,$id_login){
		$sql = "UPDATE alumno_curso SET fecha_inicio='$parametros_alumno_curso[fecha_inicio]', fecha_final='$parametros_alumno_curso[fecha_final]'  WHERE id_login = $id_login";
		$query = $this->db->query($sql);
	}
	public function id_login($id_login){
		$sql= "select * from alumno where id_login='$id_login'";
		$query = $this->db->query($sql);
		$row = $query->row_array();	
		return $row;
	}
	public function ruta($ruta, $id_login){
		$sql = "update  alumno set  logo=$ruta where id_login=$id_login";
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
	public function get_curso_alumno_borrado($id){
		$sql = "SELECT count(DISTINCT(id_login)) cuenta FROM alumno_curso WHERE id_curso = '$id'";
		$query = $this->db->query($sql);
        $row = $query->row();
        $devolver = $row ? $row->cuenta : false;
        return $devolver;
	}
	public function borrar_alumno_curso_con_id_curso($id){
		$sql = "DELETE FROM alumno_curso WHERE id_curso = '$id'";
		return $this->db->query($sql);
	}
	
	
}
?>