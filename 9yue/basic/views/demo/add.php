<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

?>
<?php $form = ActiveForm::begin(['action'=>'index.php?r=demo/add']); ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'password') ?>

    <div>
        <?= Html::submitButton('添加', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
<hr>
<h4>当前登录用户是：<font color="red"><?=$name?></font>&nbsp;&nbsp;&nbsp;<a href="http://localhost/9yue/basic/web/index.php?r=demo/admin">退出</a></h4>
<hr>
<table width="500">
	<th>id</th>
	<th>name</th>
	<th>内容</th>
	<th>添加人</th>

	<?php foreach ($countries as $country): ?>

      <tr>
      	  <td><?= Html::encode("{$country->id} ") ?></td>

      	  <td><?= Html::encode("{$country->name} ") ?></td>

      	  <td><?= Html::encode("{$country->password} ") ?></td>

      	  <td><?= Html::encode("{$country->add_name} ") ?></td>

      	  <td><a href='http://localhost/9yue/basic/web/index.php?r=demo/del&id=<?= Html::encode("{$country->id} ") ?>'>删除</a> | <a href='http://localhost/9yue/basic/web/index.php?r=demo/up&id=<?= Html::encode("{$country->id} ") ?>'>修改</a></td>

      </tr>

	<?php endforeach; ?>
<tr>
	<td colspan="4"><?= LinkPager::widget(['pagination' => $pagination]) ?></td>
</tr>
</table>
