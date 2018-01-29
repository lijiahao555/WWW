<?php
header('content-type:text/html;charset=utf8');

$pdo = new PDO('mysql:host=127.0.0.1;dbname=weixin','root','root');

$sql = "SELECT * FROM number WHERE id = ".$_GET['id']." ORDER BY add_time DESC";

$result = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="a2FERjNBeGdYLhAneQkfAgE2dSEEGw0mARUhB1gMIC0pESsoWhIxNw==">
    <title>表白墙-颖姐姐收到表白</title>
    <link href="http://static.dnrcdn.com/css/forum1/forum-new-min-2.css?v=31" rel="stylesheet">
<link href="http://static.dnrcdn.com/css/weui.min.css" rel="stylesheet">
<script src="http://static.dnrcdn.com/js/zeptoWithFastClick.min.js?v=1"></script>    <script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?4f3f314759398f8043603f8020b240ba";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
window.loginUser = {
    id:0};
</script>
</head>
<body>
            <div class="page" id="page">
            <div class="thread-topic">
            <a href="/forum/topic/view?id=10002">
                <div class="thread-topic-title">
                    表白墙                </div>
            </a>
        </div>
        
    <div class="margin10 with-bottom-action">
        <div class="thread-view">
            <div class="clearfix thread-meta">
                <div class="avatar-container left">
                    <img class="avatar" src="http://simg.dnrcdn.com/assets/anony_avatar.png!50" width="30">
                </div>
                <div class="thread-meta-main">
                    <div class="author-info">
                                                <span class="tag-thread-author">楼主</span>
                                                    <span class="icon-mars pink"></span>
                                            </div>

                    <div class="thread-meta-bottom">
                        
                        <span class="thread-from-school darkgray">
                                                    </span>

                        <span class="thread-from-region darkgray">
                            山西                        </span>
                    </div>
                </div>
            </div>
            <div class="thread-content" id="thread_content">
                                <div class="thread-title">
                    对 <span class="pink"><?=$result['user_name']?></span> 说 :                </div>
                                <div class="thread-text">
                    <?=$result['content']?>                </div>
                                            </div>
            
                    </div>

                <div class="forum-adv">
            <div class="forum-subscribe-qrcode">
                <img src="http://static.dnrcdn.com/images/qrcode-forum-subscribe-2.png" height="200"/>
            </div>
        </div>
        
        <div id="floor_list" class="clearfix floor-list">
            
        </div>

                    <div class="bottom-pager" id="bottom_pager">
                <span class="icon-coffee mr10"></span><span class="pager-text">没有更多评论了</span>
            </div>
            </div>
    
    <!--底部菜单-->
    <div class="weui_tabbar trigger-reply-info" id="bottom_menus" data-threadid="406846" data-id="0" data-name="楼主" 
         data-canuploadimg="0"
         data-canuploadvoice="0"
         >
        <a href="#" class="weui_tabbar_item like-trigger " data-showtext="1" data-threadid="406846">
            <div class="weui_tabbar_icon">
                <span class="icon-thumbs-o-up"></span>
            </div>
            <p class="weui_tabbar_label count">赞</p>
        </a>
        <a href="#" class="weui_tabbar_item down-trigger " data-showtext="1" data-threadid="406846">
            <div class="weui_tabbar_icon">
                <span class="icon-thumbs-o-down"></span>
            </div>
            <p class="weui_tabbar_label count">不喜欢</p>
        </a>
        <a href="#" class="weui_tabbar_item open-page-trigger" data-openid="page_share" data-pagetype="overlayer">
            <div class="weui_tabbar_icon">
                <span class="icon-share-square-o"></span>
            </div>
            <p class="weui_tabbar_label">分享</p>
        </a>
        <a href="#" class="weui_tabbar_item open-reply-trigger">
            <div class="weui_tabbar_icon">
                <span class="icon-comments-o"></span>
            </div>
            <p class="weui_tabbar_label">评论 </p>
        </a>
        <a href="#" class="weui_tabbar_item open-page-trigger" data-openid="page_bmmore" data-pagetype="actionsheet">
            <div class="weui_tabbar_icon">
                <div class="notification-tag hidden"><span class="notification-count"></span></div>
                <span class="icon-ellipsis-h"></span>
            </div>
            <p class="weui_tabbar_label">更多</p>
        </a>
    </div>
</div>

