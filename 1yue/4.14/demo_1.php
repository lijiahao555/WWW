<?php 
	header("content-type:text/html;charset=utf-8");
	$age=$_POST['age'];
 ?>

 <select name="age">
 		<?php 
 		for ($i=18;$i<=100;$i++) { 
 		?> 
 		<option value="<?php  echo $i?>"
		<?php if($age==$i){echo "selected";}?>
 		>
 		<?php  echo $i?>	
 		</option><?php
 		}

 		 ?>
 </select>