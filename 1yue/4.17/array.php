<?php 
	//$arr=array(1,2,3,4,5,6);
	//echo is_array($arr);  查询是否为数组，是返回布尔值1，错误为空
	//echo in_array(5, $arr); 检测字符或者数组是否存在，存在返回布尔值1，错误空
	//echo array_search(2, $arr); 检测键/下标是否存在数组中，在返回下标，不存在返回false；
	header('content-type:text/html;charset=utf-8');
	
	$hobby=$_POST['hobby']

	

 ?>
	爱好：<input type="checkbox" name="hobby" value="吃饭" 
	<?php if (in_array('吃饭', $hobby)) {
		echo "checked";} ?> 
		>吃饭
		 <input type="checkbox" name="hobby" value="唱歌" <?php if (in_array('唱歌', $hobby)) {
		echo 'checked';
		 } ?>>唱歌
		 <input type="checkbox" name="hobby" value="睡觉" <?php if (in_array('睡觉', $hobby)) {
		echo 'checked';
	} ?>>睡觉;
		 <input type="checkbox" name="hobby" value="打炮" <?php if (in_array('打炮', $hobby)) {
		echo 'checked';
	} ?>>打炮;
		 <input type="checkbox" name="hobby" value="打豆豆" <?php if (in_array('打豆豆', $hobby)) {
		echo 'checked';
	} ?>>打豆豆;
		 <input type="submit">
