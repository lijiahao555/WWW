<?php
class User_model extends Common_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }
    public $table_name="z_user";
    public function exam($data){
    	$name=$data['user_name'];
    	$pwd=$data['user_pwd'];
    	return $this->db->where("user_name='$name' && user_pwd='$pwd'")->get('z_user')->result_array();
    }
    public function select_name($name){
        return $this->db->select('user_id')->where("user_name='$name'")->get($this->table_name)->row_array();
    }
}