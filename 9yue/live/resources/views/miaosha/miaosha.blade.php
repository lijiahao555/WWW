<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>kill</title>
<link href="{{ URL::asset('/public2/css/webPublic.css') }}" rel="stylesheet"/>
<link href="{{ URL::asset('/public2/css/kill_new.css') }}" rel="stylesheet"/>
<link href="{{ URL::asset('/public2/css/iconfont.css') }}" rel="stylesheet"/>
<script type="text/javascript" src="{{ URL::asset('/public2/js/jquery-1.10.1.min.js') }}"></script>
<script>


//产品选项卡
$(function(){
	$(".kill_connt .kill_connt_left .connt_left_time").each(function(index, element) {
        var kill_num=$(this).index(".kill_connt .kill_connt_left .connt_left_time");
		$(".kill_connt .kill_connt_left .connt_left_time").eq(kill_num).click(function(){
			$(".kill_connt .kill_connt_left .connt_left_time").removeClass("add_1").eq(kill_num).addClass("add_1");
			$(".kill_connt .kill_connt_left .connt_left_time h1").removeClass("add_2").eq(kill_num).addClass("add_2");
			$(".kill_connt .kill_connt_left .connt_left_time h2").removeClass("add_2").eq(kill_num).addClass("add_2");
			$(".kill_connt .kill_connt_right .connt_right_list").css("display","none").eq(kill_num).css("display","block");
			})
    });

	})
	//弹出层封装函数，需要时调用即可。
	// function kill_tanchu(){
	// 	$(".kill_tanchu").css("display","block");
	// 	$(".kill_tanchu .kill_offnew").click(function(){
	// 		$(".kill_tanchu").css("display","none");
	// 		})
	// 	}
</script>
<script src="{{ URL::asset('public/jquery.js') }}"></script>
<script>
$(document).ready(function() {
    $('#div').children('div').eq(0).attr('style', 'display:block;');
    $.ajax({
        url: 'url',
        type: 'get',
        dataType: 'json',
        success:function(msg){
            $('.url').attr('href',msg['url']);
        }
    })
});
</script>
<script>
//榜单部分
	(function($){ 
$.fn.extend({ 
newsList:function(options){ 
var defaults ={ 
actName:'li', //显示条数名； 
maxShowNum:'6', //最多的显示条数； 
actNameH:'28', //一次移动的距离； 
ulClass:'.ul_news_list', //被复制层的class 
copyUlClass:'.ul_news_list2', //复制层的class 
autoTime:'800', //自动运行时间； 
clickGoUpC:'.go_uplist', //点击向上class; 
clickDownUpC:'.go_downlist', //点击向下class; 
goStart:'go_tart', 
autoCloss:'flase' //自动运行开关,当为'flase'时为开，其它则关； 
} ; 

options = $.extend(defaults, options); 
return this.each(function(){ 
var o = options; 
var counts =1; 
var linum = $($(this).find(o.actName),$(this)).size(); 
var ul_class = $($(this).find(o.ulClass),$(this)); 
var copy_ul_class = $($(this).find(o.copyUlClass),$(this)); 
var click_go_up_c = $($(this).find(o.clickGoUpC),$(this)); 
var click_go_down_C = $($(this).find(o.clickDownUpC),$(this)); 
var go_start = $($(this).find(o.goStart),$(this)); 
if(linum > o.maxShowNum){ 
$(copy_ul_class).html($(ul_class).html()); 
goStartList(); 
} 
var thiswrap = $($(ul_class).parent().parent(),$(this)); 
//自动运行函数 
function auto_function(){ 
if(counts <= linum){ 
$(ul_class).animate({top:'-=' + o.actNameH},o.autoTime); 
$(copy_ul_class).animate({top:'-=' + o.actNameH},o.autoTime); 
counts++; 
}else{ 
$(ul_class).animate({top:0},0); 
$(copy_ul_class).animate({top:0},0); 
counts = 1; 
} 
} 
//点击向上移动时； 
/*if(linum > o.maxShowNum){ 
$(click_go_up_c).click(function(){ 
if(counts <= linum){ 
$(ul_class).animate({top:'-=' + o.actNameH},0); 
$(copy_ul_class).animate({top:'-=' + o.actNameH},0); 
counts++; 
}else{ 
$(ul_class).animate({top:0},0); 
$(copy_ul_class).animate({top:0},0); 
counts = 1; 
} 
}); 
} */
//点击向下移动时； 
/*if(linum > o.maxShowNum){ 
$(click_go_down_C).click(function(){ 
if(counts > 1){ 
counts--; 
$(ul_class).animate({top:'-'+ counts*o.actNameH},0); 
$(copy_ul_class).animate({top:'-'+ counts*o.actNameH},0); 
}else{ 
$(ul_class).animate({top:0},0); 
$(copy_ul_class).animate({top:0},0); 
counts = linum+1; 
} 
}); 
} */
//鼠标经过所发生的开始停止； 
if(linum > o.maxShowNum){ 
$(thiswrap).hover(function(){ 
goStopList(); 
},function(){ 
goStartList(); 
}); 
} 
function goStartList(){ 
if(o.autoCloss === 'flase'){ 
go_start = setInterval(auto_function,o.autoTime); 
} 
} 
function goStopList(){ 
clearInterval(go_start); 
} 
}); 
} 
}); 
}(jQuery)); 
</script> 
</head>

