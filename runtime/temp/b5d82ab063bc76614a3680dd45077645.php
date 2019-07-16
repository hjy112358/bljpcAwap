<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:40:"./template/mobile/new/user\editPass.html";i:1562900054;}*/ ?>
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
            <p class="font-18">修改密码</p>
            <a href=""></a>
        </div> -->
        <!-- <div class="maincolorbg tophead " id="topAnchor" style="text-align: center;">
            <p class="font-18" style="margin-left:0">修改密码</p>
        </div> -->
        <div class="datelist editPass">
            <div class="flex jus-between dateone nickname">
                <input type="password" id="old_pwd" placeholder="请输入原密码">
            </div>
            <div class="flex jus-between dateone nickname">
                <input type="password" id="pwd1" placeholder="请输入新密码">
            </div>
            <div class="flex jus-between dateone nickname">
                <input type="password" id="pwd2" placeholder="请输入新密码">
            </div>
            <p>密码由6-20位字母、数字、符号组成</p>
            <div class="nextStep">
                <a id="submit" href="javascript:void(0)">确认</a>
            </div>
        </div>
    </div>
</body>
<script>
    $('#submit').click(function () {
        var old_pwd = $('#old_pwd').val();
        var pwd1 = $('#pwd1').val();
        var pwd2 = $('#pwd2').val();
        if (old_pwd.length >= 6 && pwd1.length >= 6 && pwd2.length >= 6) {
            if (old_pwd == pwd1){
                alert('改了个啥？');
                return false;
            }
            if (pwd1!==pwd2 ) {
                alert('两次密码输入不一致');
                return false;
            }
            $.ajax({
                url:"<?php echo U('User/editPassDo'); ?>",
                data:{old_pwd:old_pwd,pwd1:pwd1},
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