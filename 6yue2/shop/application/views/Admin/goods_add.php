<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
<base href="<?php echo base_url('public/Admin/') ?>" />
	<link href="styles/general.css" rel="stylesheet" type="text/css" />
	<link href="styles/main.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/utils.js"></script>
	<script type="text/javascript" src="js/selectzone.js"></script>
	<script type="text/javascript" src="js/colorselector.js"></script>
	<script type="text/javascript" src=""></script>
	<script language="javascript" type="text/javascript" src="<?php echo base_url('public/Admin/time') ?>/WdatePicker.js"></script>
	<script type="text/javascript" charset="utf-8" src="ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="ueditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
<h1>
	<span class="action-span"><a href="goods.php?act=list">商品列表</a></span>
	<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心 </a> </span><span id="search_id" class="action-span1"> - 编辑商品信息 </span>
	<div style="clear:both"></div>
</h1>

<div class="tab-div">
    <!-- tab bar -->
    <div id="tabbar-div">
      <p>
        <span class="tab-front" id="general-tab">通用信息</span>
		<span class="tab-back" id="detail-tab">详细描述</span>
		<span class="tab-back" id="mix-tab">其他信息</span>
		<span class="tab-back" id="properties-tab">商品属性</span>
		<span class="tab-back" id="gallery-tab">商品相册</span>
      </p>
    </div>

    <!-- tab body -->
    <div id="tabbody-div">
      <form enctype="multipart/form-data" action="<?php echo site_url('Admin/Goods/addDo') ?>" method="post" name="theForm"> 
        <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
		 
		 <!-- 通用信息 -->
        <table width="90%" id="general-table" align="center" style="display: table;">
			<tbody>
				<tr>
					<td class="label">商品名称：</td>
					<td><input type="text" name="goods_name" size="30"><span class="require-field">*</span></td>
				</tr>
				<tr>
					<td class="label">商品货号： </td>
					<td><input type="text" name="goods_sn" size="20"><span id="goods_sn_notice"></span><br>
					<span class="notice-span" style="display:block" id="noticeGoodsSN">如果您不输入商品货号，系统将自动生成一个唯一的货号。</span></td>
			</tr>
			<tr>
				<td class="label">商品分类：</td>
				<td>
					<select name="category_id" >
						<option  value="0" selected>请选择...</option>
						<?php foreach ($arr['category'] as $key => $v): ?>
							<option value="<?php echo $v['category_id'] ?>" ><?php echo str_repeat('&nbsp;',(substr_count($v['new_path'],'-')-1)*3) ?><?php echo $v['category_name'] ?></option>
						<?php endforeach ?>
					</select>
                 </td>
			</tr>
			<tr>
        <td class="label">商品品牌：</td>
        <td>
          <select name="brand_id" >
            <option value="0" selected>请选择...</option>
            <?php foreach ($arr['brand'] as $key => $v): ?>
              <option value="<?php echo $v['brand_id'] ?>"><?php echo $v['brand_name'] ?></option>
            <?php endforeach ?>
          </select>
        </td>
      </tr>
      <tr>
        <td class="label">商品类型：</td>
        <td>
          <select name="goods_type_id" id="alter">
            <option value="0" selected>请选择...</option>
            <?php foreach ($arr['goods_type'] as $key => $v): ?>
              <option value="<?php echo $v['goods_type_id'] ?>"><?php echo $v['type_name'] ?></option>
            <?php endforeach ?>
          </select>
        </td>
      </tr>
            <tr>
				<td class="label">选择供货商：</td>
				<td>
					<select name="suppliers_id" id="suppliers_id">
						<option value="0">不指定供货商属于本店商品</option>
						<option value="1">北京供货商</option>
						<option value="2">上海供货商</option>      
					</select>
				</td>
			</tr>
            <tr>
				<td class="label">本店售价：</td>
				<td><input type="text" name="shop_price" value="3010.00" size="20" onblur="priceSetted()">
				<input type="button" value="按市场价计算" onclick="marketPriceSetted()">
				<span class="require-field">*</span></td>
			</tr>
		<tr>
            <td class="label">会员价格：</td>
            <td><input type="text" name="user_price" value="3010.00" size="20" onblur="priceSetted()"></td>
          </tr>

          <tr>
            <td class="label">市场售价：</td>
            <td><input type="text" name="market_price" value="3612.00" size="20">
              <input type="button" value="取整数" onclick="integral_market_price()">
            </td>
          </tr>
    
          <tr>
            <td class="label"><label for="is_promote"><input type="checkbox" id="is_promote" name="is_promote" value="1" checked="checked" onclick="handlePromote(this.checked);"> 促销价：</label></td>
            <td id="promote_3"><input type="text" id="promote_1" name="promote_price" value="2750.00" size="20"></td>
          </tr>
          <tr id="promote_4">
            <td class="label" id="promote_5">促销日期：</td>
            <td id="promote_6">
              <input class="Wdate" name="promote_start_date" type="text" onClick="WdatePicker()"> <font color=red>请选择</font>
              <input class="Wdate" name="promote_end_date" type="text" onClick="WdatePicker()"> <font color=red>请选择</font>
            </td>
          </tr>
          <tr>
            <td class="label">上传商品图片：</td>
            <td>
              <input type="file" name="goods_img" size="35">
                              <a href="goods.php?act=show_image&amp;img_url=images/200905/goods_img/32_G_1242110760868.jpg" target="_blank"><img src="images/yes.gif" border="0"></a>
                            <br><input type="text" size="40" value="商品图片外部URL" style="color:#aaa;" onfocus="if (this.value == '商品图片外部URL'){this.value='http://';this.style.color='#000';}" name="goods_img_url">
            </td>
          </tr>
          <tr id="auto_thumb_1">
            <td class="label"> 上传商品缩略图：</td>
            <td id="auto_thumb_3">
              <input type="file" name="goods_thumb" size="35" disabled="">
                              <a href="goods.php?act=show_image&amp;img_url=images/200905/thumb_img/32_thumb_G_1242110760196.jpg" target="_blank"><img src="images/yes.gif" border="0"></a>
                            <br><input type="text" size="40" value="商品缩略图外部URL" style="color:#aaa;" onfocus="if (this.value == '商品缩略图外部URL'){this.value='http://';this.style.color='#000';}" name="goods_thumb_url" disabled="">
                            <br><label for="auto_thumb"><input type="checkbox" id="auto_thumb" name="auto_thumb" checked="true" value="1" >自动生成商品缩略图</label>            </td>
          </tr>
        </tbody></table>
        <script src="<?php echo base_url('public/jquery.js') ?>"></script>
        <script>
        	$(document).on('click', '#auto_thumb', function() {
        		var status = $(this).prop('checked');
        		$("input[name='goods_thumb']").attr('disabled',status);
        	});
        </script>

        <!-- 详细描述 -->
        <table width="90%" id="detail-table" style="display: none;">
          <tbody>
            <script id="editor" type="text/plain" style="width:1024px;height:300px;"></script>
          
        </tbody></table>

        <!-- 其他信息 -->
        <table width="90%" id="mix-table" style="display: none;" align="center">
                    <tbody><tr>
            <td class="label">商品重量：</td>
            <td><input type="text" name="goods_weight" value="" size="20"> <select name="weight_unit"><option value="1">千克</option><option value="0.001" selected="">克</option></select></td>
          </tr>
                              <tr>
            <td class="label"><a href="javascript:showNotice('noticeStorage');" title="点击此处查看提示信息"><img src="images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"></a> 商品库存数量：</td>
