<?php
class idioma_model extends CI_Model{
	public function __construct()
	{
		$this->load->database();
	}
	public function idioma($nombre = '%')
	{
		$query = $this->db->query("SELECT * FROM idioma WHERE
				nombre COLLATE utf8_general_ci LIKE '%$nombre%' COLLATE utf8_general_ci 
      		ORDER BY id_idioma");
		$row = $query->result_array();
		$idioma = $row ? $row : false;
		return $idioma;
	}
	public function nivelleido()
	{
		$query = $this->db->query('SELECT * FROM nivel where tipo="leido"');
		$row = $query->result_array();
		$nivelleido = $row ? $row : false;
		return $nivelleido;
	}
	public function nivelescrito()
	{
		$query = $this->db->query('SELECT * FROM nivel where tipo="escrito"');
		$row = $query->result_array();
		$nivelescrito = $row ? $row : false;
		return $nivelescrito;
	}
	public function nivelhablado()
	{
		$query = $this->db->query('SELECT * FROM nivel where tipo="oral"');
		$row = $query->result_array();
		$nivelhablado = $row ? $row : false;
		return $nivelhablado;
	}
	public function agregar_idioma($nombre){
		$sql = "INSERT INTO idioma (nombre) VALUES ('$nombre')";
		$this->db->query($sql);
		return $this->db->insert_id();
	}
	public function editar_idioma($id,$nombre){
		$sql = "UPDATE idioma SET nombre = '$nombre' WHERE id_idioma='$id' ";
		return $this->db->query($sql);
	}
	public function borrar_idioma($id){
		$sql = "DELETE FROM idioma WHERE id_idioma = $id";
		return $this->db->query($sql);
	}
    public function borrar_alumno_idioma($id){
        $sql = "DELETE FROM alumno_idioma WHERE id_idioma = $id";
        return $this->db->query($sql);
    }
    public function get_numero_idioma_borrado($id){
        $sql = "SELECT count(DISTINCT(id_login)) cuenta FROM alumno_idioma WHERE id_idioma = '$id'";
        $query = $this->db->query($sql);
        $row = $query->row();
        $devolver = $row ? $row->cuenta : false;
        return $devolver;
    }	
    public function actualizar_idioma($parametros_alumno_idioma,$id_login){
		$sql = "UPDATE alumno_idioma SET idioma= '$parametros_alumno_idioma[idioma]' where id_login=$id_login";
		$query = $this->db->query($sql);
	}
}
?>