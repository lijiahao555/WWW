<?php if (!defined('THINK_PATH')) exit();?><table border="1">
	<tr>
		<?php if(is_array($date['list'])): $i = 0; $__LIST__ = $date['list'];if( count($__LIST__)==0 ) : echo "没有数据" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 3 );++$i;?><td><img src="/3yue/rikaojineng/day191/<?php echo ($v["file"]); ?>" width="60"><br/><?php echo ($v["name"]); ?><br/><?php echo (date("Y-m-d H:i:s",$v["date"])); ?></td>
		<?php if(($mod) == "2"): ?></tr><tr><?php endif; endforeach; endif; else: echo "没有数据" ;endif; ?>
	</tr>
	<tr>
	<td colspan="3" align="center"><?php echo ($date['show']); ?></td>
	</tr>
	<tr>
		<td><button onclick="location.href='/3yue/rikaojineng/day191/index.php/Home/Show/add'">继续添加</button></td>
	</tr>
</table>