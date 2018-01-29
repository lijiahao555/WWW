<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="/4yue/rikao/xiangmu/Public/Admin/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- MetisMenu CSS -->

    <!-- Custom CSS -->
    <link href="/4yue/rikao/xiangmu/Public/Admin/assets/css//sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="/4yue/rikao/xiangmu/Public/Admin/assets/css/font-awesome.min.css" />


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
                        <form role="form" action="<?php echo U('Login/exam');?>" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="账号" name="login_name"  >
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="密码" name="login_pwd" type="password" value="">
                                </div>
                                
                               
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="7" value="7"> 7天免登陆
                                        
                                    </label>
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" value="登录" class="btn btn-lg btn-success btn-block"> 
                                <div style="text-align:right;">
                                   <a href="<?php echo U('Login/login');?>" class="btn ">有密码？点击登录</a>&nbsp;&nbsp;<a href="<?php echo U('Login/loginAdd');?>" class="btn ">没有账号密码？点击注册</a>
                                </div>
                               
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>