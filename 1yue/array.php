<?php
header("content-type:text/html;charset=utf8");
// $arr=array(array('a'=>'zhangsan'));
// foreach ($arr as $key => $v) {
// 	foreach ($v as $k => $va) {
// 		$arr[$key][$k]='hello word';
// 	}
// }
// print_r($arr);


// 二维变一维
// $arr=array(
// 	array(1,2,3),
// 	array(4,5,6),
// 	array(7,8,9),
// 	);
// foreach ($arr as $k => $v) {
// 	foreach ($v as $key => $val) {
// 		$a[]=$val;
// 	}
// }
// //一维变二维
// foreach ($a as $key => $value) {
// 	$b[][]=$value;
// }
// print_r($b);



//处理二维变三维且二维
// $arr=array(
// 	array("username"=>"张鹏飞",'age'=>23,'sex'=>'男'),
// 	array("username"=>"丽丽",'age'=>20,'sex'=>'女'),
// 	array("username"=>"小明",'age'=>16,'sex'=>'男'),
// 	array("username"=>"大明",'age'=>20,'sex'=>'男')
// );
// foreach ($arr as $key => $v) {
// 	if ($v['sex']=='男') {
// 		unset($v['sex']);
// 		$data['男'][]=$v;
// 	}else{
// 		unset($v['sex']);
// 		$data['女'][]=$v;
// 	}
// }
// print_r($data);


//数组转换成字符串
// $arr=array("username"=>"张鹏飞",'age'=>23,'sex'=>'男');
// $str1="";
// $str2="";
// foreach ($arr as $k => $v) {
// 	$str1.="'".$k."',";
// 	$str2.=$v.',';
// }
// $str1=trim($str1,',');
// echo $str1;


//一对多的时候组合成二维添加到数据库
// $a=1;
// $b=array(2,3,4);
// foreach ($b as $k => $v) {
// 		$c[$k]['a']=$a;
// 		$c[$k]['b']=$v;
// }
// print_r($c);


//二维带三维 组合成2维；
// $arr = array(
// 	array('c' => 3,'c_name'=>'名称','parent'=>'' ),
// 	array('c' => 4,'c_name'=>'风景','parent'=>'' ),
// 	array('c' => 5,'c_name'=>'法拉利','parent'=>array('c_name' => '名车' )),
// 	array('c' => 6,'c_name'=>'悍马','parent'=>array('c_name' => '名车' ) ),
// 	);
// foreach ($arr as $key => $val) {
// 	if (is_array($val['parent'])) {
// 		$arr[$key]['parent']=$val['parent']['c_name'];
// 	}else{
// 		$arr[$key]['parent']='无';
// 	}
// }
// print_r($arr);

//flag  1   0
// $arr = array(
// 	array('c' => 3,'c_name'=>'讲师'),
// 	array('c' => 4,'c_name'=>'班主任'),
// 	array('c' => 5,'c_name'=>'班长'),
// 	array('c' => 6,'c_name'=>'系主任' ),
// 	);
// $str="班长,班主任";
// $str1=explode(',', $str);
// print_r($str1);

// foreach ($arr as $k => $v) {
// 	if (in_array($v['c_name'], $str1)) {
// 		$arr[$k]['flag']=1;
// 	}else{
// 		$arr[$k]['flag']=0;
// 	}
// }
// print_r($arr);

//字符串组合成数组 重复的
// $a="abcda";
// $b="acdea";
// for ($i=0; $i <strlen($a) ; $i++) {
// 	for ($j=0; $j <strlen($b) ; $j++) {
// 		if ($a[$i]==$b[$j]) {
// 			$data[]=$a[$i];
// 		}
// 	}
// }
// foreach ($data as $k => $v) {
// 	$arr[$v]=$v;
// }
// print_r($arr);


?>
<script>
	var s = "The rain in Spain falls mainly in the plain.";
   // 在每个空格字符处进行分解。
   ss = s.split(" ");
   alert(ss)
</script>