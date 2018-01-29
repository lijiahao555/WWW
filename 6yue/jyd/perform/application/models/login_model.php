<?php 
// 模型类
	class login_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
//查询单条
		public function get_one($table,$where){
			return $this->db->get_where($table,$where)->row_array();
		}
//权限  查询
		public function get_data($table,$in_key,$where){
			return $this->db->where_in($in_key,$where)->get($table)->result_array();
		}

	}