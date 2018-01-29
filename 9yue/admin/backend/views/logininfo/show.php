<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>




			<li class="active">直播后台控制台</li>
			<li class="active">分类管理</li>
			<li class="active">分类添加</li>
		</ul><!-- .breadcrumb -->
	</div>




	<div class="page-content">
			<div class="row">
					<div class="col-xs-12">

					<?php $form = ActiveForm::begin(['action'=>'?r=logininfo/show','options' => ['enctype' => 'multipart/form-data']],'post') ?>
					<div class="form-group">

						<div class="col-sm-9">
							<?= $form->field($model, 'admin_name',['options' => ['style'=>'width:20%']])->label('昵称') ?>
						</div>
					</div>

					<div class="form-group">

						<div class="col-sm-9">
							<?= $form->field($model, 'email',['options' => ['style'=>'width:20%']])->label('邮箱') ?>
						</div>
					</div>

					<div class="form-group">

						<div class="col-sm-9">
							<?= $form->field($model, 'tel',['options' => ['style'=>'width:20%']])->label('电话') ?>
						</div>
					</div>

					<div>

						<div class="col-sm-9">
							头像
							<br>
    						<?= $form->field($model, 'file_upload',['options' => ['id'=>'file_upload','style'=>'width:20%']])->fileInput() ?>
						</div>
					</div>
					<div>
						<div class="col-sm-9">
							<?= Html::submitButton('添加', ['class' => 'btn btn-info']) ?>

							&nbsp; &nbsp; &nbsp;
							<button class="btn" type="reset">
								<i class="icon-undo bigger-110"></i>
								重置信息
							</button>
						</div>

					</div>


					<?php ActiveForm::end() ?>
					</div><!-- /span -->
				</div><!-- /row -->

	</div><!-- /.page-content -->

<!-- 文件上传 -->
        <link rel="stylesheet" type="text/css" href="public/public/Uploadify/uploadify.css">
        <script type="text/javascript" src="public/public/Uploadify/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="public/public/Uploadify/jquery.uploadify.min.js"></script>

        <script type="text/javascript">
        $(function() {
            $('#file_upload').uploadify({
                'swf'      : "public/public/Uploadify/uploadify.swf",
                'uploader' : "public/public/Uploadify/uploadify.php",
                // Your options here
                'method'   : 'post',
    			'formData' : { 'someKey' : 'file_upload' }
            });
        });
        </script>
        <!-- 文件上传 -->

