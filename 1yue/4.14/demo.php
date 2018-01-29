
<meta charset="UTF-8">
<form action="demo_1.php" method="post">
 <select name="age">
 		<?php 
 		for ($i=18;$i<=100;$i++) { 
 		?> 
 		<option value="<?php echo $i?>">
 		<?php  echo $i?>	
 		</option><?php
 		}

 		 ?>
 </select>
 <input type="submit"></form>	