<?php 
class Alumno_model extends CI_Model{
	public function __construct()
        {
                $this->load->database();
        }
	public function titulado()
		{
		$query = $this->db->query('SELECT * FROM alumno_idioma');
		$row = $query->result_array();
		$titulados= $row ? $row : false;
		return $titulados;		
		}
	public function alumnos()
	{
		$query = $this->db->query('SELECT * FROM alumno');
		$row = $query->result_array();
		$alumno= $row ? $row : false;
		return $alumno;	
	}
}
?>