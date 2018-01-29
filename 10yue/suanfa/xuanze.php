<?php

//选择排序

$arr = [3, 5, 55, 40, 22, 69 , 6, 88, 99,11];


function a($array) {

    //长度
    $len=count($array);

    for($i=0;$i<$len;$i++) {

        //从i下标开始
        $p=$i;

        //从i+1下标开始比较
        for($j=$i+1;$j<$len;$j++) {

            //如果数组里的j值 小于 数组里的p值 替换  不小于不替换
            if($array[$j] < $array[$p]) {

                //p下标替换成j下标 
                $p = $j;

            }

        }

        //p下标就是当前数组里的最小值的下标
        //当前p下标不等于当前i下标 代表p下标值比i下标值大 替换
        if($p != $i) {

            //赋予临时变量   当前p下标的值
            $tmp=$array[$p];

            //当前p下标的值换成i下标的值
            $array[$p]=$array[$i];

            //当前i下标的值换成临时变量(p下标的值)
            $array[$i]=$tmp;

        }


    }

    return $array;
}

print_r(a($arr));

