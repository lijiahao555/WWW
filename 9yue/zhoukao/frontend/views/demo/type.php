<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\models\Z_user;

use app\models\Z_type;
$data = Z_type::find()->asArray()->all();

if (isset($_SESSION['name'])) {
	$res = Z_User::find()->where(['name'=>$_SESSION['name']])->asArray()->one();
	$res = explode(',', $res['type']);
}



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

.check_label{
    width: 600px;
    margin: 0 auto;
    margin-top: 50px;
}

.check_label p{
    width: 550px;
    margin: 0 auto;
    margin-top: 30px;
}

.check_label .intrest_label a{
    padding: 5px;
    border: 1px solid rgba(0, 150, 0, 0.55);
    border-radius: 3px;
    white-space:nowrap;
    display: inline-block;
    margin-top: 10px;
    margin-left: 10px;
    color: #666;
}

.check_label .a_selected{
    background: rgba(0, 150, 0, 0.55);
    color: #fff;
}

.check_label .a_button{
    width: 150px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    background: green;
    color: #fff;
    display: inline-block;
    border: 1px solid green;
    border-radius: 5px;
    margin: 0 auto;
}

.handler-button{
    text-align: center;
}
</style>

<div class="top">
    <h2>欢迎注册</h2>
</div>

<div class="main">
    <div class="check_label">
        <h4>请选择您的兴趣标签</h4>
        <p class="intrest_label">
       		<?php if (isset($res)): ?>
        		<?php foreach ($data as $key => $value): ?>
					<?php if (in_array($value['name'] , $res) ): ?>
        				<a href="javascript:;" class="a_selected"><?=$value['name']?></a>
					<?php else: ?>
						<a href="javascript:;" class=""><?=$value['name']?></a>
					<?php endif ?>
        		<?php endforeach ?>
        	<?php else: ?>

        	<?php endif ?>

		<input type="hidden">
        </p>
        <p class="handler-button">
        	<a href="<?=isset($_SESSION['name']) ? Url::toRoute('demo/adddo',['name'=>$_SESSION['name']]) : '' ;?> " id="next"><button  class="a_button"?>上一步</button></a>
			<button class="a_button" id="wan">完成</button>
        </p>
    </div>
</div>
<script src="../../public/jquery.js"></script>
<script>
	var name = '';
	$('a').click(function() {

		if ($(this).attr('class')=='a_selected') {

			$(this).attr('class', '');

			re = $(this).text();

			name = name.replace(re+',','');

		}else{

			name += $(this).text()+',';

			$('input').val(name);

			$(this).attr('class', 'a_selected');

		}
	});

	$(document).on('click', '#next', function(event) {
		console.log(name);
		$.ajax({
			url: "<?=Url::toRoute(['demo/typeadd'])?>",
			type: 'get',
			data: {name: name}
		})
	});

	$(document).on('click', '#wan', function(event) {
		$.ajax({
			url: "<?=Url::toRoute(['demo/typeadd'])?>",
			type: 'get',
			data: {name: name},
			success:function(msg){
				if (msg==1) {
					alert('添加成功')
				}
			}
		})
	});
</script>