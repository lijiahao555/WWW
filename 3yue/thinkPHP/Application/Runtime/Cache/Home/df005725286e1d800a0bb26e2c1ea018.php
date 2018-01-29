<?php if (!defined('THINK_PATH')) exit(); if(is_array($data['list'])): foreach($data['list'] as $key=>$v): ?><tr>
		<td><?php echo ($v['id']); ?></td>
		<td><?php echo ($v['name']); ?></td>
		<td><?php echo ($v['count']); ?></td>
		<td><img src="/3yue/thinkPHP/<?php echo ($v['file']); ?>" width="50"></td>
		<td><?php echo ($v['date']); ?></td>
		<td><a href="javascript:del(<?php echo ($v['id']); ?>,<?php echo ($pa); ?>)">删除</a></td>
	</tr><?php endforeach; endif; ?>
	<tr>
		<td colspan="6"><?php echo ($data['a']); ?></td>
	</tr>