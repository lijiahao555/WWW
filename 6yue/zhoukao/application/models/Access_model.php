<?php 
class Access_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }
    /**
     * 获取url地址
     * @param  [type] $access_id 权限id
     * @return [type]            array
     */
    public function url($access_id){
        $res=$this->db->select("access_url")->where_in("access_id",$access_id)->get('access')->result_array();
        foreach ($res as $key => $value) {
        	$arr[]=$value['access_url'];
        }
        return $arr;

    }

}