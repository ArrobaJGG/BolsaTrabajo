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
    public function get_categoria(){
        $query=$this->db->query("SELECT * FROM categoria");
        $row = $query->result_array();
        $cursos_alumno = $row ? $row : false;
        return $cursos_alumno;
    }
    public function agregar_categoria($nombre){
        $sql= "INSERT INTO categoria (nombre) VALUES ('$nombre')";
        return $this->db->query($sql);
    }
    public function editar_categoria($id,$nombre){
        $sql = "UPDATE categoria SET nombre = '$nombre' WHERE id_categoria='$id' ";
        return $this->db->query($sql);
    }
    public function numero_categoria_borrado($id){
        $sql = "SELECT count(*) numero FROM curso WHERE id_categoria = '$id' ";
        $query = $this->db->query($sql);
        $numero = $query ? $query->row()->numero : false;
        return $numero;
    }
    public function borrar_categoria($id){
        $sql = "DELETE FROM categoria WHERE id_categoria='$id'";
        return $this->db->query($sql);
    }
}
?>