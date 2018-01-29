<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<meta charset="utf8">

<style>
table{ border-collapse: collapse; border: 1px solid #ddd; width: 800px; margin: 0 auto;margin-top: 50px; background: rgba(121, 217, 221, 0.4); color: #666}
table tr{ height: 40px;}
table td{ border: 1px solid #ddd; text-align: center}
.title{ background: rgba(14, 196, 210, 0.99); color: #fff}

*{margin: 0; padding:0 ; font-family: 微软雅黑}
a{ text-decoration: none; color: #666;}
ul{ list-style: none}

.top{ width: 100%; background: rgba(14, 196, 210, 0.99); color: #fff; height: 100px; line-height: 150px; text-align: right;}
.top span{ margin-right: 20px}


.left{ width: 260px; float: left; height: 100%; background: rgba(121, 217, 221, 0.4)}
.left ul{ width: 100%;}
.left ul li{ height: 40px; width: 100%; border: 1px solid #ddd; line-height: 40px; text-align: center;}
.left .selected{ background: rgba(14, 196, 210, 0.99); color: #fff;}
.left .selected a{ color: #fff;}


.right{ float: left; width: 1000px;}

.right .chat{
    margin-top: 50px;
    margin-left: 50px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    padding: 10px 10px;
}

.right .user{
    text-align: left;
}

.right .name{
    color: rgba(14, 196, 210, 0.99);
}

.right .user .message{
    display: inline-block;
    border: 1px solid #ddd;
    border-radius: 5%;
    padding: 5px 10px;
    margin-top: 10px;
    background: #ddd;
}

.right .service{
    text-align: right;

}

.right .service .message{
    display: inline-block;
    border: 1px solid #ddd;
    border-radius: 5%;
    padding: 5px 10px;
    margin-top: 10px;
    text-align: left;
    background: #ddd;
}

.right .input-message{
    margin-left: 50px;
}

.right textarea{
    margin-top: 20px;
    width: 100%;
    height: 100px;
    border: 1px solid #ddd;
}

.right .submit{
    width: 150px;
    height: 35px;
    line-height: 35px;
    border-radius: 3px;
    border: 1px solid #ddd;
    display: block;
    background: rgba(14, 196, 210, 0.99);
    color: #fff;
    text-align: center;
    margin: 5px auto;
}

.right .upload{
    width: 150px;
    height: 35px;
    line-height: 35px;
    border-radius: 3px;
    border: 1px solid #ddd;
    display: block;
    background: rgba(14, 196, 210, 0.99);
    color: #fff;
    text-align: center;
    margin-top: 20px;
}

.right .image-view{
    width: 300px;
    height: 300px;
    border: 1px dotted #ddd;
    text-align: center;
    line-height: 300px;
    margin-top: 20px;
}


</style>

<div class="top">
    <span>欢迎管理员：<?=$user['username']?></span>
</div>

<div class="left">
    <ul>
        <li>网站设置</li>
        <li>静态资源管理</li>
        <li>微信消息</li>
        <li><a href="<?=Url::to(['wexin/update','id'=>$user['id']]);?>">修改密码</a></li>
        <li class="selected">微信用户</li>
    </ul>
</div>

<div class="right">
    <div class="input-message">
        <?= Html::beginForm(['wexin/up'], 'post') ?>
            <table>
                    <th>用户openid</th>
                    <th>微信昵称</th>
                    <th>微信头像</th>
                <tr>
                    <input type="hidden" name="id" value="<?=$data['yk_id']?>">
                    <td><input type="text" name="open_id" value="<?=$data['open_id']?>"></td>
                    <td><input type="text" name="name" value="<?=$data['name']?>"></td>
                    <td><input type="text" name="url" value="<?=$data['url']?>"></td>
                </tr>
                <tr>
                    <td colspan="3"><?= Html::submitButton('修改', ['class' => 'submit']) ?></td>
                </tr>
            </table>
       <?= Html::endForm() ?>
    </div>
</div>