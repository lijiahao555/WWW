<?php 
header('content-type:text/html;charset=utf8');


$name=$_POST['name'];
$pwd=$_POST['pwd'];
$age=$_POST['age'];
$sex=$_POST['sex'];
$content=$_POST['content'];


if (empty($name)) {echo "<script>alert('请输入用户名');location.href='form.php'</script>";};
if (empty($pwd)) {
	echo "<script>alert('请输入密码');location.href='form.php'</script>";
};
$rpwd=substr($pwd,1,-1);

$new_pwd=str_replace($rpwd , '****', $pwd);
//$middle=substr($pwd,1,-1);
//$new_pwd=str_replace($middle, '*****', $pwd);

 ?>
 <center>
 	<table border="1">
				<tr>
					<td>姓名</td>
					<td><input type="text" name="name" value="<?php echo "$name"?>"></td>
				</tr>
				<tr>
					<td>密码</td>
					<td><input type="text" name="pwd" value="<?php echo "$new_pwd"?>"></td>
				</tr>
				<tr>
					<td>年龄</td>
					<td>
						<select name="age">
							<?php 
							for ($i=18; $i <=100 ; $i++) 
							if ($age==$i) {
								echo "<option value='$age'>$i</option>";
							}
							 ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>性别</td>
					<td>
					<input type="radio" name="sex" value="男" 
					<?php 
					if ($sex=='男') {
						echo "checked";
					}?>> 男
					<input type="radio" name="sex" value="女"<?php if ($sex=='女') {echo 'checked';
					}?>> 女
					</td>
				</tr>
				<tr>
					<td>简介</td>
					<td><textarea name="content" cols="30" rows="5"><?php echo "$content"; ?></textarea></td>
				</tr>
				<tr>
					<td><input type="submit"></td>
					<td></td>
				</tr>
			</table>
 </center>