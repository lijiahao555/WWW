<?php 


/**
*@param $table  表名
*@param $page=1  当前页，默认为1
*@param $where  查询条件，默认为1
*@param $size  每页显示的条数
*@param $array  1、分页后的数据  2、拼接好的分页字符串
*/
function page($table,$page,$size,$where,$order){
	// var_dump($where);die;
	$User = M($table); // 实例化User对象
	//写条件，算出总条数
	$num=$User->where($where)->count();
	
	//算出总页数
	$zong=ceil($num/$size);

	if ($zong==0) {
		$zong=1;
	}else{
		$zong;
	}
	//限制尾页，如果显示页数超出总页数，自动换成当前总页数

	$page=$page>$zong?$zong:$page;

	//上一页
	$shang = $page-1<=1 ? 1 : $page-1; 

	//下一页
	$xia = $page+1 > $zong ? $zong : $page+1; 
	
	//偏移量
	$start = ($page-1)*$size;

	//查询出每页出多少条数据
	// $list = $User->where($where)->limit($start,$size)->select();
	$list = $User->where($where)->order($order)->limit($start,$size)->select();


$show  = <<<EOD
当前 $page 页
<a href=javascript:ajax(1)>首页</a>
<a href=javascript:ajax($shang)>上一页</a>
<a href=javascript:ajax($xia)>下一页</a>
<a href=javascript:ajax($zong)>尾页</a>
共 $zong 页
EOD;
	return array(
			'list'=>$list,
			'show'=>$show,
			'zong'=>$zong,
			

		);

}

 ?>