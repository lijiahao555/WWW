<?php 
function page($table,$page,$size,$where=1){
	

	$User=M($table);
	
	$count= $User->where('1')->count();
	$zong=ceil($count/$size);
	if ($zong==0) {
		$zong=1;
	}else{
		$zong;
	}

	$page=$page >$zong ? $zong : $page;

	$up=$page-1<1 ? 1 : $page-1;

	$next=$page+1> $zong ? $zong : $page+1;
	// echo $start;die;
	$start=($page-1)*$size;
	if ($where==5) {
		$list=$User->order('time desc')->limit($start,$size)->select();
	}else if($where==6){
		$list=$User->order('zan desc')->limit($start,$size)->select();
	}else if($where==''){
		$list=$User->limit($start,$size)->select();
	}
	// echo $User->getlastSql($list);die;

$show=<<<E
<a href=javascript:ajax(1)>首页</a>
<a href=javascript:ajax($up)>上一页</a>
<a href=javascript:ajax($next)>上一页</a>
<a href=javascript:ajax($zong)>尾页</a>
E;
	return array(
		'list'=>$list,
		'show'=>$show,
		'count'=>$count,
		);
}

 ?>