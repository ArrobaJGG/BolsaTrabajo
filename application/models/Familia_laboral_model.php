<?php 
class Familia_laboral_model extends CI_Model{
	public function __construct()
        {
                $this->load->database();
        }
	public function familia()
	{
				$query=$this->db->query("SELECT * FROM familia_laboral");
				$row = $query->result_array();
				$familia = $row ? $row : false;
				return $familia;
	}
}
?>