<body>
<script language="javascript"> 
$(document).ready(function(){ 
$("#newslist").newsList(); 
}); 
</script> 
<div class="kill_top"></div>
<div class="kill_time"><img src="{{ URL::asset('/public2/img/pckill_time_03.jpg') }}"/></div>
<div class="kill_time_line"><img src="{{ URL::asset('/public2/img/kill_time_line_07.jpg') }}"/></div>

<!--产品添加部分-->
<div class="kill_connt ly_clear">
	<div class="kill_connt_left ly_fl">
    	<div class="connt_left_time add_1">
        	<h1 class="add_2">9:30-10.30</h1>
            <h2 class="add_2">开始抢购</h2>
        </div>
        <p></p>
        <div class="connt_left_time">
        	<h1 class="add_3">12:00-12:30</h1>
            <h2 class="add_3">开始抢购</h2>
        </div>
        <p></p>
        <div class="connt_left_time">
        	<h1>13:30</h1>
            <h2>以结束</h2>
        </div>
        <p></p>
        <div class="connt_left_time">
        	<h1>15:30</h1>
            <h2>以结束</h2>
        </div>
        <p></p>
    </div>
    <div class="kill_connt_right ly_fl" id="div">
        @foreach($data as $key => $val)
        <div class="connt_right_list ly_clear">
            <div class="right_list_pic ly_fl">
                <a href="javascript:;"><img width="408" height="408" src="http://localhost/8yue/iwebshop4.7/{{ $val['img'] }}"/></a>
            </div>
            <div class="right_list_yuan ly_fl">
                <span class="iconfont">&#xe60e;</span>
                <div class="list_name">{{ $val['name'] }}</div>
                <div class="list_yiyuan"><img src="{{ URL::asset('/public2/img/qianggoujia_06.jpg') }}" desa/></div>
                <div class="list_yuanjia">{{ $val['market_price'] }}</div>
                <div class="list_buton" ><a href="list/" class="url">立即抢单</a></div>
                <div class="list_idxian" disabled>*每个ID限量一件</div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!--优惠劵部分-->
<div class="kill_juan ly_clear">
	<div class="juan_pic ly_fl"><img src="{{ URL::asset('/public2/img/kill_juan_11.png') }}"/></div>
    <div class="juan_pic_jia ly_fl">
    	<img src="{{ URL::asset('/public2/img/kill_juan_13.png') }}"/>
        <p>原价：1001.00元</p>
        <div class="juan_qiang">立即抢单</div>
    </div>
</div>

