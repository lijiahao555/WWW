<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0096)http://cart.wbiao.cn/success?order_id=102338&payment_id=2&token=846a32919ddd22bffc6d85fa1781e2d6 -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>订单提交成功_喜悦手表网</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8">
<base href="<?php echo base_url('public/') ?>" />
<link rel="stylesheet" href="css/2.css">
<!--[if lte IE 6]>
<link rel="stylesheet" href="http://qd.wbiao.cn/src2/css/common/3.0/ie6.css?t=201307300952">
<![endif]-->
</head>

<body style="">
<div id="member_info2"></div>
<div id="header">
    <div class="top">
    <ul>
        <li id="member_info"><a href="#" title="登录" rel="nofollow">你好程序猿</a><span>&nbsp;|&nbsp;</span><!-- <a href="#" title="注册" rel="nofollow">注册</a> --></li>
        <li>&nbsp;|&nbsp;</li>
        <li><a href="#" rel="nofollow" title="我的订单">我的订单</a></li>
        <li>&nbsp;|&nbsp;</li>
        <li class="s__center"><a class="link_center" href="#" rel="nofollow" title="会员中心">会员中心&nbsp;<span class="s__arrow_red_down">&nbsp;</span></a>
            <div id="user_menu_list">
                <p>您好! 进入会员中心请先<a href="#" >&nbsp;登录&nbsp;</a>或<a href="#" >&nbsp;注册&nbsp;</a></p>
            </div>
        </li>
        <li>&nbsp;|&nbsp;</li>
        <li class="s__clearing"><div class="s__cart"><a href="#" rel="nofollow">去购物车结算&nbsp;<span class="s__arrow_red_down">&nbsp;</span></a></div></li>
    </ul>
    </div> 
    <div class="w750 mt30 fr">
        <ul class="m_0_23 inline w464 fr li_left li">
            <li class="w14 h14 circle bp_0-36"></li>
            <li class="w136 h8 mt6 bt_2_f1f">&nbsp;</li>
            <li class="w14 h14 circle bp_0-36"></li>
            <li class="w136 h8 mt6 bt_2_f1f">&nbsp;</li>
            <li class="w14 h14 circle bp_0-36"></li>
            <li class="w136 h8 mt6 bt_2_f1f">&nbsp;</li>
            <li class="w14 h14 circle bp_0-19"></li>
        </ul>
        <ul class="w510 mt10 fr li_left li">
            <li class="w60 bold f14 cd00">选购商品</li>
            <li class="w90">&nbsp;</li>
            <li class="w60 bold f14 c666">提交订单</li>
            <li class="w90">&nbsp;</li>
            <li class="w60 bold f14 c666">支付订单</li>
            <li class="w90">&nbsp;</li>
            <li class="w60 bold f14 c666">等待签收</li>
        </ul>
    </div>
    <h1><br /><img src="css/images/LOGO.png" /></h1>
</div>


<script type="text/javascript">
$(function(){
    collection('a#collection');

    fcbox("#login_now", true); //登录弹窗
});

function collection(id){
    $(id).click(function(){
        var goods_id = $(this).attr('oprid');
        $.post(www_domain + "/user/collection", { is_ajax : 1, ids : goods_id, collection : 1 },
                function(result){
                    alert(result);
        }, "json");
    });
}

var refresh_gift_card_list = function(){};

function pop_login(){
    $("#login_now").trigger("click");
}

