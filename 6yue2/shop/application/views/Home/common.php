<base href="<?php echo base_url('public/Home/') ?>">
<div class="nav">
    <div class="nav_t">全部商品分类</div>
    <div class="leftNav none">
        <ul>
            <?php foreach ($category_type as $value): ?>
            <li>
                <div class="fj">
                    <span class="n_img"><span></span><img src="images/nav1.png" /></span>
                    <span class="fl"><a href="<?php echo site_url('Home/Categorylist/categorylist'.'/'.$value['category_id']) ?>"><?php echo $value['category_name'] ?></a></span>
                </div>
                <?php foreach ($value['son'] as $val): ?>
                    <div class="zj">
                        <div class="zj_l">
                            <div class="zj_l_c">
                                <h2><a href="<?php echo site_url('Home/Categorylist/categorylist'.'/'.$val['category_id']) ?>"><?php echo $val['category_name'] ?></a></h2>
                                <?php foreach ($val['son'] as $v): ?>
                                    <a href="<?php echo site_url('Home/Categorylist/categorylist').'/'.$v['category_id'] ?>"><?php echo $v['category_name'] ?></a>|
                                <?php endforeach ?>
                            </div>
                        </div>
                <?php endforeach ?>
                    <div class="zj_r">
                        <a href="#"><img src="images/n_img1.jpg" width="236" height="200" /></a>
                        <a href="#"><img src="images/n_img2.jpg" width="236" height="200" /></a>
                    </div>
                </div>
            </li>
            <?php endforeach ?>
        </ul>            
    </div>
</div>
      
                    
