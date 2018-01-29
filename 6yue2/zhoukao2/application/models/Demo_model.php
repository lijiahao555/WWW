<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	public function sel($sql){
		return $this->db->query($sql)->result_array();
	}
	public function select($where){
		return $this->db->like('name',$where)->get('path')->result_array();
		// echo $this->db->last_query();
	}
}
