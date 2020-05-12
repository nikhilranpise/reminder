<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {
    
            public function commision_report()
                {
                $admin_id = $this->session->userdata('admin_id');
                $id = $admin_id->agent_id;
                $this->load->model('Place_order_model'); 
                $data['posts']=$this->Place_order_model->get_data($id);
                $this->load->view('Agent/commision_report',$data);
                } 
                
           public function get_commision_report()
                {
                $admin_id = $this->session->userdata('admin_id');
                $id = $admin_id->agent_id;
                $this->load->model('Place_order_model'); 
                $data['posts']=$this->Place_order_model->get_data($id);
                $this->load->view('Agent/get_commision_report',$data);
                } 
}
        