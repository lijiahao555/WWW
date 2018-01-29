<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 属性管理 </title>
<base href="<?php echo base_url('public/Admin/')?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/general.css" rel="stylesheet" type="text/css" />
<link href="styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="attribute.php?act=list">商品属性</a></span>
<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加属性 </span>
<div style="clear:both"></div>
</h1>

<div class="main-div">
  <form action="<?php echo site_url('Admin/Attribute/up') ?>" method="post" name="theForm">
  <table width="100%" id="general-table">
      <tbody><tr>
        <td class="label">属性名称：</td>
        <td>
          <input type="text" name="attribute_name" value="<?php echo $data['attribute_name'] ?>" size="30">
          <span class="require-field">*</span>        </td>
      </tr>
      <tr>
        <td class="label">所属商品类型：</td>
        <td>
          <select name="goods_type_id" onchange="onChangeGoodsType(this.value)">
          <?php foreach ($res as $k => $v): ?>
              <?php if ($v['flag'] == 1) : ?>
                <option value="<?php echo $v['goods_type_id'] ?>" selected><?php echo $v['type_name'] ?></option>
              <?php else: ?>
                <option value="<?php echo $v['goods_type_id'] ?>" ><?php echo $v['type_name'] ?></option>
              <?php endif ?>
          <?php endforeach ?>
         </select> <span class="require-field">*</span>        </td>
      </tr>
      <tr id="attrGroups" style="display: none;">
        <td class="label">属性分组：</td>
        <td>
          <select name="attr_group">
                    </select>
        </td>
      </tr>
      <tr>
        <td class="label"><a href="javascript:showNotice('noticeindex');" title="点击此处查看提示信息"></a>规格参数：</td>
        <td>
          <?php if ($data['sort']==1): ?>
            <input type="radio" name="sort" value="1" checked>规格
            <input type="radio" name="sort" value="0" >参数
          <?php else: ?>
            <input type="radio" name="sort" value="1" >规格
            <input type="radio" name="sort" value="0" checked>参数
          <?php endif ?>
        </td>
      </tr>
      
      <tr>
        <td class="label">该属性值的录入方式：</td>
        <td>
        <?php if ($data['attribute_type']==0): ?>
          <input type="radio" name="attribute_type" value="0" class="lu" checked="true" >手工录入  
          <input type="radio" name="attribute_type" value="1" class="lu"  >从下面的列表中选择   
          <?php else: ?>
            <input type="radio" name="attribute_type" value="0" class="lu" >手工录入  
              <input type="radio" name="attribute_type" value="1" class="lu" checked >从下面的列表中选择   
        <?php endif ?>
               
                
        </td>
      </tr>
      <tr>
        <td class="label">可选值列表：</td>
        <td>
          <?php if ($data['attribute_type']==0): ?>
              <textarea name="attribute_values" id="is_show" cols="30" rows="5" disabled></textarea>
            <?php else: ?>
              <textarea name="attribute_values" id="is_show" cols="30" rows="5" ><?php echo $data['attribute_values'] ?></textarea>
          <?php endif ?>
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
      <input type="hidden" name="id"  value="<?php echo $data['attribute_id'] ?>" />
      </tbody></table>
  </form>
</div>

<div id="footer">
  版权所有 &copy; 2006-2013 软工教育 - 高级PHP - </div>
</div>

</body>
</html>
<script src="<?php echo base_url('public/jquery.js') ?>"></script>
<script>
    $(document).on('click', '.lu', function() {
        var lu=$(this).val();
        if (lu==0) {
            $('#is_show').attr('disabled',true)
        }else{
            $('#is_show').attr('disabled',false)
        }
    });
</script>