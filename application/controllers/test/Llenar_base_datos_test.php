<?php 
class Llenar_base_datos_test extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
            $this->load->helper('form','url_helper');
			$this->load->model('test/llenar_base_datos_model_test','usuarios');
        }
		public function index(){
			try{
			   $this->usuarios->usuarios(); 
			}
			catch(exception $exception){
			    
			}
            redirect(base_url('/login_controller'));
		}
}

 ?>