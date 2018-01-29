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
<span class="action-span"><a href="<?php echo site_url('Admin/Category/category_add') ?>">添加分类</a></span>
<span class="action-span1"><a href="<?php echo site_url('Admin/Control/control') ?>">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品分类 </span>
<div style="clear:both"></div>
</h1>

<form method="post" action="" name="listForm">
<!-- start ad position list -->
	<div class="list-div" id="listDiv">
		<table width="100%" cellspacing="1" cellpadding="2" id="list-table">
			<tbody>
				<tr>
					<th>分类名称</th>
					<th style="display: none">商品数量</th>
					<th style="display: none">数量单位</th>
					<th>导航栏</th>
					<th>是否显示</th>
					<th>简介</th>
					<th>排序</th>
					<th>操作</th>
				</tr>
				<?php foreach ($data as $key => $v): ?>
          <tr align="center" class="0" id="0_1">
            <td align="left" class="first-cell">
              <img src="images/menu_minus.gif" id="icon_0_1" width="9" height="9" border="0" style="margin-left:<?php echo (substr_count($v['new_path'], '-')-1)*2 ?>em" onclick="rowClicked(this)">
              <span><a href="goods.php?act=list&amp;cat_id=1"><?php echo $v['category_name'] ?></a></span>
             </td>
            <td style="display: none" width="10%">0</td>
            <td style="display: none" width="10%"><span onclick="listTable.edit(this, 'edit_measure_unit', 1)" title="点击修改内容" style=""></span></td>
            <td width="10%"><img src="images/<?php echo $v['is_nav'] ? 'yes.gif' : 'no.gif' ?>" class="change" is_nav="<?php echo $v['is_nav'] ?>" id="<?php echo $v['category_id'] ?>"></td>
            <td width="10%"><img src="images/<?php echo $v['is_show'] ? 'yes.gif' : 'no.gif' ?>"  ></td>
            <td ><?php echo $v['category_desc'] ?></td>
            <td width="10%" align="right"><span onclick="listTable.edit(this, 'edit_sort_order', 1)" title="点击修改内容" style=""><?php echo $v['sort'] ?></span></td>
            <td width="24%" align="center">
              <a href="category.php?act=move&amp;cat_id=1">转移商品</a> |
              <a href="<?php echo site_url('Admin/Category/category_edit') ?>?id=<?php echo $v['category_id'] ?>">编辑</a> |
              <a href="javascript:;" class="del" data-id="<?php echo $v['category_id'] ?>" title="移除">移除</a>
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
<script>
    $(document).on('click', '.del', function() {
        var id=$(this).data('id');
        var del=$(this);
        $.ajax({
          url: "<?php echo site_url('Admin/Category/del') ?>",
          type: 'post',
          dataType: 'json',
          data: {id:id},
          success:function(msg){
             if (msg) {
                del.parent().parent().remove();
             }else{
                alert('有子类,无法删除')
             }
          }
        })
    });
    $(document).on('click', '.change', function() {
          var id=$(this).attr('id');
          var is_nav=$(this).attr('is_nav');
          var _this = $(this);
          var url="<?php echo base_url('public/Admin/') ?>"
          $.ajax({
              url: "<?php echo site_url('Admin/Category/change') ?>",
              type: 'post',
              dataType: 'json',
              data: {id:id,is_nav:is_nav},
              success:function(msg){
                  if (msg=='ok') {
                      if (is_nav==0) {
                          _this.attr('src',url+'images/yes.gif');
                      }else{
                          _this.attr('src',url+'images/no.gif');
                      }
                  }
              }
          })
          
    });
</script>