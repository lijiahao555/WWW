<?php if (!defined('THINK_PATH')) exit(); if(is_array($sql['list'])): foreach($sql['list'] as $key=>$v): ?><tr>
	<td><?php echo ($v['id']); ?></td>
	<td><?php echo ($v['name']); ?></td>
	<td><?php echo ($v['type']); ?></td>
	<td><?php echo ($v['count']); ?></td>
	<td><?php echo (date("Y-m-d h:i:s",$v['date'])); ?></td>
	<td><img src="/3yue/thinkPHP/<?php echo ($v['file']); ?>" width="80"></td>

	<td><a href="javascript:dele(<?php echo ($v['id']); ?>,<?php echo ($p); ?>)">删除</a><a href="../../Home/index/save_1?id=<?php echo ($v['id']); ?>">修改</a></td>
</tr><?php endforeach; endif; ?>
<tr>
	<td colspan="6" align="center"><?php echo ($sql['a']); ?></td>
</tr>