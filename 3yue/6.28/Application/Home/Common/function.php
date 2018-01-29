<?php 
function page($table,$page,$size,$where){

	$User=M($table);
	//计算出共多少条数据
	$num = $User->where($where)->count();

	//共多少条，总记录除以每页数
	// $zong=($count/$size);
	// //判断总页数是否为0，是给1，否给原值
	// if ($zong==0) {
	// 	$zong=1;
	// }else{
	// 	$zong;
	// }

	
	
	//算出总页数
	$zong=ceil($num/$size);

	if ($zong==0) {
		$zong=1;
	}else{
		$zong;
	}
	//限制
	//限制超出总页数时自动转换成当前页
	$page=$page >$zong ? $zong : $page;
	//上下页
	$up=$page-1 <=1 ? 1 : $page-1;

	$next=$page+1 <=1 ? $zong : $page+1;
	//计算偏移量，查数据
	$start=($page-1)*$size;

	$list = $User->where($where)->limit($start,$size)->select();
	// echo "<pre>";
	// var_dump($list);die;
$show = <<<EL
<a href=javascript:ajax(1)>首页</a>
<a href=javascript:ajax($up)>上一页</a>
<a href=javascript:ajax($next)>下一页</a>
<a href=javascript:ajax($zong)>尾页</a>
EL;
	return array(
	'list'=>$list,
	'show'=>$show,
	);


}

 ?>