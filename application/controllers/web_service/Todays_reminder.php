<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Todays_reminder extends CI_Controller {
    
    public function get_todays_reminder()
    {
        $method = $_SERVER['REQUEST_METHOD']; 
             if($method != 'POST'){
                echo json_encode( array('status' => 400,'msg' =>'Bad Request!' ));
                }else{
                    $this->load->model('web_service/Todays_reminder_model');
                    $id = $_REQUEST['id'];
                    if(!empty($id)) {
                        $fetch = $this->Todays_reminder_model->get_todays_category_reminder($id);
                        //print_r($fetch);exit();
                        if(!empty($fetch)){
                            echo json_encode( array('status' => 1,'msg' =>'Got Todays Reminders','data'=>$fetch));
                        }else{
                            echo json_encode( array('status' => 0,'msg' =>'No Reminders'));
                        }
                    }
                }
    }
    
    public function get_categorywise_todays_reminder()
    {
        $method = $_SERVER['REQUEST_METHOD']; 
             if($method != 'POST'){
                echo json_encode( array('status' => 400,'msg' =>'Bad Request!' ));
                }else{
                    $this->load->model('web_service/Todays_reminder_model');
                    $id = $_REQUEST['id'];
                    $category_id = $_REQUEST['category_id'];
                    if( !empty($id) && !empty($category_id) ) {
                        
                        $fetch = $this->Todays_reminder_model->get_categorywise_todays_reminder($id,$category_id);
                        if(!empty($fetch)){
                            echo json_encode( array('status' => 1,'msg' =>'Got Todays Category Wise Reminders','data'=>$fetch));
                        }else{
                            echo json_encode( array('status' => 0,'msg' =>'No Data'));
                        }
                    }
                }
    }
    
    public function get_all_todays_reminders()
    {
        $method = $_SERVER['REQUEST_METHOD']; 
             if($method != 'POST'){
                echo json_encode( array('status' => 400,'msg' =>'Bad Request!' ));
                }else{
                    $this->load->model('web_service/Todays_reminder_model');
                    $id = $_REQUEST['id'];
                    if( !empty($id)) {
                        
                        $fetch = $this->Todays_reminder_model->get_all_todays_reminder($id);
                        if(!empty($fetch)){
                            echo json_encode( array('status' => 1,'msg' =>'Got All Todays Reminders','data'=>$fetch));
                        }else{
                            echo json_encode( array('status' => 0,'msg' =>'No Data'));
                        }
                    }
                }
    }
    
    public function get_todays_reminder_count()
    {
        $method = $_SERVER['REQUEST_METHOD']; 
             if($method != 'POST'){
                echo json_encode( array('status' => 400,'msg' =>'Bad Request!' ));
                }else{
                    $this->load->model('web_service/Todays_reminder_model');
                    $id = $_REQUEST['id'];
                    if( !empty($id)) {
                        $fetch = $this->Todays_reminder_model->get_todays_reminder_count($id);
                        //$today[] = count($fetch);
                        //print_r($today);exit();
                        if(!empty($fetch)){
                            echo json_encode( array('status' => 1,'msg' =>'Got Todays Reminder Count','data'=>$fetch));
                        }else{
                            echo json_encode( array('status' => 0,'msg' =>'No Data'));
                        }
                    }
                }
    }
    
    public function get_upcoming_reminder()
    {
        $method = $_SERVER['REQUEST_METHOD']; 
             if($method != 'POST'){
                echo json_encode( array('status' => 400,'msg' =>'Bad Request!' ));
                }else{
                    $this->load->model('web_service/Todays_reminder_model');
                    $id = $_REQUEST['id'];
                    if(!empty($id)) {
                        $fetch = $this->Todays_reminder_model->get_upcoming_category_reminder($id);
                        //print_r($fetch);exit();
                        if(!empty($fetch)){
                            echo json_encode( array('status' => 1,'msg' =>'Got Upcoming Reminders','data'=>$fetch));
                        }else{
                            echo json_encode( array('status' => 0,'msg' =>'No Reminders'));
                        }
                    }
                }
    }
    
    public function get_categorywise_upcoming_reminder()
    {
        $method = $_SERVER['REQUEST_METHOD']; 
             if($method != 'POST'){
                echo json_encode( array('status' => 400,'msg' =>'Bad Request!' ));
                }else{
                    $this->load->model('web_service/Todays_reminder_model');
                    $id = $_REQUEST['id'];
                    $category_id = $_REQUEST['category_id'];
                    if( !empty($id) && !empty($category_id) ) {
                        
                        $fetch = $this->Todays_reminder_model->get_categorywise_upcoming_reminder($id,$category_id);
                        if(!empty($fetch)){
                            echo json_encode( array('status' => 1,'msg' =>'Got Upcoming Category Wise Reminders','data'=>$fetch));
                        }else{
                            echo json_encode( array('status' => 0,'msg' =>'No Data'));
                        }
                    }
                }
    }
    
    public function get_all_upcoming_reminders()
    {
        $method = $_SERVER['REQUEST_METHOD']; 
             if($method != 'POST'){
                echo json_encode( array('status' => 400,'msg' =>'Bad Request!' ));
                }else{
                    $this->load->model('web_service/Todays_reminder_model');
                    $id = $_REQUEST['id'];
                    if( !empty($id)) {
                        
                        $fetch = $this->Todays_reminder_model->get_all_upcoming_reminder($id);
                        if(!empty($fetch)){
                            echo json_encode( array('status' => 1,'msg' =>'Got All Upcoming Reminders','data'=>$fetch));
                        }else{
                            echo json_encode( array('status' => 0,'msg' =>'No Data'));
                        }
                    }
                }
    }
    
    public function get_upcoming_reminder_count()
    {
        $method = $_SERVER['REQUEST_METHOD']; 
             if($method != 'POST'){
                echo json_encode( array('status' => 400,'msg' =>'Bad Request!' ));
                }else{
                    $this->load->model('web_service/Todays_reminder_model');
                    $id = $_REQUEST['id'];
                    if( !empty($id)) {
                        $fetch = $this->Todays_reminder_model->get_upcoming_reminder_count($id);
                        //$today = count($fetch);
                        //print_r($today);exit();
                        if(!empty($fetch)){
                            echo json_encode( array('status' => 1,'msg' =>'Got Upcoming Reminder Count','data'=>$fetch));
                        }else{
                            echo json_encode( array('status' => 0,'msg' =>'No Data'));
                        }
                    }
                }
    }
    
    public function get_completed_reminder()
    {
        $method = $_SERVER['REQUEST_METHOD']; 
             if($method != 'POST'){
                echo json_encode( array('status' => 400,'msg' =>'Bad Request!' ));
                }else{
                    $this->load->model('web_service/Todays_reminder_model');
                    $id = $_REQUEST['id'];
                    if(!empty($id)) {
                        $fetch = $this->Todays_reminder_model->get_completed_reminder($id);
                        //print_r($fetch);exit();
                        if(!empty($fetch)){
                            echo json_encode( array('status' => 1,'msg' =>'Got Completed Reminders','data'=>$fetch));
                        }else{
                            echo json_encode( array('status' => 0,'msg' =>'No Reminders'));
                        }
                    }
                }
    }
    
    public function get_categorywise_completed_reminder()
    {
        $method = $_SERVER['REQUEST_METHOD']; 
             if($method != 'POST'){
                echo json_encode( array('status' => 400,'msg' =>'Bad Request!' ));
                }else{
                    $this->load->model('web_service/Todays_reminder_model');
                    $id = $_REQUEST['id'];
                    $category_id = $_REQUEST['category_id'];
                    if( !empty($id) && !empty($category_id) ) {
                        
                        $fetch = $this->Todays_reminder_model->get_categorywise_completed_reminder($id,$category_id);
                        if(!empty($fetch)){
                            echo json_encode( array('status' => 1,'msg' =>'Got Completed Category Wise Reminders','data'=>$fetch));
                        }else{
                            echo json_encode( array('status' => 0,'msg' =>'No Data'));
                        }
                    }
                }
    }
    
    public function get_all_completed_reminders()
    {
        $method = $_SERVER['REQUEST_METHOD']; 
             if($method != 'POST'){
                echo json_encode( array('status' => 400,'msg' =>'Bad Request!' ));
                }else{
                    $this->load->model('web_service/Todays_reminder_model');
                    $id = $_REQUEST['id'];
                    if( !empty($id)) {
                        
                        $fetch = $this->Todays_reminder_model->get_all_completed_reminder($id);
                        if(!empty($fetch)){
                            echo json_encode( array('status' => 1,'msg' =>'Got All Completed Reminders','data'=>$fetch));
                        }else{
                            echo json_encode( array('status' => 0,'msg' =>'No Data'));
                        }
                    }
                }
    }
    
    public function get_completed_reminder_count()
    {
        $method = $_SERVER['REQUEST_METHOD']; 
             if($method != 'POST'){
                echo json_encode( array('status' => 400,'msg' =>'Bad Request!' ));
                }else{
                    $this->load->model('web_service/Todays_reminder_model');
                    $id = $_REQUEST['id'];
                    if( !empty($id)) {
                        $fetch = $this->Todays_reminder_model->get_completed_reminder_count($id);
                        //$today[] = count($fetch);
                        //print_r($today);exit();
                        if(!empty($fetch)){
                            echo json_encode( array('status' => 1,'msg' =>'Got Completed Reminder Count','data'=>$fetch));
                        }else{
                            echo json_encode( array('status' => 0,'msg' =>'No Data'));
                        }
                    }
                }
    }
    
    public function get_expired_reminder()
    {
        $method = $_SERVER['REQUEST_METHOD']; 
             if($method != 'POST'){
                echo json_encode( array('status' => 400,'msg' =>'Bad Request!' ));
                }else{
                    $this->load->model('web_service/Todays_reminder_model');
                    $id = $_REQUEST['id'];
                    if(!empty($id)) {
                        $fetch = $this->Todays_reminder_model->get_expired_category_reminder($id);
                        //print_r($fetch);exit();
                        if(!empty($fetch)){
                            echo json_encode( array('status' => 1,'msg' =>'Got Expired Reminders','data'=>$fetch));
                        }else{
                            echo json_encode( array('status' => 0,'msg' =>'No Reminders'));
                        }
                    }
                }
    }
    
    public function get_categorywise_expired_reminder()
    {
        $method = $_SERVER['REQUEST_METHOD']; 
             if($method != 'POST'){
                echo json_encode( array('status' => 400,'msg' =>'Bad Request!' ));
                }else{
                    $this->load->model('web_service/Todays_reminder_model');
                    $id = $_REQUEST['id'];
                    $category_id = $_REQUEST['category_id'];
                    if( !empty($id) && !empty($category_id) ) {
                        
                        $fetch = $this->Todays_reminder_model->get_categorywise_expired_reminder($id,$category_id);
                        if(!empty($fetch)){
                            echo json_encode( array('status' => 1,'msg' =>'Got Expired Category Wise Reminders','data'=>$fetch));
                        }else{
                            echo json_encode( array('status' => 0,'msg' =>'No Data'));
                        }
                    }
                }
    }
    
    public function get_all_expired_reminders()
    {
        $method = $_SERVER['REQUEST_METHOD']; 
             if($method != 'POST'){
                echo json_encode( array('status' => 400,'msg' =>'Bad Request!' ));
                }else{
                    $this->load->model('web_service/Todays_reminder_model');
                    $id = $_REQUEST['id'];
                    if( !empty($id)) {
                        
                        $fetch = $this->Todays_reminder_model->get_all_expired_reminder($id);
                        if(!empty($fetch)){
                            echo json_encode( array('status' => 1,'msg' =>'Got All Expired Reminders','data'=>$fetch));
                        }else{
                            echo json_encode( array('status' => 0,'msg' =>'No Data'));
                        }
                    }
                }
    }
    
    public function get_expired_reminder_count()
    {
        $method = $_SERVER['REQUEST_METHOD']; 
             if($method != 'POST'){
                echo json_encode( array('status' => 400,'msg' =>'Bad Request!' ));
                }else{
                    $this->load->model('web_service/Todays_reminder_model');
                    $id = $_REQUEST['id'];
                    if( !empty($id)) {
                        $fetch = $this->Todays_reminder_model->get_expired_reminder_count($id);
                        //$today[] = count($fetch);
                        //print_r($today);exit();
                        if(!empty($fetch)){
                            echo json_encode( array('status' => 1,'msg' =>'Got Expired Reminder Count','data'=>$fetch));
                        }else{
                            echo json_encode( array('status' => 0,'msg' =>'No Data'));
                        }
                    }
                }
    }
    
    public function get_notifications()
    {
        $method = $_SERVER['REQUEST_METHOD']; 
             if($method != 'POST'){
                echo json_encode( array('status' => 400,'msg' =>'Bad Request!' ));
                }else{
                    $this->load->model('web_service/Todays_reminder_model');
                    $id = $_REQUEST['id'];
                    if( !empty($id) ){
                        $fetch = $this->Todays_reminder_model->get_notifications($id);
                        //print_r($fetch);exit();
                        if(!empty($fetch)){
                            //$device_id = $fetch[0]->device_id;
                            //print_r($device_id);exit();
                            //$this->sendNotification($device_id,"New Notification","Alert");
                            echo json_encode( array('status' => 1,'msg' =>'Got all notifications','data'=>$fetch));
                        }else{
                            echo json_encode( array('status' => 0,'msg' =>'No Data'));
                        }
                    }
                }
    }
    
    
    
    public function get_notifications_count()
    {
        $method = $_SERVER['REQUEST_METHOD']; 
             if($method != 'POST'){
                echo json_encode( array('status' => 400,'msg' =>'Bad Request!' ));
                }else{
                    $this->load->model('web_service/Todays_reminder_model');
                    $id = $_REQUEST['id'];
                    if( !empty($id) ){
                        $fetch = $this->Todays_reminder_model->get_notifications_count($id);
                        if(!empty($fetch)){
                            echo json_encode( array('status' => 1,'msg' =>'Got all notifications count','data'=>$fetch));
                        }else{
                            echo json_encode( array('status' => 0,'msg' =>'No Data'));
                        }
                    }
                }
    }
    
    public function resolve_reminder()
    {
        $method = $_SERVER['REQUEST_METHOD']; 
             if($method != 'POST'){
                echo json_encode( array('status' => 400,'msg' =>'Bad Request!' ));
                }else{
                    $this->load->model('web_service/Todays_reminder_model');
                    //$id = $_REQUEST['id'];
                    $reminder_id = $_REQUEST['reminder_id'];
                    $comment = $_REQUEST['comment'];
                    if(!empty($reminder_id)){
                        $array = array(
                            'reminder_status' => 1
                            );
                        $update = $this->Todays_reminder_model->resolve_reminder($reminder_id,$array,$comment);
                        if(!empty($update)){
                            echo json_encode( array('status' => 1,'msg' =>'Reminder Resolved'));
                        }else{
                            echo json_encode( array('status' => 0,'msg' =>'Not resolved'));
                        }
                    }
                }
    }
    
    public function get_task()
    {
        $method = $_SERVER['REQUEST_METHOD']; 
             if($method != 'POST'){
                echo json_encode( array('status' => 400,'msg' =>'Bad Request!' ));
                }else{
                    $this->load->model('web_service/Todays_reminder_model');
                    $id = $_REQUEST['task_id'];
                    if(!empty($id)) {
                        $fetch = $this->Todays_reminder_model->get_single_reminder($id);
                        //print_r($fetch);exit();
                        if(!empty($fetch)){
                            echo json_encode( array('status' => 1,'msg' =>'Got Reminder','data'=>$fetch));
                        }else{
                            echo json_encode( array('status' => 0,'msg' =>'No Reminder Found'));
                        }
                    }
                }
    }
    
    function sendNotification($registrationIds,$msg,$msgTitle){
		$content = array(
			"en" => $msg
			);
		$heading=array(
		    "en"=>$msgTitle
		    );
		$fields = array(
			'app_id' => "754bac5a-90d1-48d6-8689-fb5daaa1dfda",
			//'included_segments' => array('Active Users'),
			'include_player_ids' => array($registrationIds),
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
												   'Authorization: Basic M2ZkZDVhMjMtZjM4MC00OGY4LTgxZDUtOTU2NDgzZTk4ZDJl'));
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