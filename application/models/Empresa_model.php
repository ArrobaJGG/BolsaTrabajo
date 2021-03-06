<?php 
class Empresa_model extends CI_Model{
	public function __construct()
        {
                $this->load->database();
        }
	public function crear_empresa($datos){
		$sql = "INSERT INTO empresa(id_login,nombre) 
					VALUES ('".$datos['id_login']."','".
					$datos['nombre'].
					"')";
		return $this->db->query($sql);
	}

	
	public function id_login($id_login){
		$sql= "select * from empresa where id_login='$id_login'";
		$query = $this->db->query($sql);
		$row = $query->row();	
		return $row;
	}
	public function actualizar($parametros,$id_login){
		$sql = "UPDATE empresa SET nombre = '$parametros[nombre]', cif = '$parametros[cif]', telefono1 = '$parametros[telefono]', telefono2 = '$parametros[telefono2]', persona_contacto= '$parametros[persona_contacto]'  WHERE id_login = $id_login";
		$query = $this->db->query($sql);
		//$row = $query->row();	
		//return $row;
	}
	public function ruta($ruta, $id_login){
		$sql = "update  empresa set  logo=$ruta where id_login=$id_login";
		$query = $this->db->query($sql);
	}
	
	public function validar_empresa($id){
		$sql = "UPDATE empresa SET estado = true WHERE id_login = $id";
		return $this->db->query($sql);
	}
	
	public function get_empresas($datos){
		$sql = "SELECT * FROM empresa,login WHERE
		      empresa.id_login = login.id_login
              AND nombre COLLATE utf8_general_ci LIKE '%$datos[nombre]%' COLLATE utf8_general_ci 
              AND correo COLLATE utf8_general_ci LIKE '%$datos[correo]%' COLLATE utf8_general_ci
              AND validado = true 
          ORDER BY empresa.id_login DESC LIMIT $datos[offset], $datos[limite]";
		$query = $this->db->query($sql);
		$devolver['empresas'] = isset($query) ? $query->result_array() : false;
        $devolver['numero_lineas'] = $this->db->query("SELECT count(empresa.id_login) numero_lineas FROM empresa,login WHERE
              empresa.id_login = login.id_login
              AND nombre COLLATE utf8_general_ci LIKE '%$datos[nombre]%' COLLATE utf8_general_ci 
              AND correo COLLATE utf8_general_ci LIKE '%$datos[correo]%' COLLATE utf8_general_ci
              AND validado = true 
          ORDER BY empresa.id_login")->row()->numero_lineas;
		return $devolver;
	}
	public function borrar_empresa($id){
		$sql = "DELETE FROM empresa WHERE id_login = '$id'";
		return $this->db->query($sql);
	}
	public function get_nuevas_altas($limit = PHP_MAX_INT){
		$sql = "SELECT nombre,correo,empresa.id_login 'id_login' FROM empresa,login WHERE login.id_login = empresa.id_login AND estado=false AND validado=true ORDER BY empresa.id_login DESC LIMIT $limit";
		$query = $this->db->query($sql);
		$devolver = isset($query) ? $query->result_array() : false;
		return $devolver;
	}
	public function get_nombre($id){
		$sql = "SELECT nombre FROM empresa WHERE id_login='$id'";
		$query = $this->db->query($sql);
		$devolver = isset($query) ? $query->row()->nombre : false;
		return $devolver;
	}
}
?>