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
<span class="action-span"><a href="<?php echo site_url('Admin/Brand/add') ?>">添加品牌</a></span>
<span class="action-span1"><a href="<?php echo site_url('Admin/Control/control') ?>">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品品牌 </span>
<div style="clear:both"></div>
</h1>

<div class="form-div">
    <img src="images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH">
     <input type="text" id="search" size="15">
    <input type="submit" value=" 搜索 " class="button">
</div>

<form method="post" action="" name="listForm">
<!-- start brand list -->
<div class="list-div" id="listDiv">

  <table cellpadding="3" cellspacing="1">
    <tbody id="_this">
		<tr>
			<th>品牌名称</th>
			<th>品牌网址</th>
			<th>品牌描述</th>
			<th>排序</th>
			<th>是否显示</th>
			<th>操作</th>
		</tr>
        <?php foreach ($data as $key => $v): ?>
          <tr>
            <td><?php echo $v['brand_name'] ?><?php echo $v['brand_id'] ?></td>
            <td><img src="<?php echo base_url('uploads/brand/') ?><?php echo $v['brand_logo'] ?>" width="40" /><?php echo $v['site_url'] ?></td>
            <td><?php echo $v['brand_desc'] ?></td>
            <td><?php echo $v['sort'] ?></td>
            <td>
                <?php if ($v['is_show']==1): ?>
                    <img src="images/yes.gif" class="img" is_show="1" data-brand_id="<?php echo $v['brand_id'] ?>" />
                  <?php else: ?>
                    <img src="images/no.gif" class="img"  is_show="0" data-brand_id="<?php echo $v['brand_id'] ?>" />
                <?php endif ?>
            </td>
            <td><a href="javascript:void(0);" class="del" data-id="<?php echo $v['brand_id'] ?>">移除</a> | <a href="<?php echo site_url('Admin/Brand/up') ?>?id=<?php echo $v['brand_id'] ?>">修改</a></td>
          </tr>
        <?php endforeach ?>
        
      </tbody>
        <tr id="page">
            <td colspan="6" align="center"><span id="per_page"><?php echo $page ?></span></td>
        </tr>   
    </table>
    
<!-- end brand list -->
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
        id=$(this).data('id');
        del=$(this);
        $.ajax({
            url: "<?php echo site_url('Admin/Brand/del') ?>",
            type: 'GET',
            dataType: 'json',
            data: {id:id},
            success:function(msg){
                if (msg=='ok') {
                    del.parent().parent().remove();
                }
            }
        })
    });
    $(document).on('click', '.button', function() {
        search=$('#search').val();
        $.ajax({
            url: "<?php echo site_url('Admin/Brand/ajax_search') ?>",
            type: 'GET',
            dataType: 'json',
            data: {search:search},
            success:function(msg){
                var _this="";
                var _is_show="";
                var _page="";
                
                var _this="<tr>\
                            <th>品牌名称</th>\
                            <th>品牌网址</th>\
                            <th>品牌描述</th>\
                            <th>排序</th>\
                            <th>是否显示</th>\
                            <th>操作</th>\
                        </tr>"
                for(k in msg['data'] ){
                    if (msg['data'][k]['is_show']==1) {
                        _is_show="<img src='images/yes.gif' class='img' is_show='1' data-brand_id='"+msg['data'][k]['brand_id']+"' />"
                    }else{
                        _is_show="<img src='images/no.gif' class='img' is_show='0' data-brand_id='"+msg['data'][k]['brand_id']+"' />"
                    }
                    _this+="<tr>\
                                <td>"+msg['data'][k]['brand_name']+"</td>\
                                <td><img src='<?php echo base_url('uploads/brand/') ?>"+msg['data'][k]['brand_logo']+"' width='40' />"+msg['data'][k]['site_url']+"</td>\
                                <td>"+msg['data'][k]['brand_desc']+"</td>\
                                <td>"+msg['data'][k]['sort']+"</td>\
                                <td>"+_is_show+"</td>\
                                <td><a href='javascript:void(0);' class='del' data-id='"+msg['data'][k]['brand_id']+"'>移除</a> | <a href='<?php echo site_url('Admin/Brand/up') ?>?id="+msg['data'][k]['brand_id']+"'>修改</a></td>\
                            </tr>"
                }
                _page="<td colspan='6' align='center'>"+msg['page']+"</td>"
                $('#_this').html(_this);
                $('#page').html(_page);
            }
        })
    });
    $(document).on('click', '.img', function() {
        var is_show=$(this).attr('is_show');
        var brand_id=$(this).data('brand_id');
        console.log(brand_id);
        var _img=$(this);
        $.ajax({
            url: "<?php echo site_url('Admin/Brand/is_show') ?>",
            type: 'post',
            dataType: 'json',
            data: {brand_id:brand_id,is_show:is_show},
            success:function(msg){
                if (msg==1) {
                    if (is_show==0) {
                        _img.attr({src:'images/yes.gif',is_show:'1',id:'brand_id'});
                    }else{
                        _img.attr({src:'images/no.gif',is_show:'0',id:'brand_id'});
                    }
                }
            }
        })
       
    });
</script>
