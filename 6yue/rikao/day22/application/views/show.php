<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center >
	<input type="text" id="sou"><input type="button" value="搜索" class="page_num" data-p='seek'>
		<table border="1" id="box" >
			<th>id</th>
			<th>姓名</th>
			<th>操作</th>
			<th></th>
				<?php foreach ($data['res'] as $key => $v): ?>
					<tr>
						<td><?php echo $v['id'] ?></td>
						<td><?php echo $v['name'] ?></td>
						<td><a href="javascript:void(0);" class="del" data-id="<?php echo $v['id'] ?>">删除</a></td>
						<td><span class="prev">↑</span>&nbsp;&nbsp;<span class="next">↓</span></td>
					</tr>
				<?php endforeach ?>
		</table>
		当前第<span id="page">1</span>页
		<a href="javascript:void(0);" class="page_num" data-p="1">首页</a>
		<a href="javascript:void(0);" class="page_num" data-p="up">上一页</a> 
		<a href="javascript:void(0);" class="page_num" data-p="next">下一页</a>
		<a href="javascript:void(0);" class="page_num" data-p="<?php echo $data['zong'] ?>">尾页</a>
		一共<span id="zong"><?php echo $data['zong'] ?></span>页
	</center>
</body>
</html>
<script src="<?php echo base_url('public/jquery.js') ?>"></script>
<script type="text/javascript">
	$(document).on('click','.page_num',function(){
		page=parseInt($('#page').text());
		zong=parseInt($('#zong').text());
		page_num=$(this).data('p');
		sou=$('#sou').val();
		ye="";

		if (isNaN(page_num)) {
			if (page_num=='up') {
				ye=page-1;
			}else if (page_num=='seek'){
				ye=page;
			}else{
				ye=page+1;
			}
		}else{ 
			ye=page_num;
		}
		if (ye<1||ye>zong) {
			return false;
		};
		_tr="";
		$.ajax({
		   type: "get",
		   url: "<?php echo site_url('Exam/ajax') ?>",
		   data: {ye:ye,sou:sou},
		   dataType:'json',
		   success: function(msg){
		   		_tr="<table>" +
                "<th>id</th>" +
                "<th>姓名</th>" +
                "<th>操作</th>"
		  		for (i in msg['res']) {
		  			_tr+="<tr>" +
                            "<td>"+msg['res'][i]['id']+"</td>" +
                            "<td>"+msg['res'][i]['name']+"</td>" +
                            "<td><a href='javascript:void(0);' class='del' data-id="+msg['res'][i]['id']+">删除</a></td>" +
                        "</tr>"
		  		};
	   			_tr+="</table>";
		   		z=msg['data'];
		   		$('#box').html(_tr);
		   		$('#page').text(ye);
		   		$('#zong').text(z);
		   }

		});
	})
	$(document).on('click','.del',function(){
		id=$(this).data('id');
        _this=$(this);
		page=parseInt($('#page').text());
		_tr="";
		$.ajax({
		   type: "get",
		   url: "<?php echo site_url('Exam/del') ?>",
		   data: {id:id,page:page},
		   dataType:'json',
		   success: function(msg){
		   		_tr="<table>" +
                "<th>id</th>" +
                "<th>姓名</th>" +
                "<th>操作</th>"
		  		for (var i = 0; i < msg.length; i++) {
		  			_tr+="<tr>" +
                            "<td>"+msg[i]['id']+"</td>" +
                            "<td>"+msg[i]['name']+"</td>" +
                            "<td><a href='javascript:void(0);' class='del' data-id="+msg[i]['id']+">删除</a></td>" +
                        "</tr>"
		  		};
		   		
	   			_tr+="</table>";
	   			$('#box').html(_tr);
	   			$('#page').html(page);
		   }
		});
	})
	$(document).on('click', '.prev', function() {
		$('.span').insertAfter('a')
	});
</script>