<?php
class MY_Model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * 公共表名，继承时覆盖
     * @var string
     */
    public $table_name='';
    
    /**
     * 字段过滤
     * @param  [type] $data array
     * @return [type]       array
     */
    public function get_fields($data=array()){
        $fields = $this->db->list_fields($this->table_name);
        foreach ($data as $k => $v) {
            if (!in_array($k,$fields)) {
                unset($data[$k]);
            }
        }
        return $data;
    }

   
    /**
     * 公共添加数据
     * @param [type] $data 
     */
    public function get_add($data){
        return $this->db->insert($this->table_name,$this->get_fields($data));
    }
    public function get_id(){
        return $this->db->insert_id();
    }
    public function get_add_many($data){
        return $this->db->insert_batch($this->table_name,$data);
        // echo $this->db->last_query();die;
    }
    
    /**
     * 普通带条件查询（查询多条）
     * @param  [type] $where string
     * @param  string $field string
     * @return [type]        array
     */
    public function get_sel_many($where=array(),$field='',$limit=0){

        return $this->db->select($field)->where($where)->order_by($this->table_name.'_id','asc')->limit($this->config->item('page_size'),$limit)->get($this->table_name)->result_array();
        // echo $this->db->last_query();
    }
    

    public function get_sel_more($where=array(),$field=''){
        return $this->db->select($field)->where($where)->order_by($this->table_name.'_id','asc')->get($this->table_name)->result_array();
    }

    /**
     * 普通带条件查询（查询单条）
     * @param  [type] $where string
     * @param  string $field string
     * @return [type]        array
     */
    public function get_sel_one($where,$field=''){
        return $this->db->select($field)->where($where)->get($this->table_name)->row_array();
    }
    /**
     * 带分页
     * @param  [type]  $where [description]
     * @param  integer $size  [description]
     * @param  integer $limit [description]
     * @return [type]         [description]
     */
    public function get_where_limit($where,$size=0,$limit=0){
        return $this->db->where($where)->order_by($this->table_name.'_id','asc')->get($this->table_name,$size,$limit)->result_array();
        echo $this->db->last_query();
    }

    /**
     * 普通where_in查询（查询多条）
     * @param  [type] $seek  string
     * @param  [type] $where array
     * @param  string $field string
     * @return [type]        array
     */
    public function get_where_in($seek,$where,$field=''){
        return $this->db->select($field)->where_in($seek,$where)->order_by($this->table_name.'_id','asc')->get($this->table_name)->result_array();
        // echo $this->db->last_query
    }
    /**
     * 普通分页
     * @param  [type] $size  int
     * @param  [type] $start int
     * @return [type]        array
     */
    public function get_sel_limit($start=0){
        return $this->db->order_by($this->table_name.'_id','asc')->get($this->table_name,$this->config->item('page_size'),$start)->result_array();
    }

    /**
     * 公共删除
     * @param  [type] $table_id int
     * @param  [type] $del_id   int
     * @return [type]           bool
     */
    public function get_del($del_id){
       $key=$this->db->primary($this->table_name);
       return $this->db->where($key,$del_id)->delete($this->table_name);
        // echo $this->db->last_query();die;
    }
   
    /**
     * 公共修改
     * @param  [type] $data     array
     * @param  [type] $table_id int
     * @param  [type] $up_id    int
     * @return [type]           bool
     */
    public function get_update($data,$up_id){
        $key=$this->db->primary($this->table_name);
        return $this->db->where($key,$up_id)->update($this->table_name,$this->get_fields($data));
    }
    /**
     * 公共查询总数  带条件和不带条件
     * @param  integer $where [description]
     * @return [type]         [description]
     */
    public function get_count($where=array()){
        if ($where=='') {
            return $this->db->count_all($this->table_name);
        }else{
            return $this->db->where($where)->count_all_results($this->table_name);
        }
    }

    public function get_type(){
        $sql="SELECT *,CONCAT(path,'-',category_id) as new_path FROM category ORDER BY new_path asc";
        return $this->db->query($sql)->result_array();
    }
    /** 处理无限极分类 */
    public function get_category($data,$parent_id=0){
        $new_data = array();
        foreach ($data as $key => $v) {
            if ($v['parent_id'] == $parent_id) {
                $new_data[$key] = $v;
                $new_data[$key]['son'] = $this->get_category($data,$v['category_id']);
            }
        }
        return $new_data;
    }
}
