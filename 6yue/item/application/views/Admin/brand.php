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
<span class="action-span"><a href="<?php echo site_url('Admin/Brand/brand_add') ?>">添加品牌</a></span>
<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品品牌 </span>
<div style="clear:both"></div>
</h1>

<div class="form-div">
  <!-- <form action="javascript:search_brand()" name="searchForm"> -->
    <img src="images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH">
     <input type="text" id="search" size="15" placeholder="根据品牌名称搜索">
    <input type="button" class="sou" value=" 搜索 " >
  <!-- </form> -->
</div>

<form method="post" action="" name="listForm">
<!-- start brand list -->
<div class="list-div" id="listDiv">

  <table cellpadding="3" cellspacing="1">
    <tbody>
		<tr>
      <th></th>
			<th>品牌名称</th>
			<th>品牌LOGO</th>
      <th>品牌网址</th>
			<th>品牌描述</th>
			<th>排序</th>
			<th>是否显示</th>
			<th>操作</th>
		</tr>
       <?php foreach ($data as $key => $v): ?>
          <tr>
            <td><?php echo $v['brand_id'] ?></td>
            <td><?php echo $v['brand_name'] ?></td>
            <td><img src="<?php echo base_url() ?><?php echo $v['brand_logo'] ?>" width="50" /></td>
            <td><?php echo $v['brand_url'] ?></td>
            <td><?php echo $v['brand_desc'] ?></td>
            <td><?php echo $v['sort_order'] ?></td>
            <td>
              <?php if ($v['is_show']==1):?>
                显示
              <?php else: ?>
                不显示
              <?php endif; ?>
            </td>
            <td align="center" style="background-color: rgb(255, 255, 255);">
              <a href="<?php echo site_url('Admin/Brand/up') ?>?id=<?php echo $v['brand_id'] ?>" title="编辑">编辑</a> |
              <a href="javascript:;" class="del" data-id="<?php echo $v['brand_id'] ?>" title="移除">移除</a>
            </td>
          </tr>
       <?php endforeach ?>
		  <td align="right" nowrap="true" colspan="8"><span class="page"><?php echo $page ?></span></td>
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
      _this=$(this).parent().parent().remove();;
      $.ajax({
         type: "get",
         url: "<?php echo site_url('Admin/Brand/del') ?>",
         data: {id:id},
         dataType: 'json',
         success: function(msg){
           if (msg=="ok") {
              _this
           };
         }
      });
  })
  $(document).on('click','.sou',function(){
      search=$('#search').val();
      $.ajax({
           type: "get",
           url: "<?php echo site_url('Admin/Brand/brand_search') ?>",
           data: {search:search},
           dataType:'json',
           success: function(msg){
             console.log(msg);

           }
      });
  })
</script>
