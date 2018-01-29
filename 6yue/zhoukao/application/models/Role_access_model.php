<?php 
class Role_access_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * 根据角色id获取权限id
     * @param  [type] $role_id array
     * @return [type]          array
     */
    public function id($role_id){
       $res=$this->db->select("access_id")->where("role_id=$role_id")->get('role_access')->result_array();

       foreach ($res as $key => $v) {
            $arr[]=$v['access_id'];
       }
       return $arr;
    }
}