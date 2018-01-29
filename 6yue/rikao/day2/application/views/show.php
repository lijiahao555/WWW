<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<table border="1">
		<tr>
			<td>ID</td>
			<td>姓名</td>
		</tr>
		<?php foreach ($data as $key => $v): ?>
			<tr>
				<td><?php echo $v['id']?></td>
				<td><?php echo $v['name']?></td>
			</tr>
		<?php endforeach ?>
	</table>
	<input type="hidden" id="page" value="1">
	<span><a href="" class="page" data-p="1">首页</a></span>
	<span><a href="" class="page" data-p="up">上一页</a></span>
	<span><a href="" class="page" data-p="next">下一页</a></span>
	<span><a href="" class="page" data-p="<?php echo $zong ?>">尾页</a></span>
</center>
</body>
</html>
<script src='<?php echo base_url('public/jquery.js') ?>'></script>

<script type='text/javascript'>
// <script type='text/jacascript'>
$('a').attr('href','javascript:void(0)');
// $('a').attr('href','javascript:void(0)');
	$('.page').click(function(){
	// $('.page').click(function(){
		// page=parseInt($('#page').val());
		page=parseInt($('#page').val());
		type=$(this).data('p');
		// type=$(this).data('p');
		ye="";
		// ye="";
		
		
		console.log(type);
		return
		if (isNaN(type)) {
			if (type=='up') {
				ye=page-1;
			}else{
				ye=page+1;
			}
		}else{
			ye=type
		}
		if (ye<1||ye><?php echo $zong ?>) {
			return false;
		};
		var _tr="";
		$.ajax({
		   type: "get",
		   url: "http://localhost/6yue/day1/index.php/Demo/ajax",
		   data: {'ye':ye},
		   dateType:'json',
		   success: function(msg){
		     console.log(msg)
		   }
		});
	})
</script>