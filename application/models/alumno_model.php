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
	public function actualizar($parametros,$id_login){
		$sql = "UPDATE alumno SET nombre = '$parametros[nombre]', dni = '$parametros[cif]', telefono1 = $parametros[telefono], telefono2 = $parametros[telefono2], persona_contacto= '$parametros[persona_contacto]'  WHERE id_login = $id_login";
		$query = $this->db->query($sql);
		//$row = $query->row();	
		//return $row;
	}
}
?>