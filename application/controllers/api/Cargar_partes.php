<?php
class Cargar_partes extends CI_Controller{
	
public function __construct(){
	parent::__construct();
	$this->load->helper('url_helper');
}
public function cargar($pagina){
	$this->load->view("partes/$pagina");
}
public function imgempresa(){
	$this->load->view();
}
}