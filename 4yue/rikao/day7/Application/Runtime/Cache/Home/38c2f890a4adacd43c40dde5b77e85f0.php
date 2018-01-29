<?php if (!defined('THINK_PATH')) exit(); if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
	<td><?php echo ($v["id"]); ?></td>
	<td><?php echo ($v["name"]); ?></td>
	<td><?php echo ($v["content"]); ?></td>
	<td><?php echo ($v["height"]); ?></td>
	<td><?php echo ($v["type_name"]); ?></td>
	<td><?php echo ($v["date"]); ?></td>
	<td><a href="<?php echo U('/Home/Index/del/');?>?id=<?php echo ($v["id"]); ?>">删除</a><a href="<?php echo U('/Home/Index/up');?>?id=<?php echo ($v["id"]); ?>">修改</a></td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>
<tr>
	<td colspan="7" align="center">当前 <?php echo ($page); ?> 页<button onclick="ajax(<?php echo ($up); ?>)">上一页</button><button onclick="ajax(<?php echo ($next); ?>)">下一页</button></td>
</tr>