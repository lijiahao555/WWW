<?php 
class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }
    /**
     * 判断登录信息
     * @param  [type] $data array
     * @return [type]       int
     */
    public function adminDo($data){
        $name=$data['name'];
        $pwd=$data['pwd'];
        $data=$this->db->where("user_name='$name' && user_pwd='$pwd'")->get('user')->row_array();
        
        if ($data!='') {
        	return 1;
        }else{
        	return 2;
        }
    }
    /**
     * 根据登录人 求出ID
     * @param  [type] $name string
     * @return [type]       int
     */
    public function id($name){
      $res=$this->db->select("user_id")->where("user_name='$name'")->get('user')->row_array();
      return $res['user_id'];
    }
}