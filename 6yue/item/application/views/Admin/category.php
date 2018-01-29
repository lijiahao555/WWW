<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 商品分类 </title>
<base href="<?php echo base_url('public/Admin/') ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/general.css" rel="stylesheet" type="text/css" />
<link href="styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="<?=site_url('Admin/Category/category_add') ?>">添加分类</a></span>
<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品分类 </span>
<div style="clear:both"></div>
</h1>

<form method="post" action="" name="listForm">
<!-- start ad position list -->
	<div class="list-div" id="listDiv">
		<table width="100%" cellspacing="1" cellpadding="2" id="list-table">
			<tbody>
				<tr>
					<th>分类名称</th>
					<th>商品数量</th>
					<th>导航栏</th>
					<th>是否显示</th>
          <th>描述</th>
					<th>操作</th>
				</tr>
				<?php foreach ($res as $key => $v): ?>
            <tr align="center" class="0" id="0_1">
              <td align="left" class="first-cell">
                <img src="images/menu_minus.gif" id="icon_0_1" width="9" height="9" border="0" style="margin-left:<?= $v['key'] ?>em" onclick="rowClicked(this)">
                <span><a href="goods.php?act=list&amp;cat_id=1"><?= $v['cat_name'] ?></a></span>
               </td>
              <td width="10%">0</td>
              <td width="10%"><img src="images/no.gif" onclick="listTable.toggle(this, 'toggle_show_in_nav', 1)"></td>
              <td width="10%"><img src="images/yes.gif" onclick="listTable.toggle(this, 'toggle_is_show', 1)"></td>
              <td width="10%"><?= $v['cat_desc'] ?></td>
              <td width="24%" align="center">
                <a href="category.php?act=move&amp;cat_id=1">转移商品</a> |
                <a href="category.php?act=edit&amp;cat_id=1">编辑</a> |
                <a href="javascript:void(0);" class="del" data-id="<?php echo $v['cat_id'] ?>" title="移除">移除</a> 
              </td>
            </tr>
        <?php endforeach ?>
	</tbody>
  </table>
</div>
</form>

  </table>
</div>
</form>


<div id="footer">
	版权所有 &copy; 2006-2013 软工教育 - 高级PHP - </div>
</div>

</body>
</html>
<script src="<?php echo base_url('public/jquery.js') ?>"></script>
<script type="text/javascript">
  $(document).on('click','.del',function(){
      var id=$(this).data('id');
      var _remove=$(this).parent().parent().remove();
      $.ajax({
          type:'get',
          url:"<?php echo site_url('Admin/Category/category_del') ?>",
          data:{id:id},
          dataType:'json',
          success:function(msg){
              if (msg=="ok") {
                _remove;
              }
          }
      })
  })
</script>