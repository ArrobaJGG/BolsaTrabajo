<?php 
class Llenar_base_datos_model_test extends CI_Model{
	public function __construct()
    {
        $this->load->database();
    }
	
	public function usuarios(){
		$sql = "
			INSERT INTO `login` 
				(`correo`, `contrasena`, `rol`, `fecha_creacion`, `ultimo_login`, `validado`, `hash_validar`) 
			VALUES
				('empresa@hotmail.com', '$2y$10\$DUexlsAWIJcd/zZZnbhDEe7n0YfuCQMM6XJGP.5.7FfAEMK/XlCOa', 'empresa', '2016-12-23', '2016-12-23', 1, '2y10ezRrS9U0iSZw5GjuJchkZuNdqpjlUitDhfuIjAS6in.g6ewxL4l6'),
				('alumno@hotmail.com', '$2y$10\$Yv5Np20Lc2.aK44A8rJEH.dE3Bj2.uLzhCNtjOJn0ri6LjIfF8eN2', 'alumno', '2016-12-23', '2016-12-23', 1, '2y10ssjgweeJz2g9Nhcgjv7yNu8MgNxMZExLygACtHn0nqyB.wBKA6mG'),
				('administrador@hotmail.com', '$2y$10\$qaAjkuI6dFFvVhM4FErfrukgm0RIVWXzof2BvRNSK0v1Zzy3x2IKS', 'administrador', '2016-12-23', '2016-12-23', 1, '2y10UNzuuUoCrcoKnT2wCj8HevGUFY76iPBu1tgNEYGMQZMHwKKuod7S'),
				('profesor@hotmail.com', '$2y$10\$zrA55ClQ9e5g1kRUXoxID./ywCqGQGCJyxFZlhENpsu8GX2bIxPFa', 'profesor', '2017-02-08', '2017-02-08', '2y10NhJ4pEa6TmT4JtqsXlg0iuoZ9nG5tDVlmqSFpHiBCSqjx8DVubeUe', '1');
		";
		  $this->db->query($sql);
		  $id_alumno = $this->db->query("SELECT id_login FROM login WHERE correo = 'alumno@hotmail.com'")->row()->id_login;
		  $id_empresa = $this->db->query("SELECT id_login FROM login WHERE correo = 'empresa@hotmail.com'")->row()->id_login;

		  $sql_alumno ="
		  	INSERT INTO `alumno` 
		  		(id_login, dni, nombre, apellidos, estado)
			VALUES
				('$id_alumno','12345678A','alumno','alumno alumno',true)
		  ";
		  $sql_empresa = "
		  	INSERT INTO `empresa`
		  		(id_login,estado)
			VALUES
				('$id_empresa',true)
		  ";
		  $this->db->query($sql_alumno);
		  $this->db->query($sql_empresa);
	}
}
?>