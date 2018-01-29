<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 添加分类 </title>
<base href="<?= base_url('public/Admin/') ?>">
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/general.css" rel="stylesheet" type="text/css" />
<link href="styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="<?php echo site_url('Admin/Category/category') ?>">商品分类</a></span>
<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加分类 </span>
<div style="clear:both"></div>
</h1>
<!-- start add new category form -->
<div class="main-div">
  <form action="<?=site_url('Admin/Category/category_add') ?>" method="post" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">
	 <table width="100%" id="general-table">
		<tbody>
			<tr>
				<td class="label">分类名称:</td>
				<td><input type="text" name="cat_name" maxlength="20"  size="27"></td>
			</tr>
			<tr>
				<td class="label">上级分类:</td>
				<td>
					<select name="parent_id">
						<?php foreach ($res as $key => $v): ?>
							<option value="<?php echo $v['cat_id'] ?>"><?php echo str_repeat('&nbsp;', $v['key'])?><?=$v['cat_name'] ?></option>
						<?php endforeach ?>
					</select>
				</td>
			</tr>

			<tr>
				<td class="label">排序:</td>
				<td><input type="text" name="sort_order" size="15"></td>
			</tr>

			<tr>
				<td class="label">是否显示:</td>
				<td>
				<input type="radio" name="is_show" value="1"> 是
				<input type="radio" name="is_show" value="0" checked> 否  
				</td>
			</tr>
			<tr>
				<td class="label">是否显示在导航栏:</td>
				<td>
				<input type="radio" name="is_nav" value="1"> 是  
				<input type="radio" name="is_nav" value="0" checked> 否    
				</td>
			</tr>
	      <tr>
	        <td class="label">分类描述:</td>
	        <td>
	          <textarea name="cat_desc" rows="6" cols="48"></textarea>
	        </td>
	      </tr>
      </tbody></table>
      <div class="button-div">
        <input type="submit" value=" 确定 ">
        <input type="reset" value=" 重置 ">
      </div>
  </form>
</div>


</div>

</body>
</html>