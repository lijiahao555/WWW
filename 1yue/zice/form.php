<meta charset="utf8">
<center>
<form action="demo.php" method="post">
	<table>
		<h2>新闻添加页面</h2>
		<tr>
			<td>新闻标题：</td>
			<td><input type="text" name="news_title"><span style="color:red;"> 标题不能为空</span></td>
		</tr>
		<tr>
			<td>新闻类型：</td>
			<td>
				<select name="news_type">
					<?php 
					$arr=array('军事新闻','娱乐新闻','搞笑新闻','小连新闻','天道新闻','新天地新闻',);
					foreach ($arr as $key => $val) {
						echo "<option value='$val'>$val</option>";
					}
					 ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>新闻作者：</td>
			<td><input type="text" name="news_author"> <span style="color:red;"> 作者不得为空</span></td>
		</tr>
		<tr>
			<td>新闻状态：</td>
			<td>
				<select name="news_status">
					<option value="1">发布</option>
					<option value="0">未发布</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>新闻内容</td>
			<td><textarea name="news_content" cols="30" rows="5"></textarea></td>
		</tr>
		<tr>
			<td>添加时间：</td>
			<td><input type="datetime" name="news_addtime"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="添加"></td>
		</tr>
	</table>
</form>
</center>