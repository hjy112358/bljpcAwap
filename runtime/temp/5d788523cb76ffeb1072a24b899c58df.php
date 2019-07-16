<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:36:"./template/mobile/new/order\pay.html";i:1560419253;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>支付</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
    <link rel="stylesheet" href="__STATIC__/css/pay.css">
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <script type="text/javascript" src="__STATIC__/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
</head>

<body class="">
    <div class="wrap">
        <div class=" flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18"></p>
            <a href="javascript:void(0)"></a>
        </div>

        <div class="payUser">
            <div class="userhead">
                <img src="__STATIC__/images/newimg/usr/userimg.png" alt="">
            </div>
            <p>HIao</p>
        </div>

        <div class="payDetail">
            <p>转账金额</p>
            <div class="payPrice flex">
                <i>￥</i>
                <input type="number">
            </div>
            <div class="payType">
                <p class="maincolor">转账方式</p>
                
                <div class="paybox flex jus-between align-c ">
                    <div class="wximg flex jus-start align-c payimg">
                        <img src="__STATIC__/images/newimg/icon/wx.png" alt="" width="20" height="20">
                        <p>微信转账</p>
                    </div>
                    <div class="checkbox" >
                        <img src="__STATIC__/images/newimg/icon/check.png" alt="" width="20" height="20" class="check hidden">
                        <img src="__STATIC__/images/newimg/icon/checked.png" alt="" width="20" height="20" class=" checked">
                    </div>
                </div>
                <div class="paybox flex jus-between align-c ">
                    <div class="wximg flex jus-start align-c payimg">
                        <img src="__STATIC__/images/newimg/icon/zfb.png" alt="" width="20" height="20">
                        <p>支付宝转账</p>
                    </div>
                    <div class="checkbox" >
                        <img src="__STATIC__/images/newimg/icon/check.png" alt="" width="20" height="20" class="check">
                        <img src="__STATIC__/images/newimg/icon/checked.png" alt="" width="20" height="20" class="checked hidden">
                    </div>
                </div>
                <div class="paybox flex jus-between align-c ">
                    <div class="wximg flex jus-start align-c payimg">
                        <img src="__STATIC__/images/newimg/icon/yu.png" alt="" width="20" height="20">
                        <p>余额转账</p>
                    </div>
                    <div class="checkbox" >
                        <img src="__STATIC__/images/newimg/icon/check.png" alt="" width="20" height="20" class="check">
                        <img src="__STATIC__/images/newimg/icon/checked.png" alt="" width="20" height="20" class="checked hidden">
                    </div>
                </div>
               
                <a href="javascript:void(0)" class="sendMsg">转账</a>
                
            </div>
        </div>

    </div>
</body>

<script>
    $(function(){
        // function check(_this){
        //     var thisnow=$(_this);
        //     var check=thisnow.attr("data-check");
        //     if(check=='1'){
        //         thisnow.find(".checked").removeClass("hidden");
        //         thisnow.find(".check").addClass("hidden");
        //         thisnow.attr("data-check","0");
        //     }else{
        //         thisnow.find(".checked").addClass("hidden");
        //         thisnow.find(".check").removeClass("hidden");
        //         thisnow.attr("data-check","1");
        //     }
        // }
        $(".payType .paybox").each(function(){
            var _this=$(this);
            _this.on("click",function(){
                var thisnow=$(this);
                thisnow.find(".check").addClass("hidden")
                thisnow.find(".checked").removeClass("hidden")
                thisnow.siblings().find(".checked").addClass("hidden")
                thisnow.siblings().find(".check").removeClass("hidden")
            })
        })
    })

</script>

</html>