<div class="kill_detail_pic"><img src="{{ URL::asset('/public2/img/kill_detail_17.png') }}"/></div>
<div class="kill_detail_bg">
	<div class="kill_detail_bg_biao ly_clear">
   		<p><span class="iconfont">&#xe610;</span></p>
        <p class="p_jiantou"><span class="iconfont jiantou">&#xe60c;</span></p>
        <p><span class="iconfont">&#xe60b;</span> </p>
        <p class="p_jiantou"><span class="iconfont jiantou">&#xe60c;</span></p>
        <p><span class="iconfont">&#xe60d;</span></p>
        <p class="p_jiantou"><span class="iconfont jiantou">&#xe60c;</span></p>
        <p><span class="iconfont">&#xe60f;</span></p>
    </div>
	<div class="kill_canjia ly_clear">
    	<div class="kill_canjia_pic ly_fl"><img src="{{ URL::asset('/public2/img/kill_canjia_20.jpg') }}"/></div>
        <div class="kill_canjia_word ly_fl">
       		<h1>1、进入秒拍活动页面。</h1> 
            <h1>2、点击【立即抢单】，抢购成功后，在订单页面填写收货地址并进行网上支付。</h1>
            <h1>3、为迎接十一国庆节，本公司为回报广大用户特推出1001元代金券，仅限净水产品使用。</h1>
        </div>
    </div>
    <p class="kill_tongzhi">*紧急通知：因秒拍活动订单剧增，小清新统一发货时间改为9月26日，由此给您带来的不便尽请谅解。</p>
</div>
<div class="kill_huodong"><img src="{{ URL::asset('/public2/img/kill_line_25.jpg') }}"/></div>
<div class="kill_huodong_nei">
	<h2>1、本次活动购买的是实物商品，客户下单过程中请填写准确的收货地址，以免货物无法送达。</h2>
    <h2>2、活动期间，每日9:30、12:30、13:30、15:30、19：30点开始抢单，售完为止。</h2>
    <h2>3、抢购商品成功者，需在10分钟内支付，尚未支付者其订单将被取消。</h2>
    <h2>4、活动期间，秒拍产品将在开始抢单后随机投放，凡通过非商业手段下单成功者。本公司将追究其法律责任，并不予以发货、退款。</h2>
    <h2>5、本次活动每个ID限抢购商品一件。</h2>
    <h2>6、凡幸运用户抢购成功者，本公司将于10日内根据您提供的送货地址快递给你（邮费自理）。</h2>
    <h2>7、价值1001元的超值代金券，每天仅限5张，先到先得，仅限净水产品使用。</h2>
    <h2>8、本次活动最终解释权归东研所有。</h2>
</div>
<div class="kill_bang"><img src="{{ URL::asset('/public2/img/kill_line_bang.jpg') }}"/></div>

<!--榜单部分-->
<div class="kill_new_top">
	<span>姓名</span>
	<span class="news_span1">电话</span>
    <span class="news_span1">抢购产品</span>
</div>
<div id="newslist"> 
<!--<div class="go_upanddown"><span class="go_uplist"><img src="images/newslist/goupbtn.gif" /></span><span class="go_downlist"><img src="images/newslist/godownbtn.gif" /></span></div> -->
    <div class="news_list_bar"> 
        <ul class="ul_news_list"> 
            <li><span class="list_span1">张*轩</span><span class="list_span2">135****6931</span><span class="list_span3">Q2空气净化器</span></li> 
            <li><span class="list_span1">余*</span><span class="list_span2">157****3440</span><span class="list_span3">小型负离子空气净化器</span></li> 
            </ul> 
        <ul class="ul_news_list2"></ul> 
    </div> 
</div>

<!--gif图像-->
<div class="kill_ditu"><img src="{{ URL::asset('/public2/img/ditu.gif') }}"/></div>

<!--更多产品部分-->
<div class="kill_bao">
	<p><a href="javascript:;">更多商品>></a></p>
</div>
<div class="kill_baokuan ly_clear">
	<div class="bao_kuan_deail ly_fl">
   		<p><a href="javascript:;"><img src="{{ URL::asset('/public2/img/kill_baokuan_05.jpg') }}"/></a></p>
        <h1>东研蓝钻净水机</h1> 
        <h2>5口之家饮用安心净水</h2>
        <h3>3680.00元</h3>
        <h4>立即抢单</h4>
    </div>

</div>
<!--弹出层部分-->
<div class="kill_tanchu">
	<img src="{{ URL::asset('/public2/img/kill_tanchu_03.png') }}"/>
    <div class="kill_offnew">X</div>
</div>
</body>
</html>