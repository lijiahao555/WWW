<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo ($meta_title); ?>|WeiPHP管理平台</title>
<link href="/10yue/weiphp4.0-master/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">
<link rel="stylesheet" type="text/css" href="/10yue/weiphp4.0-master/Public/Admin/css/base.css?v=<?php echo SITE_VERSION;?>" media="all">
<link rel="stylesheet" type="text/css" href="/10yue/weiphp4.0-master/Public/Admin/css/common.css?v=<?php echo SITE_VERSION;?>" media="all">
<link rel="stylesheet" type="text/css" href="/10yue/weiphp4.0-master/Public/Admin/css/module.css?v=<?php echo SITE_VERSION;?>" />
<link rel="stylesheet" type="text/css" href="/10yue/weiphp4.0-master/Public/Admin/css/style.css?v=<?php echo SITE_VERSION;?>" media="all">
<link rel="stylesheet" type="text/css" href="/10yue/weiphp4.0-master/Public/Admin/css/store.css?v=<?php echo SITE_VERSION;?>" media="all">
<link rel="stylesheet" type="text/css" href="/10yue/weiphp4.0-master/Public/Admin/css/<?php echo (C("COLOR_STYLE")); ?>.css?v=<?php echo SITE_VERSION;?>" media="all">
<!--[if lt IE 9]>
    <script type="text/javascript" src="/10yue/weiphp4.0-master/Public/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
<script type="text/javascript" src="/10yue/weiphp4.0-master/Public/static/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/10yue/weiphp4.0-master/Public/Admin/js/jquery.mousewheel.js?v=<?php echo SITE_VERSION;?>"></script>
<!--<![endif]-->

</head>
<?php if(!empty($core_side_menu)): ?><body><?php endif; ?>
<?php if(empty($core_side_menu)): ?><body style="padding-left:0;"><?php endif; ?>
<!-- 头部 -->
<div class="header"> 
  <!-- Logo -->
  <?php if(C('SYSTEM_LOGO')) { ?>
  <span class="logo" style="float: left;margin-left: 2px;width: 198px;height: 49px;background:url('<?php echo C('SYSTEM_LOGO');?>') no-repeat center;background-size: 158px;" >
  <?php }else{ ?>
  <span class="logo" style="float: left;margin-left: 2px;width: 198px;height: 49px;background:url('./Public/Home/images/logo.png') no-repeat center; background-size: 158px;" > 
  
  <!--         <img style="height:49px;" src="/weiphp4.0/Public/Home/images/logo.png"> -->
  <?php } ?>
  </span> 
  <!-- /Logo --> 
  
  <!-- 主导航 -->
  <ul class="main-nav">
        <?php if(is_array($core_top_menu)): $i = 0; $__LIST__ = $core_top_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($ca["id"]); ?>" class="<?php echo ($ca["class"]); ?>"><a href="<?php echo ($ca["url"]); ?>"><?php echo ($ca["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>  
  </ul>
  <!-- /主导航 --> 
  
  <!-- 用户栏 -->
  <div class="user-bar"> <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
    <ul class="nav-list user-menu hidden">
      <li class="manager">你好，<em title="<?php echo (get_nickname($mid)); ?>"><?php echo (get_nickname($mid)); ?></em></li>
      <li><a href="<?php echo U('Home/Index/index');?>">返回前台</a></li>
      <li><a href="<?php echo U('User/updatePassword');?>">修改密码</a></li>
      <li><a href="<?php echo U('User/updateNickname');?>">修改昵称</a></li>
      <li><a href="<?php echo U('Public/logout');?>">退出</a></li>
    </ul>
  </div>
</div>
<!-- /头部 --> 

<!-- 边栏 -->
        <?php if(!empty($core_side_menu)): ?><div class="sidebar"> 
  <!-- 子导航 -->
  
    <div id="subnav" class="subnav">
        <!-- 子导航 -->
          <h3><i class="icon icon-unfold"></i><?php echo ($now_top_menu_name); ?></h3>
          <ul class="side-sub-menu">
            <?php if(is_array($core_side_menu)): $i = 0; $__LIST__ = $core_side_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($vo["class"]); ?>" data-id="<?php echo ($vo["id"]); ?>"> <a class="item" href="<?php echo ($vo["url"]); ?>"> <?php echo ($vo["title"]); ?> </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
        
        <!-- /子导航 --> 
    </div>
  
  <!-- /子导航 --> 
</div><?php endif; ?>
<!-- /边栏 --> 

