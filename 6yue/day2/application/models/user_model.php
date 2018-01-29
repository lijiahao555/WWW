<?php
class User_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function add($data){
    	$res=$this->db->insert('day1',$data);
    	return $res;
    }
    public function selectAll(){
    	return $this->db->get('day1')->result_array();
    }

}