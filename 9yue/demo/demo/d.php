<?php



// 最少的代码 求3值 最大值的函数
function _max($a, $b, $c){
	$max = $a > $b ? $a : $b;
    $max = $max > $c ? $max : $c;
    return $max;
}

echo _max(5,2,8);die;




//字符串反转
$d = 'abcd';
echo strrev($d);