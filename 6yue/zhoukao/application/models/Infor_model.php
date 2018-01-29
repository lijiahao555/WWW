<?php 
class Infor_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }
    /**
     * 获取通过审核的数据
     * @return [type] array
     */
    public function Infor_show(){
    	return $this->db->where("user_id=1")->get('infor',10,0)->result_array();
    }
    /**
     * 获取通过审核的数据条数
     * @return [type] int
     */
    public function infor_num(){
        $this->db->where('user_id=1');
        $this->db->from('infor');
        $count= $this->db->count_all_results();
        return $zong=ceil($count/10);
    }
    /**
     * 通过审核的ajax数据
     * @param  [type] $page int
     * @param  [type] $size int
     * @return [type]       array
     */
    public function ajax($page,$size){
        $start=($page-1)*$size;
        return $this->db->where("user_id=1")->get('infor',"$size","$start")->result_array();
    }

    /**
     * 获取未提交的数据
     * @return [type] array
     */
    public function add_select(){
        return $this->db->where("user_id !='3' && user_id !='1'")->get('infor',10,0)->result_array();
        
    }
    /**
     * 获取未通过的数据条数
     * @return [type] int
     */
    public function add_num(){
        $this->db->where("user_id !='3' && user_id !='1'");
        $this->db->from('infor');
        $count= $this->db->count_all_results();
        return $zong=ceil($count/10);
    }
    /**
     * 通过未提交的ajax数据
     * @param  [type] $page int
     * @param  [type] $size int
     * @return [type]       array
     */
    public function add_ajax($page,$size){
        $start=($page-1)*$size;
        return $this->db->where("user_id !='3' && user_id !='1'")->get('infor',"$size","$start")->result_array();
    }
    /**
     * 展示待审核的信息
     * @param  [type] $user_id int
     * @return [type]          array
     */
    public function wait(){
        return $this->db->where("user_id=3")->get('infor',10,0)->result_array();

    }
    /**
     * 获取待审核的数据条数
     * @return [type] int
     */
    public function wait_num(){
        $this->db->where("user_id=3");
        $this->db->from('infor');
        $count= $this->db->count_all_results();
        return $zong=ceil($count/10);
    }
    /**
     * 获取待审核的ajax信息
     * @param  [type] $page int
     * @param  [type] $size int
     * @return [type]       array
     */
    public function wait_ajax($page,$size){
        $start=($page-1)*$size;
        return $this->db->where("user_id=$user_id")->get('infor',"$size","$start")->result_array();
    }
    /**
     * 获取需要审核的信息
     * @return [type] [description]
     */
    public function exam_select(){
        return $this->db->where("user_id=3")->get('infor',10,0)->result_array();
    }
    /**
     * 获取审核列表数据条数
     * @return [type] int
     */
    public function exam_num(){
        $this->db->where("user_id=3");
        $this->db->from('infor');
        $count=$this->db->count_all_results();
    	return $zong=ceil($count/10);
    }
    /**
     * 获取审核ajax的信息
     * @param  [type] $page int
     * @param  [type] $size int
     * @return [type]       array
     */
    public function exam_ajax($page,$size){
        $start=($page-1)*$size;
        return $this->db->where("user_id=3")->get('infor',"$size","$start")->result_array();
    }
    /**
     * 处理审核信息
     * @param  [type] $infor_id int
     * @param  [type] $user_id  int
     * @return [type]           boor
     */
    public function exam_add($infor_id,$user_id){
        $arr=array('user_id'=>$user_id);
        $this->db->where('infor_id',$infor_id);
        return $this->db->update('infor',$arr);
    }
    /**
     * 删除节目
     * @param  [type] $infor_id int
     * @return [type]           bool
     */
    public function del($infor_id){
        return $this->db->delete('infor',array('infor_id'=>$infor_id));
    }
    /**
     * 修改的数据
     * @param  [type] $infor_id INT
     * @return [type]           array
     */
    public function selectOne($infor_id){
        return $this->db->where(array('infor_id'=>$infor_id))->get('infor')->row_array();
    }
    /**
     * 修改节目名
     * @param  [type] $infor_id int
     * @return [type]           int
     */
    public function up($data){
        return $this->db->where(array('infor_id'=>$data['infor_id']))->update('infor',$data);
    }
}
