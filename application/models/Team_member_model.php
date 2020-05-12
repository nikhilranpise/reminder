<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team_member_model extends CI_Model {
    
    public function get_all_team_member()
    {
        $query = $this->db->select('*,category_master.id as category_master_id,team_member.id as team_member_id')
                          ->from('team_member')
                          ->join('category_master','category_master.id=team_member.category_id','left')
                          ->get();
        return $query->result();
    }
    
    public function insert_team_member($array)
    {
        $this->db->insert('team_member',$array);
        $id = $this->db->insert_id();
        return $id;
    }
    
    public function get_one_team_member($id)
    {
        $query = $this->db->select('*,team_member.id as team_member_id')
                          ->from('team_member')
                          ->join('category_master','category_master.id=team_member.category_id','left')
                          ->where('team_member.id',$id)
                          ->get();
        return $query->result();
    }
    
    public function update_team_member($array,$id)
    {
        $this->db->where('id',$id)
                 ->update('team_member',$array);
        $row = $this->db->affected_rows();
        return $row;
    }
    
    public function delete_team_member($id)
    {
        $this->db->where('id',$id)
                 ->delete('team_member');
        $row = $this->db->affected_rows();
        return $row;
    }
    
    public function send_message($array)
    {
        $this->db->insert('notification',$array);
        $id = $this->db->insert_id();
        //return $id;
        
        $query = $this->db->select('*')
                          ->from('notification')
                          ->join('team_member','team_member.id=notification.team_member_id','left')
                          ->where('notification.id',$id)
                          ->get();
        return $query->row();
    }
    
    public function get_admins()
    {
        $query = $this->db->select('*')
                          ->from('admin_table')
                          ->get();
        return $query->result();
    }
    
    public function get_all_categories()
    {
        $query = $this->db->select('*')
                          ->from('category_master')
                          ->get();
        return $query->result();
    }
    
    public function get_one_admin($id)
    {
        $query = $this->db->select('*')
                          ->from('admin_table')
                          ->where('adm_id',$id)
                          ->get();
        return $query->result();
    }
    
    public function insert_admin($array)
    {
        $this->db->insert('admin_table',$array);
        return $this->db->insert_id();
    }
    
    public function update_admin($array,$id)
    {
        $this->db->where('adm_id',$id)
                 ->update('admin_table',$array);
        return $this->db->affected_rows();
    }
    
    public function check_password($id)
    {
        $query = $this->db->select('password')
                          ->from('admin_table')
                          ->where('adm_id',$id)
                          ->get();
        return $query->row();
    }
    
    
    
}

?>