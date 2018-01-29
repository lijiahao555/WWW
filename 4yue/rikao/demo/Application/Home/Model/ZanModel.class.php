<?php
namespace Home\Model;
use Think\Model;
class ZanModel extends Model {    
	function add($zan,$id){
		$arr['admin_id']=$id;
		$arr['infor_id']=$zan;
		$infor_id=M('infor')->where('admin_id='.$id)->getField('id',true);
		if (in_array($zan, $infor_id)) {
			return 0;
			die;
		}else{
			$res=$this->where("infor_id='$zan' && admin_id='$id'")->find();
			if ($res==NULL) {
				$data=M('zan')->add($arr);
				if ($data) {
					return "ok";
					die;
				}
				
			}else{
				return 'no';
				die;
			}
		}
	}
}