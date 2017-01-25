<?php
class Curso_model extends CI_Model{
	public function __construct()
        {
                $this->load->database();
        }
	public function get_curso(){
		$query=$this->db->query("SELECT * FROM curso");
		$row = $query->result_array();
		$cursos_alumno = $row ? $row : false;
		return $cursos_alumno;
	}
}
?>