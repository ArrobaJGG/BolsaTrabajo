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
	public function borrar_reporte($id){
		$sql = "DELETE FROM reporte WHERE id_reporte='$id'";
		return $this->db->query($sql);
	}
    public function borrar_reportes_relacionados($id){
        $sql ="DELETE FROM reporte WHERE id_entidad='$id'";
        return $this->db->query($sql);
    }
}

	