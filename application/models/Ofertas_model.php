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

	
	public function insertar(){
		$sql = "INSERT INTO oferta (titulo,fechae,lugar,telefono,requisito,sueldo,funciones,ofrece,familia,etiquetas,correo,horario)
				VALUES ($titulo,$fechae,$lugar,$telefono,$requisito,$sueldo,$funciones,$ofrece,$familia,$etiquetas,$correo,$horario)";
		$query = $this->db->query($sql);
		
	}

	public function agregar_etiqueta($nombre,$familia){
	    $sql = "INSERT INTO etiqueta(nombre,id_familia_laboral) VALUES ('$nombre','$familia')";
        return $this->db->query($sql);
	}
	

	

}
?>