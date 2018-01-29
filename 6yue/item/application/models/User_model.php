<?php
class User_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    /**
     * 处理登录信息 返回相应的错误值
     * @param  [type] $data array
     * @return [type]       int
     */
    public function admin($data){

    	$username=$data['username'];
    	$password=$data['password'];
    	$exam=$_SESSION['exam'];
    	if ($exam!=$data['exam']) {
    		return 4;die;
		}
        $where["user_name"] = $username;
    	$data=$this->db->get_where('user',$where)->row_array();

    	if ($data) {
    		if ($password==$data['user_pwd']) {
    			return 0;die;
    		}else{
    			return 2;die;
    		}
    	}else{
    		return 3;die;
    	}
    }
    /**
     * 查询登录人的ID
     * @param  [type] $name string
     * @return [type]       int
     */
    public function id($name){
        return $this->db->select('user_id')->where("user_name='$name'")->get('user')->row_array();
       
    }

}
