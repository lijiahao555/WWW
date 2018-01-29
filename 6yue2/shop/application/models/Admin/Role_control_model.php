<?php
class Role_control_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * 更觉角色id 求出所对应的权限ID
     * @param  [type] $new_role_id array
     * @return [type]              array
     */
    public function control($new_role_id){
        return $this->db->select('control_id')->where_in('role_id',$new_role_id)->get('role_control')->result_array();
    }
}