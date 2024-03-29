<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<base href="<?php echo base_url('public/Admin/')?>" />
	<link href="styles/general.css" rel="stylesheet" type="text/css" />
	<link href="styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>
	<span class="action-span"><a href="goods.php?act=add">添加新商品</a></span>
	<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品列表 </span>
	<div style="clear:both"></div>
</h1>

<div class="form-div">
  <form action="" name="searchForm">
    <img src="images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH">
        <!-- 分类 -->
    <select name="cat_id">
		<option value="0">所有分类</option>
		<option value="1">手机类型</option>
		<option value="4">&nbsp;&nbsp;&nbsp;&nbsp;3G手机</option>
		<option value="5">&nbsp;&nbsp;&nbsp;&nbsp;双模手机</option>
		<option value="2">&nbsp;&nbsp;&nbsp;&nbsp;CDMA手机</option>
		<option value="3">&nbsp;&nbsp;&nbsp;&nbsp;GSM手机</option>
		<option value="12">充值卡</option>
		<option value="15">&nbsp;&nbsp;&nbsp;&nbsp;联通手机充值卡</option>
		<option value="13">&nbsp;&nbsp;&nbsp;&nbsp;小灵通/固话充值卡</option>
		<option value="14">&nbsp;&nbsp;&nbsp;&nbsp;移动手机充值卡</option>
		<option value="6">手机配件</option>
		<option value="11">&nbsp;&nbsp;&nbsp;&nbsp;读卡器和内存卡</option>
		<option value="7">&nbsp;&nbsp;&nbsp;&nbsp;充电器</option>
		<option value="8">&nbsp;&nbsp;&nbsp;&nbsp;耳机</option>
		<option value="9">&nbsp;&nbsp;&nbsp;&nbsp;电池</option>
	</select>
    <!-- 品牌 -->
    <select name="brand_id">
		<option value="0">所有品牌</option>
		<option value="1">诺基亚</option>
		<option value="10">金立</option>
		<option value="9">联想</option>
		<option value="8">LG</option>
		<option value="7">索爱</option>
		<option value="6">三星</option>
		<option value="5">夏新</option>
		<option value="4">飞利浦</option>
		<option value="3">多普达</option>
		<option value="2">摩托罗拉</option>
		<option value="11">  恒基伟业</option>
	</select>
    <!-- 推荐 -->
    <select name="intro_type">
		<option value="0">全部</option>
		<option value="is_best">精品</option>
		<option value="is_new">新品</option>
		<option value="is_hot">热销</option>
		<option value="is_promote">特价</option>
		<option value="all_type">全部推荐</option>
	</select>
         
     <!-- 供货商 -->
     <select name="suppliers_id">
		<option value="0">全部</option>
		<option value="1">北京供货商</option>
		<option value="2">上海供货商</option>
	</select>
    <!-- 上架 -->
     <select name="is_on_sale">
		<option value="">全部</option>
		<option value="1">上架</option>
		<option value="0">下架</option>
	</select>
	<!-- 关键字 -->
		关键字 <input type="text" name="keyword" size="15">
		<input type="submit" value=" 搜索 " class="button">
  </form>
</div>

