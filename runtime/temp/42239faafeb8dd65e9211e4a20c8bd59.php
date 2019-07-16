<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:47:"./template/mobile/new/order\orderPayStatus.html";i:1558506385;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>订单支付成功</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" href="__STATIC__/css/orderlist.css">
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">


</head>

<body class="paystatus">
    <div class="wrap ">
        <!-- <div class="orderlisthead maincolorbg ">
            <a href="javascript:history.back(-1)"><p>付款成功</p></a>
            <a href="javascript:history.back(-1)" class="hidden"><p>付款失败</p></a>
        </div> -->
        <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18">付款成功</p>
            <p class="font-18 hidden">付款失败</p>
            <a href=""></a>
        </div>


        <div class="paystatus">
            <div class="paystatusimg">
                <img src="__STATIC__/images/newimg/order/paysucc.png" alt="">
            </div>
            <div class="paystatusmg">
                <p class="font-18 maincolor">付款成功</p>
                <p class="font-18 maincolor" class="hidden">付款失败</p>
            </div>

            <div class="paydetail">
                <p class="font-18 payname">必量家</p>
                <p class="font-40"><span class="font-24">￥</span>3.00</p>
            </div>

            <a href="javascript:void(0)" class="completebtn maincolor">完成</a>
        </div>


    </div>
</body>



</html>