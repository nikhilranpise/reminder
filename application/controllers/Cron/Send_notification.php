<?php

class Send_notification extends CI_Controller{
    
    public function get_all_reminders()
    {
        $this->load->model('Cron/Send_notification_model');
        $reminders = $this->Send_notification_model->get_all_active_reminders(); 
        //print_r($reminders);exit();
        foreach( $reminders as $reminder ){
            //print_r($reminder);exit();
            $now = date('Y-m-d');
            //print_r($now);exit();
            if($now == $reminder->reminder_start_date || (strtotime($reminder->reminder_start_date) < strtotime($now) && strtotime($reminder->task_date) > strtotime($now))){
                //send notification
                $reminder_id = $reminder->id;
                //print_r($reminder_id);exit();
                $team_member = $this->Send_notification_model->get_team_member($reminder_id); 
                //print_r($team_member->team_member_id);exit();
                foreach( $team_member as $mem ){
                    $device_id = $mem->device_id;
                    //print_r($device_id);exit();
                
                //print_r($mem);exit();
                date_default_timezone_set("Asia/Kolkata");
                $start_time = $reminder->reminder_start_time;
                //print_r($reminder->task_time);exit();
                $task_due_time = $reminder->task_time;
                if($task_due_time == 'All Day'){
                    $task_date = $reminder->task_date;
                    $task_date = date('d/m/Y', strtotime($task_date));
                    $task_time = $reminder->task_time;
                    $taskId = $reminder->id;
                    //print_r($taskId);exit();
                    $task_title = $reminder->title;
                    $task_description=$reminder->description;
                    $first = date("g:i A", strtotime("$start_time"));
                    $newStartTime = date("H", strtotime("$start_time"));
                    //print_r($newStartTime);exit();
                    //$newStartTime = strtotime($newStartTime);
                    //$endTime = date('18');
                    $endTime = date('24');
                    //$endTime = strtotime($endTime);
                    
                    $time_now = date("H:i");
                    $repeat_interval = $reminder->repeat_reminder_every;
                    //print_r($time_now);exit();
                    $array = array();
                    foreach (range($newStartTime, $endTime,$repeat_interval) as $number) {
                        $array[]=$number;
                    }
                    /*for( $i = $newStartTime; $i < $endTime; $i+=$repeat_interval){
                        $array[] = $i;  
                    }*/
                    $minutes = date("i", strtotime("$start_time"));
                    //print_r($minutes);exit();
                    $output = array_map(function($val) use ($minutes) { return $val.':'.$minutes; }, $array);
                    //array_unshift($output , $first);
                    //print_r($output);exit(); 
                    if( in_array( $time_now,$output )){
                        print_r('yes');
                        $this->sendNotification($taskId,$device_id,$task_description,$task_title);
                    }
                    
                }else{
                    $task_date = $reminder->task_date;
                    $task_date = date('d/m/Y', strtotime($task_date));
                    $task_time = $reminder->task_time;
                    $taskId = $reminder->id;
                    //print_r($taskId);exit();
                    $task_title = $reminder->title;
                    $task_description=$reminder->description;
                    $first = date("g:i A", strtotime("$start_time"));
                    $newStartTime = date("H", strtotime("$start_time"));
                    //print_r($newStartTime);exit();
                    //$newStartTime = strtotime($newStartTime);
                    //$endTime = date('18');
                    $endTime = date('24');
                    //$endTime = strtotime($endTime);
                    
                    $time_now = date("H:i");
                    $repeat_interval = $reminder->repeat_reminder_every;
                    //print_r($time_now);exit();
                    $array = array();
                    foreach (range($newStartTime, $endTime,$repeat_interval) as $number) {
                        $array[]=$number;
                    }
                    /*for( $i = $newStartTime; $i < $endTime; $i+=$repeat_interval){
                        $array[] = $i;  
                    }*/
                    $minutes = date("i", strtotime("$start_time"));
                    //print_r($minutes);exit();
                    $output = array_map(function($val) use ($minutes) { return $val.':'.$minutes; }, $array);
                    //array_unshift($output , $first);
                    //print_r($output);exit(); 
                    if( in_array( $time_now,$output )){
                        print_r('yes');
                        $this->sendNotification($taskId,$device_id,$task_description,$task_title);
                    }
                }
                
                
                }
                
            }
            if($now == $reminder->task_date ){
                $reminder_id = $reminder->id;
                //print_r($reminder_id);exit();
                $team_member = $this->Send_notification_model->get_team_member($reminder_id);
                //print_r($team_member->team_member_id);exit();
                foreach( $team_member as $mem ){
                    $device_id = $mem->device_id;
                    //print_r($device_id);exit();
                
                //print_r($team_member);exit();
                //$device_id = $team_member->device_id;
                //$start_time = '10:00 AM';
                $end_time = $reminder->task_time;
                //print_r($end_time);exit();
                if($end_time == 'All Day'){
                    //$start_time = '09:00 AM';
                    $start_time = '12:00 AM';
                    //print_r($reminder->id);exit();
                    $task_date = $reminder->task_date;
                    $task_date = date('d/m/Y', strtotime($task_date));
                    $task_time = $reminder->task_time;
                    $taskId = $reminder->id;
                    $newStartTime = date("H", strtotime("$start_time"));
                    $task_title = $reminder->title;
                    $task_description=$reminder->description;
                    //$endTime = date('H',strtotime($end_time));
                    $endTime = $endTime = date('18');
                    //print_r($endTime);exit();
                    //$newStartTime = strtotime($newStartTime);
                    
                    //print_r($newStartTime);exit();
                    //$endTime = strtotime($endTime);
                    date_default_timezone_set("Asia/Kolkata");
                    $time_now = date("g:i A");
                    //print_r($time_now);exit();
                    $repeat_interval = $reminder->repeat_reminder_every;
                    //print_r($start_time);exit();
                    $array1 = array();
                    foreach (range($newStartTime, $endTime,$repeat_interval) as $number) {
                        $array1[]=$number;
                    } 
                    $minutes = date("i", strtotime("$start_time"));
                    //print_r($array1);exit();
                    $output2 = array_map(function($val) use ($minutes) { return $val.':'.$minutes; }, $array1);
                    
                    //print_r($start_time);exit();
                    //array_unshift($output2 , $new_time);
                    /*if( $repeat_interval == 1){
                        //$new_array = array('10:00','11:00','12:00');
                        array_push($output2 , '10:00 AM','11:00 AM','12:00 AM');
                    }
                    if($repeat_interval == 2){
                        array_push($output2 , '10:00 AM','12:00 AM');
                    }*/
                    //print_r($output2);exit(); 
                    if( in_array( $time_now,$output2 )){
                        //print_r('yes');
                        $this->sendNotification($taskId,$device_id,$task_description,$task_title);
                    }
                }else{
                    //$start_time = '09:00 AM';
                    $start_time = '12:00 AM';
                    //print_r($start_time);exit();
                    $task_date = $reminder->task_date;
                    $task_date = date('d/m/Y', strtotime($task_date));
                    $task_time = $reminder->task_time;
                    $newStartTime = date("H", strtotime("$start_time"));
                    $task_title = $reminder->title;
                    $taskId = $reminder->id;
                    $task_description=$reminder->description;
                    $endTime = date('H',strtotime($end_time));
                    //$endTime = $endTime = date('18');
                    //print_r($endTime);exit();
                    //$newStartTime = strtotime($newStartTime);
                    
                    //print_r($newStartTime);exit();
                    //$endTime = strtotime($endTime);
                    date_default_timezone_set("Asia/Kolkata");
                    $time_now = date("g:i A");
                    //print_r($time_now);exit();
                    $repeat_interval = $reminder->repeat_reminder_every;
                    //print_r($start_time);exit();
                    $array1 = array();
                    foreach (range($newStartTime, $endTime,$repeat_interval) as $number) {
                        $array1[]=$number;
                    } 
                    $minutes = date("i", strtotime("$start_time"));
                    //print_r($array1);exit();
                    $output2 = array_map(function($val) use ($minutes) { return $val.':'.$minutes; }, $array1);
                    
                    //print_r($start_time);exit();
                    //array_unshift($output2 , $new_time);
                    /*if( $repeat_interval == 1){
                        //$new_array = array('10:00','11:00','12:00');
                        array_push($output2 , '10:00 AM','11:00 AM','12:00 AM');
                    }
                    if($repeat_interval == 2){
                        array_push($output2 , '10:00 AM','12:00 AM');
                    }*/
                    //print_r($output2);exit(); 
                    if( in_array( $time_now,$output2 )){
                        //print_r('yes');
                        $this->sendNotification($taskId,$device_id,$task_description,$task_title);
                    }
                }
                
                }
            }
        }
        
    }
    
    function sendNotification($taskId,$registrationIds,$msg,$msgTitle){
		$content = array(
			"en" => $msg
			);
		$heading=array(
		    "en"=>$msgTitle
		    );
		$fields = array(
			'app_id' => "be37c3e5-9b85-4f74-8736-6b4fc6f9fc69",
			//'included_segments' => array('Active Users'),
			'include_player_ids' => array($registrationIds),
			'data' => array("type" => $taskId),
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
												   'Authorization: Basic MjZjMTVlOTQtZTlhOS00ZmFkLWIxNzEtYTZhOTU5Y2M4Yzg2'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);
		//var_dump($response);exit();
		//$response;
		return $response;
	}
}

?>