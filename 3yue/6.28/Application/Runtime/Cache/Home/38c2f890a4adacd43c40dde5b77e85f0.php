<?php if (!defined('THINK_PATH')) exit(); if(is_array($list['list'])): foreach($list['list'] as $key=>$v): ?><tr>
		<td><input type="checkbox" name="box" value="<?php echo ($v["id"]); ?>"></td>
		<td><?php echo ($v["id"]); ?></td>
		<td><?php echo ($v["name"]); ?></td>
		<td><?php echo ($v["price"]); ?></td>
		<td><?php echo ($v['start'] ? '在售':'停售'); ?></td>
	</tr><?php endforeach; endif; ?>
<tr>
	<td colspan="5" align="center"><?php echo ($list['show']); ?></td>
</tr>
<tr>
	<td colspan="5">
		<select onchange="chang(this,<?php echo ($page); ?>)" >
			<option value="0">请选择</option>
			<option value="删除">删除</option>
			<option value="停售">停售</option>
		</select>
	</td>
</tr>