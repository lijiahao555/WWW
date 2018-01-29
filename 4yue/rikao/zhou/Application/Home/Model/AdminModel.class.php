<?php
namespace Home\Model;
use Think\Model;
class AdminModel extends Model {    
	protected $tableName = 'admin'; 
	function addOne($data){
		return M($this->tableName)->add($data);
	}

	function findOne($post){
		$name=$post['name'];
		$pwd=$post['pwd'];
		$exam=$post['exam'];
		$z_name="/^[\x{4e00}-\x{9fa5}]{1,}$/u";
		if (preg_match($z_name,$name )==0) {
			$this->success('账号不正确',U('/Home/Admin/admin'),2);
			die;
		}
		$z_pwd="/^\w{5,}$/u";
		if (preg_match($z_pwd, $pwd)==0) {
			$this->success('密码不正确',U('/Home/Admin/admin'),2);
			die;
		}

	
		$verify = new \Think\Verify();
		$a=$verify->check($exam);
		if ($a==false) {
			return 4;
			die;
		}
		

		$where="name = '$name'";
		$res=M($this->tableName)->where($where)->find();
		if ($res) {
			if ($res['pwd']==$pwd) {
				return 1;die;
			}else{
				return 2;die;
			}
		}else{
			return 3;die;
		}
		
	}

	public function find($name){
		$res=M($this->tableName)->where("name='$name'")->find();
		return $res['id'];
	}


}