<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:43:"./template/mobile/new/user\receivelist.html";i:1558510424;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>收货人信息列表</title>
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

<body class="">
    <div class="wrap">
        <!-- <div class="pubheads maincolorbg flex jus-between align-c">
                <a  href="javascript:history.back(-1)"><img src="__STATIC__/images/newimg/order/backW.png" alt=""></a>
            <p>收货人信息</p>
            <span>新增地址</span>
        </div> -->
        <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18">收货人信息</p>
            <span class="font-16">新增地址</span>
        </div>


        <div class="addreslist">
            <ul>
                <li class="flex align-c jus-between">
                    <div>
                        <p>张三</p>
                        <p>18888888888</p>
                        <p>江苏省 南通市 开发区 南通市 益兴大厦</p>
                    </div>
                    <div class="checkimg ">
                        <img src="__STATIC__/images/newimg/usr/checkadress.png" alt="">
                    </div>
                </li>
                <li class="flex align-c jus-between">
                    <div>
                        <p>张三</p>
                        <p>18888888888</p>
                        <p>江苏省 南通市 开发区 南通市 益兴大厦</p>
                    </div>
                    <div class="checkimg hidden">
                        <img src="__STATIC__/images/newimg/usr/checkadress.png" alt="">
                    </div>
                </li>
            </ul>
        </div>
    </div>

</body>



<script>
    $(function(){
        $(".addreslist ul li").each(function(){
            var _this=$(this);
            _this.on("click",function(){
                _this.find(".checkimg").removeClass("hidden");
                _this.siblings().find(".checkimg").addClass("hidden")
            })
        })
    })
</script>

</html>