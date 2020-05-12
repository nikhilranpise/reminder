<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication extends CI_Controller {
    
   
    public function validate()
    {
        if ($_POST) {     
    
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required'); 
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
         
        if($this->form_validation->run() == TRUE)
            {
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            //print_r($username);exit();
            $this->load->model('Authenticationmodal');
            $login_id=$this->Authenticationmodal->check($username,$password);
            //print_r($login_id);exit();
            if ($login_id) 
            {
                $this->session->set_userdata('admin_id',$login_id);
                    redirect('dashboard'); 
                  
                }else
               {
                $this->session->set_flashdata('login_failed','Invalid Username and Password');
		 			          return redirect('Welcome');
                }
                

            }else{
				$this->load->view('Login');

				  
			}
           
       }
        
        
    
    }
    
    public function update_admin()
    {
        $post = $this->input->post();
        $device_id = $post['random'];
        $sess = $this->session->userdata('admin_id');
	    //print_r($sess);exit();
	    $id = $sess->adm_id;
	    $this->load->model('Authenticationmodal');
	    $array = array(
	        'device_id' => $device_id
	        );
        $update = $this->Authenticationmodal->update_admin($id,$array);
	  
    }
    
    public function logout()
    { 
        $this->session->unset_userdata('admin_id'); 
        //$this->load->helper('cookie');
        //$cokie = 	get_cookie('ci_session');
        //delete_cookie('ci_session','tripzipholidays.com','/'); 
        //delete_cookie('cpsession','tripzipholidays.com','/');
        //delete_cookie('timezone','tripzipholidays.com','/');
        //print_r($cokie);exit();  
        redirect('');
    }

}	
?>