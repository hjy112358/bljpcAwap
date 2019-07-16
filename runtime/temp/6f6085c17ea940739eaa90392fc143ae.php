<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:46:"./template/mobile/new/goods\ajaxGoodsList.html";i:1557930171;}*/ ?>
<?php if(is_array($goods_list) || $goods_list instanceof \think\Collection): if( count($goods_list)==0 ) : echo "" ;else: foreach($goods_list as $k=>$vo): ?>
 <li>
    <a href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$vo[goods_id])); ?>" class="item flex jus-start">
        <div class="pic_box" style="width:25%;margin-right: 15px">
            <!-- <div class="active_box">
                <span style=" background-position:0px -36px">新品</span>
            </div> -->
            <img src="<?php echo goods_thum_images($vo['goods_id'],400,400); ?>">
        </div>
        <div style="width:75%">
        <div class="title_box"><?php echo $vo['goods_name']; ?></div>
        <div class="price_box" style="line-height:56px">
            <span class="new_price"><i>￥<?php echo $vo['shop_price']; ?>元</i></span>
            <span style="font-size:12px;color:#ccc;margin-left:14px">库存:<?php echo $vo['store_count']; ?></span>
        </div>
        <div class="flex jus-start align-c" style="margin-top: -15px;font-size: 12px;color: #ccc;">
            <img src="__STATIC__/images/autarky.png" alt="" width="50" height="20"  style="margin-right:8px">
            <p style="margin-right: 26px;">1000条好评</p>
            <p>100%好评率</p>
        </div>
        </div>
      <!--   <div class="comment_box">已售0</div> -->
    </a>
   <!--  <div class="ui-number b"> 
        <a class="decrease" onClick="goods_cut(<?php echo $vo['goods_id']; ?>);">-</a>
        <input class="num" id="number_<?php echo $vo['goods_id']; ?>" type="text" onBlur="changePrice();" value="1" onFocus="if(value=='1') {value=''}" size="4" maxlength="5">
        <a class="increase" onClick="goods_add(<?php echo $vo['goods_id']; ?>);">+</a> 
    </div> -->
   <span class="bug_car"
                                onClick="AjaxAddCart(<?php echo $vo[goods_id]; ?>,1,0);"><i
                                    class="icon-shop_cart"></i></span>
  </li>
<?php endforeach; endif; else: echo "" ;endif; ?>