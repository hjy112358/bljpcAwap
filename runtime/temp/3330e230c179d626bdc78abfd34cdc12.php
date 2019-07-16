<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:43:"./template/mobile/new/user\orderCreate.html";i:1558508294;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>订单生成</title>
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

<body class="orderCreate">
    <div class="wrap">
        <!-- <div class="pubhead maincolorbg ">
            <p>订单已生成</p>
        </div> -->

        <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18">订单已生成</p>
            <a href=""></a>
        </div>



        <div class="orderCreateDetail font-14">
            <p>订单金额：<span class="maincolor">￥1233</span></p>
            <p>订单编号：123243342443</p>
        </div>
        <div class="orderTime">
            <p class="font-12">请在 30 分钟内完成支付</p>
            <div class="flex jus-between align-c">
                <p class="font-12">逾期订单将自动取消</p>
                <p class="maincolor font-18">28:39min</p>
            </div>
        </div>


        <div class="payment">
            <h3 class="font-14">支付方式</h3>
            <div class="paymentlist">
                <ul>
                    <li class="flex  jus-start align-c">
                        <div class="flex jus-start align-c paymentImg ">
                            <img src="__STATIC__/images/newimg/order/zfb.png" alt="">
                        </div>
                        <div class="flex jus-between align-c paymentbox">
                            <p class="font-13">支付宝支付</p>
                            <img src="__STATIC__/images/newimg/usr/noCheck.png" alt="" class="nocheck hidden">
                            <img src="__STATIC__/images/newimg/usr/checkadress.png" alt="" class="checked  ">
                        </div>

                    </li>
                    <li class="flex  jus-start align-c lastLI">
                        <div class="flex jus-start align-c paymentImg ">
                            <img src="__STATIC__/images/newimg/usr/wx.png" alt="">
                        </div>
                        <div class="flex jus-between align-c paymentbox">
                            <p class="font-13">微信支付</p>
                            <img src="__STATIC__/images/newimg/usr/noCheck.png" alt="" class="nocheck">
                            <img src="__STATIC__/images/newimg/usr/checkadress.png" alt="" class="checked  hidden">
                        </div>

                    </li>
                </ul>
            </div>
        </div>
        <div class="footBtn ">
            <a href="javascript:void(0)" class="maincolorbg">立即支付</a>
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