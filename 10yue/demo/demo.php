<?php


$a = 1;



$a += $a*0.1;

$a += $a*0.1;

$a += $a*0.1;

$a -= $a*0.1;

$a -= $a*0.1;

$a -= $a*0.1;
echo $a;
echo "<br>";
$b = 1;


$b -= $b*0.1;

$b -= $b*0.1;

$b -= $b*0.1;
$b += $b*0.1;

$b += $b*0.1;

$b += $b*0.1;
echo $b;die;

$str1 = 'yabadabadoo';

$str2 = 'yaba';

// if (strpos($str1, $str2)) {
// 	echo "/"".$str1."/"contains/"".$str2."/"";
// }else{
// 	echo "/"".$str1."/"does not contain /"".$str2."/"";
// }
// die;



$x = 3 + "15%" + "$25";
echo $x;die;




var_dump(0123 == 123);
var_dump('0123' == 123);
var_dump(0123 === 123);
die;

$x = 5;

echo $x;

echo "<br />";

echo $x+++$x++;

echo "<br />";

echo $x;

echo "<br />";

echo $x---$x--;

echo "<br />";

echo $x;
die;



$em = '^[A-Za-z0-9\u4e00-\u9fa5]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$';
 function isemail($email) {
  return strlen($email) > 8 && preg_match("/^[-_+.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+([a-z]{2,4})|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i", $email);
 }
 if(!isemail()) {
   	echo "对不起，验证邮箱地址不正确！";
 	exit();
 }
 die;



$a = 'abcdaab';
$arr = array();

for ($i=0; $i <strlen($a) ; $i++) { 
	$arr[$a[$i]] = 0;

	for ($j=0; $j < strlen($a); $j++) { 
		if ($a[$i] == $a[$j]) {
			$arr[$a[$i]]++;
		}
	}
}
print_r($arr);die;
