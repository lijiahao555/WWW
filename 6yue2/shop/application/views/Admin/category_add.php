<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 添加分类 </title>
<base href="<?php echo base_url('public/Admin/') ?>" />
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/general.css" rel="stylesheet" type="text/css" />
<link href="styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="category.php?act=list">商品分类</a></span>
<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加分类 </span>
<div style="clear:both"></div>
</h1>
<!-- start add new category form -->
<div class="main-div">
  <form action="<?php echo site_url('Admin/Category/add') ?>" method="post" name="theForm" enctype="multipart/form-data" >
	 <table width="100%" id="general-table">
		<tbody>
			<tr>
				<td class="label">分类名称:</td>
				<td><input type="text" name="category_name" maxlength="20" value="" size="27"> <font color="red">*</font></td>
			</tr>
			<tr>
				<td class="label">上级分类:</td>
				<td >
					<select name="parent_id" >
						<?php foreach ($data as $key => $v): ?>
							<option value="<?php echo $v['category_id'] ?>"><?php echo str_repeat('&nbsp;', $v['parent_id']) ?><?php echo $v['category_name'] ?></option>
						<?php endforeach ?>
					</select>
				</td>
			</tr>

			<tr id="measure_unit">
				<td class="label">数量单位:</td>
				<td><input type="text" name="measure_unit" value="" size="12"></td>
			</tr>
			<tr>
				<td class="label">排序:</td>
				<td><input type="text" name="sort" value="50" size="15"></td>
			</tr>

			<tr>
				<td class="label">是否显示:</td>
				<td><input type="radio" name="is_show" value="1" checked="true"> 是<input type="radio" name="is_show" value="0"> 否  </td>
			</tr>
			<tr>
				<td class="label">是否显示在导航栏:</td>
				<td><input type="radio" name="is_nav" value="1"> 是  <input type="radio" name="is_nav" value="0" checked="true"> 否    </td>
			</tr>
			<tr>
				<td class="label">设置为首页推荐:</td>
				<td>
					<input type="checkbox" name="cat_recommend[]" value="1"> 精品          
					<input type="checkbox" name="cat_recommend[]" value="2"> 最新          
					<input type="checkbox" name="cat_recommend[]" value="3"> 热门       
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
    <input type="hidden" name="act" value="insert">
    <input type="hidden" name="old_cat_name" value="">
  </form>
</div>


</div>

</body>
</html>