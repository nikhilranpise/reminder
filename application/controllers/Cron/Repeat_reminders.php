<?php

class Repeat_reminders extends CI_Controller{
    
    public function show()
    {
        $day = date('D');
        //print_r($day);exit();
        if($day == 'Sun') 
        {
            //print_r('Today is Wednesday');
            $this->load->model('Cron/Repeat_reminder_model');
            $active_reminders = $this->Repeat_reminder_model->get_all_active_reminders();   //get all active reminders
            //print_r($active_reminders);exit();
            foreach( $active_reminders as $reminders ){     //check reminder one by one
                //print_r($reminders);exit();
                //$array = array();
                /*for($i=0;$i<=7;$i++){
                        $today = date('d/m/Y');
                        $dateToSave = $today+$i+1;
                        $dateToSave = date($dateToSave.'/m/Y');
                        $array[$i] = $dateToSave;
                        //print_r($array);exit(); 
                    }*/
                if (date('D') == 'Sun') {
                    $startdate = date('Y-m-d', strtotime('next Monday'));
                } else {
                    $startdate = date('Y-m-d');
                }
            
            //always next saturday
                if (date('D') != 'Sat') {
                    $enddate = date('Y-m-d', strtotime('next Saturday'));
                } else {
                    $enddate = date('Y-m-d');
                }
            
                $array = array();
                $timestamp = strtotime($startdate);
                while ($startdate <= $enddate) {
                    $startdate = date('Y-m-d', $timestamp);
                    $array[] = date('d/m/Y',strtotime($startdate));
                    $timestamp = strtotime('+1 days', strtotime($startdate));
                }
                //print_r( $array );exit();                  //main array of dates
                if( $reminders->frequency == 'Daily' ){          //check if reminder is daily
                    //print_r($reminders->repeat_date_end);exit();
                    $reminder_id = $reminders->reminder_id;
                    $daily_reminders = $this->Repeat_reminder_model->get_daily_reminder($reminder_id);
                    //print_r($daily_reminders);exit();
                    $main_id = $daily_reminders->id;
                    //print_r($main_id);exit();
                    $get_team_members = $this->Repeat_reminder_model->get_all_team_members($main_id);
                    //print_r($get_team_members);exit();
                    
                    $start_date = $reminders->repeat_date_start;
                    $newStartDate = date("d/m/Y", strtotime($start_date));
                    //print_r($newStartDate);exit();
                    $end_date = $reminders->repeat_date_end;
                    $newEndDate = date("d/m/Y", strtotime($end_date));
                    //print_r($newEndDate);exit();
                    $now = date('d/m/Y');
                    //print_r($now);exit();
                    if( strtotime($newStartDate) <= strtotime($now) && strtotime($newEndDate) >= strtotime($now)){
                        //print_r('yes');exit();
                        $subarray = array();                                //create subarray
                        if( in_array($newEndDate,$array) ){                 //check if end date exists is in main array and then find position of that date
                            $pos = array_search($newEndDate, $array);
                            //print_r($pos);exit();
                            if($pos > '4'){
                                $pos = 4;
                            }
                            for( $j=0; $j<=$pos; $j++ ){
                                $subarray[$j] = $array[$j];                //push all values of main array into subarray upto position variable pos
                                //print_r($subarray[$j]);exit();
                            }
                            //print_r($subarray);exit();
                            foreach( $subarray as $subdates ){
                                //print_r($subdates);exit();
                                $str = str_replace('/', '-', $subdates);
                                $newSubDate = date('Y-m-d', strtotime($str));
                                //print_r($newSubDate);exit();
                                $insertSubarray = array(
                                    'category_id' => $daily_reminders->category_id,
                                    'title' => $daily_reminders->title,
                                    'description' => $daily_reminders->description,
                                    'task_date' => $newSubDate,
                                    'task_time' => $daily_reminders->task_time,
                                    'team_member_id' => $daily_reminders->team_member_id,
                                    'reminder_start_date' => $newSubDate,
                                    'reminder_start_time' => $daily_reminders->task_time,
                                    'repeat_reminder_every' => $daily_reminders->repeat_reminder_every,
                                    'priority' => $daily_reminders->priority,
                                    'status' => $daily_reminders->status,
                                    );
                                $insertAllSubarray = $this->Repeat_reminder_model->insert_subarray($insertSubarray);  //This will Insert all records upto end date
                                foreach($get_team_members as $one_member){
                                    //print_r($one_member->assign_id);exit();
                                    $team_array = array(
                                        'reminder_id' => $insertAllSubarray,
                                        'team_member_id' => $one_member->assign_id
                                        );
                                        $insertTeamMember = $this->Repeat_reminder_model->insert_multiple_team_member($next_array);
                                }
                                if($insertAllSubarray == true){
                                    print_r('Inserted');
                                }else{
                                    print_r('Not Inserted');
                                }
                            }
                            
                            
                        }else{
                             //print_r('not exits');
                            //print_r($array);exit();
                            $pos = 4;
                            for( $j=0; $j<=$pos; $j++ ){
                                $subarray[$j] = $array[$j];
                                //print_r($subarray[$j]);exit();
                            }
                            //print_r($subarray);exit();
                            foreach( $subarray as $subdates ){
                                //print_r($subdates);exit();
                                $str = str_replace('/', '-', $subdates);
                                $newSubDate = date('Y-m-d', strtotime($str));
                                //print_r($newSubDate);exit();
                                $insertSubarray = array(
                                    'category_id' => $daily_reminders->category_id,
                                    'title' => $daily_reminders->title,
                                    'description' => $daily_reminders->description,
                                    'task_date' => $newSubDate,
                                    'task_time' => $daily_reminders->task_time,
                                    'team_member_id' => $daily_reminders->team_member_id,
                                    'reminder_start_date' => $newSubDate,
                                    'reminder_start_time' => $daily_reminders->task_time,
                                    'repeat_reminder_every' => $daily_reminders->repeat_reminder_every,
                                    'priority' => $daily_reminders->priority,
                                    'status' => $daily_reminders->status,
                                    );
                                //print_r($insertSubarray);exit();
                                $insertAllSubarray = $this->Repeat_reminder_model->insert_subarray($insertSubarray);  //This will Insert all daily records 
                                foreach($get_team_members as $one_member){
                                    //print_r($one_member->assign_id);exit();
                                    $team_array = array(
                                        'reminder_id' => $insertAllSubarray,
                                        'team_member_id' => $one_member->assign_id
                                        );
                                        $insertTeamMember = $this->Repeat_reminder_model->insert_multiple_team_member($team_array);
                                }
                                if($insertAllSubarray == true){
                                    print_r('Inserted');
                                }else{
                                    print_r('Not Inserted');
                                }
                            }
                        }
                    }
                }
                if( $reminders->frequency == 'Weekly' ){
                    
                    $reminder_id = $reminders->reminder_id;
                    //print_r($reminder_id);exit();
                    $daily_reminders = $this->Repeat_reminder_model->get_daily_reminder($reminder_id);
                    //print_r($daily_reminders);exit();
                    $start_date = $reminders->repeat_date_start;
                    $main_id = $daily_reminders->id;
                    //print_r($main_id);exit();
                    $get_team_members = $this->Repeat_reminder_model->get_all_team_members($main_id);
                    //print_r($get_team_members);exit();
                    $week = $reminders->day;
                    //print_r($start_date);exit();
                    $newStartDate = date("d/m/Y", strtotime($start_date));
                    //print_r($newStartDate);exit(); 
                    $end_date = $reminders->repeat_date_end;
                    $newEndDate = date("d/m/Y", strtotime($end_date));
                    //$week = date('D',strtotime($newStartDate));
                    //print_r($week);exit();
                    //print_r($newEndDate);exit();
                    $now = date('d/m/Y');
                    //print_r($now);exit();
                    if( strtotime($newStartDate) <= strtotime($now) && strtotime($newEndDate) >= strtotime($now)){
                        //print_r('hai');exit();
                        $week_day = $reminders->day;
                        //print_r($week_day);exit();
                        if($week_day == 'Mon'){
                            $pos = 0; 
                        }elseif($week_day == 'Tue'){
                            $pos = 1; 
                        }elseif($week_day == 'wed'){
                            $pos = 2; 
                        }elseif($week_day == 'Thu'){
                            $pos = 3; 
                        }elseif($week_day == 'Fri'){
                            $pos = 4; 
                        }
                        $result_date = $array[$pos];
                        $str = str_replace('/', '-', $result_date);
                        $newSubDate = date('Y-m-d', strtotime($str));
                        //print_r($newSubDate);exit();
                        $insert_array = array(
                            'category_id' => $daily_reminders->category_id,
                            'title' => $daily_reminders->title,
                            'description' => $daily_reminders->description,
                            'task_date' => $newSubDate,
                            'task_time' => $daily_reminders->task_time,
                            'team_member_id' => $daily_reminders->team_member_id,
                            'reminder_start_date' => $newSubDate,
                            'reminder_start_time' => $daily_reminders->task_time,
                            'repeat_reminder_every' => $daily_reminders->repeat_reminder_every,
                            'priority' => $daily_reminders->priority,
                            'status' => $daily_reminders->status,
                            );
                        //print_r($insert_array);exit();
                        $insertAllSubarray = $this->Repeat_reminder_model->insert_subarray($insert_array);
                        foreach($get_team_members as $one_member){
                                    //print_r($one_member->assign_id);exit();
                                    $team_array = array(
                                        'reminder_id' => $insertAllSubarray,
                                        'team_member_id' => $one_member->assign_id
                                        );
                                        $insertTeamMember = $this->Repeat_reminder_model->insert_multiple_team_member($next_array);
                                }
                        if($insertAllSubarray == true){
                            print_r('Inserted');
                        }else{
                            print_r('Not Inserted');
                        }
                    }
                }
                if( $reminders->frequency == 'Monthly' ){
                    $reminder_id = $reminders->reminder_id;
                    //print_r($reminder_id);exit();
                    $daily_reminders = $this->Repeat_reminder_model->get_daily_reminder($reminder_id);
                    //print_r($daily_reminders);exit();
                    $start_date = $reminders->repeat_date_start;
                    $week = $reminders->day;
                    //print_r($start_date);exit();
                    $main_id = $daily_reminders->id;
                    //print_r($main_id);exit();
                    $get_team_members = $this->Repeat_reminder_model->get_all_team_members($main_id);
                    //print_r($get_team_members);exit();
                    $newStartDate = date("d/m/Y", strtotime($start_date));
                    //print_r($newStartDate);exit(); 
                    $end_date = $reminders->repeat_date_end;
                    $newEndDate = date("d/m/Y", strtotime($end_date));
                    //$week = date('D',strtotime($newStartDate));
                    //print_r($week);exit();
                    //print_r($newEndDate);exit();
                    $now = date('d/m/Y');
                    //print_r($now);exit();
                    $task_due_date = $daily_reminders->task_date;
                    $newTaskDueDate = date("d", strtotime($task_due_date));
                    //print_r($newTaskDueDate);exit();
                    $monthDate = date("$newTaskDueDate/m/Y");    //convert task due date to this month date
                    //print_r($monthDate);exit();
                    if( strtotime($newStartDate) <= strtotime($monthDate) && strtotime($newEndDate) >= strtotime($monthDate)){
                        //print_r('hai');exit();
                        //print_r($monthDate);exit();
                        if(in_array($monthDate,$array)){
                            $pos = array_search($monthDate, $array);
                            //print_r($pos);exit();
                            if($pos > '4'){
                                $pos = 4;
                            }
                            $result_date = $array[$pos];
                            $str = str_replace('/', '-', $result_date);
                            $newSubDate = date('Y-m-d', strtotime($str));
                            //print_r($newSubDate);exit();
                            $insert_array = array(
                            'category_id' => $daily_reminders->category_id,
                            'title' => $daily_reminders->title,
                            'description' => $daily_reminders->description,
                            'task_date' => $newSubDate,
                            'task_time' => $daily_reminders->task_time,
                            'team_member_id' => $daily_reminders->team_member_id,
                            'reminder_start_date' => $newSubDate,
                            'reminder_start_time' => $daily_reminders->task_time,
                            'repeat_reminder_every' => $daily_reminders->repeat_reminder_every,
                            'priority' => $daily_reminders->priority,
                            'status' => $daily_reminders->status,
                            );
                        //print_r($insert_array);exit();
                        $insertAllSubarray = $this->Repeat_reminder_model->insert_subarray($insert_array);
                        foreach($get_team_members as $one_member){
                                    //print_r($one_member->assign_id);exit();
                                    $team_array = array(
                                        'reminder_id' => $insertAllSubarray,
                                        'team_member_id' => $one_member->assign_id
                                        );
                                        $insertTeamMember = $this->Repeat_reminder_model->insert_multiple_team_member($next_array);
                                }
                        if($insertAllSubarray == true){
                            print_r('Inserted');
                        }else{
                            print_r('Not Inserted');
                        }
                        }
                    }
                }
                
                if( $reminders->frequency == 'Yearly' ){
                    $reminder_id = $reminders->reminder_id;
                    //print_r($reminder_id);exit();
                    $daily_reminders = $this->Repeat_reminder_model->get_daily_reminder($reminder_id);
                    //print_r($daily_reminders);exit();
                    $start_date = $reminders->repeat_date_start;
                    $week = $reminders->day;
                    //print_r($start_date);exit();
                    $newStartDate = date("d/m/Y", strtotime($start_date));
                    //print_r($newStartDate);exit(); 
                    $main_id = $daily_reminders->id;
                    //print_r($main_id);exit();
                    $get_team_members = $this->Repeat_reminder_model->get_all_team_members($main_id);
                    //print_r($get_team_members);exit();
                    $end_date = $reminders->repeat_date_end;
                    $newEndDate = date("d/m/Y", strtotime($end_date));
                    //$week = date('D',strtotime($newStartDate));
                    //print_r($week);exit();
                    //print_r($newEndDate);exit();
                    $now = date('d/m/Y');
                    //print_r($now);exit();
                    $task_due_date = $daily_reminders->task_date;
                    //print_r($task_due_date);exit();
                    $newTaskDueDate = date("d", strtotime($task_due_date));
                    //print_r($newTaskDueDate);exit();
                    $monthDate = date("Y-m-$newTaskDueDate");
                    //print_r($monthDate);exit();
                    if( strtotime($start_date) <= strtotime($monthDate) && strtotime($end_date) >= strtotime($monthDate)){
                        //print_r('hai');exit();
                        //print_r($monthDate);exit();
                        $monthDate = date("d/m/Y", strtotime($monthDate));
                        //print_r($monthDate);exit();
                        if(in_array($monthDate,$array)){
                            $pos = array_search($monthDate, $array);
                            //print_r($pos);exit();
                            if($pos > '4'){
                                $pos = 4;
                            }
                            $result_date = $array[$pos];
                            $str = str_replace('/', '-', $result_date);
                            $newSubDate = date('Y-m-d', strtotime($str));
                            //print_r($newSubDate);exit();
                            $insert_array = array(
                            'category_id' => $daily_reminders->category_id,
                            'title' => $daily_reminders->title,
                            'description' => $daily_reminders->description,
                            'task_date' => $newSubDate,
                            'task_time' => $daily_reminders->task_time,
                            'team_member_id' => $daily_reminders->team_member_id,
                            'reminder_start_date' => $newSubDate,
                            'reminder_start_time' => $daily_reminders->task_time,
                            'repeat_reminder_every' => $daily_reminders->repeat_reminder_every,
                            'priority' => $daily_reminders->priority,
                            'status' => $daily_reminders->status,
                            );
                        //print_r($insert_array);exit();
                        $insertAllSubarray = $this->Repeat_reminder_model->insert_subarray($insert_array);
                        foreach($get_team_members as $one_member){
                                    //print_r($one_member->assign_id);exit();
                                    $team_array = array(
                                        'reminder_id' => $insertAllSubarray,
                                        'team_member_id' => $one_member->assign_id
                                        );
                                        $insertTeamMember = $this->Repeat_reminder_model->insert_multiple_team_member($next_array);
                                }
                        if($insertAllSubarray == true){
                            print_r('Inserted');
                        }else{
                            print_r('Not Inserted');
                        }
                        }
                    }
                }
                
                if( $reminders->frequency == 'Half Yearly' ){
                    $reminder_id = $reminders->reminder_id;
                    //print_r($reminder_id);exit();
                    $daily_reminders = $this->Repeat_reminder_model->get_daily_reminder($reminder_id);
                    //print_r($daily_reminders);exit();
                    $start_date = $reminders->repeat_date_start;
                    $week = $reminders->day;
                    //print_r($start_date);exit();
                    $newStartDate = date("d/m/Y", strtotime($start_date));
                    //print_r($newStartDate);exit(); 
                    $end_date = $reminders->repeat_date_end;
                    $newEndDate = date("d/m/Y", strtotime($end_date));
                    $main_id = $daily_reminders->id;
                    //print_r($main_id);exit();
                    $get_team_members = $this->Repeat_reminder_model->get_all_team_members($main_id);
                    //print_r($get_team_members);exit();
                    //$week = date('D',strtotime($newStartDate));
                    //print_r($week);exit();
                    //print_r($newEndDate);exit();
                    $now = date('d/m/Y');
                    //print_r($now);exit();
                    $task_due_date = $daily_reminders->task_date;
                    //$nextDate = date("d/m/Y", strtotime("6 months", strtotime($task_due_date)));
                    //print_r($nextDate);exit();
                    $start    = new DateTime($task_due_date);
                    $end      = new DateTime($end_date);
                    //print_r($start);exit();
                    $interval = DateInterval::createFromDateString('6 month');
                    $period   = new DatePeriod($start, $interval, $end);
                    
                    foreach ($period as $dt) {
                        //echo $dt->format("d/m/Y") . "<br>";
                        $year1[] = $dt->format("d/m/Y");
                    }
                    //print_r($year1);exit();
                    
                    $newTaskDueDate = date("d", strtotime($task_due_date));
                    //print_r($newTaskDueDate);exit();
                    $monthDate = date("$newTaskDueDate/m/Y");
                    //print_r($monthDate);exit();
                    if(in_array($monthDate,$year1)){
                        if(in_array($monthDate,$array)){
                            $pos = array_search($monthDate, $array);
                            //print_r($pos);exit();
                            if($pos > '4'){
                                $pos = 4;
                            }
                            $result_date = $array[$pos];
                            //print_r($result_date);exit();
                            $str = str_replace('/', '-', $result_date);
                            $newSubDate = date('Y-m-d', strtotime($str));
                            //print_r($newSubDate);exit();
                            $insert_array = array(
                            'category_id' => $daily_reminders->category_id,
                            'title' => $daily_reminders->title,
                            'description' => $daily_reminders->description,
                            'task_date' => $newSubDate,
                            'task_time' => $daily_reminders->task_time,
                            'team_member_id' => $daily_reminders->team_member_id,
                            'reminder_start_date' => $newSubDate,
                            'reminder_start_time' => $daily_reminders->task_time,
                            'repeat_reminder_every' => $daily_reminders->repeat_reminder_every,
                            'priority' => $daily_reminders->priority,
                            'status' => $daily_reminders->status,
                            );
                            $insertAllSubarray = $this->Repeat_reminder_model->insert_subarray($insert_array);
                            foreach($get_team_members as $one_member){
                                    //print_r($one_member->assign_id);exit();
                                    $team_array = array(
                                        'reminder_id' => $insertAllSubarray,
                                        'team_member_id' => $one_member->assign_id
                                        );
                                        $insertTeamMember = $this->Repeat_reminder_model->insert_multiple_team_member($next_array);
                                }
                            if($insertAllSubarray == true){
                                print_r('Inserted');
                            }else{
                                print_r('Not Inserted');
                            }
                        }
                    }
                }
                if( $reminders->frequency == 'Quarterly' ){
                    $reminder_id = $reminders->reminder_id;
                    //print_r($reminder_id);exit();
                    $daily_reminders = $this->Repeat_reminder_model->get_daily_reminder($reminder_id);
                    //print_r($daily_reminders);exit();
                    $start_date = $reminders->repeat_date_start;
                    $week = $reminders->day;
                    //print_r($start_date);exit();
                    $newStartDate = date("d/m/Y", strtotime($start_date));
                    //print_r($newStartDate);exit(); 
                    $end_date = $reminders->repeat_date_end;
                    $newEndDate = date("d/m/Y", strtotime($end_date));
                    $main_id = $daily_reminders->id;
                    //print_r($main_id);exit();
                    $get_team_members = $this->Repeat_reminder_model->get_all_team_members($main_id);
                    //print_r($get_team_members);exit();
                    //$week = date('D',strtotime($newStartDate));
                    //print_r($week);exit();
                    //print_r($newEndDate);exit();
                    $now = date('d/m/Y');
                    //print_r($now);exit();
                    $task_due_date = $daily_reminders->task_date;
                    $start    = new DateTime($task_due_date);
                    $end      = new DateTime($end_date);
                    //print_r($start);exit();
                    $interval = DateInterval::createFromDateString('3 month');
                    $period   = new DatePeriod($start, $interval, $end);
                    
                    foreach ($period as $dt) {
                        //echo $dt->format("d/m/Y") . "<br>";
                        $year2[] = $dt->format("d/m/Y");
                    }
                    //print_r($year2);exit();
                    
                    $newTaskDueDate = date("d", strtotime($task_due_date));
                    //print_r($newTaskDueDate);exit();
                    $monthDate = date("$newTaskDueDate/m/Y");
                    //print_r($monthDate);exit();
                    if(in_array($monthDate,$year2)){
                        if(in_array($monthDate,$array)){
                            $pos = array_search($monthDate, $array);
                            //print_r($pos);exit();
                            if($pos > '4'){
                                $pos = 4;
                            }
                            $result_date = $array[$pos];
                            //print_r($result_date);exit();
                            $str = str_replace('/', '-', $result_date);
                            $newSubDate = date('Y-m-d', strtotime($str));
                            //print_r($newSubDate);exit();
                            $insert_array = array(
                            'category_id' => $daily_reminders->category_id,
                            'title' => $daily_reminders->title,
                            'description' => $daily_reminders->description,
                            'task_date' => $newSubDate,
                            'task_time' => $daily_reminders->task_time,
                            'team_member_id' => $daily_reminders->team_member_id,
                            'reminder_start_date' => $newSubDate,
                            'reminder_start_time' => $daily_reminders->task_time,
                            'repeat_reminder_every' => $daily_reminders->repeat_reminder_every,
                            'priority' => $daily_reminders->priority,
                            'status' => $daily_reminders->status,
                            );
                            $insertAllSubarray = $this->Repeat_reminder_model->insert_subarray($insert_array);
                            foreach($get_team_members as $one_member){
                                    //print_r($one_member->assign_id);exit();
                                    $team_array = array(
                                        'reminder_id' => $insertAllSubarray,
                                        'team_member_id' => $one_member->assign_id
                                        );
                                        $insertTeamMember = $this->Repeat_reminder_model->insert_multiple_team_member($next_array);
                                }
                            if($insertAllSubarray == true){
                                print_r('Inserted');
                            }else{
                                print_r('Not Inserted');
                            }
                        }
                    }
                }
                
                if( $reminders->frequency == 'Fortnightly' ){
                    $reminder_id = $reminders->reminder_id;
                    //print_r($reminder_id);exit();
                    $daily_reminders = $this->Repeat_reminder_model->get_daily_reminder($reminder_id);
                    //print_r($daily_reminders);exit();
                    $start_date = $reminders->repeat_date_start;
                    $week = $reminders->day;
                    //print_r($start_date);exit();
                    $newStartDate = date("d/m/Y", strtotime($start_date));
                    //print_r($newStartDate);exit(); 
                    $main_id = $daily_reminders->id;
                    //print_r($main_id);exit();
                    $get_team_members = $this->Repeat_reminder_model->get_all_team_members($main_id);
                    //print_r($get_team_members);exit();
                    $end_date = $reminders->repeat_date_end;
                    $newEndDate = date("d/m/Y", strtotime($end_date));
                    //$week = date('D',strtotime($newStartDate));
                    //print_r($week);exit();
                    //print_r($newEndDate);exit();
                    $now = date('d/m/Y');
                    //print_r($now);exit();
                    $task_due_date = $daily_reminders->task_date;
                    $start    = new DateTime($task_due_date);
                    $end      = new DateTime($end_date);
                    //print_r($start);exit();
                    $interval = DateInterval::createFromDateString('2 week');
                    $period   = new DatePeriod($start, $interval, $end);
                    
                    foreach ($period as $dt) {
                        //echo $dt->format("d/m/Y") . "<br>";
                        $year3[] = $dt->format("d/m/Y");
                    }
                    //print_r($year3);exit();
                    
                    $newTaskDueDate = date("d", strtotime($task_due_date));
                    //print_r($newTaskDueDate);exit();
                    $monthDate = date("$newTaskDueDate/m/Y");
                    //print_r($monthDate);exit();
                    if(in_array($monthDate,$year3)){
                        if(in_array($monthDate,$array)){
                            $pos = array_search($monthDate, $array);
                            //print_r($pos);exit();
                            if($pos > '4'){
                                $pos = 4;
                            }
                            $result_date = $array[$pos];
                            //print_r($result_date);exit();
                            $str = str_replace('/', '-', $result_date);
                            $newSubDate = date('Y-m-d', strtotime($str));
                            //print_r($newSubDate);exit();
                            $insert_array = array(
                            'category_id' => $daily_reminders->category_id,
                            'title' => $daily_reminders->title,
                            'description' => $daily_reminders->description,
                            'task_date' => $newSubDate,
                            'task_time' => $daily_reminders->task_time,
                            'team_member_id' => $daily_reminders->team_member_id,
                            'reminder_start_date' => $newSubDate,
                            'reminder_start_time' => $daily_reminders->task_time,
                            'repeat_reminder_every' => $daily_reminders->repeat_reminder_every,
                            'priority' => $daily_reminders->priority,
                            'status' => $daily_reminders->status,
                            );
                            $insertAllSubarray = $this->Repeat_reminder_model->insert_subarray($insert_array);
                            foreach($get_team_members as $one_member){
                                    //print_r($one_member->assign_id);exit();
                                    $team_array = array(
                                        'reminder_id' => $insertAllSubarray,
                                        'team_member_id' => $one_member->assign_id
                                        );
                                        $insertTeamMember = $this->Repeat_reminder_model->insert_multiple_team_member($next_array);
                                }
                            if($insertAllSubarray == true){
                                print_r('Inserted');
                            }else{
                                print_r('Not Inserted');
                            } 
                        }
                    }
                }
                
                
            }
        }else{
            print_r('Today is not sunday');
        }
    }
}


?>