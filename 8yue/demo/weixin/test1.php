<?php
/*
    方倍工作室 http://www.cnblogs.com/txw1958/
    CopyRight 2013 www.fangbei.org  All Rights Reserved
*/
header("Content-type:text/html;charset=utf-8");
define("TOKEN", "xuexin");
$wechatObj = new wechatCallbackapiTest();
if (isset($_GET['echostr'])) {
    $wechatObj->valid();
}else{
    $wechatObj->responseMsg();
}

class wechatCallbackapiTest
{
//    public $appid = 'wxab8cbc41bfdf67d9';
    public $appid = 'wxab8cbc41bfdf67d9';
//    public $secret = 'ad9cd711153800e046f45704efdf59a1';
    public $secret = 'c8d7e7301470c64e0ecdeda4e96d82b8';

    public function valid()
    {
        $echoStr = $_GET["echostr"];
        if($this->checkSignature()){
            header('content-type:text');
            echo $echoStr;
            exit;
        }
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }

    public function responseMsg()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        if (!empty($postStr)){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $time = time();
            $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                        </xml>";
            $msgType = "text";

            if($keyword == "?" || $keyword == "？")
            {
                $contentStr = date("Y-m-d H:i:s",time());
            } elseif($keyword == "你好") {
                $contentStr = '我好，你不好啊';
            }elseif($keyword == "我想末班") {
                $contentStr = '不行，你这么好，哪能末班啊';
            }elseif(strstr($keyword, '喜欢') !==  false) {
                $contentStr = '你真好眼光啊，人家都不好意思了哦';
            }elseif(($keyword == "我想升班") || ($keyword == "我不想末班")) {
                $contentStr = '想得美';
            } elseif ($keyword == "个人信息"){
                $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$this->appid.'&secret='.$this->secret;
                $tokenJson = $this->sendUrl($url);
                $tokenArray = json_decode($tokenJson, true);

                $url2 = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$tokenArray['access_token'].'&openid='.$fromUsername;
                $userInfo = $this->sendUrl($url2);

//              $userInfo = $this->getCode($fromUsername);
//                $contentStr = $userInfo;//'openid='.$userInfo['openid'].'昵称='.$userInfo['nickname'].'性别='.$userInfo['sex'].'所在城市='.$userInfo['city'];
                $contentStr = $url2;
            } elseif (stripos($keyword, '傻') !== false){
                $contentStr = '你才傻呢，你全家都傻，就是为了防止你们骂我才写的这句。傻X！';
            } elseif (stripos($keyword, '二货') !== false){
                $contentStr = '你个缺心眼的玩意，还好意思说我二货呢，我当初一不留神把你放出去了，才有了你。';
            } elseif (stripos($keyword, '笑话') !== false){
                $contentStr = '从前有个茶盘子，茶盘子里面放满了你的人生。';
            } elseif (stripos($keyword, '韩宏烨') !== false){
                $contentStr = '请你输入“人”名。';
            } elseif (stripos($keyword, '游戏') !== false){
                $contentStr = '你想和我玩个游戏么？';
            } elseif (stripos($keyword, '对') !== false){
                $contentStr = '请你输入一个人名？';
            } elseif (stripos($keyword, '唱歌') !== false){
                $contentStr = '唱歌是不会，但是我会学啊，你可以先来一段。';
            } elseif (stripos($keyword, '我胖') !== false){
                $contentStr = '胖是不胖，就是有点丑';
            } else {
                $contentStr = '你说什么？我耳背听不清！';
            }
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
            echo $resultStr;
        }else{
            echo "";
            exit;
        }
    }

    public function getCode($openId){
        $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$this->appid.'&secret='.$this->secret;
        $tokenJson = $this->sendUrl($url);
        $tokenArray = json_decode($tokenJson, true);
//return $openId;exit;
        $url2 = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$tokenArray['access_token'].'&openid='.$openId;
        $userInfo = $this->sendUrl($url2);
        return $userInfo;
    }

    public function sendUrl($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, $url);
        //设置超时时间为3s
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //信任任何证书
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // 检查证书中是否设置域名,0不验证
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}
?>