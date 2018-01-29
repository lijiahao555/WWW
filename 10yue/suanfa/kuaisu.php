<?php

//快速排序

$arr = [49, 38, 65, 97, 76, 13, 55, 48];

function a($arr){

	$lenth = count($arr);

	//长度小于 等于0 返回这个数组
	if ($lenth <= 1) return $arr;

	//定义一个中间变量
	$key[0] = $arr[0];

	//声明左数组
	$left_arr = array();

	//声明右数组
	$right_arr = array();

	//循环 0取出去了 从1开始
	for ($i=1; $i < $lenth; $i++) {

		//如果i值 <= 中间值 放左边
		if ($arr[$i] <= $key[0]) {

			$left_arr[] = $arr[$i];

		} else {

			// 如果i值 > 中间值 放右边
			$right_arr[] = $arr[$i];

		}

	}

	// 左数组递归调用
	$left_arr = a($left_arr);
	// 右数组递归调用
  	$right_arr = a($right_arr);

  	//合并
  	return array_merge($left_arr, $key, $right_arr);

}

print_r(a($arr));