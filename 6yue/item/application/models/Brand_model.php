<?php
class Brand_model extends Common_model {

    function __construct()
    {
        parent::__construct();
    }
    public $table_name="brand";
    /**
     * 处理添加商品信息
     * @param [type] $data array
     */
    public function add($data){
        return $this->db->insert('brand',$data);
    }
    /**
     * 查询所有数据
     * @return [type] array
     */
    public function select(){
        return $this->db->order_by('sort_order','desc')->get('brand',3,0)->result_array();
    }
    /**
     * 删除数据
     * @param  [type] $id int
     * @return [type]     boor
     */
    public function del($id){
        return $this->db->where("brand_id",$id)->delete("brand");
    }
    /**
     * 根据id查询要修改的单条数据
     * @param  [type] $id int
     * @return [type]     array
     */
    public function up_select($id){
        return $this->db->where("brand_id",$id)->get("brand")->row_array();
    }
    /**
     * 修改单条数据
     * @param  [type] $data array
     * @return [type]       int
     */
    // public function up_one($data){
    //     return $this->db->where("brand_id",$data['brand_id'])->update('brand',$data);
    // }
}
