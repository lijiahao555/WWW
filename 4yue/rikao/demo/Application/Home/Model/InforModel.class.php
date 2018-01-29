<?php
namespace Home\Model;
use Think\Model;
class InforModel extends Model {    
	protected $tableName = 'infor'; 
	// function selectAll(){
	// 	$User=M($this->tableName);
	// 	$size=3;
	// 	$list=M($this->tableName)->limit(0,$size)->select();
	// 	foreach ($list as $k => $v) {
	// 		$list[$k]['zan']=M("zan")->where("infor_id=".$v['id'])->count();
	// 	}
	// 	// echo "<pre>";
	// 	// print_r($list);die;
	// 	// die;
	// 	$page=M($this->tableName)->count();
	// 	$count=ceil($page/$size);
	// 	$arr['list']=$list;
	// 	$arr['page']=$count;
	// 	return $arr;
	// }
	function selectAll(){
		$User=M($this->tableName);
		$size=3;
		$list=M($this->tableName)->limit(0,$size)->select();
		// $infor=M($this->tableName)->select();
		foreach ($list as $k => $v) {
			$res=M('type_infor')->join('type on type_infor.type_id =type.type_id')->where('id='.$v['id'])->getField('type_name',true);
			$list[$k]['zan']=M("zan")->where("infor_id=".$v['id'])->count();
			
			$list[$k]['type_name']=implode('  ', $res);
		}
		// echo "<pre>";
		// print_r($list);die;
		// die;
		$page=M($this->tableName)->count();
		$count=ceil($page/$size);
		$arr['list']=$list;
		$arr['page']=$count;
		return $arr;
	}

	function ajax($p,$h,$where,$id){
		$size=3;
		$count= M($this->tableName)->count();
		$zong=ceil($count/$size);
		$up=$p-1<1 ? 1 : $p-1;
		$next=$p+1> $zong ? $zong : $p+1;
		$start=($p-1)*$size;
		
		
		if ($h==5) {
			$list=M($this->tableName)->order("time desc")->where($where)->limit($start,$size)->select();
			foreach ($list as $k => $v) {
				$res=M('type_infor')->join('type on type_infor.type_id =type.type_id')->where('id='.$v['id'])->getField('type_name',true);
				$list[$k]['zan']=M("zan")->where("infor_id=".$v['id'])->count();
			
				$list[$k]['type_name']=implode('  ', $res);
			}
		}else if ($h==6) {
			$list=M($this->tableName)->where($where)->limit($start,$size)->select();
			foreach ($list as $k => $v) {
				$res=M('type_infor')->join('type on type_infor.type_id =type.type_id')->where('id='.$v['id'])->getField('type_name',true);
				$list[$k]['zan']=M("zan")->where("infor_id=".$v['id'])->count();
			
				$list[$k]['type_name']=implode('  ', $res);
				Rsort($list);
			}
		}else if ($id==1) {
			$list=M('type_infor')->join('infor on type_infor.id =infor.id')->where('type_id='.$id)->select();
			foreach ($list as $k => $v) {
				$res=M('type_infor')->join('type on type_infor.type_id =type.type_id')->where('id='.$v['id'])->getField('type_name',true);
				$list[$k]['zan']=M("zan")->where("infor_id=".$v['id'])->count();
			
				$list[$k]['type_name']=implode('  ', $res);
			}
		}else if ($id==2) {
			$list=M('type_infor')->join('infor on type_infor.id =infor.id')->where('type_id='.$id)->select();
			foreach ($list as $k => $v) {
				$res=M('type_infor')->join('type on type_infor.type_id =type.type_id')->where('id='.$v['id'])->getField('type_name',true);
				$list[$k]['zan']=M("zan")->where("infor_id=".$v['id'])->count();
			
				$list[$k]['type_name']=implode('  ', $res);
			}
		}else if ($id==3) {
			$list=M('type_infor')->join('infor on type_infor.id =infor.id')->where('type_id='.$id)->select();
			foreach ($list as $k => $v) {
				$res=M('type_infor')->join('type on type_infor.type_id =type.type_id')->where('id='.$v['id'])->getField('type_name',true);
				$list[$k]['zan']=M("zan")->where("infor_id=".$v['id'])->count();
			
				$list[$k]['type_name']=implode('  ', $res);
			}
		}else if ($id==4) {
			$list=M('type_infor')->join('infor on type_infor.id =infor.id')->where('type_id='.$id)->select();
			foreach ($list as $k => $v) {
				$res=M('type_infor')->join('type on type_infor.type_id =type.type_id')->where('id='.$v['id'])->getField('type_name',true);
				$list[$k]['zan']=M("zan")->where("infor_id=".$v['id'])->count();
			
				$list[$k]['type_name']=implode('  ', $res);
			}
		}else{
			$list=M($this->tableName)->where($where)->limit($start,$size)->select();
			foreach ($list as $k => $v) {
				$res=M('type_infor')->join('type on type_infor.type_id =type.type_id')->where('id='.$v['id'])->getField('type_name',true);
				$list[$k]['zan']=M("zan")->where("infor_id=".$v['id'])->count();
			
				$list[$k]['type_name']=implode('  ', $res);
			}
		}
		

	
		$page['up']=$up;
		$page['next']=$next;
		$page['zong']=$zong;
		$arr['h']=$h;
		$arr['list']=$list;
		$arr['page']=$page;
		return $arr;
	}

	public function addOne($post){
		$name=$_SESSION['name'];
		$admin_id=M('admin')->where("name='$name'")->find();
		$time=date('Y-m-d H:i:s');
		$User=M($this->tableName);
		$data['name']=$post['name'];
		$data['content']=$post['content'];
		$data['time']=$time;
		$data['admin_id']=$admin_id['id'];
		$res=$User->add($data);
		$arr['admin_id']=$admin_id['id'];
		$arr['infor_id']=$res;
		
		// print_r($array);die;
		if ($res) {
			return $num=M('zan')->add($arr);
		}else{
			return false;
		}
	}

	public function addTwo($post){
		$name=$_SESSION['name'];
		$admin_id=M('admin')->where("name='$name'")->find();
		$time=date('Y-m-d H:i:s');
		$User=M($this->tableName);
		$data['name']=$post['name'];
		$data['content']=$post['content'];
		$data['time']=$time;
		$data['admin_id']=$admin_id['id'];
		$res=$User->add($data);
		for ($i=0; $i <count($post['box']) ; $i++) { 
			$array[$i]['id']=$res;
			$array[$i]['type_id']=$post['box'][$i];
		}
		// print_r($array);die;
		if ($res) {
			return $type=M('type_infor')->addAll($array);
		}else{
			return false;
		}
	}
}