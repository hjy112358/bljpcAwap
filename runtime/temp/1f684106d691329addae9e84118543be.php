<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:42:"./template/mobile/new/user\personData.html";i:1558508361;}*/ ?>
﻿<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>我的-设置-个人资料</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" href="__STATIC__/css/topdetail.css">
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
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
        <!-- <div class="pubhead maincolorbg ">
            <a href="javascript:history.back(-1)">
                <p>个人资料</p>
            </a>
        </div> -->
        <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18">个人资料</p>
            <a href=""></a>
        </div>


        <div class="datelist">
            <div class="flex jus-between dateone">

                <p>昵称</p>
                <a href="<?php echo U('User/nickname'); ?>">
                    <div class="flex jus-start align-c">
                        <p>HIao</p>
                        <img src="__STATIC__/images/newimg/usr/go.png" alt="">
                    </div>
                </a>

            </div>
            <div class="flex jus-between dateone">

                <p>绑定手机号</p>
                <a href="<?php echo U('User/bindPhone'); ?>">
                    <div class="flex jus-start align-c">
                        <p>13835678945</p>
                        <img src="__STATIC__/images/newimg/usr/go.png" alt="">
                    </div>
                </a>
            </div>
        </div>
    </div>

</body>




</html>