<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:51:"./template/mobile/new/activity\ajax_flash_sale.html";i:1556698550;}*/ ?>

<?php if(is_array($flash_sale_goods) || $flash_sale_goods instanceof \think\Collection): $i = 0; $__LIST__ = $flash_sale_goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<li>
	<div class="img czg"><img src="<?php echo goods_thum_images($vo['goods_id'],247,229); ?>" alt="" /></div>
	<div class="fon">
		<div class="similar-product-text"><?php echo $vo['goods_name']; ?></div>
		<div class="ms p">
			<div class="redmon">￥<span><?php echo $vo['price']; ?></span></div>
			<div class="qums"><a href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$vo['goods_id'])); ?>"><?php if(($vo['end_time'] - time()) > 7200): ?>去购买<?php else: ?>立即抢购<?php endif; ?></a></div>
		</div>
		<div class="ce">
			<div class="redmon">￥<?php echo $vo['shop_price']; ?></div>
			<div class="jd">
				<div class="ymper">已秒<span><?php echo $vo['percent']; ?>%</span></div>
				<div class="jdtred">
					<div class="percent" style="width: <?php echo $vo['percent']; ?>%;"></div>
				</div>
			</div>
		</div>
	</div>
</li>
<?php endforeach; endif; else: echo "" ;endif; ?>