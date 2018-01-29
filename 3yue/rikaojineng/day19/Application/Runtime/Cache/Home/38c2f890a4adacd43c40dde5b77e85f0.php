<?php if (!defined('THINK_PATH')) exit(); if(is_array($data)): foreach($data as $key=>$v): ?><tr>
	<td><?php echo ($v["id"]); ?></td>
	<td><?php echo ($v["name"]); ?></td>
	<td><?php echo ($v["pwd"]); ?></td>
	<td><a href="javascript:del(<?php echo ($v["id"]); ?>)">删除</td>
</tr><?php endforeach; endif; ?>