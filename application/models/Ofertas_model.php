<?php 
class Ofertas_model extends CI_Model{
	public function __construct()
        {
                $this->load->database();
        }
	
	public function datos_oferta($id_login){
		$sql = " SELECT * FROM oferta WHERE id_login=$id_login";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0){
		           $todo = $query->result_array();	
						return $todo;
		    }
		    return null;
	}
	public function etiqueta(){
		$sql = "SELECT * FROM etiqueta";
		$query = $this->db->query($sql);
		$row = $query->result_array();
		$etiqueta = $row ? $row : false;
		return $etiqueta;
	}

	
	public function insertar($parametros){
		$sql = "INSERT INTO oferta (titulo,fechae,lugar,telefono,requisito,sueldo,funciones,ofrece,familia,etiquetas,correo,horario)
				VALUES ($parametros[titulo],$parametros[fechae],$parametros[lugar],$parametros[telefono]$parametros[requisito],$parametros[sueldo],$parametros[funciones],$parametros[ofrece],$parametros[familia],$parametros[etiquetas],$parametros[correo],$parametros[horario])";
		$query = $this->db->query($sql);
		
	}

	public function agregar_etiqueta($nombre,$familia){
	    $sql = "INSERT INTO etiqueta(nombre,id_familia_laboral) VALUES ('$nombre','$familia')";
        return $this->db->query($sql);
	}

	

	


	public function editar_etiqueta($nombre,$id){
		$sql = "UPDATE etiqueta SET nombre = '$nombre' WHERE id_etiqueta='$id' ";
		return $this->db->query($sql);
	}
	public function get_numero_etiqueta_alumno_borrado($id){
        $sql = "SELECT count(DISTINCT(id_login)) cuenta FROM etiqueta_alumno WHERE  id_etiqueta = '$id'";
        $query = $this->db->query($sql);
        $row = $query->row();
        $devolver = $row ? $row->cuenta : false;
        return $devolver;
    }
	public function get_numero_etiqueta_oferta_borrado($id){
        $sql = "SELECT count(DISTINCT(id_oferta)) cuenta FROM etiqueta_oferta WHERE  id_etiqueta = '$id'";
        $query = $this->db->query($sql);
        $row = $query->row();
        $devolver = $row ? $row->cuenta : false;
        return $devolver;
    }
	public function borrar_etiqueta_alumno($id){
        $sql = "DELETE FROM etiqueta_alumno WHERE id_etiqueta = $id";
        return $this->db->query($sql);
    }
	public function borrar_etiqueta_oferta($id){
        $sql = "DELETE FROM etiqueta_oferta WHERE id_etiqueta = $id";
        return $this->db->query($sql);
    }
	public function borrar_etiqueta($id){
		$sql = "DELETE FROM etiqueta WHERE id_etiqueta = $id";
		return $this->db->query($sql);
	}
	public function get_id_etiqueta_con_id_familia($id){
	    $sql = "SELECT id_etiqueta FROM etiqueta WHERE id_familia_laboral='$id'";
        $query = $this->db->query($sql);
        $row = $query->result_array();
        $id = $row ? $row : false;
        return $id;
	}

	public function get_nombre($id){
		$sql = "SELECT nombre FROM oferta WHERE id_oferta = '$id'";
		$query = $this->db->query($sql);
		$nombre = $query ? $query->row->nombre : false;
		return $nombre;
	}

}
?>