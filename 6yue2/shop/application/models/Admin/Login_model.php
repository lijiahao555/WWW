<?php
class Login_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * 验证登录信息
     * @param  [type] $data array
     * @return [type]       int
     */
    public function login($data,$word){
    	$res=$this->db->where(array('admin_name'=>$data['username']))->get('admin')->row_array();
    	if ($res) {
    		if ($res['admin_pwd']==md5($data['password'])) {
    			if ($data['exam']==$word) {
                    return 4;
                }else{
                    return 3;
                }
    		}else{
    			return 2;
    		}
    	}else{
    		return 1;
    	}
    }
    /**
     * 根据session去查询id
     * @param  [type] $admin_name string
     * @return [type]             array
     */
    public function id($admin_name){
      return $this->db->select('admin_id')->where("admin_name='$admin_name'")->get('admin')->row_array();
    }
}