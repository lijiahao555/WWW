<?php
class Role_control_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }  
    /**
     * 求出权限每个角色的权限ID
     * @param  [type] $role_id array
     * @return [type]          array
     */
    public function select($role_id){
        $res=$this->db->select('control_id')->where_in('role_id',$role_id)->get('role_control')->result_array();
     
        foreach ($res as $key => $v) {
            $arr[]=$v['control_id'];
        }
        return $arr;
    }


}
