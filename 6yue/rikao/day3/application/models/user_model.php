<?php
class User_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    function add($data){
    	return $this->db->insert('day1',$data);
    }
    function selectAll(){
    	return $this->db->get('day1')->result_array();
    }
    function del($id){
        return $this->db->where('id='.$id)->delete('day1');
    }

    function id($id){
        return $this->db->select('role_id')->from('user_role')->where('user_id='.$id)->get()->result_array();
    }
}