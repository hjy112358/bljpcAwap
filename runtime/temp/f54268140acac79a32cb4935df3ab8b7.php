<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:43:"./template/mobile/new/user\editPayPass.html";i:1562900060;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <!-- <title>我的-设置-个人资料-修改密码</title> -->
    <title></title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css?time=<?php echo time()?>" />
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
        <p>修改密码</p>
    </div> -->
    <!-- <div class="maincolorbg flex jus-between align-c tophead">
        <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
        <p class="font-18">修改支付密码</p>
        <a href=""></a>
    </div> -->
    <!-- <div class="maincolorbg tophead " id="topAnchor" style="text-align: center;">
        <p class="font-18" style="margin-left:0">修改支付密码</p>
    </div> -->
    <div class="datelist editPass">
        <div class="flex jus-between dateone nickname">
            <input type="password" id="old_paypwd" maxlength="6" placeholder="请输入原密码 ">
        </div>
        <div class="flex jus-between dateone nickname">
            <input type="password" id="paypwd" maxlength="6" placeholder="请输入新密码">
        </div>
        <div class="flex jus-between dateone nickname">
            <input type="password" id="paypwd1" maxlength="6" placeholder="请再次确认新密码">
        </div>
        <p>密码为6位纯数字，默认密码为手机号码后六位</p>
        <div class="nextStep">
            <a id="submit" href="javascript:void(0)">确认</a>
        </div>
    </div>
</div>
</body>
<script>
    $('#submit').click(function () {
        var old_paypwd = $('#old_paypwd').val();
        var paypwd = $('#paypwd').val();
        var paypwd1 = $('#paypwd1').val();
        var preg = /^\d{6}$/;
        if (preg.test(old_paypwd) && preg.test(paypwd) && preg.test(paypwd1)) {
            if (old_paypwd == paypwd){
                alert('改了个啥？');
                return false;
            }
            if (paypwd!==paypwd1 ) {
                alert('两次密码输入不一致');
                return false;
            }
            $.ajax({
                url:"<?php echo U('User/editPayPassDo'); ?>",
                data:{old_paypwd:old_paypwd,paypwd:paypwd},
                type:"POST",
                success:function(res){
                    if (res==1) {
                        alert('修改成功');
                        window.history.back(-1);
                    }else{
                        alert(res);
                    }
                }
            })
        }else{
            alert('请确认密码格式');
        };
    })

</script>
</html>