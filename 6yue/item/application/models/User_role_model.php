<?php
class User_role_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }  
    /**
     * 求出角色ID
     * @param  [type] $id 用户id
     * @return [type]     array
     */
    public function select($id){
        $res=$this->db->select('role_id')->where("user_id='$id'")->get('user_role')->result_array();
        foreach ($res as $key => $v) {
            $arr[]=$v['role_id'];
        }
        return $arr;
    }


}
