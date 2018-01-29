<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=weixin','root','root');

$sql = "SELECT * FROM number WHERE user_name LIKE '%".$_GET['name']."%' ORDER BY add_time DESC";
// echo $sql;die;
$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$num = count($result);
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="aEY5TEIubTJbCW0tCGYKVwIRCCt1dBhzAjJcDSljNXgqNlYiK30kYg==">
    <title>表白墙</title>
    <link href="http://static.dnrcdn.com/css/weui.min.css" rel="stylesheet">
<link href="http://static.dnrcdn.com/css/forum1/forum-new-min-2.css?v=31" rel="stylesheet">
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
    
    <div class="margin10 with-bottom-action">
        <div class="topic-view">
            <div class="clearfix">
                <div class="topic-cover">
                    <img src="http://simg.dnrcdn.com/topic/2016/03/23/18405656f272b8ec4fd.jpg!80" />
                </div>
                <div class="topic-main">
                    <div class="topic-title">
                        表白墙                    </div>
                    <div class="topic-description">
                        在这里记录对Ta的爱                    </div>
                </div>
            </div>
        </div>

        <div class="bd">
            <div class="weui_search_bar" id="search_bar">
                <form class="weui_search_outer" action="/forum/confession/search">
                    <div class="weui_search_inner">
                        <i class="weui_icon_search"></i>
                        <input type="search" class="weui_search_input" id="search_input" name="name" placeholder="搜索" required="">
                        <a href="javascript:" class="weui_icon_clear" id="search_clear"></a>
                    </div>
                    <label for="search_input" class="weui_search_text" id="search_text">
                        <i class="weui_icon_search"></i>
                        <span>搜索</span>
                    </label>
                </form>
                <a href="javascript:" class="weui_search_cancel" id="search_cancel">取消</a>
            </div>
            <div class="weui_cells weui_cells_access search_show hidden" id="search_show">
                <div class="weui_cell">
                    <div class="weui_cell_bd weui_cell_primary">
                        <p class="search-tips"></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="topic-thread-separator">
            <div class="separator-text hot-thread-title">
                <a href="/forum/topic/view?id=10002" class="right">返回</a>
                 搜索到关于 <?=$_GET['name']?> 的表白<?=$num?>条
            </div>
        </div>

           <?php foreach ($result as $k => $v): ?>
                             <div class="topic-thread-list" id="thread_list_new">
                <div class="topic-thread thread-container">
    <div class="clearfix">
        <div class="topic-author-avatar">
            <img src="http://simg.dnrcdn.com/assets/anony_avatar.png!30" width="30"/>
        </div>
        <div class="topic-thread-content open-url-trigger" data-threadid="308527" data-url="/forum/thread/view?id=308527">
                            <div class="tt-title">对 <span class="pink"><?=$v['user_name']?></span> 说 : </div>
                <div class="tt-content"><?=$v['content']?></div>
                    </div>
    </div>
    <div class="thread-info">
                            <span class="icon-venus light-blue mr10"></span>
                <a href="#" class="disable-ou-trigger like-trigger info-tag-gray like-count mr10 " data-threadid="308527"><span class="icon-thumbs-o-up"></span> <span class="count"><span></a>
        <a href="#" class="disable-ou-trigger down-trigger info-tag-gray like-count mr10 " data-threadid="308527"><span class="icon-thumbs-o-down"></span> <span class="count"><span></a>
        <a href="#" class="info-tag-gray reply-count open-url-trigger" data-threadid="308527" data-url="/forum/thread/view?id=308527"><span class="icon-comments-o"></span> 评论</a>
    </div>
</div>
      <?php endforeach ?>     
        <div class="bottom-pager hidden" id="bottom_pager">
                   
                </div>
                        </div>

    <!--底部菜单-->
    <div class="weui_tabbar" id="bottom_menus" >
        <a href="#" class="weui_tabbar_item follow-topic-trigger " data-topicid="10002">
            <div class="weui_tabbar_icon">
                <span class="icon-heart"></span>
            </div>
            <p class="weui_tabbar_label">关注</p>
        </a>
        <a href="#" class="weui_tabbar_item open-page-trigger" data-openid="page_share" data-pagetype="overlayer">
            <div class="weui_tabbar_icon">
                <span class="icon-share-square-o"></span>
            </div>
            <p class="weui_tabbar_label">分享</p>
        </a>
        <a href="#" class="weui_tabbar_item open-page-trigger" data-openid="page_publish" data-pagetype="html" data-loginrequired="1">
            <div class="weui_tabbar_icon">
                <span class="icon-edit"></span>
            </div>
            <p class="weui_tabbar_label">发帖</p>
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

