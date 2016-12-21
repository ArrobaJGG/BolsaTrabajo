<?php 
class Mail_controller extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
				$this->load->library('email');
        }
		public function index(){
			
			$this->email->from('arrobajgg@gmail.com', 'BolsaTrabajoFPTxurdinaga');
			$this->email->to('juanlu.vega993@gmail.com'); 
			
			$this->email->subject('Desde @JGG al mundo');
			$this->email->message('Este es un mensaje de prueba');	
			
			$this->email->send();
			
			echo $this->email->print_debugger();
		}
}

 ?>