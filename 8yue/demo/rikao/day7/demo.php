<?php
header('content-type:text/html;charset=utf8');
echo md5('2344bf013fad31726aa42f557ed7f258');die;
// $arr = array(
// 		array('name'=>'张三','age'=>'18','sex'=>'男'),
// 		array('name'=>'李四','age'=>'18','sex'=>'男'),
// 		array('name'=>'王五','age'=>'18','sex'=>'女'),
// 		array('name'=>'赵六','age'=>'18','sex'=>'男'),
// 	);

// foreach ($arr as $k => $v) {
// 	if ($v['sex']=='男') {
// 		$data['男'][] = $v;
// 	}else{
// 		$data['女'][] = $v;
// 	}
// }
$arraysort = array(3,3);
$arr = array();
for ($i=$arraysort[0]; $i < $arraysort[0]*$arraysort[1]*2 ; $i++) {
	if ($i%2!=0) {
		$arr[] = $i;
	}
}
print_r($arr);
$arraysort = array(2,3);
$arr = array();
$a = $arraysort[0]-1;
for ($i=0; $i < $arraysort[1]*2 ; $i++) { 
	$a++;
	if ($a%2 != 0) {
		$arr[] = $a;
	}
}
print_r($arr);
// function ji($arr, $need_odd){
//  return array_filter($arr, function($item) use($need_odd){
//   return $need_odd ? ($item & 1) : (!($item & 1));
//  });
// }

// $one_side = ji(range(1, 100), true);
// print_r($one_side);
