<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 品牌管理 </title>
<base href="<?php echo base_url('public/Admin/') ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/general.css" rel="stylesheet" type="text/css" />
<link href="styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="<?php echo site_url('Admin/Brand/brand') ?>">商品品牌</a></span>
<span class="action-span1"><a href="<?php echo site_url('Admin/Brand/brand') ?>">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加品牌 </span>
<div style="clear:both"></div>
</h1>

<div class="main-div">
<form method="post" action="<?php echo site_url('Admin/Brand/upOne') ?>" name="theForm" enctype="multipart/form-data">
<table cellspacing="1" cellpadding="3" width="100%">
  <tbody><tr>
    <td class="label">品牌名称</td>
    <td><input type="text" name="brand_name" maxlength="60" value="<?php echo $data['brand_name'] ?>"><span class="require-field">*</span></td>
  </tr>
  <tr>
    <td class="label">品牌网址</td>
    <td><input type="text" name="site_url" maxlength="60" size="40" value="<?php echo $data['site_url'] ?>"></td>
  </tr>
  <tr>
    <td class="label"><a href="javascript:showNotice('warn_brandlogo');" title="点击此处查看提示信息">
        <img src="images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"></a>品牌LOGO</td>
   <td><input type="file" name="brand_logo" size="45">    <br>
      <?php  if(empty($data['brand_logo'])) :?>
      <span class="notice-span" style="display:block" id="warn_brandlogo">请上传图片，做为品牌的LOGO！</span>
      <?php else :?>
      <span class="notice-span" style="display:block" id="warn_brandlogo">你已经上传过图片。再次上传时将覆盖原图片！</span>
      <?php endif;?>
    </td>
  <tr>
    <td class="label">品牌描述</td>
    <td><textarea name="brand_desc" cols="60" rows="4"><?php echo $data['brand_desc'] ?></textarea></td>
  </tr>
  <tr>
    <td class="label">排序</td>
    <td><input type="text" name="sort" maxlength="40" size="15" value="<?php echo $data['sort'] ?>"></td>
  </tr>
  <tr>
    <td class="label">是否显示</td>
    <td>
    <?php if ($data['is_show']==1): ?>
       <input type="radio" name="is_show" value="1" checked="checked"> 是 <input type="radio" name="is_show" value="0" > 否  
     <?php else: ?>
       <input type="radio" name="is_show" value="1" > 是 <input type="radio" name="is_show" value="0" checked> 否  
    <?php endif ?>
               (当品牌下还没有商品的时候，首页及分类页的品牌区将不会显示该品牌。)
    </td>
  </tr>
  <input type="hidden" name="brand_id" value="<?php echo $brand_id ?>"/>
  <tr>
    <td colspan="2" align="center"><br>
      <input type="submit" class="button" value=" 确定 ">
      <input type="reset" class="button" value=" 重置 ">
    </td>
  </tr>
</tbody></table>
</form>
</div>

</body>
</html>