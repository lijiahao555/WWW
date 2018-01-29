<?php
namespace Home\Model;
use Think\Model;
class InforModel extends Model {    
	protected $tableName = 'infor'; 
	function selectAll(){
		$User=M($this->tableName);
		$size=3;
		$list=M($this->tableName)->limit(0,$size)->select();
		$infor=M($this->tableName)->select();
		foreach ($infor as $k => $v) {
			$res=M('type_infor')->join('type on type_infor.type_id =type.type_id')->where('id='.$v['id'])->getField('type_name',true);
			$infor[$k]['type_name']=implode(',', $res);
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

	function ajax($p,$h){
		$size=3;
		$count= M($this->tableName)->count();
		$zong=ceil($count/$size);
		$up=$p-1<1 ? 1 : $p-1;
		$next=$p+1> $zong ? $zong : $p+1;
		$start=($p-1)*$size;
		
		
		// if ($h==5) {
		// 	$list=M($this->tableName)->order("time desc")->limit($start,$size)->select();
		// 	foreach ($list as $k => $v) {
		// 		$list[$k]['zan']=M("zan")->where("infor_id=".$v['id'])->count();
		// 	}
		// }else if ($h==6) {
		// 	$list=M($this->tableName)->limit($start,$size)->select();
		// 	foreach ($list as $k => $v) {
		// 		$list[$k]['zan']=M("zan")->where("infor_id=".$v['id'])->count();
		// 		Rsort($list);
		// 	}
		// }else{
		// 	$list=M($this->tableName)->limit($start,$size)->select();
		// 	foreach ($list as $k => $v) {
		// 		$list[$k]['zan']=M("zan")->where("infor_id=".$v['id'])->count();
		// 	}
		// }
		$list=M($this->tableName)->where($where)->limit($start,$size)->select();

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
		// print_r($data);
		$res=$User->add($data);
		$arr['admin_id']=$admin_id['id'];
		$arr['infor_id']=$res;
		// print_r($arr);die;
		if ($res) {
			return $num=M('zan')->add($arr);
		}else{
			return false;
		}
	}
	function addtwo($data){
		$name=$_SESSION['name'];
		$admin_id=M('admin')->where("name='$name'")->find();
		$time=date('Y-m-d H:i:s');
		$admin_id=$admin_id['id'];
		$arr['name']=$data['name'];
		$arr['content']=$data['content'];
		$arr['time']=$time;
		$arr['admin_id']=$admin_id;
		// print_r($arr);die;
		$res=M($this->tableName)->add($arr);
		for ($i=0; $i <count($data['box']) ; $i++) { 
			$array[$i]['id']=$res;
			$array[$i]['type_id']=$data['box'][$i];
		}
		// print_r($array);die;
		if ($arr) {
			return M('type_infor')->addAll($array);
		}else{
			return false;
		}
	}
	function sel($id){
		$infor=M('infor')->select();
		foreach ($infor as $k => $v) {
			$res=M('type_infor')->join('type on type_infor.type_id =type.type_id')->where('infor_id='.$v['id'])->setField('type_name',true);
			print_r($res);
		}

		die;
		
	}
	function selectsousuo($sousuo){
		$size=3;
		$count= M($this->tableName)->count();
		$zong=ceil($count/$size);
		$up=$p-1<1 ? 1 : $p-1;
		$next=$p+1> $zong ? $zong : $p+1;
		$start=($p-1)*$size;


		$type=M('type')->select();

		$infor=M('infor')->where("name like '%$sousuo%'")->select();
		foreach ($infor as $k => $v) {
			$res=M('type_infor')->join('type on type_infor.type_id =type.type_id')->where('id='.$v['id'])->getField('type_name',true);
			$infor[$k]['type_name']=implode(',', $res);
		}
		print_r($infor);die;
		$page['up']=$up;
		$page['next']=$next;
		$page['zong']=$zong;
		$arr['list']=$list;
		$arr['page']=$page;
		return $arr;
	}
}