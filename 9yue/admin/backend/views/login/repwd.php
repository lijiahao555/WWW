<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>

			<li class="active">直播后台控制台</li>
			<li class="active">礼物管理</li>
			<li class="active">礼物添加</li>
		</ul><!-- .breadcrumb -->
	</div>

	<div class="page-content">
			<div class="row">
					<div class="col-xs-12">


					<?php $form = ActiveForm::begin([
					    'action' => ['gift/add'],
					    'method'=>'post',
					    'options' => ['enctype' => 'multipart/form-data', 'class' => 'form-horizontal']
					]); ?>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 礼物名称 </label>

						<div class="col-sm-9">
							<input type="text" id="form-field-1" placeholder="礼物名称" name="name" class="col-xs-10 col-sm-5" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 图片 </label>


						 <div class="col-sm-9">
							<?= $form->field($model, 'img',['options' => ['class'=>'col-sm-9']])->label('')->fileInput(['multiple'=>'multiple'])?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 价格 </label>

						<div class="col-sm-9">
							<input type="number" id="form-field-1" name="money" min="0" class="col-xs-10 col-sm-5" />
						</div>
					</div>

					<div class="hr hr-24"></div>

					<div class="clearfix form-actions">
						<div class="col-md-offset-3 col-md-9">

							<?= Html::submitButton('添加礼物', ['class' => 'btn btn-info']) ?>
							&nbsp; &nbsp; &nbsp;
							<button class="btn" type="reset">
								<i class="icon-undo bigger-110"></i>
								重置信息
							</button>
						</div>
					</div>


				<?php ActiveForm::end(); ?>
					</div><!-- /span -->
				</div><!-- /row -->

	</div><!-- /.page-content -->
</div><!-- /.main-content -->

