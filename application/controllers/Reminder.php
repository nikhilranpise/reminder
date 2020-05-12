<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reminder extends MY_Controller {

	public function show_reminder() 
	{
	    $this->load->model('Reminder_model');
	    $data['count_reminder'] = $this->Reminder_model->count_rem();
	    $total = $data['count_reminder']->reminders;
	    //print_r($total);exit();
	    $this->load->library('pagination');
        $config['base_url'] = base_url().'reminder/';
        $config['total_rows'] = $total;
        $config['per_page'] = 10;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 5;
        $config['full_tag_open'] = "<ul class='pagination pull-center'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = "<li class='paginate_button '>";
        $config['num_tag_close'] = "</li>";
        $config['cur_tag_open'] = "<li class='active'><a aria-controls='example' data-dt-idx='3' tabindex='0'>";
        $config['cur_tag_close'] = "</a></li>";
        $config['next_tag_open'] = "<li class='paginate_button '>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li class='paginate_button '>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li class='paginate_button '>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li class='paginate_button '>";
        $config['last_tagl_close'] = "</li>";
        $config['first_link'] = 'FIRST';
        $config['prev_link'] = 'PREVIOUS';
        $config['next_link'] = 'NEXT';
        $config['last_link'] = 'LAST';
        $this->pagination->initialize($config);
        $prod_id = $this->uri->segment(2);
        $data['prod_id']=$prod_id;
    	if(empty($prod_id))
    	{        $product_id = 0;
    	}else{
            $product_id = $prod_id;
    	}
    	$data['links']=$this->pagination->create_links();
        $data['posts'] = $this->Reminder_model->get_all_reminders($product_id,$config['per_page']); 
	    $data['ghosts'] = $this->Reminder_model->get_team_mem();
	    //print_r($data['posts']);exit();
		$this->load->view('Admin/show_reminder',$data);
	}
    

    public function add_reminder() 
    {
        $this->load->model('Reminder_model');
        $data['posts'] = $this->Reminder_model->get_all_categories();
        $data['ghosts'] = $this->Reminder_model->get_all_members(); 
        //print_r($data['posts']);exit();
    	$this->load->view('Admin/add_reminder',$data);
    }
    
    public function store_reminder()
    {
        //print_r($_POST);exit();
        $post = $this->input->post();
        //$member = count($post['team_member_id']);
        //print_r($member);exit();
        
         //print_r($i);exit();   
        $array = array(
            'category_id' => $post['category'],
            'title' => $post['title'],
            'description' => $post['description'],
            'task_time' => $post['task_time'],
            'task_date' => $post['task_date'],
            //'repeat_reminder' => $post['repeat_reminder'],
            'reminder_start_date' => $post['reminder_start_date'],
            'reminder_start_time' => $post['reminder_start_time'],
            'repeat_reminder_every' => $post['repeat_reminder_every'],
            'priority' => $post['priority'],
            'status' => $post['status'],
            );
        //print_r($array);exit();
        $this->load->model('Reminder_model');
        $inserted = $this->Reminder_model->store_reminder($array); 
        
        foreach($post['team_member_id'] as $mem){
            $next_array = array(
                'reminder_id' => $inserted,
                'team_member_id' => $mem
                );
            //print_r($next_array);exit();
            $insertTeamMember = $this->Reminder_model->insert_multiple_team_member($next_array);
            //print_r($insertTeamMember);exit();
        }
        
        //print_r($inserted);exit();
        $this->session->set_flashdata('reminder_added','Reminder Added Successfully');
        redirect('reminder');
    }

    public function edit_reminder()
    {
        $id = $this->uri->segment(2);
        //print_r($id);exit();
        $this->load->model('Reminder_model');
        $data['rows'] = $this->Reminder_model->edit_reminder($id);
        $data['posts'] = $this->Reminder_model->get_all_categories();
        $data['ghosts'] = $this->Reminder_model->get_all_members();
        $data['assigned_members'] = $this->Reminder_model->get_assigned_members($id);
        //print_r($data['ghosts'][1]->name);exit();
        //print_r($data['assigned_members']);exit();
        /*foreach($data['assigned_members'] as $mem){
            
        }
        print_r($mem);exit();*/
    	$this->load->view('Admin/edit_reminder',$data);
    }

    public function update_reminder() 
    {
        //print_r($_POST);exit();
        $post = $this->input->post(); 
        $id = $post['id'];
        //print_r($id);exit(); 
        $this->load->model('Reminder_model');
        $array = array(
            'category_id' => $post['category'],
            'title' => $post['title'],
            'description' => $post['description'],
            'task_time' => $post['task_time'],
            'task_date' => $post['task_date'],
            //'repeat_reminder' => $post['repeat_reminder'],
            'reminder_start_date' => $post['reminder_start_date'],
            'reminder_start_time' => $post['reminder_start_time'],
            'repeat_reminder_every' => $post['repeat_reminder_every'],
            'priority' => $post['priority'], 
            'status' => $post['status'],
            );
        $delete = $this->Reminder_model->delete_reminder_assigned($id);
        foreach( $post['team_member_id'] as $mem ){
            $next_array = array(
                'reminder_id' => $id,
                'team_member_id' => $mem
                );
            //print_r($next_array);exit();
            $insertTeamMember = $this->Reminder_model->insert_multiple_team_member($next_array);
            //print_r($insertTeamMember);exit();
        }
        $updated = $this->Reminder_model->update_reminder($array,$id);
        
        $this->session->set_flashdata('reminder_updated','Reminder Updated Successfully');
        //print_r($updated);exit();
    	redirect('reminder');
    }
    
    public function delete_reminder()
    {
        $id = $this->uri->segment(2);
        $this->load->model('Reminder_model');
        $this->Reminder_model->delete_reminder($id);
        $this->session->set_flashdata('reminder_deleted','Reminder Deleted Successfully');
        redirect('reminder');
    }
    
    public function add_repeat_reminder()
    {
        //print_r($_POST);exit();
        $post = $this->input->post(); 
        $this->load->model('Reminder_model');
        if(!empty($post['day'])){
            $array = array(
            'reminder_id' => $post['reminder_id'],
            'frequency' => $post['frequency'],
            'day' => $post['day'],
            'repeat_date_start' => $post['repeat_date_start'],
            'repeat_date_end' => $post['repeat_date_end']
            );
        }else{
            $array = array(
            'reminder_id' => $post['reminder_id'],
            'frequency' => $post['frequency'],
            'repeat_date_start' => $post['repeat_date_start'],
            'repeat_date_end' => $post['repeat_date_end']
            );
        }
        
        $inserted = $this->Reminder_model->insert_repeat($array);
        redirect('show_repeat_reminders');
    }
    
    public function show_repeat_reminders()
    {
        $this->load->model('Reminder_model');
        $data['count_reminder'] = $this->Reminder_model->count_repeat_reminders();
	    $total = $data['count_reminder']->reminders;
	    //print_r($total);exit();
	    $this->load->library('pagination');
        $config['base_url'] = base_url().'show_repeat_reminders/';
        $config['total_rows'] = $total;
        $config['per_page'] = 10;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 5;
        $config['full_tag_open'] = "<ul class='pagination pull-center'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = "<li class='paginate_button '>";
        $config['num_tag_close'] = "</li>";
        $config['cur_tag_open'] = "<li class='active'><a aria-controls='example' data-dt-idx='3' tabindex='0'>";
        $config['cur_tag_close'] = "</a></li>";
        $config['next_tag_open'] = "<li class='paginate_button '>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li class='paginate_button '>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li class='paginate_button '>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li class='paginate_button '>";
        $config['last_tagl_close'] = "</li>";
        $config['first_link'] = 'FIRST';
        $config['prev_link'] = 'PREVIOUS';
        $config['next_link'] = 'NEXT';
        $config['last_link'] = 'LAST';
        $this->pagination->initialize($config);
        $prod_id = $this->uri->segment(2);
        $data['prod_id']=$prod_id;
    	if(empty($prod_id))
    	{        $product_id = 0;
    	}else{
            $product_id = $prod_id;
    	}
    	$data['links']=$this->pagination->create_links();
        $data['posts'] = $this->Reminder_model->get_repeat_reminders($product_id,$config['per_page']);
        //print_r($data);exit();
        $this->load->view('Admin/show_repeat_reminders',$data);
    }
    
    

}