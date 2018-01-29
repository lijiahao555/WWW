<?php 
	header("content-type:text/html;charset=utf-8");

	$username =$_POST['username'];
	$pwd =$_POST['pwd'];
	$rpwd =$_POST['rpwd'];
	$card =$_POST['card'];
	$email =$_POST['email'];
	$age =$_POST['age'];
	$content =$_POST['content'];

	if (empty($username)) die("请输入正确用户名");
	if (empty($pwd)) die("请输入正确密码");
	if (empty($rpwd)) die("请输入确认密码");
	if (empty($card)) die("请选择证件");
	if (empty($email)) die("请输入正确邮箱");
	if (empty($age)) die("请	选择年龄");
	if (empty($content)) die('请输入内容');	

	$str = strpos($email,'@');
	if (!$str) die('邮箱错误');
	if(!$pwd = $rpwd) die('两次密码不一致');
	$middle = substr($pwd,1,-1);
	$new_pwd = str_replace($middle,'*****',$pwd);
	
 ?>
 	 <table border="1" align="center">
 	  		  <tr>
 	  		    <td colspan="2" align="center"><strong>个人信息注册表</strong></td>
 	  	    </tr>
 	  		  <tr>
 	  		    <td width="100">用户名：</td>
 	  		    <td width="300"><input type="text" name="username" value="<?php echo $username ?>"></td>
 	  	    </tr>
 	  		 
 	  	    <tr>
 	   		<td>密码</td>
 	   		<td><input type="text" name="pwd" value="<?php echo $new_pwd?>"></td>
 	   		</tr>
 	   		<tr>
 	   		<td>确认密码</td>
 	   		<td><input type="text" name="rpwd" value="<?php echo $new_pwd?>"></td>
 	   		</tr>
 	  		  <tr>
 	  		    <td>证件类型：</td>
 	  		    <td><select name="card" >
 	  		    	<option value="二代身份证"  <?php if ($card=='二代身份证') {echo 'selected';} ?>>二代身份证</option>
 	  		    	<option value="一代身份证"<?php if ($card=='一代身份证') {echo 'selected';} ?>>一代身份证</option>
 	  		    	<option value="三代身份证" <?php if ($card=='三代身份证') {echo 'selected';} ?>>三代身份证</option>
 	  		    </select></td>
 	  	    </tr>
 	  		  <tr>
 	  		    <td>邮箱：</td>
 	  		    <td><input type="text" name="email" value=" <?php echo $email;?>"></td>
 	  	    </tr>
 	  		  <tr>
 	  		    <td>年龄：</td>
 	  		    <td> 
 	  		    <select name="age" id="">
 	   				
 	   				<?php
 	   				  for ($i=18.'岁';$i<100.'岁';$i++){
 	   				  	?> 
 	   					<option value="<?php echo $i;?> "
 	   				 <?php if ($age==$i){ echo 'selected';
 	   					}?>><?php echo $i;?></option><?php 
 	   				 }
 	   				 ?>
 	    			</select>
 	   			</td>
 	  	    </tr>
 	  		  <tr>
 	  		    <td valign="top">简介：</td>
 	  		    <td><textarea name="content" cols="30" rows="4"><?php echo $content ?></textarea></td>
 	  	    </tr>
 	  		  <tr>
 	  		    <td colspan="2" align="center"><input type="submit" value="注册" style="background:red;border-radius:5px;width:100px;"></td>
 	  	    </tr>
 	  	  </table> 
 	  








 