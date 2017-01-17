<?php 
class Editar_perfil_model extends CI_Model{
	public function __construct()
        {
                $this->load->database();
        }
		
	public function curso()
	{
		$query=$this->db->query("SELECT * FROM curso");
				$row = $query->result_array();
				$curso = $row ? $row : false;
				return $curso;
	}
}
?>