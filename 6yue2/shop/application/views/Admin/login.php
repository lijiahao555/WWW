<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<base href="<?php echo base_url('public/Admin/') ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url("")?>" rel="stylesheet" type="text/css" />
<link href="styles/main.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
  color: white;
}
</style>

</head>
<body style="background: #278296">
<form method="post" action="<?php echo site_url('Admin/Login/loginDo') ?>" name='theForm'>
  <table cellspacing="0" cellpadding="0" style="margin-top: 100px" align="center">
  <tr>
    <td><img src="images/login.png" width="178" height="256" border="0" alt="ECSHOP" /></td>
    <td style="padding-left: 50px">
      <table>
      <tr>
        <td>管理员姓名：</td>
        <td><input type="text" name="username" value="李家豪" /></td>
      </tr>
      <tr>
        <td>管理员密码：</td>
        <td><input type="password" name="password" value="123456" /></td>
      </tr>
      <tr>
        <td>验证码：</td>
        <td><input type="text" name="exam"  /></td>
      </tr>
      <tr>
      <td colspan="2" align="right"><?php echo $captcha ?></td>
      </tr>
      <tr><td>&nbsp;</td><td><input type="submit" value="进入管理中心" class="button" /></td></tr>
      <tr>
        <td colspan="2" align="right">&raquo; <a href="../" style="color:white">返回首页</a> &raquo; <a href="get_password.php?act=forget_pwd" style="color:white">你忘记了密码吗？</a></td>
      </tr>
      </table>
    </td>
  </tr>
  </table>
</form>
</body>
<script src="<?php echo base_url('public/jquery.js') ?>"></script>
<script>
  $(document).on('click', '#Imageid', function() {
    exam=$(this);
    url="<?php echo base_url('captcha/') ?>";
      $.ajax({
          url: "<?php echo site_url('Admin/Login/refresh') ?>",
          type: 'get',
          dataType: 'json',
          success:function(msg){
            // console.log(msg)
             exam.attr('src',url+msg['filename']);
          }
      })
      
  });
</script>