<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_modificar_tablas extends CI_Migration {
	
	public function up()
    {
    	$this->load->helper( 'url');
		$this->db->query("ALTER TABLE oferta ADD duracion VARCHAR(100)");
		$this->db->query("ALTER TABLE alumno ADD validado BOOLEAN DEFAULT FALSE");
		redirect(base_url('/instalacion/correo'));
	}
	public function down()
    {
    	$this->db->query("ALTER TABLE alumno DROP validado");
		$this->db->query("ALTER TABLE oferta DROP duracion");
	}	
}
	