<!--更多菜单-->
<div class="actionsheet-wrap" id="page_bmmore">
    <div class="weui_mask_transition"></div>
    <div class="weui_actionsheet">
        <div class="weui_actionsheet_menu">
            <div class="weui_actionsheet_cell">
                <a href="/forum/topic/index">话题列表</a>
            </div>
                    </div>
        <div class="weui_actionsheet_action">
            <div class="weui_actionsheet_cell close-trigger">取消</div>
        </div>
    </div>
</div>

<!--选择菜单-->
<div class="actionsheet-wrap" id="page_replyselect">
    <div class="weui_mask_transition"></div>
    <div class="weui_actionsheet">
        <div class="weui_actionsheet_menu">
            <div class="weui_actionsheet_cell delete-reply-action hidden">
                <a href="#" class="del-reply-trigger close-trigger">删除</a>
            </div>
            <div class="weui_actionsheet_cell">
                <a href="#" class="open-page-trigger close-trigger" data-type="threadReply" data-pagetype="html" data-openid="page_report" >举报</a>
            </div>
            <div class="weui_actionsheet_cell">
                <a href="#" class="open-reply-trigger close-trigger">回复</a>
            </div>
        </div>
        <div class="weui_actionsheet_action">
            <div class="weui_actionsheet_cell close-trigger">取消</div>
        </div>
    </div>
</div>

<!--分享样式-->
<div class="page hidden" id="page_share">
    <div class="weui_mask_transition weui_fade_toggle close-trigger"></div>
    <div class="share-tips close-trigger">
        <img src="http://static.dnrcdn.com/images/share.png" width="200" />
    </div>
</div>
<!--回复页面-->
<div class="hidden page form-page" id="page_reply">
     <input type="hidden" id="pr_threadid" value="0"/>
    <input type="hidden" id="pr_toid" value="0"/>
    <div class="page-title">
        回复 <span class="reply-toname">Ta</span>：
    </div>
    
    <div class="weui_cells weui_cells_form">
        <div class="weui_cell">
            <div class="weui_cell_bd weui_cell_primary">
                <textarea class="weui_textarea" id="pr_content" placeholder="请输入内容" rows="3"></textarea>
            </div>
        </div>
        <!--如果是楼主 允许添加照片-->
        <div class="weui_cell hidden upload-image-container">
            <div class="weui_cell_bd weui_cell_primary">
                <div class="weui_uploader">
                    <div class="weui_uploader_hd weui_cell add-pic-trigger-line">
                        <div class="weui_cell_bd weui_cell_primary"><a href="#" class="add-image-trigger description-text">添加图片</a></div>
                        <div class="weui_cell_ft"><span class="image-count">0</span>/<span class="image-max-count">4</span></div>
                    </div>
                    <div class="weui_uploader_bd hidden">
                        <ul class="weui_uploader_files"></ul>
                        <div class="weui_uploader_input_wrp add-image-trigger">
                            <input class="weui_uploader_input" type="file" accept="image/jpg,image/jpeg,image/png,image/gif" multiple="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="weui_cells weui_cells_form add-voice-form hidden">
        <div class="weui_cell add-voice-trigger">
            <a href="#"><span class="icon-microphone"></span> <span class="add-voice-tips">添加语音</span></a>
        </div>
        <input type="hidden" id="voice_local_id"/>
        <input type="hidden" id="voice_server_id"/>
    </div>
    
    <div class="weui_cells weui_cells_form reply-anonymous-select">
        <div class="weui_cell weui_cell_switch">
            <div class="weui_cell_hd weui_cell_primary">匿 名</div>
            <div class="weui_cell_ft">
                <input class="weui_switch" type="checkbox" id="pr_anonymous">
            </div>
        </div>
    </div>
    
    <div class="weui_btn_area clearfix">
        <div class="left button-container">
            <a href="javascript:;" class="weui_btn weui_btn_plain_default close-trigger">取 消</a>
        </div>
        <div class="right button-container">
            <a class="weui_btn weui_btn_primary submit-reply-trigger" href="javascript:">发 布</a>
        </div>
    </div>
    
    <div class="voice-recording hidden" id="voice_recording">
        <div class="weui_mask_transition weui_fade_toggle"></div>
        <div class="voice-recording-box vr-ready">
            <div class="voice-action-wrap vr-start">
                <span class="icon icon-microphone"></span>
            </div>
            <div class="voice-action-text">
                <a href="#" class="weui_btn weui_btn_mini weui_btn_default vr-start">点击开始</a>
                <a href="#" class="weui_btn weui_btn_mini weui_btn_default vr-close">关闭</a>
            </div>
        </div>
        
        <div class="voice-recording-box vr-running hidden">
            <div class="voice-action-wrap">
                <span class="icon icon-microphone"></span>
            </div>
            <div class="voice-action-text">
                <a href="#" class="weui_btn weui_btn_mini weui_btn_default">点击停止</a>
            </div>
        </div>
        
        <div class="voice-recording-box vr-finish hidden" data-play="0">
            <div class="voice-action-wrap vr-play-control">
                <span class="icon icon-play"></span>
            </div>
            <div class="voice-action-text">
                <a href="#" class="weui_btn weui_btn_mini weui_btn_default mr10 upload-voice-trigger">上传</a>
                <a href="#" class="weui_btn weui_btn_mini weui_btn_default mr10 restart-vr-trigger">重录</a>
                <a href="#" class="weui_btn weui_btn_mini weui_btn_default vr-close">取消</a>
            </div>
        </div>
    </div>
