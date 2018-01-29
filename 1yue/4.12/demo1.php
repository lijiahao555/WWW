<?php 
header("content-type:text/html;charset=utf8");
	for($i=9;$i>=1;$i--){
         for($j=1;$j<=$i;$j++)
            echo "$j*$i=".$j*$i." ";
            
            
            echo "<br> ";
        };
define('a', 110);
echo a;
?>


