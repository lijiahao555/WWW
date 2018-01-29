<?php
class Exam_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }
    public function selectAll(){
    	return $this->db->get('day8')->result_array();
    }
    public function selectAl(){
    	return $this->db->where('parent_id=0')->get('day8')->result_array();
    }
    public function sel($id){
    	return $this->db->where("parent_id='$id'")->get('day8')->result_array();
    }
}