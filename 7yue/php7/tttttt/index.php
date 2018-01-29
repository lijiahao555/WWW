<?php
	header('content-type:text/html;charset=utf-8');

	$p = isset($_GET['p']) ? $_GET['p'] : 1;

	$dsn = "mysql:host=localhost;dbname=test";
	$db = new PDO($dsn, 'root', 'root');
	$db->query('set names utf8');

	$num = ($p-1)*30;
	$source = $db->query('select * from test_error limit '.$num.',30');
	$source->setFetchMode(PDO::FETCH_ASSOC);
	$data = $source->fetchAll();

	function xuanxiang($val){
		if($val['type'] == '判断题'){

			$d = $c = '';
			if($val['answer'] == '错（×）') $c = 'current';
			if($val['answer'] == '对（√）') $d = 'current';

			$str = '<p><span class="'.$d.'"><input type="radio" name="'.$val['code'].'"  value="1"/>对</span> <span class="'.$c.'"><input type="radio" name="'.$val['code'].'" value="0" />错</span></p>';
		}

		if($val['type'] == '单选题'){
			$arr = explode('<=>', $val['tab']);
			shuffle($arr);
			$str = '';
			foreach($arr as $k=>$v){
				$current = '';
				if($v == $val['answer']) $current = 'current';
				$str .= '<p class="'.$current.'"><input type="radio"  name="'.$val['code'].'" value="'.$k.'"/>'.$v.'</p>';
			}
		}

		if($val['type'] == '多选题'){

			$answer = explode('<=>', $val['answer']);

			$arr = explode('<=>', $val['tab']);
			shuffle($arr);
			$str = '';
			foreach($arr as $k=>$v){

				$current = '';
				if(in_array($v, $answer)) $current = 'current';

				$str .= '<p class="'.$current.'"><input type="checkbox"  name="'.$val['code'].'" value="'.$k.'"/>'.$v.'</p>';
			}
		}

		return $str;
	}
?>

	<?php foreach($data as $val){?>
		<div class="one">
			<p><?php echo $val['code'].':'.$val['title'];?> <input class="btn" type="button" style="float:right;" value="查看答案"></p>
			<?php echo xuanxiang($val);?>
		</div>
	</hr>
	<?php }?>

	<input type="button" id="xyy"  value="下一页"/>

<script src="./jquery.js"></script>
<script type="text/javascript">
	$('.btn').click(function(){
		// $(this).parents('div').children('.current').css('color', 'red');
		$(this).parents('div').find('.current').css('color','red');
	});

	$('#xyy').click(function(){
		location.href="./index.php?p=<?=$p+1;?>";
	});
</script>



