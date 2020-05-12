<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team_member extends MY_Controller {

	public function show_team_member()
	{
	    $this->load->model('Team_member_model');
	    $data['posts'] = $this->Team_member_model->get_all_team_member();
	    //print_r($data);exit();
		$this->load->view('Admin/show_team_member',$data);
	}

	public function add_team_member()
	{
	    $this->load->model('Reminder_model');
	    $data['posts'] = $this->Reminder_model->get_all_categories();
		$this->load->view('Admin/add_team_member',$data);
	}

	public function store_team_member()
	{
	    $post = $this->input->post();
	    $array = array(
	        'category_id' => $post['category'],
	        'name' => $post['name'],
	        'mobile' => $post['mobile'],
	        'email' => $post['email'],
	        'password' => $post['password'],
	        'status' => $post['status']
	        );
	    $this->load->model('Team_member_model');
	    $inserted = $this->Team_member_model->insert_team_member($array);
	    $this->session->set_flashdata('tm_added','Team Member Added Successfully');
		redirect('team_member_master');
	}

	public function edit_team_member()
	{
	    $post = $this->input->post();
	    $id = $this->uri->segment(2);
	    $this->load->model('Team_member_model');
	    $data['posts'] = $this->Team_member_model->get_one_team_member($id);
	    $data['ghosts'] = $this->Reminder_model->get_all_categories();
	    //print_r($data);exit();
		$this->load->view('Admin/edit_team_member',$data);
	}

	public function update_team_member()
	{
	    //print_r($_POST);exit();
	    $this->load->model('Team_member_model');
	    $post = $this->input->post();
	    $id = $post['id'];
	    $array = array(
	        'category_id' => $post['category'],
	        'name' => $post['name'],
	        'mobile' => $post['mobile'],
	        'email' => $post['email'],
	        'password' => $post['password'],
	        'status' => $post['status']
	        );
	    $updated = $this->Team_member_model->update_team_member($array,$id);
	    $this->session->set_flashdata('tm_updated','Team Member Updated Successfully');
		redirect('team_member_master');
	}
	
	public function delete_team_member()
	{
	    $id = $this->uri->segment(2);
	    $this->load->model('Team_member_model');
	    $this->Team_member_model->delete_team_member($id);
	    $this->session->set_flashdata('tm_deleted','Team Member Deleted Successfully');
	    redirect('team_member_master');
	}
	
	public function show_admin()
	{
	    $this->load->model('Team_member_model');
	    $data['posts'] = $this->Team_member_model->get_admins();
	    $this->load->view('Admin/show_admin',$data);
	}
	
	public function add_admin()
	{
	    $data['posts'] = $this->Team_member_model->get_all_categories();
	    $this->load->view('Admin/add_admin',$data);
	}
	
	public function store_admin()
	{
	    
	    $post = $this->input->post();
	    $cat = implode(",",$post['category']);
	    //print_r($cat);exit();
	    $array = array(
	        'category' => $cat,
	        'name' => $post['name'],
	        'username' => $post['username'],
	        'password' => $post['password']
	        );
	    //print_r($array);exit();
	    $insert = $this->Team_member_model->insert_admin($array);
	    $this->session->set_flashdata('admin_added','Admin Added Successfully');
	    redirect('adminMaster');
	}
	
	public function edit_admin()
	{
	    $id = $this->uri->segment(2);
	    //print_r($id);exit();
	    $data['ghosts'] = $this->Team_member_model->get_one_admin($id);
	    $data['posts'] = $this->Team_member_model->get_all_categories();
	    //print_r($data['ghosts']);exit();
	    $this->load->view('Admin/edit_admin',$data);
	}
	
	public function update_admin()
	{
	    //print_r($_POST);exit();
	    $post = $this->input->post();
	    $id = $post['id'];
	    $cat = implode(",",$post['category']);
	    //print_r($cat);exit();
	    $array = array(
	        'category' => $cat,
	        'name' => $post['name'],
	        'username' => $post['username'],
	        'password' => $post['password']
	        );
	    $update = $this->Team_member_model->update_admin($array,$id);
	    $this->session->set_flashdata('admin_updated','Admin Updated Successfully');
	    redirect('adminMaster');
	    
	}
	
	public function change_password()
	{
	    $this->load->view('Admin/change_password');
	}
	
	public function update_password()
	{
	    //print_r($_POST);exit();
	    $post = $this->input->post();
	    $old_pass = $post['old_password'];
	    $sess = $this->session->userdata('admin_id');
	    //print_r($sess);exit();
	    $id = $sess->adm_id;
	    $check_pass = $this->Team_member_model->check_password($id);
	    if( $old_pass != $check_pass->password ){
	        $this->session->set_flashdata('wrong_password','Old password did not match');
	        redirect('changePassword');
	    }else{
    	    $array = array(
    	        'password' => $post['confirm_password']
    	        );
    	    $update = $this->Team_member_model->update_admin($array,$id);
    	    $this->session->set_flashdata('password_changed','Password Changed Successfully');
    	    redirect('changePassword');
	    }
	}
	
	
	
	
}