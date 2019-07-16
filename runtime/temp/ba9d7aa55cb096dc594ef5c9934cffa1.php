<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:48:"./template/mobile/new/user\memberRegistrate.html";i:1558919410;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>会员注册</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" href="__STATIC__/css/register.css">
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <script type="text/javascript" src="__STATIC__/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
    <script src="__STATIC__/layer/layer.js"></script>
    <!-- <script type="text/javascript" src="__STATIC__/js/layer.js"></script> -->

</head>

<body class="">
    <div class="wrap">
        <!-- <div class="pubhead maincolorbg ">
            <a href="javascript:history.back(-1)">
                <p>会员注册</p>
            </a>
        </div> -->
        <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18">会员注册</p>
            <a href=""></a>
        </div>

        <div class="registerbg"></div>
        <div class="registerform">
                <div class="formbox">
                    <img src="__STATIC__/images/newimg/usr/username.png" alt="" width="17">
                    <input type="text" placeholder="用户名" id="nickname" class="font-12">
                </div>
                <div class="formbox">
                    <img src="__STATIC__/images/newimg/usr/phone.png" alt="" width="17">
                    <input type="text" placeholder="手机号" id="mobile" class="font-12">
                </div>
                <div class="formbox">
                    <img src="__STATIC__/images/newimg/usr/pass01.png" alt="" width="17">
                    <input type="text" placeholder="6-20位登录密码" id="pwd1" class="font-12">
                </div>
                <div class="formbox">
                    <img src="__STATIC__/images/newimg/usr/pass.png" alt="" width="17">
                    <input type="text" placeholder="再次确认密码" id="pwd2" class="font-12">
                </div>
                <a href="javascript:void(0)" id="registerbtn" class="font-15">立即注册</a>
        </div>
    </div>

</body>

<script>



    $('#registerbtn').click(function () {
        var nickname = $('#nickname').val();
        var mobile   = $('#mobile').val();
        var pwd1     = $('#pwd1').val();
        var pwd2     = $('#pwd2').val();
        if (nickname == ''){
            layer.msg('请输入用户名');
            return false;
        }
        if(mobile == ''){
            layer.msg('请输入手机号');
            return false;
        }
        if(pwd1 == ''){
            layer.msg('请输入密码');
            return false;
        }
        if(pwd2 == ''){
            layer.msg('请输入确认密码');
            return false;
        }
        var tel_pattern = /^1[345678]\d{9}$/;
        if (tel_pattern.test(mobile)==false) {
            layer.msg('手机号格式不正确');
            return false;
        }
        if (pwd1 !== pwd2){
            layer.msg('两次密码输入不一致');
            return false;
        }
        pwd_pattern = /^[0-9a-zA-Z_]{6,15}$/;
        if (pwd_pattern.test(pwd1)==false){
            layer.msg('密码格式不正确');
            return false;
        }
        $.ajax({
            type : "POST", //提交方式
            url : "/index.php?m=Mobile&c=User&a=user_register_do",//路径
            data : {
                "nickname" : nickname,
                "mobile"   : mobile,
                "pwd1"     : pwd1,
                "pwd2"     : pwd2
            },
            success:function (res) {
                if (res == 1){
                    layer.msg('注册成功');
                    $('#nickname').val('');
                    $('#mobile').val('');
                    $('#pwd1').val('');
                    $('#pwd2').val('');
                }
                if (res != 1){
                    layer.msg(res);
                }
            }
        })
    })
</script>


</html>