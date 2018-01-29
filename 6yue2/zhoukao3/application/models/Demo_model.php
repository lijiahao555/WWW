<?php
class Demo_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }
    public function sel(){
    	return $this->db->get('type')->result_array();
    }
    public function get_more($name,$sou){
    	return $this->db->like($name,$sou)->get('goods')->result_array();
    }
    public function get_many($where=array()){
    	return $this->db->where($where)->get('goods')->result_array();
    }
}