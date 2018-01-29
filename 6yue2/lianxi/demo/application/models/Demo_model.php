<?php
class Demo_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    public function add($data){
    	// print_r($data);die;
    	return $this->db->insert('demo',$data);
    }
    public function select(){
    	return $this->db->order_by('demo_id','asc')->get('demo',3,0)->result_array();
    }
    public function selectOne($id){
    	return $this->db->get_where('demo',array('demo_id'=>$id))->result_array();
    }
    public function del($id){
        return $this->db->where('demo_id',$id)->delete('demo');
        // echo $this->db->last_query();die;
    }

    public function up($data){
        return $this->db->where('demo_id',$data['demo_id'])->update('demo',$data);
    }
    public function Infor_show(){
        return $this->db->where("user_id=1")->get('demo',3,0)->result_array();
    }
    /**
     * 获取通过审核的数据条数
     * @return [type] int
     */
    public function infor_num(){
        $this->db->from('demo');
        $count= $this->db->count_all_results();
        return $zong=ceil($count/3);
    }
    /**
     * 通过审核的ajax数据
     * @param  [type] $page int
     * @param  [type] $size int
     * @return [type]       array
     */
    public function ajax($page,$size,$sou=1){
        $start=($page-1)*$size;
        return $this->db->like("demo_name" , "$sou")->order_by('demo_id','asc')->get('demo',"$size","$start")->result_array();
    }

}