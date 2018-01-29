<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
	欢迎&nbsp;<font color="red"><?php echo $_SESSION['name'].$name['role_name'] ?></font>&nbsp;来到&nbsp;添加节目列表&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('Admin/login') ?>">退出</a>
	<br/>
	<a href="<?php echo site_url('Infor/Infor_show') ?>">进入央视春晚节目单</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('Add/add') ?>">进入添加节目列表</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('Wait/wait') ?>">进入待审核列表</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('Exam/exam') ?>">进入审批页面</a>
		<table border='1' id='tab'>
			<tr>
				<td></td>
				<td>节目名</td>
				<td>表演时间</td>
				<td>表演人</td>
				<td>状态</td>
				<td>操作</td>
			</tr>
			<?php foreach ($data as $key => $v): ?>
				<tr>
					<td><?php echo $v['infor_id'] ?></td>
					<td><?php echo $v['infor_title'] ?></td>
					<td><?php echo $v['infor_time'] ?></td>
					<td><?php echo $v['infor_name'] ?></td>
					<td><font color="red">待送审</font></td>
					<td><a href="javascript:void(0);" class="add" data-id="<?php echo $v['infor_id'] ?>">送审添加</a></td>
				</tr>
			<?php endforeach ?>
		</table>
		当前<span id="page">1</span>
		<a href='javascript:void(0);' class='p' data-p='1'>首页</a>
		<a href='javascript:void(0);' class='p' data-p='up'>上一页</a>
		<a href='javascript:void(0);' class='p' data-p='next'>下一页</a>
		<a href='javascript:void(0);' class='p' data-p="<?php echo $zong ?>">尾页</a>
		共<span id="zong"><?php echo $zong?></span>页
	</center>
</body>
</html>
<script src="<?php echo base_url('public/jquery.js') ?>"></script>
<script>
	$(document).on('click','.p',function(){
		p=$(this).data('p');
		page=parseInt($('#page').text());
		zong=parseInt($('#zong').text());
		ye="";
		if (isNaN(p)) {
			if (p=='up') {
				ye=page-1;
			}else{
				ye=page+1
			}
		}else{
			ye=p
		}
		if (ye<1||ye>zong) {
			return
		};
		$.ajax({
		   type: "get",
		   url: "<?php echo site_url('Add/add_ajax') ?>",
		   data: {ye:ye},
		   dataType:'json',
		   success: function(msg){
		   	_tab="";
		   	_tab="<table border='1' id='tab'>\
			<tr>\
				<td></td>\
				<td>节目名</td>\
				<td>表演时间</td>\
				<td>表演人</td>\
				<td>状态</td>\
				<td>操作</td>\
			</tr>"
		     for(k in msg){
		     	_tab+="<tr>\
						<td>"+msg[k]['infor_id']+"</td>\
						<td>"+msg[k]['infor_title']+"</td>\
						<td>"+msg[k]['infor_time']+"</td>\
						<td>"+msg[k]['infor_name']+"</td>\
						<td><font color='red'>待审核</font></td>\
						<td><a href='javascript:void(0);' class='add' data-id="+msg[k]['infor_id']+">系统添加</a></td>\
					</tr>";
		     }
		     _tab+="</table>";
		     $('#tab').html(_tab);
		     $('#page').text(ye);
		   }
		});
	})
	$(document).on('click','.add',function(){
		id=$(this).data('id');
		page=$('#page').text();
		_tab="";
		$.ajax({
		   type: "get",
		   url: "<?php echo site_url('Add/addDo') ?>",
		   data: {id:id,page:page},
		   dataType:'json',
		   success: function(msg){
		   		_tab="<table border='1' id='tab'>\
					<tr>\
						<td></td>\
						<td>节目名</td>\
						<td>表演时间</td>\
						<td>表演人</td>\
						<td>状态</td>\
						<td>操作</td>\
					</tr>";
				for(k in msg){
					_tab+="<tr>\
					<td>"+msg[k]['infor_id']+"</td>\
					<td>"+msg[k]['infor_title']+"</td>\
					<td>"+msg[k]['infor_time']+"</td>\
					<td>"+msg[k]['infor_name']+"</td>\
					<td><font color='red'>待审核</font></td>\
					<td><a href='javascript:void(0);'' class='add' data-id='"+msg[k]['infor_id']+"'>送审添加</a></td>\
				</tr>"
				}
				_tab+="</table>";
				$('#tab').html(_tab);
		   }
		})
	})
</script>