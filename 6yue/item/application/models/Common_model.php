<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {
	public $table_name=null;
	/**
	* 获取表中所有的字段
	*/
	public function get_fields($data){
		$fields = $this->db->list_fields($this->table_name);
		foreach ($data as $key => $v) {
			if (!in_array($key,$fields)) {
				unset($data[$key]);
			}
		}
		return $data;
	}
	/**
	* 基类model搜索
	*/
	public function selectAll($start=0,$size=0){
		return $this->db->get($this->table_name,$size,$start)->result_array();
	}
	/**
	* 基类model条件单条搜索
	*/
	public function select_where($id,$id2){
		return $this->db->where($id,$id2)->get($this->table_name)->row_array();
	}
	/**
	* 基类model条件多条搜索
	*/
	public function select_array($where){
		return $this->db->where($where)->get($this->table_name)->result_array();
	}
	/**
	* 基类model添加
	*/
	public function addOne($data){
		return $this->db->insert($this->table_name,$this->get_fields($data));
	}
	/**
	* 基类model添加
	*/
	public function delOne($where){
		return $this->db->where($where)->delete($this->table_name);
	}
	/**
	 * 修改单条数据
	 * @param  [type] $where array
	 * @param  [type] $data  array
	 * @return [type]        bool
	 */
	public function upOne($where,$data){
		return $this->db->update($this->table_name,$this->get_fields($data),$where);
	}
	/**
	 * 计算总条数
	 * @return [type] int
	 */
	public function count(){
		return $this->db->count_all($this->table_name);
	}
}