<form method="post" action="" name="listForm" onsubmit="return confirmSubmit(this)">
  <!-- start goods list -->
	<div class="list-div" id="listDiv">
		<table cellpadding="3" cellspacing="1">
			<tbody>
				<tr>
					<th><input type="checkbox">编号</th>
					<th>商品名称</th>
					<th>货号</th>
					<th>价格</th>
					<th>上架</th>
					<th>精品</th>
					<th>新品</th>
					<th>热销</th>
					<th>推荐排序</th>
					<th>库存</th>
					<th>操作</th>
				</tr>
				<tr></tr>
				<tr>
					<td><input type="checkbox" name="checkboxes[]" value="32">32</td>
					<td class="first-cell"><span>诺基亚N85</span></td>
					<td><span>ECS000032</span></td>
					<td align="right"><span>3010.00</span></td>
					<td align="center"><img src="images/yes.gif" onclick=""></td>
					<td align="center"><img src="images/yes.gif" onclick=""></td>
					<td align="center"><img src="images/yes.gif" onclick=""></td>
					<td align="center"><img src="images/yes.gif" onclick=""></td>
					<td align="center"><span onclick="">100</span></td>
					<td align="right"><span onclick="">4</span></td>
					<td align="center">
						<a href="../goods.php?id=32" target="_blank" title="查看"><img src="images/icon_view.gif" width="16" height="16" border="0"></a>
						<a href="goods.php?act=edit&amp;goods_id=32" title="编辑"><img src="images/icon_edit.gif" width="16" height="16" border="0"></a>
						<a href="goods.php?act=copy&amp;goods_id=32" title="复制"><img src="images/icon_copy.gif" width="16" height="16" border="0"></a>
						<a href="javascript:;" onclick="listTable.remove(32, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="images/icon_trash.gif" width="16" height="16" border="0"></a>
						<a href="goods.php?act=product_list&amp;goods_id=32" title="货品列表"><img src="images/icon_docs.gif" width="16" height="16" border="0"></a>          
					</td>
				</tr>
	<!-- start 这段代码没有格式化，只是暂时显示数据用 开发的时候将会删除-->
    <tr>
		<td style="background-color: rgb(255, 255, 255);"><input type="checkbox" name="checkboxes[]" value="31">31</td>
		<td class="first-cell" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_name', 31)">摩托罗拉E8 </span></td>
		<td style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_sn', 31)" title="点击修改内容" style="">ECS000031</span></td>
		<td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_price', 31)">1337.00
		</span></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/no.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 31)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_best', 31)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/no.gif" onclick="listTable.toggle(this, 'toggle_new', 31)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/no.gif" onclick="listTable.toggle(this, 'toggle_hot', 31)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_sort_order', 31)">100</span></td>
			<td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_number', 31)">1</span></td>
			<td align="center" style="background-color: rgb(255, 255, 255);">
		  <a href="../goods.php?id=31" target="_blank" title="查看"><img src="images/icon_view.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=edit&amp;goods_id=31&amp;extension_code=" title="编辑"><img src="images/icon_edit.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=copy&amp;goods_id=31&amp;extension_code=" title="复制"><img src="images/icon_copy.gif" width="16" height="16" border="0"></a>
		  <a href="javascript:;" onclick="listTable.remove(31, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="images/icon_trash.gif" width="16" height="16" border="0"></a>
		  <img src="images/empty.gif" width="16" height="16" border="0">          </td>
  </tr>
    <tr>
		<td style="background-color: rgb(255, 255, 255);"><input type="checkbox" name="checkboxes[]" value="24">24</td>
		<td class="first-cell" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_name', 24)" title="点击修改内容" style="">P806</span></td>
		<td style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_sn', 24)" title="点击修改内容" style="">ECS000024</span></td>
		<td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_price', 24)">2000.00
		</span></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 24)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_best', 24)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_new', 24)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_hot', 24)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_sort_order', 24)">100</span></td>
			<td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_number', 24)">100</span></td>
			<td align="center" style="background-color: rgb(255, 255, 255);">
		  <a href="../goods.php?id=24" target="_blank" title="查看"><img src="images/icon_view.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=edit&amp;goods_id=24&amp;extension_code=" title="编辑"><img src="images/icon_edit.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=copy&amp;goods_id=24&amp;extension_code=" title="复制"><img src="images/icon_copy.gif" width="16" height="16" border="0"></a>
		  <a href="javascript:;" onclick="listTable.remove(24, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="images/icon_trash.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=product_list&amp;goods_id=24" title="货品列表"><img src="images/icon_docs.gif" width="16" height="16" border="0"></a>          </td>
  </tr>
    <tr>
		<td style="background-color: rgb(255, 255, 255);"><input type="checkbox" name="checkboxes[]" value="23">23</td>
		<td class="first-cell" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_name', 23)">诺基亚N96</span></td>
		<td style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_sn', 23)" title="点击修改内容" style="">ECS000023</span></td>
		<td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_price', 23)">3700.00
		</span></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 23)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_best', 23)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_new', 23)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/no.gif" onclick="listTable.toggle(this, 'toggle_hot', 23)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_sort_order', 23)">100</span></td>
			<td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_number', 23)">8</span></td>
			<td align="center" style="background-color: rgb(255, 255, 255);">
		  <a href="../goods.php?id=23" target="_blank" title="查看"><img src="images/icon_view.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=edit&amp;goods_id=23&amp;extension_code=" title="编辑"><img src="images/icon_edit.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=copy&amp;goods_id=23&amp;extension_code=" title="复制"><img src="images/icon_copy.gif" width="16" height="16" border="0"></a>
		  <a href="javascript:;" onclick="listTable.remove(23, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="images/icon_trash.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=product_list&amp;goods_id=23" title="货品列表"><img src="images/icon_docs.gif" width="16" height="16" border="0"></a>          </td>
  </tr>
    <tr>
		<td style="background-color: rgb(255, 255, 255);"><input type="checkbox" name="checkboxes[]" value="22">22</td>
		<td class="first-cell" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_name', 22)">多普达Touch HD</span></td>
		<td style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_sn', 22)" title="点击修改内容" style="">ECS000022</span></td>
		<td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_price', 22)">5999.00
		</span></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 22)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_best', 22)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_new', 22)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/no.gif" onclick="listTable.toggle(this, 'toggle_hot', 22)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_sort_order', 22)">100</span></td>
			<td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_number', 22)">1</span></td>
			<td align="center" style="background-color: rgb(255, 255, 255);">
		  <a href="../goods.php?id=22" target="_blank" title="查看"><img src="images/icon_view.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=edit&amp;goods_id=22&amp;extension_code=" title="编辑"><img src="images/icon_edit.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=copy&amp;goods_id=22&amp;extension_code=" title="复制"><img src="images/icon_copy.gif" width="16" height="16" border="0"></a>
		  <a href="javascript:;" onclick="listTable.remove(22, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="images/icon_trash.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=product_list&amp;goods_id=22" title="货品列表"><img src="images/icon_docs.gif" width="16" height="16" border="0"></a>          </td>
  </tr>
    <tr>
		<td style="background-color: rgb(255, 255, 255);"><input type="checkbox" name="checkboxes[]" value="21">21</td>
		<td class="first-cell" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_name', 21)">金立 A30</span></td>
		<td style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_sn', 21)" title="点击修改内容" style="">ECS000021</span></td>
		<td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_price', 21)">2000.00
		</span></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 21)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_best', 21)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/no.gif" onclick="listTable.toggle(this, 'toggle_new', 21)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/no.gif" onclick="listTable.toggle(this, 'toggle_hot', 21)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_sort_order', 21)">100</span></td>
			<td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_number', 21)">40</span></td>
			<td align="center" style="background-color: rgb(255, 255, 255);">
		  <a href="../goods.php?id=21" target="_blank" title="查看"><img src="images/icon_view.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=edit&amp;goods_id=21&amp;extension_code=" title="编辑"><img src="images/icon_edit.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=copy&amp;goods_id=21&amp;extension_code=" title="复制"><img src="images/icon_copy.gif" width="16" height="16" border="0"></a>
		  <a href="javascript:;" onclick="listTable.remove(21, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="images/icon_trash.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=product_list&amp;goods_id=21" title="货品列表"><img src="images/icon_docs.gif" width="16" height="16" border="0"></a>          </td>
  </tr>
		<tr>
		<td style="background-color: rgb(255, 255, 255);"><input type="checkbox" name="checkboxes[]" value="20">20</td>
		<td class="first-cell" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_name', 20)">三星BC01</span></td>
		<td style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_sn', 20)">ECS000020</span></td>
		<td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_price', 20)">280.00
		</span></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 20)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_best', 20)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_new', 20)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_hot', 20)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_sort_order', 20)">100</span></td>
			<td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_number', 20)">12</span></td>
			<td align="center" style="background-color: rgb(255, 255, 255);">
		  <a href="../goods.php?id=20" target="_blank" title="查看"><img src="images/icon_view.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=edit&amp;goods_id=20&amp;extension_code=" title="编辑"><img src="images/icon_edit.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=copy&amp;goods_id=20&amp;extension_code=" title="复制"><img src="images/icon_copy.gif" width="16" height="16" border="0"></a>
		  <a href="javascript:;" onclick="listTable.remove(20, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="images/icon_trash.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=product_list&amp;goods_id=20" title="货品列表"><img src="images/icon_docs.gif" width="16" height="16" border="0"></a>          </td>
  </tr>
    <tr>
		<td style="background-color: rgb(255, 255, 255);"><input type="checkbox" name="checkboxes[]" value="19">19</td>
		<td class="first-cell" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_name', 19)" title="点击修改内容" style="">三星SGH-F258</span></td>
		<td style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_sn', 19)">ECS000019</span></td>
		<td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_price', 19)">858.00
		</span></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 19)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_best', 19)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_new', 19)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_hot', 19)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_sort_order', 19)">100</span></td>
			<td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_number', 19)">12</span></td>
			<td align="center" style="background-color: rgb(255, 255, 255);">
		  <a href="../goods.php?id=19" target="_blank" title="查看"><img src="images/icon_view.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=edit&amp;goods_id=19&amp;extension_code=" title="编辑"><img src="images/icon_edit.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=copy&amp;goods_id=19&amp;extension_code=" title="复制"><img src="images/icon_copy.gif" width="16" height="16" border="0"></a>
		  <a href="javascript:;" onclick="listTable.remove(19, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="images/icon_trash.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=product_list&amp;goods_id=19" title="货品列表"><img src="images/icon_docs.gif" width="16" height="16" border="0"></a>          </td>
  </tr>
    <tr>
		<td style="background-color: rgb(255, 255, 255);"><input type="checkbox" name="checkboxes[]" value="17">17</td>
		<td class="first-cell" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_name', 17)">夏新N7</span></td>
		<td style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_sn', 17)">ECS000017</span></td>
		<td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_price', 17)">2300.00
		</span></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 17)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_best', 17)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/no.gif" onclick="listTable.toggle(this, 'toggle_new', 17)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_hot', 17)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_sort_order', 17)">100</span></td>
			<td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_number', 17)">1</span></td>
			<td align="center" style="background-color: rgb(255, 255, 255);">
		  <a href="../goods.php?id=17" target="_blank" title="查看"><img src="images/icon_view.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=edit&amp;goods_id=17&amp;extension_code=" title="编辑"><img src="images/icon_edit.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=copy&amp;goods_id=17&amp;extension_code=" title="复制"><img src="images/icon_copy.gif" width="16" height="16" border="0"></a>
		  <a href="javascript:;" onclick="listTable.remove(17, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="images/icon_trash.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=product_list&amp;goods_id=17" title="货品列表"><img src="images/icon_docs.gif" width="16" height="16" border="0"></a>          </td>
  </tr>
    <tr>
		<td style="background-color: rgb(255, 255, 255);"><input type="checkbox" name="checkboxes[]" value="16">16</td>
		<td class="first-cell" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_name', 16)">恒基伟业G101</span></td>
		<td style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_sn', 16)">ECS000016</span></td>
		<td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_price', 16)">823.33
		</span></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/no.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 16)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_best', 16)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/no.gif" onclick="listTable.toggle(this, 'toggle_new', 16)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/no.gif" onclick="listTable.toggle(this, 'toggle_hot', 16)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_sort_order', 16)">100</span></td>
			<td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_number', 16)">0</span></td>
			<td align="center" style="background-color: rgb(255, 255, 255);">
		  <a href="../goods.php?id=16" target="_blank" title="查看"><img src="images/icon_view.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=edit&amp;goods_id=16&amp;extension_code=" title="编辑"><img src="images/icon_edit.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=copy&amp;goods_id=16&amp;extension_code=" title="复制"><img src="images/icon_copy.gif" width="16" height="16" border="0"></a>
		  <a href="javascript:;" onclick="listTable.remove(16, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="images/icon_trash.gif" width="16" height="16" border="0"></a>
		  <img src="images/empty.gif" width="16" height="16" border="0">          </td>
  </tr>
		<tr>
		<td><input type="checkbox" name="checkboxes[]" value="14">14</td>
		<td class="first-cell" style=""><span onclick="listTable.edit(this, 'edit_goods_name', 14)">诺基亚5800XM</span></td>
		<td><span onclick="listTable.edit(this, 'edit_goods_sn', 14)">ECS000014</span></td>
		<td align="right"><span onclick="listTable.edit(this, 'edit_goods_price', 14)">2625.00
		</span></td>
		<td align="center"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 14)"></td>
		<td align="center"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_best', 14)"></td>
		<td align="center"><img src="images/no.gif" onclick="listTable.toggle(this, 'toggle_new', 14)"></td>
		<td align="center"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_hot', 14)"></td>
		<td align="center"><span onclick="listTable.edit(this, 'edit_sort_order', 14)">100</span></td>
			<td align="right"><span onclick="listTable.edit(this, 'edit_goods_number', 14)">1</span></td>
			<td align="center">
		  <a href="../goods.php?id=14" target="_blank" title="查看"><img src="images/icon_view.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=edit&amp;goods_id=14&amp;extension_code=" title="编辑"><img src="images/icon_edit.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=copy&amp;goods_id=14&amp;extension_code=" title="复制"><img src="images/icon_copy.gif" width="16" height="16" border="0"></a>
		  <a href="javascript:;" onclick="listTable.remove(14, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="images/icon_trash.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=product_list&amp;goods_id=14" title="货品列表"><img src="images/icon_docs.gif" width="16" height="16" border="0"></a>          </td>
  </tr>
    <tr>
		<td style="background-color: rgb(255, 255, 255);"><input type="checkbox" name="checkboxes[]" value="13">13</td>
		<td class="first-cell" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_name', 13)" title="点击修改内容" style="">诺基亚5320 XpressMusic</span></td>
		<td style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_sn', 13)">ECS000013</span></td>
		<td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_price', 13)">1311.00
		</span></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 13)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_best', 13)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/no.gif" onclick="listTable.toggle(this, 'toggle_new', 13)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_hot', 13)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_sort_order', 13)">100</span></td>
			<td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_number', 13)">8</span></td>
			<td align="center" style="background-color: rgb(255, 255, 255);">
		  <a href="../goods.php?id=13" target="_blank" title="查看"><img src="images/icon_view.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=edit&amp;goods_id=13&amp;extension_code=" title="编辑"><img src="images/icon_edit.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=copy&amp;goods_id=13&amp;extension_code=" title="复制"><img src="images/icon_copy.gif" width="16" height="16" border="0"></a>
		  <a href="javascript:;" onclick="listTable.remove(13, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="images/icon_trash.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=product_list&amp;goods_id=13" title="货品列表"><img src="images/icon_docs.gif" width="16" height="16" border="0"></a>          </td>
  </tr>
    <tr>
		<td style="background-color: rgb(255, 255, 255);"><input type="checkbox" name="checkboxes[]" value="12">12</td>
		<td class="first-cell" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_name', 12)">摩托罗拉A810</span></td>
		<td style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_sn', 12)">ECS000012</span></td>
		<td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_price', 12)">983.00
		</span></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 12)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_best', 12)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_new', 12)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/no.gif" onclick="listTable.toggle(this, 'toggle_hot', 12)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_sort_order', 12)">100</span></td>
			<td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_number', 12)">8</span></td>
			<td align="center" style="background-color: rgb(255, 255, 255);">
		  <a href="../goods.php?id=12" target="_blank" title="查看"><img src="images/icon_view.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=edit&amp;goods_id=12&amp;extension_code=" title="编辑"><img src="images/icon_edit.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=copy&amp;goods_id=12&amp;extension_code=" title="复制"><img src="images/icon_copy.gif" width="16" height="16" border="0"></a>
		  <a href="javascript:;" onclick="listTable.remove(12, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="images/icon_trash.gif" width="16" height="16" border="0"></a>
		  <img src="images/empty.gif" width="16" height="16" border="0">          </td>
  </tr>
    <tr>
		<td><input type="checkbox" name="checkboxes[]" value="10">10</td>
		<td class="first-cell" style=""><span onclick="listTable.edit(this, 'edit_goods_name', 10)">索爱C702c</span></td>
		<td><span onclick="listTable.edit(this, 'edit_goods_sn', 10)">ECS000010</span></td>
		<td align="right"><span onclick="listTable.edit(this, 'edit_goods_price', 10)">1328.00
		</span></td>
		<td align="center"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 10)"></td>
		<td align="center"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_best', 10)"></td>
		<td align="center"><img src="images/no.gif" onclick="listTable.toggle(this, 'toggle_new', 10)"></td>
		<td align="center"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_hot', 10)"></td>
		<td align="center"><span onclick="listTable.edit(this, 'edit_sort_order', 10)">100</span></td>
			<td align="right"><span onclick="listTable.edit(this, 'edit_goods_number', 10)">7</span></td>
			<td align="center">
		  <a href="../goods.php?id=10" target="_blank" title="查看"><img src="images/icon_view.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=edit&amp;goods_id=10&amp;extension_code=" title="编辑"><img src="images/icon_edit.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=copy&amp;goods_id=10&amp;extension_code=" title="复制"><img src="images/icon_copy.gif" width="16" height="16" border="0"></a>
		  <a href="javascript:;" onclick="listTable.remove(10, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="images/icon_trash.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=product_list&amp;goods_id=10" title="货品列表"><img src="images/icon_docs.gif" width="16" height="16" border="0"></a>          </td>
  </tr>
    <tr>
		<td style="background-color: rgb(255, 255, 255);"><input type="checkbox" name="checkboxes[]" value="9">9</td>
		<td class="first-cell" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_name', 9)">诺基亚E66</span></td>
		<td style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_sn', 9)">ECS000009</span></td>
		<td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_price', 9)">2298.00
		</span></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 9)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_best', 9)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_new', 9)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_hot', 9)"></td>
		<td align="center" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_sort_order', 9)">100</span></td>
			<td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_goods_number', 9)">4</span></td>
			<td align="center" style="background-color: rgb(255, 255, 255);">
		  <a href="../goods.php?id=9" target="_blank" title="查看"><img src="images/icon_view.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=edit&amp;goods_id=9&amp;extension_code=" title="编辑"><img src="images/icon_edit.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=copy&amp;goods_id=9&amp;extension_code=" title="复制"><img src="images/icon_copy.gif" width="16" height="16" border="0"></a>
		  <a href="javascript:;" onclick="listTable.remove(9, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="images/icon_trash.gif" width="16" height="16" border="0"></a>
		  <a href="goods.php?act=product_list&amp;goods_id=9" title="货品列表"><img src="images/icon_docs.gif" width="16" height="16" border="0"></a>          </td>
  </tr>
  <!-- end 这段代码没有格式化，只是暂时显示数据用 开发的时候将会删除-->
  </tbody>
 </table>
