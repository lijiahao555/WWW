<?php 
header("content-type:text/html;charset=utf-8");

	$username=$_POST['username'];
	$pwd=$_POST['pwd'];
	$rpwd=$_POST['rpwd'];
	$age=$_POST['age'];
	$sex=$_POST['sex'];
	$card=$_POST['card'];
	$email=$_POST['email'];
	$tel=$_POST['tel'];
	
	if (empty($username)) die("请输入正确员工姓名");
	if (empty($pwd)) die("请输入密码");
	if (empty($rpwd)) die("请确认密码");
	if (empty($age)) die("请输员工年龄");
	if (empty($sex)) die("请输入员工性别");
	if (empty($tel)) die("电话号码");
	if (empty($email)) die("请输入邮箱");
	if (empty($card)) die("请输入部门");

	if ($pwd!=$rpwd) die('俩次密码不一致');
	$middle=substr($pwd,1,-1);
	$new_pwd=str_replace($middle, '*****', $pwd);

	if (strlen($pwd)<5) {echo "<script>alert('用户名字不能超过5个字');location.herf='domo.php'</script>";};



 ?>


	<table border="1" width="300px;" height="100px;" align="center">
		<tr >
			<td>员工姓名：</td>
			<td><input type="text" name="username" value="<?php echo $username ?>"></td>
		</tr>
		<tr>
			<td>设置密码：</td>
			<td><input type="text" name="pwd" value="<?php echo $new_pwd ?>"></td>
		</tr>
		<tr>
			<td>确认密码：</td>
			<td><input type="text" name="rpwd" value="<?php echo $new_pwd ?>"></td>
		</tr>
		<tr>
			<td>员工年龄：</td>
			<td>
				<select name="age">
					<?php 
					for ($i=18; $i <100 ; $i++) { ?>
						<option value="<?php echo $i?>" 
						<?php if ($age==$i){echo 'selected';} ?>
						><?php echo $i;?>
						</option>
					<?php }	
					 ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>员工性别</td>
			<td><input type="radio" name="sex" value="男" 
			<?php if ($sex=="男"){
				echo 'checked';
				} ?>>男<input type="radio" name="sex" value="女"
				<?php if ($sex=="女") {
					echo 'checked';
				} ?>
				>女</td>
		</tr>
		<tr>
			<td>所属部门</td>
			<td>
				<select name="card">
					<option value="市场部" <?php if ($card=='市场部') {
						echo 'selected';
					} ?>>市场部</option>
					<option value="营业部" <?php if ($card=='营业部') {
						echo 'selected';
					} ?>>营业部</option>
					<option value="宣传部" <?php if ($card=='宣传部') {
						echo 'selected';
					} ?>>宣传部</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>电子邮箱：</td>
			<td><input type="email" name="email" value="<?php echo $email?>"></td>
		</tr>
		<tr>
			<td>电话号码：</td>
			<td><input type="tel" name="tel" value="<?php echo $tel?>"></td>
		</tr>
	</table>
