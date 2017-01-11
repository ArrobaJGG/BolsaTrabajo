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
	public function titulado()
	{
		$query = $this->db->query('SELECT * FROM nivel');
		$row = $query->result_array();
		$titulados= $row ? $row : false;
		return $titulados;		
	}
}
?>