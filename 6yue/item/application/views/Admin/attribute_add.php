<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 属性管理 </title>
<base href="<?php echo base_url('public/Admin/') ?>">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/general.css" rel="stylesheet" type="text/css" />
<link href="styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href=" <?php echo site_url('Admin/Attribute/Attribute') ?>">商品属性</a></span>
<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加属性 </span>
<div style="clear:both"></div>
</h1>

<div class="main-div">
  <form action=" <?php echo site_url('Admin/Attribute/addDo') ?>" method="post" name="theForm" onsubmit="return validate();">
  <table width="100%" id="general-table">
      <tbody><tr>
        <td class="label">属性名称：</td>
        <td>
          <input type="text" name="attr_name" value="" size="30">
          <span class="require-field">*</span>        </td>
      </tr>
      <tr>
        <td class="label">属性分组：</td>
        <td>
          <select name="goods_type_id" id="">
                <option value="" checked>请选择</option>
            <?php foreach ($data as $key => $v): ?>
                <option value="<?php echo $v['goods_type_id'] ?>"><?php echo $v['type_name'] ?></option>
            <?php endforeach ?>
          </select>
        </td>
      </tr>
      <tr>
        <td class="label">规格/参数</td>
        <td>
          <input type="radio" name="attr_type" value="0" checked>参数
          <input type="radio" name="attr_type" value="1">规格
        </td>
      </tr>
      <tr>
        <td class="label">该属性值的录入方式：</td>
          <td>
            <input type="radio" name="choise" class="choise" value="1" checked="">
            手工录入
            <input type="radio" name="choise" class="choise" value="0">
            从下面的列表中选择
          </td>
      </tr>
      <tr>
        <td class="label">可选值列表：</td>
        <td>
          <textarea name="attr_values" cols="30" rows="5" id="choise" disabled=""></textarea>
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <div class="button-div">
          <input type="submit" value=" 确定 " class="button">
          <input type="reset" value=" 重置 " class="button">
        </div>
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
<script src="<?php echo base_url('public/jquery.js')?>"></script>
<script>
  $(document).on('click', '.choise', function() {
      id=$(this).val();
      if (id!=0) {
          $('#choise').attr('disabled','');
      }else{
          $('#choise').attr('disabled',false);
      }
  });
</script>