<?php if (!defined('THINK_PATH')) exit(); if(is_array($list['list'])): foreach($list['list'] as $key=>$v): ?><tr>
		<td><?php echo ($v["id"]); ?></td>
		<td><?php echo ($v["name"]); ?></td>
		<td><?php echo ($v["pwd"]); ?></td>
		<td><?php echo ($v["type"]); ?></td>
		<td><img src="/3yue/thinkPHP/<?php echo ($v["file"]); ?>" width="80"></td>
		<td><?php echo ($v["count"]); ?></td>
		<td><?php echo ($v["price"]); ?></td>

		<td><a href="javascript:del(<?php echo ($v["id"]); ?>,<?php echo ($p); ?>)">删除</a></td>
	</tr><?php endforeach; endif; ?>
	<tr>
		<td colspan="7" align="center"><?php echo ($list['show']); ?></td>
	</tr>