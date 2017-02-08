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
	public function get_curso_id_login($id_login){
		$query=$this->db->query("SELECT id_curso FROM alumno_curso where id_login='$id_login'");
		$row = $query->row();
		$cursos_alumno = $row ? $row->id_curso : false;
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
        $this->db->query($sql);
        return $this->db->insert_id();
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
	public function agregar_curso($nombre,$id,$id_familia){
		$sql= "INSERT INTO curso (nombre,id_categoria,id_familia) VALUES ('$nombre','$id','$id_familia')";
        $this->db->query($sql);
        return $this->db->insert_id();
	}
	public function editar_curso($datos){
        $sql = "UPDATE curso SET nombre = '$datos[nombre]', id_categoria = '$datos[id_categoria]',id_familia='$datos[id_familia]'  WHERE id_curso='$datos[id_curso]' ";
        return $this->db->query($sql);
    }
	public function borrar_curso($id){
		$sql = "DELETE FROM curso WHERE id_curso='$id'";
        return $this->db->query($sql);
	}
	public function curso_familia(){
		$query=$this->db->query("SELECT * FROM curso");
		$row = $query->result_array();
		$cursos_familia = $row ? $row : false;
		return $cursos_familia;
	}
}
?>