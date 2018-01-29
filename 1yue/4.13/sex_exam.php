
	<meta charset="UTF-8">

	<form action="action.php" method="post">
	  <table border="1" align="center">
		  <tr>
		    <td colspan="2" align="center"><strong>个人信息注册表</strong></td>
	    </tr>
		  <tr>
		    <td width="100">用户名：</td>
		    <td width="300"><input type="text" name="username" placeholder="请输入连傻逼"></td>
	    </tr>
		  <tr>
		    <td>密码：</td>
		    <td><input type="password" name="pwd" placeholder="请输入连傻逼"></td>
	    </tr>
		  <tr>
		    <td>确认密码：</td>
		    <td><input type="password" name="rpwd" placeholder="请确认连傻逼"></td>
	    </tr>
		  <tr>
		    <td>证件类型：</td>
		    <td><select name="card" id="">
		    	<option value="二代身份证">二代身份证</option>
		    	<option value="一代身份证">一代身份证</option>
		    	<option value="三代身份证">三代身份证</option>
		    </select></td>
	    </tr>
		  <tr>
		    <td>邮箱：</td>
		    <td><input type="text" name="email" placeholder="请输入连傻逼"></td>
	    </tr>
		  <tr>
		    <td>年龄：</td>
		    <td> 
		    <select name="age" id="">
 				
 				<?php  for ($i=18;$i<100;$i++){?>  
 				<option><?php echo $i;}?></option>?>
 			
  			</select>
 			</td>
	    </tr>
		  <tr>
		    <td valign="top">简介：</td>
		    <td><textarea name="content" cols="30" rows="2" placeholder="请输入连傻逼"></textarea></td>
	    </tr>
		  <tr>
		    <td colspan="2" align="center"><input type="submit" value="注册" style="background:red;border-radius:5px;width:100px;height:30px"></td>
	    </tr>
	  </table>
    </form>


    <select name="age">
		<?php
		for($i=18;$i<=100;$i++){
		echo "<option value='$i'>$i</option>";
		}
		?>
	</select>
	<?php 
	for ($i=18; $i <100 ; $i++) { 
		echo "<option value='$i'>$i</option>"
	}
	?>