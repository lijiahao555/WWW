<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin(['action'=>'?r=up/index','options' => ['enctype' => 'multipart/form-data']],'post') ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>
    <?= $form->field($model, 'name',['options'=>['name'=>'name']])->textInput() ?>
	<?=Html::submitButton('提交')?>

<?php ActiveForm::end() ?>
