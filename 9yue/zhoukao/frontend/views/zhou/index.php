<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<meta charset="utf8">

<style>
table{ border-collapse: collapse; border: 1px solid #ddd; width: 800px; margin: 0 auto;margin-top: 50px; background: rgba(121, 217, 221, 0.4); color: #666}
table tr{ height: 40px;}
table td{ border: 1px solid #ddd; text-align: center}

*{margin: 0; padding:0 ; font-family: 微软雅黑}
a{ text-decoration: none; color: #666;}
ul{ list-style: none}

.top{ width: 100%; text-align: center;}
.top h2{ margin-top: 50px;}

form{ width: 450px; margin: 0 auto; margin-top: 50px;}
form input{
    width: 300px;
    height: 40px;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding-left: 5px;
    font-size: 14px;
}

form p{
    margin-top: 20px;
    width: 100%;
}

form span{
    width: 100px;
    text-align: right;
    display: inline-block;
}

.where .a_button{
    width: 50px;
    height: 20px;
    line-height: 20px;
    text-align: center;
    background: green;
    color: #fff;
    border: 1px solid green;
    border-radius: 5px;
    margin: 0 auto;
}

.where{
    width: 500px;
    margin: 0 auto;
    margin-top: 20px;
}

.where a{
    padding: 5px;
    border: 1px solid rgba(0, 150, 0, 0.55);
    border-radius: 3px;
    white-space:nowrap;
    display: inline-block;
    margin-top: 10px;
    margin-left: 10px;
    color: #666;
}

.where .a_selected{
    background: rgba(0, 150, 0, 0.55);
    color: #fff;
}

.where li{
    height: 60px;
}

.where span{
    font-size: 18px;
}

.where input{
    width: 100px;
    height: 30px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-left: 10px;
}

.where .senior_where{
    height: auto;
}

.where .senior_where p{
    padding-left: 0px;
}

.where .senior_where p span{
    font-size: 14px;
    width: 100px;
    text-align: right;
    display: inline-block;
}

.house_list{
    width: 500px;
    margin: 0 auto;
    margin-top: 50px;
}

.house_list li{
    margin-top: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 5px;
}

.house_img{
    float: left;
}

.house_desc{
    float: right;
}

.house_img img{
    width: 100px;
    height: 100px;
}

.house_content{
    width: 380px;
    word-wrap: break-word;
}

.house_desc .house_title{
    font-weight: bold;
}

.house_price{
    margin-top: 15px;
}

.house_tags{
    margin-top: 10px;
}

.house_tags a{
    color: #000;
    border: 1px solid #99dd92;
    padding: 2px 5px;
}
</style>

<div class="top">
    <h2>房源筛选</h2>
</div>

<div class="main">
    <ul class="where">
        <li class="address">
            <span>区域：</span>
            <?php
	            if (isset($address)) {
	            	switch ($address) {
		            	case '全部':
		            		echo '<a href="javascript:void(0);" class="a_selected">全部</a>
						          <a href="javascript:void(0);">东城</a>
						          <a href="javascript:void(0);">西城</a>
						          <a href="javascript:void(0);">海淀</a>';
		            	break;
		            	case '东城':
		            		echo '<a href="javascript:void(0);">全部</a>
						          <a href="javascript:void(0);" class="a_selected">东城</a>
						          <a href="javascript:void(0);">西城</a>
						          <a href="javascript:void(0);">海淀</a>';
		            	break;
		            	case '西城':
		            		echo '<a href="javascript:void(0);">全部</a>
						          <a href="javascript:void(0);">东城</a>
						          <a href="javascript:void(0);" class="a_selected">西城</a>
						          <a href="javascript:void(0);">海淀</a>';
		            	break;
		            	case '海淀':
		            		echo '<a href="javascript:void(0);">全部</a>
						          <a href="javascript:void(0);">东城</a>
						          <a href="javascript:void(0);">西城</a>
						          <a href="javascript:void(0);" class="a_selected">海淀</a>';
		            	break;
		            }
	            }else{
	            	echo '<a href="javascript:void(0);" class="a_selected">全部</a>
			            <a href="javascript:void(0);">东城</a>
			            <a href="javascript:void(0);">西城</a>
			            <a href="javascript:void(0);">海淀</a>';
	            }
            ?>
        </li>
        <li class="time">
            <span>排序：</span>
            <?php
            	if (isset($time)) {
            		switch ($time) {
            			case 'time':
            				echo '<a href="javascript:void(0);" class="a_selected">按时间排序</a>
            					  <a href="javascript:void(0);">按价格排序</a>';
            				break;
            			case 'money':
            				echo '<a href="javascript:void(0);">按时间排序</a>
            					  <a href="javascript:void(0);" class="a_selected">按价格排序</a>';
            				break;
            		}
            	} else {
            		echo '<a href="javascript:void(0);" class="a_selected">按时间排序</a>
            			  <a href="javascript:void(0);">按价格排序</a>';
            	}
             ?>
        </li>
        <li>
            <span>价格：</span>
            <input type="text" id="begin" value="<?=isset($begin) ? $begin : ''; ?>"> ~ <input type="text" id="stop" value="<?=isset($stop) ? $stop : ''; ?>">
            <a class="a_button" href="javascript:void(0);" style="height: 30px;">搜索</a>
        </li>
        <li class="senior_where">
            <span>高级筛选：</span>
            <a href="javascript:void(0);" id="res" class="a_selected">重置</a>
            <p id="type">
                <span>房屋类型：</span>
                <a href="javascript:void(0);" data='1'>酒店式公寓</a>
                <a href="javascript:void(0);" data='0'>小区式公寓</a>
            </p>
            <p id="is_int">
                <span>出租方式：</span>
                <a href="javascript:void(0);" data="1">整租</a>
                <a href="javascript:void(0);" data="0">合租</a>
            </p>
            <p id="num">
                <span>居室：</span>
                <a href="javascript:void(0);" data="1">一室</a>
                <a href="javascript:void(0);" data="2">二室</a>
                <a href="javascript:void(0);" data="3">三室</a>
                <a href="javascript:void(0);" data="4">四室</a>
            </p>
            <p id="config">
                <span>特色配置：</span>
                <a href="javascript:void(0);">独立阳台</a>
                <a href="javascript:void(0);">独立卫浴</a>
                <a href="javascript:void(0);">空调</a>
                <a href="javascript:void(0);">WiFi</a>
            </p>
        </li>
    </ul>
    <div class="house_list">
        <ul id="data">
            <?php foreach ($data as $key => $v): ?>
            	<li>
	                <div class="house_img">
	                    <img src="./a.png" alt="">
	                </div>
	                <div class="house_desc">
	                    <p class="house_title"><?=$v['name'] ?></p>
	                    <p class="house_content">
	                        &nbsp;&nbsp;&nbsp;&nbsp;xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	                    </p>
	                    <p class="house_tags">
	                    	<?php if (isset($v['type'])): ?>
	                    		<?php if ($v['type'] == 1): ?>
	                    			<?='酒店式公寓'; ?>
	                    		<?php else: ?>
	                    			<?='小区式公寓' ?>
	                    		<?php endif ?>
	                    	<?php endif ?>
	                    	<?php if (isset($v['is_int'])): ?>
	                    		<?php if ($v['is_int'] == 1): ?>
	                    			<?='整租'; ?>
	                    		<?php else: ?>
	                    			<?='合租' ?>
	                    		<?php endif ?>
	                    	<?php endif ?>
	                    	<?php if (isset($v['num'])): ?>
	                    		<?php
	                    			switch ($v['num']) {
	                    				case '1':
	                    					echo '一居';
	                    					break;
	                    				case '2':
	                    					echo '二居';
	                    					break;
	                    				case '3':
	                    					echo '三居';
	                    					break;
	                    				case '4':
	                    					echo '四居';
	                    					break;
	                    			}
	                    		 ?>
	                    	<?php endif ?>
	                    	<?php if (isset($v['config'])): ?>
	                    		<?=$v['config']; ?>
	                    	<?php endif ?>
	                    </p>
	                    <p class="house_price">
	                        价格：￥<span style="margin-right:20px;"><?=$v['money']?></span>

	                        时间：<span><?=date('Y-m-d H:i:s',$v['time'])?></span>
	                    </p>
	                </div>
	                <div style="clear:both"></div>
	            </li>
            <?php endforeach ?>
        </ul>

    </div>


</div>
<div id="page" align="center">
				<?= LinkPager::widget([
					    'pagination' => $pagination,
					    'nextPageLabel' => '下一页',
    					'prevPageLabel' => '上一页',
    					// 'nextPageLabel' => false,
    // 'prevPageLabel' => false,
					    'firstPageLabel' => '首页',
					    'lastPageLabel' => '尾页',
					    'maxButtonCount'=>0,
					    'hideOnSinglePage' => false,
				]);

				?>
			</div>


<script src="./jquery.js"></script>
<script>
	$(document).on('click', '.address a', function() {
		$('.address a').attr('class','')
		$(this).attr('class','a_selected');
		var address = $(this).text();
		var time = $('.time a.a_selected').text();
		var begin = $('#begin').val()
		var stop = $('#stop').val()


		$('.last').children('a').attr('href', '/9yue/zhoukao/frontend/web/index.php?r=zhou/index&page='+(parseInt($('.last').children('a').attr('data-page'))+1)+'&address='+address+'&time='+time+'&begin='+begin+'&stop='+stop );
		$('.next').children('a').attr('href', '/9yue/zhoukao/frontend/web/index.php?r=zhou/index&page='+(parseInt($('.next').children('a').attr('data-page'))+1)+'&address='+address+'&time='+time+'&begin='+begin+'&stop='+stop );
		$('.prev').children('a').attr('href', '/9yue/zhoukao/frontend/web/index.php?r=zhou/index&page='+(parseInt($('.prev').children('a').attr('data-page'))+1)+'&address='+address+'&time='+time+'&begin='+begin+'&stop='+stop );
		$('.first').children('a').attr('href', '/9yue/zhoukao/frontend/web/index.php?r=zhou/index&page='+(parseInt($('.first').children('a').attr('data-page'))+1)+'&address='+address+'&time='+time+'&begin='+begin+'&stop='+stop );


		var str = '';
		$.ajax({
		url: "<?=Url::to(['zhou/add'])?>",
		type: 'get',
		dataType: 'json',
		data: {address:address,time:time},
		success:function(msg){
			for(k in msg['data']){
				str += '<li>\
		                <div class="house_img">\
		                    <img src="./a.png" alt="">\
		                </div>\
		                <div class="house_desc">\
		                    <p class="house_title">'+msg['data'][k].name+'</p>\
		                    <p class="house_content">\
		                        &nbsp;&nbsp;&nbsp;&nbsp;xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\
		                    </p>\
		                    <p class="house_tags">\
	                    		<span>'+msg['data'][k].type+'</span>\
	                    		<span>'+msg['data'][k].is_int+'</span>\
	                    		<span>'+msg['data'][k].num+'</span>\
	                    		<span>'+msg['data'][k].config+'</span>\
	                    </p>\
		                    <p class="house_price">\
		                        价格：￥<span style="margin-right:20px;">'+msg['data'][k].money+'</span>\
		                        时间：<span>'+msg['data'][k].time+'</span>\
		                    </p>\
		                </div>\
		                <div style="clear:both"></div>\
		            </li>';
				}
				$('#data').html(str)
			}
		})
	});

	$(document).on('click', '.time a', function() {
		$('.time a').attr('class','')
		$(this).attr('class','a_selected');

		var address = $('.address a.a_selected').text();
		var time = $(this).text();
		var begin = $('#begin').val()
		var stop = $('#stop').val()

		$('.last').children('a').attr('href', '/9yue/zhoukao/frontend/web/index.php?r=zhou/index&page='+(parseInt($('.last').children('a').attr('data-page'))+1)+'&address='+address+'&time='+time+'&begin='+begin+'&stop='+stop );
		$('.next').children('a').attr('href', '/9yue/zhoukao/frontend/web/index.php?r=zhou/index&page='+(parseInt($('.next').children('a').attr('data-page'))+1)+'&address='+address+'&time='+time+'&begin='+begin+'&stop='+stop );
		$('.prev').children('a').attr('href', '/9yue/zhoukao/frontend/web/index.php?r=zhou/index&page='+(parseInt($('.prev').children('a').attr('data-page'))+1)+'&address='+address+'&time='+time+'&begin='+begin+'&stop='+stop );
		$('.first').children('a').attr('href', '/9yue/zhoukao/frontend/web/index.php?r=zhou/index&page='+(parseInt($('.first').children('a').attr('data-page'))+1)+'&address='+address+'&time='+time+'&begin='+begin+'&stop='+stop );


		var str = '';
		$.ajax({
		url: "<?=Url::to(['zhou/add'])?>",
		type: 'get',
		dataType: 'json',
		data: {address:address,time:time},
		success:function(msg){
			page = msg["pagination"];
			for(k in msg['data']){
				str += '<li>\
		                <div class="house_img">\
		                    <img src="./a.png" alt="">\
		                </div>\
		                <div class="house_desc">\
		                    <p class="house_title">'+msg['data'][k].name+'</p>\
		                    <p class="house_content">\
		                        &nbsp;&nbsp;&nbsp;&nbsp;xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\
		                    </p>\
		                    <p class="house_tags">\
	                    		<span>'+msg['data'][k].type+'</span>\
	                    		<span>'+msg['data'][k].is_int+'</span>\
	                    		<span>'+msg['data'][k].num+'</span>\
	                    		<span>'+msg['data'][k].config+'</span>\
	                    </p>\
		                    <p class="house_price">\
		                        价格：￥<span style="margin-right:20px;">'+msg['data'][k].money+'</span>\
		                        时间：<span>'+msg['data'][k].time+'</span>\
		                    </p>\
		                </div>\
		                <div style="clear:both"></div>\
		            </li>';
				}
				$('#data').html(str)
			}
		})
	});

	$(document).on('click', '.a_button', function() {
		var address = $('.address a.a_selected').text();
		var time = $('.time a.a_selected').text();
		var begin = $('#begin').val()
		var stop = $('#stop').val()
		var reg = /^[\d]+$/;
		if (!reg.test(begin)) {
			alert('必须是数字');
			return
		}
		if (!reg.test(stop)) {
			alert('必须是数字');
			return
		}


		$('.last').children('a').attr('href', '/9yue/zhoukao/frontend/web/index.php?r=zhou/index&page='+(parseInt($('.last').children('a').attr('data-page'))+1)+'&address='+address+'&time='+time+'&begin='+begin+'&stop='+stop );
		$('.next').children('a').attr('href', '/9yue/zhoukao/frontend/web/index.php?r=zhou/index&page='+(parseInt($('.next').children('a').attr('data-page'))+1)+'&address='+address+'&time='+time+'&begin='+begin+'&stop='+stop );
		$('.prev').children('a').attr('href', '/9yue/zhoukao/frontend/web/index.php?r=zhou/index&page='+(parseInt($('.prev').children('a').attr('data-page'))+1)+'&address='+address+'&time='+time+'&begin='+begin+'&stop='+stop );
		$('.first').children('a').attr('href', '/9yue/zhoukao/frontend/web/index.php?r=zhou/index&page='+(parseInt($('.first').children('a').attr('data-page'))+1)+'&address='+address+'&time='+time+'&begin='+begin+'&stop='+stop );

		var str = '';
		$.ajax({
			url: "<?=Url::to(['zhou/add'])?>",
			type: 'get',
			dataType: 'json',
			data: {address:address,time:time,begin:begin,stop:stop},
			success:function(msg){
				page = msg["pagination"];

				for(k in msg['data']){
					str += '<li>\
		                <div class="house_img">\
		                    <img src="./a.png" alt="">\
		                </div>\
		                <div class="house_desc">\
		                    <p class="house_title">'+msg['data'][k].name+'</p>\
		                    <p class="house_content">\
		                        &nbsp;&nbsp;&nbsp;&nbsp;xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\
		                    </p>\
		                    <p class="house_tags">\
	                    		<span>'+msg['data'][k].type+'</span>\
	                    		<span>'+msg['data'][k].is_int+'</span>\
	                    		<span>'+msg['data'][k].num+'</span>\
	                    		<span>'+msg['data'][k].config+'</span>\
	                    </p>\
		                    <p class="house_price">\
		                        价格：￥<span style="margin-right:20px;">'+msg['data'][k].money+'</span>\
		                        时间：<span>'+msg['data'][k].time+'</span>\
		                    </p>\
		                </div>\
		                <div style="clear:both"></div>\
		            </li>';
				}
				$('#data').html(str)
			}
		})
	});

	$(document).on('click', '#type a', function() {
		$('#type a').attr('class','')
		$(this).attr('class','a_selected');
		var address = $('.address a.a_selected').text();
		var time = $('.time a.a_selected').text();
		var begin = $('#begin').val();
		var stop = $('#stop').val();
		var type = $(this).attr('data');
		$('#type span').attr('data',type);

		$('.last').children('a').attr('href', '/9yue/zhoukao/frontend/web/index.php?r=zhou/index&page='+(parseInt($('.last').children('a').attr('data-page'))+1)+'&address='+address+'&time='+time+'&begin='+begin+'&stop='+stop+'&type='+type );
		$('.next').children('a').attr('href', '/9yue/zhoukao/frontend/web/index.php?r=zhou/index&page='+(parseInt($('.next').children('a').attr('data-page'))+1)+'&address='+address+'&time='+time+'&begin='+begin+'&stop='+stop +'&type='+type);
		$('.prev').children('a').attr('href', '/9yue/zhoukao/frontend/web/index.php?r=zhou/index&page='+(parseInt($('.prev').children('a').attr('data-page'))+1)+'&address='+address+'&time='+time+'&begin='+begin+'&stop='+stop +'&type='+type);
		$('.first').children('a').attr('href', '/9yue/zhoukao/frontend/web/index.php?r=zhou/index&page='+(parseInt($('.first').children('a').attr('data-page'))+1)+'&address='+address+'&time='+time+'&begin='+begin+'&stop='+stop+'&type='+type );


		var str='';
		$.ajax({
		url: "<?=Url::to(['zhou/adddo'])?>",
		type: 'get',
		dataType: 'json',
		data: {address:address,time:time,type:type},
		success:function(msg){

				for(k in msg['data']){
					str += '<li>\
		                <div class="house_img">\
		                    <img src="./a.png" alt="">\
		                </div>\
		                <div class="house_desc">\
		                    <p class="house_title">'+msg['data'][k].name+'</p>\
		                    <p class="house_content">\
		                        &nbsp;&nbsp;&nbsp;&nbsp;xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\
		                    </p>\
		                    <p class="house_tags">\
	                    		<span>'+msg['data'][k].type+'</span>\
	                    		<span>'+msg['data'][k].is_int+'</span>\
	                    		<span>'+msg['data'][k].num+'</span>\
	                    		<span>'+msg['data'][k].config+'</span>\
	                    </p>\
		                    <p class="house_price">\
		                        价格：￥<span style="margin-right:20px;">'+msg['data'][k].money+'</span>\
		                        时间：<span>'+msg['data'][k].time+'</span>\
		                    </p>\
		                </div>\
		                <div style="clear:both"></div>\
		            </li>';
				}
				$('#data').html(str);
			}
		})
	});

	$(document).on('click', '#is_int a', function() {
		$('#is_int a').attr('class','')
		$(this).attr('class','a_selected');
		var address = $('.address a.a_selected').text();
		var time = $('.time a.a_selected').text();
		var begin = $('#begin').val();
		var stop = $('#stop').val();
		var type = $('#type span').attr('data')
		var is_int = $(this).attr('data');

		$('#is_int span').attr('data',is_int);


		$('.last').children('a').attr('href', '/9yue/zhoukao/frontend/web/index.php?r=zhou/index&page='+(parseInt($('.last').children('a').attr('data-page'))+1)+'&address='+address+'&time='+time+'&begin='+begin+'&stop='+stop+'&type='+type+'&is_int='+is_int );
		$('.next').children('a').attr('href', '/9yue/zhoukao/frontend/web/index.php?r=zhou/index&page='+(parseInt($('.next').children('a').attr('data-page'))+1)+'&address='+address+'&time='+time+'&begin='+begin+'&stop='+stop+'&type='+type+'&is_int='+is_int );
		$('.prev').children('a').attr('href', '/9yue/zhoukao/frontend/web/index.php?r=zhou/index&page='+(parseInt($('.prev').children('a').attr('data-page'))+1)+'&address='+address+'&time='+time+'&begin='+begin+'&stop='+stop+'&type='+type+'&is_int='+is_int );
		$('.first').children('a').attr('href', '/9yue/zhoukao/frontend/web/index.php?r=zhou/index&page='+(parseInt($('.first').children('a').attr('data-page'))+1)+'&address='+address+'&time='+time+'&begin='+begin+'&stop='+stop+'&type='+type+'&is_int='+is_int );


		var str='';
		$.ajax({
		url: "<?=Url::to(['zhou/adddo'])?>",
		type: 'get',
		dataType: 'json',
		data: {address:address,time:time,is_int:is_int,type:type},
		success:function(msg){

				for(k in msg['data']){
					str += '<li>\
		                <div class="house_img">\
		                    <img src="./a.png" alt="">\
		                </div>\
		                <div class="house_desc">\
		                    <p class="house_title">'+msg['data'][k].name+'</p>\
		                    <p class="house_content">\
		                        &nbsp;&nbsp;&nbsp;&nbsp;xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\
		                    </p>\
		                    <p class="house_tags">\
	                    		<span>'+msg['data'][k].type+'</span>\
	                    		<span>'+msg['data'][k].is_int+'</span>\
	                    		<span>'+msg['data'][k].num+'</span>\
	                    		<span>'+msg['data'][k].config+'</span>\
	                    </p>\
		                    <p class="house_price">\
		                        价格：￥<span style="margin-right:20px;">'+msg['data'][k].money+'</span>\
		                        时间：<span>'+msg['data'][k].time+'</span>\
		                    </p>\
		                </div>\
		                <div style="clear:both"></div>\
		            </li>';
				}
				$('#data').html(str);
			}
		})
	});

	$(document).on('click', '#num a', function() {
		$('#num a').attr('class','')
		$(this).attr('class','a_selected');

		var address = $('.address a.a_selected').text();
		var time = $('.time a.a_selected').text();
		var begin = $('#begin').val();
		var stop = $('#stop').val();
		var type = $('#type span').attr('data')
		var is_int = $('#is_int span').attr('data')
		var num = $(this).attr('data');

		$('#num span').attr('data',num);



		var str='';
		$.ajax({
		url: "<?=Url::to(['zhou/adddo'])?>",
		type: 'get',
		dataType: 'json',
		data: {address:address,time:time,is_int:is_int,type:type,num:num},
		success:function(msg){

				for(k in msg['data']){
					str += '<li>\
		                <div class="house_img">\
		                    <img src="./a.png" alt="">\
		                </div>\
		                <div class="house_desc">\
		                    <p class="house_title">'+msg['data'][k].name+'</p>\
		                    <p class="house_content">\
		                        &nbsp;&nbsp;&nbsp;&nbsp;xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\
		                    </p>\
		                    <p class="house_tags">\
	                    		<span>'+msg['data'][k].type+'</span>\
	                    		<span>'+msg['data'][k].is_int+'</span>\
	                    		<span>'+msg['data'][k].num+'</span>\
	                    		<span>'+msg['data'][k].config+'</span>\
	                    </p>\
		                    <p class="house_price">\
		                        价格：￥<span style="margin-right:20px;">'+msg['data'][k].money+'</span>\
		                        时间：<span>'+msg['data'][k].time+'</span>\
		                    </p>\
		                </div>\
		                <div style="clear:both"></div>\
		            </li>';
				}
				$('#data').html(str);
			}
		})
	});

	$(document).on('click', '#config a', function() {
		$('#config a').attr('class','')
		$(this).attr('class','a_selected');

		var address = $('.address a.a_selected').text();
		var time = $('.time a.a_selected').text();
		var begin = $('#begin').val();
		var stop = $('#stop').val();
		var type = $('#type span').attr('data')
		var is_int = $('#is_int span').attr('data')
		var num = $('#num span').attr('data')
		var config = $(this).text();

		$('#config span').attr('data',config);



		var str='';
		$.ajax({
		url: "<?=Url::to(['zhou/adddo'])?>",
		type: 'get',
		dataType: 'json',
		data: {address:address,time:time,is_int:is_int,type:type,num:num,config:config},
		success:function(msg){

				for(k in msg['data']){
					str += '<li>\
		                <div class="house_img">\
		                    <img src="./a.png" alt="">\
		                </div>\
		                <div class="house_desc">\
		                    <p class="house_title">'+msg['data'][k].name+'</p>\
		                    <p class="house_content">\
		                        &nbsp;&nbsp;&nbsp;&nbsp;xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\
		                    </p>\
		                    <p class="house_tags">\
	                    		<span>'+msg['data'][k].type+'</span>\
	                    		<span>'+msg['data'][k].is_int+'</span>\
	                    		<span>'+msg['data'][k].num+'</span>\
	                    		<span>'+msg['data'][k].config+'</span>\
	                    </p>\
		                    <p class="house_price">\
		                        价格：￥<span style="margin-right:20px;">'+msg['data'][k].money+'</span>\
		                        时间：<span>'+msg['data'][k].time+'</span>\
		                    </p>\
		                </div>\
		                <div style="clear:both"></div>\
		            </li>';
				}
				$('#data').html(str);
			}
		})
	});

	$(document).on('click', '#res', function() {
		$('#type a').attr('class','')
		$('#num a').attr('class','')
		$('#is_int a').attr('class','')
		$('#config a').attr('class','')
		var address = $('.address a.a_selected').text();
		var time = $('.time a.a_selected').text();
		var res = 1
		var str='';
		$.ajax({
		url: "<?=Url::to(['zhou/adddo'])?>",
		type: 'get',
		dataType: 'json',
		data: {resert:res,address:address,time:time},
		success:function(msg){
			console.log(msg)
				for(k in msg['data']){
					str += '<li>\
		                <div class="house_img">\
		                    <img src="./a.png" alt="">\
		                </div>\
		                <div class="house_desc">\
		                    <p class="house_title">'+msg['data'][k].name+'</p>\
		                    <p class="house_content">\
		                        &nbsp;&nbsp;&nbsp;&nbsp;xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\
		                    </p>\
		                    <p class="house_tags">\
	                    		<span>'+msg['data'][k].type+'</span>\
	                    		<span>'+msg['data'][k].is_int+'</span>\
	                    		<span>'+msg['data'][k].num+'</span>\
	                    		<span>'+msg['data'][k].config+'</span>\
	                    </p>\
		                    <p class="house_price">\
		                        价格：￥<span style="margin-right:20px;">'+msg['data'][k].money+'</span>\
		                        时间：<span>'+msg['data'][k].time+'</span>\
		                    </p>\
		                </div>\
		                <div style="clear:both"></div>\
		            </li>';
				}
				$('#data').html(str);
			}
		})
	});


</script>