<!--            <td><input type="text" name="goods_number" value="4" size="20" readonly="readonly" /><br />-->
            <td><input type="text" name="goods_number" value="4" size="20"><br>
            <span class="notice-span" style="display:block" id="noticeStorage">库存在商品为虚货或商品存在货品时为不可编辑状态，库存数值取决于其虚货数量或货品数量</span></td>
          </tr>
          <tr>
            <td class="label">库存警告数量：</td>
            <td><input type="text" name="warn_number" value="1" size="20"></td>
          </tr>
                    <tr>
            <td class="label">加入推荐：</td>
            <td><input type="checkbox" name="is_best" value="1" checked="checked">精品 <input type="checkbox" name="is_new" value="1" checked="checked">新品 <input type="checkbox" name="is_hot" value="1" checked="checked">热销</td>
          </tr>
          <tr id="alone_sale_1">
            <td class="label" id="alone_sale_2">上架：</td>
            <td id="alone_sale_3"><input type="checkbox" name="is_on_sale" value="1" checked="checked"> 打勾表示允许销售，否则不允许销售。</td>
          </tr>
          <tr>
            <td class="label">能作为普通商品销售：</td>
            <td><input type="checkbox" name="is_alone_sale" value="1" checked="checked"> 打勾表示能作为普通商品销售，否则只能作为配件或赠品销售。</td>
          </tr>
          <tr>
            <td class="label">是否为免运费商品</td>
            <td><input type="checkbox" name="is_shipping" value="1"> 打勾表示此商品不会产生运费花销，否则按照正常运费计算。</td>
          </tr>
          <tr>
            <td class="label">商品关键词：</td>
            <td><input type="text" name="keywords" value="2008年10月 GSM,850,900,1800,1900 黑色" size="40"> 用空格分隔</td>
          </tr>
          <tr>
            <td class="label">商品简单描述：</td>
            <td><textarea name="goods_brief" cols="40" rows="3"></textarea></td>
          </tr>
          <tr>
            <td class="label">
            <a href="javascript:showNotice('noticeSellerNote');" title="点击此处查看提示信息"><img src="images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"></a> 商家备注： </td>
            <td><textarea name="seller_note" cols="40" rows="3"></textarea><br>
            <span class="notice-span" style="display:block" id="noticeSellerNote">仅供商家自己看的信息</span></td>
          </tr>
        </tbody></table>

        <!-- 商品属性 -->
         <table width="90%" id="properties-table" style="display: none;" align="center">
			  <tbody id="_alter">
		        <tr>
		          <th>颜色</th>
		          <th>价格</th>
		          <th>库存（SKU）</th>
		          <th>操作</th>
		        </tr>
		      <tr>
		          <td align='center'>
		            <select name= id=''><option value=''>请选择</option></select>
		          </td>
		          <td align='center'>
		          <input type='text' placeholder='请输入价格' />
		          </td>
		          <td align='center'>
		          <input type='text' placeholder='请输入库存' />
		          </td>
		          <td align='center'>
		            <a href='javascript:;' id="aaaa" title='复制'><img src='images/icon_copy.gif' id='copy' width='16' height='16' border='0'></a>
		            <a href='javascript:;'  title='移除'><img src='images/icon_drop.gif' id='del' border='0' height='16' width='16'></a>          
		          </td>
		        </tr>
		        </tbody>
		    </table>
        <script src="<?php echo base_url('public/jquery.js') ?>"></script>
        <script>
           

            $(document).on('click', '#copy', function() {
                //获取最后一行的tr字符串 正则匹配获取到下标是1的值 然后+1
                var index = parseInt($("#_alter tr:last-child td:first-child").html().match(/alter\[(\d+)\]/)[1])+1;
                $('#_alter').append($(this).parents('tr').clone())
                //当前图标的tr的数据
                var _tr = $(this).parents('tr').html();
                //新的一行 新的下标
                var _new_tr = _tr.replace(/alter\[(\d+)\]/g,"alter["+index+"]")
                //把最后一行的数据  替换成新的一行 新的下标  
                $('#_alter').children('tr:last-child').html(_new_tr)
            });
            $(document).on('click', '#del', function() {
                $(this).parents('tr').remove();
            });
            $(document).on('change', '#alter', function() {
                alter = $(this).val();
                if (alter==0) {
                  return
                }
                $.ajax({
                  url: "<?php echo site_url('Admin/Alter/alter') ?>",
                  type: 'post',
                  dataType: 'json',
                  data: {alter: alter},
                  success:function(msg){
                        $('#_alter').html(msg)
                    }

                })
               
            });
        </script>
        <!-- 商品相册 -->
        <table width="90%" id="gallery-table" style="display: none;" align="center">
          <tbody>
          <tr><td>&nbsp;</td></tr>
          <tr>
            <td>
              <a href="javascript:;" onclick="addImg(this)">[+]</a>
              图片描述 <input type="text" name="img_desc[]" size="20">
               <input type="file" name="img_url[]">
              
            </td>
          </tr>
        </tbody></table>

        <div class="button-div">
                    <input type="submit" value=" 确定 " class="button">
          <input type="reset" value=" 重置 " class="button">
        </div>
       
      </form>
    </div>
</div>


<div id="footer">
	版权所有 &copy; 2006-2013 
</div>
<script type="text/javascript" src="js/tab.js"></script>
<script type="text/javascript">
var ue = UE.getEditor('editor');
	function addImg(obj){
      var src  = obj.parentNode.parentNode;
      var idx  = rowindex(src);
      var tbl  = document.getElementById('gallery-table');
      var row  = tbl.insertRow(idx + 1);
      var cell = row.insertCell(-1);
      cell.innerHTML = src.cells[0].innerHTML.replace(/(.*)(addImg)(.*)(\[)(\+)/i, "$1removeImg$3$4-");
  	}

    function removeImg(obj){
      var row = rowindex(obj.parentNode.parentNode);
      var tbl = document.getElementById('gallery-table');
      tbl.deleteRow(row);
  	}

   	function dropImg(imgId){
    	Ajax.call('goods.php?is_ajax=1&act=drop_image', "img_id="+imgId, dropImgResponse, "GET", "JSON");
  	}

  	function dropImgResponse(result){
      if (result.error == 0){
          document.getElementById('gallery_' + result.content).style.display = 'none';
      }
  	}

</script>
</body>
</html>