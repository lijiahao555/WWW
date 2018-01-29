<?php
header('content-type:text/html;charset=utf-8');
$data = $_POST;
?>
<!doctype html>
<html lang="en" data-dpr="3" style="width:100%; font-size:64px;">
 <head> 
   <meta charset="utf-8" > 
  <!--允许全屏--> 
  <meta content="yes" name="apple-mobile-web-app-capable"> 
  <meta content="yes" name="apple-touch-fullscreen"> 
  <meta content="telephone=no,email=no" name="format-detection"> 
  <meta content="a1z3i" name="data-spm">
  <meta content="20140614.a1z3i.meyxt9ed" name="data-scm">
  <link href="css/Login.css" rel="stylesheet" type="text/css" />
  <script src="lib-flexible-master/build/flexible.debug.js"></script>
  <script src="lib-flexible-master/build/flexible_css.debug.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/logo.js"></script>
  <title>确认订单</title> 

 </head> 
 <body data-spm="meyxt9ed"  style=" background-color:#f2f2f2; width:100%; "> 
 
  <!-- Item Header Template --> 
     <div class="nav" style=" background-color:#fff; position: relative;">
     <a href="home.html" class="backbutt" style="background-color: none;">
     <img src="images/back.png"    >
     </a>

    <h1 class="nav_h1">确认订单</h1>
  </div>
   
   		

<ul  class="detilbox bg_one">
      <li><p1 class="li_color">订单详情:</p1></li>
      <li><p2>订单类型：</p2> <p3>积分订单</p3></li>
      <li><p2>单价:</p2> <p3 class="li_color"><input  type="text" id="detil"  disabled="disabled"   value="￥0.01"   maxlength="" style="    background-color: #fff;text-align: right;color: #f42424;" ></p3></li>
      <li><p2>数量:</p2> <p3 class="li_color"> <input  type="text" id="mynumber"  value="<?=$data['jifen']?>"  placeholder="1000"  maxlength="" style="    background-color: #fff;text-align: right;color: #f42424;" ></p3></li>
       <li style="border-bottom: none ;"><p2>总金额:</p2> <p3  class="li_color"><input  type="text"  disabled="disabled"  id="alldate"  value="<?=$data['price']?>"   maxlength="" style="text-align: right;color: #f42424;    background-color: #fff;" ></p3></li>
</ul>
<div class="foot_b bg_one">
<p1>实付 <span  class="li_color" ><input  type="text"  disabled="disabled"  id="alldated"  value="<?=$data['price']?>" style="color: #f42424; width: 250px;    background-color: #fff;" ></span></p1>
<p2  id="pay"> 微信支付</p2>
</div>

 </body>
</html>
<script>
   $('#pay').click(function(event) {
      var jifen = $('#mynumber').val();
      $.ajax({
        url: 'demo.php',
        type: 'get',
        dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
        data: {jifen: jifen},
        success:function(msg){
            if (msg == '1') {
              alert('121')
            }
        }
      })
   });
</script>