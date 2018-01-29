


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>弹出小窗口示例</title>
</head>
<body>
<a href="javascript:void(0);" onclick="show();return false;">点击弹出小窗口 </a>
<script type="text/javascript">
var isshow=0;//0小窗口没有显示，1小窗口已显
function creatediv()
{
    var msgw,msgh,bordercolor;
    msgw=600;//提示窗口的宽度
    msgh=505;//提示窗口的高度
    var sWidth,sHeight;
    if( top.location == self.location )
        doc = document;
    var docElement = doc.documentElement;
    sWidth=docElement.clientWidth;
    sHeight = docElement.clientHeight;
    if( docElement.scrollHeight > sHeight )
        sHeight = docElement.scrollHeight;
    var bgObj=document.createElement("div");
    bgObj.setAttribute('id','bgDiv');
    bgObj.style.position="absolute";
    bgObj.style.top="0";
    bgObj.style.left="0";
    bgObj.style.background="#777";
    bgObj.style.filter="progid:DXImageTransform.Microsoft.Alpha(style=3,opacity=25,finishOpacity=75";
    bgObj.style.opacity="0.6";
    bgObj.style.width=sWidth + "px";
    bgObj.style.height=sHeight + "px";
    bgObj.style.zIndex = "10000";
    document.body.appendChild(bgObj);
        
    var msgObj=document.createElement("div");
    msgObj.setAttribute("id","msgDiv");
    msgObj.setAttribute("align","center");
    msgObj.style.position = "absolute";
    msgObj.style.left = "50%";
    msgObj.style.background="#fff";
    msgObj.style.marginLeft = "-200px" ;
    msgObj.style.top = (document.documentElement.clientHeight/2+document.documentElement.scrollTop-252)+"px";
    msgObj.style.width = msgw + "px";
    msgObj.style.height =msgh + "px";
    msgObj.style.zIndex = "10001";
    msgObj.innerHTML = '<div class="login">\
    <div class="login-main">\
        <div class="login-hd">\
            <a class="tab-btn active">登录</a>\
            <a class="tab-btn">注册</a>\
            <i class="line J_line" style="left: 0px;"></i>\
        </div>\
        <div class="login-bd">\
            <div class="login-content">\
                <div class="tab-unit" style="display: block;">\
                    <div id="login-tab">\
                        <h2 class="login-title">账号登录</h2>\
                        <div class="login-view" id="J_loginView"><div id="udbsdk_login_content" style="display: block;"><div id="udbsdk_login_normal" class="udbsdk_login" style="display: block;"><iframe id="udbsdk_frm_normal" class="udbsdk_frm" src="" frameborder="0" scrolling="no" allowtransparency="true"></iframe></div></div></div>\
                    </div>\
                </div>\
                <div class="tab-unit" style="display: none;">\
                    <div class="register-tab">\
                        <iframe frameborder="0" scrolling="no" allowtransparency="true" height="370"></iframe>;\
                        </div>\
                    <div class="register-tab">\
                        <iframe frameborder="0" scrolling="no" allowtransparency="true" height="370"></iframe>\
                        <div><a class="reg-by-phone" href="#">使用手机注册&gt;</a></div>\
                    </div>\
                </div>\
            </div>\
            <i class="login-loading J_loading" style="display: none;"></i>\
        </div>\
    </div>\
    <div class="login-sidebar">\
        <h2 class="title">合作账号登录</h2>\
        <div class="other-login">\
            <a class="login-btn login-btn-wechat clickstat" eid="click/nav/weixinlogin" eid_desc="点击/导航/微信账号登录"><i class="icon"></i><img src="../../../extend/image/weixin.jpg" width="170" height="40" alt=""></a>\
            <a class="login-btn login-btn-qq clickstat" eid="click/nav/qqlogin" eid_desc="点击/导航/QQ账号登录" login-type="qq"><i class="icon"></i><img src="../../../extend/image/qq.png" alt=""></a>\
            <a class="login-btn login-btn-weibo clickstat" eid="click/nav/weibologin" eid_desc="点击/导航/新浪微博登录" login-type="weibo"><i class="icon"></i><img src="../../../extend/image/weibo.png" width="170" height="40" alt=""></a>\
        </div>\
    </div>\
</div>'
    document.body.appendChild(msgObj); ;
}
function delWinD()
{
   document.getElementById("bgDiv").style.display="none";
   document.getElementById("msgDiv").style.display="none";
   isshow=0;
}
function show()
{   
    isshow=1;
    if(!document.getElementById("msgDiv"))//小窗口不存在
        creatediv();
    else
    {
        document.getElementById("bgDiv").style.display="";
        document.getElementById("msgDiv").style.display="";
        document.getElementById("msgDiv").style.top=(document.documentElement.clientHeight/2+document.documentElement.scrollTop-252)+"px";
    }  
}
</script>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-3448069-1");
pageTracker._initData();
pageTracker._trackPageview();
</script>
</body>


</html>
