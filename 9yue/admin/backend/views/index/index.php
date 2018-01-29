<?php
/* @var $this yii\web\View */
?>


    <li class="active">后台管理控制台</li>
</ul><!-- .breadcrumb -->
</div>

<div class="page-content">
<div class="page-header">
    <h1>
        控制台
        <small>
            <i class="icon-double-angle-right"></i>
             查看
        </small>
    </h1>
</div><!-- /.page-header -->

<div class="row">
<div class="col-xs-12">
    <!-- PAGE CONTENT BEGINS -->

    <div class="alert alert-block alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <i class="icon-remove"></i>
        </button>

        <i class="icon-ok green"></i>

        欢迎&nbsp;<font color="red"><?=Yii::$app->session['admin_id']['admin_name'] ?></font>&nbsp;登录
        <strong class="green">
            直播后台管理
        <small>(v1.2)</small>
        </strong>
        
  </div>