<?php 
class Role_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }
    /**
     * 根据登录人姓名  求出角色名
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    public function name($name){
        //求出用户id
        $user_id=$this->db->select('user_id')->where("user_name='$name'")->get('user')->row_array();
        //根据用户id求出角色id
        $role_id=$this->db->select('role_id')->where_in("user_id",$user_id)->get('user_role')->row_array();
        //根据角色id求出角色名
        return $this->db->select('role_name')->where_in("role_id",$role_id)->get('role')->row_array();
    }
    /**
     * 根据用户id获取角色id
     * @param  [type] $user_id int
     * @return [type]          int
     */
    public function id($user_id){
        $res=$this->db->select('role_id')->where("user_id='$user_id'")->get('user_role')->row_array();
        return $res['role_id'];
    }
}