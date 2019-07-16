<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:50:"./template/mobile/new/order\orderlist_daiping.html";i:1558525787;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>订单详情</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" href="__STATIC__/css/orderlist.css">
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <script type="text/javascript" src="__STATIC__/js/jquery.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
    <script type="text/javascript" src="__STATIC__/js/touchslider.dev.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
    <script src="__PUBLIC__/js/global.js"></script>
    <script src="__PUBLIC__/js/mobile_common.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>

</head>

<body>
    <div class="wrap">
        <!-- <div class="orderlisthead maincolorbg ">
            <a href="javascript:history.back(-1)"><p>我的订单</p></a>
        </div> -->
        <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18">我的订单</p>
            <a href=""></a>
        </div>
        <div class="tablist">
            <div id="leftTabBox" class="tabBox">
                <div class="hd">
                    <ul>
                        <li class="maincolor"><a href="<?php echo url('order/orderlist_all'); ?>">全部</a></li>
                        <li class="maincolor"><a href="<?php echo url('order/orderlist_daifu'); ?>">待付款</a></li>
                        <li class="maincolor"><a href="<?php echo url('order/orderlist_daifa'); ?>">待发货</a></li>
                        <li class="maincolor"><a href="<?php echo url('order/orderlist_daishou'); ?>">待收货</a></li>
                        <li class="maincolor on">待评价</li>
                    </ul>
                </div>
                <div class="bd">
                    <!-- 全部 -->
                    <ul>
                        <li>
                            <div class="productmsglist">
                                <ul>
                                    <?php if(is_array($order_list) || $order_list instanceof \think\Collection): $i = 0; $__LIST__ = $order_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <li>
                                            <a href="<?php echo url('order/order_detail?order_id='.$vo['order_id']); ?>">
                                                <div class="productmsg">
                                                    <div class="flex  jus-between align-c">
                                                        <div class="flex  jus-start align-c">
                                                            <img src="__STATIC__/images/newimg/order/store.png" alt=""
                                                                class="store">
                                                            <p><?php echo $vo['store_name']; ?> <i>></i></p>
                                                        </div>
                                                <span class="maincolor"><?php if($vo['order_status'] == 0): ?>待付款<?php endif; if($vo['order_status'] == 1): ?>待发货<?php endif; if($vo['order_status'] == 2): ?>待收货<?php endif; if($vo['order_status'] == 3): ?>待评价<?php endif; if($vo['order_status'] == 4): ?>订单完成<?php endif; ?></span>
                                                    </div>
                                                    <div class="flex  jus-between margin-t10 margin-b20">
                                                        <div class="goodsimg flex  jus-start align-c">
                                                            <img src="<?php echo $vo['original_img']; ?>" alt="">
                                                        </div>
                                                        <p class="goodsdetail"><?php echo $vo['goods_name']; ?></p>
                                                        <div class="goodproceAnum ">
                                                            <span>￥<?php echo $vo['attr_price']; ?></span>
                                                            <span class="goodsnum">x <?php echo $vo['goods_num']; ?></span>
                                                        </div>
                                                    </div>
                                                    <p class="total ">共1件商品 合计：￥<?php echo $vo['total_price']; ?></p>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>

                                </ul>
                            </div>
                        </li>
                    </ul>
                    <!-- 待付款 -->
                    <ul>
                        <li>
                            <div class="productmsglist">
                                <ul>
                                    <?php if(is_array($order_list) || $order_list instanceof \think\Collection): $i = 0; $__LIST__ = $order_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <li>
                                            <a href="<?php echo url('order/order_detail?order_id='.$vo['order_id']); ?>">
                                                <div class="productmsg">
                                                    <div class="flex  jus-between align-c">
                                                        <div class="flex  jus-start align-c">
                                                            <img src="__STATIC__/images/newimg/order/store.png" alt=""
                                                                class="store">
                                                            <p><?php echo $vo['store_name']; ?> <i>></i></p>
                                                        </div>
                                                        <span class="maincolor"><?php if($vo['order_status'] == 0): ?>待付款<?php endif; if($vo['order_status'] == 1): ?>待发货<?php endif; if($vo['order_status'] == 2): ?>待收货<?php endif; if($vo['order_status'] == 3): ?>待评价<?php endif; if($vo['order_status'] == 4): ?>订单完成<?php endif; ?></span>
                                                    </div>
                                                    <div class="flex  jus-between margin-t10 margin-b20">
                                                        <div class="goodsimg flex  jus-start align-c">
                                                            <img src="<?php echo $vo['original_img']; ?>" alt="">
                                                        </div>
                                                        <p class="goodsdetail"><?php echo $vo['goods_name']; ?></p>
                                                        <div class="goodproceAnum ">
                                                            <span>￥<?php echo $vo['attr_price']; ?></span>
                                                            <span class="goodsnum">x <?php echo $vo['goods_num']; ?></span>
                                                        </div>
                                                    </div>
                                                    <p class="total ">共1件商品 合计：￥<?php echo $vo['total_price']; ?></p>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>

                                </ul>
                            </div>
                        </li>
                    </ul>
                    <!-- 待收货 -->
                    <ul>
                        <li>
                            <div class="productmsglist">
                                <ul>
                                    <?php if(is_array($order_list) || $order_list instanceof \think\Collection): $i = 0; $__LIST__ = $order_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <li>
                                            <a href="<?php echo url('order/order_detail?order_id='.$vo['order_id']); ?>">
                                                <div class="productmsg">
                                                    <div class="flex  jus-between align-c">
                                                        <div class="flex  jus-start align-c">
                                                            <img src="__STATIC__/images/newimg/order/store.png" alt=""
                                                                class="store">
                                                            <p><?php echo $vo['store_name']; ?> <i>></i></p>
                                                        </div>
                                                        <span class="maincolor"><?php if($vo['order_status'] == 0): ?>待付款<?php endif; if($vo['order_status'] == 1): ?>待发货<?php endif; if($vo['order_status'] == 2): ?>待收货<?php endif; if($vo['order_status'] == 3): ?>待评价<?php endif; if($vo['order_status'] == 4): ?>订单完成<?php endif; ?></span>
                                                    </div>
                                                    <div class="flex  jus-between margin-t10 margin-b20">
                                                        <div class="goodsimg flex  jus-start align-c">
                                                            <img src="<?php echo $vo['original_img']; ?>" alt="">
                                                        </div>
                                                        <p class="goodsdetail"><?php echo $vo['goods_name']; ?></p>
                                                        <div class="goodproceAnum ">
                                                            <span>￥<?php echo $vo['attr_price']; ?></span>
                                                            <span class="goodsnum">x <?php echo $vo['goods_num']; ?></span>
                                                        </div>
                                                    </div>
                                                    <p class="total ">共1件商品 合计：￥<?php echo $vo['total_price']; ?></p>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>

                                </ul>
                            </div>
                        </li>
                    </ul>
                    <!-- 待评价 -->
                    <ul>
                        <li>
                            <div class="productmsglist">
                                <ul>
                                    <?php if(is_array($order_list) || $order_list instanceof \think\Collection): $i = 0; $__LIST__ = $order_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <li>
                                            <a href="<?php echo url('order/order_detail?order_id='.$vo['order_id']); ?>">
                                                <div class="productmsg">
                                                    <div class="flex  jus-between align-c">
                                                        <div class="flex  jus-start align-c">
                                                            <img src="__STATIC__/images/newimg/order/store.png" alt=""
                                                                class="store">
                                                            <p><?php echo $vo['store_name']; ?> <i>></i></p>
                                                        </div>
                                                        <span class="maincolor"><?php if($vo['order_status'] == 0): ?>待付款<?php endif; if($vo['order_status'] == 1): ?>待发货<?php endif; if($vo['order_status'] == 2): ?>待收货<?php endif; if($vo['order_status'] == 3): ?>待评价<?php endif; if($vo['order_status'] == 4): ?>订单完成<?php endif; ?></span>
                                                    </div>
                                                    <div class="flex  jus-between margin-t10 margin-b20">
                                                        <div class="goodsimg flex  jus-start align-c">
                                                            <img src="<?php echo $vo['original_img']; ?>" alt="">
                                                        </div>
                                                        <p class="goodsdetail"><?php echo $vo['goods_name']; ?></p>
                                                        <div class="goodproceAnum ">
                                                            <span>￥<?php echo $vo['attr_price']; ?></span>
                                                            <span class="goodsnum">x <?php echo $vo['goods_num']; ?></span>
                                                        </div>
                                                    </div>
                                                    <p class="total ">共1件商品 合计：￥<?php echo $vo['total_price']; ?></p>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>

                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript">
    TouchSlide({ slideCell: "#leftTabBox" ,defaultIndex:4
 });
</script>

</html>