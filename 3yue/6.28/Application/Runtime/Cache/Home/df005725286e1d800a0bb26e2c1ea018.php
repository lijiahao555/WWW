<?php if (!defined('THINK_PATH')) exit(); if(is_array($list)): foreach($list as $key=>$v): ?><tr>
		
		<td><a href="/3yue/6.28/index.php/Home/Log/name?id=<?php echo ($v['id']); ?>"><?php echo ($v['name']); ?></a></td>
		
		<td><?php echo ($v['addtime']); ?></td>
		<td><?php echo ($v['type_name']); ?></td>
		
	</tr><?php endforeach; endif; ?>
<td><button onclick="javascript:a(<?php echo ($n); ?>)">赞</button></td><?php echo ($n); ?>