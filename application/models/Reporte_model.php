<?php 
class Reporte_model extends CI_Model{
	public function __construct()
        {
                $this->load->database();
        }
	
	public function get_reportes(){
		$sql = "SELECT * FROM reporte";
		$query = $this->db->query($sql);
		$devolver = isset($query) ? $query->result_array() : false;
		return $devolver;
	}
}

	