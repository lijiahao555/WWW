<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>弹出小窗口示例</title>


<style>
table{ border-collapse: collapse; border: 1px solid #ddd; width: 800px; margin: 0 auto;margin-top: 50px; background: rgba(121, 217, 221, 0.4); color: #666}
table tr{ height: 40px;}
table td{ border: 1px solid #ddd; text-align: center}

*{margin: 0; padding:0 ; font-family: 微软雅黑}
a{ text-decoration: none; color: #666;}

.top{ width: 100%; text-align: center;}
.top h2{ margin-top: 50px;}

form{ width: 450px; margin: 0 auto; margin-top: 50px;}
form input{
    
}

form p{
    
}

form span{
    width: 100px;text-align: right;display: inline-block;
}

.a_button{
    width: 150px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    background: green;
    color: #fff;
    display: block;
    border: 1px solid green;
    border-radius: 5px;
    margin: 0 auto;
}
</style>

</head>
<body>

<script src="{{URL::asset('public/jquery.js')}}"></script>
<script type="text/javascript">
var isshow=0;//0小窗口没有显示，1小窗口已显
function creatediv(content)
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

    var str = '<div class="login">\
            <div class="login-main">\
                <div class="login-hd">\
                    <h1>\
                    <a class="tab-btn active" id="login" style="background: yellow;">登录</a>\
                    <a class="tab-btn" id="register" style="background: yellow;">注册</a>\
                    <a class="tab-btn" id="register" style="background: yellow;">第三方登录</a>\
                    <i class="line J_line" style="left: 0px;"></i>\
                    </h1>\
                </div>\
            </div>\
        </div>';
    if (content != null) {

        msgObj.innerHTML = str+content
    }else{

        msgObj.innerHTML = str
    }
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





<script>
    $(document).on('click', '#register', function() {
       str = ''
        creatediv(str);
    });
    $(document).on('click', '#login', function() {
       str = '<div class="top">\
                    <h2>欢迎登录</h2>\
                </div>\
                <div class="main">\
                        <form action="login/login">\
                        <p>\
                            <span>手机号：</span>\
                            <input type="text" name="tel" placeholder="请输入手机号">\
                        </p>\
                        <p>\
                            <span>密码：</span>\
                            <input type="password" name="pwd" placeholder="请输入密码">\
                        </p>\
                        <p>\
                            <span>确认密码：</span>\
                            <input type="password" name="pwd2" placeholder="请输入确认密码">\
                        </p>\
                        <p>\
                              <input type="submit" class="a_button" value="登录">\
                        </p>\
                    </form>\
                </div>'
        creatediv(str);
    });
</script>

<script type="text/javascript" src="https://res.udb.duowan.com/lgn/x/js/udb.sdk.quickLogin.base_v2.js?V20171205"></script>
