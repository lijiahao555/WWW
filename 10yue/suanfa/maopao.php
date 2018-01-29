<?php

//冒泡排序

$arr = [49, 38, 65, 97, 76, 13, 55, 48];


function a($array){

    //长度
    $lenth = count($array);

    //长度小于 等于0 返回这个数组
    if ($lenth <= 0) return $arr;

    //循环 从小到大 递增
    for($i=0; $i<$lenth; $i++){

        //循环的去比较 小的值循环 一直放到最前面

        //从大到小递减  j=$lenth-1 是下标从最后一位开始 如果j不大于i 递减停止
        for($j=$lenth-1; $j>$i; $j--){

            //j下标的值 小于 j的前一位的值 替换
            if ($array[$j] < $array[$j-1]){

                //临时j值
                $tmp = $array[$j];

                //j值替换成j-1值
                $array[$j] = $array[$j-1];

                //j-1值替换成临时j值
                $array[$j-1] = $tmp;

             }

         }

     }

    return $array;

}

print_r(a($arr));