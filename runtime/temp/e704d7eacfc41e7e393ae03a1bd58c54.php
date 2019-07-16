<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:40:"./template/mobile/new/user\accounts.html";i:1558790539;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>余额转账</title>
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
    <style>
        .datelist input {
            width: 100%;
            border: none
        }

        .nextStep {
            width: 70%;
            margin: 0 auto;
            margin-top: 60px;
        }

        .dateone {
            border-bottom: 0;
            margin-bottom:10px
        }

        .datelist input {
            border: 1px solid #303032;
            border-radius: 10px;
            height: 44px;
            line-height: 44px;
            text-indent: 15px;
        }
        .datelist{
            margin-top:10px
        }
    </style>
</head>

<body class="">
    <div class="wrap">
        <!-- <div class="pubhead maincolorbg ">
            <a href="javascript:history.back(-1)">
                <p>转账</p>
            </a>
        </div> -->
        <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18">转账</p>
            <a href=""></a>
        </div>
        <div class="datelist">
            <div class="flex jus-between dateone">
                <!-- <p>用户手机号</p> -->
                <input type="number" name="tel" id="tel" placeholder="输入用户手机号">

            </div>
            <div class="flex jus-between dateone">
                <!-- <p>转账金额</p> -->
                <input type="hidden" name="has_yue" value="<?php echo $yue; ?>" id="max">
                <input type="number" name="yue" id="yue" placeholder="输入转账金额">
            </div>
            <div class="flex jus-between dateone">
                <!-- <p>交易密码</p> -->
                <input type="number" name="paypwd" placeholder="默认交易密码为手机号后六位" id="paypwd">
            </div>


        </div>
        <div class="nextStep">
            <a id="submit" href="javascript:void(0)">确认</a>
        </div>
    </div>

</body>
<script>
    $('#submit').click(function () {
        var max = $("#max").val();
        var yue = $("#yue").val();
        var tel = $("#tel").val();
        var paypwd = $("#paypwd").val();
        if (yue > max) {
            alert("不能超过自己拥有的余额数量！")
        } else {
            $.ajax({
                url: "<?php echo U('User/accounts_do'); ?>",
                data: { tel: tel, yue: yue, paypwd: paypwd },
                type: "POST",
                success: function (res) {
                    if (res == 1) {
                        alert('转账成功');
                        window.history.back(-1);
                    } else {
                        alert('转账失败');
                    }
                }
            })
        }
    })
</script>



</html>