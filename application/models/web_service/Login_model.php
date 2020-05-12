<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {
	
	public function check($username, $password)
    {	
        $query= $this->db->query("select * from  team_member where email='$username' and password='$password'");	
        return $query->row();
    }
    
    public function check_status($username, $password)
    {
        $query= $this->db->query("select * from  team_member where email='$username' and password='$password' and status='1' ");	
        return $query->row();
    }
    
    public function check_user($mobile)
    {
        $query = $this->db->select('*')
                          ->from('team_member')
                          ->where('mobile',$mobile)
                          ->get();
        return $query->row();
    }
    
    public function register_team_member($array)
    {
        $this->db->insert('team_member',$array);
        $id = $this->db->insert_id();
        return $id;
    }
    
    public function check_password($id,$password)
    {
        $query= $this->db->query("select id from  team_member where id='$id' and password='$password'");	
        return $query->row();
    }
    
    public function change_password($id,$array)
    {
        $this->db->where('id',$id)
                 ->update('team_member',$array);
        $row = $this->db->affected_rows();
        return $row;
    }
    
    public function check_email($email)
    {
        $query = $this->db->select('*')
                          ->from('team_member')
                          ->where('email',$email)
                          ->get();
        return $query->row();
    }
    
    public function update_password($array,$id)
    {
        $this->db->where('id',$id)
                 ->update('team_member',$array);
    }
    
    public function update_device_id($pri_id,$array)
    {
        $this->db->where('id',$pri_id)
                 ->update('team_member',$array);
        $row = $this->db->affected_rows();
        return $row;
    }
    
    
    
    
    
}