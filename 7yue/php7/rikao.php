<?php
/**
 * 日考题
 * @Author: Marte
 * @Date:   2017-09-28 09:12:08
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-10-13 10:11:48
 */

// $arr = custom(array(2,6,9,20,30,34),24);
// var_dump($arr);

//     $arr 为数组
//     $num 为要插入的数值
//     添加一个数，比如24，保持从小到大的顺序。

// function custom($arr,$num){
//     $arr[] = $num;
//     sort($arr);
//     return $arr;
// }
//
//---------------------------------
// $str = 'abaccdeff';
// // $str = 'aabbccff';
// var_dump(search_first($str));
// //在一个字符串中找到第一个只出现一次的字符
// //如果有就返回出现一次的字符,如果没有返回一个数组下标为字符,值为出现的次数
// function search_first($str){

//     $arr = str_split($str,1);
//     $num = array_count_values($arr);
//     foreach ($num as $k => $v) {
//         if ($v==1) {
//             return $k; break;
//         }
//     }
//     return $num;
//     // $num // 为出现的次数
// }
// ------------------------------------------
// $num = sprintf("%u",ip2long('192.170.1.150'));
//     echo $num;exit;
// // var_dump(ipAddr('192.168.1.100'));
// function ipAddr($ipaddr){
//     // $ipaddr = get_iplong($ipaddr);
//     // $ip_a = get_iplong('192.168.1.100');
//     // $ip_b = get_iplong('192.168.1.150');
//     $ipaddr = ip2long($ipaddr);
//     $ip_a   = ip2long('192.168.1.100');
//     $ip_b   = ip2long('192.170.1.150');
//     if ($ipaddr >= $ip_a && $ipaddr <= $ip_b) {
//         return true;
//     }
//     return false;
// }



// /**
//  * 将ip地址转换成int型
//  * @param $ip  ip地址
//  * @return number 返回数值
//  */
// function get_iplong($ip){
//     //bindec(decbin(ip2long('这里填ip地址')));
//     //ip2long();的意思是将IP地址转换成整型 ，
//     //之所以要decbin和bindec一下是为了防止IP数值过大int型存储不了出现负数。
//     return bindec(decbin(ip2long($ip)));
// }

?>



<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
    <style type="text/css">
        tr{width:40px;height:40px;}
        td{width:40px;height:40px;}
    </style>
