<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 属性管理 </title>
<base href="<?php echo base_url('public/Admin/') ?>" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/general.css" rel="stylesheet" type="text/css" />
<link href="styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="<?php echo site_url('Admin/attribute/add') ?>">添加属性</a></span>
<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品属性 </span>
<div style="clear:both"></div>
</h1>

<div class="form-div">
  <form action="" name="searchForm">
    <img src="images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH">
    按商品类型显示：
    <select id="choise">
      <?php foreach ($res as $key => $v): ?>
        <option value="<?php echo $v['goods_type_id']?>"><?php echo $v['type_name'] ?></option>
      <?php endforeach ?>
    </select>
  </form>
</div>

<form method="post" action="attribute.php?act=batch" name="listForm">
<div class="list-div" id="listDiv">

  <table cellpadding="3" cellspacing="1">

		<tr>
			<th><input onclick="listTable.selectAll(this, &quot;checkboxes[]&quot;)" type="checkbox">编号 </th>
			<th>属性名称</th>
			<th>商品类型</th>
			<th>属性值的录入方式</th>
			<th>可选值列表</th>
			<th>排序</a></th>
			<th>操作</th>
		</tr>
  <tbody id="box">
   <?php foreach ($data as $key => $v): ?>
     <tr>
        <td nowrap="true" valign="top"><span><input value="1" name="checkboxes[]" type="checkbox"><?php echo $v['attr_id'] ?></span></td>
        <td class="first-cell" nowrap="true" valign="top"><span onclick="listTable.edit(this, 'edit_attr_name', 1)"><?php echo $v['attr_name'] ?></span></td>
        <td nowrap="true" valign="top"><?php echo $v['attr_values'] ?></td>
        <td nowrap="true" valign="top">
          <?php if ($v['attr_values']==''): ?>
              手工录入
          <?php else: ?>
              列表中选择
          <?php endif ?>
        </td>
        <td valign="top"><span></span></td>
        <td align="right" nowrap="true" valign="top"><span onclick="listTable.edit(this, 'edit_sort_order', 1)">0</span></td>
        <td align="center" nowrap="true" valign="top">
          <a href="<?php echo site_url('Admin/Attribute/up') ?>?id=<?php echo $v['attr_id'] ?>" title="编辑"><img src="images/icon_edit.gif" border="0" height="16" width="16"></a>
          <a href="javascript:void(0);"  class="del" data-id=" <?php echo $v['attr_id'] ?>" title="移除"><img src="images/icon_drop.gif" border="0" height="16" width="16"></a>
        </td>
    </tr>
   <?php endforeach ?>



      </tbody>
    </table>

  <table cellpadding="4" cellspacing="0">
    <tbody><tr>
      <td align="right"><?php echo $page ?></td>
      </div>
</td>
    </tr>
  </tbody></table>
</div>

</form>

<div id="footer">
	版权所有 &copy; 2006-2013 软工教育 - 高级PHP - </div>
</div>

</body>
</html>
<script src=" <?php echo base_url('public/jquery.js') ?>"></script>
<script>
  $(document).on('click', '.del', function() {
        _this=$(this).parent().parent().remove();
        id=$(this).data('id')
        $.ajax({
         type: "get",
         url: "<?php echo site_url('Admin/attribute/del') ?>",
         data: {id:id},
         success: function(msg){
            if (msg=='ok') {
              _this
            }
         }
      });
  });
  $(document).on('change', '#choise', function() {
     id=$(this).val();
      $.ajax({
         type: "get",
         url: "<?php echo site_url('Admin/attribute/change') ?>",
         data: {id:id},
         dataType:'json',
         success: function(msg){
          // console.log(msg)
          _tr="";
              for(k in msg){
                  _tr="<tr>\
                      <td nowrap='true' valign='top'><span><input value='1' name='checkboxes[]' type='checkbox'>"+msg[k]['attr_id']+"</td>\
                      <td class='first-cell' nowrap='true' valign='top'>"+msg[k]['attr_name']+"</td>\
                      <td nowrap='true' valign='top'>"+msg[k]['attr_values']+"</td>\
                      <td nowrap='true' valign='top'>\
                      <?php if ("+msg[k]['attr_values']+"==''): ?>\
                              手工录入\
                          <?php else: ?>\
                              列表中选择\
                          <?php endif ?>\
                      </td>\
                      <td valign='top'><span></span></td>\
                      <td align='right' nowrap='true' valign='top'><span onclick='listTable.edit(this, 'edit_sort_order', 1)'>0</span></td>\
                      <td align='center' nowrap='true' valign='top'>\
                        <a href='<?php echo site_url('Admin/Attribute/up') ?>?id="+msg[k]['attr_id']+"' title='编辑'><img src='images/icon_edit.gif' border='0' height='16' width='16'></a>\
                        <a href='javascript:void(0);'  class='del' data-id=' "+msg[k]['attr_id']+"' title='移除'><img src='images/icon_drop.gif' border='0' height='16' width='16'></a>\
                      </td>\
                  </tr>"
              }
              $('#box').html(_tr);
         }
      });
  });
</script>