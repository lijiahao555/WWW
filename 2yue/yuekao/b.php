<?php 

header("content-type:text/html;charset=utf8");
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');

$cha=!empty($_GET['cha'])?$_GET['cha']:"";
$page=!empty($_GET['page'])?$_GET['page']:1;
$page_num=$_GET['page_num'];
$start=($page-1)*$page_num;
$total_sql="SELECT COUNT(*)AS num from yuekao where stu_name like '%$cha%'";
$total_ret=mysql_query($total_sql);
$total_arr=mysql_fetch_assoc($total_ret);
$total_page=ceil($total_arr['num']/$page_num);



$sql="SELECT * FROM yuekao WHERE stu_name like '%$cha%' ORDER BY stu_id DESC LIMIT $start,$page_num";
$res=mysql_query($sql);

 ?>
<?php
while ( $arr=mysql_fetch_assoc($res)) {
    echo "<tr>";
      echo "<td><input type='checkbox'></td>";
      echo "<td>".$arr['stu_id']."</td>";
      echo "<td>".$arr['stu_name']."</td>";
      echo "<td>".$arr['violate_type']."</td>";
      echo "<td>".$arr['adviser']."</td>";
      echo "<td>".$arr['teacher_name']."</td>";
      echo "<td>".$arr['class']."</td>";
      echo "<td>".$arr['violate_time']."</td>";
      if ($arr['state']==1) {
        echo "<td><a href='javascript:void(0)'>已经审核</a></td>";
      }else{
        echo "<td><a href='javascript:void(0)'>未审核</a></td>";
      }
      echo "<td>".$arr['add_uer']."</td>";
    echo "</tr>";
  }
 ?>
 	 <tr> 
 	       <td colspan="10" align="center">
         当前<?php echo $page ?>页
 	       <a href="javascript:void(0)" onclick="js_show">首页</a>
 	       <a href="javascript:void(0)" onclick="js_show(<?php echo $page-1?>)">上一页</a>
 	       <button onclick="js_show(1)">1</button>
 	       <button onclick="js_show(2)">2</button>
 	       <button onclick="js_show(3)3">3</button>
 	       <button onclick="js_show(4)4">4</button>
 	       <button onclick="js_show(5)5">5</button>
 	       <button onclick="js_show(6)6">6</button>
 	       <button onclick="js_show(7)7">7</button>
           <a href="javascript:void(0)" onclick="js_show(<?php echo $page+1?>)">下一页</a>
           <a href="javascript:void(0)" onclick="js_show(<?php echo $total_page?>)">尾页</a>
              共<?php echo $total_page ?>页
           </td>
 	 </tr>