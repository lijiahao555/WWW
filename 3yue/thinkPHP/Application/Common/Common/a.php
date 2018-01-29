<?php 
// namespace Home\Controller;
// use Think\controller;
// class a extends Controller{

// }

function page($table,$page,$size,$where){
	//连接数据库
	$User=M($table);
	//计算多少条总数据
	$count = $User->where($where)->count();// 查询满足要求的总记录数
	//计算总页数
	$zong=ceil($count/$size);
	//限制上下页
	$page=$page>$zong?$zong:$page;
	//上下页
	$up=$page-1<=0?1:$page-1;
	$next=$page+1<=$zong?$zong:$page+1;
	//计算偏移量
	$start=($page-1)*$size;
	//搜数据
	$list = $User->where($where)->limit($start,$size)->select();

$show=<<<SHOW
当前 $page 页
<a href=javascript:s(1)>首页</a>
<a href=javascript:s($up)>上一页</a>
<a href=javascript:s($next)>下一页</a>
<a href=javascript:s($zong)>尾页</a>
共 $zong 页
SHOW

	return array(
			'list' => $list,
			'show' => $show

		);

}



 ?>