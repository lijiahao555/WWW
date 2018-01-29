<?php if (!defined('THINK_PATH')) exit();?><tr>
	<?php if(is_array($data['list'])): $i = 0; $__LIST__ = $data['list'];if( count($__LIST__)==0 ) : echo "没有数据" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><td><img src="/3yue/rikaojineng/day20/<?php echo ($v['book_photo']); ?>" width="50"><br/><?php echo ($v["book_name"]); ?><br/><?php echo ($v['book_price']); ?><br/><a href="javascript:del(<?php echo ($v["book_id"]); ?>,<?php echo ($page); ?>)">删除</a></td>
	<?php if(($mod) == "1"): ?></tr><tr><?php endif; endforeach; endif; else: echo "没有数据" ;endif; ?>
</tr>
<tr>
	<td><?php echo ($data['show']); ?></td>
</tr>