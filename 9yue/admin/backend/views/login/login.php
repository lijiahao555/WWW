<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;


use yii\helpers\Url;

use yii\captcha\Captcha;


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="public/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- MetisMenu CSS -->
    <!-- <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet"> -->

    <!-- Custom CSS -->
    <link href="public/assets/css//sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
	<link rel="stylesheet" href="public/assets/css/font-awesome.min.css" />


</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">安居客房源系统登录</h3>
                    </div>
                    <div class="panel-body">
                        <?php $form = ActiveForm::begin(['action'=>'?r=login/login'],'post'); ?>

                            <fieldset>
                                <div class="form-group">
									 <?= $form->field($model, 'username')->label('请输入用户名') ?>
                                </div>
                                <div class="form-group">
									 <?= $form->field($model, 'password')->label('请输入密码')->passwordInput() ?>
                                </div>
                                <div  id="div">
                                   <?= $form->field($model,'captcha')->widget(Captcha::className(),['template' => '<div class="row"><div class="col-xs-6">{image}</div><div class="col-xs-6">{input}</div></div>','captchaAction'=>'site/captcha',
                                        'imageOptions'=>['alt'=>'点击换图','title'=>'点击换图', 'style'=>'cursor:pointer'],
                                        'options'=>['class'=>'form-control col-lg-6']
                                    ])->label('验证码：');
                                    ?>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">记住密码
                                    </label>

                                </div>
                               	<?= Html::submitButton('登录', ['class' => 'btn btn-lg btn-success btn-block']) ?>
								<div style="text-align:right;">
                                    <a href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx65c96fa613ac4f0e&redirect_uri=http%3A%2F%2F47.95.198.52%2Fadmin%2Ffrontend%2Fweb%2Findex.php%3Fr%3Duser%2Fuser&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect">微信登录</a>
									<a href="<?=Url::toRoute(['login/register']);?>" class="btn ">没有账号密码？点击注册</a>
								</div>

                            </fieldset>
                        <?php ActiveForm::end();?>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
<?=Html::jsFile('@web/public/public/jquery.js'); ?>
<script>
    $(document).on('click', '#loginform-captcha-image', function() {
        console.log()

        url = $(this).attr('src')+"&refresh";

        $.ajax({
            url: url,
            type: 'get',
            dataType: 'json',
            success:function(msg){
                $("#loginform-captcha-image").attr('src',msg.url);
            }
        })
    });
</script>