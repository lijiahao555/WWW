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
<span class="action-span"><a href="<?php echo site_url('Admin/Attribute/attribute_add') ?>">添加属性</a></span>
<span class="action-span1"><a href="<?php echo site_url('Admin/Control/control') ?>">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品属性 </span>
<div style="clear:both"></div>
</h1>

<div class="form-div">
  <form action="" name="searchForm">
    <img src="images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH">
    按商品类型显示：<select name="goods_type" id="show">
    <option value="0" selected>请选择</option>
      <?php foreach ($data as $k => $v): ?>
          <option value="<?php echo $v['goods_type_id'] ?>"><?php echo $v['type_name'] ?></option>
      <?php endforeach ?>
    </select>
  </form>
</div>

<form method="post" action="attribute.php?act=batch" name="listForm">
<div class="list-div" id="listDiv">

  <table cellpadding="3" cellspacing="1"  id="_table">
    <tbody>
		<tr>
			<th><input onclick="listTable.selectAll(this, &quot;checkboxes[]&quot;)" type="checkbox">编号 </th>
			<th>属性名称</th>
			<th>商品类型</th>
			<th>属性值的录入方式</th>
			<th>可选值列表</th>
			<th>操作</th>
		</tr>
  <tbody>
    
    <?php foreach ($res as $key => $v): ?>
          <tr >
          <td nowrap="true" valign="top"><span><input value="1" name="checkboxes[]" type="checkbox">1</span></td>
          <td class="first-cell" nowrap="true" valign="top"><span onclick="listTable.edit(this, 'edit_attr_name', 1)"><?php echo $v['attribute_name'] ?></span></td>
          <td nowrap="true" valign="top"><span><?php echo $result['type_name'] ?></span></td>
          <td nowrap="true" valign="top"><span><?php echo $v['attribute_type'] ? '从列表中选择' : '手工输入' ?></span></td>
          <td valign="top"><span><?php echo $v['attribute_values'] ?></span></td>
          
          <td align="center" nowrap="true" valign="top">
            <a href="<?php echo site_url('Admin/Attribute/attribute_edit') ?>?id=<?php echo $v['attribute_id'] ?>" title="编辑"><img src="images/icon_edit.gif" border="0" height="16" width="16"></a>
            <a href="javascript:;" class="del" id="<?php echo $v['attribute_id'] ?>" title="移除"><img src="images/icon_drop.gif" border="0" height="16" width="16"></a>
          </td>
        </tr>
    <?php endforeach ?>
  </tbody>

 
      </tbody></table>

  <table cellpadding="4" cellspacing="0">
    <tbody><tr>
      <td style="background-color: rgb(255, 255, 255);"><input type="submit" id="btnSubmit" value="删除" class="button" disabled="true"></td>
      <td align="right" style="background-color: rgb(255, 255, 255);">    
      <span  id="page"><?php echo $page ?></span>
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
<script src="<?php echo base_url('public/jquery.js') ?>"></script>
<script>
    $(document).on('click', '.del', function() {
        var _del=$(this);
        var id=$(this).attr('id');
        $.ajax({
          url: "<?php echo site_url('Admin/Attribute/del') ?>",
          type: 'post',
          dataType: 'json',
          data: {id: id},
          success:function(msg){
              if (msg=="ok") {
                  _del.parents('tr').remove();
              }else{
                  alert('删除失败')
              }
          }
        })
        
    });

    $(document).on('change', '#show', function() {
         var id = $(this).val();
         var _table="";
         var chois="";
         $.ajax({
           url: "<?php echo site_url('Admin/Attribute/search') ?>",
           type: 'post',
           dataType: 'json',
           data: {id:id},
           success:function(msg){
            _table="<tr>\
                    <th><input onclick='listTable.selectAll(this, &quot;checkboxes[]&quot;)' type='checkbox'>编号 </th>\
                    <th>属性名称</th>\
                    <th>商品类型</th>\
                    <th>属性值的录入方式</th>\
                    <th>可选值列表</th>\
                    <th>操作</th>\
                  </tr>"
                for(k in msg['data']){
                 
                  _table+="<tr>\
                        <td nowrap='true' valign='top'><span><input value='1' name='checkboxes[]' type='checkbox'>1</span></td>\
                        <td class='first-cell' nowrap='true' valign='top'><span onclick='listTable.edit(this, 'edit_attr_name', 1)'>"+msg['data'][k]['attribute_name']+"</span></td>\
                        <td></td>\
                        <td nowrap='true' valign='top'><span>a</span></td>\
                        <td valign='top'><span>"+msg['data'][k]['attribute_values']+"</span></td>\
                        \
                        <td align='center' nowrap='true' valign='top'>\
                          <a href='?act=edit&amp;attr_id=1' title='编辑'><img src='images/icon_edit.gif' border='0' height='16' width='16'></a>\
                          <a href='javascript:;' class='del' id='"+msg['data'][k]['attribute_id']+"' title='移除'><img src='images/icon_drop.gif' border='0' height='16' width='16'></a>\
                        </td>\
                      </tr>"

                  }
                    $('#page').html(msg['page'])
                      $('#_table').html(_table);
             }
         })
    });
</script>