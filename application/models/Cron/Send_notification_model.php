<?php 

class Send_notification_model extends CI_Model{
    
    public function get_all_active_reminders()
    {
        $query = $this->db->select('*')
                          ->from('reminder')
                          ->where('status','1')
                          ->where('reminder_status','0')
                          ->order_by('id','desc')
                          ->get();
        return $query->result();
    }
    
    public function get_team_member($reminder_id)
    {
        $query = $this->db->select('*')
                          ->from('assign_team_member')
                          ->join('team_member','team_member.id=assign_team_member.team_member_id')
                          ->where('reminder_id',$reminder_id)
                          ->get();
        return $query->result();
    }
}

?>