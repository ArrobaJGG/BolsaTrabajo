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
	public function ofertas_alumno($id_login){
		$sql = "SELECT * FROM oferta WHERE id_familia IN (SELECT id_familia from curso c,alumno_curso a WHERE a.id_curso = c.id_curso AND id_login = '$id_login')";
		$query = $this->db->query($sql);
        $devolver = isset($query) ? $query->result_array() : false;	
		return $devolver;
	}
	public function traer_familia($id_familia){
		$sql = "select nombre from familia_laboral where id_familia_laboral = $id_familia";
		$query = $this->db->query($sql);
		$familia=  $query->result_array();
		return $familia;
		
	}
	public function get_ofertas($datos){
		$sql = " SELECT * FROM oferta ORDER BY id_oferta DESC  LIMIT $datos[offset],$datos[limite]";
		$query = $this->db->query($sql);
        $devolver['ofertas'] = isset($query) ? $query->result_array() : false;	
	    $devolver['numero_lineas'] = $this->db->query("SELECT count(id_oferta) numero_lineas FROM 
	       oferta ORDER BY id_oferta ")->row()->numero_lineas;
        return $devolver;
	}
	public function datos_una_oferta($id_oferta){
		$sql = " SELECT * FROM oferta WHERE id_oferta=$id_oferta";
		$query = $this->db->query($sql);
		$row = $query->row();
		return $row;
	}
	public function etiqueta(){
		$sql = "SELECT * FROM etiqueta";
		$query = $this->db->query($sql);
		$row = $query->result_array();
		$etiqueta = $row ? $row : false;
		return $etiqueta;
	}

	
	 public function insertar($parametros,$id_login){
	 	 $sql = "INSERT INTO oferta SET id_login=$id_login, id_familia='$parametros[id_familia]', nombre_empresa='$parametros[nombre]', fecha_creacion='$parametros[fechac]' , fecha_expiracion='$parametros[fechae]', lugar='$parametros[lugar]', resumen='$parametros[resumen]', funciones='$parametros[funciones]', ofrece='$parametros[ofrece]', sueldo='$parametros[sueldo]', requisitos='$parametros[requisito]', horario='$parametros[horario]', titulo='$parametros[titulo]', correo='$parametros[correo]', telefono='$parametros[telefono]', oculto='$parametros[oculto]', duracion='$parametros[duracion]'";
	 	 $query = $this->db->query($sql);
	 }
	

	public function agregar_etiqueta($nombre,$familia){
	    $sql = "INSERT INTO etiqueta(nombre,id_familia_laboral) VALUES ('$nombre','$familia')";
        $this->db->query($sql);
        return $this->db->insert_id();
	}
	public function actualizar($parametros,$id_oferta){
		$sql = "UPDATE oferta SET  id_familia='$parametros[id_familia]', nombre_empresa='$parametros[nombre]' , fecha_expiracion='$parametros[fechae]', lugar='$parametros[lugar]', resumen='$parametros[resumen]', funciones='$parametros[funciones]', ofrece='$parametros[ofrece]', sueldo='$parametros[sueldo]', requisitos='$parametros[requisito]', horario='$parametros[horario]', titulo='$parametros[titulo]', correo='$parametros[correo]', telefono='$parametros[telefono]', oculto='$parametros[oculto]' WHERE id_oferta=$id_oferta";
		$query = $this->db->query($sql);
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
	public function borrar_oferta($id){
		$sql = "DELETE FROM oferta WHERE id_oferta = $id";
		return $this->db->query($sql);
	}
	public function get_id_etiqueta_con_id_familia($id){
	    $sql = "SELECT id_etiqueta FROM etiqueta WHERE id_familia_laboral='$id'";
        $query = $this->db->query($sql);
        $row = $query->result_array();
        $id = $row ? $row : false;
        return $id;
	}
	public function get_ofertas_familia_laboral($id,$limit){
		$sql = "SELECT * FROM oferta WHERE id_familia = $id ORDER BY id_oferta LIMIT $limit";
		$query = $this->db->query($sql);
		$devolver = isset($query) ? $query->result_array() : false;
		return $devolver;
	}

	public function get_nombre($id){
		$sql = "SELECT nombre FROM oferta WHERE id_oferta = '$id'";
		$query = $this->db->query($sql);
		$nombre = $query ? $query->row->nombre : false;
		return $nombre;
	}
    public function borrar_ofertas_id_login($id){
        $this->db->trans_start();
        $sql = "DELETE FROM oferta_alumno WHERE id_oferta IN (SELECT id_oferta FROM oferta WHERE id_login = $id)";
        $this->db->query($sql);
        $sql = "DELETE FROM curso_oferta WHERE id_oferta IN (SELECT id_oferta FROM oferta WHERE id_login = $id)";
        $this->db->query($sql);
        $sql = "DELETE FROM etiqueta_oferta WHERE id_oferta IN (SELECT id_oferta FROM oferta WHERE id_login = $id)";
        $this->db->query($sql);
        $sql = "DELETE FROM oferta WHERE id_login=$id";
        $this->db->query($sql);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
        {
            return false;
        }
        else{
            return true;
        }
    }
	public function comprobar($id_oferta,$id_login){
		$sql = "select id_oferta from oferta where id_oferta= $id_oferta and id_login=$id_login";
		$query = $this->db->query($sql);
		$numerofilas = $query->num_rows();
		return $numerofilas;
		
	}

}
?>