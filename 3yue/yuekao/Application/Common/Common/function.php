<?php 
function page($table,$page,$size,$where){

	$User=M($table);
	$count = $User->where($where)->count();

	$zong=ceil($count/$size);
	
	if ($zong==0) {
		$zong=1;
	}else{
		$zong;
	}
	if ($page==null) {
		$page=1;
	}else{
		$page;
	}
	
	// $page=$page>$zong?$zong:$page;
// var_dump($page);die;
	$up=$page-1 <=1 ? 1 : $page-1;

	$next=$page+1 >= $zong ? $zong :$page+1;


	$start=ceil($page-1)*$size;
	// echo $where;die;
	$list = $User->where($where)->limit($start,$size)->select();
		// var_dump($list);die;
$show=<<<EL
当前 $page 页
<a href=javascript:ajax(1)>首页</a>
<a href=javascript:ajax($up)>上一页</a>
<a href=javascript:ajax($next)>下一页</a>
<a href=javascript:ajax($zong)>尾页</a>
共 $zong 页
EL;

	return array(
		'list'=>$list,
		'show'=>$show,

		);



}
 ?>