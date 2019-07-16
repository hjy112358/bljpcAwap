<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:46:"./template/mobile/new/user\orderDetailNew.html";i:1558508333;}*/ ?>
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
    <link rel="stylesheet" href="__STATIC__/css/topdetail.css">
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <link rel="stylesheet" href="__STATIC__/css/goodstyle.css">
    <script type="text/javascript" src="__STATIC__/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
    <script type="text/javascript" src="__STATIC__/js/touchslider.dev.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
    <!-- <script src="__PUBLIC__/js/global.js"></script>
    <script src="__PUBLIC__/js/mobile_common.js"></script> -->

</head>

<body class="orderDetail">
    <div class="wrap">
        <!-- <div class="pubheads maincolorbg flex jus-between align-c">
                <a  href="javascript:history.back(-1)"><img src="__STATIC__/images/newimg/order/backW.png" alt=""></a>
            <p>订单详情</p>
            <span>取消订单</span>
        </div> -->

        <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18">订单详情</p>
            <span class="font-16">取消订单</span>
        </div>


        <div class="orderCreateDetail font-14">
            <p>订单状态：<span class="maincolor">待支付</span></p>
            <p>订单金额：<span class="maincolor">￥1233</span></p>
            <p>订单编号：123243342443</p>
        </div>
        <div class="goods_detail  flex jus-start align-c">
            <div class="goodsDetailimg">
                <img src="__STATIC__/images/newimg/product01.png" alt="">
            </div>
            <div class="goodsDetailMsg">
                <p class="font-15 margin-b10">智能空气净化器</p>
                <p class="font-12">型号：x393</p>
                <p class="maincolor font-15  flex jus-between align-c margin5-0">
                    <span>￥1233</span>
                    <span>x1</span>
                </p>
                <p class="font-12">2019-01-18 14:55</p>
            </div>
        </div>
        <div class="goodsReceive">
            <p class="font-14">收货人</p>
            <p class="font-12">张三 13773637291</p>
            <p class="font-12">江苏省 南通市 崇川区 南通市 益兴大厦</p>
        </div>

        <div class="payment">
            <h3 class="font-14">支付信息</h3>
            <div class="paymentlist">
                <ul>
                    <li class="flex  jus-between align-c">
                        <p class="font-13">支付方式</p>
                        <div class="flex  jus-start align-c">
                            <img src="__STATIC__/images/newimg/order/zfb.png" alt="">
                            <p class="font-12">支付宝支付</p>
                        </div>
                    </li>
                    <li class="flex  jus-between align-c">
                        <p class="font-13">优惠方式</p>
                        <p class="font-13">无</p>
                    </li>
                    <li class="flex  jus-between align-c lastLI">
                        <p class="font-13">运费</p>
                        <p class="font-13">￥0.00</p>
                    </li>

                </ul>
            </div>
            <div class="payPrice font-12 flex jus-between align-c">
                <p>订单实付金额</p>
                <p class="maincolor">￥1233.00</p>
            </div>
        </div>

        <div class="footBtn ">

            <a href="javascript:void(0)" class="maincolorbg">立即支付</a>
            <a href="javascript:void(0)" class="maincolorbg hidden">确认收货</a>
        </div>
    </div>

</body>


<script>
    $(".paymentlist ul li").each(function () {
        var _this = $(this);
        _this.on("click", function () {
            console.log(_this.index())
            _this.find(".checked").removeClass("hidden")
            _this.find(".nocheck").addClass("hidden")
            _this.siblings().find(".checked").addClass("hidden")
            _this.siblings().find(".nocheck").removeClass("hidden")
        })
    })
</script>

</html>