<?php
namespace Home\Model;
use Think\Model;
class AdminModel extends Model {
    protected $tableName = 'admin'; 
    function login($post){
        $data['name']=$post['name'];
        $data['pwd']=md5($post['pwd']);
    	return M($this->tableName)->add($data);
    	
    }
    function exam($post){

    	$User=M($this->tableName);
    	$name=$post['name'];
    	$pwd=$post['pwd'];
    	$sql=$User->where("name='$name'")->select();
    	$s=$sql[0];
       	if ($sql) {
    		if ($s['pwd']!=$pwd) {
    			return 2;
    		}else{
    			return 3;    		
            }
    	}else{
    		return 1;
    	}
    }
    function show(){
    	$User=M($this->tableName);
    	$sql=$User->select();
    	return $sql;
    }
}
