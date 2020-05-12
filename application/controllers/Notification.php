<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends MY_Controller {

	public function show_notification()
	{
	    $this->load->model('Reminder_model');
	    $data['ghosts'] = $this->Reminder_model->get_all_members();
		$this->load->view('Admin/show_notification',$data);
	}
    
    public function submit_notification()
    {
        $post = $this->input->post();
        date_default_timezone_set('Asia/Kolkata');
        $date_created = date('Y-m-d H:i:s');
        $array = array(
            'team_member_id' => $post['team_member_id'],
            'message' => $post['message'], 
            'date_created' => $date_created
            );
        $this->load->model('Team_member_model');
        $inserted = $this->Team_member_model->send_message($array);
        //print_r($inserted);exit();
        $device_id = $inserted->device_id;
        //print_r($device_id);exit();
        $this->sendNotification($device_id,"You Have a New Message from Admin","Alert!");
        $this->session->set_flashdata('Message_sent','Message Sent Succcessfully');
    	redirect('send_notification');
    }

    public function show_log()
    {
        $this->load->model('Reminder_model');
        $data['count_log'] = $this->Reminder_model->count_log();
	    $total = $data['count_log']->logs;
	    //print_r($total);exit();
	    $this->load->library('pagination');
        $config['base_url'] = base_url().'Log/';
        $config['total_rows'] = $total;
        $config['per_page'] = 10;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 5;
        $config['full_tag_open'] = "<ul class='pagination pull-center'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = "<li class='paginate_button '>";
        $config['num_tag_close'] = "</li>";
        $config['cur_tag_open'] = "<li class='active'><a aria-controls='example' data-dt-idx='3' tabindex='0'>";
        $config['cur_tag_close'] = "</a></li>";
        $config['next_tag_open'] = "<li class='paginate_button '>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li class='paginate_button '>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li class='paginate_button '>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li class='paginate_button '>";
        $config['last_tagl_close'] = "</li>";
        $config['first_link'] = 'FIRST';
        $config['prev_link'] = 'PREVIOUS';
        $config['next_link'] = 'NEXT';
        $config['last_link'] = 'LAST';
        $this->pagination->initialize($config);
        $prod_id = $this->uri->segment(2);
        $data['prod_id']=$prod_id;
    	if(empty($prod_id))
    	{        $product_id = 0;
    	}else{
            $product_id = $prod_id;
    	}
    	$data['links']=$this->pagination->create_links();
        $data['posts'] = $this->Reminder_model->get_logs($product_id,$config['per_page']);
    	$this->load->view('Admin/show_log',$data);
    }
    
    function sendNotification($registrationIds,$msg,$msgTitle){
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
			//'data' => array("type" => "0"),
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
