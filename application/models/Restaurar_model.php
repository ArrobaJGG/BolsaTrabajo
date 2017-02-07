<?php 
class Restaurar_model extends CI_Model{
    public function __construct()
        {
                $this->load->database();
        }
        public function ejecutar($sql){
            $this->db->query($sql);
        }
}