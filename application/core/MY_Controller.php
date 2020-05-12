<?php
class MY_Controller extends CI_Controller{

	 public function __construct(){
     parent::__construct();
                     //	$this->load->library('encrypt');  

	               if (! $this->session->userdata('admin_id') ) 
 		        return redirect('');
 			}

}
