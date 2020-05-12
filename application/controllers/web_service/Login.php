<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    public function index()
    {  
            $method = $_SERVER['REQUEST_METHOD']; 
             if($method != 'POST'){
                echo json_encode( array('status' => 400,'msg' =>'Bad Request!' ));
                }else{
                        if (!empty($_REQUEST['email']) && !empty($_REQUEST['password'])) {
                            $this->load->model('web_service/Login_model');
                            $fetch = $this->Login_model->check($_REQUEST['email'],$_REQUEST['password']);
                            //print_r($fetch);exit();
                            if (empty($fetch)) {
                                echo json_encode( array('status' => 0,'msg' =>'no data!' ));
                            } elseif(!empty($fetch)) {
                                $check = $this->Login_model->check_status($_REQUEST['email'],$_REQUEST['password']);
                                //print_r($check->id);exit(); 
                                $pri_id = $check->id;
                                if( !empty($check) ){
                                    $array = array(
                                        'version' => $_REQUEST['version'],
                                        'device_id' => $_REQUEST['device_id'],
                                        'device_type' => $_REQUEST['device_type']
                                        );
                                    $update = $this->Login_model->update_device_id($pri_id,$array);
                                    echo json_encode( array('status' => 1,'msg' =>'Login successfull','data'=>$fetch)); 
                                    
                                }else{
                                    echo json_encode( array('status' => 2,'msg' =>'Unauthorized user' ));
                                }
                            }                
                            
                        } else {
                                echo json_encode( array('status' => 0,'info' => 'Input not provided!' ));
                        }
                        
                }
    }
    
    public function register()
    {
        $method = $_SERVER['REQUEST_METHOD']; 
             if($method != 'POST'){
                echo json_encode( array('status' => 400,'msg' =>'Bad Request!' ));
                }else{
                    $this->load->model('web_service/Login_model');
                    if(!empty($_REQUEST['mobile'])){
                        $fetch = $this->Login_model->check_user($_REQUEST['mobile']);
                        if(!empty($fetch)){
                            
                            echo json_encode( array('status' => 0,'msg' =>'User Alreay Exists' ));
                        }else{
                            $array = array(
                        'name' => $_REQUEST['name'],
                        'mobile' => $_REQUEST['mobile'],
                        'email' => $_REQUEST['email'],
                        'password' => $_REQUEST['password'],
                        'version' => $_REQUEST['version'],
                        'device_id' => $_REQUEST['device_id'],
                        'device_type' => $_REQUEST['device_type']
                        );
                    //$this->load->model('web_service/Login_model');
                    $id = $this->Login_model->register_team_member($array);
                   if(!empty($id)){
                   echo json_encode( array('status' => 1,'msg' =>'Registered Successfully' ));
                   }
                   else{
                     echo json_encode( array('status' => 0,'msg' =>'Not Registered' ));
                   }
                            
                        }
                    }
                }
    }
    
    public function change_password()
    {
        $method = $_SERVER['REQUEST_METHOD']; 
         if($method != 'POST'){
            echo json_encode( array('status' => 400,'msg' =>'Bad Request!' ));
            }else{
                
                $id = $_REQUEST['id'];
                $this->load->model('web_service/Login_model');
                if (!empty($_REQUEST['old_password']) && !empty($_REQUEST['new_password'])) {
                    
                    $fetch = $this->Login_model->check_password($id,$_REQUEST['old_password']);
                    if(empty($fetch)){
                        echo json_encode( array('status' => 0,'msg' =>'Old password did not match' ));
                    }else{
                        $array = array('password' => $_REQUEST['new_password']);
                        $update = $this->Login_model->change_password($id,$array);
                        if(!empty($update)){
                            echo json_encode( array('status' => 1,'msg' =>'Password Changed Successfully' ));
                        }else{
                            echo json_encode( array('status' => 0,'msg' =>'Password Not Changed' ));
                        }
                    }
                }
                
            }
    }
    
    public function forgot_password()
    {
        $method = $_SERVER['REQUEST_METHOD']; 
         if($method != 'POST'){
            echo json_encode( array('status' => 400,'msg' =>'Bad Request!' ));
            }else{
                
                $email = $_REQUEST['email'];
                $this->load->model('web_service/Login_model');
                if(!empty($email)){
                    $data['check'] = $this->Login_model->check_email($email);
                    //print_r($data['check']->email);exit();
                    $result_email = $data['check']->email;
                    if(empty($result_email)){
                        
                        echo json_encode( array('status' => 0,'msg' =>'Email ID does not exists. Please Register or Enter again' ));
                    }else{
                        $config = Array(
                        'protocol'  => 'smtp',
                        //'smtp_host' => 'ssl://smtp.gmail.com',
                        //'smtp_port' => '465',
                        'smtp_user' => 'sendmailtonoreply@gmail.com',
                        'smtp_pass' => 'sendmail@1234',
                        'mailtype'  => 'html',
                        'starttls'  => true,
                        'newline'   => "\r\n"
                );
            		
            		$this->load->library('email',$config);
            		$this->email->from('sendmailtonoreply@gmail.com');
            		$this->email->to($result_email);
            		$this->email->cc('');
            		$this->email->bcc('');
            		
            		$this->email->subject('Password Changed');
            		
            		$six_digit_random_number = mt_rand(100000, 999999);
            		$id = $data['check']->id;
            		$array = array(
            		    'password' => $six_digit_random_number
            		    );
            		$this->Login_model->update_password($array,$id);
            		$this->email->message('Your New Password for Interface India :-'.$six_digit_random_number);
		
                        if ( ! $this->email->send())
                        {
                            // Generate error
                            echo $this->email->print_debugger();
                        }
                    echo json_encode( array('status' => 1,'msg' =>'Password Changed Successfully. Check your Email' ));
                    }
                }
            }
    }
        
        
}

?>