<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
    
    public function get_todays_reminder()
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        $query = $this->db->select('*')
                          ->from('reminder')
                          ->where('task_date',$curr_date)
                          ->where('reminder_status','0')
                          ->get();
        //print_r($query->result());exit();
        return $query->result();
    }
    
    public function get_all_todays_categories()
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        $query = $this->db->query("SELECT COUNT(reminder.id) AS reminders,reminder.category_id,category_master.category FROM `reminder` JOIN category_master ON category_master.id=reminder.category_id WHERE reminder.task_date = '$curr_date' and reminder.reminder_status = 0 GROUP BY reminder.category_id");
        return $query->result();
    }
    
    public function getTodaysCategoryReminder($id)
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        $query = $this->db->select('*,reminder.status as status_ed,(SELECT GROUP_CONCAT(team_member.name) from team_member LEFT JOIN assign_team_member ON assign_team_member.team_member_id=team_member.id where assign_team_member.reminder_id=reminder.id) as names')
                          ->from('reminder')
                          ->join('category_master','category_master.id=reminder.category_id','left')
                          ->join('team_member','team_member.id=reminder.team_member_id','left')
                          ->where('task_date',$curr_date)
                          ->where('category_id',$id)
                          ->where('reminder_status','0')
                          ->get();
        //print_r($query->result());exit();
        return $query->result();
    }
    
    public function count_todays_reminders()
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        $query = $this->db->query("SELECT COUNT(id) as reminders from reminder where task_date = '$curr_date'");
        return $query->row();
    }
    
    public function get_all_todays_reminder($limit,$offset)
    {
        if($limit == 0){
            $startLimit=$limit;
            $endLimit= 10;
            }else{
            $startLimit=(($limit-1) * $offset);
            $endLimit=$offset;
        }
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        $query = $this->db->select('*,reminder.status as status_ed,(SELECT GROUP_CONCAT(team_member.name) from team_member LEFT JOIN assign_team_member ON assign_team_member.team_member_id=team_member.id where assign_team_member.reminder_id=reminder.id) as names')
                          ->from('reminder')
                          ->join('category_master','category_master.id=reminder.category_id','left')
                          ->join('team_member','team_member.id=reminder.team_member_id','left')
                          ->where('task_date',$curr_date)
                          ->where('reminder_status','0')
                          ->limit(10,$startLimit) 
                          ->get();
        //print_r($query->result());exit();
        return $query->result();
    }
    
    public function get_upcoming_reminder()
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        //print_r($curr_date);exit();
        $where = "task_date > STR_TO_DATE('$curr_date', '%Y-%m-%d') and reminder_status ='0' ";
        $query = $this->db->select('*')
                          ->from('reminder')
                          ->where($where)
                          ->get();
        //print_r($this->db->last_query());exit();
        return $query->result();
    }
    
    public function get_all_upcoming_categories()
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        $query = $this->db->query("SELECT COUNT(reminder.id) AS reminders,reminder.category_id,category_master.category FROM `reminder` JOIN category_master ON category_master.id=reminder.category_id WHERE reminder.task_date > STR_TO_DATE('$curr_date', '%Y-%m-%d') and reminder_status ='0' GROUP BY reminder.category_id");
        //print_r($this->db->last_query());exit();
        return $query->result();
    }
    
    public function getUpcomingCategoryReminder($id)
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        $where = "task_date > STR_TO_DATE('$curr_date', '%Y-%m-%d') and category_id = '$id' and reminder_status= '0'";
        $query = $this->db->select('*,reminder.status as status_ed,(SELECT GROUP_CONCAT(team_member.name) from team_member LEFT JOIN assign_team_member ON assign_team_member.team_member_id=team_member.id where assign_team_member.reminder_id=reminder.id) as names')
                          ->from('reminder')
                          ->join('category_master','category_master.id=reminder.category_id','left')
                          ->join('team_member','team_member.id=reminder.team_member_id','left')
                          ->where($where)
                          ->get();
        //print_r($this->db->last_query());exit();
        //print_r($query->result());exit();
        return $query->result();
    }
    
    public function count_upcoming_reminders()
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        $query = $this->db->query("SELECT COUNT(id) as reminders from reminder where task_date > STR_TO_DATE('$curr_date', '%Y-%m-%d') and reminder_status= '0'");
        return $query->row();
    }
    
    public function get_all_upcoming_reminder($limit,$offset)
    {
        if($limit == 0){
            $startLimit=$limit;
            $endLimit= 10;
            }else{
            $startLimit=(($limit-1) * $offset);
            $endLimit=$offset;
        }
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        $where = "task_date > STR_TO_DATE('$curr_date', '%Y-%m-%d') and reminder_status= '0' ";
        $query = $this->db->select('*,reminder.status as status_ed,(SELECT GROUP_CONCAT(team_member.name) from team_member LEFT JOIN assign_team_member ON assign_team_member.team_member_id=team_member.id where assign_team_member.reminder_id=reminder.id) as names')
                          ->from('reminder')
                          ->join('category_master','category_master.id=reminder.category_id','left')
                          ->join('team_member','team_member.id=reminder.team_member_id','left')
                          ->where($where)
                          ->limit(10,$startLimit)
                          ->get();
        //print_r($this->db->last_query());exit();
        //print_r($query->result());exit();
        return $query->result();
    }
    
    public function get_completed_reminder()
    {
        $where = "reminder_status = 1";
        $query = $this->db->select('*')
                          ->from('reminder')
                          ->where($where)
                          ->get();
        return $query->result();
    }
    
    public function get_all_completed_categories()
    {
        $query = $this->db->query("SELECT COUNT(reminder.id) AS reminders,reminder.category_id,category_master.category FROM `reminder` JOIN category_master ON category_master.id=reminder.category_id WHERE reminder.reminder_status = '1' GROUP BY reminder.category_id");
        //print_r($this->db->last_query());exit();
        return $query->result();
    }
    
    public function getCompletedCategoryReminder($id)
    {
        $where = "reminder_status = '1' and category_id = '$id'";
        $query = $this->db->select('*,reminder.status as status_ed,(SELECT GROUP_CONCAT(team_member.name) from team_member LEFT JOIN assign_team_member ON assign_team_member.team_member_id=team_member.id where assign_team_member.reminder_id=reminder.id) as names')
                          ->from('reminder')
                          ->join('category_master','category_master.id=reminder.category_id','left')
                          ->join('team_member','team_member.id=reminder.team_member_id','left')
                          ->where($where)
                          ->get();
        //print_r($this->db->last_query());exit();
        //print_r($query->result());exit();
        return $query->result();
    }
    
    public function count_completed_reminders()
    {
        $query = $this->db->query("SELECT COUNT(id) as reminders from reminder where reminder_status = '1'");
        return $query->row();
    }
    
    public function get_all_completed_reminder($limit,$offset)
    {
        if($limit == 0){
            $startLimit=$limit;
            $endLimit= 10;
            }else{
            $startLimit=(($limit-1) * $offset);
            $endLimit=$offset;
        }
        $where = "reminder_status = '1' ";
        $query = $this->db->select('*,reminder.status as status_ed,(SELECT GROUP_CONCAT(team_member.name) from team_member LEFT JOIN assign_team_member ON assign_team_member.team_member_id=team_member.id where assign_team_member.reminder_id=reminder.id) as names')
                          ->from('reminder')
                          ->join('category_master','category_master.id=reminder.category_id','left')
                          ->join('team_member','team_member.id=reminder.team_member_id','left')
                          ->where($where)
                          ->limit(10,$startLimit)
                          ->get(); 
        //print_r($this->db->last_query());exit();
        //print_r($query->result());exit();
        return $query->result();
    }
    
    public function get_expired_reminder()
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        //print_r($curr_date);exit();
        $where = "reminder_status = '0' and task_date < STR_TO_DATE('$curr_date', '%Y-%m-%d')";
        $query = $this->db->select('*')
                          ->from('reminder')
                          ->where($where)
                          ->get();
        //print_r($this->db->last_query());exit();
        return $query->result();
    }
    
    public function get_all_expired_categories()
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        $query = $this->db->query("SELECT COUNT(reminder.id) AS reminders,reminder.category_id,category_master.category FROM `reminder` JOIN category_master ON category_master.id=reminder.category_id WHERE reminder.task_date < STR_TO_DATE('$curr_date', '%Y-%m-%d') and reminder_status = '0' GROUP BY reminder.category_id");
        //print_r($this->db->last_query());exit();
        return $query->result();
    }
    
    public function getExpiredCategoryReminder($id)
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        $where = "reminder_status = '0' and task_date < STR_TO_DATE('$curr_date', '%Y-%m-%d') and category_id = '$id'";
        $query = $this->db->select('*,reminder.status as status_ed,(SELECT GROUP_CONCAT(team_member.name) from team_member LEFT JOIN assign_team_member ON assign_team_member.team_member_id=team_member.id where assign_team_member.reminder_id=reminder.id) as names')
                          ->from('reminder')
                          ->join('category_master','category_master.id=reminder.category_id','left')
                          ->join('team_member','team_member.id=reminder.team_member_id','left')
                          ->where($where)
                          ->get();
        //print_r($this->db->last_query());exit();
        //print_r($query->result());exit();
        return $query->result();
    }
    
    
    
    public function count_expired_reminders()
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        $query = $this->db->query("SELECT COUNT(id) as reminders from reminder where reminder_status = '0' and task_date < STR_TO_DATE('$curr_date', '%Y-%m-%d')");
        return $query->row();
    }
    
    public function get_All_Expired_Reminder($limit,$offset)
    {
        if($limit == 0){
            $startLimit=$limit;
            $endLimit= 10;
            }else{
            $startLimit=(($limit-1) * $offset);
            $endLimit=$offset;
        }
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        $where = "reminder_status = '0' and task_date < STR_TO_DATE('$curr_date', '%Y-%m-%d')";
        $query = $this->db->select('*,reminder.status as status_ed,(SELECT GROUP_CONCAT(team_member.name) from team_member LEFT JOIN assign_team_member ON assign_team_member.team_member_id=team_member.id where assign_team_member.reminder_id=reminder.id) as names')
                          ->from('reminder')
                          ->join('category_master','category_master.id=reminder.category_id','left')
                          ->join('team_member','team_member.id=reminder.team_member_id','left')
                          ->where($where)
                          ->limit(10,$startLimit)
                          ->get();
        //print_r($this->db->last_query());exit();
        //print_r($query->result());exit();
        return $query->result();
    }
    
    
    
    
}

?>