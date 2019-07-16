<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:39:"./template/mobile/new/user\express.html";i:1556698550;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>单号查询结果 - 快递100</title>
<meta name="Keywords" content="快递单号查询结果"/>
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,minimal-ui">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="white">
<link rel="stylesheet" type="text/css" href="__STATIC__/css/express.css"/>
<script type="text/javascript" src="__STATIC__/js/jquery.js"></script>
</head>
<body>
	<div class="viewport enableNavbar enableToolbar enableScroll enableTransition">
    <?php if($_GET['display'] == null): ?>
		<header class="navbar">
			<ul>
				<li>查看物流</li>
				<li><a class="back" data-id="back" href="javascript:history.back(-1)">返回</a></li>
				<li></li>
			</ul>
		</header>
     <?php endif; ?>   
		<section class="content">
			<div class="wrap">
				<div class="inactive prev" index="0"></div>
				<div class="active" index="1"  style="transform: translate3d(0px, 0px, 0px);">
					<div id="J_oper_plugin">
						<div class="logis-order">订单商品</div>
						<?php if(is_array($order_goods) || $order_goods instanceof \think\Collection): if( count($order_goods)==0 ) : echo "" ;else: foreach($order_goods as $key=>$v): ?>
							<div class="mb-ollr">
								<div class="ol-l">
									<a class="fragment" href="<?php echo U('Goods/goodsInfo',array('id'=>$v[goods_id])); ?>"><img src="<?php echo goods_thum_images($v['goods_id'],200,200); ?>"></a>
								</div>
								<div class="ol-r">
									<a class="fragment">
										<h3><span><?php echo $v['goods_name']; ?></span></h3>
										<p class="r-price"> <?php echo $v['goods_price']; ?></p>
										<p class="d-total"> 共<?php echo $v['goods_num']; ?>件 </p>
									</a>
								</div>
							</div>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						<div class="logis-info">
							<p> 物流公司  <?php echo $delivery['shipping_name']; ?> </p>
							<p> 运单号码  <?php echo $delivery['invoice_no']; ?> </p>
						</div>
						<div class="logis-detail">
							<ul>
								<li>
									<?php if($delivery['shipping_code'] AND $delivery['invoice_no']): ?>
										<p class="logis-detail-date" id="express_info">物流动态</p>
										<script>
											queryExpress();
											function queryExpress()
											{
												var shipping_code = "<?php echo $delivery['shipping_code']; ?>";
												var invoice_no = "<?php echo $delivery['invoice_no']; ?>";
												$.ajax({
													type : "GET",
													dataType: "json",
													url:"/index.php?m=Home&c=Api&a=queryExpress&shipping_code="+shipping_code+"&invoice_no="+invoice_no,//+tab,
													success: function(data){
														var html = '';
														if(data.status == 200){
															$.each(data.data, function(i,n){
																if(i == 0){
																	html +="<div class='logis-detail-d logis-detail-first'>"+
																			"<div class='logis-detail-content'><p class='logis-detail-content-time'>" +n.time+
																			"</p><p class='logis-detail-content-detail'>" + n.context+ "</p></div></div>";
																}else{
																	html +="<div class='logis-detail-d'>"+
																			"<div class='logis-detail-content'><p class='logis-detail-content-time'>" +n.time+
																			"</p><p class='logis-detail-content-detail'>" + n.context+ "</p></div></div>";
																}
															});
														}else{
															html += "<p style='background:#fff;color:#F40;border:#666 solid;font-size:16px;line-height:20px;'>"+data.message+"</p>";
														}
														$("#express_info").after(html);
													}
												});
											}
										</script>
									<?php endif; ?>

								</li>
							</ul>
						</div>
						<div style="padding:20px 0 10px 0;"></div>
					</div>
				</div>
			</div>
		</section>
	</div>
</body>
</html>