<?php 
require('date.php');

$db=new Date('127.0.0.1','root','0509','exam');
// $sql="INSERT INTO news_type VALUES(null,'真类')";
// $res=$db->add($sql);
// if ($res==true) {
// 	echo "cuccess";
// }else{
// 	echo "file";
// }

// $sql="DELETE FROM news_type WHERE type_idd=5";
// $res=$db->delete($sql);
// if ($res==true) {
// 	echo "cuccessd";
// }else{
// 	echo "file";
// }

// $sql="DELETE FROM news_type WHERE type_idd=6";

// if ($db->delete($sql)) {
// 	echo "cuccessd";
// }else{
// 	echo "file";
// }


// $sql="SELECT * FROM news_type";
// $res=$db->select($sql);
// var_dump($res);


//新删除
// if ($db->delete('news_type','type_idd',3)) {
// 	echo "success";
// }else{
// 	echo "file";
// }


//新添加

$arr=array(
	'type_name'=>'"玄幻"',
	'pwd'=>'"5555"',
	);
if($db->add('news_type',$arr)){
	echo "success";
}else{
	echo "file";
}
 ?>

