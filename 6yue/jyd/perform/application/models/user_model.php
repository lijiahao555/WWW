<?php 
// 模型类
	class User_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
//查询数据
		public function get_data($table,$limit='',$offset=0){
			$query = $this->db->order_by('cate_id desc')->limit($limit,$offset)->get($table);
			//取多条数据
			return $query->result_array();
		}
//查询单条
		public function get_one($table,$where){
			return $this->db->where($where)->get($table)->row_array();
		}
//添加
		public function add_data($table,$data){
			return $this->db->insert($table,$data);
		}
//删除
		public function delete_data($table,$where){
			return $this->db->delete($table,$where);
		}
//修改
		public function save_data($table,$data){
			return $this->db->replace($table,$data);
		}
//获取总条数
		public function data_num($table){
			return $this->db->count_all_results($table);
		}
	}