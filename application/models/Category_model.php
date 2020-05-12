<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model {
    
    public function get_categories()
    {
        $query = $this->db->select('*')
                          ->from('category_master')
                          ->get();
        return $query->result();
    }

	public function store_category($array)
	{
		$this->db->insert('category_master',$array);
		$id = $this->db->insert_id();
		return $id;
	}
	
	public function delete_category($id)
	{
	    $this->db->where('id',$id)
	             ->delete('category_master');
	}
}

?>