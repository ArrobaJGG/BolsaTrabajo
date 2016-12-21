<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_inicio extends CI_Migration {

        public function up()
        {
		 
		$this->db->query("
			CREATE TABLE IF NOT EXISTS `bolsa_trabajo`.`login` (
			  `id_login` INT NOT NULL AUTO_INCREMENT,
			  `correo` VARCHAR(45) NOT NULL,
			  `contrasena` VARCHAR(128) NOT NULL,
			  `rol` VARCHAR(20) NOT NULL,
			  `fecha_creacion` DATE NOT NULL,
			  `ultimo_login` DATE NOT NULL,
			  `validado` TINYINT(1) NOT NULL,
			  `hash_validar` VARCHAR(128) NOT NULL,
			  PRIMARY KEY (`id_login`),
			  UNIQUE INDEX `correo_UNIQUE` (`correo` ASC))
			ENGINE = InnoDB");
			
		$this->db->query("
			CREATE TABLE IF NOT EXISTS `bolsa_trabajo`.`alumno` (
			  `id_login` INT NOT NULL,
			  `dni` VARCHAR(9) NULL,
			  `nombre` VARCHAR(20) NULL,
			  `apellidos` VARCHAR(20) NULL,
			  `telefono1` VARCHAR(14) NULL,
			  `telefono2` VARCHAR(14) NULL,
			  `estado` TINYINT(1) NOT NULL,
			  `fecha_nacimiento` DATE NULL,
			  `resumen` TEXT NULL,
			  `codigo_postal` INT NULL,
			  `perfil_oculto` TEXT NULL,
			  `experiencia` TEXT NULL,
			  PRIMARY KEY (`id_login`),
			  CONSTRAINT `id_login_alumno`
			    FOREIGN KEY (`id_login`)
			    REFERENCES `bolsa_trabajo`.`login` (`id_login`)
			    ON DELETE NO ACTION
			    ON UPDATE NO ACTION)
			ENGINE = InnoDB");
		
		$this->db->query("
			CREATE TABLE IF NOT EXISTS `bolsa_trabajo`.`empresa` (
			  `id_login` INT NOT NULL,
			  `cif` VARCHAR(12) NULL,
			  `telefono1` VARCHAR(14) NULL,
			  `telefono2` VARCHAR(14) NULL,
			  `persona_contacto` VARCHAR(20) NULL,
			  `nombre` VARCHAR(45) NULL,
			  `estado` TINYINT(1) NOT NULL,
			  PRIMARY KEY (`id_login`),
			  CONSTRAINT `id_login_empresa`
			    FOREIGN KEY (`id_login`)
			    REFERENCES `bolsa_trabajo`.`login` (`id_login`)
			    ON DELETE NO ACTION
			    ON UPDATE NO ACTION)
			ENGINE = InnoDB");
		
		$this->db->query("
			CREATE TABLE IF NOT EXISTS `bolsa_trabajo`.`familia_laboral` (
			  `id_familia_laboral` INT NOT NULL,
			  `nombre` VARCHAR(20) NOT NULL,
			  PRIMARY KEY (`id_familia_laboral`))
			ENGINE = InnoDB");
		
		$this->db->query("
			CREATE TABLE IF NOT EXISTS `bolsa_trabajo`.`profesor` (
			  `id_login` INT NOT NULL,
			  `nombre` VARCHAR(20) NOT NULL,
			  `apellidos` VARCHAR(20) NOT NULL,
			  `id_familia_laboral` INT NOT NULL,
			  `activo` TINYINT(1) NOT NULL,
			  PRIMARY KEY (`id_login`),
			  INDEX `id_familia_laboral_idx` (`id_familia_laboral` ASC),
			  CONSTRAINT `id_login_profesor`
			    FOREIGN KEY (`id_login`)
			    REFERENCES `bolsa_trabajo`.`login` (`id_login`)
			    ON DELETE NO ACTION
			    ON UPDATE NO ACTION,
			  CONSTRAINT `id_familia_laboral_profesor`
			    FOREIGN KEY (`id_familia_laboral`)
			    REFERENCES `bolsa_trabajo`.`familia_laboral` (`id_familia_laboral`)
			    ON DELETE NO ACTION
			    ON UPDATE NO ACTION)
			ENGINE = InnoDB");
		
		$this->db->query("
			CREATE TABLE IF NOT EXISTS `bolsa_trabajo`.`curso` (
			  `id_curso` INT NOT NULL AUTO_INCREMENT,
			  `id_familia` INT NOT NULL,
			  `nombre` VARCHAR(45) NOT NULL,
			  PRIMARY KEY (`id_curso`, `id_familia`),
			  INDEX `id_familia_idx` (`id_familia` ASC),
			  CONSTRAINT `id_familia`
			    FOREIGN KEY (`id_familia`)
			    REFERENCES `bolsa_trabajo`.`familia_laboral` (`id_familia_laboral`)
			    ON DELETE NO ACTION
			    ON UPDATE NO ACTION)
			ENGINE = InnoDB");
		
		$this->db->query("
			CREATE TABLE IF NOT EXISTS `bolsa_trabajo`.`alumno_curso` (
			  `id_login` INT NOT NULL,
			  `id_curso` INT NOT NULL,
			  `fecha_inicio` DATE NOT NULL,
			  `fecha_final` DATE NOT NULL,
			  PRIMARY KEY (`id_login`, `id_curso`),
			  INDEX `id_curso_idx` (`id_curso` ASC),
			  CONSTRAINT `id_login_curso`
			    FOREIGN KEY (`id_login`)
			    REFERENCES `bolsa_trabajo`.`alumno` (`id_login`)
			    ON DELETE NO ACTION
			    ON UPDATE NO ACTION,
			  CONSTRAINT `id_curso_login`
			    FOREIGN KEY (`id_curso`)
			    REFERENCES `bolsa_trabajo`.`curso` (`id_curso`)
			    ON DELETE NO ACTION
			    ON UPDATE NO ACTION)
			ENGINE = InnoDB");
		
		$this->db->query("
			CREATE TABLE IF NOT EXISTS `bolsa_trabajo`.`idioma` (
			  `id_idioma` INT NOT NULL AUTO_INCREMENT,
			  `nombre` VARCHAR(45) NOT NULL,
			  PRIMARY KEY (`id_idioma`))
			ENGINE = InnoDB");
		
		$this->db->query("
			CREATE TABLE IF NOT EXISTS `bolsa_trabajo`.`nivel` (
			  `id_nivel` INT NOT NULL,
			  `titulacion` VARCHAR(45) NOT NULL,
			  `equivalencia` VARCHAR(45) NOT NULL,
			  `tipo` VARCHAR(45) NOT NULL,
			  PRIMARY KEY (`id_nivel`))
			ENGINE = InnoDB");
		
		$this->db->query("
			CREATE TABLE IF NOT EXISTS `bolsa_trabajo`.`alumno_idioma` (
			  `id_login` INT NOT NULL,
			  `id_idioma` INT NOT NULL,
			  `id_nivel` INT NOT NULL,
			  `titulo` TINYINT(1) NULL,
			  PRIMARY KEY (`id_login`, `id_idioma`, `id_nivel`),
			  INDEX `id_nivel_idx` (`id_nivel` ASC),
			  INDEX `id_idioma_idx` (`id_idioma` ASC),
			  CONSTRAINT `id_login_idioma`
			    FOREIGN KEY (`id_login`)
			    REFERENCES `bolsa_trabajo`.`alumno` (`id_login`)
			    ON DELETE NO ACTION
			    ON UPDATE NO ACTION,
			  CONSTRAINT `id_idioma_alumno`
			    FOREIGN KEY (`id_idioma`)
			    REFERENCES `bolsa_trabajo`.`idioma` (`id_idioma`)
			    ON DELETE NO ACTION
			    ON UPDATE NO ACTION,
			  CONSTRAINT `id_nivel_alumno`
			    FOREIGN KEY (`id_nivel`)
			    REFERENCES `bolsa_trabajo`.`nivel` (`id_nivel`)
			    ON DELETE NO ACTION
			    ON UPDATE NO ACTION)
			ENGINE = InnoDB");
		
		$this->db->query("
			CREATE TABLE IF NOT EXISTS `bolsa_trabajo`.`oferta` (
			  `id_oferta` INT NOT NULL AUTO_INCREMENT,
			  `id_login` INT NULL,
			  `id_familia` INT NOT NULL,
			  `nombre_empresa` VARCHAR(45) NOT NULL,
			  `fecha_creacion` DATE NOT NULL,
			  `fecha_expiracion` DATE NOT NULL,
			  `lugar` VARCHAR(45) NULL,
			  `resumen` TEXT NULL,
			  `funciones` TEXT NULL,
			  `ofrece` TEXT NULL,
			  `sueldo` VARCHAR(45) NULL,
			  `requisitos` TEXT NULL,
			  `horario` VARCHAR(45) NULL,
			  `titulo` VARCHAR(45) NULL,
			  `correo` VARCHAR(45) NULL,
			  `telefono` VARCHAR(45) NULL,
			  `oculto` TINYINT(1) NOT NULL,
			  PRIMARY KEY (`id_oferta`, `id_familia`),
			  INDEX `id_login_idx` (`id_login` ASC),
			  INDEX `id_familia_idx` (`id_familia` ASC),
			  CONSTRAINT `id_login_oferta`
			    FOREIGN KEY (`id_login`)
			    REFERENCES `bolsa_trabajo`.`login` (`id_login`)
			    ON DELETE NO ACTION
			    ON UPDATE NO ACTION,
			  CONSTRAINT `id_familia_oferta`
			    FOREIGN KEY (`id_familia`)
			    REFERENCES `bolsa_trabajo`.`familia_laboral` (`id_familia_laboral`)
			    ON DELETE NO ACTION
			    ON UPDATE NO ACTION)
			ENGINE = InnoDB");
		
		$this->db->query("
			CREATE TABLE IF NOT EXISTS `bolsa_trabajo`.`etiqueta` (
			  `id_etiqueta` INT NOT NULL AUTO_INCREMENT,
			  `nombre` VARCHAR(45) NOT NULL,
			  `id_famila_laboral` INT NOT NULL,
			  PRIMARY KEY (`id_etiqueta`, `id_famila_laboral`),
			  INDEX `id_familia_laboral_fk_idx` (`id_famila_laboral` ASC),
			  CONSTRAINT `id_familia_laboral_fk`
			    FOREIGN KEY (`id_famila_laboral`)
			    REFERENCES `bolsa_trabajo`.`familia_laboral` (`id_familia_laboral`)
			    ON DELETE NO ACTION
			    ON UPDATE NO ACTION)
			ENGINE = InnoDB");
		
		$this->db->query("
			CREATE TABLE IF NOT EXISTS `bolsa_trabajo`.`etiqueta_oferta` (
			  `id_etiqueta` INT NOT NULL,
			  `id_oferta` INT NOT NULL,
			  PRIMARY KEY (`id_etiqueta`, `id_oferta`),
			  INDEX `id_oferta_idx` (`id_oferta` ASC),
			  CONSTRAINT `id_oferta_fk`
			    FOREIGN KEY (`id_oferta`)
			    REFERENCES `bolsa_trabajo`.`oferta` (`id_oferta`)
			    ON DELETE NO ACTION
			    ON UPDATE NO ACTION,
			  CONSTRAINT `id_etiqueta_fkfk`
			    FOREIGN KEY (`id_etiqueta`)
			    REFERENCES `bolsa_trabajo`.`etiqueta` (`id_etiqueta`)
			    ON DELETE NO ACTION
			    ON UPDATE NO ACTION)
			ENGINE = InnoDB");
		
		$this->db->query("
			CREATE TABLE IF NOT EXISTS `bolsa_trabajo`.`etiqueta_alumno` (
			  `id_etiqueta` INT NOT NULL,
			  `id_login` INT NOT NULL,
			  PRIMARY KEY (`id_etiqueta`, `id_login`),
			  INDEX `id_login_idx` (`id_login` ASC),
			  CONSTRAINT `id_login_fk_fk`
			    FOREIGN KEY (`id_login`)
			    REFERENCES `bolsa_trabajo`.`alumno` (`id_login`)
			    ON DELETE NO ACTION
			    ON UPDATE NO ACTION,
			  CONSTRAINT `id_etiqueta_fk_fk`
			    FOREIGN KEY (`id_etiqueta`)
			    REFERENCES `bolsa_trabajo`.`etiqueta` (`id_etiqueta`)
			    ON DELETE NO ACTION
			    ON UPDATE NO ACTION)
			ENGINE = InnoDB");
		
		$this->db->query("
			CREATE TABLE IF NOT EXISTS `bolsa_trabajo`.`reporte` (
			  `id_reporte` INT NOT NULL AUTO_INCREMENT,
			  `descripcion` TEXT NOT NULL,
			  `tipo` VARCHAR(45) NOT NULL,
			  `id_entidad` INT NOT NULL,
			  PRIMARY KEY (`id_reporte`))
			ENGINE = InnoDB");
		
		$this->db->query("
			CREATE TABLE IF NOT EXISTS `bolsa_trabajo`.`oferta_alumno` (
			  `id_oferta` INT NOT NULL,
			  `id_login` INT NOT NULL,
			  PRIMARY KEY (`id_oferta`, `id_login`),
			  INDEX `id_login_idx` (`id_login` ASC),
			  CONSTRAINT `id_oferta_fk_oferta`
			    FOREIGN KEY (`id_oferta`)
			    REFERENCES `bolsa_trabajo`.`oferta` (`id_oferta`)
			    ON DELETE NO ACTION
			    ON UPDATE NO ACTION,
			  CONSTRAINT `id_login_oferta_fk`
			    FOREIGN KEY (`id_login`)
			    REFERENCES `bolsa_trabajo`.`alumno` (`id_login`)
			    ON DELETE NO ACTION
			    ON UPDATE NO ACTION)
			ENGINE = InnoDB");
		
		$this->db->query("
			CREATE TABLE IF NOT EXISTS `bolsa_trabajo`.`experiencia` (
			  `id_login` INT NOT NULL,
			  `nombre_empresa` VARCHAR(45) NOT NULL,
			  `trabajo_realizado` VARCHAR(45) NOT NULL,
			  `fecha_inicio` DATE NOT NULL,
			  `fecha_fin` DATE NULL,
			  PRIMARY KEY (`id_login`),
			  CONSTRAINT `id_login_experiencia`
			    FOREIGN KEY (`id_login`)
			    REFERENCES `bolsa_trabajo`.`alumno` (`id_login`)
			    ON DELETE NO ACTION
			    ON UPDATE NO ACTION)
			ENGINE = InnoDB");
        }

        public function down()
        {
        	
        	$this->db->query("SET FOREIGN_KEY_CHECKS=0");
	        $this->db->query("DROP TABLE IF EXISTS login");
	        $this->db->query("DROP TABLE IF EXISTS alumno");
	        $this->db->query("DROP TABLE IF EXISTS empresa");
	        $this->db->query("DROP TABLE IF EXISTS profesor");
	        $this->db->query("DROP TABLE IF EXISTS nivel");
	        $this->db->query("DROP TABLE IF EXISTS idioma");
	        $this->db->query("DROP TABLE IF EXISTS curso");
	        $this->db->query("DROP TABLE IF EXISTS alumno_curso");
			$this->db->query("DROP TABLE IF EXISTS familia_laboral");
			$this->db->query("DROP TABLE IF EXISTS oferta");
			$this->db->query("DROP TABLE IF EXISTS etiqueta");
			$this->db->query("DROP TABLE IF EXISTS etiqueta_oferta");
			$this->db->query("DROP TABLE IF EXISTS oferta_alumno");
	        $this->db->query("DROP TABLE IF EXISTS experiencia");
	        $this->db->query("DROP TABLE IF EXISTS reporte");
	        $this->db->query("DROP TABLE IF EXISTS alumno_idioma");
			$this->db->query("DROP TABLE IF EXISTS etiqueta_alumno");
	        $this->db->query("SET FOREIGN_KEY_CHECKS=1");
        }
}