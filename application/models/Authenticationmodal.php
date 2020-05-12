<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AuthenticationModal extends CI_Model {

    public function check($username,$password)
    {	
        $query = $this->db->query("select * from admin_table where username='$username' AND password='$password' ");
        //print_r($query->result());exit();
        return $query->row();
    }
    
    public function check_user($id)
    {
        $query = $this->db->select('device_id')
                          ->from('admin_table')
                          ->where('adm_id',$id)
                          ->get();
        return $query->result();
    }
    
    public function update_admin($id,$array)
    {
        $this->db->where('adm_id',$id)
                 ->update('admin_table',$array);
        return $this->db->affected_rows();
    }
                
           

}

?>