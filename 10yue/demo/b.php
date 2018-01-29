<?php
  /*
    Author:yf
    使用说明:微信公众号无限群发接口，使用实例:   
    $test = new SendAllMsg("你的appId","你的appSecret");
    $test->sendMsgToAll(); //调用群发方法
    注：1.使用条件：认证号或测试号
      2.群发消息内容可为图文、文本、音乐等,$data具体内容参照微信开发文档/客服接口
      3.若用户量过万,需修改getUserInfo()，具体参照信开发文档/获取关注者列表
        
    新手上路，大神们多多指点，谢谢
  */
                 

  interface iSendAllMsg{
    function getData($url); //curl 发送get请求
    function postData($url,$data); //curl 发送post请求
    function getAccessToken();  //在构造方法中已调用该方法来获取access_token,注意它在wx服务器的保存时间7200s
    function sendMsgToAll(); //群发消息方法,发送的消息$data 可自行修改
  }
  class SendAllMsg implements iSendAllMsg{
    private $appId; 
    private $appSecret;
    private $access_token;
    //
    public function __construct($appId, $appSecret) {
      $this->appId = $appId;
      $this->appSecret = $appSecret;
      $this->access_token = $this->getAccessToken();
    }
    ////curl 发送get请求
    function getData($url){
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
      curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $data = curl_exec($ch);
      curl_close($ch);
      return $data;
    }
    //curl 发送post请求
    function postData($url,$data){
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
      curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $tmpInfo = curl_exec($ch);
      if (curl_errno($ch)) {
        return curl_error($ch);
      }
      curl_close($ch);
      return $tmpInfo;
    }
    //在构造方法中已调用该方法来获取access_token,注意它在wx服务器的保存时间7200s
    function getAccessToken(){
      $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->appId."&secret=".$this->appSecret;
      $res = $this->getData($url);
      $jres = json_decode($res,true);
      $access_token = $jres['access_token'];
      return $access_token;
    }
    // 获取所有用户标识
    private function getUserInfo(){
      $url = "https://api.weixin.qq.com/cgi-bin/user/get?access_token=".$this->access_token;
      $res = $this->getData($url);
      $jres = json_decode($res,true);
      //print_r($jres);
      $userInfoList = $jres['data']['openid'];
      return $userInfoList;
    }
    //群发消息方法,发送的消息$data 可自行修改
    function sendMsgToAll(){
      $userInfoList = $this->getUserInfo();
      // var_dump($userInfoList);die;
      $url = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=".$this->access_token;
      foreach($userInfoList as $val){
        $data = '{
              "touser":"'.$val.'",
              "msgtype":"text",
              "text":
              {
                "content":"测试一下，抱歉打扰各位"
              }
            }';
        $this->postData($url,$data);
      }
    }
  }
  $test = new SendAllMsg("wx65c96fa613ac4f0e","5a62ea768f0ab48cd9e7a289515ae953");
  $test->sendMsgToall();
    
?>
