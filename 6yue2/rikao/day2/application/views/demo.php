<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
	<table width="90%" id="properties-table" align="center">
			  <tbody>
		        <tr>
		          <th>颜色</th>
		          <th>内存</th>
		          <th>价格</th>
		          <th>库存（SKU）</th>
		          <th>操作</th>
		        </tr>
		        <tr></tr>
		        <tr>
			          <td align="center">
			          <select name="" id=""><option value="">请选择</option></select>
			          </td>
			          <td align="center">
			          <select name="" id=""><option value="">请选择</option></select>
			          </td>
			          <td align="center">
			          <input type="text" name="a" placeholder="请输入价格" />
			          </td>
			          <td align="center">
			          <input type="text" name="a" placeholder="请输入库存" />
			          </td>
			          <td align="center">
			            <a href="javascript:;" id="copy" title="复制">+</a>
			            <a href="javascript:;" id="del" title="移除">-</a>          
			          </td>
		        </tr>
		        </tbody>
		    </table>
	</center>
</body>
</html>
<script src="<?php echo base_url('public/jquery.js') ?>"></script>
<script>
	$(document).on('click', '#copy', function() {
		tr=$(this).parents('tr').clone();
		$(this).parents('tr').after(tr);.
	});
	$(document).on('click', '#del', function() {
		tr=$(this).parents('tr');
		tr.remove();
	});
</script>
