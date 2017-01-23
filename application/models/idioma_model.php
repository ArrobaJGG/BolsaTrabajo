<?php
class idioma_model extends CI_Model{
	public function __construct()
	{
		$this->load->database();
	}
	public function idioma()
	{
		$query = $this->db->query('SELECT * FROM idioma');
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
		return $this->db->query($sql);
	}
	public function editar_idioma($id,$nombre){
		$sql = "UPDATE idioma SET nombre = '$nombre' WHERE id_idioma='$id' ";
		return $this->db->query($sql);
	}
	public function borrar_idioma($id){
		$sql = "DELETE FROM idioma WHERE id_idioma = $id";
		return $this->db->query($sql);
	}
}
?>