<?php
class Role_model extends Common_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }
    public $table_name='z_role';
    public function exam($name){
        $user_id=$this->db->select('user_id')->where("user_name='$name'")->get('z_user')->row_array();
        $role_id=$this->db->select('role_id')->where("user_id='".$user_id['user_id']."'")->get('z_user_z_role')->row_array();

    	return $this->db->select('role_name')->where("role_id='".$role_id['role_id']."'")->get('z_role')->row_array();
    }

}