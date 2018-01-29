<?php if (!defined('THINK_PATH')) exit();?><tr>
	<?php if(is_array($list['list'])): $i = 0; $__LIST__ = $list['list'];if( count($__LIST__)==0 ) : echo "没有数据" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 1 );++$i;?><td><b><?php echo ($v["name"]); ?></b>&nbsp;&nbsp;&nbsp;<?php echo ($v["time"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</br><hr width="485"><?php echo ($v["content"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button onclick="zan(<?php echo ($v["id"]); ?>,this)">赞</button><span><?php echo ($v["zan"]); ?></span></td>
	<?php if(($mod) == "0"): ?></tr><tr><?php endif; endforeach; endif; else: echo "没有数据" ;endif; ?>
</tr>
<tr>
	<td align='center' colspan='6'>
	共<?php echo ($list['page']['zong']); ?>条说说
		<input type='button'  onclick="ajax(1,<?php echo ($list['h']); ?>)" value='首页'>
		<input type='button'  onclick="ajax(<?php echo ($list['page']['up']); ?>,<?php echo ($list['h']); ?>)" value='上一页'>
		<input type='button'  onclick="ajax(<?php echo ($list['page']['next']); ?>,<?php echo ($list['h']); ?>)" value='下一页'>
		<input type='button'  onclick="ajax(<?php echo ($list['page']['zong']); ?>,<?php echo ($list['h']); ?>)"  value="尾页">
	</td>
</tr>