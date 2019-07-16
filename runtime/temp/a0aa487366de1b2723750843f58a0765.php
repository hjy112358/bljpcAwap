<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:45:"./template/mobile/new/order\order_detail.html";i:1562895935;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <!-- <title>订单详情</title> -->
    <title></title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css?time=<?php echo time()?>" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <link rel="stylesheet" href="__STATIC__/css/order_detail.css">
    <script type="text/javascript" src="__STATIC__/js/jquery.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
    <script type="text/javascript" src="__STATIC__/js/touchslider.dev.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
    <script src="__PUBLIC__/js/global.js"></script>
    <script src="__PUBLIC__/js/mobile_common.js"></script>

</head>

<body>
    <div class="wrap">
        <!-- <div class="orderhead maincolorbg hidden">
                <a  href="javascript:history.back(-1)"> 
            <p>订单详情</p>
            </a>
        </div> -->
        <!-- <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18">订单详情</p>
            <?php if($order_info['order_status'] == 0): ?>
                    <p class="cancleOrder font-14" onclick="resetorder()">取消订单</p>
                    <?php else: ?>
                    <p class="cancleOrder"><a href="javascript:history.back(-1)" style="color:white;">返回</a></p>
                <?php endif; ?>
        </div> -->
        <div class="maincolorbg  tophead" style="display: block;text-align: right">
           
            <?php if($order_info['order_status'] == 0): ?>
                    <p class="cancleOrder font-14" onclick="resetorder()">取消订单</p>
                    <?php else: ?>
                    <p class="cancleOrder"><a href="javascript:history.back(-1)" style="color:white;">返回</a></p>
                <?php endif; ?>
        </div>
        <!-- <div class=" maincolorbg flex jus-between nonPay align-c">
            <a href="javascript:history.back(-1)"> <img src="__STATIC__/images/newimg/order/backW.png" alt=""></a>
            <p>订单详情</p>
            <?php if($order_info['order_status'] == 0): ?>
                <p class="cancleOrder" onclick="resetorder()">取消订单</p>
                <?php else: ?>
                <p class="cancleOrder"><a href="javascript:history.back(-1)" style="color:white;">返回</a></p>
            <?php endif; ?>
        </div> -->
        <div class="orderDetailbox">
            <!-- 已支付 -->
            <?php if($order_info['order_status'] != 0): ?>
            <div class=" orderpaid">
            <?php else: ?>
            <div class=" orderpaid hidden">
            <?php endif; ?>
                <div class="orderAdress flex jus-between  align-c">
                    <div class="flex jus-start adressLocation align-c">
                        <img src="__STATIC__/images/newimg/order/locationOrder.png" alt="">
                        <p><?php echo $address; ?></p>
                    </div>
                    <div class="adressDetail ">
                        <img src="__STATIC__/images/newimg/order/nextB.png" alt="">
                    </div>
                </div>
                <div class="orderDetail">
                    <div class="orderTitle ">
                        <div class="flex align-c jus-start titleText">
                            <img src="__STATIC__/images/newimg/order/shopcar.png" alt="">
                            <p>商品详情</p>
                        </div>
                    </div>
                    <div class="productDetail flex jus-start">
                        <div class="productImg flex jus-between align-c">
                            <img src="<?php echo $goods_info['original_img']; ?>" alt="">
                        </div>
                        <div class="productmsg">
                            <p><?php echo $order_goods['goods_name']; ?></p>
                            <span>x<?php echo $order_goods['goods_num']; ?></span>
                            <p class="price">￥<?php echo $goods_attr['attr_price']; ?></p>
                        </div>
                    </div>
                    <div class="orderTitle flex align-c jus-between pos-r">
                        <div class="flex align-c jus-start titleText">
                            <img src="__STATIC__/images/newimg/order/orderDetail.png" alt="">
                            <p>订单详情</p>
                        </div>
                        <p class="paid"><?php if(($order_info['order_status'] == 1) && ($order_info['shipping_status'] == 0)): ?>待发货<?php elseif(($order_info['order_status'] == 1) && ($order_info['shipping_status'] == 1)): ?>待收货<?php endif; ?></p>
                    </div>
                    <div class="proInfor">
                        <div class="flex align-c jus-between">
                            <p class="inforTitle">订单编号：</p>
                            <p class="inforDetail"><?php echo $order_info['order_sn']; ?></p>
                        </div>
                        <div class="flex align-c jus-between">
                            <p class="inforTitle">订单总价：</p>
                            <p class="inforDetail"><?php echo $order_info['total_amount']; ?>元</p>
                        </div>
                            <!-- <div class="flex align-c jus-between">
                                <p class="inforTitle">使用日期：</p>
                                <p class="inforDetail">2019-01-29 星期五</p>
                            </div> -->
                        <div class="flex align-c jus-between">
                            <p class="inforTitle">购买数量：</p>
                            <p class="inforDetail"><?php echo $order_goods['goods_num']; ?></p>
                        </div>
                        <!-- <div class="flex align-c jus-between">
                            <p class="inforTitle">联系人：</p>
                            <p class="inforDetail"></p>
                        </div> -->
                        <div class="flex align-c jus-between margin-t20">
                            <p class="inforTitle">下单时间：</p>
                            <p class="inforDetail">
                                    <?php echo date('Y-m-d H:i:s',$order_info['add_time']); ?></p>
                        </div>
                        <!-- 订单详情 -->
                        <div class="flex align-c jus-between ">
                            <p class="inforTitle">支付方式：</p>
                            <?php if($order_info['pay_code'] == 'alipayMobile'): ?>
                            <p class="inforDetail flex align-c maincolor">
                                <img src="__STATIC__/images/newimg/order/zfb.png" alt="">
                                支付宝支付
                            </p>
                            <?php elseif($order_info['pay_code'] == 'yue'): ?>
                            <p class="inforDetail flex align-c maincolor">
                                    余额支付
                                </p>
                            <?php else: ?> 
                            <p class="inforDetail flex align-c maincolor">
                                    微信支付
                                </p>
                            <?php endif; ?>
                        </div>
                        <div class="flex align-c jus-between ">
                            <p class="inforTitle">订单总价：</p>
                            <p class="inforDetail maincolor">￥<?php echo $order_info['total_amount']; ?></p>
                        </div>

                        <!-- 申请退款 -->
                        <div class="flex align-c jus-between ">
                            <p class="inforTitle">支付方式：</p>
                            <p class="inforDetail maincolor">在线支付</p>
                        </div>

                    </div>
                    <!-- <div class="orderTitle rule margin-t20">
                        <div class="flex align-c jus-start titleText">
                            <img src="__STATIC__/images/newimg/order/rule.png" alt="">
                            <p>退改规则</p>
                        </div>
                    </div> -->
                    <div class="ruleBtn">
                        <!-- <a href="javascript:void(0)" class="maincolorbg">申请退款</a> -->
                        <?php if(($order_info['order_status'] == 1) && ($order_info['shipping_status'] == 1)): ?>
                        <a href="javascript:void(0)" class="maincolorbg" onclick="confirm_goods()">确认收货</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>


            <!-- 未支付 -->
            <?php if($order_info['order_status'] == 0): ?>
            <div class="non-payment pos-r ">
                <?php else: ?><div class="non-payment pos-r hidden">
            <?php endif; ?>
                <div class="payStatus">
                    <p>待支付…</p>
                    <span>订单超过30分钟自动取消......</span>
                </div>
                <div class="paydetail pos-a">
                    <div class="paydetailbox">
                        <div class="proInfor">
                            <div class="flex align-c jus-between">
                                <p class="inforTitle">订单编号：</p>
                                <p class="inforDetail"><?php echo $order_info['order_sn']; ?></p>
                            </div>
                            <div class="flex align-c jus-between">
                                <p class="inforTitle">订单总价：</p>
                                <p class="inforDetail"><?php echo $order_info['total_amount']; ?>元</p>
                            </div>
                            <!-- <div class="flex align-c jus-between">
                                <p class="inforTitle">使用日期：</p>
                                <p class="inforDetail">2019-01-29 星期五</p>
                            </div> -->
                            <div class="flex align-c jus-between">
                                <p class="inforTitle">购买数量：</p>
                                <p class="inforDetail"><?php echo $order_goods['goods_num']; ?></p>
                            </div>
                            <!-- <div class="flex align-c jus-between">
                                <p class="inforTitle">联系人：</p>
                                <p class="inforDetail"></p>
                            </div> -->
                            <div class="diviLine"></div>
                            <!-- 订单详情 -->
                            <div class="flex align-c jus-between ">
                                <p class="inforTitle">金额：</p>
                                <p class="inforDetail maincolor">￥<?php echo $order_info['total_amount']; ?></p>
                            </div>
                            <div class="flex align-c jus-between ">
                                <p class="inforTitle">Z券：</p>
                                <p class="inforDetail "><?php echo $order_info['zcoupon']; ?></p>
                            </div>
                            <div class="flex align-c jus-between ">
                                <p class="inforTitle">应付金额：</p>
                                <p class="inforDetail maincolor">￥<?php echo $order_info['total_amount']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="paybtn">
                        <a href="<?php echo url('cart/cart4?order_id='.$order_info['order_id']); ?>" class="maincolorbg">立即支付</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

<script>
    function resetorder()
    {
        var order_id = "<?php echo $order_info['order_id']; ?>";
        $.ajax({
            url  :"<?php echo url('order/resetorder'); ?>",
            data :{order_id:order_id},
            type :'post',
            success:function(data){
                if(data['status']=='1'){
                    alert(data.msg);
                    window.location.href = "/mobile/order/orderlist_daifu";
                }else{
                    alert(data.msg);
                    window.location.href = "/mobile/order/orderlist_daifu";
                }


            }


        }) 


    }
    function confirm_goods()
    {
        var order_id = "<?php echo $order_info['order_id']; ?>";
        $.ajax({
            url  :"<?php echo url('order/receivedgoods'); ?>",
            data :{order_id:order_id},
            type :'post',
            success:function(data){
                if(data['status']=='1'){
                    alert(data.msg);
                    window.location.href = "/mobile/order/orderlist_daishou";
                }else{
                    alert(data.msg);
                    window.location.href = "/mobile/order/orderlist_daishou";
                }


            }


        }) 


    }


</script>

</html>