</head>
<body>
    <form action="">
        <center>
            行:  <input type="text" id="hang">
            列:  <input type="text" id="lie">
            数字:<input type="text" id="shu">
            <input type="button" name="" value="填充">
            <br/><br/>
            <table border="2" cellspacing="0" cellpadding="1">
                <?php for ($n=0; $n < 11; $n++) { // 行 ?>
                    <tr id='hang<?=$n?>' >
                        <?php for ($i=0; $i < 11; $i++) { // 列 ?>
                            <td id='<?=$n?>_<?=$i?>' ></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </table>
        </center>
    </form>
</body>
<script src="../jq.js"></script>
<script >
    $(document).on('click', 'input[value=填充]', function() {
        var hang = parseInt($('#hang').val())-1;
        var lie  = parseInt($('#lie').val())-1;
        var shu  = $('#shu').val();
        var dizhi = '#'+hang+'_'+lie;
        $(dizhi).text(shu);

        var hang_num = $('#'+hang+'_10').text();
        var num = parseInt(hang_num)+shu;

        var lie_num  = $('#10_'+lie).text();
        var num = parseInt(lie_num)+shu;
        // alert();
    });
</script>
</html> -->
<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
    <style type="text/css">
        tr{width:60px;height:60px;}
        td{width:60px;height:60px;}
    </style>
</head>
<body>
    <form action="">
        <center>

            <table border="2" cellspacing="0" cellpadding="1">
                <?php for ($n=0; $n < 4; $n++) { // 行 ?>
                    <tr  id='hang<?=$n?>' >
                        <?php for ($i=0; $i < 4; $i++) { // 列 ?>
                            <td id='<?=$n?>_<?=$i?>' ></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </table>
        </center>
    </form>
</body>
<script src="./jq.js"></script>
<script >
    $(document).on('click',"td",function(){
        var id = $(this).prop('id');
        var jiaid   =  '#'+(parseInt(id.substr(0,1))+1)+id.substr(1);//上的id
        var jianid  =  '#'+(parseInt(id.substr(0,1))-1)+id.substr(1);//下的id
        $(this).prev().css({"background": "blue" });//左 加色
        $(this).next().css({"background": "blue" });//右 加色
        $(jianid).css({"background": "blue" });//下 的 加色
        $(jiaid).css({"background": "blue" });//上 的 加色
        $(this).css({"background": "red" });//自身 加色
        $(this).prop('name',1);
        console.log();

    })
</script>
</html> -->





<meta charset="UTF-8" />
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>
<body>
    <form action="">
        <center>

            <table border="2" width='100' height='100' cellspacing="0" cellpadding="0">
                <tr>
                    <td class="1">1</td>
                    <td class="3">3</td>
                    <td class="9">9</td>
                </tr>
                <tr>
                    <td class="8">8</td>
                    <td class="-1"></td>
                    <td class="2">2</td>
                </tr>
                <tr>
                    <td class="4">4</td>
                    <td class="5">5</td>
                    <td class="7">7</td>
                </tr>
            </table>
        </center>
    </form>
</body>
<script src="../jq.js"></script>
<script >

    $("td").on("click", function(){
        var prev = $(this).prev().prop('class');
        var next = $(this).next().prop('class');
        if (prev=='-1') {
            var th = $(this).text();
            $(this).prev().prop('class',th);
            $(this).prev().text(th);
            $(this).text('');
            $(this).prop('class','-1');
        };
        if (next=='-1') {
            var th = $(this).text();
            $(this).next().prop('class',th);
            $(this).next().text(th);
            $(this).text('');
            $(this).prop('class','-1');
        };
        console.log(prev);
        var nei = $(this).text();

        });
</script>
</html> -->

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <a href="fang_dao/cuo.zip">下载</a>
    <img src="./a1.png" alt="">
</body>
</html> -->
<?php 
// 初始数组
// $arr = array('2','22','32','9','231','10','15','200');
// // 9 32 231 22 2 200 15 10
// // 
// // 932231222200191510
// // 932231222200191510
// rsort($arr);// 倒序排序
// // var_dump($arr);
// $ary = $arr;// 复制一份排序后的数组
// // 把数组内的值,补充为一样的位数,并把填补几个位数和下标 放到$num 数组内
// foreach ($arr as $k => $v) {
//         $ary[$k] = $ary[$k];
//         $num[$k] = 0;
//     if (strlen($v)<strlen($arr[0])) {
//         $num[$k] =  strlen($arr[0])-strlen($v);
//         $ary[$k] = $ary[$k].str_repeat('0',$num[$k]);
//      }
// }
// //找出 填补位数后相同的 下标 和值
//  $len = count ( $ary ); 
//     for($i = 0; $i < $len; $i ++) { 
//         for($j = $i + 1; $j < $len; $j ++) { 
//             if ($ary [$i] == $ary [$j]) { 
//                 $repeat_arr [$j] = $arr [$j];
//                 $tebie [$i] = $arr [$i]; 
//                 break;
//             } 
//         } 
//     }
// // 删除数组内相同的值
// foreach ($repeat_arr as $k => $v) {
//     unset($ary[$k]);
// }
// $ary = array_flip($ary);//交换 建与值
// krsort($ary);//降序排序

// //转换 建与值 ,以便找出两个数组的差集
// $linshi = array();
// foreach ($repeat_arr as $k => $v) {
//     $linshi[$v] = $k;
// }
// $repeat_arr = $linshi;
// $linshi = array();
// foreach ($tebie as $k => $v) {
//     $linshi[$v] = $k;
// }
// $tebie = $linshi;
// $linshi = array_diff($tebie,$repeat_arr);//找出在$repeat_arr内没有的值

// //把相同的值放到一个数组内
// $tebie = array();
// foreach ($linshi as $k => $v) {
//     $repeat_arr[$k] = $v;    
// }
// //排列相同值得下标顺序
// $aa = array();
// foreach ($num as $key => $value) {
//             if (in_array($key,$repeat_arr)) {
//                 $aa[] = $key;
//             }
//         }
// arsort($aa);
// //拿到所有的下标顺序        
// foreach ($ary as $k => $v) {
//     if (!empty($linshi[$k])) {
//         foreach ($aa as $key => $value) {
//             $tebie[] = $value;
//         }
//     }else{
//         $tebie[] = $v;   
//     }
// }

// $str = '';
// foreach ($tebie as $k => $v) {
//     $str .= $arr[$v];
//     // echo $arr[$v]."<br>";
// }
// var_dump($str);exit;







//如有两种相同值 出BUG


 ?>
 <?php
$arr = array(66,7,4,1,2,5,8,78,45,12,98,65,352);
$str = '';
for ($i=0; $i < count($arr); $i++) { 
    for ($n=$i+1; $n < count($arr); $n++) { 
        if ($arr[$i]>$arr[$n]) {
            $str = $arr[$i];    
            $arr[$i] = $arr[$n];
            $arr[$n] = $str;
        }
    }
}




var_dump($arr);















 ?>