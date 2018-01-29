<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 类型管理 </title>
<base href="<?php echo base_url('public/Admin/') ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/general.css" rel="stylesheet" type="text/css" />
<link href="styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="<?php echo site_url('Admin/Goods_type/goods_type_add') ?>">新建商品类型</a></span>
<span class="action-span1"><a href="<?php echo site_url('Admin/Control/control') ?>">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品类型 </span>
<div style="clear:both"></div>
</h1>

<form method="post" action="" name="listForm">
<!-- start goods type list -->
<div class="list-div" id="listDiv">

	<table width="100%" cellpadding="3" cellspacing="1" id="listTable">
		<tbody>
			<tr>
				<th>商品类型名称</th>
				<th>属性分组</th>
				<th>属性数</th>
				<th>状态</th>
				<th>操作</th>
			</tr>
			<?php foreach ($data as $k => $v): ?>
          <tr>
            <td class="first-cell"><span onclick="javascript:listTable.edit(this, 'edit_type_name', 1)"><?php echo $v['type_name'] ?></span></td>
            <td></td>
            <td align="right"></td>
            <td align="center"><img src="images/yes.gif"></td>
            <td align="center">
              <a href="<?php echo site_url('Admin/Attribute/attribute_list') ?>/<?php echo $v['goods_type_id'] ?>/0" title="规格列表">规格列表</a> |
              <a href="<?php echo site_url('Admin/Goods_type/goods_type_edit') ?>?id=<?php echo $v['goods_type_id'] ?>" title="编辑">编辑</a> |
              <a href="javascript:;" class="del" id="<?php echo $v['goods_type_id'] ?>" title="移除">移除</a>
            </td>
          </tr>
          <tr>
            <td colspan="5"><?php echo $page ?></td>
          </tr>
      <?php endforeach ?>
      
  </tbody></table>

</div>
<!-- end goods type list -->
</form>

<div id="footer">
	版权所有 &copy; 2006-2013 软工教育 - 高级PHP - </div>
</div>

</body>
</html>
<script src="<?php echo base_url('public/jquery.js') ?>"></script>
<script>
  $(document).on('click', '.del', function() {
       var id=$(this).attr('id');
       var _this=$(this).parent().parent().remove();
         $.ajax({
           url: "<?php echo site_url('Admin/Goods_type/del') ?>",
           type: 'get',
           dataType: 'json',
           data: {id:id},
           success:function(msg){
              if (msg=='ok') {
                  _this
              }
           }
       })
     
  });
</script>