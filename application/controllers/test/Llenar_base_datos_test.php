<?php 
class Llenar_base_datos_test extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
				$this->load->model('test/llenar_base_datos_model_test','usuarios');
        }
		public function index(){
			
			$this->usuarios->usuarios();
		}
}

 ?>