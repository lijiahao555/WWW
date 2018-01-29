<span class="s_city_b">
<span class="fl">送货至：</span>
  <span class="s_city">
  	<span>北京</span>
      <div class="s_city_bg">
      	<div class="s_city_t"></div>
          <div class="s_city_c">
          	<h2>请选择所在的收货地区</h2>
              <table border="0" class="c_tab" style="width:235px; margin-top:10px;" cellspacing="0" cellpadding="0">
              省
              <select name="" id="">
                  <option value="0">请选择</option>
                  <?php foreach ($data as $key => $value): ?>
                      <option value="<?php echo $value['region_id'] ?>"><?php echo $value['region_name'] ?></option>
                  <?php endforeach ?>
              </select>
              市
              <select name="" id="">
                  <option value="0">请选择</option>
              </select>
              县
              <select name="" id="">
                  <option value="0">请选择</option>
              </select>
              村
              <select name="" id="">
                  <option value="0">请选择</option>
              </select>
              </table>
          </div>
      </div>
  </span>
</span>