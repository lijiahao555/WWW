<?php
class Yue_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    /** 搜索 */
    public function get_sel($table,$where=array()){
        return $this->db->where($where)->get($table)->result_array();
    }
    /** 搜索单条 */
    public function get_one($table,$where=array()){
        return $this->db->where($where)->get($table)->row_array();
    }
    /** 计算条数 */
    public function get_count($table,$where){
    	return $this->db->where($where)->count_all_results($table);
    }
    /** 添加数据 */
    public function get_add($table,$data){
        return $this->db->insert($table,$data);
    }
}