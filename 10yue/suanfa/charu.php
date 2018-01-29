<?php

//插入排序

$arr = [11, 5, 55, 64, 22, 69];

function a($arr){

	//长度
	$lenth = count($arr);

	//长度小于 等于0 返回这个数组
    if ($lenth <= 0) return $arr;

	//循环 从第二个下标开始
	for ($i=1; $i < $lenth ; $i++) {

		//临时i值
		$tmp = $arr[$i];

		//临时i下标的前一位下标
		$j = $i - 1;

		//循环 $j递减>=0的时候 且 如果j值大于临时i值 替换
		while ($j >= 0 && $arr[$j] > $tmp) {

			$arr[$j+1] = $arr[$j];

			$arr[$j] = $tmp;

			//递减循环去比较
			$j--;

		}

	}

	return $arr;

}


print_r(a($arr));
