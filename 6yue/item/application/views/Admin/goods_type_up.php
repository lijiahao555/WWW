<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 类型管理 </title>
<base href="<?php echo base_url('public/Admin/') ?>" >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/general.css" rel="stylesheet" type="text/css" />
<link href="styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="<?php echo site_url('Admin/Goods_type/goods_type')?>">商品类型列表</a></span>
<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 新建商品类型 </span>
<div style="clear:both"></div>
</h1>

<div class="main-div">
  <form action="<?php echo site_url('Admin/Goods_type/compile')?>" method="post" name="theForm" onsubmit="return validate();">
    <table cellspacing="1" cellpadding="3" width="100%">
      <tbody><tr>
        <td class="label">商品类型名称:</td>
        <td><input type="text" name="type_name" value="" size="40">
        <span class="require-field">*</span></td>
      </tr>
      <tr style="display:none">
        <td class="label">状态:</td>
        <td><input type="radio" name="enabled" value="0">&nbsp;禁用&nbsp;<input type="radio" name="enabled" value="1" checked="">&nbsp;启用&nbsp;</td>
      </tr>
      <tr style="display:none">
        <td class="label"><a href="javascript:showNotice('noticeAttrGroups');" title="点击此处查看提示信息"><img src="images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"></a> 属性分组:</td>
        <td>
          <textarea name="attr_group" rows="5" cols="40"></textarea><br>
          <span class="notice-span" style="display:block" id="noticeAttrGroups">每行一个商品属性组。排序也将按照自然顺序排序。</span>
        </td>
      </tr>
      <tr align="center">
        <td colspan="2">
          <input type="hidden" name="id" value="<?php echo $id?>">
          <input type="submit" value=" 确定 " class="button">
          <input type="reset" value=" 重置 " class="button">
        </td>
      </tr>
    </tbody></table>
  </form>
</div>

<div id="footer">
	版权所有 &copy; 2006-2013 软工教育 - 高级PHP - </div>
</div>

</body>
</html>