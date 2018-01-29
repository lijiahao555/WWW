<?php
namespace Admin\Model;
use Think\Model;
class LoginModel extends Model {
    protected $tableName = 'login';
    /**
     * 注册一条登录信息
     * @param [type] $data array
     * @return  int 
     */
    function add($data){
    	$res=M($this->tableName)->add($data);
    	if ($res) {
    		//同时向详细信息user表添加id
    		$arr['user_id']=$res;
    		return M('user')->add($arr);
    	}else{
    		return false;
    	}
    }

    function exam($data){
    	$name=$data['login_name'];
    	$pwd=$data['login_pwd'];

    	$res=M($this->tableName)->where("login_name='$name'")->find();
    	if ($res) {
    		if ($res['login_pwd']==$pwd) {
    			return 0;
    		}else{
    			return 1;
    		}
    	}else{
    		return 2;
    	}
    }


}