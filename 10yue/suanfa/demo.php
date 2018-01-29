<?php
$arr = [5,2,9,6,44,33];

// 冒泡
function a($arr){

	$lenth = count($arr);

	if ($lenth <= 1) {
		return $arr;
	}

	for ($i=0; $i < $lenth ; $i++) {

		for ($j=$lenth-1; $j>$i; $j--) {

			if ($arr[$j] < $arr[$j-1]) {

				$tmp = $arr[$j];

				$arr[$j] = $arr[$j-1];

				$arr[$j-1] = $tmp;

			}

		}

	}

	return $arr;
}

print_r(a($arr));


// 选择
function b($arr){

	$lenth = count($arr);

	if ($lenth <= 1) {
		return $arr;
	}

	for ($i=0; $i < $lenth; $i++) {

		$p = $i;

		for ($j=$i+1; $j< $lenth; $j++) {

			if ($arr[$j] < $arr[$p]) {

				$p = $j;

			}

		}

		if ($p != $i) {

			$tmp = $arr[$i];

			$arr[$i] = $arr[$p];

			$arr[$p] = $tmp;

		}

	}

	return $arr;

}

print_r(b($arr));



// 快速
function c($arr){

	$lenth = count($arr);

	if ($lenth <= 1) {
		return $arr;
	}

	$key[0] = $arr[0];

	$left = array();

	$right = array();

	for ($i=1; $i < $lenth; $i++) {

		if ($arr[$i] < $key[0]) {

			$left[] = $arr[$i];

		} else {

			$right[] = $arr[$i];

		}

	}

	$left = c($left);

	$right = c($right);

	return array_merge($left, $key, $right);
}

print_r(c($arr));

// 插入
function d($arr){

	$lenth = count($arr);

	if ($lenth <= 1) {
		return $arr;
	}

	for ($i=1; $i < $lenth; $i++) {

		$tmp = $arr[$i];

		$j = $i-1;

		while ($j >= 0 && $arr[$j] > $tmp) {

			$arr[$j+1] = $arr[$j];

			$arr[$j] = $tmp;

			$j--;

		}

	}
	return $arr;
}

print_r(d($arr));