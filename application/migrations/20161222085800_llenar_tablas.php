<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_llenar_tablas extends CI_Migration {

        public function up()
        {
                $this->db->query("
            		INSERT INTO familia_laboral(nombre)
            		VALUES
            		('Informatica'),
            		('Electricidad y electronica'),
            		('Comercio y Marketing'),
            		('Quimica')	
                ");
				$this->db->query("
            		INSERT INTO categoria(nombre)
            		VALUES
            		('Grado Superior'),
            		('Grado Medio'),
            		('Hobetuz')	
                ");
				$tabla = $this->db->query("SELECT * FROM categoria");
				$categorias = array();
				foreach ($tabla->result() as $fila)
				{
					
					$categorias[$fila->nombre]= $fila->id_categoria;
				}
				//*
				$tabla = $this->db->query("SELECT * FROM familia_laboral");
				$familias = array();
				foreach ($tabla->result() as $fila)
				{
					echo $fila->nombre;
					$familias[$fila->nombre]= $fila->id_familia_laboral;
				}
				$this->db->query("
            		INSERT INTO curso(id_familia,id_categoria,nombre)
            		VALUES
            		(
            			'".$familias['Informatica']."','".
            			$categorias['Grado Superior']."',
            			'Técnico superior en Desarrollo de aplicaciones multiplataforma'
					),
            		(
            			'".$familias['Informatica']."','".
            			$categorias['Grado Superior']."',
            			'técnico superior en Desarrollo de aplicaciones web'
					),
					(
            			'".$familias['Informatica']."','".
            			$categorias['Grado Superior']."',
            			'técnico superior en administrador de sistemas informaticos en red'
					),
					(
						'".$familias['Quimica']."','".
						$categorias['Grado Superior']."',
						'técnico superior en laboratorio de análisis y de control de calidad'
					),
					(
						'".$familias['Comercio y Marketing']."','".
						$categorias['Grado Superior']."',
						'técnico superior en administración y finanzas'
					),
					(
						'".$familias['Comercio y Marketing']."','".
						$categorias['Grado Superior']."',
						'técnico superior en gestión de ventas y finanzas'
					),
					(
						'".$familias['Comercio y Marketing']."','".
						$categorias['Grado Medio']."',
						'técnico en actividades comerciales'
					),
					(
						'".$familias['Electricidad y electronica']."','".
						$categorias['Grado Medio']."',
						'técnico en instalaciones de telecomunicaciones'
					),
					(
						'".$familias['Informatica']."','".
						$categorias['Grado Medio']."',
						'técnico en instalaciones microinformáticos y redes'
					)
                ");//*/
        		  $this->db->query("
            		INSERT INTO idioma(nombre)
            		VALUES
            		('Euskera'),
            		('Ingles'),
            		('Aleman'),
            		('Frances')	
                ");
                  $this->db->query("
            		INSERT INTO nivel(titulacion,equivalencia,tipo)
            		VALUES
            		('C1','alto','oral'),
            		('B1','medio','oral'),
            		('A1','bajo','oral'),
            		('C1','alto','escrito'),
            		('B1','medio','escrito'),
            		('A1','bajo','escrito'),
            		('C1','alto','leido'),
            		('B1','medio','leido'),
            		('A1','bajo','leido')
                ");
        }

        public function down()
        {
        	 $this->db->query("SET FOREIGN_KEY_CHECKS=0");
             $this->db->query("TRUNCATE TABLE curso");
             $this->db->query("TRUNCATE TABLE categoria");
             $this->db->query("TRUNCATE TABLE familia_laboral");
             $this->db->query("SET FOREIGN_KEY_CHECKS=1");
        }
}