</script>
<div id="main">
    <div class="w930 m0a mt30">
        <div class="ml20">
        <br> 
            <!-- <b class="f16">购物车：</b>
                  
                        
            <span class="c999">购物车信息将一直为您保存</span> -->
        </div>
        <div class="bgf6f br10">
                                    <ul class="c999 f13 h40 mt10 li_left">
                <li class="w510 tl pl20">商品</li>
                <li class="w120 tc">售价</li>
                <li class="w120 tc">数量</li>
                <li class="w80 tr pr64">操作</li>
            </ul>

                            <?php foreach ($data as $key => $v): ?>
                                <ul class="bt_1_eae bb_1_fff" id="goods_line_548546"></ul>
                <ul class="999 f13 h120 li_left" id="goods_list_548546">
                    <li class="w510 tl pl20">
                                <a href="#" target="_blank" class="fl">
                                                        <img src="images/12443_S01_97254.jpg" width="100px" height="100px" class="m_10_20_10_0" alt="">
                        </a>
                        <a href="#" target="_blank">
                            <span class="w390 bold c333 fl h20 mt35"><?php echo $v['y_shop_name'] ?></span>
                        </a>
                    </li>
                    <li class="w120 tc">
                        <span class="bold ccf0 f16">￥<?php echo $v['y_shop_price'] ?></span>
                    </li>
                    <li class="w120 tc">
                                                    <span class="btne3d w18 h22 inbl re-t0-l5 ie-t1_m50 ie_mi" oprtype="minus" oprid="548546">—</span>
                            <input type="text" id="goods_number_548546" name="goods_number" maxlength="4" size="2" value="1" class="b_1_e5e p_0_5 tc w28 h20 ie-t1_m50 ie_mi goods_number c000 bold" oprid="548546" oprnum="1">
                            <span class="btne3d w18 h22 inbl re_t0-l5 ie-t1_m50 ie_mi" oprtype="add" oprid="548546">+</span>
                                                                    </li>
                    <li class="w100 tr">
                        <a href="javascript:void(0)" id="collection" oprid="25523" class="ul">收藏</a>
                        <a href="javascript:void(0)" data="548546" class="ul delete">删除</a>
                    </li>
                </ul>
                            <?php endforeach ?>
            

            <ul class="bt_1_eae bb_1_fff"></ul>

            
            <!-- Cale 2014-03-13-->
            <div class="c999">
                <div class="fl w500">
                    <div class="m10">
                        折扣优惠：
                        <select id="" name="" onchange="javascript:if(this.value==122){pop_login();return false;}location.href=&#39;/index/select_activity?id=&#39;+this.value;">
                            <option value="-1">----- 选择参与的活动折扣形式 -----</option>
                        <option value="124">兴业银行活动</option>
<option value="123">招行特惠活动：最高立减2000元！</option>
                        </select>
                    </div>
                </div>
                            </div>


            <div class="clear"></div>
        </div>
        <div class="w930 m0a">
            <div class="fl">
                <div class="mt50">
                    <a href="#" class="f14 bold c999 b_1_efe btnf7f w146 h40 fl tc">继续购物</a>
                </div>
            </div>
            <div class="fr">
                <div class="tc cd00 mt20">
                    <span class="f13 bold">商品总额：￥</span>
                    <span class="f20" id="goods_amount">
                        <?php echo array_sum($price) ?>
                    </span>
                </div>
                
                <div class="mt20 tr">
                    <input type="hidden" id="all_has_stock" value="1">
                <a rel="nofollow" id="real_checkout_now" href="http://cart.wbiao.cn/user/index/pop_login" class="iframe" style="display:none;">检查登录</a>
                <input onclick="location.href=&#39;/order&#39;;" type="submit" class="btnd00 w146 h40 f16 bold" onmouseover="this.className=&#39;btnd00Hover w146 h40 f16 bold&#39;" onmouseout="this.className=&#39;btnd00 w146 h40 f16 bold&#39;" value="去结算" />
                </div>
                <div class="mt10">
                    <span class="c999">结算后可选择礼品或使用优惠券等操作</span>
                </div>
            </div>
                    </div>
    </div>
</div>
<div id="dsp" style="display:none;">
<script type="text/javascript">
var _mvq = _mvq || [];
_mvq.push(['$setAccount', 'm-25646-0']);
_mvq.push(['$setGeneral', 'cartview', '', '', '0']);
_mvq.push(['$logConversion']);
_mvq.push(['$addItem', '', '25523', '','']);
_mvq.push(['$logData']);
</script>
</div>
<link rel="stylesheet" href="css/fancybox.css" type="text/css">
<script type="text/javascript" src="Script/fancybox.js"></script>
<div id="kfs" style="display: none; ">
  <div class="context"> <a href="javascript:void(0);" onclick="javascript:NTKF.im_openInPageChat(&#39;kf_9988_1341905703263&#39;);_gaq.push([&#39;_trackEvent&#39;,&#39;kefuxiaochuang&#39;, &#39;tousu&#39;, location.href]);" class="show" title="打开" rel="nofollow">&nbsp;</a> </div>
</div>
<script type="text/javascript">
$(function(){
  KFHover('.context span');
});
function KFHover(ipt){
    $(ipt).hover(function(){
        var cls     = $(this).attr('class');
        var css  = cls.substr(cls.lastIndexOf("kf_btn"), 8) ;
        $(this).removeClass(css).addClass(css + 'Hover');
    },function(){
        var cls     = $(this).attr('class');
        var css  = cls.substr(cls.lastIndexOf("kf_btn"), 8);
        $(this).removeClass(css + 'Hover').addClass(css);
    });
}
</script>

<div id="footer">
  <div class="info">
    <p class="copyright">                喜悦名表 版权所有  Copyright 2014-2015 www.xxxxxxx.cn . LTD ALL RIGHT RESERVED.

    </p>
  </div>
</div>
</body>
</html>