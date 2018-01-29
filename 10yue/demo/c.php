<?php
header('Content-type: text/html; charset=utf-8');#设置头信息
require_once('zhphpWeixinApi.class.php');
$zhwx=new zhphpWeixinApi();//实例化
$configArr=array(
     'token'=>'weixintest',
     'appid'=>'wx7b4b6ad5c7bfaae1',
     'appSecret'=>'faaa6a1e840fa40527934a293fabfbd1',
     'myweixinId'=>'gh_746ed5c6a58b'
     );
 $zhwx->setConfig($configArr);##配置参数
 $zhwx->checkAccessToken();##检查token
 $userlist=$zhwx->getUserList();##获取用户列表
  
 //var_dump($userlist);
 //$callData=$zhwx->mediaUpload('image','a.jpg');## 上传图片到微信  得到 media id
//CQKrXGNiJWiKutD17CWhoqlqW_80IByyFpLWa-dnPzhl7jPpQFiBbXhsAQVwId-q
  $data=array(
        array(
            "thumb_media_id"=>"CQKrXGNiJWiKutD17CWhoqlqW_80IByyFpLWa-dnPzhl7jPpQFiBbXhsAQVwId-q",
            "author"=>"xxx",
            "title"=>"Happy Day",
            "content_source_url"=>"www.qq.com",
            "content"=>"<div style='width: 100%; height: 50px; background-color: red;'>文章内容</div>",
            "diges"=>"digest"
        ),
);
 //$aa=$zhwx->newsUpload($data);//上传图文素材[ media_id] => 2n32OjOIdP7jewG0d55bKvuJYcH6XpWTeg8ViHCfzHGgKBZxmE72s3T2LY-3Q8LO





if(isset($_POST['sub'])){
   $touser=$_POST['userOpenId'];
    //开始群发
     $content='
     <div><img src="http://d005151912.0502.dodi.cn/a.jpg" style="width:100%; height:50px;"></div>
     <div> 这是商品说明</div>
     ';
     $content.='查看详情: <a  href="http://msn.huanqiu.com/china/article/2016-01/8473360.html">国家统计局局长王保安涉嫌严重违纪被免职</a>';
   // $data= $zhwx->sendMassMessage('text',$touser,$content);
     $data=$zhwx->sendMassMessage('news',$touser,'2n32OjOIdP7jewG0d55bKvuJYcH6XpWTeg8ViHCfzHGgKBZxmE72s3T2LY-3Q8LO'); ##主动发送图文消息
    echo '<pre>';
   print_r($data);
    echo '</pre>';
    exit;
}
if(isset($userlist['errcode']) && $userlist['errcode']== '45009'){
      echo  '对不起,这是测试接口,今日已经超过调用限制。请明日再来';
  }else{
     ?>
     <!DOCTYPE html>
<html>
<head>
    <title>微信群发信息</title>
     <style type="text/css">
         .userlistBox{
             width: 1000px;
             height: 300px;
             border: 1px solid  red;
         }
          td{ text-align: center; border: 1px solid black;}

     </style>
</head>
<body>

     <?php
      $userinfos=array();
       foreach($userlist['data'] as  $key=>$user){
            foreach($user as $kk=>$list){
                $userinfos[]=$zhwx->getUserInfo($list);
            }
        }
     ?>
     <form action="wx.php?act=send" method="post">
         <div class="userlistBox">
             <h2>请选择用户</h2>
             <table >
                 <tr>
                     <th style="width: 10%;">编号</th>
                     <th style="width: 15%;">关注事件类型</th>
                     <th style="width: 15%;">用户姓名</th>
                     <th style="width: 10%;">性别</th>
                     <th style="width: 15%;">头像</th>
                     <th style="width: 15%;">所在地</th>
                     <th style="width: 15%;">所在组</th>
                     <th style="width: 5%;">操作</th>
                 </tr>
                 <?php
                 foreach($userinfos  as $key=>$userinfo){
                     ?>
                     <tr>
                         <td><?php echo $key+1;?></td>
                         <td><?php
                             if($userinfo['subscribe'] == 1){
                                 echo '普通关注事件';
                             }
                             ?></td>
                         <td> <?php echo  $userinfo['nickname'];  ?></td>
                         <td> <?php echo  $userinfo['sex']==1?'男':'女';  ?></td>
                         <td>  <?php
                             if(empty($userinfo['headimgurl'])){
                                 echo '没有头像';
                             }else{
                                 echo '<img width="50px" height="50px" src="'.$userinfo['headimgurl'].'">';
                             }
                             ?></td>
                         <td><?php  echo $userinfo['country'].'-'.$userinfo['province'].'-'.$userinfo['city']; ?></td>
                         <td><?php
                             if($userinfo['groupid']  == 0){
                                 echo '没有分组';
                             }else{
                                 echo '还有完善功能';
                             }
                             ?>
                         </td>
                         <td><input type="checkbox" value="<?php echo $userinfo['openid'];?>" name="userOpenId[]" id="m_<?php echo $key+1; ?>" /></td>
                     </tr>
                 <?php
                 }
                 ?>
             </table>
              <input type="submit" name="sub" value="发送" />
         </div>
    </form>
</body>
</html>
<?     
  }
?>