<div class="hidden page form-page" id="page_publish" >
    <input type="hidden" id="pt_topic_id" value="10002"/>
    <input type="hidden" id="pt_location"/>
    <div class="page-title">
        表白墙    </div>
    
    <div class="weui_cells weui_cells_form">
                <div class="weui_cell">
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" type="text" id="pt_confession_to" placeholder="请输入对方的名字">
            </div>
        </div>
                <div class="weui_cell">
            <div class="weui_cell_bd weui_cell_primary">
                <textarea class="weui_textarea" id="pt_content" placeholder="请输入内容" rows="3"></textarea>
            </div>
        </div>
        <div class="weui_cell">
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
    
        
    <div class="weui_cells weui_cells_form">
        <div class="weui_cell weui_cell_switch">
            <div class="weui_cell_hd weui_cell_primary">匿 名</div>
            <div class="weui_cell_ft">
                <input class="weui_switch" type="checkbox" id="pt_anonymous" checked>
            </div>
        </div>
    </div>
    
    <div class="weui_btn_area clearfix">
        <div class="left button-container">
            <a href="javascript:;" class="weui_btn weui_btn_plain_default close-trigger">取 消</a>
        </div>
        <div class="right button-container">
            <a class="weui_btn weui_btn_primary submit-publish-trigger" href="javascript:">发 布</a>
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


<!--分享样式-->
<div class="page hidden" id="page_share">
    <div class="weui_mask_transition weui_fade_toggle close-trigger"></div>
    <div class="share-tips close-trigger">
        <img src="http://static.dnrcdn.com/images/share.png" width="200" />
    </div>
</div>

<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
wx.config({
    debug: false,
    appId: 'wxd1bf431ddd800374',
    timestamp: 1510885696,
    nonceStr: 'rand_5a0e4940e91a9',
    signature: '79b1a551d202e7e3156db9d57020cc94679620a6',
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
        title: '表白墙', // 分享标题
        link: window.location.href, // 分享链接
        imgUrl: 'http://simg.dnrcdn.com/topic/2016/03/23/18405656f272b8ec4fd.jpg!200', // 分享图标
        success: function() {},
        cancel: function() {}
    });
            wx.onMenuShareAppMessage({
        title: '表白墙', // 分享标题
        desc: '在这里记录对Ta的爱', // 分享描述
        link: window.location.href, // 分享链接
        imgUrl: 'http://simg.dnrcdn.com/topic/2016/03/23/18405656f272b8ec4fd.jpg!200', // 分享图标
        type: '', // 分享类型,music、video或link，不填默认为link
        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
        success: function() {},
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
</script><script>
var pagerOptions = {
    page:1,
    requestUrl:'/forum/confession/search?name=%E9%A2%96',
    requestParams:{
        id:10002,
        format:'json'
    },
    checkBeforeRequest:function() {
        return $('#page').css('display')==='block';
    },
    beforeRequest:function(pager) {
        $('#bottom_pager').show().find('.pager-text').html('正在加载中...');
    },
    success:function(pager, r) {
        if(r.code===1) {
            if(r.result.htmls) {
                var html = '';
                for (var k in r.result.htmls) {
                    html += r.result.htmls[k];
                }
                $('#thread_list_new').append(html);
            }

            if(r.result.noMore===1) {
                pager.noMore = true;
                $('#bottom_pager').show().find('.pager-text').html('没有更多帖子了');
            } else {
                $('#bottom_pager').hide();
            }
        } else {
            $('#bottom_pager').hide();
            Modal.showTips(r.msg);
        }
        pager.loading = false;
    },
    error:function(pager) {
        // Modal.showTips('抱歉, 由于网络错误无法加载数据...请稍后再试');
        $('#bottom_pager').hide();
        pager.loading = false;
    }
};
$(function(){
    $('#search_input').on('focus', function(){
        //searchBar
        var $weuiSearchBar = $('#search_bar');
        $weuiSearchBar.addClass('weui_search_focusing');
    }).on('blur', function(){
        var $weuiSearchBar = $('#search_bar');
        $weuiSearchBar.removeClass('weui_search_focusing');
        if($(this).val()){
            $('#search_text').hide();
        }else{
            $('#search_text').show();
        }
    }).on('input', function(){
        var $searchShow = $("#search_show");
        if($(this).val()){
            $searchShow.show().find('.search-tips').html('点我搜索 '+$(this).val()+' 收到的表白');
        }else{
            $searchShow.hide();
        }
    });
    $("#search_show").on('click', function(){
        window.location.href='/forum/confession/search?name='+$('#search_input').val();
    });
    $("#search_cancel").on('touchend', function(){
        $("#search_show").hide();
        $('#search_input').val('');
    });
    $("#search_clear").on('touchend',function(){
        $("#search_show").hide();
        $('#search_input').val('');
    });
    
    PageManager.bindEvents('#page',Events.usual)
            .bindEvents('#page_publish',Events.publish)
            .setDropdownLoad({
                loadData:function(api) {
                    //window.location.hash = '';//解决微信有时候不刷新的问题
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
