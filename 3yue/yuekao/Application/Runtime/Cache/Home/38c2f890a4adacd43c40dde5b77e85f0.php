<?php if (!defined('THINK_PATH')) exit(); if(is_array($list['list'])): foreach($list['list'] as $key=>$v): ?><tr>
		<td><?php echo ($v["name"]); ?></td>
		<td><?php echo ($v["email"]); ?></td>
		<td><?php echo ($v["content"]); ?></td>
		<td><?php echo ($v["on"]); ?></td>
		<td><?php echo ($v["hh"]); ?></td>
		<td><a href="#">删除</a></td>
	</tr><?php endforeach; endif; ?>
<tr>
	<td colspan="6"><?php echo ($list['show']); ?></td>
</tr>