<?php

class Repeat_reminder_model extends CI_Model{
    
    public function get_all_active_reminders()
    {
        $query = $this->db->select('*')
                          ->from('repeat_reminder')
                          ->where('repeat_status','1')
                          ->get();
        return $query->result();
    }
    
    public function get_daily_reminder($reminder_id)
    {
        $query = $this->db->select('*')
                          ->from('reminder')
                          ->where('id',$reminder_id)
                          ->get();
        return $query->row();
    }
    
    public function insert_subarray($insertSubarray)
    {
        $this->db->insert('reminder',$insertSubarray);
        return $this->db->insert_id();
    }
    
    public function get_all_team_members($main_id)
    {
        $query = $this->db->select('assign_id')
                          ->from('assign_team_member')
                          ->where('reminder_id',$main_id)
                          ->get();
        return $query->result();
    }
    
    public function insert_multiple_team_member($next_array)
    {
        $this->db->insert('assign_team_member',$next_array);
        $id = $this->db->insert_id();
        return $id;
    }
}

?>