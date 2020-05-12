<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Todays_reminder_model extends CI_Model {
    
    public function get_todays_category_reminder($id) 
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        $query = $this->db->query("SELECT COUNT(reminder.id) AS reminders,reminder.category_id,category_master.category FROM `reminder` LEFT JOIN category_master ON category_master.id=reminder.category_id LEFT JOIN assign_team_member ON assign_team_member.reminder_id=reminder.id  WHERE reminder.task_date = '$curr_date' and assign_team_member.team_member_id = '$id' and reminder.reminder_status = '0' and reminder.status = '1' GROUP BY reminder.category_id");
        return $query->result();
    }
    
    public function get_categorywise_todays_reminder($id,$category_id)
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        $query = $this->db->select('*,reminder.id as reminder_id')
                          ->from('reminder')
                          ->join('category_master','category_master.id=reminder.category_id','left')
                          ->join('team_member','team_member.id=reminder.team_member_id','left')
                          ->join('assign_team_member','assign_team_member.reminder_id=reminder.id','left')
                          ->where('reminder.task_date',$curr_date)
                          ->where('reminder.category_id',$category_id)
                          ->where('assign_team_member.team_member_id',$id)
                          ->where('reminder.reminder_status',0)
                          ->where('reminder.status',1)
                          ->get();
        //print_r($query->result());exit();
        return $query->result();
    }
    
    public function get_all_todays_reminder($id)
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        $query = $this->db->select('*,reminder.id as reminder_id')
                          ->from('reminder')
                          ->join('category_master','category_master.id=reminder.category_id','left')
                          ->join('team_member','team_member.id=reminder.team_member_id','left')
                          ->join('assign_team_member','assign_team_member.reminder_id=reminder.id','left')
                          ->where('reminder.task_date',$curr_date)
                          ->where('assign_team_member.team_member_id',$id)
                          ->where('reminder.reminder_status',0)
                          ->where('reminder.status',1)
                          ->get();
        //print_r($query->result());exit();
        return $query->result();
    }
    
    public function get_todays_reminder_count($id)
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        //print_r($curr_date);exit();
        $query = $this->db->query("SELECT COUNT(reminder.id) as reminders from reminder LEFT JOIN assign_team_member ON assign_team_member.reminder_id=reminder.id where reminder.task_date = STR_TO_DATE('$curr_date', '%Y-%m-%d') and assign_team_member.team_member_id = '$id' and reminder.reminder_status = '0' and reminder.status = '1' ");
        //print_r($this->db->last_query());exit();
        //print_r($query->result());exit();
        return $query->result();
    }
    
    public function get_upcoming_category_reminder($id)
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        //$three_days = date('Y-m-d', strtotime('+3 days', strtotime("NOW")));
        $query = $this->db->query("SELECT COUNT(reminder.id) AS reminders,reminder.category_id,category_master.category FROM `reminder` LEFT JOIN category_master ON category_master.id=reminder.category_id LEFT JOIN assign_team_member ON assign_team_member.reminder_id=reminder.id WHERE reminder_start_date = STR_TO_DATE('$curr_date', '%Y-%m-%d')  and assign_team_member.team_member_id = '$id' and reminder.reminder_status = '0' and reminder.status = '1' GROUP BY reminder.category_id");
        return $query->result();
    }
    
    public function get_categorywise_upcoming_reminder($id,$category_id)
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        //$three_days = date('Y-m-d', strtotime('+3 days', strtotime("NOW")));
        $where = "reminder_start_date = STR_TO_DATE('$curr_date', '%Y-%m-%d') and category_id = '$category_id' and assign_team_member.team_member_id = '$id' and reminder.status = '1' and reminder.reminder_status = '0' ";
        $query = $this->db->select('*,reminder.id as reminder_id')
                          ->from('reminder')
                          ->join('category_master','category_master.id=reminder.category_id','left')
                          ->join('team_member','team_member.id=reminder.team_member_id','left')
                          ->join('assign_team_member','assign_team_member.reminder_id=reminder.id','left')
                          ->where($where)
                          ->get();
        //print_r($query->result());exit();
        return $query->result();
    } 
    
    public function get_all_upcoming_reminder($id)
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        //$three_days = date('Y-m-d', strtotime('+3 days', strtotime("NOW")));
        //print_r($three_days);exit();
        //date_default_timezone_set('Asia/Kolkata');
        //$info = getdate();
        //$hour = $info['hours'];
        //$min = $info['minutes'];
        //print_r($min);exit();
        $where = "reminder_start_date = STR_TO_DATE('$curr_date', '%Y-%m-%d') and assign_team_member.team_member_id = '$id' and reminder.status = '1' and reminder.reminder_status = '0' ";
        $query = $this->db->select('*,reminder.id as reminder_id')
                          ->from('reminder')
                          ->join('category_master','category_master.id=reminder.category_id','left')
                          ->join('team_member','team_member.id=reminder.team_member_id','left')
                          ->join('assign_team_member','assign_team_member.reminder_id=reminder.id','left')
                          ->where($where)
                          ->get();
        //print_r($query->result());exit();
        //print_r($this->db->last_query());exit();
        return $query->result();
    }
    
    public function get_upcoming_reminder_count($id)
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        //$three_days = date('Y-m-d', strtotime('+3 days', strtotime("NOW"))); 
        $query = $this->db->query("SELECT COUNT(reminder.id) as reminders from reminder LEFT JOIN assign_team_member ON assign_team_member.reminder_id=reminder.id where reminder_start_date = STR_TO_DATE('$curr_date', '%Y-%m-%d') and assign_team_member.team_member_id = '$id' and reminder.status = '1' and reminder.reminder_status = '0' "); 
        //print_r($this->db->last_query());exit();
        //print_r($query->result());exit();
        return $query->result();
    }
    
    public function get_completed_reminder($id)
    {
        $query = $this->db->query("SELECT COUNT(reminder.id) AS reminders,reminder.category_id,category_master.category FROM `reminder` LEFT JOIN category_master ON category_master.id=reminder.category_id LEFT JOIN assign_team_member ON assign_team_member.reminder_id=reminder.id WHERE reminder.reminder_status ='1' and assign_team_member.team_member_id = '$id' and reminder.status = '1' GROUP BY reminder.category_id");
        return $query->result();
    }
    
    public function get_categorywise_completed_reminder($id,$category_id)
    {
        $where = "reminder_status = '1' and category_id = '$category_id' and assign_team_member.team_member_id='$id' and reminder.status = '1' ";
        $query = $this->db->select('*,reminder.id as reminder_id')
                          ->from('reminder')
                          ->join('category_master','category_master.id=reminder.category_id','left')
                          ->join('team_member','team_member.id=reminder.team_member_id','left')
                          ->join('assign_team_member','assign_team_member.reminder_id=reminder.id','left')
                          ->where($where)
                          ->get();
        //print_r($query->result());exit();
        return $query->result();
    }
    
    public function get_all_completed_reminder($id)
    {
        $where = "reminder_status = '1' and assign_team_member.team_member_id='$id' and reminder.status = '1' ";
        $query = $this->db->select('*,reminder.id as reminder_id')
                          ->from('reminder')
                          ->join('category_master','category_master.id=reminder.category_id','left')
                          ->join('team_member','team_member.id=reminder.team_member_id','left')
                          ->join('assign_team_member','assign_team_member.reminder_id=reminder.id','left')
                          ->where($where)
                          ->get();
        //print_r($query->result());exit();
        return $query->result();
    }
    
    public function get_completed_reminder_count($id)
    {
        $query = $this->db->query("SELECT COUNT(reminder.id) as reminders from reminder LEFT JOIN assign_team_member ON assign_team_member.reminder_id=reminder.id where reminder_status = '1' and assign_team_member.team_member_id = '$id' and reminder.status = '1'");
        //print_r($this->db->last_query());exit();
        //print_r($query->result());exit();
        return $query->result();
    }
    
    public function get_expired_category_reminder($id)
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        $query = $this->db->query("SELECT COUNT(reminder.id) AS reminders,reminder.category_id,category_master.category FROM `reminder` LEFT JOIN category_master ON category_master.id=reminder.category_id LEFT JOIN assign_team_member ON assign_team_member.reminder_id=reminder.id WHERE reminder.task_date < STR_TO_DATE('$curr_date', '%Y-%m-%d') and assign_team_member.team_member_id = '$id' and reminder.reminder_status= '0' and reminder.status = '1' GROUP BY reminder.category_id");
        return $query->result();
    }
    
    public function get_categorywise_expired_reminder($id,$category_id)
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        $where = "reminder.task_date < STR_TO_DATE('$curr_date', '%Y-%m-%d') and reminder.category_id = '$category_id' and assign_team_member.team_member_id = '$id' and reminder.reminder_status= '0' and reminder.status= '1' ";
        $query = $this->db->select('*,reminder.id as reminder_id')
                          ->from('reminder')
                          ->join('category_master','category_master.id=reminder.category_id','left')
                          ->join('team_member','team_member.id=reminder.team_member_id','left')
                          ->join('assign_team_member','assign_team_member.reminder_id=reminder.id','left')
                          ->where($where)
                          ->get();
        //print_r($query->result());exit();
        return $query->result();
    }
    
    public function get_all_expired_reminder($id)
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        $where = "task_date < STR_TO_DATE('$curr_date', '%Y-%m-%d') and assign_team_member.team_member_id = '$id' and reminder_status= '0' and reminder.status= '1' ";
        $query = $this->db->select('*,reminder.id as reminder_id')
                          ->from('reminder')
                          ->join('category_master','category_master.id=reminder.category_id','left')
                          ->join('team_member','team_member.id=reminder.team_member_id','left')
                          ->join('assign_team_member','assign_team_member.reminder_id=reminder.id','left')
                          ->where($where)
                          ->get();
        //print_r($query->result());exit();
        return $query->result();
    }
    
    public function get_expired_reminder_count($id)
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        $query = $this->db->query("SELECT COUNT(reminder.id) as reminders from reminder LEFT JOIN assign_team_member ON assign_team_member.reminder_id=reminder.id where task_date < STR_TO_DATE('$curr_date', '%Y-%m-%d') and assign_team_member.team_member_id = '$id' and reminder_status= '0' and reminder.status= '1' ");
        //print_r($this->db->last_query());exit();
        //print_r($query->result());exit();
        return $query->result();
    }
    
    public function get_notifications($id)
    {
        $query = $this->db->select('*,notification.date_created as date_now')
                          ->from('notification')
                          ->join('team_member','team_member.id=notification.team_member_id','left')
                          ->where('notification.team_member_id',$id)
                          ->order_by('notification.id','desc')
                          ->get();
        return $query->result();
    }
    
    public function get_notifications_count($id)
    {
        $query = $this->db->select('count(notification.id) as notification_count')
                          ->from('notification')
                          ->where('team_member_id',$id)
                          ->get();
        return $query->result();
    }
    
    public function resolve_reminder($reminder_id,$array,$comment)
    {
        $this->db->where('id',$reminder_id)
                 ->update('reminder',$array);
        
        $query = $this->db->select('*')
                          ->from('reminder')
                          ->join('category_master','category_master.id=reminder.category_id','left')
                          ->join('assign_team_member','assign_team_member.reminder_id=reminder.id','left')
                          ->join('team_member','team_member.id=assign_team_member.team_member_id','left')
                          ->where('reminder.id',$reminder_id)
                          ->get();
        //print_r($query->result());exit();
        $row =  $query->result();
        
        $name = $row[0]->name;
        $category = $row[0]->category;
        $title = $row[0]->title;
        $category_id = $row[0]->category_id;
        $team_member_id = $row[0]->team_member_id;
        date_default_timezone_set('Asia/Kolkata');
        $info = getdate();
        $hour = date("h:i:s A");
        //$min = $info['minutes'];
        
        $str = $name." has marked '".$title."' reminder as Resolved of Category ".$category." at ".$hour;
        
        $arr = array(
            'reminder_id' => $reminder_id,
            'category_id' => $category_id,
            'team_member_id' => $team_member_id,
            'log_activity' => $str,
            'comments' => $comment
            );
            
        $this->db->insert('log',$arr);
        $last_id = $this->db->insert_id();
        //return $last_id;
        
        $myadmins = $this->db->select('device_id')
                           ->from('admin_table')
                           ->like('category', $category)
                           ->get();
        $myresult = $myadmins->result_array();
        //print_r($myresult);exit();
        foreach( $myresult as $myres ){
            //print_r($myres['device_id']);exit();
            $users = $myres['device_id'];
            //print_r($users);exit();
        
        //print_r($users);exit();
        
        
        $message = $str;
        $user_id = $users;
        $content = array(
            "en" => "$message"
        );

        $fields = array(
            'app_id' => "be37c3e5-9b85-4f74-8736-6b4fc6f9fc69",
            'filters' => array(array("field" => "tag", "key" => "user_id", "relation" => "=", "value" => "$user_id")),
            'contents' => $content
        );

        $fields = json_encode($fields);
        //print("\nJSON sent:\n");
        //print($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
            'Authorization: Basic MjZjMTVlOTQtZTlhOS00ZmFkLWIxNzEtYTZhOTU5Y2M4Yzg2'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);
    
        $this->sendNotificationToAdmin($str,'Alert');
       echo $response;    
       }
        
    }
    
    public function get_single_reminder($id)
    {
        $query = $this->db->select('*')
                          ->from('reminder')
                          ->where('id',$id)
                          ->get();
        return $query->row();
    } 
    function sendNotificationToAdmin($msg,$msgTitle){
		$content = array(
			"en" => $msg
			);
		$heading=array(
		    "en"=>$msgTitle
		    );
		$fields = array(
			'app_id' => "2ce451d8-d9c5-4e92-ae45-3e0bbb15be99",
			'included_segments' => array('Active Users','Inactive Users'),
// 			'include_player_ids' => array($registrationIds),
			'data' => array("type" => "0"),
			'contents' => $content,
			'ios_badgeType'=>'Increase',
			'ios_badgeCount' =>1,
			//'large_icon'=>$imgUrl,
			'headings'=>$heading
		);
		
		$fields = json_encode($fields);
    	//print("\nJSON sent:\n");
    	//print_r($fields);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
												   'Authorization: Basic Y2IyNzU2ZGEtMWYzNS00MDVlLTk1NTgtYWIyYjI4MzBiYjZh'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);
		//var_dump($response);exit();
		//$response;
		//return $response;
	}
    
    
}

?>