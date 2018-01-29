<?php 
function page($table,$page,$size,$where){
	$User = M($table); // 实例化User对象	
	// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 
	$num = $User->count();// 查询满足要求的总记录数
	//总页数
	$zong=ceil($num/$size);
	if ($zong==0) {
		$page=1;
	}else{
		$zong;
	}

	$page=$page>$zong?$zong:$page;

	$up=$page-1 < 1 ? 1 : $page-1;

	$next=$page+1 > $zong ? $zong : $page+1;

	$start=($page-1)*$size;

	$list = $User->page($page,$size)->select();
	
$show=<<<EP
当前 $page 页
<a href=javascript:ajax(1)>首页</a>
<a href=javascript:ajax($up)>上一页</a>
<a href=javascript:ajax($next)>下一页</a>
<a href=javascript:ajax($zong)>尾页</a>
共 $zong 页
EP;
	return array(
		'list'=>$list,
		'show'=>$show,

		);


}


 ?>