<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form action="a.php" method="post">
<table border="1" align="center">
  <tr>
    <td colspan="2" align="center"><h1>学生信息录入系统</h1></td>
  </tr>
  <tr>
    <td width="129">用户名：</td>
    <td width="380"><input type="text" name="username"></td>
  </tr>
  <tr>
    <td>密码：</td>
    <td><input type="password" name="username_1"></td>
  </tr>
  <tr>
    <td>性别：</td>
    <td><input type="radio" name="username_2" value="男">男
  <input type="radio" name="username_2" value="女">女</td>
  </tr>
  <tr>
    <td>班级：</td>
    <td><select name="username_3" id="">
      <option value="1501phpA">1501phpA</option>
      <option value="1501phpB">1501phpB</option>
      <option value="1501phpC">1501phpC</option>
      <option value="1501phpD">1501phpD</option>
    </select></td>
  </tr>
  <tr>
    <td>年龄：</td>
    <td><select name="username_4" id="">
      <option value="18岁">18岁</option>
      <option value="19岁">19岁</option>
      <option value="20岁">20岁</option>
      <option value="21岁">21岁</option>
    </select></td>
  </tr>
  <tr>
    <td>爱好：</td>
    <td><input type="checkbox">打篮球
        <input type="checkbox">听音乐
        <input type="checkbox">踢足球
        <input type="checkbox">跑步
    </td>
  </tr>
  <tr>
    <td>座右铭：</td>
    <td>
      <textarea name="username_5" id="" cols="30" rows="5"></textarea>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit"></td>
  </tr>
</table>
	</form>
</body>
</html>

	
	