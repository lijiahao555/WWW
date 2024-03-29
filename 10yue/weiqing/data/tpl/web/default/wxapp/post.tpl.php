<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" href="./resource/css/wxapp-icon.css">
<div id="js-wxapp-create" ng-controller="MainCtrl" ng-cloak>
	<div class="container">
		<div class="caret-wxapp">
			<form method="post" ng-submit="package()">
				<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
				<div class="panel panel-app">
					<div class="panel-heading">
						<ol class="breadcrumb we7-breadcrumb">
							<a href="javascript:;" onclick="history.go(-1)" class="go-back">
							<i class="wi wi-back-circle"></i></a>
							<span class="font-lg">新建小程序</span>
						</ol>
					</div>
					<div class="panel-body">
						<ul class="nav nav-wxapp" role="tablist">
							<li ng-class="{'active ban' : createStep == 1, 'finished ready' : createStep > 1}" >
								<a href="javascript:void(0);">
									<i class="num">1</i>
									<div class="wxapp-step-name">
										<img src="./resource/images/creat-step-1.png"/>
										<p>选择应用</p>
									</div>
								</a>
							</li>
							<?php  if($design_method == WXAPP_TEMPLATE) { ?>
							<li ng-class="{'active ban' : createStep == 2, 'finished ready' : createStep > 2}" >
								<a href="javascript:void(0);">
									<i class="num">2</i>
									<div class="wxapp-step-name">
										<img src="./resource/images/creat-step-2.png"/>
										<p>首页设计</p>
									</div>
								</a>
							</li>
							<li ng-class="{'active ban' : createStep == 3, 'finished ready' : createStep > 3}" >
								<a href="javascript:void(0);">
									<i class="num">3</i>
									<div class="wxapp-step-name">
										<img src="./resource/images/creat-step-3.png"/>
										<p>底部导航</p>
									</div>
								</a>
							</li>
							<li ng-class="{'active ban' : createStep == 4, 'finished ready' : createStep > 4}" >
								<a href="javascript:void(0);">
									<i class="num">4</i>
									<div class="wxapp-step-name">
										<img src="./resource/images/creat-step-4.png"/>
										<p>打包完成</p>
									</div>
								</a>
							</li>
							<?php  } else if($design_method == WXAPP_MODULE) { ?>
							<li ng-class="{'active ban' : createStep == 4, 'finished ready' : createStep > 4}" >
								<a href="javascript:void(0);">
									<i class="num">2</i>
									<div class="wxapp-step-name">
										<img src="./resource/images/creat-step-4.png"/>
										<p>打包完成</p>
									</div>
								</a>
							</li>
							<?php  } ?>
						</ul>
						<div class="wxapp-content tab-content">
							<div id="select" ng-show="createStep == 1">
								<div class="form-defalut we7-form">
									<?php  if(empty($uniacid)) { ?>
									<div class="form-group">
										<label for="" class="control-label col-sm-2">小程序名称</label>
										<div class="form-controls col-sm-10">
											<input type="text" name="name" ng-model="wxappinfo.name" class="form-control wxapp-name" placeholder="小程序名称">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="control-label col-sm-2">小程序描述</label>
										<div class="form-controls col-sm-10">
											<input type="text" name="description" ng-model="wxappinfo.description" class="form-control wxapp-name" placeholder="版本描述">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="control-label col-sm-2">原始ID</label>
										<div class="form-controls col-sm-10">
											<input type="text" name="original" ng-model="wxappinfo.original" value="" class="form-control wxapp-name" placeholder="原始ID">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="control-label col-sm-2">AppId</label>
										<div class="form-controls col-sm-10">
											<input type="text" name="key" value="" ng-model="wxappinfo.appid" class="form-control wxapp-name" placeholder="AppId">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="control-label col-sm-2">AppSecret</label>
										<div class="form-controls col-sm-10">
											<input type="text" name="secret" value="" ng-model="wxappinfo.appsecret" class="form-control wxapp-name" placeholder="AppSecret">
										</div>
									</div>
									<?php  } else { ?>
									<div class="form-group">
										<label for="" class="control-label col-sm-2">版本描述</label>
										<div class="form-controls col-sm-10">
											<input type="text" name="description" ng-model="wxappinfo.description" class="form-control wxapp-name" placeholder="版本描述">
										</div>
									</div>
									<?php  } ?>
									<div class="form-group">
										<label for="" class="control-label col-sm-2">版本号</label>
										<div class="form-controls col-sm-10">
											<input type="text" name="version" ng-model="wxappinfo.version" class="form-control wxapp-name" placeholder="版本号，只能是字母、数字、点，例如 v1.0.1">
										</div>
									</div>
									<div class="form-group">
										<input type="hidden" name="modules" value="">
										<label class="control-label col-sm-2">添加应用</label>
										<div class="form-controls col-sm-10">
											<div we7-choose-more we7-modules="wxappinfo.choose.modules" we7-choose-single="<?php  echo $design_method == WXAPP_MODULE?>"></div>
										</div>
									</div>
								</div>
							</div>
							<div id="home" ng-show="createStep == 2">
								<!-- 选择模板 -->
								<div ng-if="designMethod == 2">
									<div class="wxapp-tem-preview">
										<div class="wxapp-phone">
											<img src="./resource/images/iphone6.png" alt="" class="wxapp-phone-bg" />
											<div class="wxapp-home-preview">
												<img src="./resource/images/wxapp-default-tpl1.jpg" />
											</div>

										</div>
										<div class="panel panel-app tem-detail">
											<div class="panel-heading">
												模板功能
											</div>
											<div class="panel-body">
												<div class="tem-detail-heading">
													本模板包含以下功能
												</div>
												<div class="tem-detail-content">
													<ul>
														<li>更换幻灯片</li>
														<li>更换顶部小图标</li>
														<li>上传推荐图文</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									
									<div class="creat-select-tem">
										<div class="select-tem-heading">
											选择模板
										</div>
										<div class="select-tem-filter">
											<div class="form-group" style="display:none;">
												<select name="" class="select-we7">
													<option value="">全部分类</option>
													<option value="">分类1</option>
													<option value="">分类2</option>
												</select>
											</div>
											<div class="input-group" style="display:none;">
												<input type="text" name="" class="form-control" placeholder="输入模板名">
												<span class="input-group-addon"><i class="fa fa-search"></i></span>
											</div>
										</div>
										<div class="select-tem-list">
											<input type="hidden" name="template" ng-model="wxappinfo.choose.template" />
											<ul>
												<li class="select-tem-item" ng-class="{'active' : wxappinfo.choose.template == '1'}" ng-click="selectTpl(1)">
													<img src="./resource/images/wxapp-default-tpl0.jpg"/>
													<a href="javascript:;" class="cover-dark">
														<i class="fa fa-check cover-selected"></i>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div id="bottom" ng-show="createStep == 3">
								<div class="wxapp-tem-preview wxapp-buttom-preview">
									<div class="wxapp-phone">
										<img src="./resource/images/iphone6.png" alt="" class="wxapp-phone-bg" />
										<div class="wxapp-home-preview">
											<div class="buttom-list-preview" ng-style="{'background-color': wxappinfo.quickmenu.bottom.bgcolor}">
												<ul ng-style="{'border-top': '1px solid'+wxappinfo.quickmenu.bottom.boundary}">
													<li ng-repeat="menu in wxappinfo.quickmenu.menus">
														<img ng-src="{{menu.defaultImage}}" class="buttom-preview-img"/>
														<p class="buttom-preview-title" ng-bind="menu.name" ng-style="{'font-size':'12px', 'color': wxappinfo.quickmenu.bottom.color}"></p>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="creat-buttom">
									<div class="buttom-heading">
										底部菜单
									</div>
									<div class="creat-buttom-select form-defalut">
										<div class="form-group">
											<label for="" class="control-label col-sm-3">是否显示</label>
											<div class="form-controls col-sm-9">
												<label><input name="" id="" class="form-control" type="checkbox" style="display: none;">
												<div class="switch" ng-class="{'switchOn': wxappinfo.quickmenu.show}" ng-click="showMenu()"></div>
												</label>
											</div>
										</div>
										<div class="form-group buttom-bg-color">
											<label for="" class="control-label col-sm-3">背景颜色</label>
											<div class="form-controls col-sm-4" >
												<div we7-colorpicker we7-form-name="wxappinfo.quickmenu.bottom.bgcolor" we7-my-color="wxappinfo.quickmenu.bottom.bgcolor" we7-my-default-color="bottom.bgcolor"></div>
											</div>
										</div>
										<div class="form-group buttom-boundary-color">
											<label for="" class="control-label col-sm-3">交界线颜色</label>
											<div class="form-controls col-sm-4" >
												<div we7-colorpicker we7-my-color="wxappinfo.quickmenu.bottom.boundary" we7-my-default-color="wxappinfo.quickmenu.bottom.boundary"></div>
											</div>
										</div>
										<div class="form-group buttom-bg-color">
											<label for="" class="control-label col-sm-3">文字默认颜色</label>
											<div class="form-controls col-sm-4" >
												<div we7-colorpicker we7-my-color="wxappinfo.quickmenu.bottom.color" we7-my-default-color="wxappinfo.quickmenu.bottom.color"></div>
											</div>
										</div>
										<div class="form-group buttom-bg-color">
											<label for="" class="control-label col-sm-3">文字选中颜色</label>
											<div class="form-controls col-sm-4" >
												<div we7-colorpicker we7-my-color="wxappinfo.quickmenu.bottom.selectedColor" we7-my-default-color="wxappinfo.quickmenu.bottom.selectedColor"></div>
											</div>
										</div>
										<!-- <td>
											<div class="buttom-default-color">
												<div we7-colorpicker we7-my-color="menu.defaultColor" we7-my-default-color="menu.defaultColor"></div>
											</div>
										</td>
										<td>
											<div class="buttom-default-color">
												<div we7-colorpicker we7-my-color="menu.selectedColor" we7-my-default-color="menu.selectedColor"></div>
											</div>
										</td> -->
									</div>
									<div class="buttom-list">
										<table class="table we7-table buttom-list-table vertical-middle">
											<col width="70" />
											<col width="70" />
											<col width="100" />
											<col width="120" />
											<col width="70" />
											<tr>
												<th>默认</th>
												<th>选中</th>
												<th>菜单名称</th>
												<th>跳转到</th>
												<th>操作</th>
											</tr>
											<tr ng-repeat="menu in wxappinfo.quickmenu.menus" class="we7-form">
												<td>
													<div class="nav-img-box">
														<img ng-src="{{menu.defaultImage}}" >
														<div ng-click="addDefaultImg($index)" class="select">选择</div>
														
													</div>
												</td>
												<td>
													<div class="nav-img-box">
														<img ng-src="{{menu.selectedImage}}">
														<div ng-click="addSelectedImg($index)" class="select">选择</div>
														
													</div>
												</td>
												<td>
													<input type="text" name="menuname" ng-model="menu.name" class="form-control" />
												</td>
												
												<td>
													<select class="form-control" id="lineheight" ng-model="menu.module" ng-options="menu.title group by menu.module for menu in moduleEntries">
													</select>
												</td>
												<td>
													<a href="javascript:;" class="buttom-del" ng-click="delMenu($index)"><i class="fa fa-times-circle"></i></a>
												</td>
											</tr>
											<tr class="buttom-more">
												<td colspan="5"><a href="javascript:;" class="buttom-add" ng-click="addMenu()">+</a></td>
											</tr>
										</table>
									</div>
								</div>
							</div>
							<div id="finish" ng-show="createStep == 4">
								<div class="form we7-form wxapp-finish">
									<div class="form-group">
										<label for="" class="control-label col-sm-2">小程序名称</label>
										<div class="form-controls col-sm-10">
											<p class="form-control-static" ng-bind="wxappinfo.name"></p>
										</div>
									</div>
									<div class="form-group">
										<label for="" class="control-label col-sm-2">描述</label>
										<div class="form-controls col-sm-10">
											<p class="form-control-static" ng-bind="wxappinfo.description"></p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2">版本号</label>
										<div class="form-controls col-sm-10">
											<p class="form-control-static">{{wxappinfo.version}}</p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2">打包应用</label>
										<div class="form-controls col-sm-10">
											<ul class="app-list">
												<li class="select" ng-repeat="module in wxappinfo.choose.modules">
													<div class="app-info">
														<img ng-src="{{module.icon}}" />
														<p>{{module.title}}</p>
													</div>
												</li>
											</ul>
										</div>
									</div>
									<div class="form-group" ng-if="designMethod == 2">
										<label class="control-label col-sm-2">首页模板</label>
										<div class="form-controls col-sm-10">
											<p class="form-control-static" ng-bind="wxappinfo.choose.template"></p>
										</div>
									</div>
									<div class="form-group" ng-if="designMethod == 2">
										<label class="control-label col-sm-2">底部菜单</label>
										<div class="form-controls col-sm-10">	
											<table class="table-finish-buttom">
												<col width="75px"/>
												<col width="105"/>
												<col />
												<tr>
													<td>菜单图标</td>
													<td>菜单名字</td>
													<td>菜单链接模块</td>
												</tr>
												<tr ng-repeat="menu in wxappinfo.quickmenu.menus">
													<td ng-style="{'background-color' : wxappinfo.quickmenu.bottom.bgcolor}">
														<img ng-src="{{menu.defaultImage}}" alt="" width="48px" height="48px"/>
													</td>
													<td ng-bind="menu.name"></td>
													<td ng-bind="menu.module.title"></td>
												</tr>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<nav class="navbar navbar-wxapp-bottom navbar-fixed-bottom" role="navigation">
					<div class="container">
						<div class="pager">
							<a type="button" class="btn btn-primary" ng-show="createStep != 1" ng-click="prevStep()">上一步</a>
							<a type="button" class="btn btn-primary" ng-show="createStep != 4" ng-click="nextStep()">下一步</a>
							<button type="submit" name="submit" value="yes" class="btn btn-danger" ng-show="createStep == 4">生成版本</button>
							<!-- <a type="button" class="btn btn-default" ng-show="createStep == 4">首页预览</a> -->
						</div>
					</div>
				</nav>
			</form>
		</div>
	</div>
</div>
<script>

require(['fileUploader','underscore'], function(uploader){
	angular.module('wxApp').value('config', {
		'wxappinfo' : {
			'name' : '<?php  echo $wxapp_info['name'];?>'
		},
		'uniacid' : "<?php  echo $uniacid;?>",
		'designMethod' : "<?php  echo $design_method;?>",
		'wxappPostUrl' : "<?php  echo url('wxapp/post', array('design_method' => $design_method))?>",
		'token' : "<?php  echo $_W['token'];?>",
	});
	angular.bootstrap($('#js-wxapp-create'), ['wxApp']);
});
</script>
</html>