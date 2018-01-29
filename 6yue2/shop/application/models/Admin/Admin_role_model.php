<?php
class Admin_role_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * 根据用户id 求出所对应的角色id
     * @param  [type] $admin_id int
     * @return [type]           array
     */
    public function role_id($admin_id){
        return $this->db->select('role_id')->where("admin_id='$admin_id'")->get('admin_role')->result_array();
    }
}