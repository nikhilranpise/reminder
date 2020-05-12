<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reminder_model extends CI_Model {
    
    public function get_all_reminders($limit,$offset)
    {
        if($limit == 0){
            $startLimit=$limit;
            $endLimit= 10;
            }else{
            $startLimit=(($limit-1) * $offset);
            $endLimit=$offset;
        }
        $query = $this->db->select('*,reminder.id as reminder_id,reminder.status as status_ed,(SELECT GROUP_CONCAT(team_member.name) from team_member LEFT JOIN assign_team_member ON assign_team_member.team_member_id=team_member.id where assign_team_member.reminder_id=reminder.id) as names')
                          ->from('reminder')
                          ->join('category_master','category_master.id=reminder.category_id','left')
                          ->join('team_member','team_member.id=reminder.team_member_id','left')
                          //->join('assign_team_member','assign_team_member.reminder_id=reminder.id','left')
                          ->order_by('reminder.id','desc')
                          ->limit(10,$startLimit)
                          ->get();
        return $query->result(); 
    }
    
    public function get_team_mem()
    {
        /*$query = $this->db->select('*')
                          ->from('assign_team_member')
                          ->join('team_member','team_member.id=assign_team_member.team_member_id','left')
                          ->join('reminder','reminder.id=assign_team_member.reminder_id','left')
                          ->group_by('assign_team_member.reminder_id')
                          ->get();
        return $query->result();*/
        $query = $this->db->query("SELECT t1.*, GROUP_CONCAT(t2.name) AS names
                                    FROM assign_team_member t1
                                    LEFT JOIN team_member t2
                                      ON t2.id = t1.team_member_id
                                    LEFT JOIN reminder t3
                                      ON t3.id = t1.reminder_id
                                    GROUP BY t1.reminder_id");
        return $query->result();
    }
    
    public function count_rem()
    {
        $query = $this->db->query("SELECT COUNT(id) as reminders from reminder ");
        return $query->row();
    }
    
    public function count_repeat_reminders()
    {
        $query = $this->db->query("SELECT COUNT(request_id) as reminders from repeat_reminder ");
        return $query->row();
    }
    
    public function get_all_categories()
    {
        $query = $this->db->select('*')
                          ->from('category_master')
                          ->get();
        return $query->result();
    }
    
    public function get_all_members()
    {
        $query = $this->db->select('*')
                          ->from('team_member')
                          ->get();
        return $query->result();
    }
    
    public function get_assigned_members($id)
    {
        $query = $this->db->select('*')
                          ->from('assign_team_member')
                          ->where('reminder_id',$id)
                          ->get();
        return $query->result();
    }
    
    public function delete_reminder_assigned($id)
    {
        $this->db->where('reminder_id',$id)
                 ->delete('assign_team_member');
    }
    
    public function store_reminder($array)
    {
        $this->db->insert('reminder',$array);
        $id = $this->db->insert_id();
        return $id;
    }
    
    public function insert_multiple_team_member($next_array)
    {
        $this->db->insert('assign_team_member',$next_array);
        $id = $this->db->insert_id();
        return $id;
    }
    
    public function edit_reminder($id)
    {
        $query = $this->db->select('*,reminder.id as reminder_id')
                          ->from('reminder')
                          ->join('category_master','category_master.id=reminder.category_id','left')
                          ->join('team_member','team_member.id=reminder.team_member_id','left') 
                          ->where('reminder.id',$id)
                          ->get();
        return $query->result();
    }
    
    public function update_reminder($array,$id)
    {
        $this->db->where('id',$id)
                 ->update('reminder',$array);
        $row = $this->db->affected_rows();
        return $row;
    }
    
    public function delete_reminder($id)
    {
        $this->db->where('id',$id)
                 ->delete('reminder');
    }
    
    public function get_logs($limit,$offset)
    {
        if($limit == 0){
            $startLimit=$limit;
            $endLimit= 10;
            }else{
            $startLimit=(($limit-1) * $offset);
            $endLimit=$offset;
        }
        
        $query = $this->db->select('*')
                          ->from('log')
                          ->limit(10,$startLimit)
                          ->order_by('id','desc')
                          ->get();
        return $query->result();
    }
    
    public function count_log()
    {
        $query = $this->db->query("SELECT COUNT(id) as logs from log");
        return $query->row();
    }
    
    public function insert_repeat($array)
    {
        $this->db->insert('repeat_reminder',$array);
        return $this->db->insert_id();
        
    }
    
    public function get_repeat_reminders($limit,$offset)
    {
        if($limit == 0){
            $startLimit=$limit;
            $endLimit= 10;
            }else{
            $startLimit=(($limit-1) * $offset);
            $endLimit=$offset;
        }
        $query = $this->db->select('*')
                          ->from('repeat_reminder')
                          ->join('reminder','reminder.id=repeat_reminder.reminder_id','left')
                          ->join('category_master','category_master.id=reminder.category_id','left')
                          ->join('team_member','team_member.id=reminder.team_member_id','left')
                          ->limit(10,$startLimit)
                          ->get();
        return $query->result();
    }
    
    
    
    
    
}

?>