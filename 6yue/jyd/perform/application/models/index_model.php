<?php
// 模型类
	class Index_model extends MY_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		public $table_name = 'put_works';
//添加
		public function add_data($table,$data){
			return $this->db->insert($table,$data);
		}
//查询
		public function get_data($table,$where,$site,$offset){
			// $this->db->group_by(array("works_time","works_id"));
			$this->db->order_by('works_time');//时间的升序排列
			$this->db->order_by('works_id','desc');//时间相同的按照id的降序排列
			return $this->db->limit($site,$offset)->get_where($table,$where)->result_array();
		}
//获取总条数
		public function data_num($table,$where){
			return $this->db->where($where)->count_all_results($table);
		}
//修改
		public function date_save($table,$data,$where){
			return $this->db->update($table,$data,$where);
		}

	}