<!-- 内容区 -->
<div id="main-content">
  <div id="top-alert" class="fixed alert alert-error" style="display: none;">
    <button class="close fixed" style="margin-top: 4px;">&times;</button>
    <div class="alert-content">这是内容</div>
  </div>
  <div id="main" class="main">
     
      <!-- nav -->
      <?php if(!empty($_show_nav)): ?><div class="breadcrumb"> <span>您的位置:</span>
          <?php $i = '1'; ?>
          <?php if(is_array($_nav)): foreach($_nav as $k=>$v): if($i == count($_nav)): ?><span><?php echo ($v); ?></span>
              <?php else: ?>
              <span><a href="<?php echo ($k); ?>"><?php echo ($v); ?></a>&gt;</span><?php endif; ?>
            <?php $i = $i+1; endforeach; endif; ?>
        </div><?php endif; ?>
      <!-- nav --> 
    
    
	<div class="main-title">
		<h2>配置管理 [ <?php if(isset($_GET['group'])): ?><a href="<?php echo U('index');?>">全部</a><?php else: ?><strong>全部</strong><?php endif; ?>&nbsp;<?php if(is_array($group)): foreach($group as $key=>$vo): if(($group_id) != $key): ?><a href="<?php echo U('index?group='.$key);?>"><?php echo ($vo); ?></a><?php else: ?><strong><?php echo ($vo); ?></strong><?php endif; ?>&nbsp;<?php endforeach; endif; ?> ]</h2>
	</div>

	<div class="cf">
		<a class="btn" href="<?php echo U('add');?>">新 增</a>
		<a class="btn" href="javascript:;">删 除</a>
		<button class="btn list_sort" url="<?php echo U('sort?group='.I('group'),'','');?>">排序</button>
        
		<!-- 高级搜索 -->
		<div class="search-form fr cf">
			<div class="sleft">
				<input type="text" name="name" class="search-input" value="<?php echo I('name');?>" placeholder="请输入配置名称">
				<a class="sch-btn" href="javascript:;" id="search" url="<?php echo U('config/index');?>"><i class="btn-search"></i></a>
			</div>
		</div>
	</div>

	<div class="data-table table-striped">
		<table>
			<thead>
				<tr>
					<th class="row-selected">
						<input class="checkbox check-all" type="checkbox">
					</th>
					<th>ID</th>
					<th>名称</th>
					<th>标题</th>
					<th>分组</th>
					<th>类型</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($list)): if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$config): $mod = ($i % 2 );++$i;?><tr>
						<td><input class="ids row-selected" type="checkbox" name="id[]" value="<?php echo ($config["id"]); ?>"></td>
						<td><?php echo ($config["id"]); ?></td>
						<td><a href="<?php echo U('edit?id='.$config['id']);?>"><?php echo ($config["name"]); ?></a></td>
						<td><?php echo ($config["title"]); ?></td>
						<td><?php echo (get_config_group($config["group"])); ?></td>
						<td><?php echo (get_config_type($config["type"])); ?></td>
						<td>
							<a title="编辑" href="<?php echo U('edit?id='.$config['id']);?>">编辑</a>
							<a class="confirm ajax-get" title="删除" href="<?php echo U('del?id='.$config['id']);?>">删除</a>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				<?php else: ?>
				<td colspan="7" class="text-center"> aOh! 暂时还没有内容! </td><?php endif; ?>
			</tbody>
		</table>
		<!-- 分页 -->
	    <div class="page">
	        <?php echo ($_page); ?>
	    </div>
	</div>

  </div>
  <div class="cont-ft">
    <div class="copyright">
      <div class="fl">感谢使用<a href="http://www.weiphp.cn" target="_blank">WeiPHP</a>管理平台</div>
      <div class="fr">V<?php echo C('SYSTEM_UPDATRE_VERSION');?></div>
    </div>
  </div>
</div>
<!-- /内容区 --> 
<script type="text/javascript">
	var  IMG_PATH = "/10yue/weiphp4.0-master/Public/Admin/images";
	var  STATIC = "/10yue/weiphp4.0-master/Public/static";
	var  ROOT = "/10yue/weiphp4.0-master";
	var  UPLOAD_PICTURE = "<?php echo U('home/File/uploadPicture',array('session_id'=>session_id()));?>";
	var  UPLOAD_FILE = "<?php echo U('File/upload',array('session_id'=>session_id()));?>";
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "/10yue/weiphp4.0-master", //当前网站地址
            "APP"    : "/10yue/weiphp4.0-master/index.php?s=", //当前项目地址
            "PUBLIC" : "/10yue/weiphp4.0-master/Public", //项目公共目录地址
            "DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
            "MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
            "VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
        }
    })();
    </script> 
<script type="text/javascript" src="/10yue/weiphp4.0-master/Public/static/think.js?v=<?php echo SITE_VERSION;?>"></script> 
<script type="text/javascript" src="/10yue/weiphp4.0-master/Public/Admin/js/common.js?v=<?php echo SITE_VERSION;?>"></script> 
<script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

	        /* 表单获取焦点变色 */
	        $("form").on("focus", "input", function(){
		        $(this).addClass('focus');
	        }).on("blur","input",function(){
				        $(this).removeClass('focus');
			        });
		    $("form").on("focus", "textarea", function(){
			    $(this).closest('label').addClass('focus');
		    }).on("blur","textarea",function(){
			    $(this).closest('label').removeClass('focus');
		    });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
    </script>

<script type="text/javascript">
$(function(){
	//搜索功能
	$("#search").click(function(){
		var url = $(this).attr('url');
        var query  = $('.search-form').find('input').serialize();
        query = query.replace(/(&|^)(\w*?\d*?\-*?_*?)*?=?((?=&)|(?=$))/g,'');
        query = query.replace(/^&/g,'');
        if( url.indexOf('?')>0 ){
            url += '&' + query;
        }else{
            url += '?' + query;
        }
		window.location.href = url;
	});
	//回车搜索
	$(".search-input").keyup(function(e){
		if(e.keyCode === 13){
			$("#search").click();
			return false;
		}
	});
	 
	//点击排序
	$('.list_sort').click(function(){
		var url = $(this).attr('url');
		var ids = $('.ids:checked');
		var param = '';
		if(ids.length > 0){
			var str = new Array();
			ids.each(function(){
				str.push($(this).val());
			});
			param = str.join(',');
		}

		if(url != undefined && url != ''){
			window.location.href = url + '/ids/' + param;
		}
	});
});
</script>

</body>
</html>