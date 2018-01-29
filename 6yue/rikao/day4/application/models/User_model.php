<?php
class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    public function selectAll(){
    	return $this->db->get('day1')->result_array();
    }
 	
    public function del($id){
    	return $this->db->where('id='.$id)->delete('day1');
    }


}
