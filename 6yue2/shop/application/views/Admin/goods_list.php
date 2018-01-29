<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
<base href="<?php echo base_url('public/Admin/') ?>" />

	<link href="styles/general.css" rel="stylesheet" type="text/css" />
	<link href="styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>
	<span class="action-span"><a href="<?php echo site_url('Admin/Goods/goods_add') ?>">添加新商品</a></span>
	<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品列表 </span>
	<div style="clear:both"></div>
</h1>

<div class="form-div">
  <form action="" name="searchForm">
    <img src="images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH">
        <!-- 分类 -->
    <select name="cat_id">
		<option value="0">所有分类</option>
		<?php foreach ($arr['category'] as $key => $v): ?>
			<option value="<?php echo $v['category_id'] ?>"><?php echo str_repeat('&nbsp;', (substr_count($v['new_path'],'-')-1)*2) ?><?php echo $v['category_name'] ?></option>
		<?php endforeach ?>
	</select>
    <!-- 品牌 -->
    <select name="brand_id">
		<option value="0">所有品牌</option>
		<?php foreach ($arr['brand'] as $key => $v): ?>
			<option value="<?php echo $v['brand_id'] ?>"><?php echo $v['brand_name'] ?></option>
		<?php endforeach ?>
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
				<?php foreach ($arr['goods'] as $key => $v): ?>
					<tr>
					<td><input type="checkbox" name="checkboxes[]" value=""><?php echo $v['goods_id'] ?></td>
					<td class="first-cell"><span><?php echo $v['goods_name'] ?></span></td>
					<td><span><?php echo $v['goods_sn'] ?></span></td>
					<td align="right"><span><?php echo $v['shop_price'] ?></span></td>
					<td align="center"><img src="images/<?php echo $v['is_on_sale'] ? 'yes' : 'no' ?>.gif" ></td>
					<td align="center"><img src="images/<?php echo $v['is_best'] ? 'yes' : 'no' ?>.gif" ></td>
					<td align="center"><img src="images/<?php echo $v['is_new'] ? 'yes' : 'no' ?>.gif" ></td>
					<td align="center"><img src="images/<?php echo $v['is_hot'] ? 'yes' : 'no' ?>.gif" ></td>
					<td align="center"><span onclick=""><?php echo $v['sort'] ?></span></td>
					<td align="right"><span onclick=""><?php echo $v['goods_number'] ?></span></td>
					<td align="center">
						<a href="../goods.php?id=32" target="_blank" title="查看"><img src="images/icon_view.gif" width="16" height="16" border="0"></a>
						<a href="goods.php?act=edit&amp;goods_id=32" title="编辑"><img src="images/icon_edit.gif" width="16" height="16" border="0"></a>
						<a href="goods.php?act=copy&amp;goods_id=32" title="复制"><img src="images/icon_copy.gif" width="16" height="16" border="0"></a>
						<a href="javascript:;" onclick="listTable.remove(32, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="images/icon_trash.gif" width="16" height="16" border="0"></a>
						<a href="goods.php?act=product_list&amp;goods_id=32" title="货品列表"><img src="images/icon_docs.gif" width="16" height="16" border="0"></a>          
					</td>
				</tr>
				<?php endforeach ?>

    <tr style="display: none">
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
							<?php echo $arr['page'] ?>
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


<div id="footer">
	版权所有 &copy; 2006-2013 软工教育 - 高级PHP - 
</div>

</body>
</html>