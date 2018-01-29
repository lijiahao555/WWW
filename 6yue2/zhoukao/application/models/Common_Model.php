<?php
class Common_Model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }
    public $table_name=null;
    /**
     * 公共查询一个字段数据
     * @param  [type] $seek     string
     * @param  [type] $table_id string
     * @param  [type] $id       array
     * @return [type]           array
     */
    public function select_id($seek,$table_id,$id){
        return $this->db->select($seek)->where_in($table_id,$id)->get($this->table_name)->result_array();
    }
    public function select_where($where){
        return $this->db->where($where)->get($this->table_name)->result_array();
    }
    /**
     * 公共查询方法
     * @return [type] array
     */
    public function select(){
        return $this->db->get($this->table_name)->result_array();
    }
    /**
     * 公共添加单条数据
     * @param [type] $data array
     * @return [type] bool
     */
    public function add($data){
        return $this->db->insert($this->table_name,$data);
    }
    /**
     * 公共的单条修改
     * @param  [type] $data     array
     * @param  [type] $infor_id string
     * @param  [type] $id       int
     * @return [type]           bool
     */
    public function up($data,$infor_id,$id){
       return $this->db->where($infor_id,$id)->update($this->table_name,$data);
    }
}