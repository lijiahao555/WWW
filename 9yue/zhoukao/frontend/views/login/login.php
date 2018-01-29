<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>
<meta charset="utf8">

<style>
table{ border-collapse: collapse; border: 1px solid #ddd; width: 800px; margin: 0 auto;margin-top: 50px; background: rgba(121, 217, 221, 0.4); color: #666}
table tr{ height: 40px;}
table td{ border: 1px solid #ddd; text-align: center}

*{margin: 0; padding:0 ; font-family: 微软雅黑}
a{ text-decoration: none; color: #666;}

.top{ width: 100%; text-align: center;}
.top h2{ margin-top: 50px;}

form{ width: 450px; margin: 0 auto; margin-top: 50px;}
form input{
    width: 300px;
    height: 40px;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding-left: 5px;
    font-size: 14px;
}

form p{
    margin-top: 20px;
    width: 100%;
}

form span{
    width: 100px;
    text-align: right;
    display: inline-block;
}

.a_button{
    width: 150px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    background: green;
    color: #fff;
    display: block;
    border: 1px solid green;
    border-radius: 5px;
    margin: 0 auto;
}

form .time{
    width: auto;
    padding: 0 5px;
    font-size: 16px;
    font-weight: bold;
}

.remind{
    text-align: center;
    color: red;
}
</style>

<div class="top">
    <h2>登 录</h2>
</div>

<div class="main">
	<?= Html::beginForm(['login/logindo'], 'post') ?>
        <p>
            <span>账号：</span>
            <input type="text" name="username" placeholder="请输入手机号">
        </p>
        <p>
            <span>密码：</span>
            <input type="password" name="password" placeholder="请输入密码">
        </p>
        	<input type="hidden" id="num" name="num" value="<?=isset($num) ? $num : 0;?>">
        	<input type="hidden" id="datetime" name="time" value="<?=isset($time) ? $time : 0;?>">
        <p class="remind" style="display: none;">
            您已三次登录失败，请明天再次尝试。
        </p><br>
        <span id="time"></span>
        <p id="3">
        	<?= Html::submitButton('登录', ['class' => 'a_button']) ?>
        </p>
<?= Html::endForm() ?>
</div>
<script src="../../public/jquery.js"></script>
<script>
	$(document).ready(function() {
		var num = $('#num').val();
		var datetime = $('#datetime').val();


		if (num == 1) {
			$('.remind').attr('style', 'display:block');
			$('.remind').text('您已一次登录失败。');

			var date2 = datetime*1000+60*1000;

			setInterval(time1,1000,date2);
		}

		if (num == 2) {
			$('.remind').attr('style', 'display:block');
			$('.remind').text('您已俩次登录失败。');
			var date2 = datetime*1000+120*1000;
			setInterval(time2,1000,date2);
		}

		if (num == 3) {
			$('.remind').attr('style', 'display:block');
			$('#3').html('<?= Html::submitButton('登录', ['disabled' => 'disabled','class' => 'a_button']) ?>');
		}
	})

	function time1(date2){
		var date = Date.parse(new Date);

		if (date2>date) {

			var date3 = parseInt(date2)-parseInt(date);

			num = date3 / 1000
			$('#time').text("距离登录还有"+parseInt(num)+"秒")
			$('#3').html('<?= Html::submitButton('登录', ['disabled' => 'disabled','class' => 'a_button']) ?>');
		}else{
			$('#time').text("")

			$('#3').html('<?= Html::submitButton('登录', ['class' => 'a_button']) ?>');
			clearInterval(time1);
		}

	}
	function time2(date2){
		var date = Date.parse(new Date);

		if (date2>date) {

			var date3 = parseInt(date2)-parseInt(date);

			num = date3 / 1000
			$('#time').text("距离登录还有"+parseInt(num)+"秒")
			$('#3').html('<?= Html::submitButton('登录', ['disabled' => 'disabled','class' => 'a_button']) ?>');
		}else{
			$('#time').text("")

			$('#3').html('<?= Html::submitButton('登录', ['class' => 'a_button']) ?>');
			clearInterval(time1);
		}

	}
</script>