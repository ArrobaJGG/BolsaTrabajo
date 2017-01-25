<?php 
class Familia_laboral_model extends CI_Model{
	public function __construct()
        {
                $this->load->database();
        }
	public function familia()
	{
				$query=$this->db->query("SELECT * FROM familia_laboral");
				$row = $query->result_array();
				$familia = $row ? $row : false;
				return $familia;
	}
    public function editar_familia($id,$nombre){
        $sql = "UPDATE familia_laboral SET nombre = '$nombre' WHERE id_familia_laboral='$id' ";
        return $this->db->query($sql);
    }
    public function get_numero_familia_oferta_borrado($id){
        $sql = "SELECT count(DISTINCT(id_oferta)) cuenta FROM oferta WHERE id_familia = '$id'";
        $query = $this->db->query($sql);
        $row = $query->row();
        $devolver = $row ? $row->cuenta : false;
        return $devolver;
    }
    public function get_numero_familia_profesor_borrado($id){
        $sql = "SELECT count(DISTINCT(id_login)) cuenta FROM profesor WHERE id_familia_laboral = '$id'";
        $query = $this->db->query($sql);
        $row = $query->row();
        $devolver = $row ? $row->cuenta : false;
        return $devolver;
    }
    public function get_numero_familia_etiqueta_borrado($id){
        $sql = "SELECT count(DISTINCT(id_etiqueta)) cuenta FROM etiqueta WHERE id_familia_laboral = '$id'";
        $query = $this->db->query($sql);
        $row = $query->row();
        $devolver = $row ? $row->cuenta : false;
        return $devolver;
    }
    public function get_numero_familia_curso_borrado($id){
        $sql = "SELECT count(DISTINCT(id_curso)) cuenta FROM curso WHERE id_familia = '$id'";
        $query = $this->db->query($sql);
        $row = $query->row();
        $devolver = $row ? $row->cuenta : false;
        return $devolver;
    }
}
?>