<!-- end goods list -->

	<!-- 分页 -->
	<table id="page-table" cellspacing="0">
		<tbody>
			<tr>
				<td align="right" nowrap="true" style="background-color: rgb(255, 255, 255);">
					<!-- $Id: page.htm 14216 2008-03-10 02:27:21Z testyang $ -->
					<div id="turn-page">
						总计  <span id="totalRecords">22</span>个记录分为 <span id="totalPages">2</span>页当前第 <span id="pageCurrent">1</span>
						页，每页 <input type="text" size="3" id="pageSize" value="15" onkeypress="return listTable.changePageSize(event)">
						<span id="page-link">
							<a href="javascript:listTable.gotoPageFirst()">第一页</a>
							<a href="javascript:listTable.gotoPagePrev()">上一页</a>
							<a href="javascript:listTable.gotoPageNext()">下一页</a>
							<a href="javascript:listTable.gotoPageLast()">最末页</a>
							<select id="gotoPage" onchange="listTable.gotoPage(this.value)">
							<option value="1">1</option><option value="2">2</option>          </select>
						</span>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<div>
	<input type="hidden" name="act" value="batch">
	<select name="type" id="selAction" onchange="changeAction()">
		<option value="">请选择...</option>
		<option value="trash">回收站</option>
		<option value="on_sale">上架</option>
		<option value="not_on_sale">下架</option>
		<option value="best">精品</option>
		<option value="not_best">取消精品</option>
		<option value="new">新品</option>
		<option value="not_new">取消新品</option>
		<option value="hot">热销</option>
		<option value="not_hot">取消热销</option>
		<option value="move_to">转移到分类</option>
		<option value="suppliers_move_to">转移到供货商</option>
	</select>

    <input type="hidden" name="extension_code" value="">
    <input type="submit" value=" 确定 " id="btnSubmit" name="btnSubmit" class="button" disabled="true">
</div>
</form>

<div id="footer">
	版权所有 &copy; 2006-2013 软工教育 - 高级PHP - 
</div>

</body>
</html>