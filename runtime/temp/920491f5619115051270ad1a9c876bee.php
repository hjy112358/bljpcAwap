<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:41:"./template/mobile/new/user\bindphone.html";i:1557376859;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>我的-设置-个人资料-绑定手机号</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" href="__STATIC__/css/topdetail.css">
    <script type="text/javascript" src="__STATIC__/js/jquery.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
    <script type="text/javascript" src="__STATIC__/js/touchslider.dev.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
    <!-- <script src="__PUBLIC__/js/global.js"></script>
    <script src="__PUBLIC__/js/mobile_common.js"></script> -->

</head>

<body class="">
    <div class="wrap">
        <div class="pubhead maincolorbg ">
            <a href="javascript:history.back(-1)">
                <p>绑定手机号</p>
            </a>
        </div>
        <div class="datelist bindphone">
            <div class="phoneline">
                <p>您已绑定手机号码</p>
                <span>13812345678</span>
            </div>
            <div class="nextStep">
                <a href="<?php echo U('User/changephone'); ?>">更改手机号</a>
            </div>
        </div>
    </div>
</body>

</html>