</div>
<!--举报页面-->
<div class="hidden page form-page" id="page_report">
    <input type="hidden" id="sr_type" value="0"/>
    <input type="hidden" id="sr_id" value="0"/>
    
    <div class="page-title">
        举报
    </div>
    
    <div class="weui_cells weui_cells_form">
        <div class="weui_cells_title">举报原因</div>
        <div class="weui_cells">
            <div class="weui_cell weui_cell_select">
                <div class="weui_cell_bd weui_cell_primary">
                    <select class="weui_select" id="sr_reason_type">
                        <option selected="" value="0">请选择</option>
                        <option value="1">垃圾信息</option>
                        <option value="2">广告</option>
                        <option value="3">色情</option>
                        <option value="4">人身攻击</option>
                        <option value="5">其他</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    
    <div class="weui_cells">
        <div class="weui_cells_title">补充说明</div>
        <div class="weui_cell">
            <div class="weui_cell_bd weui_cell_primary">
                <textarea class="weui_textarea" id="sr_reason" placeholder="可输入补充说明的内容" rows="3"></textarea>
            </div>
        </div>
    </div>
    
    <div class="weui_btn_area clearfix">
        <div class="left button-container">
            <a href="javascript:;" class="weui_btn weui_btn_plain_default close-trigger">取 消</a>
        </div>
        <div class="right button-container">
            <a class="weui_btn weui_btn_primary submit-report-trigger" href="javascript:">提 交</a>
        </div>
    </div>
</div>

<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
wx.config({
    debug: false,
    appId: 'wxd1bf431ddd800374',
    timestamp: 1510884360,
    nonceStr: 'rand_5a0e44080b6d0',
    signature: 'a0e675c48d3b5214b12f0bb81a2649435f9d4160',
    jsApiList: [
		"chooseImage","previewImage","uploadImage","downloadImage","getLocation","getNetworkType","onMenuShareTimeline","onMenuShareAppMessage","startRecord","stopRecord","onVoiceRecordEnd","playVoice","pauseVoice","stopVoice","onVoicePlayEnd","uploadVoice","downloadVoice"
	]
});
wx.ready(function(){
    window.wxStatus = {
        localAppId:1,
        ready:true
    };
        wx.onMenuShareTimeline({
        title: '表白墙-颖姐姐收到表白', // 分享标题
        link: window.location.href, // 分享链接
        imgUrl: '', // 分享图标
        success: function() {Forum.api.shareThread(406846);},
        cancel: function() {}
    });
            wx.onMenuShareAppMessage({
        title: '表白墙-颖姐姐收到表白', // 分享标题
        desc: '', // 分享描述
        link: window.location.href, // 分享链接
        imgUrl: '', // 分享图标
        type: '', // 分享类型,music、video或link，不填默认为link
        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
        success: function() {Forum.api.shareThread(406846);},
        cancel: function() {}
    });
    });
wx.error(function(res){
    window.wxStatus = {
        localAppId:1,
        ready:false,
        error:true
    };
});
</script>
<script type="text/javascript">
var pagerOptions = null;
$(function(){
    PageManager.bindEvents('#page,#page_bmmore,#page_replyselect', Events.usual)
            .bindEvents('#page_reply,#page_report',Events.publish)
            .setDropdownLoad({
                loadData:function(api) {
                    //window.location.hash = '#wechat_redirect';//解决微信有时候不刷新的问题
                    window.location.reload();
                    setTimeout(function(){
                        api.afterLoadData();
                    },500);
                }
            }).setScrollLoad(pagerOptions);
});
</script>
    <script src="http://static.dnrcdn.com/js/forum-new-min-2.js?v=101"></script></body>
</html>
